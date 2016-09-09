<?php
// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //


define("LANGUAGE_DOMAIN","system");
require_once ("include/init.php");

$TPL->assign("online_chatters",$online_chatters);

if (isset($_GET["AJAX"])) {
	
	if ((isset($_GET["action"])) && ($_GET["action"] == "get_online_count"))  {
		$DB->CompleteTrans(); 
		die($online_chatters);
	}
}


if (!isset($_SESSION["game"])) {
	$DB->CompleteTrans(); 
	die(T_("Invalid GAME ID!"));
	
}

$rs = $DB->Execute("SELECT name FROM system_tb_games WHERE id=".($_SESSION["game"]));
$TPL->assign("game_name",$rs->fields["name"]);

$DB->CompleteTrans(); 

$TPL->display("page_topframe.html");

?>