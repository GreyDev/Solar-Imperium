<?php
// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //

$path_prefix = "";
if (defined("CALLED_FROM_GAME_INIT")) $path_prefix = "../";


if (!file_exists($path_prefix."include/config.php")) {
    if (!file_exists($path_prefix."install.php")) die("No server set but installer not available too, reinstall the entire software.");
    die(header("Location: ".$path_prefix."install.php"));
}

require_once($path_prefix."include/xss_block.php");
require_once($path_prefix."include/config.php");
require_once($path_prefix."include/thirdparty/smarty/Smarty.class.php");
require_once($path_prefix."include/thirdparty/adodb/adodb.inc.php");

if (isset($_POST["magickey"])) {
    if (!session_start($_POST["magickey"])) die("Unable to create session object!");
} else {
    if (!session_start()) die("Unable to create session object!");
}

require_once($path_prefix."include/languages.php");

$TPL = new Smarty();
$TPL->assign("LANGUAGES",$LANGUAGES);
if (isset($_GET["XML"])) {

    $TPL->template_dir = "templates/xml/system/";
    $TPL->compile_dir = "templates_c/xml/system/";

} else {

    $TPL->template_dir = "templates/system/";
    $TPL->compile_dir = "templates_c/system/";

}


if (isset($_GET["WARNING"])) $TPL->assign("warning_message",$_GET["WARNING"]);

// basic PHP initialization

function phpnum() {
    $version = explode('.', phpversion());
    return (int) $version[0];
}
function is_php5() { return phpnum() == 5; }
function is_php4() { return phpnum() == 4; }

if (is_php5()) {
    date_default_timezone_set(CONF_TIMEZONE);
}


if(!function_exists('make_seed')) {
    function make_seed()
    {
        list($usec, $sec) = explode(' ', microtime());
        return (float) $sec + ((float) $usec * 100000);
    }
}



function dieError($content) {
    if (isset($_GET["XML"]))
    die("<xml><Error>$content</Error></xml>");
    die($content);
}

srand(make_seed());


ob_start();	// output buffering

// if 'register_globals' directive is active, halt the process
if (ini_get("register_globals")==1)
{
    die("Disable register_globals PHP Directive!");
}

// Initialize database
$DB = NewADOConnection(CONF_DATABASE_DRIVER);
if (!@$DB->Connect(CONF_DATABASE_HOSTNAME,CONF_DATABASE_USERNAME,CONF_DATABASE_PASSWORD,CONF_DATABASE_NAME))
    die("Database is currently offline, come back in few minutes. Thank you.");

require_once($path_prefix."include/thirdparty/error_handler.php");

// Do cron update here
if (isset($_SESSION["game"])) {

    $rs = $DB->Execute("SELECT GET_LOCK('cron_update',30);");
    if ($rs->fields[0] == 1) {

        $rs = $DB->Execute("SELECT * FROM system_tb_games WHERE id=".addslashes($_SESSION["game"]));
        if (!$rs) {
            session_destroy();
            die(T_("Invalid game ID while doing update!"));
        }

        if ($rs->EOF) {
            session_destroy();
            die(T_("Invalid game ID while doing update!"));
        }

        $cron_game_id = $rs->fields["id"];
        $cron_victory_condition = $rs->fields["victory_condition"];
        $cron_game_name = $rs->fields["name"];
        $cron_lifetime = $rs->fields["lifetime"];
        $cron_turns_per_day = $rs->fields["turns_per_day"];

        $rs = $DB->Execute("SELECT * FROM game".addslashes($_SESSION["game"])."_tb_coordinator");
        if (!$rs) die(T_("Invalid game ID while doing update!"));
        if ($rs->EOF) die(T_("Invalid game ID while doing update!"));


        require_once($path_prefix."include/update/victory_condition.php");

        $cron_now = time(NULL);
        $cron_timeslice = floor((60 * 60 * 24) / $cron_turns_per_day);
        $cron_elapsed1 = $cron_now - $rs->fields["last_turns_update"];
        $cron_elapsed2 = $cron_now - $rs->fields["last_time_update"];
        $cron_game_status = $rs->fields["game_status"];
        $cron_daily = $rs->fields["last_daily_update"];
        $cron_last_master = $rs->fields["last_master"];


        // 60 second update)
        $cron_delay = $cron_timeslice;
        if ($cron_delay > 60) $cron_delay = 60;


        if ($cron_elapsed2 >= $cron_delay) {


            require_once($path_prefix."include/game/games_config/".addslashes($_SESSION["game"]).".php");
            require_once($path_prefix."include/game/games_rules/".addslashes($_SESSION["game"]).".php");

        
            if (CheckVictoryCondition(addslashes($_SESSION["game"]),$cron_victory_condition,$cron_game_name,$cron_lifetime)) {

                require_once($path_prefix."include/game/classes/event_creator.php");
                require_once($path_prefix."include/game/classes/empire.php");
                require_once($path_prefix."include/game/classes/army.php");
                require_once($path_prefix."include/game/classes/invasion.php");
                require_once($path_prefix."include/game/classes/planets.php");
                require_once($path_prefix."include/game/classes/coalition.php");
                require_once($path_prefix."include/game/classes/production.php");
                require_once($path_prefix."include/game/classes/supply.php");
                require_once($path_prefix."include/game/classes/diplomacy.php");
                require_once($path_prefix."include/game/classes/research.php");
                require_once($path_prefix."include/game/classes/template.php");
                require_once($path_prefix."include/game/classes/gameplay_costs.php");
                require_once($path_prefix."include/update/sanitycheck.php");
                require_once($path_prefix."include/update/trade_convoy.php");
                require_once($path_prefix."include/update/army_convoy.php");

    
                $GAME = array();
                $GAME["template"] = new Template($DB,$_SESSION["game"]);
                $GAME["gameplay_costs"] = new GameplayCosts($DB);
                CheckGameSanity(addslashes($_SESSION["game"]));

                HandleTradeConvoys(addslashes($_SESSION["game"]));

                HandleArmyConvoys(addslashes($_SESSION["game"]));

                
                $query = "UPDATE game".addslashes($_SESSION["game"])."_tb_coordinator SET last_time_update=" . $cron_now;
                if (!$DB->Execute($query)) die($DB->ErrorMsg());

                unset($GAME);
            }
        }



        if ($cron_elapsed1 >= $cron_timeslice) {

            $cron_turns = floor($cron_elapsed1 / $cron_timeslice);

            $query = "UPDATE game".addslashes($_SESSION["game"])."_tb_coordinator SET last_turns_update=" . $cron_now;
            if (!$DB->Execute($query)) die($DB->ErrorMsg());

            $rs = $DB->Execute("SELECT * FROM game".addslashes($_SESSION["game"])."_tb_empire WHERE active=1");
            while (!$rs->EOF) {
                $cron_newturns = $rs->fields["turns_left"] + $cron_turns;

                if ($cron_newturns > $cron_turns_per_day)
                $cron_newturns = $cron_turns_per_day;

                $query = "UPDATE game".addslashes($_SESSION["game"])."_tb_empire SET turns_left=$cron_newturns WHERE id=" . $rs->fields["id"];
                if (!$DB->Execute($query)) die($DB->ErrorMsg());

                $rs->MoveNext();

            }
        }

        // daily update
        if ($cron_now - $cron_daily >= (60*60*24)) {

            // broadcast a NOTICE about who is the galactic master and who was the last one.
            $rs = $DB->Execute("SELECT emperor,name FROM game".addslashes($_SESSION["game"])."_tb_empire WHERE active=1 ORDER BY networth DESC LIMIT 0,1");
            $cron_master_name = $rs->fields["emperor"]."@".$rs->fields["name"];
            if ($cron_master_name != $cron_last_master) {
                $DB->Execute("UPDATE game".addslashes($_SESSION["game"])."_tb_coordinator SET last_master='".addslashes($cron_master_name)."'");

                require_once($path_prefix."include/game/classes/event_creator.php");

                $evt = new EventCreator($DB);
                $evt->type = CONF_EVENT_NOTICE;
                $evt->from = -1;

                if ($cron_master_name != "") {
                    if ($cron_last_master == "@")
                    $evt->params = array ("notice_data" => "<font style=\"color:#cacaca\">".T_("The new galactic master is: ")."</font>".$cron_master_name);
                    else
                    $evt->params = array ("notice_data" => "<font style=\"color:#cacaca\">".T_("The new galactic master is: ")."</font>".$cron_master_name."<font style=\"color:#cacaca\">".T_(", previous master was: ")."</font>".$cron_last_master);

                    $evt->broadcast();
                }
            }

            // add 1 extra turn to all premium members

            $rs = $DB->Execute("SELECT * FROM game".addslashes($_SESSION["game"])."_tb_empire WHERE active=1 AND premium=1");
            while (!$rs->EOF) {
                $cron_newturns = $rs->fields["turns_left"] + 1;

                if ($cron_newturns > $cron_turns_per_day)
                $cron_newturns = $cron_turns_per_day;

                $query = "UPDATE game".addslashes($_SESSION["game"])."_tb_empire " .
            "SET turns_left=$cron_newturns WHERE id=" . $rs->fields["id"];

                $DB->Execute($query);
                if (!$DB) die($DB->ErrorMsg());

                $rs->MoveNext();
            }


            $query = "UPDATE game".$_SESSION["game"]."_tb_coordinator SET last_daily_update=" . $cron_now;
            $DB->Execute($query);
        }


        $DB->Execute("SELECT RELEASE_LOCK('cron_update');");
    }

}



$DB->StartTrans();

// do basic cleanup //
$expiration = time(NULL) - CONF_SESSION_CHAT_TIMEOUT;
$rs = $DB->Execute("SELECT * FROM system_tb_chat_sessions WHERE timestamp < $expiration");
while(!$rs->EOF)
{
    $rs2 = $DB->Execute("SELECT last_login_date FROM system_tb_players WHERE nickname='".addslashes($rs->fields["nickname"])."'");
    $elapsed = 0;
    if(!$rs2->EOF) {
        $elapsed = time(NULL) - $rs2->fields["last_login_date"];
        $elapsed = round($elapsed / 60,2);
    }

//    $DB->Execute("INSERT INTO system_tb_chat_log (timestamp,message) VALUES(".time(NULL).",'<b style=\"color:yellow\">[".date("H:i:s")."] ".$rs->fields["nickname"]." ".T_("has left the chatroom. [timeout] (Stayed for")." ".$elapsed." ".T_("minutes").")</b>')");

    $DB->Execute("DELETE FROM system_tb_chat_sessions WHERE id=".addslashes($rs->fields["id"]));
    $rs->MoveNext();
}


$rs = $DB->Execute("SELECT * FROM system_tb_sessions WHERE date < $expiration");
while(!$rs->EOF)
{
    $DB->Execute("DELETE FROM system_tb_sessions WHERE id=".addslashes($rs->fields["id"]));
    $rs->MoveNext();
}

$DB->Execute("DELETE FROM system_tb_chat_sessions WHERE timestamp < ".$expiration);


if ((isset($_SESSION["player"])) && (isset($_SESSION["player"]["id"]))) {
    $rs = $DB->Execute("SELECT * FROM system_tb_sessions WHERE player=".$_SESSION["player"]["id"]);
    if ($rs->EOF) {
        $DB->Execute("INSERT INTO system_tb_sessions (player,date) VALUES(".$_SESSION["player"]["id"].",".time(NULL).")");
    } else {
        $DB->Execute("UPDATE system_tb_sessions SET date=".time(NULL)." WHERE player=".$_SESSION["player"]["id"]);
    }

    $TPL->assign("user_is_admin",$_SESSION["player"]["admin"]);

    // updating fields
    $rs = $DB->Execute("SELECT * FROM system_tb_players WHERE id=".$_SESSION["player"]["id"]);
    $_SESSION["player"] = $rs->fields;


    $TPL->assign("score",$_SESSION["player"]["score"]);

    $rs = $DB->Execute("SELECT id FROM system_tb_players ORDER BY score DESC");
    $rank = 0;

    while(!$rs->EOF) {

        $rank++;
        if ($rs->fields["id"] == $_SESSION["player"]["id"]) break;
        $rs->MovENext();
    }

    $TPL->assign("rank",$rank);

} else {
    $TPL->assign("user_is_admin",0); // false

}

$rs = $DB->Execute("SELECT COUNT(*) FROM system_tb_sessions");
$online_players = $rs->fields[0];
$rs = $DB->Execute("SELECT COUNT(*) FROM system_tb_chat_sessions");
$online_chatters = $rs->fields[0];


// cleanup timed out games sessions
$rs = $DB->Execute("SELECT id FROM system_tb_games");
if (!$rs) trigger_error($DB->ErrorMsg());

$timeout_date = time(NULL) - (60*5);

while(!$rs->EOF) {
    $DB->Execute("DELETE FROM game".$rs->fields["id"]."_tb_session WHERE lastdate <= $timeout_date");
    if (!$DB) trigger_error($DB->ErrorMsg());

    $rs->MoveNext();
}


$TPL->assign("online_players",$online_players);

if ((isset($_SESSION["player"])) && (isset($_SESSION["player"]["id"]))) {

    // display connected player information
    $TPL->assign("user_is_connected", 1);
    $TPL->assign("nickname",$_SESSION["player"]["nickname"]);
    $TPL->assign("online_chatters",$online_chatters);

    // destroy empire
    if (isset($_GET["DESTROY_EMPIRE"])) {
        $_SESSION["game"] = intval($_GET["GAME"]);
        $game_id = $_SESSION["game"];
        $rs = $DB->Execute("SELECT id FROM game".$game_id."_tb_empire  WHERE active < 3 AND player_id=".addslashes($_SESSION["player"]["id"]));
        if ($rs->EOF) {
            die(T_("Invalid empire ID!"));
        }

        $_SESSION["empire_id"] = $rs->fields["id"];

        die(header("Location: game/destroy_empire.php"));

    }


    if (isset($_GET["DELETE_MSG"])) {
        $id = intval($_GET["DELETE_MSG"]);
        $rs = $DB->Execute("SELECT * FROM system_tb_messages WHERE id='$id'");
        if ($rs->fields["player_id"] == $_SESSION["player"]["id"]) {
            $DB->Execute("DELETE FROM system_tb_messages WHERE id='$id'");
        }
    }

    $msgs = array();
    $rs = $DB->Execute("SELECT * FROM system_tb_messages WHERE player_id='".addslashes($_SESSION["player"]["id"])."'");
    while(!$rs->EOF) {
        $msgs[] = $rs->fields;
        $rs->MoveNext();
    }

    $TPL->assign("msgs",$msgs);



} else {
    $TPL->assign("user_is_connected", 0);
    $TPL->assign("score",0);
    $TPL->assign("nickname","");
    $TPL->assign("rank",0);
    $TPL->assign("msgs",array());
    $TPL->assign("online_chatters",0);

    unset($_SESSION["player"]);
}

// this is a custom date formatter

function formatTime($date)
{
    $days = floor($date / (60*60*24));
    $date -= ($days * 60*60*24);
    $hours = str_pad(floor($date / (60*60)),2,"0",STR_PAD_LEFT);
    $date -= ($hours * 60*60);
    $minutes = str_pad(floor($date / (60)),2,"0",STR_PAD_LEFT);
    return $days."d ".$hours.":".$minutes;
}	


if (isset($_SESSION["player"])) {
    // verify kick/ban warrants
    $rs = $DB->Execute("SELECT * FROM system_tb_warrant WHERE player='".addslashes($_SESSION["player"]["nickname"])."'");
    while(!$rs->EOF) {

        // you have been naughty :)
        switch($rs->fields["kind"]) {
            case "kick":
                $DB->Execute("DELETE FROM system_tb_chat_sessions WHERE nickname='".addslashes($_SESSION["player"]["nickname"])."'");
                $DB->Execute("DELETE FROM system_tb_sessions WHERE player=".$_SESSION["player"]["id"]);
                session_destroy();
                $DB->Execute("DELETE FROM system_tb_warrant WHERE id=".$rs->fields["id"]);
                $DB->CompleteTrans();
                die("<b>".T_("You have been kicked out of the game!")." (".stripslashes($rs->fields["description"]).")</b>");
                break;
                case "ban":
                    $DB->Execute("DELETE FROM system_tb_chat_sessions WHERE nickname='".addslashes($_SESSION["player"]["nickname"])."'");
                    $DB->Execute("DELETE FROM system_tb_sessions WHERE player=".$_SESSION["player"]["id"]);
                    $DB->Execute("UPDATE system_tb_players SET active=0 WHERE id=".$_SESSION["player"]["id"]);
                    session_destroy();
                    $DB->Execute("DELETE FROM system_tb_warrant WHERE id=".$rs->fields["id"]);
                    $DB->CompleteTrans();
                    die("<b>".T_("You have been banned from this game (forever)")." (".stripslashes($rs->fields["description"]).")</b>");
                    break;
                }

                $rs->MoveNext();

            }
        }


        ?>
