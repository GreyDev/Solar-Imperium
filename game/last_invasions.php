<?php

// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //

// #NEW ybo 14sept08: fixed a potential security issue allowing players to snoop invasion details of others

define("LANGUAGE_DOMAIN","game");

require_once ("../include/game/init.php");
require_once ("../include/game/init_ingame.php");


if (isset($_GET["invasion"])) {


	$GAME["template"]->setPage("last_invasions_details.html");
	$empire_id = intval($_SESSION["empire_id"]);

	$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_invasion WHERE empire_id='$empire_id' AND id='".intval($_GET["invasion"])."'");
	if ($rs->EOF) die(T_("Invalid invasion ID!"));	


	$GAME["template"]->setVar("invasion_date",$GAME["template"]->formatTime(time()-$rs->fields["date"]));
	$invasion_data = unserialize(base64_decode($rs->fields["data"]));

	// Summary
	$GAME["template"]->setVar("space_battles_won",($invasion_data["params"]["space_won"]?T_("Yes"):T_("No")));
	$GAME["template"]->setVar("orbital_battles_won",($invasion_data["params"]["orbital_won"]?T_("Yes"):T_("No")));
	$GAME["template"]->setVar("ground_battles_won",($invasion_data["params"]["ground_won"]?T_("Yes"):T_("No")));

	$GAME["template"]->setVar("attackers_count",count($invasion_data["params"]["army_attack"]));
	$GAME["template"]->setVar("defenders_count",count($invasion_data["params"]["army_defense"]));


	// Before Attack
	$army_attack = array();
	for ($i=0;$i<count($invasion_data["params"]["army_attack"]);$i++) {
		$data = $invasion_data["params"]["army_attack"][$i];
		if (isset($data["convoy_soldiers"])) $data["soldiers"] = $data["convoy_soldiers"];
		if (isset($data["convoy_fighters"])) $data["fighters"] = $data["convoy_fighters"];
		if (isset($data["convoy_lightcruisers"])) $data["lightcruisers"] = $data["convoy_lightcruisers"];
		if (isset($data["convoy_heavycruisers"])) $data["heavycruisers"] = $data["convoy_heavycruisers"];
		if (isset($data["convoy_carriers"])) $data["carriers"] = $data["convoy_carriers"];
		if (isset($data["convoy_stations"])) $data["stations"] = $data["convoy_stations"];

		if (isset($data["convoy_soldiers_level"])) $data["soldiers_level"] = $data["convoy_soldiers_level"];
		$data["stations_level"] = 0;
		if (isset($data["convoy_fighters_level"])) $data["fighters_level"] = $data["convoy_fighters_level"];
		if (isset($data["convoy_lightcruisers_level"])) $data["lightcruisers_level"] = $data["convoy_lightcruisers_level"];
		if (isset($data["convoy_heavycruisers_level"])) $data["heavycruisers_level"] = $data["convoy_heavycruisers_level"];
		if (isset($data["convoy_carriers_level"])) $data["carriers_level"] = $data["convoy_carriers_level"];
	
		if (!isset($data["stations"])) $data["stations"] = 0;
		$data["empire_id"] = $data["empire_from"];
		$data["game_id"] = $_SESSION["game"];


		$data["soldiers"] = $GAME["template"]->formatNumber($data["soldiers"]);
		$data["fighters"] = $GAME["template"]->formatNumber($data["fighters"]);
		$data["stations"] = $GAME["template"]->formatNumber($data["stations"]);
		$data["lightcruisers"] = $GAME["template"]->formatNumber($data["lightcruisers"]);
		$data["heavycruisers"] = $GAME["template"]->formatNumber($data["heavycruisers"]);
		$data["carriers"] = $GAME["template"]->formatNumber($data["carriers"]);

		$rs = $DB->Execute("SELECT name FROM game".$game_id."_tb_empire WHERE id='".$data["empire_id"]."'");
		$data["empire_name"] = $rs->fields["name"];
		$army_attack[] = $data;
	}

	$GAME["template"]->setLoop("attackers",$army_attack);

	$army_defense = array();
	for ($i=0;$i<count($invasion_data["params"]["army_defense"]);$i++) {
		$data = $invasion_data["params"]["army_defense"][$i];
		if (isset($data["convoy_soldiers"])) $data["soldiers"] = $data["convoy_soldiers"];
		if (isset($data["convoy_fighters"])) $data["fighters"] = $data["convoy_fighters"];
		if (isset($data["convoy_stations"])) $data["stations"] = $data["convoy_stations"];
		if (!isset($data["stations"])) $data["stations"] = 0;
		if (!isset($data["stations_level"])) $data["stations_level"] = 0;

		if (isset($data["convoy_lightcruisers"])) $data["lightcruisers"] = $data["convoy_lightcruisers"];
		if (isset($data["convoy_heavycruisers"])) $data["heavycruisers"] = $data["convoy_heavycruisers"];
		if (isset($data["convoy_carriers"])) $data["carriers"] = $data["convoy_carriers"];
		if (isset($data["empire_from"])) $data["empire_id"] = $data["empire_from"];
		if (isset($data["empire"])) $data["empire_id"] = $data["empire"];

		$data["soldiers"] = $GAME["template"]->formatNumber($data["soldiers"]);
		$data["fighters"] = $GAME["template"]->formatNumber($data["fighters"]);
		$data["stations"] = $GAME["template"]->formatNumber($data["stations"]);
		$data["lightcruisers"] = $GAME["template"]->formatNumber($data["lightcruisers"]);
		$data["heavycruisers"] = $GAME["template"]->formatNumber($data["heavycruisers"]);
		$data["carriers"] = $GAME["template"]->formatNumber($data["carriers"]);

		$data["game_id"] = $_SESSION["game"];
		$rs = $DB->Execute("SELECT name FROM game".$game_id."_tb_empire WHERE id='".$data["empire_id"]."'");
		$data["empire_name"] = $rs->fields["name"];
		$army_defense[] = $data;
	}

	$GAME["template"]->setLoop("defenders",$army_defense);
	$ts = $invasion_data["total_strength"];


	if (!isset($ts["ORBITAL"][0])) {
		$ts["GROUND"][0] = array();
		$ts["GROUND"][0]["attack"] = array();
		$ts["GROUND"][0]["defense"] = array();
		$ts["GROUND"][0]["attack"]["soldiers"] = 0;
		$ts["GROUND"][0]["defense"]["soldiers"] = 0;
		$ts["GROUND"][0]["attack"]["fighters"] = 0;
		$ts["GROUND"][0]["defense"]["fighters"] = 0;
		$ts["GROUND"][0]["attack"]["stations"] = 0;
		$ts["GROUND"][0]["defense"]["stations"] = 0;
		$ts["GROUND"][0]["attack"]["lightcruisers"] = 0;
		$ts["GROUND"][0]["defense"]["lightcruisers"] = 0;
		$ts["GROUND"][0]["attack"]["heavycruisers"] = 0;
		$ts["GROUND"][0]["defense"]["heavycruisers"] = 0;

		$ts["ORBITAL"][0] = array();
		$ts["ORBITAL"][0]["attack"] = array();
		$ts["ORBITAL"][0]["defense"] = array();
		$ts["ORBITAL"][0]["attack"]["soldiers"] = 0;
		$ts["ORBITAL"][0]["defense"]["soldiers"] = 0;
		$ts["ORBITAL"][0]["attack"]["fighters"] = 0;
		$ts["ORBITAL"][0]["defense"]["fighters"] = 0;
		$ts["ORBITAL"][0]["attack"]["stations"] = 0;
		$ts["ORBITAL"][0]["defense"]["stations"] = 0;
		$ts["ORBITAL"][0]["attack"]["lightcruisers"] = 0;
		$ts["ORBITAL"][0]["defense"]["lightcruisers"] = 0;
		$ts["ORBITAL"][0]["attack"]["heavycruisers"] = 0;
		$ts["ORBITAL"][0]["defense"]["heavycruisers"] = 0;
	}


	$strength_attackers_soldiers = (isset($ts["SPACE"])?$ts["SPACE"][0]["attack"]["soldiers"]:0) + $ts["ORBITAL"][0]["attack"]["soldiers"] + $ts["GROUND"][0]["attack"]["soldiers"];
	$strength_defenders_soldiers = (isset($ts["SPACE"])?$ts["SPACE"][0]["defense"]["soldiers"]:0) + $ts["ORBITAL"][0]["defense"]["soldiers"] + $ts["GROUND"][0]["defense"]["soldiers"];
	$strength_attackers_fighters = (isset($ts["SPACE"])?$ts["SPACE"][0]["attack"]["fighters"]:0) + $ts["ORBITAL"][0]["attack"]["fighters"] + $ts["GROUND"][0]["attack"]["fighters"];
	$strength_defenders_fighters = (isset($ts["SPACE"])?$ts["SPACE"][0]["defense"]["fighters"]:0) + $ts["ORBITAL"][0]["defense"]["fighters"] + $ts["GROUND"][0]["defense"]["fighters"];
	$strength_attackers_stations = 0;
	$strength_defenders_stations = (isset($ts["SPACE"])?$ts["SPACE"][0]["defense"]["stations"]:0) + $ts["ORBITAL"][0]["defense"]["stations"] + $ts["GROUND"][0]["defense"]["stations"];
	$strength_attackers_lightcruisers = (isset($ts["SPACE"])?$ts["SPACE"][0]["attack"]["lightcruisers"]:0) + $ts["ORBITAL"][0]["attack"]["lightcruisers"] + $ts["GROUND"][0]["attack"]["lightcruisers"];
	$strength_defenders_lightcruisers = (isset($ts["SPACE"])?$ts["SPACE"][0]["defense"]["lightcruisers"]:0) + $ts["ORBITAL"][0]["defense"]["lightcruisers"] + $ts["GROUND"][0]["defense"]["lightcruisers"];
	$strength_attackers_heavycruisers = (isset($ts["SPACE"])?$ts["SPACE"][0]["attack"]["heavycruisers"]:0) + $ts["ORBITAL"][0]["attack"]["heavycruisers"] + $ts["GROUND"][0]["attack"]["heavycruisers"];
	$strength_defenders_heavycruisers = (isset($ts["SPACE"])?$ts["SPACE"][0]["defense"]["heavycruisers"]:0) + $ts["ORBITAL"][0]["defense"]["heavycruisers"] + $ts["GROUND"][0]["defense"]["heavycruisers"];

	$GAME["template"]->setVar("attackers_soldiers",$GAME["template"]->formatNumber($strength_attackers_soldiers));
	$GAME["template"]->setVar("attackers_fighters",$GAME["template"]->formatNumber($strength_attackers_fighters));
	$GAME["template"]->setVar("attackers_stations",0);
	$GAME["template"]->setVar("attackers_lightcruisers",$GAME["template"]->formatNumber($strength_attackers_lightcruisers));
	$GAME["template"]->setVar("attackers_heavycruisers",$GAME["template"]->formatNumber($strength_attackers_heavycruisers));

	$GAME["template"]->setVar("defenders_soldiers",$strength_defenders_soldiers);
	$GAME["template"]->setVar("defenders_fighters",$GAME["template"]->formatNumber($strength_defenders_fighters));
	$GAME["template"]->setVar("defenders_stations",$GAME["template"]->formatNumber($strength_defenders_stations));
	$GAME["template"]->setVar("defenders_lightcruisers",$GAME["template"]->formatNumber($strength_defenders_lightcruisers));
	$GAME["template"]->setVar("defenders_heavycruisers",$GAME["template"]->formatNumber($strength_defenders_heavycruisers));

	$units = array("soldiers","fighters","stations","lightcruisers","heavycruisers");
	for ($i=0;$i<count($units);$i++) {

		$attackers = ${"strength_attackers_".$units[$i]};
		$defenders = ${"strength_defenders_".$units[$i]};
		$attackers_percent = 50;
		$defenders_percent = 50;
		if (!(($attackers == 0) && ($defenders == 0))) {
			if ($attackers == 0) {
				$attackers_percent = 0;
				$defenders_percent = 100;
			} elseif ($defenders==0) {
				$attackers_percent = 100;
				$defenders_percent = 0;
			} else {
				$p = round(($attackers / ($attackers+$defenders))*100);
				$attackers_percent = $p;
				$defenders_percent = 100 - $p;
			}		
		}
	
		$GAME["template"]->setVar("attackers_".$units[$i]."_percent",$attackers_percent);
		$GAME["template"]->setVar("defenders_".$units[$i]."_percent",$defenders_percent);
	}


	// Assault (Rounds)
	$fields = array("SPACE","ORBITAL","GROUND");

	for ($z=0;$z<count($fields);$z++) {
		$rounds = array();
		$max_defense = 0;
		$max_attack = 0;
	
		for ($j=0;$j<count($invasion_data["total_strength"][$fields[$z]]);$j++) {
			$data = $invasion_data["total_strength"][$fields[$z]][$j];
			$round = array();
			$round["round"] = $j+1;

			$max_value = 0;
			while(list($key,$value) = each($data["attack"])) {
				if ($value > $max_value) $max_value = $value;
			}

			while(list($key,$value) = each($data["defense"])) {
				if ($value > $max_value) $max_value = $value;
			}

			reset($data["attack"]);
			reset($data["defense"]);

			$round["img_attack"] = "";
			$count = 0;
			if ($max_value == 0) $max_value = 1;
			
			while(list($key,$value) = each($data["attack"])) {
				$max =floor((($value/$max_value)*20));
				for ($k=0;$k<$max;$k++) {
					$round["img_attack"] .= "<img style=\"border:1px solid darkred;margin:2px\" width=24 height=24 src=\"../images/game/icons/army/".$key."_0.gif\">";
					$count++;
				}
			}

			if ($count > $max_attack) $max_attack = $count;

			for ($k=0;$k<($max_attack-$count);$k++) 
				$round["img_attack"] .= "<img style=\"border:1px solid darkblue;margin:2px\" width=24 height=24 src=\"../images/game/destroyed.png\">";

			$round["img_defense"] = "";
			$count = 0;
			while(list($key,$value) = each($data["defense"])) {
				if ($max_value == 0) $max_value = 1;

				$max =floor((($value/$max_value)*20));
				for ($k=0;$k<$max;$k++) {
					$round["img_defense"] .= "<img style=\"border:1px solid darkblue;margin:2px\" width=24 height=24 src=\"../images/game/icons/army/".$key."_0.gif\">";
					$count++;
				}
			}

			if ($count > $max_defense) $max_defense = $count;

			for ($k=0;$k<($max_defense-$count);$k++) 
				$round["img_defense"] .= "<img style=\"border:1px solid darkblue;margin:2px\" width=24 height=24 src=\"../images/game/destroyed.png\">";


			$rounds[] = $round;
		}

		$GAME["template"]->setLoop(strtolower($fields[$z])."_rounds",$rounds);
	}

	// after attack
	$army_attack = array();
	for ($i=0;$i<count($invasion_data["params"]["army_attack"]);$i++) {
		$data = $invasion_data["params"]["army_attack"][$i];
		if (isset($data["convoy_soldiers"])) $data["soldiers"] = $data["convoy_soldiers"];
		if (isset($data["convoy_fighters"])) $data["fighters"] = $data["convoy_fighters"];
		if (isset($data["convoy_lightcruisers"])) $data["lightcruisers"] = $data["convoy_lightcruisers"];
		if (isset($data["convoy_heavycruisers"])) $data["heavycruisers"] = $data["convoy_heavycruisers"];
		if (isset($data["convoy_carriers"])) $data["carriers"] = $data["convoy_carriers"];
		if (isset($data["convoy_stations"])) $data["stations"] = $data["convoy_stations"];

		if (isset($data["convoy_soldiers_level"])) $data["soldiers_level"] = $data["convoy_soldiers_level"];
		$data["stations_level"] = 0;
		if (isset($data["convoy_fighters_level"])) $data["fighters_level"] = $data["convoy_fighters_level"];
		if (isset($data["convoy_lightcruisers_level"])) $data["lightcruisers_level"] = $data["convoy_lightcruisers_level"];
		if (isset($data["convoy_heavycruisers_level"])) $data["heavycruisers_level"] = $data["convoy_heavycruisers_level"];
		if (isset($data["convoy_carriers_level"])) $data["carriers_level"] = $data["convoy_carriers_level"];
	
		if (!isset($data["stations"])) $data["stations"] = 0;
		$data["empire_id"] = $data["empire_from"];
		$data["game_id"] = $_SESSION["game"];

		$data["soldiers2"] = $data["soldiers"] - $data["casualties_soldiers"];
		$data["fighters2"] = $data["fighters"] - $data["casualties_fighters"];
		$data["stations2"] = 0;
		$data["lightcruisers2"] = $data["lightcruisers"] - $data["casualties_lightcruisers"];
		$data["heavycruisers2"] = $data["heavycruisers"] - $data["casualties_heavycruisers"];
		$data["carriers2"] = $data["carriers"] - $data["casualties_carriers"];

		$data["soldiers"] = $GAME["template"]->formatNumber($data["soldiers"]);
		$data["fighters"] = $GAME["template"]->formatNumber($data["fighters"]);
		$data["stations"] = $GAME["template"]->formatNumber($data["stations"]);
		$data["lightcruisers"] = $GAME["template"]->formatNumber($data["lightcruisers"]);
		$data["heavycruisers"] = $GAME["template"]->formatNumber($data["heavycruisers"]);
		$data["carriers"] = $GAME["template"]->formatNumber($data["carriers"]);


		$data["soldiers2"] = $GAME["template"]->formatNumber($data["soldiers2"]);
		$data["fighters2"] = $GAME["template"]->formatNumber($data["fighters2"]);
		$data["stations2"] = $GAME["template"]->formatNumber($data["stations2"]);
		$data["lightcruisers2"] = $GAME["template"]->formatNumber($data["lightcruisers2"]);
		$data["heavycruisers2"] = $GAME["template"]->formatNumber($data["heavycruisers2"]);
		$data["carriers2"] = $GAME["template"]->formatNumber($data["carriers2"]);

		$data["casualties_soldiers"] = $GAME["template"]->formatNumber($data["casualties_soldiers"]);
		$data["casualties_fighters"] = $GAME["template"]->formatNumber($data["casualties_fighters"]);
		$data["casualties_lightcruisers"] = $GAME["template"]->formatNumber($data["casualties_lightcruisers"]);
		$data["casualties_heavycruisers"] = $GAME["template"]->formatNumber($data["casualties_heavycruisers"]);
		$data["casualties_carriers"] = $GAME["template"]->formatNumber($data["casualties_carriers"]);


		$rs = $DB->Execute("SELECT name FROM game".$game_id."_tb_empire WHERE id='".$data["empire_id"]."'");
		$data["empire_name"] = $rs->fields["name"];
		$army_attack[] = $data;
	}

	$GAME["template"]->setLoop("attackers2",$army_attack);

	$army_defense = array();
	for ($i=0;$i<count($invasion_data["params"]["army_defense"]);$i++) {
		$data = $invasion_data["params"]["army_defense"][$i];
		if (isset($data["convoy_soldiers"])) $data["soldiers"] = $data["convoy_soldiers"];
		if (isset($data["convoy_fighters"])) $data["fighters"] = $data["convoy_fighters"];
		if (isset($data["convoy_stations"])) $data["stations"] = $data["convoy_stations"];
		if (!isset($data["stations"])) $data["stations"] = 0;
		if (!isset($data["stations_level"])) $data["stations_level"] = 0;
		if (isset($data["convoy_lightcruisers"])) $data["lightcruisers"] = $data["convoy_lightcruisers"];
		if (isset($data["convoy_heavycruisers"])) $data["heavycruisers"] = $data["convoy_heavycruisers"];
		if (isset($data["convoy_carriers"])) $data["carriers"] = $data["convoy_carriers"];
		if (isset($data["empire_from"])) $data["empire_id"] = $data["empire_from"];
		if (isset($data["empire"])) $data["empire_id"] = $data["empire"];


		$data["casualties_carriers"] = 0;
		$data["soldiers2"] = $data["soldiers"] - $data["casualties_soldiers"];
		$data["fighters2"] = $data["fighters"] - $data["casualties_fighters"];
		$data["stations2"] = $data["stations"] - $data["casualties_stations"];
		$data["lightcruisers2"] = $data["lightcruisers"] - $data["casualties_lightcruisers"];
		$data["heavycruisers2"] = $data["heavycruisers"] - $data["casualties_heavycruisers"];
		$data["carriers2"] = $data["carriers"] - $data["casualties_carriers"];

		$data["soldiers"] = $GAME["template"]->formatNumber($data["soldiers"]);
		$data["fighters"] = $GAME["template"]->formatNumber($data["fighters"]);
		$data["stations"] = $GAME["template"]->formatNumber($data["stations"]);
		$data["lightcruisers"] = $GAME["template"]->formatNumber($data["lightcruisers"]);
		$data["heavycruisers"] = $GAME["template"]->formatNumber($data["heavycruisers"]);
		$data["carriers"] = $GAME["template"]->formatNumber($data["carriers"]);

		$data["soldiers2"] = $GAME["template"]->formatNumber($data["soldiers2"]);
		$data["fighters2"] = $GAME["template"]->formatNumber($data["fighters2"]);
		$data["stations2"] = $GAME["template"]->formatNumber($data["stations2"]);
		$data["lightcruisers2"] = $GAME["template"]->formatNumber($data["lightcruisers2"]);
		$data["heavycruisers2"] = $GAME["template"]->formatNumber($data["heavycruisers2"]);
		$data["carriers2"] = $GAME["template"]->formatNumber($data["carriers2"]);

		$data["casualties_soldiers"] = $GAME["template"]->formatNumber($data["casualties_soldiers"]);
		$data["casualties_fighters"] = $GAME["template"]->formatNumber($data["casualties_fighters"]);
		$data["casualties_stations"] = $GAME["template"]->formatNumber($data["casualties_stations"]);
		$data["casualties_lightcruisers"] = $GAME["template"]->formatNumber($data["casualties_lightcruisers"]);
		$data["casualties_heavycruisers"] = $GAME["template"]->formatNumber($data["casualties_heavycruisers"]);
		$data["casualties_carriers"] = $GAME["template"]->formatNumber($data["casualties_carriers"]);

		$data["game_id"] = $_SESSION["game"];
		$rs = $DB->Execute("SELECT name FROM game".$game_id."_tb_empire WHERE id='".$data["empire_id"]."'");
		$data["empire_name"] = $rs->fields["name"];
		$army_defense[] = $data;
	}

	$GAME["template"]->setLoop("defenders2",$army_defense);

	if ($invasion_data["params"]["ground_won"]) { 
		$GAME["template"]->setVar("invasion_outcome",T_("Invasion won"));

		$GAME["template"]->setVar("outcome_lost_population",$GAME["template"]->formatNumber($invasion_data["params"]["lost_population"]));
		$GAME["template"]->setVar("outcome_lost_credits",$GAME["template"]->formatNumber($invasion_data["params"]["lost_credits"]));

		$GAME["template"]->setVar("outcome_lost_food_planets",$GAME["template"]->formatNumber($invasion_data["params"]["lost_food_planets"]));
		$GAME["template"]->setVar("outcome_lost_ore_planets",$GAME["template"]->formatNumber($invasion_data["params"]["lost_ore_planets"]));
		$GAME["template"]->setVar("outcome_lost_tourism_planets",$GAME["template"]->formatNumber($invasion_data["params"]["lost_tourism_planets"]));
		$GAME["template"]->setVar("outcome_lost_supply_planets",$GAME["template"]->formatNumber($invasion_data["params"]["lost_supply_planets"]));
		$GAME["template"]->setVar("outcome_lost_gov_planets",$GAME["template"]->formatNumber($invasion_data["params"]["lost_gov_planets"]));
		$GAME["template"]->setVar("outcome_lost_edu_planets",$GAME["template"]->formatNumber($invasion_data["params"]["lost_edu_planets"]));
		$GAME["template"]->setVar("outcome_lost_urban_planets",$GAME["template"]->formatNumber($invasion_data["params"]["lost_urban_planets"]));
		$GAME["template"]->setVar("outcome_lost_petro_planets",$GAME["template"]->formatNumber($invasion_data["params"]["lost_petro_planets"]));
		$GAME["template"]->setVar("outcome_lost_antipollu_planets",$GAME["template"]->formatNumber($invasion_data["params"]["lost_antipollu_planets"]));
		$GAME["template"]->setVar("outcome_lost_research_planets",$GAME["template"]->formatNumber($invasion_data["params"]["lost_research_planets"]));

		$GAME["template"]->setVar("invasion_won",true);
	} else {
		$GAME["template"]->setVar("invasion_won",false);
	}

	print $GAME["template"]->render();
	die();
}

////////////////////////////////////////////////////////////////////////////////////
// Display page
////////////////////////////////////////////////////////////////////////////////////
$GAME["template"]->setPage("last_invasions.html");

$invasions = array();

$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_invasion WHERE empire_id='".$_SESSION["empire_id"]."' ORDER BY id DESC");
while(!$rs->EOF) {

	$invasion_data = unserialize(base64_decode($rs->fields["data"]));
	$outcome = T_("Invasion failed");
	if ($invasion_data["params"]["ground_won"] && $invasion_data["params"]["space_won"] && $invasion_data["params"]["orbital_won"]) $outcome = T_("Invasion won");
	$type = "???";

	for ($i=0;$i<count($invasion_data["params"]["army_attack"]);$i++) {
		if ($invasion_data["params"]["army_attack"][$i]["empire_from"] == $GAME["empire"]->data["id"]) {
			if ($i == 0) 
				$type = T_("Invading empire");
			else
				$type = T_("Invading ally");
			break;
		}
	}


	for ($i=0;$i<count($invasion_data["params"]["army_defense"]);$i++) {
		$key = "empire_from";
		if ($i == 0) $key = "empire";

		if ($invasion_data["params"]["army_defense"][$i][$key] == $GAME["empire"]->data["id"]) {
			if ($i == 0) 
				$type = T_("Defending empire");
			else
				$type = T_("Defending ally");
			break;
		}
	}


	if ($outcome == T_("Invasion won"))
		$bgcolor = "red";
	else
		$bgcolor = "#660000";


	$invasions[] = array("bgcolor"=>$bgcolor,"id"=>$rs->fields["id"],"date"=>$GAME["template"]->formatTime(time() - $rs->fields["date"]),"outcome"=>$outcome,"type"=>$type);
	$rs->MoveNext();
}

$GAME["template"]->setLoop("invasions",$invasions);

print $GAME["template"]->render();
$DB->CompleteTrans();
?>
