<?php

// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //
// #NEW ybo 14sept08 : Protecte players can now be attacked if they break the truce :)

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


////////////////////////////////////////////////////////////////
// GUERILLA ATTACK
////////////////////////////////////////////////////////////////
if (isset($_POST["guerilla_empire"]))
{

	

	$empire = intval($_POST["guerilla_empire"]);
	$soldiers = intval($_POST["guerilla_soldiers"]);
	if ($soldiers < 0) $soldiers = 0;

	$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_empire WHERE  protection_turns_left='0' AND id='$empire'");
	if ($rs->EOF) {
		$GAME["system"]->redirect("battle.php",array("WARNING"=>T_("Invalid empire ID !")));
	}

	$attacked_by = explode(",",$rs->fields["attacked_by"]);
	
	$rs2 = $DB->Execute("SELECT * FROM game".$game_id."_tb_army WHERE empire='$empire'");
	if ($rs2->EOF) {
		$GAME["system"]->redirect("battle.php",array("WARNING"=>T_("Invalid empire ID !")));
	}
	

	$rs3 = $DB->Execute("SELECT * FROM game".$game_id."_tb_production WHERE empire='$empire'");
	
	if ($soldiers > $GAME["empire"]->army->data["soldiers"]) {
		$GAME["system"]->redirect("battle.php",array("WARNING"=>T_("Invalid soldiers quantity!")));
	}
		
	if ($GAME["empire"]->diplomacy->treatyFrom($rs->fields["id"]) != null) {
		$GAME["system"]->redirect("battle.php",array("WARNING"=>T_("You can't attack a ally!")));
	} 

	if ($GAME["empire"]->coalition->isMemberFromId($rs->fields["id"])) {		
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
		
	$rs22 = $DB->Execute("SELECT * FROM game".$game_id."_tb_armyconvoy WHERE ". 
		"(empire_from='".$GAME["empire"]->data["id"]."' AND empire_to='".$rs->fields["id"]."' AND convoy_type='".CONF_CONVOY_INVASION."') OR ".
		"(empire_to='".$GAME["empire"]->data["id"]."' AND empire_from='".$rs->fields["id"]."' AND convoy_type='".CONF_CONVOY_INVASION_RETREAT."')");
		
	if ($rs22->fields[0] > 0) {
		$GAME["system"]->redirect("battle.php",array("WARNING"=>T_("Only one invasion at a time!")));
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

	
	$enemy_soldiers = $rs2->fields["soldiers"];
	$result = "";
	$lost = 0;
	$total_lost = 0;
	$my_lost = 0;

	$enemy_networth = $rs->fields["networth"];
	if ($enemy_networth == 0) $enemy_networth = 1;
	$your_networth = $GAME["empire"]->data["networth"];
	
	$nwt = $your_networth / $enemy_networth;
	if ($nwt < 0.5) $nwt = 0.5;
	if ($nwt > 5) $nwt = 5;


	for ($i=0;$i<CONF_GUERILLA_ATTACK_ROUNDS;$i++)
	{
		$result .= "<b style=\"color:yellow\">Round #".($i+1)."</b><br/>\n";
		$result .= T_("Attacking with")." ".$GAME["template"]->formatNumber($soldiers)." ".T_("soldiers")." ... ";
		
		$attack_strength = $soldiers * $GAME["empire"]->army->data["effectiveness"];
		$defense_strength = $enemy_soldiers * CONF_GUERILLA_SOLDIER_DEFENSE * $rs2->fields["effectiveness"] * $nwt;
		if ($attack_strength == 0) $attack_strength = 1;
		if ($defense_strength == 0) $defense_strength = 1;
		$attack_strength *= $units_info["soldiers_".$GAME["empire"]->army->data["soldiers_level"]]["guerilla"];
		$defense_strength *= $units_info["soldiers_".$rs2->fields["soldiers_level"]]["guerilla"];

		$attack = "";
		$p_attack = floor(($attack_strength / $defense_strength)*100);
		
		$p_attack = floor($p_attack/20);
		if ($p_attack > 40) $p_attack = 40;
		if ($p_attack <= 0) $p_attack = 1;

		for ($j=0;$j<$p_attack;$j++) $attack .= "<img style=\"border:1px solid darkred\" width=\"16\" height=\"16\" src=\"../images/game/icons/army/soldiers_".$GAME["empire"]->army->data["soldiers_level"].".gif\" border=\"0\"> ";

		$defense = "";
		$p_defense = floor(($defense_strength / $attack_strength)*100);
		
		$p_defense = floor($p_defense/20);
		if ($p_defense <= 0) $p_defense = 1;
		if ($p_defense > 40) $p_defense = 40;

		for ($j=0;$j<$p_defense;$j++) $defense .= "<img style=\"border:1px solid darkblue\"  width=\"16\" height=\"16\" src=\"../images/game/icons/army/soldiers_".$rs2->fields["soldiers_level"].".gif\" border=\"0\"> ";

		$graphic = "<table bgcolor=\"white\" cellpadding=\"5\" align=\"center\" width=\"700\">\n";
		$graphic .= "<tr><td bgcolor=\"#330000\" width=\"50%\">$attack</td><td bgcolor=\"#000033\" width=\"50%\">$defense</td></tr>\n";
		$graphic .= "</table><br/>\n";
		$p = $defense_strength -$attack_strength;
		if ($p > 0)
		{
			$_SESSION["player"]["score"] -= 2;
			$DB->Execute("UPDATE system_tb_players SET score='".intval($_SESSION["player"]["score"])."' WHERE id='".$_SESSION["player"]["id"]."'");
			$result .= "<b style=\"color:#FF9999\">".T_("Battle lost")." ";	
			$lost++;
			
			$lost_soldiers = round(($soldiers / 100)*CONF_GUERILLA_SOLDIER_LOST);
			$soldiers -= $lost_soldiers;
			$enemy_soldiers -= (($lost_soldiers / CONF_GUERILLA_SOLDIER_DEFENSE));
			
			$result .= " (".T_("Your casualties").": ".$GAME["template"]->formatNumber($lost_soldiers).", ".T_("Enemy casualties").": ".$GAME["template"]->formatNumber(($lost_soldiers / CONF_GUERILLA_SOLDIER_DEFENSE)).")</b>";
			
			$total_lost += ($lost_soldiers / CONF_GUERILLA_SOLDIER_DEFENSE);
			$my_lost += $lost_soldiers;

		} else {
			$result .= "<b style=\"color:#99FF99\">".T_("Battle won")." ";	

			$lost_soldiers = round(($enemy_soldiers / 100)*CONF_GUERILLA_SOLDIER_LOST);
			$soldiers -= ($lost_soldiers/2);
			$enemy_soldiers -= ($lost_soldiers);
			
			$result .= " (".T_("Your casualties").": ".$GAME["template"]->formatNumber($lost_soldiers/2).", ".T_("Enemy casualties").": ".$GAME["template"]->formatNumber($lost_soldiers).")</b>";
			
			$total_lost += $lost_soldiers;	
			$my_lost += ($lost_soldiers/2);

		}
		
		$result .= "$graphic\n";

		if ($soldiers == 0) break;
		if ($enemy_soldiers == 0) break;
	}

	if ($lost >= 1)
	{
		$result .= T_("You have weakened the enemy but revealed your identity!")."<br/>";


		$_SESSION["player"]["score"] += 1;
		$DB->Execute("UPDATE system_tb_players SET score='".intval($_SESSION["player"]["score"])."' WHERE id='".intval($_SESSION["player"]["id"])."'");

		$evt = new EventCreator($DB);
		$evt->type = CONF_EVENT_GUERILLA_REVEALED;
		$evt->from = $GAME["empire"]->data["id"];
		$evt->to = $rs->fields["id"];
		$evt->params = array("empire_id"=>$GAME["empire"]->data["id"],"empire_name"=>$GAME["empire"]->data["name"],"empire_emperor"=>$GAME["empire"]->data["emperor"],"gender"=>$GAME["empire"]->data["gender"],"lost_soldiers"=>$total_lost);
		$evt->send();
				
		
		$empire_from = $GAME["template"]->displayEmpireHTML($GAME["empire"]->data["id"],$GAME["empire"]->data["emperor"],$GAME["empire"]->data["name"],$GAME["empire"]->data["networth"]);
		$empire_to = $GAME["template"]->displayEmpireHTML($rs->fields["id"],$rs->fields["emperor"],$rs->fields["name"],$rs->fields["networth"]);
		$won = false;
		$type = "guerilla";
		
		$evt->type = CONF_EVENT_EMPIREATTACKED;
		$evt->from = $GAME["empire"]->data["id"];
		$evt->to = $rs->fields["id"];
		$evt->params = array("empire_from"=>$empire_from,"empire_to"=>$empire_to,"type"=>$type,"won"=>$won);
		$evt->broadcast();
		
		
	} else {
		$result .= T_("You have weakened the enemy without revealing your identity!")."<br/>";
		$_SESSION["player"]["score"] += 2;
		$DB->Execute("UPDATE system_tb_players SET score='".intval($_SESSION["player"]["score"])."' WHERE id='".intval($_SESSION["player"]["id"])."'");
		
		$evt = new EventCreator($DB);
		$evt->type = CONF_EVENT_GUERILLA_STEALTH;
		$evt->from = $GAME["empire"]->data["id"];
		$evt->to = $rs->fields["id"];
		$evt->params = array("empire_id"=>$GAME["empire"]->data["id"],"empire_name"=>$GAME["empire"]->data["name"],"empire_emperor"=>$GAME["empire"]->data["emperor"],"gender"=>$GAME["empire"]->data["gender"],"lost_soldiers"=>$total_lost);
		$evt->send();
				

		$r = rand(0,2);
		if ($r == 0)
		{
			$result .= "<b style=\"color:yellow\">".T_("Riots break out")."</b><br/>";

			$civil_status = $rs->fields["civil_status"];
			$civil_status++;
			if ($civil_status > (count($CONF_CIVIL_STATUS)-1))
				$civil_status = count($CONF_CIVIL_STATUS)-1;

			$population = $rs->fields["population"];
			$population -= floor(($population/100)*rand(0,20));
			$rs2->fields["effectiveness"] -= 5;
			if ($rs2->fields["effectiveness"] < 10) $rs2->fields["effectiveness"] = 10;
			
			$DB->Execute("UPDATE game".$game_id."_tb_empire SET civil_status='$civil_status',population='$population' WHERE id='".$rs->fields["id"]."'");

		}
		
	}

	$tourism = $rs3->fields["tourism_short"] - 5;
	if ($tourism < 0) $tourism = 1;
	
	$DB->Execute("UPDATE game".$game_id."_tb_production SET tourism_short='$tourism' WHERE empire='".$rs->fields["id"]."'");
	

	$GAME["empire"]->army->data["soldiers"] -= $my_lost; 
	$DB->Execute("UPDATE game".$game_id."_tb_army SET effectiveness='".$rs2->fields["effectiveness"]."',soldiers='".floor($rs2->fields["soldiers"]-$total_lost)."' WHERE empire='".$rs->fields["id"]."'");
	

	$GAME["empire"]->data["already_attacked"] = 1;
	$GAME["empire"]->save();
	

	
	$evt = new EventCreator($DB);
	$evt->type = CONF_EVENT_NOTICE;
	$evt->from = -1;
	$evt->height = 500;
	$evt->to = $GAME["empire"]->data["id"];
	$evt->params = array("notice_data"=>$result);
	$evt->send();
}





////////////////////////////////////////////////////////////////
// MAIN
////////////////////////////////////////////////////////////////

$GAME["system"]->redirect("battle.php");

?>
