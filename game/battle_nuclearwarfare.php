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

if ($GAME["empire"]->data["have_nukes"] == 0) {
	$GAME["system"]->redirect("battle.php", array (
		"WARNING" => T_("You don't have any nukes!")
	));

}



////////////////////////////////////////////////////////////////
// GET NUKED! :)
////////////////////////////////////////////////////////////////
if (isset($_POST["nuke_empire"])) {


	$empire = intval($_POST["nuke_empire"]);

	$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_empire WHERE protection_turns_left=0 AND id='$empire'");
	if ($rs->EOF) {
		$GAME["system"]->redirect("battle.php",array("WARNING"=>T_("Invalid empire ID !")));
	}
	
	if ($GAME["empire"]->diplomacy->treatyFrom($rs->fields["id"]) != null) {
		$GAME["system"]->redirect("battle.php",array("WARNING"=>T_("You can't attack a ally!")));
	} 

	if ($GAME["empire"]->coalition->isMemberFromId($rs->fields["id"])) {		
		$GAME["system"]->redirect("battle.php",array("WARNING"=>T_("You can't attack a ally!")));
	}
	
	
	srand(time(NULL));


	// do you get caught ?
	if (rand(0,100)>=50) {
		
		// sorry but you get caught!

		$_SESSION["player"]["score"] -= 10;
		$DB->Execute("UPDATE system_tb_players SET score='" . intval($_SESSION["player"]["score"]) . "' WHERE id='" . intval($_SESSION["player"]["id"])."'");

		$evt = new EventCreator($DB);
		$evt->type = CONF_EVENT_NUCLEARWARFARE_BUSTED;
		$evt->from = $GAME["empire"]->data["id"];
		$evt->to = $rs->fields["id"];
		$evt->params = array("empire_id"=>$GAME["empire"]->data["id"],"empire_name"=>$GAME["empire"]->data["name"],"empire_emperor"=>$GAME["empire"]->data["emperor"],"gender"=>$GAME["empire"]->data["gender"]);
		$evt->broadcast();
		$GAME["empire"]->collapse();
		$GAME["empire"]->save();

		$GAME["system"]->redirect("manage.php");
	}


	// time to evaluate if the covert agents can foil the attack
	$enemy_empire = new Empire($DB, $TPL, $GAME["gameplay_costs"]);
	$enemy_empire->load($empire);

	$covert1 = $GAME["empire"]->army->data["covertagents"] / $GAME["empire"]->planets->getCount();
	$covert2 = $enemy_empire->army->data["covertagents"] / $enemy_empire->planets->getCount();

	if ($covert1 == 0) $covert1 = 1;
	if ($covert2 == 0) $covert2 = 1;
	

	$success_rate = (($covert1 / $covert2) * 100);

	$percent = rand(1, 100);

	if ($success_rate > $percent) {

		$_SESSION["player"]["score"] += 10;
		$DB->Execute("UPDATE system_tb_players SET score='" . intval($_SESSION["player"]["score"]) . "' WHERE id='" . intval($_SESSION["player"]["id"])."'");

		// define how much damage applied
		// RIGHT NOW POP AND FOOD DECREASE, PLANETS COUNT TOO AND ARMY COUNT, PRODUCTIVITY GO DOWN ALSO

		$base_damage = CONF_NUCLEARWARFARE_BASE_DAMAGE;
		$extra_damage = rand(0,CONF_NUCLEARWARFARE_EXTRA_DAMAGE);
		$total_damage = $base_damage + $extra_damage;

		$enemy_empire->data["population"] -= floor(($enemy_empire->data["population"]/100)*$total_damage);
		$enemy_empire->data["food"] -= floor(($enemy_empire->data["food"]/100)*$total_damage);

		$enemy_empire->army->data["soldiers"] -= floor(($enemy_empire->army->data["soldiers"]/100)*$total_damage);
		$enemy_empire->army->data["fighters"] -= floor(($enemy_empire->army->data["fighters"]/100)*$total_damage);
		$enemy_empire->army->data["stations"] -= floor(($enemy_empire->army->data["stations"]/100)*$total_damage);
		$enemy_empire->army->data["lightcruisers"] -= floor(($enemy_empire->army->data["lightcruisers"]/100)*$total_damage);
		$enemy_empire->army->data["heavycruisers"] -= floor(($enemy_empire->army->data["heavycruisers"]/100)*$total_damage);
		$enemy_empire->army->data["covertagents"] -= floor(($enemy_empire->army->data["covertagents"]/100)*$total_damage);
		
		$enemy_empire->planets->data["food_planets"] -= floor(($enemy_empire->planets->data["food_planets"]/100)*$total_damage);
		$enemy_empire->planets->data["max_food"] = $enemy_empire->planets->data["food_planets"];

		$enemy_empire->planets->data["ore_planets"] -= floor(($enemy_empire->planets->data["ore_planets"]/100)*$total_damage);
		$enemy_empire->planets->data["max_ore"] = $enemy_empire->planets->data["ore_planets"];

		$enemy_empire->planets->data["tourism_planets"] -= floor(($enemy_empire->planets->data["tourism_planets"]/100)*$total_damage);
		$enemy_empire->planets->data["max_tourism"] = $enemy_empire->planets->data["tourism_planets"];

		$enemy_empire->planets->data["supply_planets"] -= floor(($enemy_empire->planets->data["supply_planets"]/100)*$total_damage);
		$enemy_empire->planets->data["max_supply"] = $enemy_empire->planets->data["supply_planets"];

		$enemy_empire->planets->data["gov_planets"] -= floor(($enemy_empire->planets->data["gov_planets"]/100)*$total_damage);
		$enemy_empire->planets->data["max_gov"] = $enemy_empire->planets->data["gov_planets"];

		$enemy_empire->planets->data["edu_planets"] -= floor(($enemy_empire->planets->data["edu_planets"]/100)*$total_damage);
		$enemy_empire->planets->data["max_edu"] = $enemy_empire->planets->data["edu_planets"];

		$enemy_empire->planets->data["research_planets"] -= floor(($enemy_empire->planets->data["research_planets"]/100)*$total_damage);
		$enemy_empire->planets->data["max_research"] = $enemy_empire->planets->data["research_planets"];

		$enemy_empire->planets->data["urban_planets"] -= floor(($enemy_empire->planets->data["urban_planets"]/100)*$total_damage);
		$enemy_empire->planets->data["max_urban"] = $enemy_empire->planets->data["urban_planets"];
		
		$enemy_empire->planets->data["petro_planets"] -= floor(($enemy_empire->planets->data["petro_planets"]/100)*$total_damage);
		$enemy_empire->planets->data["max_petro"] = $enemy_empire->planets->data["petro_planets"];
		
		$enemy_empire->planets->data["antipollu_planets"] -= floor(($enemy_empire->planets->data["antipollu_planets"]/100)*$total_damage);
		$enemy_empire->planets->data["max_antipollu"] = $enemy_empire->planets->data["antipollu_planets"];

		$enemy_empire->production->data["food_short"] -= floor(($enemy_empire->production->data["food_short"]/100)*$total_damage);
		$enemy_empire->production->data["ore_short"] -= floor(($enemy_empire->production->data["ore_short"]/100)*$total_damage);
		$enemy_empire->production->data["tourism_short"] -= floor(($enemy_empire->production->data["tourism_short"]/100)*$total_damage);
		$enemy_empire->production->data["supply_short"] -= floor(($enemy_empire->production->data["supply_short"]/100)*$total_damage);
		$enemy_empire->production->data["edu_short"] -= floor(($enemy_empire->production->data["edu_short"]/100)*$total_damage);
		$enemy_empire->production->data["research_short"] -= floor(($enemy_empire->production->data["research_short"]/100)*$total_damage);
		$enemy_empire->production->data["urban_short"] -= floor(($enemy_empire->production->data["urban_short"]/100)*$total_damage);
		$enemy_empire->production->data["petro_short"] -= floor(($enemy_empire->production->data["petro_short"]/100)*$total_damage);
		$enemy_empire->production->data["antipollu_short"] -= floor(($enemy_empire->production->data["antipollu_short"]/100)*$total_damage);

		$enemy_empire->save();

		$GAME["empire"]->data["have_nukes"] = 0;
		$GAME["empire"]->data["already_attacked"] = 1;
		$GAME["empire"]->save();

		$evt = new EventCreator($DB);
		$evt->type = CONF_EVENT_NUCLEARWARFARE_ATTACKED;
		$evt->from = $GAME["empire"]->data["id"];
		$evt->to = $rs->fields["id"];
		$evt->params = array("empire_id"=>$enemy_empire->data["id"],"empire_name"=>$enemy_empire->data["name"],"empire_emperor"=>$enemy_empire->data["emperor"],"gender"=>$enemy_empire->data["gender"],"total_damage"=>$total_damage);
		$evt->broadcast();
		$GAME["system"]->redirect("battle.php");

	} else {

		$_SESSION["player"]["score"] -= 10;
		$DB->Execute("UPDATE system_tb_players SET score='" . intval($_SESSION["player"]["score"]) . "' WHERE id='" . intval($_SESSION["player"]["id"])."'");

		$GAME["empire"]->data["have_nukes"] = 0;
		$GAME["empire"]->data["already_attacked"] = 1;
		$GAME["empire"]->save();


		// foiled by covert agents!
		$evt = new EventCreator($DB);
		$evt->type = CONF_EVENT_NUCLEARWARFARE_FOILED;
		$evt->from = $GAME["empire"]->data["id"];
		$evt->to = $rs->fields["id"];
		$evt->params = array("empire_id"=>$enemy_empire->data["id"],"empire_name"=>$enemy_empire->data["name"],"empire_emperor"=>$enemy_empire->data["emperor"],"gender"=>$enemy_empire->data["gender"]);
		$evt->broadcast();

		$GAME["system"]->redirect("battle.php");

	}
	
	

}



////////////////////////////////////////////////////////////////
// MAIN
////////////////////////////////////////////////////////////////

$GAME["system"]->redirect("battle.php");


?>