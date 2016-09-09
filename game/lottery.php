<?php

// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //

define("LANGUAGE_DOMAIN","game");

require_once("../include/game/init.php");
require_once("../include/game/init_ingame.php");

//////////////////////////////////////////////////////////////////////////////
// Handle requests
//////////////////////////////////////////////////////////////////////////////
if (isset($_GET["buy"]))
{
	$buy = intval($_GET["buy"]);
	if (($buy < 0) || 
	($buy > floor($GAME["empire"]->data["credits"]/CONF_LOTTERY_TICKETPRICE)) || 
	(($GAME["empire"]->data["lottery_tickets"]+$buy) > CONF_LOTTERY_MAXTICKETS))
	{

		$GAME["system"]->redirect("lottery.php",array("WARNING"=>T_("Invalid tickets amount!")));	
	
	} 

	$GAME["empire"]->data["lottery_tickets"] += $buy;
	$GAME["empire"]->data["credits"] -= ($buy * CONF_LOTTERY_TICKETPRICE);
	$GAME["empire"]->save();
			
	$credits = floor((($buy * CONF_LOTTERY_TICKETPRICE)/100)*CONF_LOTTERY_TICKETRATIO);
	
	$GAME["template"]->coord["lottery_cash"] += $credits;	
		
	$DB->Execute("UPDATE game".$game_id."_tb_coordinator SET lottery_cash=".($GAME["template"]->coord["lottery_cash"]));
	
	$notice = T_("Ticket(s) bought: {qty} for {credits}");
	$notice = str_replace("{qty}",$buy,$notice);
	$notice = str_replace("{credits}",$GAME["template"]->formatCredits($buy * CONF_LOTTERY_TICKETPRICE),$notice);
		
	$GAME["system"]->redirect("lottery.php",array("NOTICE"=>$notice));
	
}


//////////////////////////////////////////////////////////////////////////////
// Display page
//////////////////////////////////////////////////////////////////////////////

$GAME["template"]->setPage("lottery.html");

$GAME["template"]->setVar("lottery_jackpot",$GAME["template"]->formatCredits($GAME["template"]->coord["lottery_cash"]));
$GAME["template"]->setVar("lottery_ticketprice",$GAME["template"]->formatCredits(CONF_LOTTERY_TICKETPRICE));

// fetch tickets count
$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_empire WHERE active='1'");
$tickets = 0;

while (!$rs->EOF)
{
	$tickets += $rs->fields["lottery_tickets"];
	$rs->MoveNext();
}

$maxtickets =(floor($GAME["empire"]->data["credits"]/CONF_LOTTERY_TICKETPRICE));
$currenttickets = (CONF_LOTTERY_MAXTICKETS-$GAME["empire"]->data["lottery_tickets"]);

if ($maxtickets > $currenttickets) 	$maxtickets = $currenttickets;

$GAME["template"]->setVar("label_tickets",T_("How many tickets?")." [".T_("MAX")."=".$GAME["template"]->formatNumber($maxtickets)."]");
$GAME["template"]->setVar("lottery_tickets",$GAME["template"]->formatNumber($tickets));

print $GAME["template"]->render();
$DB->CompleteTrans();

?>