<?php

// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //

define("LANGUAGE_DOMAIN","game");

require_once("../include/game/init.php");

if (!isset($_SESSION["game"])) die();
$game_id = round($_SESSION["game"]);


if ($GAME["session"]->isActive()) $GAME["empire"]->load($_SESSION["empire_id"]);

$GAME["template"]->setPage("hall_of_fame.html");
$GAME["template"]->setVar("game_status",($GAME["template"]->coord["game_status"]==0?T_("Active"):T_("Ended")));

if ($GAME["template"]->coord["game_status"]==0)
	$GAME["template"]->setVar("restart_date",T_("Started"));
else {
	$GAME["template"]->setVar("restart_date",$GAME["template"]->coord["restart_date"] - time(NULL));
}
$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_hall_of_fame ORDER BY id DESC LIMIT 0,5");

$games = array();

while(!$rs->EOF)
{
	$game = $rs->fields;
	$game["date"] = date("m/d/Y",$game["date"]);
	$game["elapsed"] = round($game["elapsed"]/(60*60*24),2);
	$games[] = $game;
	$rs->MoveNext();
}

$GAME["template"]->setLoop("games",$games);
print $GAME["template"]->render();
$DB->CompleteTrans();

?>
