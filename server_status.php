<?php
// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //
define("LANGUAGE_DOMAIN","system");


require_once("include/init.php");


$TPL->assign("game_version",CONF_GAMEVERSION);
$TPL->assign("server_name",CONF_SERVERNAME);

$TPL->assign("server_uptime",round((time(NULL) - filectime("include/config.php")) / 60 / 60 / 24,2));



$rs = $DB->Execute("SELECT COUNT(*) FROM system_tb_players");
$registered_players = $rs->fields[0];
$TPL->assign("registered_players",$registered_players);

$rs = $DB->Execute("SELECT COUNT(*) FROM system_tb_players WHERE premium=1");
$premium_accounts = $rs->fields[0];
$TPL->assign("premium_accounts",$premium_accounts);


$rs = $DB->Execute("SELECT COUNT(*) FROM system_tb_games");
$available_games = $rs->fields[0];
$TPL->assign("available_games",$available_games);


$stats = array();
$rs = $DB->Execute("SELECT * FROM system_tb_stats ORDER BY timestamp DESC LIMIT 0,10");
if ($rs != NULL)
while(!$rs->EOF) {
    $stats[] = $rs->fields;
    $rs->MoveNext();
}
$TPL->assign("stats",$stats);

$DB->CompleteTrans();
$TPL->display("page_serverstatus.html");

?>