<?php

// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //

function NewTurn_HandlePopulationGrowth($game_id, $empire)
{
	global $GAME,$DB,$CONF_CIVIL_STATUS;

	$initial_population = $empire->data["population"];
	if ($initial_population < 0) $initial_population = 0;

	$final_population = 0;
    $pollution = $empire->calcPollution();
	
	

    $antipollution = $empire->calcAntiPollution();
	

	$antipollution = $GAME["system"]->alterNumber($antipollution,5);
    if ($antipollution == 0) $antipollution = 1;

	///////////////////////////////////////////////////////////////////
	// BORN
	///////////////////////////////////////////////////////////////////

	$born = 0;

	// First, we calculate the prime growth of the population itself
	$born_prime = $empire->data["population"] * CONF_POP_BORN;
	// Second, we add the growth obtained by the bonus from urban planets
	$born_bonus = $empire->production->data["urban_short"] * CONF_POP_URBAN;

	$pratio = $pollution / $antipollution;
    
	// Third, we calculate a malus caused by the pollution;
	$born_malus = ($born_prime * $born_bonus) * ($pratio);

	// civil unrest
	$born_malus += (($born_prime * $born_bonus) * ($empire->data["civil_status"] * CONF_POP_CIVILSTATUS));

	// fourth, tax rates
	$taxrate = $empire->data["taxrate"];
	$taxrate_multi = ($taxrate * $taxrate) * 0.005;

	$born_taxrate = round($born_prime * $born_bonus * $taxrate_multi) *  CONF_POP_TAXRATE;

	// calculating total of born
	$born = round(($born_prime * $born_bonus) - $born_malus - $born_taxrate);
	if ($born < 0) $born = 0;

	$born = $GAME["system"]->alterNumber($born,5);

	if (isset($POPULATION_STARVING)) $born = floor($born / 4);

	// Verify if its overcrowd
	if (($empire->data["population"] + $born) > ($empire->planets->data["urban_planets"] * CONF_POP_OVERCROWD)) {
		$born = ($empire->data["population"] + $born) - ($empire->planets->data["urban_planets"] * CONF_POP_OVERCROWD);
		if ($born < 0) $born = 0;
	}
	
	///////////////////////////////////////////////////////////////////
	// DEAD
	///////////////////////////////////////////////////////////////////

	$dead = 0;

	// First, we calculate the prime body count of the population itself
	$dead_prime = $empire->data["population"] * CONF_POP_DEAD;

	// Second, we add the dead meat obtained by pollution
	
	$dead_pollution = $dead_prime * ($pratio);
	if ($dead_pollution < 0) $dead_pollution = 0;

	
	// Third, we add the civil unrest in the equation
	$dead_civilunrest = ($dead_prime * ($empire->data["civil_status"] * CONF_POP_CIVILSTATUS));


	// calculating total of dead 
	$dead = round($dead_prime + $dead_pollution + $dead_civilunrest);

	$dead = $GAME["system"]->alterNumber($dead,5);

	if ($dead < 0) $dead = 0;

	///////////////////////////////////////////////////////////////////
	// IMMIGRATION
	///////////////////////////////////////////////////////////////////

	$immigration = 0;

	
	
	$immigration_students = $empire->planets->data["edu_planets"] * CONF_POP_EDUCATION;

	// Second, we add pollution
	$immigration_pollution = ($immigration_students * ($pratio));
	
	// Third, then civil unrest
	$immigration_civilunrest = ($immigration_students * ($empire->data["civil_status"] * CONF_POP_CIVILSTATUS));
	
	// fourth, tax rates
	$immigration_taxrate = $immigration_students *  $taxrate_multi * CONF_POP_TAXRATE;

	// calculating total of immigration
	$immigration = round($immigration_students - $immigration_pollution - $immigration_civilunrest - $immigration_taxrate);

	$immigration = $GAME["system"]->alterNumber($immigration,5);

	if (($empire->data["population"] + $born + $immigration) > ($empire->planets->data["urban_planets"] * CONF_POP_OVERCROWD)) {
		$immigration = ($empire->planets->data["urban_planets"] * CONF_POP_OVERCROWD) - $empire->data["population"] - $born;
	}

	if ($immigration < 0) $immigration = 0;	

	///////////////////////////////////////////////////////////////////
	// EMMIGRATION
	///////////////////////////////////////////////////////////////////

	$emmigration = 0;


	// First, we calculate the overcrowd factor
	$emmigration_overcrowd = $empire->data["population"] - ($empire->planets->data["urban_planets"] * CONF_POP_OVERCROWD);
	if ($emmigration_overcrowd < 0) $emmigration_overcrowd = 0; else {
		$emmigration_overcrowd *= CONF_POP_OVERCROWD_GETOUT;
	}

	// Second, we add tax rate
	$emmigration_taxrate = $empire->data["population"] * $taxrate_multi * CONF_POP_TAXRATE_GETOUT;

	// Third, civil unrest
	$emmigration_civilunrest = $empire->data["population"] * $empire->data["civil_status"] * CONF_POP_CIVILSTATUS;
	
	// calculating total
	$emmigration = round($emmigration_overcrowd + $emmigration_taxrate + $emmigration_civilunrest);
	$emmigration = $GAME["system"]->alterNumber($emmigration,5);

	if ($emmigration < 0) $emmigration = 0;
	
	///////////////////////////////////////////////////////////////////
	// FINALIZATION
	///////////////////////////////////////////////////////////////////
	
	$final_population = $initial_population + $born + $immigration - $dead - $emmigration;

	if ($initial_population == 0)
		$growrate = 0;
	else
	{
		$growrate = substr((($final_population - $initial_population) / $initial_population) * 100,0,5);
	}

	
	$pratio = $pollution / $antipollution;
	$color = TPL_COLOR_HIGHLIGHT;
	if ($pratio < 0) $color = "green";
	if ($pratio > 0) $color = "lightred";
	
	$evt = new EventCreator($DB);
	$evt->type = CONF_EVENT_POPULATIONGROWTH;
	$evt->from = -1;
	$evt->to = $empire->data["id"];
	$evt->seen = 1;
	$evt->params = array(
		"initial_population"=>$GAME["template"]->formatPopulation($initial_population),
		"final_population"=>$GAME["template"]->formatPopulation($final_population),
		"born"=>$GAME["template"]->formatPopulation($born),
		"dead"=>$GAME["template"]->formatPopulation($dead),
		"born"=>$GAME["template"]->formatPopulation($born),
		"immigration"=>$GAME["template"]->formatPopulation($immigration),
		"emmigration"=>$GAME["template"]->formatPopulation($emmigration),
		"color"=>$color,
		"pratio"=>round($pratio,6),
		"growrate"=>$growrate
	);
	
	$evt->send();



	$empire->data["population"] = $final_population;

	
}

?>
