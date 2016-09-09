<?php

// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //
define("LANGUAGE_DOMAIN","game");

require_once("../include/game/init.php");
$game_id = $_SESSION["game"];

$id = intval($_GET["id"]);

$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_empire WHERE id='$id'");
if ($rs->EOF) die(T_("Invalid empire ID!"));

$GAME["template"]->setPage("show_empire.html");

$GAME["template"]->setVar("info_empire",stripslashes($rs->fields["name"]));
$GAME["template"]->setVar("info_emperor",stripslashes($rs->fields["emperor"]));
$GAME["template"]->setVar("info_empire_id",$rs->fields["id"]);
$GAME["template"]->setVar("gender",$rs->fields["gender"]=="M"?T_("Emperor"):T_("Emperess"));
if ($rs->fields["last_turn_date"] != 0) {
	
$time = time(NULL)-$rs->fields["last_turn_date"];


$lastturn_days = floor($time / (60*60*24));
$time -= ($lastturn_days * (60*60*24));

$lastturn_hours = floor($time / (60*60));
$time -= ($lastturn_hours * (60*60));

$lastturn_minutes = floor($time / 60);
$time -= ($lastturn_minutes*(60));

$lastturn_sec = $time;

$lastturn = "$lastturn_days ".T_("days").", $lastturn_hours ".T_("hours").", $lastturn_minutes ".T_("min.").", $lastturn_sec ".T_("sec");
} else $lastturn = T_("NEVER PLAYED");
$GAME["template"]->setVar("info_lastturn",$lastturn);
if ($rs->fields["biography"]=="") $rs->fields["biography"] = T_("No biography");
$GAME["template"]->setVar("info_biography",stripslashes(str_replace("\n","<br>",$rs->fields["biography"])));
$GAME["template"]->setVar("info_id",$rs->fields["id"]);

$GAME["template"]->setVar("info_date",$rs->fields["date"]);
$GAME["template"]->setVar("info_networth",$rs->fields["networth"]);
$GAME["template"]->setVar("info_population",$rs->fields["population"]);

$rs2 = $DB->Execute("SELECT * FROM game".$game_id."_tb_planets WHERE empire='".$rs->fields["id"]."'");
$planets_count = 0;
$planets_count += $rs2->fields["food_planets"];
$planets_count += $rs2->fields["ore_planets"];
$planets_count += $rs2->fields["tourism_planets"];
$planets_count += $rs2->fields["supply_planets"];
$planets_count += $rs2->fields["gov_planets"];
$planets_count += $rs2->fields["edu_planets"];
$planets_count += $rs2->fields["research_planets"];
$planets_count += $rs2->fields["urban_planets"];
$planets_count += $rs2->fields["petro_planets"];
$planets_count += $rs2->fields["antipollu_planets"];

$GAME["template"]->setVar("info_planets",$planets_count);
$GAME["template"]->setVar("info_turns",$rs->fields["turns_played"]);
$coalition = "None";



$co = $DB->Execute("SELECT game".$game_id."_tb_coalition.id,game".$game_id."_tb_coalition.logo FROM game".$game_id."_tb_coalition,game".$game_id."_tb_member WHERE game".$game_id."_tb_member.empire=".$rs->fields["id"]." AND game".$game_id."_tb_coalition.id = game".$game_id."_tb_member.coalition");
if (!$co->EOF) {
	$coalition = "<a href=\"show_coalition.php?id=".$co->fields["id"]."\"><img src=\"img_logo.php?data=".$co->fields["logo"]."\" style=\"border-color:yellow\" bordercolor=\"yellow\" border=\"1\"></a>";
}

$GAME["template"]->setVar("info_coalition",$coalition);


$rs2 = $DB->Execute("SELECT * FROM game".$game_id."_tb_empire ORDER BY networth DESC");
$playerscount = 0;
$rank = 0;
while(!$rs2->EOF)
{
	if ($rs2->fields["id"] == $rs->fields["id"]) $rank = $playerscount+1;
	$playerscount++;
	$rs2->MoveNext();
}


$GAME["template"]->setVar("img_avatar","../show_avatar.php?id=".$rs->fields["player_id"]);
		

$GAME["template"]->setVar("info_ranking",$rank);
$GAME["template"]->setVar("info_playerscount",$playerscount);
$GAME["template"]->setvar("info_research",$rs->fields["research_level"]);

$DB->CompleteTrans();
print $GAME["template"]->render();

?>
