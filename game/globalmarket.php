<?php

// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //

define("LANGUAGE_DOMAIN","game");

require_once("../include/game/init.php");
require_once("../include/game/init_ingame.php");

$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_market");


$food_price = round((CONF_COST_FOOD * $rs->fields["food_ratio"]));
$ore_price = round((CONF_COST_ORE * $rs->fields["ore_ratio"]));
$petroleum_price = round((CONF_COST_PETROLEUM * $rs->fields["petroleum_ratio"]));

$max_buy_food = floor($GAME["empire"]->data["credits"] / $food_price);
if($max_buy_food > $rs->fields["food"]) $max_buy_food = $rs->fields["food"];

$max_buy_ore = floor($GAME["empire"]->data["credits"] / $ore_price);
if($max_buy_ore > $rs->fields["ore"]) $max_buy_ore = $rs->fields["ore"];

$max_buy_petroleum = floor($GAME["empire"]->data["credits"] / $petroleum_price);
if($max_buy_petroleum > $rs->fields["petroleum"]) $max_buy_petroleum = $rs->fields["petroleum"];

$max_sell_food = $GAME["empire"]->data["food"];
$max_sell_ore = $GAME["empire"]->data["ore"];
$max_sell_petroleum = $GAME["empire"]->data["petroleum"];



///////////////////////////////////////////////////////////////////////////////
// Handle requests
///////////////////////////////////////////////////////////////////////////////


if (isset($_GET["sell"]))
{
	$types = array("food","ore","petroleum");

	$type = addslashes($_GET["type"]);
	$sell = intval($_GET["sell"]);

	if (!in_array($type,$types)) $GAME["system"]->redirect("globalmarket.php");
	
		
	if ($GAME["empire"]->data[$type."_traded"] == 1) {
		$GAME["system"]->redirect("globalmarket.php",array("WARNING"=>T_("Already traded this resource type (once per turn)!")));
	}
	
	
	if (($sell < 0) || ($sell > $GAME["empire"]->data[$type]))
	{
		$GAME["system"]->redirect("globalmarket.php",array("WARNING"=>T_("Invalid quantity!")));
	}

	$GAME["empire"]->data["credits"] += ($sell * round((${$type."_price"})/CONF_COST_SELLRATIO));
	$GAME["empire"]->data[$type] -= $sell;
	$GAME["empire"]->data[$type."_traded"] = 1;
	$GAME["empire"]->save();

	$query = "UPDATE game".$game_id."_tb_market SET ".$type."=".($rs->fields[$type]+$sell).",".$type."_sell=".($rs->fields[$type."_sell"]+$sell);
	$DB->Execute($query);

	$notice = T_("Resource sold: {qty} {resource} for {credits}");
	$notice = str_replace("{qty}",$GAME["template"]->formatFood($sell),$notice);
	$notice = str_replace("{credits}",$GAME["template"]->formatCredits(($sell * round((${$type."_price"})/CONF_COST_SELLRATIO))),$notice);
	$notice = str_replace("{resource}",$type,$notice);
	$GAME["system"]->redirect("globalmarket.php",array("NOTICE"=>$notice));
}


if (isset($_GET["buy"]))
{
	$types = array("food","ore","petroleum");

	$type = addslashes($_GET["type"]);
	$buy = intval($_GET["buy"]);

	if (!in_array($type,$types)) $GAME["system"]->redirect("globalmarket.php");
	
		
	if ($GAME["empire"]->data[$type."_traded"] == 1) {
		$GAME["system"]->redirect("globalmarket.php",array("WARNING"=>T_("Already traded this resource type! (once per turn)")));
	}

	
	if (($buy < 0) || ($buy > ${"max_buy_".$type})) {
		$GAME["system"]->redirect("globalmarket.php",array("WARNING"=>T_("Invalid quantity!")));
	}
	
	
	$GAME["empire"]->data["credits"] -= ($buy * (${$type."_price"}));
	$GAME["empire"]->data[$type] += $buy;
	$GAME["empire"]->data[$type."_traded"] = 1;
	$GAME["empire"]->save();

	$query = "UPDATE game".$game_id."_tb_market SET ".$type."=".($rs->fields[$type]-$buy).",".$type."_buy=".($rs->fields[$type."_buy"]+$buy);
	$DB->Execute($query);


	$notice = T_("Resource bought: {qty} {resource} for {credits}");;
	$notice = str_replace("{qty}",$GAME["template"]->formatFood($buy),$notice);
	$notice = str_replace("{resource}",$type,$notice);
	$notice = str_replace("{credits}",$GAME["template"]->formatCredits($buy*(${$type."_price"})),$notice);
	$GAME["system"]->redirect("globalmarket.php",array("NOTICE"=>$notice));
}


///////////////////////////////////////////////////////////////////////////////
// Display page
///////////////////////////////////////////////////////////////////////////////

$GAME["template"]->setPage("globalmarket.html");

$GAME["template"]->setVar("food_price_buy", $GAME["template"]->formatCredits($food_price));
$GAME["template"]->setVar("food_price_sell", $GAME["template"]->formatCredits(round($food_price/CONF_COST_SELLRATIO)));
$GAME["template"]->setVar("food_instock",  $GAME["template"]->formatFood($rs->fields["food"]) );
$GAME["template"]->setVar("food_mystock",  $GAME["template"]->formatFood($GAME["empire"]->data["food"]) );

$GAME["template"]->setVar("ore_price_buy", $GAME["template"]->formatCredits(round($ore_price)));
$GAME["template"]->setVar("ore_price_sell", $GAME["template"]->formatCredits(round($ore_price/CONF_COST_SELLRATIO)));
$GAME["template"]->setVar("ore_instock",  $GAME["template"]->formatFood($rs->fields["ore"]) );
$GAME["template"]->setVar("ore_mystock",  $GAME["template"]->formatFood($GAME["empire"]->data["ore"]) );

$GAME["template"]->setVar("petroleum_price_buy", $GAME["template"]->formatCredits(round(($petroleum_price))));
$GAME["template"]->setVar("petroleum_price_sell", $GAME["template"]->formatCredits(round($petroleum_price/CONF_COST_SELLRATIO)));
$GAME["template"]->setVar("petroleum_instock",  $GAME["template"]->formatFood($rs->fields["petroleum"]) );
$GAME["template"]->setVar("petroleum_mystock",  $GAME["template"]->formatFood($GAME["empire"]->data["petroleum"]) );

$GAME["template"]->setVar("max_buy_food",$GAME["template"]->formatNumber( $max_buy_food  ));
$GAME["template"]->setVar("max_buy_ore",$GAME["template"]->formatNumber( $max_buy_ore  ));
$GAME["template"]->setVar("max_buy_petroleum",$GAME["template"]->formatNumber( $max_buy_petroleum  ));
$GAME["template"]->setVar("max_sell_food",$GAME["template"]->formatNumber( $max_sell_food  ));
$GAME["template"]->setVar("max_sell_ore",$GAME["template"]->formatNumber( $max_sell_ore  ));
$GAME["template"]->setVar("max_sell_petroleum",$GAME["template"]->formatNumber( $max_sell_petroleum  ));

print $GAME["template"]->render();
$DB->CompleteTrans();

?> 
