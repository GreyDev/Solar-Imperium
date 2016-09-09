<?php
// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //

if (!isset($_SESSION["game"])) die(T_("No game selected!"));
$game_id = $_SESSION["game"];

// verify if session is active
$active = $GAME["session"]->isActive();

if ($active == 0) $GAME["system"]->redirect("../welcome.php");

if (!isset($_SESSION["player"])) $GAME["system"]->redirect("../welcome.php");


////////////////////////////////////////////////////////////////////
// security and basic handling
////////////////////////////////////////////////////////////////////
$empire_loaded = $GAME["empire"]->load($_SESSION["empire_id"]);


if ($empire_loaded["code"] == false) 
	$GAME["system"]->redirect("../welcome.php",array("WARNING"=>$empire_loaded["desc"]));

if ($GAME["empire"]->data["player_id"] != $_SESSION["player"]["id"]) {
		$_SESSION["player"] = null;
		session_destroy();

		die("<script>window.top.location = '../gamesbrowser.php';</script>");
}


$output = $GAME["empire"]->checkForEnoughCredits();
if ($output != "") $GAME["template"]->showNotice($output,true);

$output = $GAME["empire"]->checkForEnoughFood();
if ($output != "") $GAME["template"]->showNotice($output,true);

$output = $GAME["empire"]->checkForEnoughOre();
if ($output != "") $GAME["template"]->showNotice($output,true);

$output = $GAME["empire"]->checkForEnoughPetroleum();
if ($output != "") $GAME["template"]->showNotice($output,true);


if ($GAME["empire"]->data["active"] != 2) // already collapsed
if (!$GAME["empire"]->checkForEnoughPopulation()) {

	$GAME["empire"]->collapse();
	$GAME["empire"]->updateNetworth();
	$GAME["empire"]->save();

} else {

	$GAME["empire"]->updateNetworth();
	$GAME["empire"]->save();
	
}


    if ($GAME["empire"]->data["active"]==2) {

        $file = $_SERVER["SCRIPT_FILENAME"];
	$file = explode("/",$file);
	$file = $file[count($file)-1];

        if (($file != "ingame_starmap.php") && ($file != "destroy_empire.php"))
            $GAME["template"]->showNotice($GAME["template"]->showFile("collapsed.html"),true);
		
	unset($_POST);
	unset($_GET);

	$valid_pages = array("lastturn.php","logs.php","stats.php","destroy_empire.php");	
	if (!in_array($file,$valid_pages)) $GAME["system"]->redirect("lastturn.php");
}



if ($GAME["template"]->coord["game_status"]==1) {
	
	unset($_POST);
	unset($_GET);
	$file = $_SERVER["SCRIPT_FILENAME"];
	$file = explode("/",$file);
	$file = $file[count($file)-1];

	$valid_pages = array("starmap.php");	
	if (!in_array($file,$valid_pages)) $GAME["system"]->redirect("hall_of_fame.php");
}


////////////////////////////////////////////////////////////////////////////////////
// display variables
////////////////////////////////////////////////////////////////////////////////////

$GAME["template"]->setVar("empire_short",$GAME["empire"]->data["name"]);
$GAME["template"]->setVar("emperor_short",$GAME["empire"]->data["emperor"]);

// time /turns related 
$day = 60*60*24;
$timeslice = floor($day/CONF_TURNS_PER_DAY);
$elapsed = time(NULL) - $GAME["template"]->coord["last_turns_update"];
		
$GAME["template"]->setVar("creation_date",$GAME["empire"]->data["date"]);
$GAME["template"]->setVar("networth",$GAME["empire"]->data["networth"]);
$GAME["template"]->setVar("credits",$GAME["empire"]->data["credits"]);
$GAME["template"]->setVar("population",$GAME["empire"]->data["population"]);
$GAME["template"]->setVar("gender",($GAME["empire"]->data["gender"]=="M"?T_("Emperor"):T_("Emperess")));
if ($GAME["empire"]->data["active"]==2)
	$GAME["template"]->setVar("civil_status",T_("Collapsed"));
else
	$GAME["template"]->setVar("civil_status",$CONF_CIVIL_STATUS[$GAME["empire"]->data["civil_status"]]);

$total_planets = 0;
for ($i=0;$i<count($CONF_PLANETS);$i++)
	$total_planets += $GAME["empire"]->planets->data[$CONF_PLANETS[$i]."_planets"];

$timestamp = time();
$GAME["template"]->setVar("timestamp",$timestamp);
$GAME["template"]->setVar("food",$GAME["empire"]->data["food"]);
$GAME["template"]->setVar("petroleum",$GAME["empire"]->data["petroleum"]);
$GAME["template"]->setVar("ore",$GAME["empire"]->data["ore"]);
$GAME["template"]->setVar("covertagents",$GAME["empire"]->army->data["covertagents"]);
$GAME["template"]->setVar("effectiveness",$GAME["empire"]->army->data["effectiveness"]);
$GAME["template"]->setVar("soldiers",$GAME["empire"]->army->data["soldiers"]);
$GAME["template"]->setVar("fighters",$GAME["empire"]->army->data["fighters"]);
$GAME["template"]->setVar("stations",$GAME["empire"]->army->data["stations"]);
$GAME["template"]->setVar("light_cruisers",$GAME["empire"]->army->data["lightcruisers"]);
$GAME["template"]->setVar("heavy_cruisers",$GAME["empire"]->army->data["heavycruisers"]);
$GAME["template"]->setVar("carriers",$GAME["empire"]->army->data["carriers"]);
$GAME["template"]->setVar("planets_count",$GAME["empire"]->planets->getCount());
$GAME["template"]->setVar("research_level",$GAME["empire"]->data["research_level"]);
$GAME["template"]->setVar("turns_played",$GAME["empire"]->data["turns_played"]);
$GAME["template"]->setVar("turns_left",$GAME["empire"]->data["turns_left"]);
$GAME["template"]->setVar("protection_turns_left",$GAME["empire"]->data["protection_turns_left"]);

// research icons
$GAME["template"]->setVar("soldiers_level",$GAME["empire"]->army->data["soldiers_level"]);
$GAME["template"]->setVar("fighters_level",$GAME["empire"]->army->data["fighters_level"]);
$GAME["template"]->setVar("stations_level",$GAME["empire"]->army->data["stations_level"]);
$GAME["template"]->setVar("covertagents_level",$GAME["empire"]->army->data["covertagents_level"]);
$GAME["template"]->setVar("lightcruisers_level",$GAME["empire"]->army->data["lightcruisers_level"]);
$GAME["template"]->setVar("heavycruisers_level",$GAME["empire"]->army->data["heavycruisers_level"]);
$GAME["template"]->setVar("carriers_level",$GAME["empire"]->army->data["carriers_level"]);

// planets
$GAME["template"]->setVar("food_planets",$GAME["empire"]->planets->data["food_planets"]);
$GAME["template"]->setVar("ore_planets",$GAME["empire"]->planets->data["ore_planets"]);
$GAME["template"]->setVar("tourism_planets",$GAME["empire"]->planets->data["tourism_planets"]);
$GAME["template"]->setVar("supply_planets",$GAME["empire"]->planets->data["supply_planets"]);
$GAME["template"]->setVar("gov_planets",$GAME["empire"]->planets->data["gov_planets"]);
$GAME["template"]->setVar("edu_planets",$GAME["empire"]->planets->data["edu_planets"]);
$GAME["template"]->setVar("research_planets",$GAME["empire"]->planets->data["research_planets"]);
$GAME["template"]->setVar("urban_planets",$GAME["empire"]->planets->data["urban_planets"]);
$GAME["template"]->setVar("petro_planets",$GAME["empire"]->planets->data["petro_planets"]);
$GAME["template"]->setVar("antipollu_planets",$GAME["empire"]->planets->data["antipollu_planets"]);

$GAME["template"]->setVar("total_planets",$total_planets);
$GAME["template"]->setVar("max_planets",CONF_MAX_PLANET_BUY);

// production
$GAME["template"]->setVar("food_short",$GAME["template"]->ShowProductionLevel($GAME["empire"]->production->data["food_short"]));
$GAME["template"]->setVar("ore_short",$GAME["template"]->ShowProductionLevel($GAME["empire"]->production->data["ore_short"]));
$GAME["template"]->setVar("tourism_short",$GAME["template"]->ShowProductionLevel($GAME["empire"]->production->data["tourism_short"]));
$GAME["template"]->setVar("supply_short",$GAME["template"]->ShowProductionLevel($GAME["empire"]->production->data["supply_short"]));
$GAME["template"]->setVar("edu_short",$GAME["template"]->ShowProductionLevel($GAME["empire"]->production->data["edu_short"]));
$GAME["template"]->setVar("research_short",$GAME["template"]->ShowProductionLevel($GAME["empire"]->production->data["research_short"]));
$GAME["template"]->setVar("urban_short",$GAME["template"]->ShowProductionLevel($GAME["empire"]->production->data["urban_short"]));
$GAME["template"]->setVar("petro_short",$GAME["template"]->ShowProductionLevel($GAME["empire"]->production->data["petro_short"]));
$GAME["template"]->setVar("antipollu_short",$GAME["template"]->ShowProductionLevel($GAME["empire"]->production->data["antipollu_short"]));
$GAME["template"]->setVar("gov_short",$GAME["template"]->ShowProductionLevel(100));

$GAME["template"]->setVar("food_short_xml",$GAME["empire"]->production->data["food_short"]);
$GAME["template"]->setVar("ore_short_xml",$GAME["empire"]->production->data["ore_short"]);
$GAME["template"]->setVar("tourism_short_xml",$GAME["empire"]->production->data["tourism_short"]);
$GAME["template"]->setVar("supply_short_xml",$GAME["empire"]->production->data["supply_short"]);
$GAME["template"]->setVar("edu_short_xml",$GAME["empire"]->production->data["edu_short"]);
$GAME["template"]->setVar("research_short_xml",$GAME["empire"]->production->data["research_short"]);
$GAME["template"]->setVar("urban_short_xml",$GAME["empire"]->production->data["urban_short"]);
$GAME["template"]->setVar("petro_short_xml",$GAME["empire"]->production->data["petro_short"]);
$GAME["template"]->setVar("antipollu_short_xml",$GAME["empire"]->production->data["antipollu_short"]);
$GAME["template"]->setVar("gov_short_xml",100);


$GAME["template"]->setVar("empire_id",$GAME["empire"]->data["id"]);

if (file_exists("../images/game/empires/$game_id/".$_SESSION["empire_id"].".jpg"))
	$GAME["template"]->setVar("logo","../images/game/empires/$game_id/".$_SESSION["empire_id"].".jpg");
else
	$GAME["template"]->setVar("logo","img_logo.php?empire=".$_SESSION["empire_id"]);



$GAME["template"]->setVar("emperor_avatar","../show_avatar.php?id=".$GAME["empire"]->data["player_id"]);
	


$file = explode("/",$_SERVER["SCRIPT_FILENAME"]);
$file = $file[count($file)-1];


////////////////////////////////////////////////////////////////////////////////////
// Display unseen events
////////////////////////////////////////////////////////////////////////////////////

$events = new EventRenderer($DB,$GAME["template"]);
$events_data = $events->displayUnseenEvents($GAME["empire"]->data);
//$GAME["template"]->events_height = $events_data["total_height"];
$GAME["template"]->events_height = "320px";
$events_data = $events_data["events_output"];

for ($i=0;$i<count($events_data);$i++) {
	$GAME["template"]->showEvent($events_data[$i][1],false,$events_data[$i][0]);	
}

if ($file != "blackmarket.php")
	if ($GAME["empire"]->data["blackmarket"]==1)
        $GAME["template"]->showNotice(
            "<table><tr><td><img width=\"32\"  style=\"border:1px solid yellow\" src=\"../images/game/blackmarket.jpg\"></td><td><a class=\"link\" href=\"blackmarket.php\"><b>".T_("Your covert agents successfully contacted illegal black market! Click here to visit the market.")."</b></a></td></tr></table>"
  );


////////////////////////////////////////////////////////////////////////////////////
// Handle AI
////////////////////////////////////////////////////////////////////////////////////
if (defined("BOT_UPDATE")) {
    require_once($path_prefix."include/update/handle_ai.php");
    HandleAITurns(addslashes($_SESSION["game"]));
}


?>
