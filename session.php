<?php
// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //
define("LANGUAGE_DOMAIN","system");


require_once("include/init.php");

$TPL->assign("player_name",stripslashes($_SESSION["player"]["nickname"]));

$DB->CompleteTrans();
$TPL->display("system/page_session.html");

?>