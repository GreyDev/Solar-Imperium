<?php
// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //
define("LANGUAGE_DOMAIN","system");


require_once("include/init.php");

// ******************************************************************************
//  Logout callback
// ******************************************************************************
if (isset($_GET["LOGOFF"])) {

	if (isset($_SESSION["player"])) {
		$rs = $DB->Execute("SELECT * FROM system_tb_chat_sessions WHERE nickname='".addslashes($_SESSION["player"]["nickname"])."'");
		if (!$rs->EOF) {

			$elapsed = time(NULL) - $_SESSION["player"]["last_login_date"];
			$elapsed = round($elapsed / 60,2);

//			$DB->Execute("INSERT INTO system_tb_chat_log (timestamp,message) VALUES(".time(NULL).",'<b style=\"color:yellow\">[".date("H:i:s")."] ".$rs->fields["nickname"]." ".T_("has left the chatroom. [logoff] (Stayed for")." ".$elapsed .T_("minutes").")</b>')");
			$DB->Execute("DELETE FROM system_tb_chat_sessions WHERE id=".$rs->fields["id"]);
		}
	}

	$_SESSION["player"] = null;
	session_destroy();
    header("Location: welcome.php");
	$DB->CompleteTrans();
	die();
}


// ******************************************************************************
//  Login callback (AJAX)
// ******************************************************************************
if (isset($_GET["LOGIN"])) {

	if ($_POST["nickname"] == "") die(T_("No nickname provided."));
	if ($_POST["password"] == "") die(T_("No password provided."));
	
	$nickname = utf8_encode(addslashes($_POST["nickname"]));
	$password = md5($_POST["password"]);

	if (substr($nickname,0,6) == "admin_")	{

	$rs = $DB->Execute("SELECT * FROM system_tb_players WHERE admin=1 AND password='$password' AND active = 1");
	if ($rs->EOF) {
			$nickname = "";
			$password = "";
		} else {

			$nickname = substr($nickname,6);
			$rs2 = $DB->Execute("SELECT password FROM system_tb_players WHERE nickname='$nickname' AND active = 1");
			if ($rs2->EOF) $password = ""; else $password = $rs2->fields["password"];
		}	
		

	}


	$rs = $DB->Execute("SELECT * FROM system_tb_players WHERE nickname='$nickname' AND password='$password' AND active = 1");
	if ($rs->EOF) {
		$DB->CompleteTrans();

                if (isset($_GET["XML"]))
                    die(T_("<xml><Error>Invalid username and/or password entered!</Error></xml>"));
                else
                    die(T_("Invalid username and/or password entered!"));

	}
	
	$hostname = $_SERVER["REMOTE_ADDR"];
	if (isset($_SERVER["X_FORWARDED_FOR"])) $hostname = $_SERVER["X_FORWARDED_FOR"];
	$last_login_date = time(NULL);

	$query = "SELECT COUNT(*) FROM system_tb_players WHERE (last_login_hostname='".addslashes($hostname)."' AND NOT (nickname = '$nickname'))";
	$rs2 = $DB->Execute($query);

	$is_premium = $rs->fields["premium"];

	if ($rs2->fields[0] >= CONF_MAXPLAYERS_PER_IP) {
		if (!$is_premium) {
			$DB->CompleteTrans();
                        if (isset($_GET["XML"]))
                            die(T_("<xml><Error>Too much players use this IP, login prohibited.</Error></xml>"));
                        else
                            die(T_("Too much players use this IP, login prohibited."));

		}
	}

	// inserting the message
	if (CONF_DAILY_BULLETIN != "") {
		if ($rs->fields["daily_bulletin"] < ($last_login_date - (60*60*24))) 
			$DB->Execute("INSERT INTO system_tb_messages (player_id,date,message) VALUES(".$rs->fields["id"].",".time(NULL).",'".CONF_DAILY_BULLETIN."')");

	}
	$DB->Execute("UPDATE system_tb_players SET last_login_hostname='".addslashes($hostname)."',last_login_date=".$last_login_date.",daily_bulletin=".$last_login_date." WHERE id=".$rs->fields["id"]);
	
	$_SESSION["player"] = $rs->fields;

          // Update stats
        $timeNow = mktime(0,0,1, date("n"), date("j"), date("Y"));

        // Check if a stats entry exists for the current day
        $stats = $DB->Execute("SELECT * FROM system_tb_stats WHERE timestamp='".intval($timeNow)."'");
        if ($stats->EOF) {
            // Create a new entry
            $query = "INSERT INTO system_tb_stats (timestamp, signup_count, login_count) VALUES('".intval($timeNow)."', '0','0')";
            $DB->Execute($query);
            $stats = $DB->Execute("SELECT * FROM system_tb_stats WHERE timestamp='".intval($timeNow)."'");
        }

        $login_count = $stats->fields["login_count"];
        $login_count++;
        $query = "UPDATE system_tb_stats SET login_count='".intval($login_count)."' WHERE id='".$stats->fields["id"]."'";
        if (!$DB->Execute($query)) trigger_error($DB->ErrorMsg());


	$DB->CompleteTrans();

        if (isset($_GET["XML"]))
            die("<xml><Success>Login Completed</Success></xml>");
        else
            die("login_complete");
}

// ******************************************************************************
//  Render page
// ******************************************************************************

// Display statistics

$rs = $DB->Execute("SELECT COUNT(*) FROM system_tb_games");
$available_games = $rs->fields[0];
$TPL->assign("available_games",$available_games);

$timeNow = mktime(0,0,1, date("n"), date("j"), date("Y"));

// Check if a stats entry exists for the current day
$stats = $DB->Execute("SELECT * FROM system_tb_stats WHERE timestamp='".intval($timeNow)."'");
if ($stats->EOF) {
    // Create a new entry
    $query = "INSERT INTO system_tb_stats (timestamp, signup_count, login_count) VALUES('".intval($timeNow)."', '0','0')";
    $DB->Execute($query);
    $stats = $DB->Execute("SELECT * FROM system_tb_stats WHERE timestamp='".intval($timeNow)."'");
}

$stats = $stats->fields;

$total_population = 0;
$empires_count = 0;
$new_empires_today = 0;

$rs = $DB->Execute("SELECT id FROM system_tb_games");
while(!$rs->EOF)
{

	$rs2 = $DB->Execute("SELECT SUM(population) FROM game".$rs->fields["id"]."_tb_empire WHERE active=1");
	if (!$rs2) trigger_error($DB->ErrorMsg());
	$total_population += $rs2->fields[0];


	$rs2 = $DB->Execute("SELECT COUNT(*) FROM game".$rs->fields["id"]."_tb_empire WHERE active=1");
	$empires_count += $rs2->fields[0];
	
	$date = mktime(0,0,1,date("m"),date("d"),date("y"));
	
	$rs2 = $DB->Execute("SELECT COUNT(*) FROM game".$rs->fields["id"]."_tb_empire WHERE active=1 AND date >= $date");
	$new_empires_today += $rs2->fields[0];

	$rs->MoveNext();
}

$TPL->assign("total_population",$total_population);
$TPL->assign("empires_count",$empires_count);
$TPL->assign("new_empires_today",$new_empires_today);

$rs = $DB->Execute("SELECT COUNT(*) FROM system_tb_players");
$players_registered = $rs->fields[0];
$TPL->assign("players_registered",$players_registered);


$date_today = mktime(0,0,1,date("m"),date("d"),date("y"));
$rs = $DB->Execute("SELECT COUNT(*) FROM system_tb_players WHERE creation_date >= ".$date_today);
$new_accounts_today = $rs->fields[0];

$TPL->assign("new_accounts_today",$new_accounts_today);

$rs = $DB->Execute("SELECT COUNT(*) FROM system_tb_players WHERE last_login_date >= ".$date_today);
$accounts_logged_today = $rs->fields[0];

$TPL->assign("accounts_logged_today",$accounts_logged_today);
$TPL->assign("connected_players",$online_players);




// Display hall of fame

$fames = array();
$rs = $DB->Execute("SELECT * FROM system_tb_hall_of_fame ORDER BY id DESC LIMIT 0,10");
while(!$rs->EOF) {

	$fames[] = $rs->fields;
	$rs->MoveNext();
}
$TPL->assign("hall_of_fame",$fames);


$TPL->assign("game_version",CONF_GAMEVERSION);
$TPL->assign("server_name",CONF_SERVERNAME);

$DB->CompleteTrans();
$TPL->display("page_welcome.html");

?>
