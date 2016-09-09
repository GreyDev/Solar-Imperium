<?php

// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //

function NewTurn_handleFoodGrowth($game_id, $empire)
{
	global $DB,$GAME;

	$food_initial = $empire->data["food"];
	$food_final = 0;
	$food_produced = 0;
	$food_eaten_by_population = 0;
	$food_eaten_by_soldiers = 0;
	$growrate = 0;

	/////////////////////////////////////////////
	// FOOD PRODUCED
	/////////////////////////////////////////////

	// first, raw production calculated.
	$food_produced_prime = $empire->planets->data["food_planets"] * CONF_FOOD_PRODUCTION;
	$food_produced_prime = $GAME["system"]->alterNumber(round(($food_produced_prime/100) * $empire->production->data["food_short"]),5);

	$food_produced_civilunrest = ($food_produced_prime * ($empire->data["civil_status"] * CONF_POP_CIVILSTATUS));
	
	// calculating procuced food
	$food_produced = $food_produced_prime - $food_produced_civilunrest;


	$food_eaten_by_population = $GAME["system"]->alterNumber(round($empire->data["population"] * CONF_FOOD_POPULATION_EATING),5);
	$food_eaten_by_army = $GAME["system"]->alterNumber(round(
	($empire->army->data["soldiers"] * CONF_MAINTENANCE_FOOD_SOLDIER)+
	($empire->army->data["fighters"] * CONF_MAINTENANCE_FOOD_FIGHTER)+
	($empire->army->data["stations"] * CONF_MAINTENANCE_FOOD_STATION)+
	($empire->army->data["lightcruisers"] * CONF_MAINTENANCE_FOOD_LIGHTCRUISER)+
	($empire->army->data["heavycruisers"] * CONF_MAINTENANCE_FOOD_HEAVYCRUISER)+
	($empire->army->data["carriers"] * CONF_MAINTENANCE_FOOD_CARRIER)
	),5);

	
	
	$food_sold = floor(($food_produced / 100) * $empire->data["food_rate"]);
	$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_market");
	
	$food_price = round((CONF_COST_FOOD * $rs->fields["food_ratio"])/CONF_COST_SELLRATIO);	
	$total_credits = $food_sold * $food_price;
	if ($total_credits > 0) {
		$DB->Execute("UPDATE game".$game_id."_tb_market SET food=".($rs->fields["food"]+$food_sold).",food_sell=".($rs->fields["food_sell"]+$food_sold));
		$empire->data["last_turn_food_sold"] = $total_credits;
	} else $empire->data["last_turn_food_sold"] = 0;
	
	// total
	$food_final = $food_initial + $food_produced - $food_sold - $food_eaten_by_population - $food_eaten_by_army;

	if ($food_initial == 0) $growrate = 0;
	else
	{
		$growrate = substr(((($food_final - $food_initial) / $food_initial)*100),0,5);
	}

	
	$evt = new EventCreator($DB);
	$evt->type = CONF_EVENT_FOODGROWTH;
	$evt->from = -1;
	
	$evt->to = $empire->data["id"];
	$evt->params = array(
		"food_initial"=>$GAME["template"]->formatFood($food_initial),
		"food_produced"=>$GAME["template"]->formatFood($food_produced),
		"food_eaten_by_population"=>$GAME["template"]->formatFood($food_eaten_by_population),
		"food_eaten_by_army"=>$GAME["template"]->formatFood($food_eaten_by_army),
		"food_sold"=>$GAME["template"]->formatFood($food_sold),
		"food_unit_price"=>$GAME["template"]->formatCredits($food_price),
		"food_final"=>$GAME["template"]->formatFood($food_final),
		"growrate"=>$growrate
	);
	
	$evt->seen = 1;
	$evt->send();
	
	$empire->data["food"] = $food_final;

	
}


?>
