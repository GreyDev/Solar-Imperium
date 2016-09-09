<?php
// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //

define("LANGUAGE_DOMAIN","system");
require_once ("include/init.php");

// check if the player is logged
if (!isset ($_SESSION["player"])) {
	$DB->CompleteTrans(); 
	die(header("Location: welcome.php"));
}

// check if the player is admin
if ($_SESSION["player"]["admin"] != 1) {
	$DB->CompleteTrans(); 
	die(T_("You need to be an admin!"));
}

if (!isset($_GET["GAME"])) {
	$DB->CompleteTrans(); 
	die(T_("No game ID supplied!"));

}

if (!isset($_GET["EMPIRE"])) {
	$DB->CompleteTrans(); 
	die(T_("No empire ID supplied!"));

}

$game_id = intval($_GET["GAME"]);
$empire_id = intval($_GET["EMPIRE"]);


$query = "SELECT * FROM game".$game_id."_tb_trace WHERE empire='".$empire_id."' ORDER BY id DESC LIMIT 0,1000";
$rs = $DB->Execute($query);
if (!$rs) trigger_error($DB->ErrorMsg());


$traces = array();
while(!$rs->EOF) {
	$trace = $rs->fields;
	if (substr($trace["description"],0,3) == "---") $trace["description"] = "<b style=color:yellow>".$trace["description"]."</b>";
	$traces[] = $trace;
	$rs->MoveNext();
}

$TPL->assign("items",$traces);


$DB->CompleteTrans();

$TPL->display("page_admin_trace.html");

?>