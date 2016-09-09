<?php
// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //

define("LANGUAGE_DOMAIN","game");


require_once("../include/game/init.php");
require_once("../include/game/init_ingame.php");



//////////////////////////////////////////////////////////////////////////////
// handling post/get
//////////////////////////////////////////////////////////////////////////////

if (isset($_POST["taxrate"]))
{
	$GAME["empire"]->data["taxrate"] = round($_POST["taxrate"]);

	$GAME["empire"]->data["food_rate"] = round($_POST["food_rate"]);
	$GAME["empire"]->data["ore_rate"] = round($_POST["ore_rate"]);
	$GAME["empire"]->data["petroleum_rate"] = round($_POST["petroleum_rate"]);
	$GAME["empire"]->data["research_rate"] = round($_POST["research_rate"]);

	$GAME["empire"]->supply->data["rate_soldier"] = round($_POST["rate_soldier"]);
	$GAME["empire"]->supply->data["rate_fighter"] = round($_POST["rate_fighter"]);
	$GAME["empire"]->supply->data["rate_station"] = round($_POST["rate_station"]);
	$GAME["empire"]->supply->data["rate_heavycruiser"] = round($_POST["rate_heavycruiser"]);
	$GAME["empire"]->supply->data["rate_carrier"] = round($_POST["rate_carrier"]);
	$GAME["empire"]->supply->data["rate_covert"] = round($_POST["rate_covert"]);
	$GAME["empire"]->supply->data["rate_credits"] = round($_POST["rate_credits"]);
	

	if ($GAME["empire"]->supply->data["rate_soldier"] < 0) $GAME["empire"]->supply->data["rate_soldier"] = 0;
	if ($GAME["empire"]->supply->data["rate_fighter"] < 0) $GAME["empire"]->supply->data["rate_fighter"] = 0;
	if ($GAME["empire"]->supply->data["rate_station"] < 0) $GAME["empire"]->supply->data["rate_station"] = 0;
	if ($GAME["empire"]->supply->data["rate_heavycruiser"] < 0) $GAME["empire"]->supply->data["rate_heavycruiser"] = 0;
	if ($GAME["empire"]->supply->data["rate_carrier"] < 0) $GAME["empire"]->supply->data["rate_carrier"] = 0;
	if ($GAME["empire"]->supply->data["rate_covert"] < 0) $GAME["empire"]->supply->data["rate_covert"] = 0;
	if ($GAME["empire"]->supply->data["rate_credits"] < 0) $GAME["empire"]->supply->data["rate_credits"] = 0;

	// if total exceed 100% something is going wrong :)
	if (($GAME["empire"]->supply->data["rate_soldier"] + 
	$GAME["empire"]->supply->data["rate_fighter"] + 
	$GAME["empire"]->supply->data["rate_station"] +
	$GAME["empire"]->supply->data["rate_heavycruiser"] + 
	$GAME["empire"]->supply->data["rate_carrier"] + 
	$GAME["empire"]->supply->data["rate_credits"] + 
	$GAME["empire"]->supply->data["rate_covert"]) != 100)
	{
		$GAME["system"]->redirect("edit_production.php",array("WARNING"=>T_("Invalid supply numbers!")));
	}
		
	if (($GAME["empire"]->data["taxrate"] < 0) || ($GAME["empire"]->data["taxrate"] > 100)) 
		$GAME["system"]->redirect("edit_production.php",array("WARNING"=>T_("Invalid tax rate entered !")));
	
	if (($GAME["empire"]->data["food_rate"] < 0) || ($GAME["empire"]->data["food_rate"] > 100)) 
		$GAME["system"]->redirect("edit_production.php",array("WARNING"=>T_("Invalid sell rate entered!")));

	if (($GAME["empire"]->data["ore_rate"] < 0) || ($GAME["empire"]->data["ore_rate"] > 100)) 
		$GAME["system"]->redirect("edit_production.php",array("WARNING"=>T_("Invalid sell rate entered!")));

	if (($GAME["empire"]->data["petroleum_rate"] < 0) || ($GAME["empire"]->data["petroleum_rate"] > 100)) 
		$GAME["system"]->redirect("edit_production.php",array("WARNING"=>T_("Invalid sell rate entered!")));

	if (($GAME["empire"]->data["research_rate"] < 0) || ($GAME["empire"]->data["research_rate"] > 100)) 
		$GAME["system"]->redirect("edit_production.php",array("WARNING"=>T_("Invalid sell rate entered!")));

	$GAME["empire"]->data["taxrate"] += 0;

	$GAME["empire"]->save();
	
	$GAME["system"]->redirect("edit_production.php",array("NOTICE"=>T_("Preferences saved")));
}


//////////////////////////////////////////////////////////////////////////////
// show page
//////////////////////////////////////////////////////////////////////////////

$GAME["template"]->setPage("edit_production.html");

$GAME["template"]->setVar("taxrate",$GAME["empire"]->data["taxrate"]);

$supply = $DB->Execute("SELECT * FROM game".$game_id."_tb_supply WHERE empire='".$GAME["empire"]->data["id"]."'");
$supply = $supply->fields;


$GAME["template"]->setVar("food_rate",$GAME["empire"]->data["food_rate"]);
$GAME["template"]->setVar("ore_rate",$GAME["empire"]->data["ore_rate"]);
$GAME["template"]->setVar("petroleum_rate",$GAME["empire"]->data["petroleum_rate"]);
$GAME["template"]->setVar("research_rate",$GAME["empire"]->data["research_rate"]);

$GAME["template"]->setVar("rate_soldier",$supply["rate_soldier"]);
$GAME["template"]->setVar("rate_fighter",$supply["rate_fighter"]);
$GAME["template"]->setVar("rate_covert",$supply["rate_covert"]);
$GAME["template"]->setVar("rate_station",$supply["rate_station"]);
$GAME["template"]->setVar("rate_heavycruiser",$supply["rate_heavycruiser"]);
$GAME["template"]->setVar("rate_carrier",$supply["rate_carrier"]);
$GAME["template"]->setVar("rate_credits",$supply["rate_credits"]);

$planets = $GAME["empire"]->planets->data;

$production  = $planets["supply_planets"];
$production =  round(($production/100)*$GAME["empire"]->production->data["supply_short"]);
$production += rand(0,$production/16);
$production /= 100;

$psoldiers = $GAME["system"]->alterNumber(floor($supply["rate_soldier"] * $production * CONF_MILITARY_PRODUCTION_SOLDIER),5);
$pfighters = $GAME["system"]->alterNumber(floor($supply["rate_fighter"] * $production * CONF_MILITARY_PRODUCTION_FIGHTER),5);
$pstations = $GAME["system"]->alterNumber(floor($supply["rate_station"] * $production * CONF_MILITARY_PRODUCTION_STATION),5);
$pcredits = $GAME["system"]->alterNumber(floor($supply["rate_credits"] * $production * CONF_MILITARY_PRODUCTION_CREDITS),5);

$plightcruisers = $planets["research_planets"] *  CONF_RESEARCH_LIGHTCRUISER;
$plightcruisers += rand(0,$plightcruisers/16);
$plightcruisers = $GAME["system"]->alterNumber($plightcruisers,5);

$pheavycruisers = $GAME["system"]->alterNumber(floor($supply["rate_heavycruiser"] * $production * CONF_MILITARY_PRODUCTION_HEAVYCRUISER),5);
$pcarriers = $GAME["system"]->alterNumber(floor($supply["rate_carrier"] * $production * CONF_MILITARY_PRODUCTION_CARRIER),5);
$pcovertagents = $GAME["system"]->alterNumber(floor($supply["rate_covert"] * $production * CONF_MILITARY_PRODUCTION_COVERT),5);

$GAME["template"]->setVar("prod_soldier",$GAME["template"]->formatNumber($psoldiers));
$GAME["template"]->setVar("prod_fighter",$GAME["template"]->formatNumber($pfighters));
$GAME["template"]->setVar("prod_station",$GAME["template"]->formatNumber($pstations));
$GAME["template"]->setVar("prod_heavycruiser",$GAME["template"]->formatNumber($pheavycruisers));
$GAME["template"]->setVar("prod_covert",$GAME["template"]->formatNumber($pcovertagents));
$GAME["template"]->setVar("prod_carrier",$GAME["template"]->formatNumber($pcarriers));
$GAME["template"]->setVar("prod_credits",$GAME["template"]->formatCredits($pcredits));
	

print $GAME["template"]->render();

$DB->CompleteTrans();


?>
