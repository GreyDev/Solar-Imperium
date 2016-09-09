<?php
// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //

define("LANGUAGE_DOMAIN","system");

require_once("include/init.php");


if (!isset($_SESSION["player"])) die(header("Location: welcome.php"));


// ************************************************************************
// Show Avatar Callback
// ************************************************************************

if (isset($_GET["SHOW_AVATAR"])) {
	$rs = $DB->Execute("SELECT avatar_img FROM system_tb_players WHERE id=".intval($_GET["SHOW_AVATAR"]));
	$DB->CompleteTrans();
	header("Content-type: image/jpeg");
	die(base64_decode($rs->fields["avatar_img"]));
}

// ************************************************************************
// Update preferences Callback
// ************************************************************************
if (isset($_GET["UPDATE"])) {
	
	if ($_POST["password1"] != "") {
		
		if ($_POST["password1"] != $_POST["password2"]) die(T_("Passwords does not matches!"));
		$DB->Execute("UPDATE	system_tb_players SET password='".md5($_POST["password1"])."' WHERE id=".$_SESSION["player"]["id"]);
	}

	if ($_POST["email"] == "") { $DB->CompleteTrans(); die (T_("Empty email field!")); }
	if ($_POST["real_name"] == "") { $DB->CompleteTrans(); die (T_("Empty real_name field!")); }
	if ($_POST["country"] == "") { $DB->CompleteTrans(); die (T_("Empty country field!")); }
	
	$DB->Execute("UPDATE system_tb_players SET ".
			"email='".addslashes($_POST["email"])."'," .
			"real_name='".(addslashes($_POST["real_name"]))."'," .
			"country='".(addslashes($_POST["country"]))."'" .
			" WHERE id=".$_SESSION["player"]["id"]);

	if (isset($_FILES["avatar_img"])) {
		
		if (($_FILES["avatar_img"]["type"] != "image/jpeg") && ($_FILES["avatar_img"]["type"] != "image/pjpeg") && ($_FILES["avatar_img"]["type"] != "")) {
			$DB->CompleteTrans();
			die(T_("Sorry, only jpeg files are supported! Current type:")." ".$_FILES["avatar_img"]["type"]);
		}

				
		if ($_FILES["avatar_img"]["size"] != 0) {
			$filename = $_FILES["avatar_img"]["tmp_name"];
			$img1 = imagecreatefromjpeg($filename);
			$img2 = imagecreatetruecolor(100,120);
			imagecopyresampled($img2,$img1,0,0,0,0,100,120,imagesx($img1),imagesy($img1));
			imagejpeg($img2,$filename,90);
			imagedestroy($img1);
			imagedestroy($img2);
			
			$fd = fopen($filename,"rb");
			$data = base64_encode(fread($fd,filesize($filename)));
			fclose($fd);			
						
			$DB->Execute("UPDATE system_tb_players SET avatar_img='$data' WHERE id=".$_SESSION["player"]["id"]);
		}
	}

	$rs = $DB->Execute("SELECT * FROM system_tb_players WHERE id=".$_SESSION["player"]["id"]);
	$_SESSION["player"] = $rs->fields;	
}


// ************************************************************************
// Display page
// ************************************************************************


$TPL->assign("email",stripslashes($_SESSION["player"]["email"]));
$TPL->assign("real_name",stripslashes($_SESSION["player"]["real_name"]));
$TPL->assign("country",stripslashes($_SESSION["player"]["country"]));


$TPL->assign("stats_last_login",$_SESSION["player"]["last_login_date"]);
$TPL->assign("stats_games_won",$_SESSION["player"]["games_won"]);
$TPL->assign("stats_games_lost",$_SESSION["player"]["games_lost"]);
$TPL->assign("stats_score",$_SESSION["player"]["score"]);
$TPL->assign("stats_created_on",$_SESSION["player"]["creation_date"]);

$games = array();

$rs = $DB->Execute("SELECT * FROM system_tb_games");
while(!$rs->EOF) {

	$game = $rs->fields;

	$rs2 = $DB->Execute("SELECT COUNT(*) FROM game".$game["id"]."_tb_empire WHERE player_id=".$_SESSION["player"]["id"]);	
	if ($rs2->fields[0] != 0) {
	
		$rs3 = $DB->Execute("SELECT player_id FROM game".$game["id"]."_tb_empire ORDER BY networth DESC");
		$rank = 1;
		while(!$rs3->EOF) {

			if ($rs3->fields["player_id"] == $_SESSION["player"]["id"]) break;
			$rank++;
			$rs3->MoveNext();
		}


		$games[] = array("name"=>$rs->fields["name"],"link"=>"continuegame.php?GAME=".$rs->fields["id"],"rank"=>$rank);
	}
	$rs->MoveNext();
}


if ($_SESSION["player"]["admin"])
    $TPL->assign("is_admin",true);
$TPL->assign("stats_games",$games);
$TPL->assign("premium_offer",($_SESSION["player"]["premium"]==1?0:1));
$TPL->assign("welcomeback",(isset($_GET["WELCOMEBACK"])?1:0));

if ($_SESSION["player"]["avatar_img"] == "") {
	$TPL->assign("avatar_img","images/common/anonymous.png");	
} else {

	$TPL->assign("avatar_img","preferences.php?SHOW_AVATAR=".$_SESSION["player"]["id"]);	

}

$last_logins = array();

$rs = $DB->Execute("SELECT nickname,last_login_date,last_login_hostname FROM system_tb_players ORDER BY last_login_date DESC LIMIT 0,10");
while(!$rs->EOF) {

	$item = array("");
	$item["name"] = $rs->fields["nickname"];
	$hostname = explode(".",$rs->fields["last_login_hostname"]);
	if (count($hostname) != 4) $hostname = "---"; else $hostname = $hostname[0].".".$hostname[1].".".$hostname[2].".*";
	$item["hostname"] = $hostname;
	$item["date"] = formatTime(time(NULL) - $rs->fields["last_login_date"]);
	$last_logins[] = $item;
	$rs->MoveNext();
}

$TPL->assign("last_logins",$last_logins);



$DB->CompleteTrans();
$TPL->display("page_preferences.html");
?>
