<?php

// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //

function NewTurn_handleMarketGrowth($game_id, $empire)
{
	global $DB,$GAME;
	
	$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_market");
	
	$market_update = time(NULL) - $rs->fields["last_update"];
	if ($market_update > CONF_MARKET_UPDATE_DELAY)
	{

		if ($rs->fields["food_sell"] == 0) $rs->fields["food_sell"] = 1;
		$food_ratio = $rs->fields["food_buy"] / ($rs->fields["food_sell"]/10);
		
		$food_ratio = floor((($rs->fields["food_ratio"] * 10) + $food_ratio)/11);

		if ($food_ratio > CONF_MARKET_RATIO_MAX) $food_ratio = CONF_MARKET_RATIO_MAX;
		if ($food_ratio < CONF_MARKET_RATIO_MIN) $food_ratio = CONF_MARKET_RATIO_MIN;
		

		if ($rs->fields["ore_sell"] == 0) $rs->fields["ore_sell"] = 1;
		$ore_ratio = $rs->fields["ore_buy"] / ($rs->fields["ore_sell"]/10);

		$ore_ratio = floor((($rs->fields["ore_ratio"] * 10) + $ore_ratio)/11);

		if ($ore_ratio > CONF_MARKET_RATIO_MAX) $ore_ratio = CONF_MARKET_RATIO_MAX;
		if ($ore_ratio < CONF_MARKET_RATIO_MIN) $ore_ratio = CONF_MARKET_RATIO_MIN;

		if ($rs->fields["petroleum_sell"] == 0) $rs->fields["petroleum_sell"] = 1;
		$petroleum_ratio = $rs->fields["petroleum_buy"] / ($rs->fields["petroleum_sell"]/10);

		$petroleum_ratio = floor((($rs->fields["petroleum_ratio"] * 10) + $petroleum_ratio)/11);

		if ($petroleum_ratio > CONF_MARKET_RATIO_MAX) $petroleum_ratio = CONF_MARKET_RATIO_MAX;
		if ($petroleum_ratio < CONF_MARKET_RATIO_MIN) $petroleum_ratio = CONF_MARKET_RATIO_MIN;

		$query = "UPDATE game".$game_id."_tb_market SET ".
		"food=".($rs->fields["food"]+CONF_MARKET_GROWTH).",".
		"ore=".($rs->fields["ore"]+CONF_MARKET_GROWTH).",".
		"petroleum=".($rs->fields["petroleum"]+CONF_MARKET_GROWTH).",".
		"food_buy=0,".
		"food_sell=0,".
		"ore_buy=0,".
		"ore_sell=0,".
		"petroleum_buy=0,".
		"petroleum_sell=0,".
		"food_ratio=$food_ratio,".
		"ore_ratio=$ore_ratio,".
		"petroleum_ratio=$petroleum_ratio,".
		"last_update=".time(NULL);
		
		$DB->Execute($query);
		
	}
	
	
}


?>