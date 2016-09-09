<?php

// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //

define("LANGUAGE_DOMAIN","game");

require_once("../include/game/init.php");
require_once("../include/game/init_ingame.php");

ob_clean();

$img = imagecreatetruecolor(712,32);

$color_fontcolor = imagecolorallocate($img,255,255,255);
$color_background = imagecolorallocate($img,120,30,30);
$color_foreground = imagecolorallocate($img,220,50,50);
$color_lines = imagecolorallocate($img,199,199,199);


$current = $GAME["empire"]->data["research_level"];
$max = 9;

imagefilledrectangle($img,0,0,712,32,$color_background);
imagefilledrectangle($img,1,1,(80*$current),30,$color_foreground);
for ($i=0;$i<10;$i++) imageline($img,$i*80,0,$i*80,32,$color_lines);
imagestring($img,3,280,9,T_("Fundamental research"),$color_fontcolor);

header("Content-type: image/jpeg");
imagejpeg($img,"",90);

$DB->CompleteTrans();

?>