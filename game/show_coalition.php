<?php

// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //
define("LANGUAGE_DOMAIN","game");

require_once ("../include/game/init.php");
require_once ("../include/game/init_ingame.php");


$id = intval($_GET["id"]);

$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_coalition WHERE id='$id'");
if ($rs->EOF) die(T_("Invalid coalition ID!"));

$GAME["template"]->setPage("show_coalition.html");

$GAME["template"]->setVar("info_coalition_name",stripslashes($rs->fields["name"]));
$GAME["template"]->setVar("info_coalition_id",$rs->fields["id"]);
$GAME["template"]->setVar("info_coalition_logo",$rs->fields["logo"]);


$GAME["template"]->setVar("info_coalition_networth",$rs->fields["networth"]);

$GAME["template"]->setVar("info_coalition_planets",$rs->fields["planets"]);

$rs2 = $DB->Execute("SELECT * FROM game".$game_id."_tb_member WHERE coalition='".$rs->fields["id"]."'");
$playerscount = 0;
$rank = 0;
$members = array();

while(!$rs2->EOF)
{
	if ($rs2->fields["empire"] == $rs->fields["id"]) $rank = $playerscount+1;
	$playerscount++;
	
	$rs3 = $DB->Execute("SELECT emperor,name FROM game".$game_id."_tb_empire WHERE id='".$rs2->fields["empire"]."'");
	$members[] = array("name"=>$rs3->fields["emperor"]."@".$rs3->fields["name"]);
	$rs2->MoveNext();
}

$GAME["template"]->setLoop("members",$members);
	
$GAME["template"]->setVar("info_coalition_members",$playerscount);

print $GAME["template"]->render();

$DB->CompleteTrans();

?>
