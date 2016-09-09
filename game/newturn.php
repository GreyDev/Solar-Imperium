<?php

// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //

define("LANGUAGE_DOMAIN","game");

require_once ("../include/game/init.php");
require_once ("../include/game/init_ingame.php");
require_once ("../include/game/newturn/pirateraid.php");
require_once ("../include/game/newturn/researchgrowth.php");
require_once ("../include/game/newturn/marketgrowth.php");
require_once ("../include/game/newturn/foodgrowth.php");
require_once ("../include/game/newturn/oregrowth.php");
require_once ("../include/game/newturn/petroleumgrowth.php");
require_once ("../include/game/newturn/moneygrowth.php");
require_once ("../include/game/newturn/military_production.php");
require_once ("../include/game/newturn/populationgrowth.php");
require_once ("../include/game/newturn/randomevent.php");
require_once ("../include/game/newturn/civilstatus.php");
require_once ("../include/game/newturn/lottery.php");
require_once ("../include/game/newturn/blackmarket.php");
require_once("../include/update/victory_condition.php");

/* Updating turns count */

if ($GAME["empire"]->data["turns_left"] == 0) {
	
	$GAME["system"]->redirect("manage.php",array("WARNING"=>T_("No more turns for now!")));
}

$GAME["empire"]->data["turns_left"]--;

if ($GAME["empire"]->data["protection_turns_left"] == 1)
{
	print $GAME["template"]->showNotice(T_("You are out of protection!"));
}

if ($GAME["empire"]->data["protection_turns_left"] > 0) 
	$GAME["empire"]->data["protection_turns_left"]--;

$GAME["empire"]->data["turns_played"]++;


/* Updating covert points */

$GAME["empire"]->army->data["covert_points"] += CONF_COVERTPOINTS_PER_TURN;
if ($GAME["empire"]->army->data["covert_points"] > CONF_MAX_COVERTPOINTS) 
	$GAME["empire"]->army->data["covert_points"] = CONF_MAX_COVERTPOINTS;

/* Reset specific values */	
$GAME["empire"]->data["planets_bought"] = 0;
$GAME["empire"]->data["already_attacked"] = 0;
$GAME["empire"]->data["last_turn_date"] = time(NULL);
$GAME["empire"]->data["food_traded"] = 0;
$GAME["empire"]->data["ore_traded"] = 0;
$GAME["empire"]->data["petroleum_traded"] = 0;


$evt = new EventCreator($DB);
$evt->type = CONF_EVENT_NEWTURN;
$evt->from = -1;
$evt->seen = 1;
$evt->to = $_SESSION["empire_id"];
$evt->params = array("turns_played"=>$GAME["empire"]->data["turns_played"]);
$evt->send();


/* Army effectiveness */
if ($GAME["empire"]->army->data["effectiveness"] != 100)
if ($GAME["empire"]->army->data["effectiveness"] < 100)
{
	$GAME["empire"]->army->data["effectiveness"] += CONF_EFFECTIVENESS_GROWTH_PER_TURN;
	if ($GAME["empire"]->army->data["effectiveness"] > 100) $GAME["empire"]->army->data["effectiveness"] = 100;
} else {
	$GAME["empire"]->army->data["effectiveness"] -= CONF_EFFECTIVENESS_GROWTH_PER_TURN;
	if ($GAME["empire"]->army->data["effectiveness"] < 100) $GAME["empire"]->army->data["effectiveness"] = 100;
}

NewTurn_HandlePirateRaid($game_id, $GAME["empire"]);
NewTurn_HandleResearchGrowth($game_id, $GAME["empire"]);
NewTurn_HandleMarketGrowth($game_id, $GAME["empire"]);
NewTurn_HandleMilitaryProduction($game_id, $GAME["empire"]);
NewTurn_HandlePopulationGrowth($game_id, $GAME["empire"]);
NewTurn_HandleFoodGrowth($game_id, $GAME["empire"]);
NewTurn_HandleOreGrowth($game_id, $GAME["empire"]);
NewTurn_HandlePetroleumGrowth($game_id, $GAME["empire"]);
NewTurn_HandleMoneyGrowth($game_id, $GAME["empire"]);
NewTurn_PickRandomEvent($game_id, $GAME["empire"]);
NewTurn_HandleCivilStatus($game_id, $GAME["empire"]);
NewTurn_HandleLotteryPayout($game_id, $GAME["empire"]);
NewTurn_HandleBlackMarket($game_id, $GAME["empire"]);


/* Updating empire inflation */
$GAME["empire"]->data["inflation"] += CONF_COST_INFLATION;


// UPDATING production
$production_food_short = $GAME["empire"]->production->data["food_short"];
$production_food_long = $GAME["empire"]->production->data["food_long"];
$production_ore_short = $GAME["empire"]->production->data["ore_short"];
$production_ore_long = $GAME["empire"]->production->data["ore_long"];
$production_tourism_short = $GAME["empire"]->production->data["tourism_short"];
$production_tourism_long = $GAME["empire"]->production->data["tourism_long"];
$production_supply_short = $GAME["empire"]->production->data["supply_short"];
$production_supply_long = $GAME["empire"]->production->data["supply_long"];
$production_edu_short = $GAME["empire"]->production->data["edu_short"];
$production_edu_long = $GAME["empire"]->production->data["edu_long"];
$production_research_short = $GAME["empire"]->production->data["research_short"];
$production_research_long = $GAME["empire"]->production->data["research_long"];
$production_urban_short = $GAME["empire"]->production->data["urban_short"];
$production_urban_long = $GAME["empire"]->production->data["urban_long"];
$production_petro_short = $GAME["empire"]->production->data["petro_short"];
$production_petro_long = $GAME["empire"]->production->data["petro_long"];
$production_antipollu_short = $GAME["empire"]->production->data["antipollu_short"];
$production_antipollu_long = $GAME["empire"]->production->data["antipollu_long"];

$production_food = ($production_food_short - $production_food_long)/10;
$production_ore = ($production_ore_short - $production_ore_long)/10;
$production_tourism = ($production_tourism_short - $production_tourism_long)/10;
$production_supply = ($production_supply_short - $production_supply_long)/10;
$production_edu = ($production_edu_short - $production_edu_long)/10;
$production_research = ($production_research_short - $production_research_long)/10;
$production_urban = ($production_urban_short - $production_urban_long)/10;
$production_petro = ($production_petro_short - $production_petro_long)/10;
$production_antipollu = ($production_antipollu_short - $production_antipollu_long)/10;

$GAME["empire"]->production->data["food_short"] -= $production_food;
$GAME["empire"]->production->data["ore_short"] -= $production_ore;
$GAME["empire"]->production->data["tourism_short"] -= $production_tourism;
$GAME["empire"]->production->data["supply_short"] -= $production_supply;
$GAME["empire"]->production->data["edu_short"] -= $production_edu;
$GAME["empire"]->production->data["research_short"] -= $production_research;
$GAME["empire"]->production->data["urban_short"] -= $production_urban;
$GAME["empire"]->production->data["petro_short"] -= $production_petro;
$GAME["empire"]->production->data["antipollu_short"] -= $production_antipollu;


$GAME["empire"]->updateStats();
$GAME["empire"]->save();


$evt = new EventCreator($DB);
$evt->type = CONF_EVENT_TURNCOMPLETED;
$evt->from = -1;
$evt->seen = 1;
$evt->to = $_SESSION["empire_id"];
$evt->params = array("turns_played"=>$GAME["empire"]->data["turns_played"]);
$evt->send();

$rs = $DB->Execute("SELECT * FROM system_tb_games WHERE id=".$_SESSION["game"]);

CheckVictoryCondition($rs->fields["id"],$rs->fields["victory_condition"],$rs->fields["name"],$rs->fields["lifetime"]);

$_SESSION["player"]["score"] += 1;

$DB->Execute("UPDATE system_tb_players SET score='" . addslashes($_SESSION["player"]["score"]) . "' WHERE id='".$_SESSION["player"]["id"]."'");


$msg= "----- TURN COMPLETED: (pop=".number_format($GAME["empire"]->data["population"]).
		",cr=".number_format($GAME["empire"]->data["credits"]).
		",food=".number_format($GAME["empire"]->data["food"]).
		",ore=".number_format($GAME["empire"]->data["ore"]).
		",petro=".number_format($GAME["empire"]->data["petroleum"]).
		",networth=".number_format($GAME["empire"]->data["networth"]).
		") -------";
trace_action($_SESSION["game"], $_SESSION["empire_id"], $msg);

$GAME["system"]->redirect("lastturn.php");
$DB->CompleteTrans();
?>
