<?php
// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //

define("LANGUAGE_DOMAIN","system");

require_once("include/init.php");


// populate games
$games = array();

$rs = $DB->Execute("SELECT * FROM system_tb_games");
while(!$rs->EOF) {

	$game = $rs->fields;

	$rs2 = $DB->Execute("SELECT COUNT(*) FROM game".$game["id"]."_tb_empire WHERE active=1");	
	$game["empires_count"] = $rs2->fields[0];
	$rs3 = $DB->Execute("SELECT date,game_status,restart_date FROM game".$game["id"]."_tb_coordinator");	

	$game["need_restart"] = 0;
	$game["restart_date"] = 0;
	$game["winner"] = T_("Unknown");
	if ($rs3->EOF) 
		$game["time_elapsed"] = T_("Need a reset!");
	else {		
		
		$elapsed = (time(NULL) - $rs3->fields["date"]);
		$game["time_elapsed"] = (floor($elapsed/(60*60*24))+1)." ".T_("days");
		$game["lifetime"] .= " ".T_("days");
		if ($rs3->fields["game_status"] == 1) {
			$game["need_restart"] = 1;
			$rs4 = $DB->Execute("SELECT * FROM system_tb_hall_of_fame WHERE game_name='".addslashes($rs->fields["name"])."' ORDER BY id DESC");
			if (!$rs4) trigger_error($DB->ErrorMsg());
			$game["winner"] = $rs4->fields["player_name"];
		}

		$game["restart_date"] = $rs3->fields["restart_date"] - time(NULL);
		
	}
	
	if ($game["victory_condition"] == "classic")
		$game["logo_img"] = "logo";
	else
		$game["logo_img"] = "logo_researchrace";
	
	$rs2 = $DB->Execute("SELECT COUNT(*) FROM game".$game["id"]."_tb_session");	
	$game["connected_players"] = $rs2->fields[0];
		
	if ($game["premium_only"] == 1) $game["logo_img"] = "logo_premium";
	
	$game["premium_only"] = ($game["premium_only"]==0?T_("No"):T_("Yes"));
	
	if (!isset($_SESSION["player"])) {
		$game["history_game"] = 0;
		$game["continue_game"] = 0;
		$game["join_game"] = 0;
		$game["need_login"] = 1;
	} else {
		// verify if actually connected	
		$game["need_login"] = 0;
		
		

		$query = "SELECT * FROM game".$game["id"]."_tb_empire WHERE active < 3 AND player_id=".$_SESSION["player"]["id"];
		$rs2 = $DB->Execute($query);

		if ($rs2->EOF) {
			$game["join_game"] = 1;

			$history = array();
			$query = "SELECT * FROM system_tb_history WHERE game_id=".$rs->fields["id"]." AND player_id=".$_SESSION["player"]["id"]." ORDER BY id DESC LIMIT 0,10";
			$rs4 = $DB->Execute($query);
			while(!$rs4->EOF) {
				$h = $rs4->fields;
				if ($h["rank"] == 0) $h["rank"] = T_("Collapsed");
				$history[] = $h;
				$rs4->MoveNext();
			}
			$game["history"] = $history;
			$game["history_game"] = 1;
			$game["continue_game"] = 0;

		} else {
			
			$query = "SELECT id FROM game".$game["id"]."_tb_empire WHERE active=1 ORDER BY networth DESC";
			$rs3 = $DB->Execute($query);
			if (!$rs3) die($DB->ErrorMsg());

			$count = 0;
			while(!$rs3->EOF) {
				$count++;
				if ($rs3->fields["id"] == $rs->fields["id"]) break;
				$rs3->MoveNext();
			}
			
			$game["game_rank"] = $count;
			$game["empire"] = $rs2->fields["name"];		
			$game["emperor"] = $rs2->fields["emperor"];		
			$game["gender"] = ($rs2->fields["gender"]=="M"?T_("Emperor"):T_("Emperess"));		
			$game["networth"] = $rs2->fields["networth"];		
		
			$history = array();
			$query = "SELECT * FROM system_tb_history WHERE player_id=".$_SESSION["player"]["id"]." ORDER BY id DESC LIMIT 0,10";
			$rs4 = $DB->Execute($query);
			while(!$rs4->EOF) {
				$h = $rs4->fields;
				if ($h["rank"] == 0) $h["rank"] = T_("Collapsed");
				$history[] = $h;
				$rs4->MoveNext();
			}

			$game["history"] = $history;
			$game["history_game"] = 1;
			$game["continue_game"] = 1;
			$game["join_game"] = 0;
		}
	}
	
	$games[] = $game;	
	$rs->MoveNext();
}

$TPL->assign("games",$games);

$DB->CompleteTrans();
$TPL->display("page_gamesbrowser.html");

?>
