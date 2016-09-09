<?php

// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //

define("LANGUAGE_DOMAIN","game");

require_once("../include/game/init.php");
require_once("../include/game/init_ingame.php");

//////////////////////////////////////////////////////////////////////////////
// Handle requests
//////////////////////////////////////////////////////////////////////////////
if (isset($_GET["current"])) {
	
	$id = intval($_GET["current"]);

	if ($_GET["current"] == -1)
	{
		
		//$GAME["empire"]->data["research_points"] = 0;
		$GAME["empire"]->data["research_tech_id"] = -1;
		$GAME["empire"]->save();
	
		//$GAME["system"]->redirect("research.php",array("NOTICE"=>T_("Current research changed")));
	}

	$tech_data = $GAME["empire"]->research->getTechFromId($_GET["current"]);

	if ($GAME["empire"]->data["research_level"] < $tech_data["level"])
	{
			
		//$GAME["empire"]->data["research_points"] = 0;
		$GAME["empire"]->data["research_tech_id"] = -1;
		$GAME["empire"]->save();
	
		//$GAME["system"]->redirect("research.php",array("NOTICE"=>T_("Current research changed")));
	
	}

	if ($tech_data != null) {
            //$GAME["system"]->redirect("research.php",array("WARNING"=>T_("Invalid research ID")));

	if (in_array($_GET["current"],$GAME["empire"]->research->tech_done))
		$GAME["system"]->redirect("research.php",array("WARNING"=>T_("Research already done!")));


	// test for prerequises
	$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_research_tech WHERE id='$id'");

	$target = explode("_",$rs->fields["target"]);
	if ($target[1] == "level") {
		$current_level = $GAME["empire"]->army->data[$rs->fields["target"]];
		if (($rs->fields["value"] - $current_level) != 1) {
			$GAME["system"]->redirect("research.php",array("WARNING"=>T_("You need to complete previous unit level before!")));
		}
	}

//	$GAME["empire"]->data["research_points"] = 0;
}
	
	$GAME["empire"]->data["research_tech_id"] = $id;
	$GAME["empire"]->save();
	
	//$GAME["system"]->redirect("research.php",array("NOTICE"=>T_("Current research changed")));
		
}

//////////////////////////////////////////////////////////////////////////////
// Display page
//////////////////////////////////////////////////////////////////////////////
$GAME["template"]->setPage("research.html");

/* Display current research */
if ($GAME["empire"]->data["research_tech_id"] == -1) {
	$GAME["template"]->setVar("current_research_name",T_("Fundamental research"));
	$GAME["template"]->setVar("current_research_description",T_("Its required to do some fundamental research to raise your level of intelligence, if you complete all the 8 fundamental research levels, you win by evolving into pure energy (If research race is enabled)"));
	$maxpoints = ($GAME["empire"]->data["research_level"]+1);
	$maxpoints = $maxpoints * (($maxpoints * $maxpoints) * CONF_RESEARCH_BASECOST);

	$GAME["template"]->setVar("current_research_progress",$GAME["template"]->formatNumber($GAME["empire"]->data["research_points"])." / ".$GAME["template"]->formatNumber($maxpoints));

	$growth = $GAME["empire"]->research->getGrowthPoints($GAME["empire"]->planets->data["research_planets"],$GAME["empire"]->production->data["research_short"]);
	

	if ($growth == 0) {
		$GAME["template"]->setVar("current_research_turns_left","---");
	} else {
		$GAME["template"]->setVar("current_research_turns_left",$GAME["template"]->formatNumber(ceil(($maxpoints-$GAME["empire"]->data["research_points"]) / $growth)));
	}		

	$GAME["template"]->setVar("current_research_image","fundamental.gif");
} else {
	$tech_data = $GAME["empire"]->research->getTechFromId($GAME["empire"]->data["research_tech_id"]);
	$GAME["template"]->setVar("current_research_name",stripslashes($tech_data["name"]));
	$GAME["template"]->setVar("current_research_description",stripslashes($tech_data["description"]));
	$GAME["template"]->setVar("current_research_image",stripslashes($tech_data["image"]));

	$growth = $GAME["empire"]->research->getGrowthPoints($GAME["empire"]->planets->data["research_planets"],$GAME["empire"]->production->data["research_short"]);
	
	$GAME["template"]->setVar("current_research_turns_left",
		$GAME["template"]->formatNumber(ceil(($tech_data["cost"]-$GAME["empire"]->data["research_points"]) / ($growth>0?$growth:1))));

	$GAME["template"]->setVar("current_research_progress",$GAME["template"]->formatNumber($GAME["empire"]->data["research_points"])." / ".$GAME["template"]->formatNumber($tech_data["cost"]));
	
}

$research_items = "<tr>";

for ($i=0;$i<8;$i++)
{
	
	$tech_data = $GAME["empire"]->research->getLevel($i+1);
	
	$background="../images/background/game/tech_avail.jpg";
	$locked = false;
	if ($GAME["empire"]->data["research_level"] < ($i+1))
	{
		$background="../images/background/game/tech_locked.jpg";
		$locked = true;
	}
	
	$research_items .= "<td width=\"75\" valign=\"top\" background=\"$background\">";
	
	$smarty = new Smarty();
	$smarty->template_dir = "../templates/game/";
	$smarty->compile_dir = "../templates_c/game/";

	for ($j=0;$j<5;$j++)
	{
		
		if (((count($tech_data)-1) < $j) || ($locked))
		{
			if ((count($tech_data)-1) < $j) {
				$smarty->assign("image","../placeholder.gif");
				$smarty->assign("border_size",0);
			} else {
				$smarty->assign("image","../no_research.jpg");
				$smarty->assign("border_size",1);
			}

			$smarty->assign("research_id","-1");
			$smarty->assign("label","&nbsp;");
		}	
		else
		{
			$smarty->assign("image",$tech_data[$j]["image"]);

			if (in_array($tech_data[$j]["id"],$GAME["empire"]->research->tech_done))
			{
				$smarty->assign("image",str_replace(".","_done.",$tech_data[$j]["image"]));
				$smarty->assign("research_id","-1");
				$smarty->assign("label",T_("Done"));
			} else {				
				$smarty->assign("research_id",$tech_data[$j]["id"]);
				$smarty->assign("label","<img src=\"../images/game/placeholder.gif\" title=\"".$tech_data[$j]["name"]."\"  alt=\"".$tech_data[$j]["name"]."\" width=\"48\" height=\"48\" border=\"0\"><br/>");
			}

			$smarty->assign("border_size",1);
	
		}
		
		$research_items .= $smarty->fetch("research_item.html");
		if ($j!=4)
			$research_items .= "<img src=\"../images/game/placeholder.gif\" height=\"10px\" border=\"0\">";
	}
	
	unset($smarty);
	$research_items .= "</td>";
}
$research_items .= "<td rowpsan=\"4\"><a href=\"#\" onclick=\"open_page('research.php?current=-1')\"><img style=\"border:1px solid yellow\" src=\"../images/game/research/fundamental2.gif\" width=\"60\" height=\"290\"></a></td>";
$research_items .= "</tr>";
$GAME["template"]->setVar("research_items",$research_items);

print $GAME["template"]->render();
$DB->CompleteTrans();

?>