<?php
// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //


define("CALLED_FROM_GAME_INIT",true);
require_once("../include/init.php");

if (!isset($_SESSION["game"])) {	
	$_SESSION["game"] = -1;
}

if (isset($_GET["GAME"])) {
	if (!isset($_SESSION["game"])) $_SESSION["game"] = -1;
	$_SESSION["game"] = intval($_GET["GAME"]);
	
}


if  (!file_exists("../include/game/games_config/".$_SESSION["game"].".php")) {
	
	die(header("Location: ../welcome.php?WARNING=".T_("Game not found!")));
}

if (!defined("CONF_GAME_VERSION"))
	require_once("games_config/".($_SESSION["game"]).".php");

if (!defined("CONF_BLACKMARKET_MINIMUM_NETWORTH"))
	require_once("games_rules/".($_SESSION["game"]).".php");


require_once("template.php");
require_once("classes/event_creator.php");
require_once("classes/event_renderer.php");
require_once("classes/system.php");
require_once("classes/session.php");
require_once("classes/template.php");
require_once("classes/empire.php");
require_once("classes/army.php");
require_once("classes/invasion.php");
require_once("classes/planets.php");
require_once("classes/gameplay_costs.php");
require_once("classes/coalition.php");
require_once("classes/production.php");
require_once("classes/supply.php");
require_once("classes/diplomacy.php");
require_once("classes/research.php");


function trace_action($game_id, $empire_id, $description) {
	global $DB;
	$rs = $DB->Execute("SELECT turns_played,id FROM game".intval($game_id)."_tb_empire WHERE id='".intval($empire_id)."'");
	$query = "INSERT INTO game".$game_id."_tb_trace (date,empire,turn,description) VALUES('".time(NULL)."','".$rs->fields["id"]."','".$rs->fields["turns_played"]."','".addslashes($description)."');";
	if (!$DB->Execute($query)) trigger_error($DB->ErrorMsg());
}


// initialize various subsystems

$GAME = array();
$GAME["system"] = new System($DB);

$GAME["session"] = new Session($DB);
$GAME["template"] = new Template($DB,$_SESSION["game"]);
$GAME["gameplay_costs"] = new GameplayCosts($DB);
$GAME["empire"] = new Empire($DB, $GAME["template"],$GAME["gameplay_costs"]);
$GAME["system"]->init();


?>
