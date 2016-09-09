<?php

// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //

define("LANGUAGE_DOMAIN","game");

require_once("../include/game/init.php");
ob_clean();



if (!isset($_SESSION["game"])) die();
$game_id = round($_SESSION["game"]);


if (isset($_GET["empire"]))
{
	$id = addslashes($_GET["empire"]);
	$id = explode("?",$id);
	$id = intval($id[0]);

	$rs = $DB->Execute("SELECT logo FROM game".$game_id."_tb_empire WHERE id='$id'");
	if ($rs->EOF) {
		$gd = imagecreatetruecolor(32,32);
		imagejpeg($gd,"",100);
		imagedestroy($gd);
	}

	$_GET["data"] = $rs->fields[0];
		
}

if (!isset($_GET["data"])) die("Invalid data");

$data = $_GET["data"];

$gd = imagecreatetruecolor(32,32);
if (strlen($data) != 256) die("Invalid data");

$PALETTE = array();

for ($i=0;$i<count($TPL_LOGO_COLORS);$i++)
{
	$PALETTE[] = imagecolorallocate($gd,$TPL_LOGO_COLORS[$i][1],$TPL_LOGO_COLORS[$i][2],$TPL_LOGO_COLORS[$i][3]);
}


for ($y=0;$y<16;$y++)
for ($x=0;$x<16;$x++)
{
	$pos = $data[($y*16)+$x];
	if ($pos == "A") $pos = 10;
	if ($pos == "B") $pos = 11;
	if ($pos == "C") $pos = 12;
	if ($pos == "D") $pos = 13;
	if ($pos == "E") $pos = 14;
	if ($pos == "F") $pos = 15;
	if ($pos == "G") $pos = 16;
	if ($pos == "H") $pos = 17;
	if ($pos == "I") $pos = 18;
	if ($pos == "J") $pos = 19;

	imagesetpixel($gd,$x*2,$y*2,$PALETTE[$pos]);
	imagesetpixel($gd,($x*2)+1,$y*2,$PALETTE[$pos]);
	imagesetpixel($gd,$x*2,($y*2)+1,$PALETTE[$pos]);
	imagesetpixel($gd,($x*2)+1,($y*2)+1,$PALETTE[$pos]);
}


if (isset($_GET["empire"]))
{
		$id = addslashes($_GET["empire"]);
		$id = explode("?",$id);
		$id = $id[0];
		$id = str_replace(".","",stripslashes($id));
		
		if ((!file_exists("../images/game/empires/$game_id/$id.jpg")) || (isset($_GET["OVERWRITE"]))) {
			
			imagejpeg($gd,"../images/game/empires/$game_id/$id.jpg",90);
		}
	
}

header("Content-type: image/jpeg");
imagejpeg($gd,"",90);

imagedestroy($gd);

$DB->CompleteTrans();

?>
