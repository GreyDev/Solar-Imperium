<?php

// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //

require_once("../include/game/init.php");
require_once("../include/game/init_ingame.php");

////////////////////////////////////////////////////////////////////
// Find empire ranking by networth
////////////////////////////////////////////////////////////////////



$ranking = 0;
$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_empire WHERE active='1' ORDER BY networth DESC");
while(!$rs->EOF)
{
	$ranking++;

	if ($rs->fields["id"] == $GAME["empire"]->data["id"]) {
		break;
	}

	$rs->MoveNext();
}

$GAME["template"]->setPage("welcomeback.html");
$GAME["template"]->setVar("ranking",$ranking);

if ($GAME["empire"]->coalition->isMember()) {
	
	$GAME["template"]->TPL->assign("coalition_logo",$GAME["empire"]->coalition->data["logo"]);
	$GAME["template"]->TPL->assign("is_coalition_member",true);
} else {
	$GAME["template"]->TPL->assign("is_coalition_member",false);
}




$DB->CompleteTrans();
print $GAME["template"]->Render();


?>
