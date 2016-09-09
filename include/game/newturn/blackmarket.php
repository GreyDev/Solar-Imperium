<?php

// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //

function NewTurn_handleBlackMarket($game_id, $empire) {

	global $CONF_CIVIL_STATUS, $DB;

	$empire->data["blackmarket"] = 0;
	$empire->data["blackmarket_cooldown"]--;
	if ($empire->data["blackmarket_cooldown"] < 0) 	$empire->data["blackmarket_cooldown"] = 0;

	srand(time(NULL));
	
	if ($empire->data["networth"] < CONF_BLACKMARKET_MINIMUM_NETWORTH) return;

	$p = rand(0,100);
	if ($p > CONF_BLACKMARKET_RANDOMNESS) return;
	
	$ratio = floor(($empire->army->data["covertagents"] / $empire->planets->getCount())*100);
	if ($ratio >= CONF_BLACKMARKET_COVERT_RATIO_PERCENT) {
		if ($empire->data["blackmarket_cooldown"] == 0)
			$empire->data["blackmarket"] = 1;
	}		
}
?>
