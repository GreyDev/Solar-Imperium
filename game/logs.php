<?php

// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //

define("LANGUAGE_DOMAIN","game");

require_once("../include/game/init.php");
require_once("../include/game/init_ingame.php");

$GAME["template"]->setPage("logs.html");

$now = time(NULL);
$sevendays = 60*60*24*7;
$logs = array();

////////////////////////////////////////////////////////////////
// Display events
////////////////////////////////////////////////////////////////

$rs = $DB->Execute("SELECT count(*) FROM game".$game_id."_tb_event WHERE event_to='".$GAME["empire"]->data["id"]."'");
$logs_activities = $rs->fields[0];
$GAME["template"]->setVar("logs_activities",$logs_activities);



$rs = $DB->Execute("SELECT count(*) FROM game".$game_id."_tb_event WHERE event_to='".$GAME["empire"]->data["id"]."' 
 AND (
event_type='".CONF_EVENT_SPYCAUGHT."' OR 
event_type='".CONF_EVENT_DISSENSION."' OR
event_type='".CONF_EVENT_FOODBOMBED."' OR
event_type='".CONF_EVENT_HOSTAGES."' OR
event_type='".CONF_EVENT_GUERILLA_REVEALED."' OR
event_type='".CONF_EVENT_GUERILLA_STEALTH."' OR
event_type='".CONF_EVENT_INVADED."' OR
event_type='".CONF_EVENT_WRATHOFKHAN."' OR
event_type='".CONF_EVENT_TREATY_CASUALTIES."' OR
event_type='".CONF_EVENT_EMPIREATTACKED."' OR
event_type='".CONF_EVENT_ELIMINATED."' OR
event_type='".CONF_EVENT_CARRIERS_SABOTAGE."' OR
event_type='".CONF_EVENT_PIRATERAID."' OR
event_type='".CONF_EVENT_COVERTOP_RESULT."' OR
event_type='".CONF_EVENT_PIRATEBUST."' OR
event_type='".CONF_EVENT_TRADECONVOY_RAIDEDBYPIRATE."' OR
event_type='".CONF_EVENT_CONVOY_RETREAT."' OR
event_type='".CONF_EVENT_EMPIRE_BUY_NUKES."' OR
event_type='".CONF_EVENT_NUCLEARWARFARE_BUSTED."' OR
event_type='".CONF_EVENT_NUCLEARWARFARE_FOILED."' OR
event_type='".CONF_EVENT_NUCLEARWARFARE_ATTACKED."' OR
event_type='".CONF_EVENT_INCOMING_INVASION."' OR
event_type='".CONF_EVENT_INCOMING_DEFENSE."' OR
event_type='".CONF_EVENT_SENDING_DEFENSE."' OR
event_type='".CONF_EVENT_INVASION_REPORT."' OR
event_type='".CONF_EVENT_CONVOY_BACK."')");
$logs_warfare = $rs->fields[0];
$GAME["template"]->setVar("logs_warfare",$logs_warfare);

$rs = $DB->Execute("SELECT count(*) FROM game".$game_id."_tb_event WHERE event_to='".$GAME["empire"]->data["id"]."' AND (event_type='".CONF_EVENT_MESSAGE."')");
$logs_communication = $rs->fields[0];
$GAME["template"]->setVar("logs_communication",$logs_communication);


$rs = $DB->Execute("SELECT count(*) FROM game".$game_id."_tb_event WHERE event_to='".$GAME["empire"]->data["id"]."' 
AND (
event_type='".CONF_EVENT_NEWEMPIRE."' OR 
event_type='".CONF_EVENT_COLLAPSEDEMPIRE."' OR
event_type='".CONF_EVENT_LOTTERYWINNER."' OR
event_type='".CONF_EVENT_TRADESENT."' OR
event_type='".CONF_EVENT_NOTICE."' OR
event_type='".CONF_EVENT_WARNING."' OR
event_type='".CONF_EVENT_NEWTURN."' OR
event_type='".CONF_EVENT_PLANETS_RELEASED."' OR
event_type='".CONF_EVENT_RESEARCHDONE."' OR
event_type='".CONF_EVENT_FOODGROWTH."' OR
event_type='".CONF_EVENT_MONEYGROWTH."' OR
event_type='".CONF_EVENT_MILITARYPRODUCTION."' OR
event_type='".CONF_EVENT_POPULATIONGROWTH."' OR
event_type='".CONF_EVENT_RANDOMEVENT."' OR
event_type='".CONF_EVENT_CIVILSTATUS."' OR
event_type='".CONF_EVENT_TURNCOMPLETED."' OR
event_type='".CONF_EVENT_TRADECONVOY_RECEIVED."' OR
event_type='".CONF_EVENT_BOND_PAYOUT."' OR
event_type='".CONF_EVENT_FUNDAMENTAL_COMPLETED."' OR
event_type='".CONF_EVENT_EMPIRE_TELEPORTED."')");
$logs_system = $rs->fields[0];
$GAME["template"]->setVar("logs_system",$logs_system);


$rs = $DB->Execute("SELECT count(*) FROM game".$game_id."_tb_event WHERE event_to='".$GAME["empire"]->data["id"]."' 
AND (
event_type='".CONF_EVENT_COALITION_CREATED."' OR 
event_type='".CONF_EVENT_COALITION_DISBANDED."' OR
event_type='".CONF_EVENT_COALITION_JOINED."' OR
event_type='".CONF_EVENT_COALITION_KICKED."' OR
event_type='".CONF_EVENT_COALITION_INVITE."' OR
event_type='".CONF_EVENT_COALITION_REFUSED."' OR
event_type='".CONF_EVENT_PENDINGTREATY."' OR
event_type='".CONF_EVENT_ACCEPTEDTREATY."' OR
event_type='".CONF_EVENT_REFUSEDTREATY."' OR
event_type='".CONF_EVENT_BREAKTREATY."' OR
event_type='".CONF_EVENT_COALITION_OWNERSHIP_CHANGED."' OR
event_type='".CONF_EVENT_BREAKTREATY."' OR
event_type='".CONF_EVENT_BREAKTREATY."' OR
event_type='".CONF_EVENT_CONVOY_BACK."')");
$logs_diplomacy = $rs->fields[0];
$GAME["template"]->setVar("logs_diplomacy",$logs_diplomacy);





$filter = "ALL";
if (isset($_GET["filter"])) $filter = $_GET["filter"];

$GAME["template"]->setVar("color_activities","#cccccc");
$GAME["template"]->setVar("color_warfare","#cccccc");
$GAME["template"]->setVar("color_communication","#cccccc");
$GAME["template"]->setVar("color_diplomacy","#cccccc");
$GAME["template"]->setVar("color_system","#cccccc");


switch($filter)
{
	case "WARFARE":
		$GAME["template"]->setVar("color_warfare","#ffffff");
		$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_event WHERE event_to='".$GAME["empire"]->data["id"]."' 
AND (
event_type='".CONF_EVENT_SPYCAUGHT."' OR 
event_type='".CONF_EVENT_DISSENSION."' OR
event_type='".CONF_EVENT_FOODBOMBED."' OR
event_type='".CONF_EVENT_HOSTAGES."' OR
event_type='".CONF_EVENT_GUERILLA_REVEALED."' OR
event_type='".CONF_EVENT_GUERILLA_STEALTH."' OR
event_type='".CONF_EVENT_INVADED."' OR
event_type='".CONF_EVENT_WRATHOFKHAN."' OR
event_type='".CONF_EVENT_TREATY_CASUALTIES."' OR
event_type='".CONF_EVENT_EMPIREATTACKED."' OR
event_type='".CONF_EVENT_ELIMINATED."' OR
event_type='".CONF_EVENT_CARRIERS_SABOTAGE."' OR
event_type='".CONF_EVENT_PIRATERAID."' OR
event_type='".CONF_EVENT_COVERTOP_RESULT."' OR
event_type='".CONF_EVENT_PIRATEBUST."' OR
event_type='".CONF_EVENT_TRADECONVOY_RAIDEDBYPIRATE."' OR
event_type='".CONF_EVENT_CONVOY_RETREAT."' OR
event_type='".CONF_EVENT_EMPIRE_BUY_NUKES."' OR
event_type='".CONF_EVENT_NUCLEARWARFARE_BUSTED."' OR
event_type='".CONF_EVENT_NUCLEARWARFARE_FOILED."' OR
event_type='".CONF_EVENT_NUCLEARWARFARE_ATTACKED."' OR
event_type='".CONF_EVENT_INCOMING_INVASION."' OR
event_type='".CONF_EVENT_INCOMING_DEFENSE."' OR
event_type='".CONF_EVENT_SENDING_DEFENSE."' OR
event_type='".CONF_EVENT_INVASION_REPORT."' OR
event_type='".CONF_EVENT_CONVOY_BACK."')  ORDER BY id DESC LIMIT 0,40");

	break;

	case "COMMUNICATION":
		$GAME["template"]->setVar("color_communication","#ffffff");
		$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_event WHERE event_to='".$GAME["empire"]->data["id"]."' AND (event_type='".CONF_EVENT_MESSAGE."') LIMIT 0,40");
	break;

	case "DIPLOMACY":
		
		$GAME["template"]->setVar("color_diplomacy","#ffffff");
		$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_event WHERE event_to='".$GAME["empire"]->data["id"]."' 
AND (
event_type='".CONF_EVENT_COALITION_CREATED."' OR 
event_type='".CONF_EVENT_COALITION_DISBANDED."' OR
event_type='".CONF_EVENT_COALITION_JOINED."' OR
event_type='".CONF_EVENT_COALITION_KICKED."' OR
event_type='".CONF_EVENT_COALITION_INVITE."' OR
event_type='".CONF_EVENT_COALITION_REFUSED."' OR
event_type='".CONF_EVENT_PENDINGTREATY."' OR
event_type='".CONF_EVENT_ACCEPTEDTREATY."' OR
event_type='".CONF_EVENT_REFUSEDTREATY."' OR
event_type='".CONF_EVENT_BREAKTREATY."' OR
event_type='".CONF_EVENT_COALITION_OWNERSHIP_CHANGED."' OR
event_type='".CONF_EVENT_BREAKTREATY."' OR
event_type='".CONF_EVENT_BREAKTREATY."' OR
event_type='".CONF_EVENT_CONVOY_BACK."')  ORDER BY id DESC LIMIT 0,40");
	break;

	case "SYSTEM":

		$GAME["template"]->setVar("color_system","#ffffff");
		$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_event WHERE event_to='".$GAME["empire"]->data["id"]."' 
AND (
event_type='".CONF_EVENT_NEWEMPIRE."' OR 
event_type='".CONF_EVENT_COLLAPSEDEMPIRE."' OR
event_type='".CONF_EVENT_LOTTERYWINNER."' OR
event_type='".CONF_EVENT_TRADESENT."' OR
event_type='".CONF_EVENT_NOTICE."' OR
event_type='".CONF_EVENT_WARNING."' OR
event_type='".CONF_EVENT_NEWTURN."' OR
event_type='".CONF_EVENT_PLANETS_RELEASED."' OR
event_type='".CONF_EVENT_RESEARCHDONE."' OR
event_type='".CONF_EVENT_FOODGROWTH."' OR
event_type='".CONF_EVENT_MONEYGROWTH."' OR
event_type='".CONF_EVENT_MILITARYPRODUCTION."' OR
event_type='".CONF_EVENT_POPULATIONGROWTH."' OR
event_type='".CONF_EVENT_RANDOMEVENT."' OR
event_type='".CONF_EVENT_CIVILSTATUS."' OR
event_type='".CONF_EVENT_TURNCOMPLETED."' OR
event_type='".CONF_EVENT_TRADECONVOY_RECEIVED."' OR
event_type='".CONF_EVENT_BOND_PAYOUT."' OR
event_type='".CONF_EVENT_FUNDAMENTAL_COMPLETED."' OR
event_type='".CONF_EVENT_EMPIRE_TELEPORTED."')  ORDER BY id DESC LIMIT 0,40");	
	break;


	default: // all
		$GAME["template"]->setVar("color_activities","#ffffff");
		$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_event WHERE event_to='".$GAME["empire"]->data["id"]."' ORDER BY id DESC LIMIT 0,40");
	break;
}

$events = array();

while(!$rs->EOF)
{	
	$events[] = $rs->fields;
	$rs->MoveNext();
}

$content = "";
	
$c = array();

$cached_hosts = array();

for ($i=0;$i<count($events);$i++)
{
	$evt = new EventRenderer($DB,$GAME["template"]);

	$notice_data = $evt->renderEvent($events[$i],$GAME["empire"]->data);
		
	$content .= $GAME["template"]->getNotice($notice_data); 

}	

	

	



$GAME["template"]->setVar("content",$content);

$DB->CompleteTrans();
print $GAME["template"]->render();

?>
