<?php

// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //

function NewTurn_HandleMilitaryProduction($game_id, $empire)
{
	global $DB,$GAME;
	
	$production =  round(($empire->planets->data["supply_planets"]/100)*$empire->production->data["supply_short"]);
	$production += rand(0,$production/16);
	$production /= 100;

	$psoldiers = $GAME["system"]->alterNumber(floor($empire->supply->data["rate_soldier"] * $production * CONF_MILITARY_PRODUCTION_SOLDIER),5);	
	$pfighters = $GAME["system"]->alterNumber(floor($empire->supply->data["rate_fighter"] * $production * CONF_MILITARY_PRODUCTION_FIGHTER),5);
	$pstations = $GAME["system"]->alterNumber(floor($empire->supply->data["rate_station"] * $production * CONF_MILITARY_PRODUCTION_STATION),5);
	$pcredits = $GAME["system"]->alterNumber(floor($empire->supply->data["rate_credits"] * $production * CONF_MILITARY_PRODUCTION_CREDITS),5);

	$plightcruisers = (($empire->planets->data["research_planets"]/100)*$empire->production->data["research_short"]) *  CONF_RESEARCH_LIGHTCRUISER;

	$plightcruisers -= ($plightcruisers * ($empire->data["research_rate"] / 100));
	$plightcruisers = round($plightcruisers);

	$plightcruisers += rand(0,$plightcruisers/16);
	$plightcruisers = $GAME["system"]->alterNumber($plightcruisers,5);

	$pheavycruisers = $GAME["system"]->alterNumber(floor($empire->supply->data["rate_heavycruiser"] * $production * CONF_MILITARY_PRODUCTION_HEAVYCRUISER),5);
	$pcarriers = $GAME["system"]->alterNumber(floor($empire->supply->data["rate_carrier"] * $production * CONF_MILITARY_PRODUCTION_CARRIER),5);
	$pcovertagents = $GAME["system"]->alterNumber(floor($empire->supply->data["rate_covert"] * $production * CONF_MILITARY_PRODUCTION_COVERT),5);
	
	$pop_max_soldiers  = floor($empire->data["population"] / CONF_POP_SOLDIER)-1;
	if ($pop_max_soldiers < 0) $pop_max_soldiers = 0;

	$pop_max_fighters  = floor($empire->data["population"] / CONF_POP_FIGHTER)-1;
	if ($pop_max_fighters < 0) $pop_max_fighters = 0;

	$pop_max_stations  = floor($empire->data["population"] / CONF_POP_STATION)-1;
	if ($pop_max_stations < 0) $pop_max_stations = 0;

	$pop_max_covertagents  = floor($empire->data["population"] / CONF_POP_COVERT)-1;
	if ($pop_max_covertagents < 0) $pop_max_covertagents = 0;

	$pop_max_heavycruisers  = floor($empire->data["population"] / CONF_POP_HEAVYCRUISER)-1;
	if ($pop_max_heavycruisers < 0) $pop_max_heavycruisers = 0;

	$pop_max_carriers  = floor($empire->data["population"] / CONF_POP_CARRIER)-1;
	if ($pop_max_carriers < 0) $pop_max_carriers = 0;

	if ($psoldiers > $pop_max_soldiers) $psoldiers = $pop_max_soldiers;
	if ($pfighters > $pop_max_fighters) $pfighters = $pop_max_fighters;
	if ($pstations > $pop_max_stations) $pstations = $pop_max_stations;
	if ($pcovertagents > $pop_max_covertagents) $pcovertagents = $pop_max_covertagents;
	if ($pheavycruisers > $pop_max_heavycruisers) $pheavycruisers = $pop_max_heavycruisers;
	if ($pcarriers > $pop_max_carriers) $pcarriers = $pop_max_carriers;

	$total_pop = ceil($psoldiers * CONF_POP_SOLDIER);
	$total_pop += ceil($pfighters * CONF_POP_FIGHTER);
	$total_pop += ceil($pstations * CONF_POP_STATION);
	$total_pop += ceil($pcovertagents * CONF_POP_COVERT);
	$total_pop += ceil($pheavycruisers * CONF_POP_HEAVYCRUISER);
	$total_pop += ceil($pcarriers * CONF_POP_CARRIER);

	$empire->army->data["soldiers"] += $psoldiers;
	$empire->army->data["fighters"] += $pfighters;
	$empire->army->data["stations"] += $pstations;
	$empire->army->data["lightcruisers"] += $plightcruisers;
	$empire->army->data["heavycruisers"] += $pheavycruisers;
	$empire->army->data["carriers"] += $pcarriers;
	$empire->army->data["covertagents"] += $pcovertagents;
	$empire->data["credits"] += $pcredits;
	$empire->data["population"] -= $total_pop;

	
	$evt = new EventCreator($DB);
	$evt->from = -1;
	$evt->type = CONF_EVENT_MILITARYPRODUCTION;
	$evt->to = $empire->data["id"];
	$evt->seen = 1;
	$evt->params = array(
		"soldiers"=>$GAME["template"]->formatNumber($empire->army->data["soldiers"]),
		"fighters"=>$GAME["template"]->formatNumber($empire->army->data["fighters"]),
		"stations"=>$GAME["template"]->formatNumber($empire->army->data["stations"]),
		"lightcruisers"=>$GAME["template"]->formatNumber($empire->army->data["lightcruisers"]),
		"heavycruisers"=>$GAME["template"]->formatNumber($empire->army->data["heavycruisers"]),
		"carriers"=>$GAME["template"]->formatNumber($empire->army->data["carriers"]),
		"covertagents"=>$GAME["template"]->formatNumber($empire->army->data["covertagents"]),
		"population_lost"=>$GAME["template"]->formatNumber($total_pop),
		"psoldiers"=>$GAME["template"]->formatNumber($psoldiers),
		"pfighters"=>$GAME["template"]->formatNumber($pfighters),
		"pstations"=>$GAME["template"]->formatNumber($pstations),
		"pcredits"=>$GAME["template"]->formatCredits($pcredits),
		"plightcruisers"=>$GAME["template"]->formatNumber($plightcruisers),
		"pheavycruisers"=>$GAME["template"]->formatNumber($pheavycruisers),
		"pcarriers"=>$GAME["template"]->formatNumber($pcarriers),
		"pcovertagents"=>$GAME["template"]->formatNumber($pcovertagents),
		 "soldiers_level"=>$empire->army->data["soldiers_level"],
		"fighters_level"=>$empire->army->data["fighters_level"],
		"stations_level"=>$empire->army->data["stations_level"],
		"lightcruisers_level"=>$empire->army->data["lightcruisers_level"],
		"heavycruisers_level"=>$empire->army->data["heavycruisers_level"],
		"carriers_level"=>$empire->army->data["carriers_level"],
		"covertagents_level"=>$empire->army->data["covertagents_level"]
	);
	
	$evt->send();
}

?>
