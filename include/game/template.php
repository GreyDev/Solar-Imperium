<?php
// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //



define("TPL_BANNER_TOP_CODE"		,	"
");

define("TPL_BANNER_BOTTOM_CODE","
<br/>

");

// COLOR THEME
define("TPL_COLOR_NORMAL"	,	"#ffdddd"						);
define("TPL_COLOR_HIGHLIGHT"	,	"white"					);

$TPL_LOGO_COLORS = array();
$TPL_LOGO_COLORS[] = array("#000000",0,0,0); // black
$TPL_LOGO_COLORS[] = array("#444444",64,64,64); // dark grey
$TPL_LOGO_COLORS[] = array("#888888",128,128,128); // grey
$TPL_LOGO_COLORS[] = array("#CCCCCC",204,204,204); // light grey
$TPL_LOGO_COLORS[] = array("#FFFFFF",255,255,255); // white
$TPL_LOGO_COLORS[] = array("#CC3333",204,51,51); // dark red
$TPL_LOGO_COLORS[] = array("#FF0000",255,0,0); // red
$TPL_LOGO_COLORS[] = array("#996633",153,102,51); // brown
$TPL_LOGO_COLORS[] = array("orange",255,128,0); // orange
$TPL_LOGO_COLORS[] = array("yellow",255,255,0); // yellow
$TPL_LOGO_COLORS[] = array("lightgreen",0,255,0); // light green
$TPL_LOGO_COLORS[] = array("#33FF33",51,255,51); // green
$TPL_LOGO_COLORS[] = array("green",0,128,0); // darkgreen
$TPL_LOGO_COLORS[] = array("lightblue",180,180,255); // light blue
$TPL_LOGO_COLORS[] = array("#0066CC",0,102,204); // blue
$TPL_LOGO_COLORS[] = array("blue",0,0,255); // dark blue
$TPL_LOGO_COLORS[] = array("#339999",51,153,153); // cyan
$TPL_LOGO_COLORS[] = array("#993399",153,51,153); // violet
$TPL_LOGO_COLORS[] = array("#FF33CC",255,51,204); // pink
$TPL_LOGO_COLORS[] = array("#666699",102,102,153); // dark violet


function ifen($var) {
	if (isset($var)) return $var; else return 0;
}

function ifes($var) {
	if (isset($var)) return $var; else return "";
}

?>
