<?php
// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //



define("LANGUAGE_DOMAIN","system");
require_once("include/init.php");


if (isset($_GET["info"])) {
    $info = addslashes($_GET["info"]);

    $rs = $DB->Execute("SELECT * FROM system_tb_players WHERE id='$info'");
    if ($rs->EOF) die(T_("Invalid player ID!"));
    $rs2 = $DB->Execute("SELECT * FROM system_tb_games");

    $empires= array();

    while(!$rs2->EOF) {
        $rs3 = $DB->Execute("SELECT * FROM game".$rs2->fields["id"]."_tb_empire WHERE active=1 AND player_id=".$rs->fields["id"]);
        while(!$rs3->EOF) {


            $empire = array();
            $empire["name"] = $rs3->fields["name"];
            $empire["emperor"] = $rs3->fields["emperor"];
            $empire["game_name"] = $rs2->fields["name"];
            $empires[] = $empire;

            $rs3->MoveNext();
        }
        $rs2->MoveNext();
    }


    $rank = 1;
    $rs4 = $DB->Execute("SELECT * FROM system_tb_players ORDER BY score DESC");
    while(!$rs4->EOF) {

        if ($rs4->fields["id"] == $info) break;
        $rs4->MoveNext();
        $rank++;
    }


    $TPL->assign("rank",$rank);
    $TPL->assign("nickname",$rs->fields["nickname"]);
    $TPL->assign("real_name",$rs->fields["real_name"]);
    $TPL->assign("country",$rs->fields["country"]);
    $TPL->assign("last_login_date",$rs->fields["last_login_date"]);
    $TPL->assign("creation_date",$rs->fields["creation_date"]);
    $TPL->assign("games_won",$rs->fields["games_won"]);
    $TPL->assign("games_lost",$rs->fields["games_lost"]);
    $TPL->assign("score",$rs->fields["score"]);


    $TPL->assign("empires",$empires);

    $TPL->display("page_chat_info.html");
    die();
}


// *************************************
// Handle ajax queries 
// *************************************
if (isset($_GET["AJAX"])) {

    if (!isset($_SESSION["player"])) die("session_failed");

    // verify if its in the database.
    $rs = $DB->Execute("SELECT * FROM system_tb_chat_sessions WHERE nickname='".addslashes($_SESSION["player"]["nickname"])."'");
    if ($rs->EOF) {


        $hostname = $_SERVER["REMOTE_ADDR"];
        if (isset($_SERVER["X_FORWARDED_FOR"])) $hostname = $_SERVER["X_FORWARDED_FOR"];
        $hostname = str_replace("<","&lt;",$hostname);
        $hostname = str_replace(">","&gt;",$hostname);

        $DB->Execute("INSERT INTO system_tb_chat_sessions (timestamp,nickname,hostname) VALUES(".time(NULL).",'".addslashes($_SESSION["player"]["nickname"])."','$hostname')");
    //$DB->Execute("INSERT INTO system_tb_chat_log (timestamp,message) VALUES(".time(NULL).",'<b style=\"color:#FFFF99\">[".date("H:i:s")."] ".$_SESSION["player"]["nickname"]." ".T_("has joined the chatroom.")."</b>')");

    }

    $DB->Execute("UPDATE system_tb_chat_sessions SET timestamp=".time(NULL)." WHERE nickname='".addslashes($_SESSION["player"]["nickname"])."'");

    if (isset($_GET["action"]) && ($_GET["action"]=="list_messages")) {

        $count = $DB->Execute("SELECT COUNT(*) FROM system_tb_chat_log");
        $count = $count->fields[0];

        $offset_start = $count-100;

        if ($offset_start < 0) $offset_start = 0;
        $output = "";

        $rs = array();

        if (!isset($_GET["DELTA"])) {
            $_SESSION["last_id"] = 0;
            $rs = $DB->Execute("SELECT * FROM system_tb_chat_log LIMIT $offset_start,$count");
        } else {
            $rs = $DB->Execute("SELECT * FROM system_tb_chat_log WHERE id > ".$_SESSION["last_id"]);
        }

        while(!$rs->EOF) {

            $message = "";
            $chunk_size = 0;
            for ($i=0;$i<strlen($rs->fields["message"]);$i++) {
                if ($rs->fields["message"][$i] == " ") $chunk_size = 0; else $chunk_size++;
                $msg = $rs->fields["message"][$i];
                $message .= $msg;
                if ($chunk_size > 80) { $message .= " "; $chunk_size = 0; }

            }

            $_SESSION["last_id"] = $rs->fields["id"];
            $output .= stripslashes($message)."<br/>";
            $rs->MoveNext();
        }


        $DB->CompleteTrans();

        die($output);
    }


    //////////////////////////////////////////////////////////////////////////////////////////

    if (isset($_GET["action"]) && ($_GET["action"]=="send_message")) {

        $msg = "";
        if (isset($_GET["msg"])) $msg = $_GET["msg"];
        if ($msg == "") die("empty_message");
        $msg = substr($msg,0,200);


        $msg = str_replace("&","&amp;",$msg);
        $msg = str_replace("<","&lt;",$msg);
        $msg = str_replace(">","&gt;",$msg);

        // smileys / emoticons convertion
        $msg = str_replace(":-)","<img src=\"images/system/chat/smiley1.png\">",$msg);
        $msg = str_replace(":)","<img src=\"images/system/chat/smiley1.png\">",$msg);
        $msg = str_replace("=-)","<img src=\"images/system/chat/smiley2.png\">",$msg);
        $msg = str_replace("=)","<img src=\"images/system/chat/smiley2.png\">",$msg);
        $msg = str_replace(";-)","<img src=\"images/system/chat/smiley3.png\">",$msg);
        $msg = str_replace(";)","<img src=\"images/system/chat/smiley3.png\">",$msg);
        $msg = str_replace(";]","<img src=\"images/system/chat/smiley3.png\">",$msg);
        $msg = str_replace(":-(","<img src=\"images/system/chat/smiley4.png\">",$msg);
        $msg = str_replace(":(","<img src=\"images/system/chat/smiley4.png\">",$msg);
        $msg = str_replace(":-O","<img src=\"images/system/chat/smiley5.png\">",$msg);
        $msg = str_replace(":O","<img src=\"images/system/chat/smiley5.png\">",$msg);
        $msg = str_replace(":-o","<img src=\"images/system/chat/smiley5.png\">",$msg);
        $msg = str_replace(":o","<img src=\"images/system/chat/smiley5.png\">",$msg);
        $msg = str_replace(":-D","<img src=\"images/system/chat/smiley6.png\">",$msg);
        $msg = str_replace(":D","<img src=\"images/system/chat/smiley6.png\">",$msg);
        $msg = str_replace(":-d","<img src=\"images/system/chat/smiley6.png\">",$msg);
        $msg = str_replace(":d","<img src=\"images/system/chat/smiley6.png\">",$msg);
        $msg = str_replace(":o)","<img src=\"images/system/chat/smiley7.png\">",$msg);
        $msg = str_replace(":O)","<img src=\"images/system/chat/smiley7.png\">",$msg);
        $msg = str_replace(":-|","<img src=\"images/system/chat/smiley8.png\">",$msg);
        $msg = str_replace(":|","<img src=\"images/system/chat/smiley8.png\">",$msg);
        $msg = str_replace(":-/","<img src=\"images/system/chat/smiley9.png\">",$msg);
        $msg = str_replace(":/","<img src=\"images/system/chat/smiley9.png\">",$msg);

        $color = "white";
        if ($_SESSION["player"]["premium"] == 1) $color = "lightcyan";
        if ($_SESSION["player"]["admin"] == 1) $color = "orange";
        $output = "<font style=\"color:yellow\">[".date("H:i:s")."]</font> <b style=\"color:$color\">&lt;".$_SESSION["player"]["nickname"]."&gt;</b> ".utf8_encode($msg);

        if ($_SESSION["player"]["admin"] == 1) {
            if (substr($msg,0,5) == "/kick") {
                $t = explode(" ",$msg,3);
                $target_player = $t[1];
                $description = T_("You have been naughty!");
                if (count($t) > 2) $description = $t[2];

                if ($target_player == $_SESSION["player"]["nickname"]) die(T_("You can't kick youself!"));
                // verify player existence
                $query = "SELECT COUNT(*) FROM system_tb_players WHERE nickname='".addslashes($target_player)."'";
                $rs = $DB->Execute($query);
                if ($rs->fields[0] == 0) die(T_("Invalid player name submitted!"));

                $output = "<b style=\"color:yellow\">*** ".T_("Administrator kicked player ")." '".$target_player."' ".T_("from the game")." ($description) ***</b>";

                $query = "INSERT INTO system_tb_warrant (kind,player,description) VALUES('kick','".addslashes($target_player)."','".addslashes($description)."')";
                $DB->Execute($query);

            }

            if (substr($msg,0,4) == "/ban") {
                $t = explode(" ",$msg,3);
                $target_player = $t[1];
                $description = T_("Come back later!");
                if (count($t) > 2) $description = $t[2];

                if ($target_player == $_SESSION["player"]["nickname"]) die(T_("You can't ban youself!"));
                // verify player existence
                $query = "SELECT COUNT(*) FROM system_tb_players WHERE nickname='".addslashes($target_player)."'";
                $rs = $DB->Execute($query);
                if ($rs->fields[0] == 0) die(T_("Invalid player name submitted!"));

                $output = "<b style=\"color:yellow\">*** ".T_("Administrator banned player ")." '".$target_player."' ".T_("from the game (forever)")." ($description) ***</b>";

                $query = "INSERT INTO system_tb_warrant (kind,player,description) VALUES('ban','".addslashes($target_player)."','".addslashes($description)."')";
                $DB->Execute($query);
            }

        }

        $query = "INSERT INTO system_tb_chat_log (timestamp,message) VALUES(".time(NULL).",'".(addslashes($output))."')";
        $DB->Execute($query);
        $DB->CompleteTrans();

        die("message_sent");
    }

    /////////////////////////////////////////////////////////////////////////////////

    if (isset($_GET["action"]) && ($_GET["action"]=="list_sessions")) {

        if (!isset($_GET["DELTA"])) $_SESSION["last_players_list"] = "";

        $output = "<table width=\"100%\">".T_("Online Players").":\r\n";

        $rs = $DB->Execute("SELECT * FROM system_tb_chat_sessions ORDER BY nickname ASC");
        while(!$rs->EOF) {

            $rs2 = $DB->Execute("SELECT admin,premium,id FROM system_tb_players WHERE nickname='".addslashes($rs->fields["nickname"])."'");
            if ($rs2->fields["premium"] == 1)
                $o = "<tr><td style=\"color:yellow\" align=\"right\"".$rs->fields["nickname"]." *P*</td></tr>\r\n";
            else
                $o = "<tr><td style=\"color:yellow\" align=\"right\">".$rs->fields["nickname"]."</td></tr>\r\n";

            if ($rs2->fields["admin"] == 1)
                $o = "
    <tr><td style=\"color:yellow\" align=\"right\"
    onmouseover=\"ajax_showTooltip('chat.php?info=".$rs2->fields["id"]."',this);
    ajax_tooltipObj.style.top = '20px';
    ajax_tooltipObj.style.left = '0px';
return false\"
    onmouseout=\"ajax_hideTooltip()\">".$rs->fields["nickname"]." *A*</td>
    </tr>\r\n";

            $output .= $o;
            $rs->MoveNext();
        }


        $output .="</table>\r\n";

        if ($_SESSION["last_players_list"] == $output) $output = ""; else
            $_SESSION["last_players_list"] = $output;

        $DB->CompleteTrans();
        die($output);
    }


    die("Error.");
}

// display html //
$DB->CompleteTrans();

if (isset($_GET["SMALL"])) 
    $TPL->display("page_chat_small.html");
else
    $TPL->display("page_chat.html");


?>
