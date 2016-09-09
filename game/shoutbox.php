<?php
// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //

define("LANGUAGE_DOMAIN","game");


require_once ("../include/game/init.php");
require_once ("../include/game/init_ingame.php");

if (!$GAME["empire"]->coalition->isMember()) $GAME["system"]->redirect("diplomacy.php", array("WARNING"=>T_("You need to be in a coalition!")));

if (isset($_POST["chatbox"])) {
	
	$message = $_POST["chatbox"];
	$message = $GAME["system"]->filterText($message);
	
	if ($message != "") {
		
		$query = "INSERT INTO game".$game_id."_tb_shoutbox (coalition,date,empire_name,empire_id,message) VALUES(".$GAME["empire"]->coalition->data["id"].",".time(NULL).",'".$GAME["empire"]->data["emperor"]."',".$GAME["empire"]->data["id"].",'".addslashes($message)."')";
		$DB->Execute($query);	
		
	}
	
	$GAME["system"]->redirect("shoutbox.php");
}



$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_shoutbox WHERE coalition='".$GAME["empire"]->coalition->data["id"]."' ORDER BY date DESC LIMIT 0,15");

$items = array();
$i=0;
while (!$rs->EOF)
{
	
	if (strlen($rs->fields["message"]) > 100) $rs->fields["message"] = substr($rs->fields["message"],0,100)."\n".substr($rs->fields["message"],100);
	$items[] = array("color"=>($i++%2==0?"white":"#AAAAAA"),"timedate"=>$GAME["template"]->formatTime(time(NULL)-$rs->fields["date"]),"empire_id"=>$rs->fields["empire_id"],"game_id"=>$_SESSION["game"],"player"=>$rs->fields["empire_name"],"message"=>$rs->fields["message"]);
	$rs->MoveNext();
}



if (count($items) < 15) {

	
	$temp = array();
	for ($i=0;$i<count($items);$i++) $temp[] = $items[$i];
	for ($i=0;$i<(15-count($items));$i++) {
		$temp[] = array("color"=>($i%2==0?"white":"#AAAAAA"),
		"timedate"=>"---","empire_id"=>"new","game_id"=>".","player"=>"---","message"=>"---");
	}
		
	
	$items = $temp;
}

krsort($items);

$it = array();
for ($i = count($items)-1;$i>=0;$i--) {
    $it[] = $items[$i];
}

$items = $it;

$GAME["template"]->setLoop("items",$items);
$GAME["template"]->setPage("shoutbox.html");
print $GAME["template"]->render();
$DB->CompleteTrans();

?>
