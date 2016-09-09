<?php


// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //

function NewTurn_handleOreGrowth($game_id, $empire)
{
	global $DB,$GAME;

	$ore_initial = $empire->data["ore"];
	$ore_final = 0;
	$ore_produced = 0;
	$growrate = 0;

	/////////////////////////////////////////////
	// ORE PRODUCED
	/////////////////////////////////////////////

	// first, raw production calculated.
	$ore_produced_prime = $empire->planets->data["ore_planets"] * CONF_ORE_PRODUCTION;
	$ore_produced_prime = $GAME["system"]->alterNumber(round(($ore_produced_prime/100) * $empire->production->data["ore_short"]),5);

	$ore_produced_civilunrest = ($ore_produced_prime * ($empire->data["civil_status"] * CONF_POP_CIVILSTATUS));
	
	// calculating procuced ore
	$ore_produced = $ore_produced_prime - $ore_produced_civilunrest;

	$ore_used_by_army = $GAME["system"]->alterNumber(round(
	($empire->army->data["soldiers"] * CONF_MAINTENANCE_ORE_SOLDIER)+
	($empire->army->data["fighters"] * CONF_MAINTENANCE_ORE_FIGHTER)+
	($empire->army->data["stations"] * CONF_MAINTENANCE_ORE_STATION)+
	($empire->army->data["lightcruisers"] * CONF_MAINTENANCE_ORE_LIGHTCRUISER)+
	($empire->army->data["heavycruisers"] * CONF_MAINTENANCE_ORE_HEAVYCRUISER)+
	($empire->army->data["carriers"] * CONF_MAINTENANCE_ORE_CARRIER)
	),5);
	
	
	$ore_sold = floor(($ore_produced / 100) * $empire->data["ore_rate"]);
	$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_market");
	
	$ore_price = round((CONF_COST_ORE * $rs->fields["ore_ratio"])/CONF_COST_SELLRATIO);	
	$total_credits = $ore_sold * $ore_price;
	if ($total_credits > 0) {
		$DB->Execute("UPDATE game".$game_id."_tb_market SET ore=".($rs->fields["ore"]+$ore_sold).",ore_sell=".($rs->fields["ore_sell"]+$ore_sold));
		$empire->data["last_turn_ore_sold"] = $total_credits;
	} else $empire->data["last_turn_ore_sold"] = 0;
	
	// total
	$ore_final = $ore_initial + $ore_produced - $ore_sold - $ore_used_by_army;

	if ($ore_initial == 0) $growrate = 0;
	else
	{
		$growrate = substr(((($ore_final - $ore_initial) / $ore_initial)*100),0,5);
	}

	
	$evt = new EventCreator($DB);
	$evt->type = CONF_EVENT_OREGROWTH;
	$evt->from = -1;
	
	$evt->to = $empire->data["id"];
	$evt->params = array(
		"ore_initial"=>$GAME["template"]->formatFood($ore_initial),
		"ore_produced"=>$GAME["template"]->formatFood($ore_produced),
		"ore_sold"=>$GAME["template"]->formatFood($ore_sold),
		"ore_used_by_army"=>$GAME["template"]->formatFood($ore_used_by_army),
		"ore_final"=>$GAME["template"]->formatFood($ore_final),
		"ore_unit_price"=>$GAME["template"]->formatCredits($ore_price),
		"growrate"=>$growrate
	);
	
	$evt->seen = 1;
	$evt->send();
	
	$empire->data["ore"] = $ore_final;

	
}


?>
