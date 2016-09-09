<?php
// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //

define("LANGUAGE_DOMAIN","system");

require_once("include/init.php");

if (!isset($_SESSION["player"])) {
	$DB->CompleteTrans();
	die(header("Location: welcome.php"));
}
	
if (!isset($_GET["GAME"])) {
	$DB->CompleteTrans();
	die(T_("Invalid GAME ID!"));
}

$rs = $DB->Execute("SELECT * FROM system_tb_games WHERE id=".intval($_GET["GAME"]));
if ($rs->EOF) {
	$DB->CompleteTrans();
	die(T_("Invalid GAME ID!"));
}
$game_data = $rs->fields;


// **************************************************************
// Join now callback
// **************************************************************
if ((isset($_GET["JOINNOW"])) && isset($_POST["empire_name"])) {
	$game_id = intval($_GET["GAME"]);
	
	$empire_name = addslashes($_POST["empire_name"]);
	$emperor_name = addslashes($_POST["emperor_name"]);
	$gender = addslashes($_POST["gender"]);
	$autobio = addslashes($_POST["autobiography"]);
	
	if ($empire_name == "") { $DB->CompleteTrans(); die(header("Location: joingame.php?GAME=".intval($_GET["GAME"])."&WARNING=".T_("Invalid empire name!"))); }
	if ($emperor_name == "") { $DB->CompleteTrans(); die(header("Location: joingame.php?GAME=".intval($_GET["GAME"])."&WARNING=".T_("Invalid emperor/emperess name!"))); }
	if ($gender == "") { $DB->CompleteTrans(); die(header("Location: joingame.php?GAME=".intval($_GET["GAME"])."&WARNING=".T_("Invalid gender!"))); }
	if ($autobio == "") $autobio = T_("--- No biography defined ---"); 

	$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_coordinator");
	if ($rs->EOF) { $DB->CompleteTrans(); die(header("Location: joingame.php?GAME=".intval($_GET["GAME"])."&WARNING=".T_("Game not resetted yet!"))); }

	$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_empire WHERE emperor='$emperor_name'");
	if (!$rs->EOF) { $DB->CompleteTrans(); die(header("Location: joingame.php?GAME=".intval($_GET["GAME"])."&WARNING=".T_("Emperor/emperess name already in use!"))); }


	$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_empire WHERE name='$empire_name'");
	if (!$rs->EOF) { $DB->CompleteTrans(); die(header("Location: joingame.php?GAME=".intval($_GET["GAME"])."&WARNING=".T_("Empire name already in use!"))); }
	
	
	// 1 check if its a premium
	if ($game_data["premium_only"] ==1) {
		if ($_SESSION["player"]["premium"] != 1) {
			$DB->CompleteTrans(); 
			die(header("Location: joingame.php?GAME=".intval($_GET["GAME"])."&WARNING=".T_("You need to be a premium member to join this game!")));
		} 
	}
	
	// 2 check if its already full
	$rs = $DB->Execute("SELECT COUNT(*) FROM game".$game_id."_tb_empire WHERE active < 2");
	if ($rs->fields[0] >= $game_data["max_players"]) {
		$DB->CompleteTrans(); 
		die(header("Location: joingame.php?GAME=".intval($_GET["GAME"])."&WARNING=".T_("Too much players, this game is full!")));
	}
	// 3 find a valid starmap position
	
	$x = 0;
	$y = 0;

	do {
		$x = -1000+(rand(0,40) * 50);
		$y = -1000+(rand(0,40) * 50);
		$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_empire WHERE (x>=".($x-50)." AND x<=".($x+50).") AND (y>=".($y-50)." AND y<=".($y+50).") AND active < 2");
	
	} while(!$rs->EOF);
	
	$default_logo = $default_logo[rand(0,count($default_logo)-1)];
	
	$premium = $_SESSION["player"]["premium"];

	
	// 4 insert data in dabase
	$query = "INSERT INTO game".$game_id."_tb_empire (player_id,
	emperor,
	name,
	gender,
	logo,
	biography,
	active,
	date,
	last_turn_date,
	turns_left,
	protection_turns_left,
	credits,
	last_credits,
	population,
	food,
	x,y,premium,food_rate,ore_rate,petroleum_rate) 
	VALUES(".$_SESSION["player"]["id"].",
	'".$emperor_name."',
	'".$empire_name."',
	'".$gender."',
	'$default_logo',
	'".$autobio."',
	1,
	".time(NULL).",
	".time(NULL).",
	".$game_data["turns_per_day"].",
	".$game_data["protection_turns"].",
	".CONF_START_CREDITS.",
	".CONF_START_CREDITS.",
	".CONF_START_POPULATION.",
	".CONF_START_FOOD.",$x,$y,$premium,".CONF_DEFAULT_AUTOSELL_RATE.",".CONF_DEFAULT_AUTOSELL_RATE.",".CONF_DEFAULT_AUTOSELL_RATE."
	);";
	
	$DB->Execute($query);
	if (!$DB) trigger_error($DB->ErrorMsg());

	
	$id = $DB->Insert_ID();
		
	$query = "INSERT INTO game".$game_id."_tb_production (empire) values($id)";
	$DB->Execute($query);

	$query = "INSERT INTO game".$game_id."_tb_supply (empire, rate_soldier) values($id,100);";
	$DB->Execute($query);

	$query = "INSERT INTO game".$game_id."_tb_planets (
	empire,
	food_planets,
	ore_planets,
	tourism_planets,
	supply_planets,
	gov_planets,
	edu_planets,
	research_planets,
	urban_planets,
	petro_planets,
	antipollu_planets) 
	VALUES(
	$id,
	".CONF_START_FOOD_PLANETS.",
	".CONF_START_ORE_PLANETS.",
	".CONF_START_TOURISM_PLANETS.",
	".CONF_START_SUPPLY_PLANETS.",
	".CONF_START_GOV_PLANETS.",
	".CONF_START_EDU_PLANETS.",
	".CONF_START_RESEARCH_PLANETS.",
	".CONF_START_URBAN_PLANETS.",
	".CONF_START_PETRO_PLANETS.",
	".CONF_START_ANTIPOLLU_PLANETS."
	);";

	$DB->Execute($query);

	$query = "INSERT INTO game".$game_id."_tb_army (empire,soldiers,fighters,stations) 
	VALUES($id,".CONF_START_SOLDIERS.",".CONF_START_FIGHTERS.",".CONF_START_STATIONS.");";
	$DB->Execute($query);
	

	$evt_type = CONF_EVENT_NEWEMPIRE;
	$evt_from = $id;
	$evt_params = array("empire_emperor"=>$emperor_name,"empire_name"=>$empire_name,"gender"=>$gender);
	$evt_sticky = 0;
	$evt_seen = 0;
	$evt_height = 160;
		
	$query = "SELECT * FROM game".$game_id."_tb_empire WHERE active=1";
	$recipients = $DB->Execute($query);		
	while(!$recipients->EOF)
	{
		$query = "INSERT INTO game".$game_id."_tb_event (event_type,event_from,event_to,params,seen,sticky,date,height) ".
		"VALUES(".$evt_type.",".$evt_from.",".$recipients->fields["id"].",'".addslashes(serialize($evt_params))."',".$evt_seen.",".$evt_sticky.",".time(NULL).",".$evt_height.")";	
		if (!$DB->Execute($query)) trigger_error($DB->ErrorMsg());
		$recipients->MoveNext();
	}
		
	// garbage collection
	$timeout_unseen = time(NULL) - CONF_UNSEEN_EVENT_TIMEOUT;
	$timeout_seen = time(NULL) - CONF_SEEN_EVENT_TIMEOUT;

	if (!$DB->Execute("DELETE FROM game".$game_id."_tb_event WHERE date < $timeout_unseen AND seen=0")) trigger_error($this->DB->ErrorMsg());
	if (!$DB->Execute("DELETE FROM game".$game_id."_tb_event WHERE date < $timeout_seen AND seen=1")) trigger_error($this->DB->ErrorMsg());
		
	$DB->CompleteTrans(); 
	die(header("Location: gamesbrowser.php?SUCCESS"));
}

// ***************************************************
// Display page
// ***************************************************

$TPL->assign("game_id",$_GET["GAME"]);

$DB->CompleteTrans();
$TPL->display("page_joingame.html");

?>
