<?php
// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //
define("LANGUAGE_DOMAIN","system");


require_once("include/init.php");

if (isset($_SESSION["player"])) {
    die(header("Location: preferences.php"));
}


$DB->CompleteTrans();
$TPL->display("page_login.html");

?>