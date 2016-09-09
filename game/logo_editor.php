<?php

// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //

define("LANGUAGE_DOMAIN","game");

require_once("../include/game/init.php");
require_once("../include/game/init_ingame.php");

if (isset($_POST["logo_data_update"])) {
	
	
	$logo_data = trim($_POST["logo_data_update"]);

	if (strlen($logo_data)==256) {

		$GAME["empire"]->data["logo"] = $logo_data;
		$GAME["empire"]->save();

	}
		
	$GAME["system"]->redirect("logo_editor.php");
}

if (isset($_POST["logodata_0_0"]))
{
	$GAME["empire"]->data["logo"] = "";
	

	for ($y=0;$y<16;$y++)
	for ($x=0;$x<16;$x++)
	{
		
		$color = $_POST["logodata_".$x."_".$y];
		$pos = 0;
		
		for ($i=0;$i<count($TPL_LOGO_COLORS);$i++)
		{
				if ($TPL_LOGO_COLORS[$i][0] == $color) {
						
							$pos = $i;
							break;
					}
		}
		
		if ($pos == 10) $pos = "A";
		if ($pos == 11) $pos = "B";
		if ($pos == 12) $pos = "C";
		if ($pos == 13) $pos = "D";
		if ($pos == 14) $pos = "E";
		if ($pos == 15) $pos = "F";
		if ($pos == 16) $pos = "G";
		if ($pos == 17) $pos = "H";
		if ($pos == 18) $pos = "I";
		if ($pos == 19) $pos = "J";
		if ($pos == 20) $pos = "K";
		
		$GAME["empire"]->data["logo"] .= $pos;

	}
	

	$GAME["empire"]->save();	
	$GAME["system"]->redirect("logo_editor.php",array("NOTICE"=>T_("New logo saved")));
}

		
$GAME["template"]->setPage("logo_editor.html");

$logo_data = $GAME["empire"]->data["logo"];

if (strlen($logo_data) != 256) $logo_data = str_repeat("0",256);

if (isset($_GET["fill"]))
{

	$base_color = 0;
	$fill = $_GET["fill"];

	for ($i=0;$i<count($TPL_LOGO_COLORS);$i++)
	{
		if ($fill == $TPL_LOGO_COLORS[$i][0])
		{
			$base_color = $i;
			break;
		}
	}
	
	if ($base_color == 10) $base_color = "A";
	if ($base_color == 11) $base_color = "B";
	if ($base_color == 12) $base_color = "C";
	if ($base_color == 13) $base_color = "D";
	if ($base_color == 14) $base_color = "E";
	if ($base_color == 15) $base_color = "F";
	if ($base_color == 16) $base_color = "G";
	if ($base_color == 17) $base_color = "H";
	if ($base_color == 18) $base_color = "I";
	if ($base_color == 19) $base_color = "J";

	for ($i=0;$i<256;$i++) $logo_data[$i] = $base_color;
	$GAME["empire"]->data["logo"] = $logo_data;
	$GAME["empire"]->save();
	$GAME["system"]->redirect("logo_editor.php");
}


$logo_data_html = "<table bgcolor=\"#9a9a9a\" cellspacing=\"0\" cellpadding=\"1\" border=\"0\"><tr><td>";
$logo_data_html .= "<table bgcolor=\"#3a3a3a\" cellspacing=\"1\" cellpadding=\"0\" border=\"0\">";

for ($y=0;$y<16;$y++)
{
	$logo_data_html .= "<tr>";
	for ($x=0;$x<16;$x++)
	{
		
		$offset = $logo_data[($y * 16 )+ $x];
		if ($offset == "A") $offset = 10;
		if ($offset == "B") $offset = 11;
		if ($offset == "C") $offset = 12;
		if ($offset == "D") $offset = 13;
		if ($offset == "E") $offset = 14;
		if ($offset == "F") $offset = 15;
		if ($offset == "G") $offset = 16;
		if ($offset == "H") $offset = 17;
		if ($offset == "I") $offset = 18;
		if ($offset == "J") $offset = 19;

		if ((intval($offset) < 0) || (intval($offset) > 19)) $value = 0; else
			$value = $TPL_LOGO_COLORS[$offset][0];
		
		$logo_data_html .= "<td style=\"cursor: crosshair\" id=\"cell_".$x."_".$y."\" 
		onclick=\"UpdateCellColor('cell_".$x."_".$y."',document.logo_form.logodata_".$x."_".$y.");\"
		width=32 height=32 bgcolor=\"".$value."\"><input type=\"hidden\" name=\"logodata_".$x."_".$y."\" value=\"".$value."\"></td>";
	}
	$logo_data_html .= "<tr>\r\n";
}

$logo_data_html .= "</table>";
$logo_data_html .= "</td></tr></table>";


$color_palette_html = "<table>";
for ($i=0;$i<count($TPL_LOGO_COLORS);$i++)
{
	if ($i % 2 == 0) $color_palette_html .= "<tr>";
	$color_palette_html .= "<td bgcolor=\"white\">
<table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" onclick=\"ChangeCurrentcolor('".$TPL_LOGO_COLORS[$i][0]."');\"
width=32 height=32 bgcolor=\"".$TPL_LOGO_COLORS[$i][0]."\">
<tr><td><img src=\"../images/game/placeholder.gif\" width=32 height=32 style=\"cursor: crosshair\"></td></tr>
</table>
</td>\r\n";
	if ($i % 2 == 1) $color_palette_html .= "</tr>";

}

$color_palette_html .= "</table>";
$GAME["template"]->setVar("current_color","white");
$GAME["template"]->setVar("color_palette_html",$color_palette_html);



$GAME["template"]->setVar("logo_data_html",$logo_data_html);
$GAME["template"]->setVar("logo_data",$logo_data);
$GAME["template"]->setVar("logo_empire_id",$_SESSION["empire_id"]);

print $GAME["template"]->render();
$DB->CompleteTrans();

?>
