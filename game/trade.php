<?php

// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //

require_once ("../include/game/init.php");
require_once ("../include/game/init_ingame.php");


////////////////////////////////////////////////////////////////
// Handle request
////////////////////////////////////////////////////////////////
if (isset ($_POST["empire"])) {

        
	$rs = $DB->Execute("SELECT COUNT(*) FROM game".$game_id."_tb_tradeconvoy WHERE empire_from='".$GAME["empire"]->data["id"]."'");
	if ($rs->fields[0] == CONF_TRADE_MAXCONVOYS) {
		$GAME["system"]->redirect("trade.php",array("WARNING"=>T_("Too much pending trade convoys!")));
	}
	$trade_money = round($_POST["trade_money"]);
	if ($trade_money < 0) $trade_money = 0;
	$trade_food = round($_POST["trade_food"]);
	if ($trade_food < 0) $trade_food = 0;
	
	$trade_coverts = round($_POST["trade_coverts"]);
	if ($trade_coverts < 0) $trade_coverts = 0;
	
	$trade_soldiers = round($_POST["trade_soldiers"]);
	if ($trade_soldiers < 0) $trade_soldiers = 0;

	$trade_fighters = round($_POST["trade_fighters"]);
	if ($trade_fighters < 0) $trade_fighters = 0;
	
	$trade_lightcruisers = round($_POST["trade_lightcruisers"]);
	if ($trade_lightcruisers < 0) $trade_lightcruisers = 0;
	
	$trade_heavycruisers = round($_POST["trade_heavycruisers"]);
	if ($trade_heavycruisers < 0) $trade_heavycruisers = 0;
	
	$carriers = 0;

	if (($trade_money > $GAME["empire"]->data["credits"]) || ($trade_money < 0))
		$GAME["system"]->redirect("trade.php", array (
			"WARNING" => T_("Invalid credits amount!")
		));

	$needed_carriers = ceil($trade_money * $units_info["carriers_" .$GAME["empire"]->army->data["carriers_level"]]["cargo_hold"] * CONF_CARRIER_MONEY);
	if ($needed_carriers > $GAME["empire"]->army->data["carriers"]) {
		$GAME["system"]->redirect("trade.php", array (
			"WARNING" => T_("Invalid credits amount!")
		));
	} else
		$carriers += $needed_carriers;


	if (($trade_food > $GAME["empire"]->data["food"]) || ($trade_food < 0))
		$GAME["system"]->redirect("trade.php", array (
			"WARNING" => T_("Invalid food amount!")
		));
	$needed_carriers = ceil($trade_food * $units_info["carriers_" .$GAME["empire"]->army->data["carriers_level"]]["cargo_hold"]* CONF_CARRIER_FOOD);
	if ($needed_carriers > $GAME["empire"]->army->data["carriers"]) {
		$GAME["system"]->redirect("trade.php", array (
			"WARNING" => T_("Invalid food amount!")
		));
	} else
		$carriers += $needed_carriers;

	if (($trade_coverts > $GAME["empire"]->army->data["covertagents"]) || ($trade_coverts < 0))
		$GAME["system"]->redirect("trade.php", array (
			"WARNING" => T_("Invalid covert agents quantity!")
		));
	$needed_carriers = ceil($trade_coverts * $units_info["carriers_" .$GAME["empire"]->army->data["carriers_level"]]["cargo_hold"]* CONF_CARRIER_COVERT);
	if ($needed_carriers > $GAME["empire"]->army->data["carriers"]) {
		$GAME["system"]->redirect("trade.php", array (
			"WARNING" => T_("Invalid covert agents quantity!")
		));
	} else
		$carriers += $needed_carriers;

	if (($trade_soldiers > $GAME["empire"]->army->data["soldiers"]) || ($trade_soldiers < 0))
		$GAME["system"]->redirect("trade.php", array (
			"WARNING" => T_("Invalid soldiers quantity!")
		));
	$needed_carriers = ceil($trade_soldiers * $units_info["carriers_" .$GAME["empire"]->army->data["carriers_level"]]["cargo_hold"]* CONF_CARRIER_SOLDIER);
	if ($needed_carriers > $GAME["empire"]->army->data["carriers"]) {
		$GAME["system"]->redirect("trade.php", array (
			"WARNING" => T_("Invalid soldiers quantity!")
		));
	} else
		$carriers += $needed_carriers;

	if (($trade_fighters > $GAME["empire"]->army->data["fighters"]) || ($trade_fighters < 0))
		$GAME["system"]->redirect("trade.php", array (
			"WARNING" => T_("Invalid fighters quantity!")
		));
	$needed_carriers = ceil($trade_fighters * $units_info["carriers_" .$GAME["empire"]->army->data["carriers_level"]]["cargo_hold"]* CONF_CARRIER_FIGHTER);
	if ($needed_carriers > $GAME["empire"]->army->data["carriers"]) {
		$GAME["system"]->redirect("trade.php", array (
			"WARNING" =>T_("Invalid fighters quantity!")
		));
	} else
		$carriers += $needed_carriers;
            

	if (($trade_lightcruisers > $GAME["empire"]->army->data["lightcruisers"]) || ($trade_lightcruisers < 0))
		$GAME["system"]->redirect("trade.php", array (
			"WARNING" => T_("Invalid light cruisers quantity!")
		));
	$needed_carriers = ceil($trade_lightcruisers * $units_info["carriers_" .$GAME["empire"]->army->data["carriers_level"]]["cargo_hold"]* CONF_CARRIER_LIGHTCRUISER);
	if ($needed_carriers > $GAME["empire"]->army->data["carriers"]) {
		$GAME["system"]->redirect("trade.php", array (
			"WARNING" => T_("Invalid light cruisers quantity!")
		));
	} else
		$carriers += $needed_carriers;

	if (($trade_heavycruisers > $GAME["empire"]->army->data["heavycruisers"]) || ($trade_heavycruisers < 0))
		$GAME["system"]->redirect("trade.php", array (
			"WARNING" => T_("Invalid heavy cruisers quantity!")
		));
	$needed_carriers = ceil($trade_heavycruisers * $units_info["carriers_" .$GAME["empire"]->army->data["carriers_level"]]["cargo_hold"]* CONF_CARRIER_HEAVYCRUISER);
	if ($needed_carriers > $GAME["empire"]->army->data["carriers"]) {
		$GAME["system"]->redirect("trade.php", array (
			"WARNING" => T_("Invalid heavy cruisers quantity!")
		));
	} else
		$carriers += $needed_carriers;

	$carriers = ceil($carriers);
	if ($carriers == 0)
		$GAME["system"]->redirect("trade.php", array (
			"WARNING" => T_("Can't trade this quantity:") . " (" . T_("MAX") . ":" . $GAME["template"]->formatNumber(CONF_TRADE_MAXCARRIERS
		) . ")"));

    
    $empire = intval($_POST["empire"]);
	$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_empire WHERE id='$empire'");
	if ($rs->EOF) {

		$GAME["system"]->redirect("trade.php", array (
			"WARNING" => T_("Invalid empire ID!")
		));
        }

	if ($GAME["empire"]->diplomacy->treatyFrom($empire) == null)
		$GAME["system"]->redirect("trade.php", array (
			"WARNING" => T_("Can't trade with enemy empire!")
		));



	// check if you are still under protection
	if ($GAME["empire"]->data["protection_turns_left"] != 0) {
		$GAME["system"]->redirect("trade.php", array (
			"WARNING" => T_("Can't trade while being under protection!")
		));

	}

	// check if the target is still under protection
	if ($rs->fields["protection_turns_left"] != 0) {
		$GAME["system"]->redirect("trade.php", array (
			"WARNING" => T_("Can't trade with a empire under protection!")
		));

	}

	$content = "";

	$trade_cost = 0;
	$trade_cost += ($trade_money * CONF_TRADETAX_MONEY);
	$trade_cost += ($trade_food * CONF_TRADETAX_FOOD);
	$trade_cost += ($trade_coverts * CONF_TRADETAX_COVERT);
	$trade_cost += ($trade_soldiers * CONF_TRADETAX_SOLDIER);
	$trade_cost += ($trade_fighters * CONF_TRADETAX_FIGHTER);
	$trade_cost += ($trade_lightcruisers * CONF_TRADETAX_LIGHTCRUISER);
	$trade_cost += ($trade_heavycruisers * CONF_TRADETAX_HEAVYCRUISER);
	$trade_cost = round(($trade_cost / 100) * CONF_TRADE_TAXRATE);

	if ($trade_cost == 0)
		$GAME["system"]->redirect("trade.php", array (
			"WARNING" => T_("Empty trade deal!")
		));

	if (($trade_cost + $trade_money) > $GAME["empire"]->data["credits"])
		$GAME["system"]->redirect("trade.php", array (
			"WARNING" => T_("No enough credits!")
		));

	if ($trade_money != 0)
		$content .= T_("Credits") . ": " . $GAME["template"]->formatCredits($trade_money) . "\r\n";
	if ($trade_food != 0)
		$content .= T_("Food") . ": " . $GAME["template"]->formatFood($trade_food) . "\r\n";
	if ($trade_coverts != 0)
		$content .= T_("Covert agents") . ": " . $GAME["template"]->formatNumber($trade_coverts) . "\r\n";
	if ($trade_soldiers != 0)
		$content .= T_("Soldiers") . ": " . $GAME["template"]->formatNumber($trade_soldiers) . "\r\n";
	if ($trade_fighters != 0)
		$content .= T_("Fighters") . ": " . $GAME["template"]->formatNumber($trade_fighters) . "\r\n";
	if ($trade_lightcruisers != 0)
		$content .= T_("Light cruisers") . ": " . $GAME["template"]->formatNumber($trade_lightcruisers) . "\r\n";
	if ($trade_heavycruisers != 0)
		$content .= T_("Heavy cruisers") . ": " . $GAME["template"]->formatNumber($trade_heavycruisers) . "\r\n";

	$GAME["empire"]->data["credits"] -= ($trade_cost + $trade_money);
	$GAME["empire"]->data["food"] -= $trade_food;
	$GAME["empire"]->army->data["covertagents"] -= $trade_coverts;

	$GAME["empire"]->army->data["soldiers"] -= $trade_soldiers;
	$GAME["empire"]->army->data["fighters"] -= $trade_fighters;
	$GAME["empire"]->army->data["lightcruisers"] -= $trade_lightcruisers;
	$GAME["empire"]->army->data["heavycruisers"] -= $trade_heavycruisers;
	$GAME["empire"]->army->data["carriers"] -= $carriers;

	$GAME["empire"]->save();

	$x = abs($GAME["empire"]->data["x"] - $rs->fields["x"]);
	$y = abs($GAME["empire"]->data["y"] - $rs->fields["y"]);

	$time_required = floor(sqrt(($x * $x) + ($y * $y)));
	$time_required = floor($time_required / $units_info["carriers_" . $GAME["empire"]->army->data["carriers_level"]]["speed"]);
	$time_required *= 10;
	$time_required -= ($time_required % 60);
	$time_now = time(NULL);

	// SENDING THE CONVOY
	$query = "INSERT INTO game".$game_id."_tb_tradeconvoy (empire_from,empire_to,trade_money,trade_food,trade_covertagents,trade_soldiers,trade_fighters,trade_lightcruisers,trade_heavycruisers,carriers,time_start,time_end)
		VALUES(" . $GAME["empire"]->data["id"] . ",$empire,$trade_money,$trade_food,$trade_coverts,$trade_soldiers,$trade_fighters,$trade_lightcruisers,$trade_heavycruisers,$carriers,$time_now,".($time_now + $time_required).");";
	$DB->Execute($query);

	$GAME["system"]->redirect("trade.php", array (
		"NOTICE" => T_("Trade convoy sent!")
	));

}

////////////////////////////////////////////////////////////////////////////////////
// Display page
////////////////////////////////////////////////////////////////////////////////////
$GAME["template"]->setPage("trade.html");

$GAME["template"]->setVar("trade_taxrate", CONF_TRADE_TAXRATE);
$GAME["template"]->setVar("trade_carriers", $GAME["template"]->formatNumber($GAME["empire"]->army->data["carriers"]));

/* Populate empires */
$empires = array ();

for ($i = 0; $i < count($GAME["empire"]->diplomacy->data); $i++) {
	$empire = array ();
	$empire_id = $GAME["empire"]->diplomacy->data[$i]["empire_from"];
	if ($empire_id == $GAME["empire"]->data["id"])
		$empire_id = $GAME["empire"]->diplomacy->data[$i]["empire_to"];

	$empire["id"] = $empire_id;
	$rs = $DB->Execute("SELECT emperor,x,y,name,gender FROM game".$game_id."_tb_empire WHERE id='$empire_id'");

	$x = abs($GAME["empire"]->data["x"] - $rs->fields["x"]);
	$y = abs($GAME["empire"]->data["y"] - $rs->fields["y"]);

	$time_required = floor(sqrt(($x * $x) + ($y * $y)));
	$time_required = floor($time_required / $units_info["carriers_" . $GAME["empire"]->army->data["carriers_level"]]["speed"]);
	$time_required *= 10;
	$time_required -= ($time_required % 60);
	$time_required_str =  round($time_required/3600,3)." ".T_("hours");
	$empire["name"] = $GAME["template"]->displayEmpire($rs->fields["emperor"], $rs->fields["name"], $GAME["empire"]->data["networth"]) . " (Time required: $time_required_str)";

	$empires[] = $empire;

}
$GAME["template"]->setVar("empires", $empires);

$credits = $GAME["empire"]->data["credits"];
$max_credits = $credits;
$needed_carriers = ceil($max_credits *  $units_info["carriers_" .$GAME["empire"]->army->data["carriers_level"]]["cargo_hold"]* CONF_CARRIER_MONEY);
if ($needed_carriers > $GAME["empire"]->army->data["carriers"]) {
	$percent = ($GAME["empire"]->army->data["carriers"] / $needed_carriers) * 100;
	$max_credits = floor(($max_credits / 100) * $percent);
}
if ($max_credits < $credits)
	$credits = $max_credits;

$GAME["template"]->setVar("trade_money_max", $GAME["template"]->formatNumber($credits));
$GAME["template"]->setVar("trade_money_max_noformat", $credits);

$food = $GAME["empire"]->data["food"];
$max_food = $food;
$needed_carriers = ceil($max_food * $units_info["carriers_" .$GAME["empire"]->army->data["carriers_level"]]["cargo_hold"]*  CONF_CARRIER_FOOD);
if ($needed_carriers > $GAME["empire"]->army->data["carriers"]) {
	$percent = ($GAME["empire"]->army->data["carriers"] / $needed_carriers) * 100;
	$max_food = floor(($max_food / 100) * $percent);
}
if ($max_food < $food)
	$food = $max_food;

$GAME["template"]->setVar("trade_food_max", $GAME["template"]->formatNumber($food));
$GAME["template"]->setVar("trade_food_max_noformat", $food);


$coverts = $GAME["empire"]->army->data["covertagents"];
$max_coverts = $coverts;
$needed_carriers = ceil($max_coverts *  $units_info["carriers_" .$GAME["empire"]->army->data["carriers_level"]]["cargo_hold"]* CONF_CARRIER_COVERT);
if ($needed_carriers > $GAME["empire"]->army->data["carriers"]) {
	$percent = ($GAME["empire"]->army->data["carriers"] / $needed_carriers) * 100;
	$max_coverts = floor(($max_coverts / 100) * $percent);
}
if ($max_coverts < $coverts)
	$coverts = $max_coverts;

$GAME["template"]->setVar("trade_coverts_max", $GAME["template"]->formatNumber($coverts));
$GAME["template"]->setVar("trade_coverts_max_noformat", $coverts);

$soldiers = $GAME["empire"]->army->data["soldiers"];
$max_soldiers = $soldiers;
$needed_carriers = ceil($max_soldiers * $units_info["carriers_" .$GAME["empire"]->army->data["carriers_level"]]["cargo_hold"]*  CONF_CARRIER_SOLDIER);
if ($needed_carriers > $GAME["empire"]->army->data["carriers"]) {
	$percent = ($GAME["empire"]->army->data["carriers"] / $needed_carriers) * 100;
	$max_soldiers = floor(($max_food / 100) * $percent);
}
if ($max_soldiers < $soldiers)
	$soldiers = $max_soldiers;

$GAME["template"]->setVar("trade_soldiers_max", $GAME["template"]->formatNumber($soldiers));
$GAME["template"]->setVar("trade_soldiers_max_noformat", $soldiers);

$fighters = $GAME["empire"]->army->data["fighters"];
$max_fighters = $fighters;
$needed_carriers = ceil($max_fighters * $units_info["carriers_" .$GAME["empire"]->army->data["carriers_level"]]["cargo_hold"]*  CONF_CARRIER_FIGHTER);
if ($needed_carriers > $GAME["empire"]->army->data["carriers"]) {
	$percent = ($GAME["empire"]->army->data["carriers"] / $needed_carriers) * 100;
	$max_fighters = floor(($max_fighters / 100) * $percent);
}
if ($max_fighters < $fighters)
	$fighters = $max_fighters;

$GAME["template"]->setVar("trade_fighters_max", $GAME["template"]->formatNumber($fighters));
$GAME["template"]->setVar("trade_fighters_max_noformat", $fighters);

$lightcruisers = $GAME["empire"]->army->data["lightcruisers"];
$max_lightcruisers = $lightcruisers;
$needed_carriers = ceil($max_lightcruisers * $units_info["carriers_" .$GAME["empire"]->army->data["carriers_level"]]["cargo_hold"]*  CONF_CARRIER_LIGHTCRUISER);
if ($needed_carriers > $GAME["empire"]->army->data["carriers"]) {
	$percent = ($GAME["empire"]->army->data["carriers"] / $needed_carriers) * 100;
	$max_lightcruisers = floor(($max_lightcruisers / 100) * $percent);
}
if ($max_lightcruisers < $lightcruisers)
	$lightcruisers = $max_lightcruisers;

$GAME["template"]->setVar("trade_lightcruisers_max", $GAME["template"]->formatNumber($lightcruisers));
$GAME["template"]->setVar("trade_lightcruisers_max_noformat", $lightcruisers);

$heavycruisers = $GAME["empire"]->army->data["heavycruisers"];
$max_heavycruisers = $heavycruisers;
$needed_carriers = ceil($max_heavycruisers * $units_info["carriers_" .$GAME["empire"]->army->data["carriers_level"]]["cargo_hold"]* CONF_CARRIER_HEAVYCRUISER);
if ($needed_carriers > $GAME["empire"]->army->data["carriers"]) {
	$percent = ($GAME["empire"]->army->data["carriers"] / $needed_carriers) * 100;
	$max_heavycruisers = floor(($max_heavycruisers / 100) * $percent);
}
if ($max_heavycruisers < $heavycruisers)
	$heavycruisers = $max_heavycruisers;

$GAME["template"]->setVar("trade_heavycruisers_max", $GAME["template"]->formatNumber($heavycruisers));
$GAME["template"]->setVar("trade_heavycruisers_max_noformat", $heavycruisers);


$active_trades = "";
$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_tradeconvoy WHERE empire_from='" . $GAME["empire"]->data["id"] . "' OR empire_to='" . $GAME["empire"]->data["id"]."'");
$count = 0;
$time_now = time(NULL);

while (!$rs->EOF) {
	$rs3 = $DB->Execute("SELECT * FROM game".$game_id."_tb_empire WHERE id='" . $rs->fields["empire_from"]."'");
	$rs2 = $DB->Execute("SELECT * FROM game".$game_id."_tb_empire WHERE id='" . $rs->fields["empire_to"]."'");
	$orig = $GAME["template"]->displayEmpire($rs3->fields["emperor"], $rs3->fields["name"],$GAME["empire"]->data["networth"]);
	$dest = $GAME["template"]->displayEmpire($rs2->fields["emperor"], $rs2->fields["name"],$GAME["empire"]->data["networth"]);
	$count++;

	

	$GAME["template"]->TPL->assign("count", $count);
	$GAME["template"]->TPL->assign("sender", $orig);
	$GAME["template"]->TPL->assign("destination", $dest);
	$GAME["template"]->TPL->assign("trade_money", $GAME["template"]->formatCredits($rs->fields["trade_money"]));
	$GAME["template"]->TPL->assign("trade_food", $GAME["template"]->formatFood($rs->fields["trade_food"]));
	$GAME["template"]->TPL->assign("trade_covertagents", $GAME["template"]->formatNumber($rs->fields["trade_covertagents"]));
	$GAME["template"]->TPL->assign("trade_soldiers", $GAME["template"]->formatNumber($rs->fields["trade_soldiers"]));
	$GAME["template"]->TPL->assign("trade_fighters", $GAME["template"]->formatNumber($rs->fields["trade_fighters"]));
	$GAME["template"]->TPL->assign("trade_lightcruisers", $GAME["template"]->formatNumber($rs->fields["trade_lightcruisers"]));
	$GAME["template"]->TPL->assign("trade_heavycruisers", $GAME["template"]->formatNumber($rs->fields["trade_heavycruisers"]));
	$GAME["template"]->TPL->assign("carriers_used", $GAME["template"]->formatNumber($rs->fields["carriers"]));
        $time = round($rs->fields["time_end"] - $time_now);
        $timeHour = str_pad(floor($time / (60*60)), 2, "0", STR_PAD_LEFT);
        $timeMinutes =  str_pad(floor(($time - ($timeHour * (60*60))) / 60 ), 2, "0", STR_PAD_LEFT);
        $timeSeconds =  str_pad(round(($time - ($timeHour * (60*60))) % 60), 2, "0", STR_PAD_LEFT);

	$GAME["template"]->TPL->assign("time_left", $timeHour.":".$timeMinutes.":".$timeSeconds);

	$active_trades .= $GAME["template"]->TPL->fetch("tradeconvoy.html");
	$rs->MoveNext();
}
if ($active_trades == "")
	$active_trades = T_("No active trade(s) pending.");

$GAME["template"]->setVar("active_trades", $active_trades);

print $GAME["template"]->render();
$DB->CompleteTrans();


?> 
