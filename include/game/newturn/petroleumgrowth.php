<?php

// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //

function NewTurn_handlePetroleumGrowth($game_id, $empire)
{
	global $DB,$GAME;

	$petroleum_initial = $empire->data["petroleum"];
	$petroleum_final = 0;
	$petroleum_produced = 0;
	$growrate = 0;

	/////////////////////////////////////////////
	// petroleum PRODUCED
	/////////////////////////////////////////////

	// first, raw production calculated.
	$petroleum_produced_prime = $empire->planets->data["petro_planets"] * CONF_PETROLEUM_PRODUCTION;
	$petroleum_produced_prime = $GAME["system"]->alterNumber(round(($petroleum_produced_prime/100) * $empire->production->data["petro_short"]),5);

	$petroleum_produced_civilunrest = ($petroleum_produced_prime * ($empire->data["civil_status"] * CONF_POP_CIVILSTATUS));
	
	// calculating procuced petroleum
	$petroleum_produced = $petroleum_produced_prime - $petroleum_produced_civilunrest;

	$petroleum_used_by_army = $GAME["system"]->alterNumber(round(
	($empire->army->data["soldiers"] * CONF_MAINTENANCE_PETROLEUM_SOLDIER)+
	($empire->army->data["fighters"] * CONF_MAINTENANCE_PETROLEUM_FIGHTER)+
	($empire->army->data["stations"] * CONF_MAINTENANCE_PETROLEUM_STATION)+
	($empire->army->data["lightcruisers"] * CONF_MAINTENANCE_PETROLEUM_LIGHTCRUISER)+
	($empire->army->data["heavycruisers"] * CONF_MAINTENANCE_PETROLEUM_HEAVYCRUISER)+
	($empire->army->data["carriers"] * CONF_MAINTENANCE_PETROLEUM_CARRIER)
	),5);
	
	$petroleum_sold = floor(($petroleum_produced / 100) * $empire->data["petroleum_rate"]);
	$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_market");
	
	$petroleum_price = round((CONF_COST_PETROLEUM * $rs->fields["petroleum_ratio"])/CONF_COST_SELLRATIO);	
	$total_credits = $petroleum_sold * $petroleum_price;
	if ($total_credits > 0) {
		$DB->Execute("UPDATE game".$game_id."_tb_market SET petroleum=".($rs->fields["petroleum"]+$petroleum_sold).",petroleum_sell=".($rs->fields["petroleum_sell"]+$petroleum_sold));
		$empire->data["last_turn_petroleum_sold"] = $total_credits;
	} else $empire->data["last_turn_petroleum_sold"] = 0;
	
	// total
	$petroleum_final = $petroleum_initial + $petroleum_produced - $petroleum_sold - $petroleum_used_by_army;

	if ($petroleum_initial == 0) $growrate = 0;
	else
	{
		$growrate = substr(((($petroleum_final - $petroleum_initial) / $petroleum_initial)*100),0,5);
	}

	
	$evt = new EventCreator($DB);
	$evt->type = CONF_EVENT_PETROLEUMGROWTH;
	$evt->from = -1;
	
	$evt->to = $empire->data["id"];
	$evt->params = array(
		"petroleum_initial"=>$GAME["template"]->formatFood($petroleum_initial),
		"petroleum_produced"=>$GAME["template"]->formatFood($petroleum_produced),
		"petroleum_sold"=>$GAME["template"]->formatFood($petroleum_sold),
		"petroleum_used_by_army"=>$GAME["template"]->formatFood($petroleum_used_by_army),
		"petroleum_final"=>$GAME["template"]->formatFood($petroleum_final),
		"petroleum_unit_price"=>$GAME["template"]->formatCredits($petroleum_price),
		"growrate"=>$growrate
	);
	
	$evt->seen = 1;
	$evt->send();
	
	$empire->data["petroleum"] = $petroleum_final;

	
}


?>
