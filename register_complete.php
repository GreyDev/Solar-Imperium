<?php
// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //

define("LANGUAGE_DOMAIN","system");

require_once("include/init.php");


$DB->CompleteTrans();
$TPL->display("page_register_complete.html");

?>
