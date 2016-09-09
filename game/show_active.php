<?php

// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //

define("LANGUAGE_DOMAIN","game");

require_once("../include/game/init.php");
require_once("../include/game/init_ingame.php");

$GAME["template"]->setPage("show_active.html");

$current_players = "";

$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_session");
while(!$rs->EOF)
{
	
	$rs2 = $DB->Execute("SELECT id,emperor,name,gender FROM game".$game_id."_tb_empire WHERE id='".$rs->fields["empire"]."'");
	if ($rs2->EOF) {
		$rs->MoveNext();
		continue;
	}
	

			$current_players .= "<table><tr><td>".$GAME["template"]->displayEmpireHTML($rs2->fields["id"],$rs2->fields["emperor"],$rs2->fields["name"],$GAME["empire"]->data["networth"])."</td></tr></table><br/>\r\n";
		
	
	
	$rs->MoveNext();
}

if ($current_players == "") $current_players = T_("Nobody");
$GAME["template"]->setVar("current_players",$current_players);

print $GAME["template"]->render();

?>
