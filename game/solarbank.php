<?php

// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //

define("LANGUAGE_DOMAIN","game");

require_once("../include/game/init.php");
require_once("../include/game/init_ingame.php");


/* Loading LOANS information */
$loan_amount = 0;
$total_loans = 0;

$query = "SELECT * FROM game".$game_id."_tb_loan WHERE empire='".$_SESSION["empire_id"]."'";
$rs = $DB->Execute($query);

while (!$rs->EOF)
{
	$credits = $rs->fields["current_credits"];
	$loan_amount += $credits;
	if ($credits > 0) $total_loans++;
	$rs->MoveNext();
	
	
}

$query = "SELECT COUNT(*) FROM game".$game_id."_tb_empire WHERE active='1'";
$rs = $DB->Execute($query);
$ccount = 1;

$loan_rate = CONF_SOLARBANK_LOAN_BASE_RATE  + ($total_loans*10);

$loan_maxcredits = (CONF_SOLARBANK_LOAN_BASE_AMOUNT + floor($GAME["empire"]->data["last_credits"]/4));
$loan_maxcredits = floor($loan_maxcredits);

/* Loading BONDS information */
$bond_amount = 0;
$total_bonds = 0;

$query = "SELECT * FROM game".$game_id."_tb_bond WHERE empire='".$GAME["empire"]->data["id"]."'";
$rs = $DB->Execute($query);

while (!$rs->EOF)
{
	$bond_amount += $rs->fields["current_credits"];
	$total_bonds++;
	$rs->MoveNext();
	
	
}

$query = "SELECT COUNT(*) FROM game".$game_id."_tb_empire WHERE active='1'";
$rs = $DB->Execute($query);
$ccount = floor($rs->fields[0]*5);

$bond_rate = CONF_SOLARBANK_BOND_BASE_RATE  - ($total_bonds*0.1);
if ($bond_rate <= 0) $bond_rate = 1;

/////////////////////////////////////////////////////
// Handle requests
/////////////////////////////////////////////////////


if (isset($_GET["takeloan"]))
{
	$credits = round($_POST["credits"]);
	$turns = 0;
	if (isset($_POST["turns"])) $turns = round($_POST["turns"]);
	
	if (($credits < 1) || ($credits > $loan_maxcredits))
	{
		$GAME["system"]->redirect("solarbank.php",array("WARNING"=>T_("Invalid credits amount!")));
	
	} else 
	if (($turns < 1) || ($turns > CONF_SOLARBANK_LOAN_MAXTURNS))
	{
		$GAME["system"]->redirect("solarbank.php",array("WARNING"=>T_("Invalid number of turns")));
	} else 
	if ($total_loans >= CONF_SOLARBANK_LOAN_MAXLOANS)
	{
		$GAME["system"]->redirect("solarbank.php",array("WARNING"=>T_("Too many active loans")));
	} else {
		// take the loan
		$GAME["empire"]->data["credits"] += $credits;
		$GAME["empire"]->save();
		
		$query = "INSERT INTO game".$game_id."_tb_loan (empire,initial_credits,current_credits,total_turns,turns_left,rate,date) VALUES(".$_SESSION["empire_id"].",$credits,$credits,$turns,$turns,$loan_rate,".time(NULL).");";
		$DB->Execute($query);
		
		$notice = T_("{credits} loaned at a rate of {percent} percent(s)");
		$notice = str_replace("{percent}",$loan_rate,$notice);
		$notice = str_replace("{credits}",$GAME["template"]->formatCredits($credits),$notice);

		$GAME["system"]->redirect("solarbank.php",array("NOTICE"=>$notice));		
		
	}

}



if (isset($_GET["takebond"]))
{
	$credits = round($_POST["credits"]);
	$turns = CONF_SOLARBANK_BOND_MAXTURNS;
	
	if (($credits < 1) || ($credits > $GAME["empire"]->data["credits"]))
	{
		$GAME["system"]->redirect("solarbank.php",array("WARNING"=>T_("Invalid credits amount!")));
	
	} else 
	if ($total_bonds >= CONF_SOLARBANK_BOND_MAXBONDS)
	{
		$GAME["system"]->redirect("solarbank.php",array("WARNING"=>T_("Too many active bonds")));
	} else {
		// take the bond
		$GAME["empire"]->data["credits"] -= $credits;
		$GAME["empire"]->save();
		
		$query = "INSERT INTO game".$game_id."_tb_bond (empire,initial_credits,current_credits,total_turns,turns_left,rate,date) VALUES(".$_SESSION["empire_id"].",$credits,$credits,$turns,$turns,$bond_rate,".time(NULL).");";
		$DB->Execute($query);
		
		$notice = T_("{credits} invested at a rate of {percent} percent(s) for {turns} turn(s)");
		$notice = str_replace("{percent}",$bond_rate,$notice);
		$notice = str_replace("{credits}",$GAME["template"]->formatCredits($credits),$notice);
		$notice = str_replace("{turns}",CONF_SOLARBANK_BOND_MAXTURNS,$notice);

		$GAME["system"]->redirect("solarbank.php",array("NOTICE"=>$notice));		
		
	}

}



/////////////////////////////////////////////////////
// Display page
/////////////////////////////////////////////////////



$GAME["template"]->setPage("solarbank.html");

// LOANS
$GAME["template"]->setVar("solarbank_loan_rate",$loan_rate);
$GAME["template"]->setVar("solarbank_loan_loans",(CONF_SOLARBANK_LOAN_MAXLOANS-$total_loans));
$GAME["template"]->setVar("solarbank_loan_credits",$GAME["template"]->formatCredits($loan_maxcredits));
$GAME["template"]->setVar("solarbank_loan_amount",$GAME["template"]->formatCredits($loan_amount));
$GAME["template"]->setVar("solarbank_loan_maxturns",CONF_SOLARBANK_LOAN_MAXTURNS);


$loans = array();
$query = "SELECT * FROM game".$game_id."_tb_loan WHERE empire='".$_SESSION["empire_id"]."'";
$rs = $DB->Execute($query);

while (!$rs->EOF)
{
	if ($rs->fields["current_credits"] > 0) {
		$rs->fields["current_credits"] = $GAME["template"]->formatCredits($rs->fields["current_credits"]);
		$rs->fields["initial_credits"] = $GAME["template"]->formatCredits($rs->fields["initial_credits"]);
		$loans[] = $rs->fields;
	}
	$rs->MoveNext();
	
}

$GAME["template"]->setLoop("loans",$loans);

// GALACTIC BONDS
$GAME["template"]->setVar("solarbank_bond_rate",$bond_rate);
$GAME["template"]->setVar("solarbank_bond_bonds",(CONF_SOLARBANK_BOND_MAXBONDS-$total_bonds));
$GAME["template"]->setVar("solarbank_bond_credits",$GAME["template"]->formatCredits($GAME["empire"]->data["credits"]));
$GAME["template"]->setVar("solarbank_bond_amount",$GAME["template"]->formatCredits($bond_amount));
$GAME["template"]->setVar("solarbank_bond_turns",CONF_SOLARBANK_BOND_MAXTURNS);

$bonds = array();
$query = "SELECT * FROM game".$game_id."_tb_bond WHERE empire='".$_SESSION["empire_id"]."'";
$rs = $DB->Execute($query);
while (!$rs->EOF)
{
	$rs->fields["current_credits"] = $GAME["template"]->formatCredits($rs->fields["current_credits"]);
	$rs->fields["initial_credits"] = $GAME["template"]->formatCredits($rs->fields["initial_credits"]);
	$bonds[] = $rs->fields;
	$rs->MoveNext();
	
}

$GAME["template"]->setVar("bonds",$bonds);

$DB->CompleteTrans();
print $GAME["template"]->render();

?>
