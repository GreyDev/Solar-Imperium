<?php

// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //

function NewTurn_handleMoneyGrowth($game_id, $empire) {
	
	global $DB, $GAME;
	
	$bonus = 1;
    if ($empire->data["player_id"] == -1) $bonus = $empire->data["ai_level"];
    
	$money_initial = $empire->data["credits"];
	$money_final = 0;
	$growrate = 0;
	$playerscount = $DB->Execute("SELECT COUNT(*) FROM game".$game_id."_tb_empire WHERE active='1'");
	$playerscount = $playerscount->fields[0];

	$population_tax_income = $GAME["system"]->alterNumber(floor($empire->data["population"] * $empire->data["taxrate"] * CONF_INCOME_POPTAX), 5) * $bonus;

	$urban_tax_income = floor($empire->planets->data["urban_planets"] * CONF_INCOME_URBANTAX);
	$urban_tax_income = $GAME["system"]->alterNumber(floor(($urban_tax_income / 100) * $empire->production->data["urban_short"]), 5)  * $bonus;
	$urban_tax_civilunrest = ($urban_tax_income * ($empire->data["civil_status"] * CONF_POP_CIVILSTATUS));
	$urban_tax_civilunrest /= 4;
	$urban_tax_income  -= $urban_tax_civilunrest;
	if ($urban_tax_income < 0)
		$urban_tax_income = 0;

	
	$tourism_income = floor($empire->planets->data["tourism_planets"] * CONF_INCOME_TOURISM);
	$tourism_income = $GAME["system"]->alterNumber(floor(($tourism_income / 100) * $empire->production->data["tourism_short"]), 5)  * $bonus;

	$tourism_civilunrest = ($tourism_income * ($empire->data["civil_status"] * CONF_POP_CIVILSTATUS));
	$tourism_income -= $tourism_civilunrest;
	if ($tourism_income < 0)
		$tourism_income = 0;

	$food_production_income = $empire->data["last_turn_food_sold"];
	$ore_production_income = $empire->data["last_turn_ore_sold"];
	$petroleum_production_income = $empire->data["last_turn_petroleum_sold"];
	$research_production_income = $empire->data["last_turn_research_sold"];
	$income = $population_tax_income + $research_production_income + $urban_tax_income + $food_production_income + $tourism_income + $ore_production_income + $petroleum_production_income;

	$planets_maintenance = $GAME["system"]->alterNumber((($empire->planets->getCount() - $empire->planets->data["gov_planets"]) * (CONF_MAINTENANCE_CREDITS_PLANETS + $empire->data["turns_played"])), 5);
	$planets_maintenance_reduction = floor((($empire->planets->data["gov_planets"]*4) / ($empire->planets->getCount() - $empire->planets->data["gov_planets"])) * $planets_maintenance);

	$planets_maintenance -= $planets_maintenance_reduction;
	if ($planets_maintenance < 0) $planets_maintenance = 0;
	
	$military_maintenance = $empire->army->data["soldiers"] * CONF_MAINTENANCE_CREDITS_SOLDIER;
	$military_maintenance += $empire->army->data["fighters"] * CONF_MAINTENANCE_CREDITS_FIGHTER;
	$military_maintenance += $empire->army->data["stations"] * CONF_MAINTENANCE_CREDITS_STATION;
	$military_maintenance += $empire->army->data["lightcruisers"] * CONF_MAINTENANCE_CREDITS_LIGHTCRUISER;
	$military_maintenance += $empire->army->data["heavycruisers"] * CONF_MAINTENANCE_CREDITS_HEAVYCRUISER;
	$military_maintenance += $empire->army->data["carriers"] * CONF_MAINTENANCE_CREDITS_CARRIER;
	
	// Calculate remote military units 
	$query = "SELECT * FROM game".$game_id."_tb_armyconvoy WHERE empire_from='".$empire->data["id"]."'";
	$rs = $DB->Execute($query);
	while(!$rs->EOF) {

		$military_maintenance += $rs->fields["convoy_soldiers"] * CONF_MAINTENANCE_CREDITS_SOLDIER;
		$military_maintenance += $rs->fields["convoy_fighters"] * CONF_MAINTENANCE_CREDITS_FIGHTER;
		$military_maintenance += $rs->fields["convoy_lightcruisers"] * CONF_MAINTENANCE_CREDITS_LIGHTCRUISER;
		$military_maintenance += $rs->fields["convoy_heavycruisers"] * CONF_MAINTENANCE_CREDITS_HEAVYCRUISER;
		$military_maintenance += $rs->fields["carriers"] * CONF_MAINTENANCE_CREDITS_CARRIER;
		$rs->MoveNext();
	}

	// Calculate remote trade units 
	$query = "SELECT * FROM game".$game_id."_tb_tradeconvoy WHERE empire_from='".$empire->data["id"]."'";
	$rs = $DB->Execute($query);
	while(!$rs->EOF) {

		$military_maintenance += $rs->fields["trade_soldiers"] * CONF_MAINTENANCE_CREDITS_SOLDIER;
		$military_maintenance += $rs->fields["trade_fighters"] * CONF_MAINTENANCE_CREDITS_FIGHTER;
		$military_maintenance += $rs->fields["trade_lightcruisers"] * CONF_MAINTENANCE_CREDITS_LIGHTCRUISER;
		$military_maintenance += $rs->fields["trade_heavycruisers"] * CONF_MAINTENANCE_CREDITS_HEAVYCRUISER;
		$military_maintenance += $rs->fields["carriers"] * CONF_MAINTENANCE_CREDITS_CARRIER;
		$rs->MoveNext();
	}


	if ($military_maintenance < 0) $military_maintenance = 0;

	$military_maintenance = $GAME["system"]->alterNumber($military_maintenance, 5);
	
	/* Bond payment */
	$query = "SELECT * FROM game".$game_id."_tb_bond WHERE empire='".$empire->data["id"]."'";
	$rs = $DB->Execute($query);
	while(!$rs->EOF) {
		
		$rs->fields["turns_left"]--;
		if ($rs->fields["turns_left"] ==0) {

			$empire->data["credits"] += $rs->fields["current_credits"];
			$income += $rs->fields["current_credits"];
			$empire->save();
			$DB->Execute("DELETE FROM game".$game_id."_tb_bond WHERE id='".$rs->fields["id"]."'");
			
			$evt = new EventCreator($DB);
			$evt->from = -1;
			$evt->seen = 1;
			
			$evt->to = $empire->data["id"];
			$evt->type = CONF_EVENT_BOND_PAYOUT;
			$evt->params = array("current_credits"=>$rs->fields["current_credits"]);
			$evt->send();
			
		} else {
		 	$rs->fields["current_credits"] += floor(($rs->fields["current_credits"] / 100) * $rs->fields["rate"]);
			$DB->Execute("UPDATE game".$game_id."_tb_bond SET turns_left='".$rs->fields["turns_left"]."',current_credits='".$rs->fields["current_credits"]."' WHERE id='".$rs->fields["id"]."'");	
		}
		
		$rs->MoveNext();
	}
	
	/* Loans management */
	$loans_payment = 0;

	$query = "SELECT * FROM game".$game_id."_tb_loan WHERE empire='" . $empire->data["id"]."'";
	$rs = $DB->Execute($query);
	while (!$rs->EOF) {
	
		if ($rs->fields["turns_left"] == 0) {

			$DB->Execute("DELETE FROM game".$game_id."_tb_loan WHERE id='" .	$rs->fields["id"]."'");
		}

		if ($rs->fields["turns_left"] > 0) {
			$loan = $rs->fields["current_credits"] / $rs->fields["turns_left"];
			$lrate = ($rs->fields["current_credits"] / 100) * $rs->fields["rate"];
			$loan = $loan + $lrate;
			$loan = round($loan);

			$loans_payment += $loan;

			$DB->Execute("UPDATE game".$game_id."_tb_loan SET current_credits=" .
			 ($rs->fields["current_credits"] - ($rs->fields["current_credits"] / $rs->fields["turns_left"])) . ",turns_left=" . ($rs->fields["turns_left"] - 1) . " WHERE id=" . $rs->fields["id"]);
		
		}

		$rs->MoveNext();
		
	}

	if ($loans_payment != 0) {

		$tolottery = round(($loans_payment / 100) * CONF_SOLARBANK_LOTTERY);
		$DB->Execute("UPDATE game".$game_id."_tb_coordinator SET lottery_cash=" . ($GAME["template"]->coord["lottery_cash"] + $tolottery));
	}

	$payment = $loans_payment + $planets_maintenance + $military_maintenance;

	$money_final = $money_initial + $income - $payment;
	$money_lastturn = $empire->data["last_credits"];

	if ($money_lastturn == 0)
		$money_lastturn = 1;
	if ($money_initial <= 0) {
		$growrate = 0;
	} else {
		$growrate = (($money_final - $money_lastturn) / $money_lastturn) * 100;
		$growrate = substr($growrate, 0, 5);
	}

	
	$total_incomes = $population_tax_income + $urban_tax_income + $food_production_income +  $ore_production_income + $tourism_income + $petroleum_production_income;
	$total_payments = $payment;

	$evt = new EventCreator($DB);
	$evt->seen = 1;
	$evt->from = -1;
	$evt->to = $empire->data["id"];
	$evt->type = CONF_EVENT_MONEYGROWTH;
	$evt->params = array(
		"money_initial"=>$GAME["template"]->formatCredits($money_initial),
		"population_tax_income"=>$GAME["template"]->formatCredits($population_tax_income),
		"research_production_income"=>$GAME["template"]->formatCredits($research_production_income),
		"taxrate"=>$empire->data["taxrate"],
		"urban_tax_income"=>$GAME["template"]->formatCredits($urban_tax_income),
		"tourism_income"=>$GAME["template"]->formatCredits($tourism_income),
		"food_production_income"=>$GAME["template"]->formatCredits($food_production_income),
		"ore_production_income"=>$GAME["template"]->formatCredits($ore_production_income),
		"petroleum_production_income"=>$GAME["template"]->formatCredits($petroleum_production_income),
		"planets_maintenance"=>$GAME["template"]->formatCredits($planets_maintenance),
		"military_maintenance"=>$GAME["template"]->formatCredits($military_maintenance),
		"money_final"=>$GAME["template"]->formatCredits($money_final),
		"loans_payment"=>$GAME["template"]->formatCredits($loans_payment),
		"total_incomes"=>$GAME["template"]->formatCredits($total_incomes),
		"total_payments"=>$GAME["template"]->formatCredits($total_payments),
		"growrate"=>$growrate
	);
	$evt->send();
	
	$empire->data["last_credits"] = $money_final;
	$empire->data["credits"] = $money_final;

}
?>
