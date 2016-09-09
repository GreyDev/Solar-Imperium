<?php


// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //

define("LANGUAGE_DOMAIN","game");

require_once ("../include/game/init.php");
require_once ("../include/game/init_ingame.php");

$time_now = time(NULL);


if (isset ($_GET["retreat"])) {

	$id = intval($_GET["retreat"]);
	$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_armyconvoy WHERE empire_from='" . $GAME["empire"]->data["id"] . "' AND (convoy_type='" . CONF_CONVOY_INVASION . "' OR convoy_type='" . CONF_CONVOY_DEFENSE . "') AND id='$id'");
	if (!$rs->EOF) {

		$time_total = ($rs->fields["time_end"] - $rs->fields["time_start"]);
		$time_remaining = ($rs->fields["time_end"] - time(NULL));
		$time_elapsed = time(NULL) - $rs->fields["time_start"];
		$time_percent = round(($time_elapsed /  $time_total) * 100);

		$convoy_type = CONF_CONVOY_INVASION_RETREAT;
		if ($rs->fields["convoy_type"] == CONF_CONVOY_DEFENSE)
			$convoy_type = CONF_CONVOY_DEFENSE_RETREAT;

		$new_time_start = time(NULL);
		$new_time_end = $new_time_start + $time_elapsed;

		$query = "UPDATE game".$game_id."_tb_armyconvoy SET convoy_type=$convoy_type,time_start=$new_time_start,time_end=$new_time_end WHERE id=" . $id;
		$DB->Execute($query);


		if ($time_percent < 20) {
			$GAME["empire"]->army->data["effectiveness"] -= 25;
			if ($GAME["empire"]->army->data["effectiveness"] < 10)
				$GAME["empire"]->army->data["effectiveness"] = 10;
		}

		$GAME["empire"]->save();
 
		$evt = new EventCreator($DB);
		$evt->from = -1;
		$evt->to = $rs->fields["empire_to"];
		$evt->type = CONF_EVENT_CONVOY_RETREAT;
		$evt->params = $rs->fields["empire_from"];
		$evt->send();
	}

	$GAME["system"]->redirect("battle.php");
	die();
}

////////////////////////////////////////////////////////////////////////////////////
// Display page
////////////////////////////////////////////////////////////////////////////////////
$GAME["template"]->setPage("battle.html");

/* Invasion soldiers */
$invasion_soldiers = $GAME["empire"]->army->data["soldiers"];
$carriers_needed = ceil($GAME["empire"]->army->data["soldiers"] * CONF_CARRIER_SOLDIER);
if (($carriers_needed) > $GAME["empire"]->army->data["carriers"]) {
	$percent = ($GAME["empire"]->army->data["carriers"] / $carriers_needed) * 100;
	$invasion_soldiers = floor(($invasion_soldiers / 100) * $percent);
}

$GAME["template"]->setVar("invasion_soldiers", $invasion_soldiers);

/* Invasion fighters */
$invasion_fighters = $GAME["empire"]->army->data["fighters"];
$carriers_needed = ceil($GAME["empire"]->army->data["fighters"] * CONF_CARRIER_FIGHTER);

if (($carriers_needed) > $GAME["empire"]->army->data["carriers"]) {
	$percent = ($GAME["empire"]->army->data["carriers"] / $carriers_needed) * 100;
	$invasion_fighters = floor(($invasion_fighters / 100) * $percent);
}

$GAME["template"]->setVar("invasion_fighters", $invasion_fighters);

/*Invasion  lightcruisers */
$invasion_lightcruisers = $GAME["empire"]->army->data["lightcruisers"];
$GAME["template"]->setVar("invasion_lightcruisers", $invasion_lightcruisers);

/* Invasion heavycruisers */
$invasion_heavycruisers = $GAME["empire"]->army->data["heavycruisers"];
$GAME["template"]->setVar("invasion_heavycruisers", $invasion_heavycruisers);

/* Guerilla Soldiers */
$guerilla_soldiers = $GAME["empire"]->army->data["soldiers"];
$GAME["template"]->setVar("guerilla_soldiers", $guerilla_soldiers);



// Display army convoys
$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_armyconvoy WHERE empire_from='" . $GAME["empire"]->data["id"] . "' OR empire_to='" . $GAME["empire"]->data["id"] . "' ORDER BY id ASC");
$convoys = array ();

while (!$rs->EOF) {
	$convoy = array ();

	$empire_from = $DB->Execute("SELECT emperor,name FROM game".$game_id."_tb_empire WHERE id='" . $rs->fields["empire_from"]."'");
	$empire_to = $DB->Execute("SELECT emperor,name FROM game".$game_id."_tb_empire WHERE id='" . $rs->fields["empire_to"]."'");

	$convoy["id"] = $rs->fields["id"];

	$convoy["convoy_type"] = T_("Invasion convoy");
	if (($rs->fields["convoy_type"] == CONF_CONVOY_DEFENSE) || ($rs->fields["convoy_type"] == CONF_CONVOY_DEFENSE_RETREAT))
		$convoy["convoy_type"] = T_("Defense convoy");

	$convoy["from_empire"] = $empire_from->fields["emperor"] . "@" . $empire_from->fields["name"];
	$convoy["target_empire"] = $empire_to->fields["emperor"] . "@" . $empire_to->fields["name"];
	if (($rs->fields["convoy_type"] == CONF_CONVOY_INVASION_RETREAT) || ($rs->fields["convoy_type"] == CONF_CONVOY_DEFENSE_RETREAT)) {
		$convoy["retreat"] = "";
		$convoy["convoy_type"] .= " *" . T_("Retreating") . "*";
	} else {

		if ($rs->fields["empire_from"] == $GAME["empire"]->data["id"])
			$convoy["retreat"] = T_("Retreat");
		else
			$convoy["retreat"] = "";


	}

	if ($rs->fields["convoy_type"] == CONF_CONVOY_INVASION)	$convoy["background"] = "convoy_invasion.jpg";
	if ($rs->fields["convoy_type"] == CONF_CONVOY_DEFENSE)	$convoy["background"] = "convoy_defense.jpg";
	if ($rs->fields["convoy_type"] == CONF_CONVOY_INVASION_RETREAT)	$convoy["background"] = "convoy_retreat.jpg";
	if ($rs->fields["convoy_type"] == CONF_CONVOY_DEFENSE_RETREAT)	$convoy["background"] = "convoy_retreat.jpg";

	$convoy["soldiers"] = $rs->fields["convoy_soldiers"];
	$convoy["fighters"] = $rs->fields["convoy_fighters"];
	$convoy["lightcruisers"] = $rs->fields["convoy_lightcruisers"];
	$convoy["heavycruisers"] = $rs->fields["convoy_heavycruisers"];
	$convoy["carriers"] = $rs->fields["carriers"];

	if ($rs->fields["time_end"] - $time_now < 0) 
		$convoy["time_left"] = "---"; 
	else
		$convoy["time_left"] = $GAME["template"]->formatTime($rs->fields["time_end"] - $time_now);

	$convoys[] = $convoy;
	$rs->MoveNext();
}

$GAME["template"]->setLoop("convoys", $convoys);



////////////////////////////////////////////////////////////////
// Populate empires
////////////////////////////////////////////////////////////////
$empires = array ();
$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_empire WHERE  active='1' AND protection_turns_left = '0' ORDER BY emperor ASC");
$you_networth = $GAME["empire"]->data["networth"] * 0.70;
$you_turns_played = $GAME["empire"]->data["turns_played"] * 0.80;

while (!$rs->EOF) {

	$attacked_by = explode(",",$rs->fields["attacked_by"]);

	if ($rs->fields["id"] != $GAME["empire"]->data["id"]) {

		if ($GAME["empire"]->coalition->isMember()) {

			if ($GAME["empire"]->coalition->isMemberFromId($rs->fields["id"])) {
				$rs->MoveNext();
				continue;
			}

		}

		$empire_turns_played = $rs->fields["turns_played"];
		$empire_networth = $rs->fields["networth"];

		if (!in_array($rs->fields["id"],$attacked_by)) 
		  if ($empire_turns_played < $you_turns_played) {
			  if ($empire_networth < $you_networth) {
				  $rs->MoveNext();
				  continue;
			  }
		  }
		
		$rs2 = $DB->Execute("SELECT COUNT(*) FROM game".$game_id."_tb_armyconvoy WHERE ". 
		"(empire_from='".$GAME["empire"]->data["id"]."' AND empire_to='".$rs->fields["id"]."' AND convoy_type='".CONF_CONVOY_INVASION."') OR ".
		"(empire_to='".$GAME["empire"]->data["id"]."' AND empire_from='".$rs->fields["id"]."' AND convoy_type='".CONF_CONVOY_INVASION_RETREAT."')");
		
		if ($rs2->fields[0] > 0) {
				$rs->MoveNext();
				continue;
		}
		
		
		if ($GAME["empire"]->diplomacy->treatyFrom($rs->fields["id"]) == null) {
			$empire = array ();
			$empire["id"] = $rs->fields["id"];
			$empire["name"] = $GAME["template"]->displayEmpire($rs->fields["emperor"], $rs->fields["name"], $GAME["empire"]->data["networth"]);

			$rs2 = $DB->Execute("SELECT game".$game_id."_tb_coalition.name FROM game".$game_id."_tb_member,game".$game_id."_tb_coalition WHERE game".$game_id."_tb_member.empire='" . $rs->fields["id"] . "' AND game".$game_id."_tb_member.coalition = game".$game_id."_tb_coalition.id");
			if (!$rs2->EOF)
				$empire["name"] .= " [" . $rs2->fields["name"] . "]";

			$empires[] = $empire;
		}

	}

	$rs->MoveNext();
}

$GAME["template"]->setLoop("empires", $empires);

/* Populate pirates */
$pirates = array ();
$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_pirate ORDER BY name ASC");
while (!$rs->EOF) {
	$pirate = array ();
	$pirate["id"] = $rs->fields["id"];
	$pirate["name"] = $rs->fields["name"]; // . " (Nwt: " . $GAME["template"]->formatNumber($rs->fields["networth"]) . ")";
	$pirates[] = $pirate;

	$rs->MoveNext();
}

$GAME["template"]->setLoop("pirates", $pirates);

if ($GAME["empire"]->data["have_nukes"] == 1)
	$GAME["template"]->TPL->assign("do_nuclear_warfare",true);
else
	$GAME["template"]->TPL->assign("do_nuclear_warfare",false);

print $GAME["template"]->render();
$DB->CompleteTrans();

?>
