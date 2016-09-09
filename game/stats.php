<?php

// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //

require_once("../include/game/init.php");
require_once("../include/game/init_ingame.php");

////////////////////////////////////////////////////////////////
// Display page
////////////////////////////////////////////////////////////////
$stats = array();

$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_stats WHERE empire='".$_SESSION["empire_id"]."' ORDER BY turn DESC LIMIT 40");

$GAME["template"]->setPage("stats.html");


if (!isset($_GET["rankings"])) {

while(!$rs->EOF)
{
	$stats[] = $rs->fields;	
	$rs->MoveNext();
}

$count = 40 - count($stats);
if (count($stats) > 0) 
	$laststat = $stats[count($stats)-1];
	else
	$laststat = 0;
	
for ($i=0;$i<$count;$i++)
{
	$stats[] = $laststat;
}

$stats_credits = "";
$stats_food = "";
$stats_networth = "";
$stats_military = "";
$stats_planets = "";
$stats_population = "";
$stats_pollution = "";

for ($i=0;$i<count($stats);$i++)
{
	$stats_credits = $stats[$i]["credits"].",".$stats_credits;
	$stats_food  = $stats[$i]["food"].",".$stats_food;
	$stats_networth = $stats[$i]["networth"].",".$stats_networth;
	$stats_military = $stats[$i]["military"].",".$stats_military;
	$stats_planets = $stats[$i]["planets"].",".$stats_planets;
	$stats_population = $stats[$i]["population"].",".$stats_population;
	$stats_pollution = $stats[$i]["pollution"].",".$stats_pollution;
}


$stats_credits = substr($stats_credits,0,strlen($stats_credits)-1);
$stats_food = substr($stats_food,0,strlen($stats_food)-1);
$stats_networth = substr($stats_networth,0,strlen($stats_networth)-1);
$stats_military = substr($stats_military,0,strlen($stats_military)-1);
$stats_planets = substr($stats_planets,0,strlen($stats_planets)-1);
$stats_population = substr($stats_population,0,strlen($stats_population)-1);
$stats_pollution = substr($stats_pollution,0,strlen($stats_pollution)-1);
$GAME["template"]->setVar("stats_credits",$stats_credits);
$GAME["template"]->setVar("stats_food",$stats_food);
$GAME["template"]->setVar("stats_networth",$stats_networth);
$GAME["template"]->setVar("stats_military",$stats_military);
$GAME["template"]->setVar("stats_planets",$stats_planets);
$GAME["template"]->setVar("stats_population",$stats_population);
$GAME["template"]->setVar("stats_pollution",$stats_pollution);
$GAME["template"]->setVar("block_graphs",true);

} else {



	/////////////////////////////////////////////////////////////////////////////////////////
	// Rankings by Credits
	/////////////////////////////////////////////////////////////////////////////////////////

	$empires = array();
	$total_credits = 1;	
	$rs = $DB->Execute("SELECT credits,name FROM game".$game_id."_tb_empire WHERE active='1' ORDER BY credits DESC");
	while(!$rs->EOF)
	{
		$total_credits += $rs->fields["credits"];

		if (count($empires) < 9) $empires[] = $rs->fields;
		$rs->MoveNext();
	}
	
	$data = "";
	$players_credits = 0;

	for ($i=0;$i<count($empires);$i++) {

		$players_credits += $empires[$i]["credits"];

		$percent = round(($empires[$i]["credits"] / $total_credits) * 100);
		if ($percent == 0) continue;
		$data .= $empires[$i]["name"]." (".$GAME["template"]->formatNumber($empires[$i]["credits"])."):".$percent.";";
	}

	$credits = $total_credits - $players_credits;
	$percent = ($credits / $total_credits) * 100;
	if ($percent != 0)
		$data .= T_("others")." (".$GAME["template"]->formatNumber($credits)."):".$percent;
	else
		$data = substr($data,0,strlen($data)-1);
		
	$GAME["template"]->SetVar("rankings_credits_data",base64_encode($data));



	/////////////////////////////////////////////////////////////////////////////////////////
	// Rankings by Networth
	/////////////////////////////////////////////////////////////////////////////////////////

	$empires = array();
	$total_networth = 1;	
	$rs = $DB->Execute("SELECT networth,name FROM game".$game_id."_tb_empire WHERE active='1' ORDER BY networth DESC");
	while(!$rs->EOF)
	{
		$total_networth += $rs->fields["networth"];

		if (count($empires) < 9) $empires[] = $rs->fields;
		$rs->MoveNext();
	}
	
	$data = "";
	$players_networth = 1;

	for ($i=0;$i<count($empires);$i++) {

		$players_networth += $empires[$i]["networth"];

		$percent = round(($empires[$i]["networth"] / $total_networth) * 100);
		if ($percent == 0) continue;
		$data .= $empires[$i]["name"]." (".$GAME["template"]->formatNumber($empires[$i]["networth"])."):".$percent.";";
	}

	$networth = $total_networth - $players_networth;
	$percent = ($networth / $total_networth) * 100;
	if ($percent != 0)
		$data .= T_("others")." (".$GAME["template"]->formatNumber($networth)."):".$percent;
	else
		$data = substr($data,0,strlen($data)-1);
		
	$GAME["template"]->SetVar("rankings_networth_data",base64_encode($data));


	/////////////////////////////////////////////////////////////////////////////////////////
	// Rankings by Population
	/////////////////////////////////////////////////////////////////////////////////////////

	$empires = array();
	$total_population = 1;	
	$rs = $DB->Execute("SELECT population,name FROM game".$game_id."_tb_empire WHERE active='1' ORDER BY population DESC");
	while(!$rs->EOF)
	{
		$total_population += $rs->fields["population"];

		if (count($empires) < 9) $empires[] = $rs->fields;
		$rs->MoveNext();
	}
	
	$data = "";
	$players_population = 0;

	for ($i=0;$i<count($empires);$i++) {


		$players_population += $empires[$i]["population"];

		$percent = round(($empires[$i]["population"] / $total_population) * 100);
		if ($percent == 0) continue;
		$data .= $empires[$i]["name"]." (".$GAME["template"]->formatNumber($empires[$i]["population"])."):".$percent.";";
	}

	$population = $total_population - $players_population;
	$percent = ($population / $total_population) * 100;
	if ($percent != 0)
		$data .= T_("others")." (".$GAME["template"]->formatNumber($population)."):".$percent;
	else
		$data = substr($data,0,strlen($data)-1);
		
	$GAME["template"]->SetVar("rankings_population_data",base64_encode($data));


	/////////////////////////////////////////////////////////////////////////////////////////
	// Rankings by military strength
	/////////////////////////////////////////////////////////////////////////////////////////

	$empires = array();
	$total_might = 1;	
	$rs = $DB->Execute("SELECT game".$game_id."_tb_army.*,game".$game_id."_tb_empire.name FROM game".$game_id."_tb_empire,game".$game_id."_tb_army WHERE game".$game_id."_tb_empire.active='1' AND game".$game_id."_tb_empire.id = game".$game_id."_tb_army.empire");
	if (!$rs) trigger_error($DB->ErrorMsg());
	
	while(!$rs->EOF)
	{
		$might = 0;
		$might += $rs->fields["soldiers"] * CONF_NETWORTH_MILITARY_SOLDIER;
		$might += $rs->fields["fighters"] * CONF_NETWORTH_MILITARY_FIGHTER;
		$might += $rs->fields["stations"] * CONF_NETWORTH_MILITARY_STATION;
		$might += $rs->fields["lightcruisers"] * CONF_NETWORTH_MILITARY_LIGHTCRUISER;
		$might += $rs->fields["heavycruisers"] * CONF_NETWORTH_MILITARY_HEAVYCRUISER;
		$might += $rs->fields["covertagents"] * CONF_NETWORTH_MILITARY_COVERT;
		$might = floor($might);
		
		if ($might != 0) $empires[$might] = $rs->fields["name"];
		$rs->MoveNext();
	}
	
	krsort($empires);

	$new_empires = array();
	while(list($key,$value) = each($empires)) {
		if (count($new_empires) == 9) break;		
		$total_might += $key;
		$new_empires[] = array("name"=>$value,"might"=>$key);
	}
	$empires = $new_empires;

	$data = "";
	$players_might = 1;

	for ($i=0;$i<count($empires);$i++) {


		$players_might += $empires[$i]["might"];

		$percent = round(($empires[$i]["might"] / $total_might) * 100);
		if ($percent == 0) continue;
		$data .= $empires[$i]["name"]." (".$GAME["template"]->formatNumber($empires[$i]["might"])."):".$percent.";";
	}
	
	if ($total_might == 0) $total_might = 1;
	$might = $total_might - $players_might;
	$percent = ($might / $total_might) * 100;
	if ($percent != 0)
		$data .= T_("others")." (".$GAME["template"]->formatNumber($might)."):".$percent;
	else
		$data = substr($data,0,strlen($data)-1);
		
	$GAME["template"]->SetVar("rankings_military_data",base64_encode($data));


	/////////////////////////////////////////////////////////////////////////////////////////


	$GAME["template"]->SetVar("block_rankings",true);
	
}

print $GAME["template"]->render();
$DB->CompleteTrans();

?> 
