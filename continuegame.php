<?php

// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //


define("LANGUAGE_DOMAIN","system");
require_once ("include/init.php");

if (!isset($_GET["GAME"])) { 
    $DB->CompleteTrans();
    if (isset($_GET["XML"]))
        die(T_("<xml><Error>Invalid GAME ID!</Error></xml>"));
    else
        die(T_("Invalid GAME ID!"));
}

if (!isset($_SESSION["player"])) {
    $DB->CompleteTrans();
    
    if (isset($_GET["XML"])) 
        die(T_("<xml><Error>Invalid session!</Error></xml>"));
    else
        die(T_("Invalid session!"));

}

$_SESSION["game"] = intval($_GET["GAME"]);

$rs = $DB->Execute("SELECT id FROM game".$_SESSION["game"]."_tb_empire WHERE active < 3 AND player_id=".$_SESSION["player"]["id"]);
if ($rs->EOF) {
	$DB->CompleteTrans();
        if (isset($_GET["XML"]))
            die(T_("<xml><Error>Unable to continue playing. Maybe you have deleted your empire?</Error></xml>"));
        else
            die(T_("Unable to continue playing. Maybe you have deleted your empire?"));

}

$_SESSION["empire_id"] = addslashes($rs->fields["id"]);

$TPL->assign("game_id",$_SESSION["game"]);
$DB->CompleteTrans();

$TPL->display("page_continuegame.html");


?>
