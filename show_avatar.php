<?php
// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //
require_once("include/init.php");

if (isset($_GET["id"])) {


	$rs = $DB->Execute("SELECT avatar_img FROM system_tb_players WHERE id=".intval($_GET["id"]));
	if ($rs->EOF) {
		
		header("Location: images/common/anonymous.png");
		die();	
	}
	
	$output =  base64_decode($rs->fields["avatar_img"]);
	if ($output == "") {
		
		header("Location: images/common/anonymous.png");
		die();	
	}

	header("Content-type: image/jpeg");
	$DB->CompleteTrans(); 
	die($output);
}
$DB->CompleteTrans(); 

die();


?>
