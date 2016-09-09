<?php

// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //

define("LANGUAGE_DOMAIN","game");

require_once("../include/game/init.php");
require_once("../include/game/init_ingame.php");

//////////////////////////////////////////////////////////////////////////////
// Handle requests
//////////////////////////////////////////////////////////////////////////////




$units_prices = $GAME["gameplay_costs"]->getUnitsPrices($GAME["empire"]->army->data,$GAME["empire"]->data,$GAME["empire"]->data["turns_played"],$GAME["empire"]->data["inflation"]);
$buy_max_soldiers = $GAME["gameplay_costs"]->getMaxQty($GAME["empire"]->data["credits"],$GAME["empire"]->army->data["soldiers"],$units_prices["base_soldiers"],$units_prices["increment_soldiers"]);
$buy_max_fighters = $GAME["gameplay_costs"]->getMaxQty($GAME["empire"]->data["credits"],$GAME["empire"]->army->data["fighters"],$units_prices["base_fighters"],$units_prices["increment_fighters"]);
$buy_max_stations = $GAME["gameplay_costs"]->getMaxQty($GAME["empire"]->data["credits"],$GAME["empire"]->army->data["stations"],$units_prices["base_stations"],$units_prices["increment_stations"]);
$buy_max_covertagents = $GAME["gameplay_costs"]->getMaxQty($GAME["empire"]->data["credits"],$GAME["empire"]->army->data["covertagents"],$units_prices["base_covertagents"],$units_prices["increment_covertagents"]);
$buy_max_heavycruisers = $GAME["gameplay_costs"]->getMaxQty($GAME["empire"]->data["credits"],$GAME["empire"]->army->data["heavycruisers"],$units_prices["base_heavycruisers"],$units_prices["increment_heavycruisers"]);
$buy_max_carriers = $GAME["gameplay_costs"]->getMaxQty($GAME["empire"]->data["credits"],$GAME["empire"]->army->data["carriers"],$units_prices["base_carriers"],$units_prices["increment_carriers"]);

/* buy something */
if (isset($_GET["buy"]))
{
	$name = addslashes($_GET["buy"]);	
	$qty = intval($_GET["quantity"]);
			
	if (!strpos($name,"_planets")) {
		// this is not planets
		
		if (in_array($name,$CONF_UNITS)) {
				
			$buy_max = ${"buy_max_".$name};
			
			if (($qty > ($buy_max)) || ($qty <= 0))
			{
				$warning = T_("Invalid units quantity!");
				$warning = str_replace("{name}",$name,$warning);
				$warning = str_replace("{qty}",$GAME["template"]->formatNumber($qty),$warning);
				$warning = str_replace("{max}",$GAME["template"]->formatNumber($buy_max),$warning);
				
				$GAME["template"]->showNotice($warning,true);
			} else {
				
				$units_prices = $GAME["gameplay_costs"]->getUnitsPrices($GAME["empire"]->army->data,$GAME["empire"]->data,$GAME["empire"]->data["turns_played"],$GAME["empire"]->data["inflation"]);

        $credits =  $GAME["gameplay_costs"]->calcTotalCost($units_prices["base_".$name],$GAME["empire"]->army->data[$name],$qty,$units_prices["increment_".$name]);

	$const ="CONF_POP_".strtoupper($name);
	$const = str_replace("COVERTAGENT","COVERT",$const);
	if ($const[strlen($const)-1] == "S") $const = substr($const,0,strlen($const)-1);
	$pop = ceil(constant($const) * $qty);
	
	
        if (($pop+100) > $GAME["empire"]->data["population"]) $GAME["system"]->redirect("manage.php",array("WARNING"=>"You don't have enough population. (".($GAME["empire"]->data["population"]-$pop).")"));
        if ($credits > $GAME["empire"]->data["credits"]) $GAME["system"]->redirect("manage.php",array("WARNING"=>"You don't have enough money. (".($GAME["empire"]->data["credits"]-$credits).")"));

				$GAME["empire"]->data["credits"] -=$credits;
				$GAME["empire"]->data["population"] -=$pop;
				$GAME["empire"]->army->data[$name] += $qty;

				$GAME["empire"]->save();
				$GAME["system"]->redirect("manage.php",array("NOTICE"=>$GAME["template"]->formatNumber($qty)." ".$name." ".T_("units bought")." (".$GAME["template"]->formatNumber($credits)." cr., ".$GAME["template"]->formatNumber($pop)." pop)"));
				
			}
		}
		
	} else {
		// this is planets
		
		$name = str_replace("_planets","",$name);
		if (in_array($name,$CONF_PLANETS)) {
			// valid planet found
			$planets_prices = $GAME["gameplay_costs"]->getPlanetsPrices($GAME["empire"]->planets->data,$GAME["empire"]->data["turns_played"],$GAME["empire"]->data["inflation"]);
			$max  = $GAME["gameplay_costs"]->getMaxQty($GAME["empire"]->data["credits"],$GAME["empire"]->planets->data[$name."_planets"],$planets_prices["base_".$name],$planets_prices[$name."_increment"]);

  			$maxplanets = CONF_MAX_PLANET_BUY - $total_planets;
     				
			if ($max > $maxplanets) $max = $maxplanets;

			if (($qty > $max) || 
			($qty <= 0)) 
			{
			
				$warning = T_("Invalid planets quantity!");
				$warning = str_replace("{name}",$name,$warning);
				$warning = str_replace("{qty}",$GAME["template"]->formatNumber($qty),$warning);
				$warning = str_replace("{max}",$GAME["template"]->formatNumber($max),$warning);
			
				$GAME["template"]->showNotice($warning,true);
			
			} else {
	
				if ($name != "gov") {
					$p = $qty / ($GAME["empire"]->planets->data[$name."_planets"] + $qty);
					$p *= $GAME["empire"]->production->data[$name."_short"];
				}


        $total_cost = floor($GAME["gameplay_costs"]->calcTotalCost($planets_prices["base_".$name], $GAME["empire"]->planets->data[$name."_planets"],$qty, $planets_prices[$name."_increment"]));

        if ($total_cost > $GAME["empire"]->data["credits"]) die("Something not working here!: ".$total_cost);
        

				$GAME["empire"]->data["credits"] -= $total_cost;
				$GAME["empire"]->planets->data[$name."_planets"] += $qty;
				
				if ($GAME["empire"]->planets->data[$name."_planets"] > $GAME["empire"]->planets->data["max_".$name])
					$GAME["empire"]->planets->data["max_".$name] = $GAME["empire"]->planets->data[$name."_planets"];

				if ($name != "gov") {
					$GAME["empire"]->production->data[$name."_short"] -= ceil($p);
			
					if ($GAME["empire"]->production->data[$name."_short"] <= 0) $GAME["empire"]->production->data[$name."_short"] = 1;
				}
				
				$GAME["empire"]->save();		
				
				$GAME["system"]->redirect("manage.php",array("NOTICE"=>$GAME["template"]->formatNumber($qty)." $name ".T_("planets bought!")));


			}		
		}
	}
		
}


/* sell something */
if (isset($_GET["sell"]))
{
	$name = addslashes($_GET["sell"]);	
	$qty = intval($_GET["quantity"]);
		if (!strpos($name,"_planets")) {
		// this is not planets
		
		if (in_array($name,$CONF_UNITS)) {
				
			$max = $GAME["empire"]->army->data[$name];
					
			if (($qty > ($max)) || ($qty <= 0))
			{
				$warning = T_("Invalid units quantity!");
				$warning = str_replace("{name}",$name,$warning);
				$warning = str_replace("{qty}",$GAME["template"]->formatNumber($qty),$warning);
				$warning = str_replace("{max}",$GAME["template"]->formatNumber($max),$warning);
				
				$GAME["template"]->showNotice($warning,true);
			} else {
				
				
				$units_prices = $GAME["gameplay_costs"]->getUnitsPrices($GAME["empire"]->army->data,$GAME["empire"]->data,$GAME["empire"]->data["turns_played"],$GAME["empire"]->data["inflation"]);

				$GAME["empire"]->army->data[$name] -= $qty;
				$GAME["empire"]->data["credits"] += ($units_prices["sell_".$name] * $qty);

				$GAME["empire"]->save();
				$GAME["system"]->redirect("manage.php",array("NOTICE"=>$GAME["template"]->formatNumber($qty)." ".$name." ".T_("units sold")));
				
			}
		}
	} else {
		// this is planets
		
		$name = str_replace("_planets","",$name);
		if (in_array($name,$CONF_PLANETS)) {
			// valid planet found
			
			$max = $GAME["empire"]->planets->data[$name."_planets"];
			if (($qty > ($max)) || ($qty <= 0))
			{
			
				$warning = T_("Invalid planets quantity!");
				$warning = str_replace("{name}",$name,$warning);
				$warning = str_replace("{qty}",$GAME["template"]->formatNumber($qty),$warning);
				$warning = str_replace("{max}",$GAME["template"]->formatNumber($max),$warning);
				$GAME["template"]->showNotice($warning,true);
				
			} else {
				$GAME["empire"]->planets->data[$name."_planets"] -= $qty;
				$GAME["empire"]->save();
				$GAME["system"]->redirect("manage.php",array("NOTICE"=>$GAME["template"]->formatNumber($qty)." ".$name." ".T_("planets released")));
			}		
		}
	}
		
}



//////////////////////////////////////////////////////////////////////////////
// show page
//////////////////////////////////////////////////////////////////////////////

$GAME["template"]->setPage("manage.html");


// display costs
$planets_prices = $GAME["gameplay_costs"]->getPlanetsPrices($GAME["empire"]->planets->data,$GAME["empire"]->data["turns_played"],$GAME["empire"]->data["inflation"]);

for ($i=0;$i<count($CONF_PLANETS);$i++)
	$GAME["template"]->setVar("cost_planet_".$CONF_PLANETS[$i],
		$GAME["template"]->formatCredits($planets_prices["planet_".$CONF_PLANETS[$i]]));

$units_prices = $GAME["gameplay_costs"]->getUnitsPrices($GAME["empire"]->army->data,$GAME["empire"]->data,$GAME["empire"]->data["turns_played"],$GAME["empire"]->data["inflation"]);

$GAME["template"]->setVar("buy_soldiers",$GAME["template"]->formatCredits($units_prices["buy_soldiers"]));
$GAME["template"]->setVar("sell_soldiers",$GAME["template"]->formatCredits($units_prices["sell_soldiers"]));

$GAME["template"]->setVar("buy_fighters",$GAME["template"]->formatCredits($units_prices["buy_fighters"]));
$GAME["template"]->setVar("sell_fighters",$GAME["template"]->formatCredits($units_prices["sell_fighters"]));

$GAME["template"]->setVar("buy_stations",$GAME["template"]->formatCredits($units_prices["buy_stations"]));
$GAME["template"]->setVar("sell_stations",$GAME["template"]->formatCredits($units_prices["sell_stations"]));

$GAME["template"]->setVar("buy_covertagents",$GAME["template"]->formatCredits($units_prices["buy_covertagents"]));
$GAME["template"]->setVar("sell_covertagents",$GAME["template"]->formatCredits($units_prices["sell_covertagents"]));

$GAME["template"]->setVar("sell_lightcruisers",$GAME["template"]->formatCredits($units_prices["sell_lightcruisers"]));

$GAME["template"]->setVar("buy_heavycruisers",$GAME["template"]->formatCredits($units_prices["buy_heavycruisers"]));
$GAME["template"]->setVar("sell_heavycruisers",$GAME["template"]->formatCredits($units_prices["sell_heavycruisers"]));

$GAME["template"]->setVar("buy_carriers",$GAME["template"]->formatCredits($units_prices["buy_carriers"]));
$GAME["template"]->setVar("sell_carriers",$GAME["template"]->formatCredits($units_prices["sell_carriers"]));


$buy_max_soldiers = $GAME["gameplay_costs"]->getMaxQty($GAME["empire"]->data["credits"],$GAME["empire"]->army->data["soldiers"],$units_prices["base_soldiers"],$units_prices["increment_soldiers"]);
$pop_max_soldiers  = floor(($GAME["empire"]->data["population"]-100) / CONF_POP_SOLDIER);
if ($buy_max_soldiers > $pop_max_soldiers) $buy_max_soldiers = $pop_max_soldiers;


$buy_max_fighters = $GAME["gameplay_costs"]->getMaxQty($GAME["empire"]->data["credits"],$GAME["empire"]->army->data["fighters"],$units_prices["base_fighters"],$units_prices["increment_fighters"]);
$pop_max_fighters  = floor(($GAME["empire"]->data["population"]-100) / CONF_POP_FIGHTER);
if ($buy_max_fighters > $pop_max_fighters) $buy_max_fighters = $pop_max_fighters;

$buy_max_stations = $GAME["gameplay_costs"]->getMaxQty($GAME["empire"]->data["credits"],$GAME["empire"]->army->data["stations"],$units_prices["base_stations"],$units_prices["increment_stations"]);
$pop_max_stations  = floor(($GAME["empire"]->data["population"]-100) / CONF_POP_STATION);
if ($buy_max_stations > $pop_max_stations) $buy_max_stations = $pop_max_stations;

$buy_max_covertagents = $GAME["gameplay_costs"]->getMaxQty($GAME["empire"]->data["credits"],$GAME["empire"]->army->data["covertagents"],$units_prices["base_covertagents"],$units_prices["increment_covertagents"]);
$pop_max_covertagents  = floor(($GAME["empire"]->data["population"]-100) / CONF_POP_COVERT);
if ($buy_max_covertagents > $pop_max_covertagents) $buy_max_covertagents = $pop_max_covertagents;

$buy_max_heavycruisers = $GAME["gameplay_costs"]->getMaxQty($GAME["empire"]->data["credits"],$GAME["empire"]->army->data["heavycruisers"],$units_prices["base_heavycruisers"],$units_prices["increment_heavycruisers"]);
$pop_max_heavycruisers  = floor(($GAME["empire"]->data["population"]-100) / CONF_POP_HEAVYCRUISER);
if ($buy_max_heavycruisers > $pop_max_heavycruisers) $buy_max_heavycruisers = $pop_max_heavycruisers;

$buy_max_carriers = $GAME["gameplay_costs"]->getMaxQty($GAME["empire"]->data["credits"],$GAME["empire"]->army->data["carriers"],$units_prices["base_carriers"],$units_prices["increment_carriers"]);
$pop_max_carriers  = floor(($GAME["empire"]->data["population"]-100) / CONF_POP_CARRIER);
if ($buy_max_carriers > $pop_max_carriers) $buy_max_carriers = $pop_max_carriers;


$GAME["template"]->setVar("buy_max_soldiers",$buy_max_soldiers);
$GAME["template"]->setVar("buy_max_fighters",$buy_max_fighters);
$GAME["template"]->setVar("buy_max_stations",$buy_max_stations);
$GAME["template"]->setVar("buy_max_covertagents",$buy_max_covertagents);
$GAME["template"]->setVar("buy_max_heavycruisers",$buy_max_heavycruisers);
$GAME["template"]->setVar("buy_max_carriers",$buy_max_carriers);


$GAME["template"]->setVar("soldiers_buy_label",T_("buy")." ".T_("soldiers").": ".$GAME["template"]->formatCredits($units_prices["buy_soldiers"],false)." ".T_("each")." [".T_("max").": ".$GAME["template"]->formatNumber(floor($buy_max_soldiers))."]");
$GAME["template"]->setVar("fighters_buy_label",T_("buy")." ".T_("fighters").": ".$GAME["template"]->formatCredits($units_prices["buy_fighters"],false)." ".T_("each")." [".T_("max").": ".$GAME["template"]->formatNumber(floor($buy_max_fighters))."]");
$GAME["template"]->setVar("stations_buy_label",T_("buy")." ".T_("stations").": ".$GAME["template"]->formatCredits($units_prices["buy_stations"],false)." ".T_("each")." [".T_("max").": ".$GAME["template"]->formatNumber(floor($buy_max_stations))."]");
$GAME["template"]->setVar("covertagents_buy_label",T_("buy")." ".T_("covert agents").": ".$GAME["template"]->formatCredits($units_prices["buy_covertagents"],false)."  ".T_("each")." [".T_("max").": ".$GAME["template"]->formatNumber(floor($buy_max_covertagents))."]");
$GAME["template"]->setVar("heavycruisers_buy_label",T_("buy")." ".T_("heavy cruisers").": ".$GAME["template"]->formatCredits($units_prices["buy_heavycruisers"],false)." ".T_("each")." [".T_("max").": ".$GAME["template"]->formatNumber(floor($buy_max_heavycruisers))."]");
$GAME["template"]->setVar("carriers_buy_label",T_("buy")." ".T_("carriers").": ".$GAME["template"]->formatCredits($units_prices["buy_carriers"],false)." ".T_("each")." [".T_("max").": ".$GAME["template"]->formatNumber(floor($buy_max_carriers))."]");

$GAME["template"]->setVar("soldiers_sell_label",T_("sell")." ".T_("soldiers").": ".$GAME["template"]->formatCredits($units_prices["sell_fighters"],false)." ".T_("each")." [".T_("max").": ".$GAME["template"]->formatNumber($GAME["empire"]->army->data["soldiers"])."]");
$GAME["template"]->setVar("fighters_sell_label",T_("sell")." ".T_("fighters").": ".$GAME["template"]->formatCredits($units_prices["sell_fighters"],false)." ".T_("each")." [".T_("max").": ".$GAME["template"]->formatNumber($GAME["empire"]->army->data["fighters"])."]");
$GAME["template"]->setVar("stations_sell_label",T_("sell")." ".T_("stations").": ".$GAME["template"]->formatCredits($units_prices["sell_stations"],false)." ".T_("each")." [".T_("max").": ".$GAME["template"]->formatNumber($GAME["empire"]->army->data["stations"])."]");
$GAME["template"]->setVar("covertagents_sell_label",T_("sell")." ".T_("covert agents").": ".$GAME["template"]->formatCredits($units_prices["sell_covertagents"],false)." ".T_("each")." [".T_("max").": ".$GAME["template"]->formatNumber($GAME["empire"]->army->data["covertagents"])."]");
$GAME["template"]->setVar("lightcruisers_sell_label",T_("sell")." ".T_("light cruisers").": ".$GAME["template"]->formatCredits($units_prices["sell_lightcruisers"],false)." ".T_("each")." [".T_("max").": ".$GAME["template"]->formatNumber($GAME["empire"]->army->data["lightcruisers"])."]");
$GAME["template"]->setVar("heavycruisers_sell_label",T_("sell")." ".T_("heavy cruisers").": ".$GAME["template"]->formatCredits($units_prices["sell_heavycruisers"],false)." ".T_("each")." [".T_("max").": ".$GAME["template"]->formatNumber($GAME["empire"]->army->data["heavycruisers"])."]");
$GAME["template"]->setVar("carriers_sell_label",T_("sell")." ".T_("carriers").": ".$GAME["template"]->formatCredits($units_prices["sell_carriers"],false)." ".T_("each")." [".T_("max").": ".$GAME["template"]->formatNumber($GAME["empire"]->army->data["carriers"])."]");

for ($i=0;$i<count($CONF_PLANETS);$i++)
{
	$buy_max_planets = $GAME["gameplay_costs"]->getMaxQty($GAME["empire"]->data["credits"],$GAME["empire"]->planets->data[$CONF_PLANETS[$i]."_planets"],$planets_prices["base_".$CONF_PLANETS[$i]],$planets_prices[$CONF_PLANETS[$i]."_increment"]);


    $maxplanets = CONF_MAX_PLANET_BUY - $total_planets;
	if ($buy_max_planets > $maxplanets) $buy_max_planets = $maxplanets;

	$GAME["template"]->setVar("buy_max_planet_".$CONF_PLANETS[$i],$buy_max_planets);
	$GAME["template"]->setVar($CONF_PLANETS[$i]."_planets_buy_label",T_("buy")." ".$CONF_PLANETS[$i]." ".T_("planets").": ".$GAME["template"]->formatCredits($planets_prices["planet_".$CONF_PLANETS[$i]],false)." ".T_("each")." [".T_("max").": ".$GAME["template"]->formatNumber($buy_max_planets)."]");
	$GAME["template"]->setVar($CONF_PLANETS[$i]."_planets_sell_label",T_("release")." ".$CONF_PLANETS[$i]." ".T_("planets")." [".T_("max").": ".$GAME["template"]->formatNumber($GAME["empire"]->planets->data[$CONF_PLANETS[$i]."_planets"])."]");
}



print $GAME["template"]->render();
$DB->completeTrans();

?>
