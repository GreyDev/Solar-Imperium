<?php

// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //

define("LANGUAGE_DOMAIN","game");

require_once ("../include/game/init.php");
require_once ("../include/game/init_ingame.php");


////////////////////////////////////////////////////////////////////////////////
// Display page
////////////////////////////////////////////////////////////////////////////////

$ranking = 0;
$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_empire ORDER BY networth DESC");
while(!$rs->EOF)
{
	$ranking++;

	if ($rs->fields["id"] == $_SESSION["empire_id"]) {
		break;
	}

	$rs->MoveNext();
}

$GAME["template"]->setPage("nextturn.html");
$GAME["template"]->setVar("ranking",$ranking);

if ($GAME["empire"]->coalition->isMember()) {
	
	$GAME["template"]->setVar("coalition_logo",$GAME["empire"]->coalition->data["logo"]);
	$GAME["template"]->setVar("block_coalition",true);
}


print $GAME["template"]->render();
$DB->CompleteTrans();

?>