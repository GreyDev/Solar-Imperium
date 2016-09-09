<?php

// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //

define("LANGUAGE_DOMAIN","game");

require_once("../include/game/init.php");
require_once("../include/game/init_ingame.php");



$GAME["template"]->setPage("lastturn.html");

$content = "";

$last_turn_id = $DB->Execute("SELECT * FROM game".$game_id."_tb_event WHERE event_to='".$GAME["empire"]->data["id"]."' AND event_type='".CONF_EVENT_NEWTURN."' ORDER BY id DESC LIMIT 1");
if ($last_turn_id->EOF) {

	if ($GAME["empire"]->data["active"]==2) {
		$GAME["session"]->logout();
		$GAME["system"]->redirect("../gamesbrowser.php");
}
		else
	$GAME["system"]->redirect("manage.php",array("WARNING"=>T_("No turn found")));
	
}
$last_turn_id = $last_turn_id->fields[0];

$last_turn_id2 = $DB->Execute("SELECT * FROM game".$game_id."_tb_event WHERE event_to='".$GAME["empire"]->data["id"]."' AND event_type='".CONF_EVENT_TURNCOMPLETED."' ORDER BY id DESC LIMIT 1");
if ($last_turn_id2->EOF) {

	if ($GAME["empire"]->data["active"]==2)
		die(T_("No turn found")); else
	$GAME["system"]->redirect("manage.php",array("WARNING"=>T_("No turn found")));
	
}

$last_turn_id2 = $last_turn_id2->fields[0];

$event_data = $DB->Execute("SELECT * FROM game".$game_id."_tb_event WHERE event_to='".$GAME["empire"]->data["id"]."' AND id >= $last_turn_id AND id <= $last_turn_id2 ORDER BY id ASC");
while(!$event_data->EOF)
{
	
	$content .= $GAME["template"]->getNotice($events->renderEvent($event_data->fields,$GAME["empire"]->data));
	$event_data->MoveNext();
}


$content = $GAME["template"]->setVar("content",$content);
print $GAME["template"]->Render();
$DB->CompleteTrans();

?>
