<?php


// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //

define("LANGUAGE_DOMAIN","game");

require_once ("../include/game/init.php");
require_once ("../include/game/init_ingame.php");


if ($GAME["empire"]->data["protection_turns_left"] != 0) {
	$GAME["system"]->redirect("battle.php",array("" .
			"WARNING"=>T_("No attack until out of protection!")
	));
}

if ($GAME["empire"]->data["already_attacked"] != 0) {
	$GAME["system"]->redirect("battle.php", array (
		"WARNING" => T_("Sorry, only one attack per turn!")
	));
}

if (isset($_POST["invasion_empire"])) {


	// we send invasion convoy
	$empire = intval($_POST["invasion_empire"]);

	$soldiers = floor($_POST["invasion_soldiers"]);
	if ($soldiers > $GAME["empire"]->army->data["soldiers"]) $GAME["system"]->redirect("battle.php",array("WARNING"=>T_("Invalid quantity!")));
	if ($soldiers < 0) $GAME["system"]->redirect("battle.php",array("WARNING"=>T_("Invalid quantity!")));
	
	$fighters = floor($_POST["invasion_fighters"]);
	if ($fighters > $GAME["empire"]->army->data["fighters"]) $GAME["system"]->redirect("battle.php",array("WARNING"=>T_("Invalid quantity!")));
	if ($fighters < 0) $GAME["system"]->redirect("battle.php",array("WARNING"=>T_("Invalid quantity!")));

	$lightcruisers = floor($_POST["invasion_lightcruisers"]);
	if ($lightcruisers > $GAME["empire"]->army->data["lightcruisers"]) $GAME["system"]->redirect("battle.php",array("WARNING"=>T_("Invalid quantity!")));
	if ($lightcruisers < 0) $GAME["system"]->redirect("battle.php",array("WARNING"=>T_("Invalid quantity!")));

	$heavycruisers = floor($_POST["invasion_heavycruisers"]);
	if ($heavycruisers > $GAME["empire"]->army->data["heavycruisers"]) $GAME["system"]->redirect("battle.php",array("WARNING"=>T_("Invalid quantity!")));
	if ($heavycruisers < 0) $GAME["system"]->redirect("battle.php",array("WARNING"=>T_("Invalid quantity!")));
	
	$total = $soldiers + $fighters + $lightcruisers + $heavycruisers;
	if ($total <= 0) {
		$GAME["system"]->redirect("battle.php",array("WARNING"=>T_("Invalid quantity!")));
	}


	// verify if target is correct
	$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_empire WHERE protection_turns_left='0' AND id='$empire'");
	if ($rs->EOF) {
		$GAME["system"]->redirect("battle.php",array("WARNING"=>T_("Invalid empire ID !")));
	}

	$attacked_by = explode(",",$rs->fields["attacked_by"]);


	if ($GAME["empire"]->diplomacy->treatyFrom(addslashes($empire)) != null) {
		$GAME["system"]->redirect("battle.php",array("WARNING"=>T_("You can't attack a ally!")));
	} 

	if ($GAME["empire"]->coalition->isMemberFromId(addslashes($empire))) {		
		$GAME["system"]->redirect("battle.php",array("WARNING"=>T_("You can't attack a ally!")));
	}
	
	$you_networth = $GAME["empire"]->data["networth"] * 0.70;
	$you_turns_played = $GAME["empire"]->data["turns_played"] * 0.80;

	$empire_turns_played = $rs->fields["turns_played"];
	$empire_networth = $rs->fields["networth"];

	if (!in_array($GAME["empire"]->data["id"],$attacked_by)) 
	  if ($empire_turns_played < $you_turns_played) {
		  if ($empire_networth < $you_networth) {
			  $GAME["system"]->redirect("battle.php",array("WARNING"=>T_("You can't attack this empire!")));
		  }
	  }
		
	$rs2 = $DB->Execute("SELECT COUNT(*) FROM game".$game_id."_tb_armyconvoy WHERE ". 
		"(empire_from='".$GAME["empire"]->data["id"]."' AND empire_to='".$rs->fields["id"]."' AND convoy_type='".CONF_CONVOY_INVASION."') OR ".
		"(empire_to='".$GAME["empire"]->data["id"]."' AND empire_from='".$rs->fields["id"]."' AND convoy_type='".CONF_CONVOY_INVASION_RETREAT."')");
		
	if ($rs2->fields[0] > 0) {
		$GAME["system"]->redirect("battle.php",array("WARNING"=>T_("Only one invasion at a time!")));
	}
		
	
	
	// checking needed carriers
	$carriers_needed = 0;
	$carriers_needed += (CONF_CARRIER_SOLDIER * $units_info["carriers_" .$GAME["empire"]->army->data["carriers_level"]]["cargo_hold"] * $soldiers);
	$carriers_needed += (CONF_CARRIER_FIGHTER * $units_info["carriers_" .$GAME["empire"]->army->data["carriers_level"]]["cargo_hold"] * $fighters);
	$carriers_needed = ceil($carriers_needed);

	if ($carriers_needed > $GAME["empire"]->army->data["carriers"]) {
		$GAME["system"]->redirect("battle.php",array("WARNING"=>T_("Not enough carriers!")));
	}

	// We save the attacker id in the target empire record
	if (!in_array($GAME["empire"]->data["id"],$attacked_by)) {
	    $ab = $rs->fields["attacked_by"];
	    if ($ab == "") 
	      $ab = $GAME["empire"]->data["id"]; 
	    else 
	      $ab = $ab . ",".$GAME["empire"]->data["id"];

	    $DB->Execute("UPDATE game".$game_id."_tb_empire SET attacked_by='$ab' WHERE id='".$rs->fields["id"]."'");
	}



	// wildraw from resources
	$GAME["empire"]->army->data["soldiers"] -= $soldiers;
	$GAME["empire"]->army->data["fighters"] -= $fighters;
	$GAME["empire"]->army->data["lightcruisers"] -= $lightcruisers;
	$GAME["empire"]->army->data["heavycruisers"] -= $heavycruisers;
	$GAME["empire"]->army->data["carriers"] -= $carriers_needed;
	$GAME["empire"]->data["already_attacked"] = 1;
	$GAME["empire"]->save();
	

	$x = abs($GAME["empire"]->data["x"] - $rs->fields["x"]);
	$y = abs($GAME["empire"]->data["y"] - $rs->fields["y"]);

	// calculating time needed
	$time_required = floor(sqrt(($x * $x) + ($y * $y)));
	$time_required = floor($time_required / $units_info["carriers_" . $GAME["empire"]->army->data["carriers_level"]]["speed"]);
	$time_required *= 10;
	$time_required -= ($time_required % 60);

	$target_empire = new Empire($DB,$GAME["template"],$GAME["gameplay_costs"]);
	$target_empire->Load(addslashes($empire));


	// compare networths
	$networth1 = $GAME["empire"]->data["networth"];
  	if ($networth1 == 0) $networth1 = 1;

  	$networth2 = $target_empire->data["networth"];
  	if ($networth2 == 0) $networth2 = 1;

  	$percent = (($networth2 / $networth1) * 100);
	if ($percent <= 33) {
		$GAME["empire"]->data["civil_status"]+=2;
		if ($GAME["empire"]->data["civil_status"]> 7) $GAME["empire"]->data["civil_status"] = 7;
		$GAME["empire"]->save();
	
	}


	// creating convoy
	$query = "
	INSERT INTO game".$game_id."_tb_armyconvoy
	(
	convoy_type,
	convoy_target,
	empire_from,
	empire_to,
	convoy_soldiers,
	convoy_soldiers_level,
	convoy_fighters,
	convoy_fighters_level,
	convoy_lightcruisers,
	convoy_lightcruisers_level,
	convoy_heavycruisers,
	convoy_heavycruisers_level,
	carriers,
	carriers_level,
	time_start,
	time_end)
	VALUES(
	".CONF_CONVOY_INVASION.",
	-1,
	".$GAME["empire"]->data["id"].",
	".addslashes($empire).",
	$soldiers,
	".$GAME["empire"]->army->data["soldiers_level"].",
	$fighters,
	".$GAME["empire"]->army->data["fighters_level"].",
	$lightcruisers,
	".$GAME["empire"]->army->data["lightcruisers_level"].",
	$heavycruisers,
	".$GAME["empire"]->army->data["heavycruisers_level"].",
	$carriers_needed,
	".$GAME["empire"]->army->data["carriers_level"].",
	".time(NULL).",
	".(time(NULL) + $time_required)."
	)";
	$DB->Execute($query);
	$convoy_id = $DB->Execute("SELECT id FROM game".$game_id."_tb_armyconvoy ORDER BY id DESC LIMIT 1");
	$convoy_id = $convoy_id->fields["id"];

	// send a event to target
	$evt = new EventCreator($DB);
	$evt->from = $GAME["empire"]->data["id"];
	$evt->type = CONF_EVENT_INCOMING_INVASION;
	$evt->to = addslashes($empire);
	$evt->params = array("soldiers"=>$soldiers,"fighters"=>$fighters,"lightcruisers"=>$lightcruisers,"heavycruisers"=>$heavycruisers);
	$evt->send();
	
	////////////////////////////////////////////////////////////////////////
	// Time to check if the target have friends :)
	////////////////////////////////////////////////////////////////////////

		
	for ($i=0;$i<count($target_empire->diplomacy->data);$i++) {
 	
 		if ($target_empire->diplomacy->data[$i]["status"] != 1) continue;
		if ($target_empire->diplomacy->data[$i]["type"]  < 1) continue; // not a defense treaty
		if ($target_empire->diplomacy->data[$i]["type"]  > 2) continue; //not a defense treaty
		
		$percent = 0;
		if ($target_empire->diplomacy->data[$i]["type"] == 1) $percent = 10; 
		if ($target_empire->diplomacy->data[$i]["type"] == 2) $percent = 30; 

		// we first check if the distance is shorter
		$empire = $target_empire->diplomacy->data[$i]["empire_from"];
		if ($empire == $target_empire->data["id"]) $empire = $target_empire->diplomacy->data[$i]["empire_to"];
		if ($empire == $target_empire->data["id"]) continue;
		
		$ally_empire = new Empire($DB,$GAME["template"],$GAME["gameplay_costs"]);
		$ally_empire->Load($empire);
		
		$x = abs($target_empire->data["x"] - $ally_empire->data["x"]);
		$y = abs($target_empire->data["y"] - $ally_empire->data["y"]);

		// calculating time needed
		$time_required2 = floor(sqrt(($x * $x) + ($y * $y)));
		$time_required2 = floor($time_required2 / $units_info["carriers_" .$ally_empire->army->data["carriers_level"]]["speed"]);
		$time_required2 *= 10;
		$time_required2 -= ($time_required2 % 60);
		
		if ($time_required2 > $time_required) continue; // to bad
		
		// now we need to scale the numbers
		$defense_soldiers = floor(($ally_empire->army->data["soldiers"]/100)*$percent);

		$defense_fighters = floor(($ally_empire->army->data["fighters"]/100)*$percent);
		$defense_lightcruisers = floor(($ally_empire->army->data["lightcruisers"]/100)*$percent);
		$defense_heavycruisers = floor(($ally_empire->army->data["heavycruisers"]/100)*$percent);

		if ($defense_soldiers > $soldiers) $defense_soldiers = $soldiers;
		if ($defense_fighters > $fighters) $defense_fighters = $fighters;
		if ($defense_lightcruisers > $lightcruisers) $defense_lightcruisers = $lightcruisers;
		if ($defense_heavycruisers > $heavycruisers) $defense_heavycruisers = $heavycruisers;

		// checking needed carriers
		$carriers_needed = 0;
		$carriers_needed += (CONF_CARRIER_SOLDIER * $units_info["carriers_" .$ally_empire->army->data["carriers_level"]]["cargo_hold"] *  $defense_soldiers);
		$carriers_needed += (CONF_CARRIER_FIGHTER * $units_info["carriers_" .$ally_empire->army->data["carriers_level"]]["cargo_hold"] * $defense_fighters);
		$carriers_needed = ceil($carriers_needed);

		$ally_empire->army->data["soldiers"] -= $defense_soldiers;
		$ally_empire->army->data["fighters"] -= $defense_fighters;
		$ally_empire->army->data["lightcruisers"] -= $defense_lightcruisers;
		$ally_empire->army->data["heavycruisers"] -= $defense_heavycruisers;
		$ally_empire->Save();

		// no enough carriers
		if ($carriers_needed > $ally_empire->army->data["carriers"]) continue;
		$time_now = time(NULL);

		// creating convoy
		$query = "
		INSERT INTO game".$game_id."_tb_armyconvoy
		(
		convoy_type,
		convoy_target,
		empire_from,
		empire_to,
		convoy_soldiers,
		convoy_soldiers_level,
		convoy_fighters,
		convoy_fighters_level,
		convoy_lightcruisers,
		convoy_lightcruisers_level,
		convoy_heavycruisers,
		convoy_heavycruisers_level,
		carriers,
		time_start,
		time_end)
		VALUES(
		".CONF_CONVOY_DEFENSE.",
		".$convoy_id.",
		".$ally_empire->data["id"].",
		".$target_empire->data["id"].",
		$defense_soldiers,
		".$ally_empire->army->data["soldiers_level"].",
		$defense_fighters,
		".$ally_empire->army->data["fighters_level"].",
		$defense_lightcruisers,
		".$ally_empire->army->data["lightcruisers_level"].",
		$defense_heavycruisers,
		".$ally_empire->army->data["heavycruisers_level"].",
		$carriers_needed,
		$time_now,
		".($time_now + $time_required2)."
		)";
		
		$DB->Execute($query);
		// send a event to target
		$evt = new EventCreator($DB);
		$evt->from = $ally_empire->data["id"];
		$evt->type = CONF_EVENT_INCOMING_DEFENSE;
		$evt->to = $target_empire->data["id"];
		$evt->params = array("soldiers"=>$soldiers,"fighters"=>$fighters,"lightcruisers"=>$lightcruisers,"heavycruisers"=>$heavycruisers);
		$evt->send();
	
		// send a event to ally
		$evt = new EventCreator($DB);
		$evt->from = $target_empire->data["id"];
		$evt->type = CONF_EVENT_SENDING_DEFENSE;
		$evt->to = $ally_empire->data["id"];
		$evt->params = array("soldiers"=>$soldiers,"fighters"=>$fighters,"lightcruisers"=>$lightcruisers,"heavycruisers"=>$heavycruisers);
		$evt->send();

	}

	$GAME["system"]->redirect("battle.php",array("NOTICE"=>T_("Invasion convoy sent!")));
}



////////////////////////////////////////////////////////////////
// MAIN
////////////////////////////////////////////////////////////////

$GAME["system"]->redirect("battle.php");


?>
