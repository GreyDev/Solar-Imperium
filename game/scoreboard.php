<?php

// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //

define("LANGUAGE_DOMAIN","game");

require_once("../include/game/init.php");

$game_id = -1;
if (isset($_SESSION["game"])) $game_id = intval($_SESSION["game"]);
if (isset($_GET["GAME"])) $game_id = intval($_GET["GAME"]);

if ($GAME["session"]->isActive()) $GAME["empire"]->load($_SESSION["empire_id"]);

$GAME["template"]->setPage("scoreboard.html");

$rs = $DB->Execute("SELECT COUNT(*) FROM game".$game_id."_tb_empire WHERE active = '1'");
$GAME["template"]->setVar("playerscount",$rs->fields[0]);
$GAME["template"]->setVar("maxplayers",CONF_MAXPLAYERS);
$GAME["template"]->setVar("max_planets_per_turn",T_("Limited by credits"));

$rs = $DB->Execute("SELECT population FROM game".$game_id."_tb_empire WHERE active='1'");
$population = 0;
while (!$rs->EOF)
{
	$population += $rs->fields[0];
	
	$rs->MoveNExt();
}

$GAME["template"]->setVar("total_population",$GAME["template"]->formatPopulation($population));

$galaxy_master = 0;
$galaxy_master_name = "";
$planets_master = 0;
$planets_master_name = "";
$tech_master = 0;
$tech_master_name = "";
$galactic_warlord = "";
$galactic_warlord_name = "";
$pop_zealot = 0;
$pop_zealot_name = "";
$food_master = 0;
$food_master_name = "";
$credits_overlord = 0;
$credits_overlord_name = "";


$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_empire  WHERE active='1' ORDER BY networth DESC");
$loop = array();
$count = 0;
while (!$rs->EOF)
{

	if ($rs->fields["active"] == 2) $rs->fields["name"] = " <b>*".T_("collapsed")."*</b> ".$rs->fields["name"];

	$planets = $DB->Execute("SELECT * FROM game".$game_id."_tb_planets WHERE empire='".$rs->fields["id"]."'");
	$planets = $planets->fields;
	$rs->fields["planets_count"] = $planets["food_planets"];
	$rs->fields["planets_count"] += $planets["ore_planets"];
	$rs->fields["planets_count"] += $planets["tourism_planets"];
	$rs->fields["planets_count"] += $planets["supply_planets"];
	$rs->fields["planets_count"] += $planets["gov_planets"];
	$rs->fields["planets_count"] += $planets["edu_planets"];
	$rs->fields["planets_count"] += $planets["research_planets"];
	$rs->fields["planets_count"] += $planets["urban_planets"];
	$rs->fields["planets_count"] += $planets["petro_planets"];
	$rs->fields["planets_count"] += $planets["antipollu_planets"];

	
	$rs->fields["bgcolor"] =  ($count % 2 == 0?"#667777":"#778888");
	$rs->fields["background"] = ($count++ % 2 == 0?"../images/game/background2.jpg":"../images/game/background3.jpg");


	$your_networth = "";
	if ($GAME["session"]->isActive()) $your_networth = $GAME["empire"]->data["networth"];

	if ($rs->fields["active"] == 1)
	{
	if ($rs->fields["networth"] > $galaxy_master)
	{
		$galaxy_master = $rs->fields["networth"];
		$galaxy_master_name = $GAME["template"]->displayEmpireHTML($rs->fields["id"],$rs->fields["emperor"],$rs->fields["name"],$your_networth);
	}

	if (($rs->fields["networth"]-($rs->fields["population"] * CONF_NETWORTH_POPULATION) - ($rs->fields["planets_count"] * CONF_NETWORTH_PLANETS)) > $galactic_warlord)
	{
		$galactic_warlord = ($rs->fields["networth"]-($rs->fields["population"] * CONF_NETWORTH_POPULATION) - ($rs->fields["planets_count"] * CONF_NETWORTH_PLANETS));
		$galactic_warlord_name = $GAME["template"]->displayEmpireHTML($rs->fields["id"],$rs->fields["emperor"],$rs->fields["name"],$your_networth);
	}

	if ($rs->fields["planets_count"] > $planets_master)
	{
		$planets_master = $rs->fields["planets_count"];
		$planets_master_name = $GAME["template"]->displayEmpireHTML($rs->fields["id"],$rs->fields["emperor"],$rs->fields["name"],$your_networth);
	}

	$total_research_points = 0;
	for ($j=0;$j<$rs->fields["research_level"];$j++)
	{
		$maxpoints = ($j+1);
		$maxpoints = $maxpoints * (($maxpoints * $maxpoints) * CONF_RESEARCH_BASECOST);
		$total_research_points += $maxpoints;
	}
	
	if ($total_research_points > $tech_master)
	{
		$tech_master = $total_research_points;
		$tech_master_name = $GAME["template"]->displayEmpireHTML($rs->fields["id"],$rs->fields["emperor"],$rs->fields["name"],$your_networth);
	}


	if ($rs->fields["population"] > $pop_zealot)
	{
		$pop_zealot = $rs->fields["population"];
		$pop_zealot_name = $GAME["template"]->displayEmpireHTML($rs->fields["id"],$rs->fields["emperor"],$rs->fields["name"],$your_networth);
	}

	if ($rs->fields["food"] > $food_master)
	{
		
		$food_master = $rs->fields["food"];
		$food_master_name = $GAME["template"]->displayEmpireHTML($rs->fields["id"],$rs->fields["emperor"],$rs->fields["name"],$your_networth);
	}

	if ($rs->fields["credits"] > $credits_overlord)
	{
		$credits_overlord = $rs->fields["credits"];
		$credits_overlord_name = $GAME["template"]->displayEmpireHTML($rs->fields["id"],$rs->fields["emperor"],$rs->fields["name"],$your_networth);
	}
	}


	if ($rs->fields["active"] == 1)
		$rs->fields["color"] = "#333333";
	else
		$rs->fields["color"] = "red";


	$rs->fields["rank"] = $count;
   	$rs->fields["emperor"] = stripslashes($rs->fields["emperor"]);
    
   	if ($rs->fields["protection_turns_left"] != 0) 
		$rs->fields["name"] = "<img src=\"../images/game/shield.gif\" border=\"0\"> ".stripslashes($rs->fields["name"]);
	else
		$rs->fields["name"] = stripslashes($rs->fields["name"]);		
	
	$rs2 = $DB->Execute("SELECT * FROM game".$game_id."_tb_member WHERE empire='".$rs->fields["id"]."'");
	if (!$rs2->EOF) {
		$rs3 = $DB->Execute("SELECT * FROM game".$game_id."_tb_coalition WHERE id='".$rs2->fields["coalition"]."'");
		
		$rs->fields["name"] = "<table style=\"color:#333333;font-size:10pt;font-family:verdana\" cellspacing=\"0\" cellpadding=\"1\" border=\"0\"><tr><td><img width=\"32\" height=\"32\" border=\"1\" bordercolor=\"yellow\" style=\"border-color:yellow\" src=\"img_logo.php?data=".$rs3->fields["logo"]."\"></td><td>&nbsp;<b>".$rs->fields["name"]."</b></td></tr></table>";
	}	

  	if (file_exists("../images/game/empires/$game_id/".$rs->fields["id"].".jpg"))
  		$rs->fields["img_logo"] = "../images/game/empires/$game_id/".$rs->fields["id"].".jpg?=".time(NULL);
  	else
  		$rs->fields["img_logo"] = "img_logo.php?empire=".$rs->fields["id"]; 
   
	$loop[] = $rs->fields;
	$rs->MoveNext();
}

$GAME["template"]->setLoop("toplist",$loop);



$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_coalition ORDER BY networth DESC");
$loop = array();
$count = 0;
while (!$rs->EOF)
{
	
	$rs->fields["bgcolor"] =  ($count % 2 == 0?"#667777":"#778888");
	$rs->fields["background"] = ($count++ % 2 == 0?"../images/game/background2.jpg":"../images/game/background3.jpg");
	$rs->fields["color"] = "#333333";
	$rs->fields["planets_count"] = $GAME["template"]->formatNumber($rs->fields["planets"]);

	$rs2 = $DB->Execute("SELECT COUNT(*) FROM game".$game_id."_tb_member WHERE coalition='".$rs->fields["id"]."'");
	$rs->fields["members"] = $rs2->fields[0];
	$rs->fields["rank"] = $count;
   	$rs->fields["name"] = stripslashes($rs->fields["name"]);
   
   
  	$rs->fields["img_logo"] = "img_logo.php?data=".$rs->fields["logo"]; 
   
	$loop[] = $rs->fields;
	$rs->MoveNext();
}

$GAME["template"]->setLoop("coalition_toplist",$loop);



$GAME["template"]->setVar("galaxy_master",$galaxy_master_name);
$GAME["template"]->setVar("planets_master",$planets_master_name);
$GAME["template"]->setVar("tech_master",$tech_master_name);
$GAME["template"]->setVar("galactic_warlord",$galactic_warlord_name);
$GAME["template"]->setVar("pop_zealot",$pop_zealot_name);
$GAME["template"]->setVar("food_master",$food_master_name);
$GAME["template"]->setVar("credits_overlord",$credits_overlord_name);

$DB->CompleteTrans();
print $GAME["template"]->render();

?>
