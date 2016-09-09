<?php



function CheckVictoryCondition($game_id,$victory_condition,$game_name,$lifetime)
{
//	print "Check for victory condition: ".$victory_condition."\r\n";

	global $DB,$TPL,$path_prefix;

	if (!isset($_SESSION)) $_SESSION = array();
	$_SESSION["game"] = $game_id;

	
	$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_coordinator");
	$coord = $rs->fields;

	
	if ($coord["game_status"] == 1) {
		//print "Game already ended.\r\n";

		if (time(NULL) >= $coord["restart_date"]) {
			//print "Resetting the game.\r\n";
			require_once($path_prefix."include/game/classes/system.php");
			$system = new System($DB);
  		       $system->Reset();
		}




		return false;
	}


		// check for research race first
		if ($victory_condition == "research") {
		

			$winners = array();
		
			$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_empire WHERE research_level>=9 AND active=1 ORDER BY networth DESC");
			$winners[] = $rs->fields["id"];

			if (!$rs->EOF) {
//				print "*** RESEARCH RACE GAME VICTORY!\r\n";
	
				// we have a winner

				$bc =  $DB->Execute("SELECT * FROM game".$game_id."_tb_coalition ORDER BY networth DESC LIMIT 0,1");
				$best_coalition_name = "---";

				if (!$bc->EOF) {
					$best_coalition_name = $bc->fields["name"];
					$rs_members = $DB->Execute("SELECT * FROM game".$game_id."_tb_member WHERE coalition=".$bc->fields["id"]);
					while(!$rs_members->EOF) {
						if (!in_array($rs_members->fields["empire"],$winners)) $winners[] = $rs_members->fields["empire"]; 
						$rs_members->MoveNext();
					}
				}

				
				$winner_empire = $rs->fields["emperor"] . "@" . $rs->fields["name"] . " (".("Turns").":" . number_format($rs->fields["turns_played"]) . ")";
				$gold_empire = "";
				$gold_networth = 0;
				$silver_empire = "";
				$silver_networth = 0;
				$bronze_empire = "";
				$bronze_networth = 0;

				$rs2 = $DB->Execute("SELECT * FROM game".$game_id."_tb_empire WHERE active=1 ORDER BY networth DESC LIMIT 0,3");
				if ($rs2->EOF) {
					print "DB ERROR: ".$DB->ErrorMsg()."\r\n";
					return false;
				}


				$gold_empire = $rs2->fields["emperor"] . "@" . $rs2->fields["name"] . " (".("Turns").":" . number_format($rs2->fields["turns_played"]) . ")";
				$gold_networth = $rs2->fields["networth"];

				$rs3 = $DB->Execute("SELECT * FROM system_tb_players WHERE id=".$rs2->fields["player_id"]);
				if (!$rs3) trigger_error($DB->ErrorMsg());
				if (!$rs3->EOF) {
					$rs3->fields["score"] += 60;
					$DB->Execute("UPDATE system_tb_players SET score=" . addslashes($rs3->fields["score"]) . " WHERE id=" . addslashes($rs2->fields["player_id"]));
				}
				

				$rs2->MoveNext();
				if ($rs2->EOF) {
					$silver_empire = $gold_empire;
					$silver_networth = $gold_networth;

				} else {

					$silver_empire = $rs2->fields["emperor"] . "@" . $rs2->fields["name"] . " (".T_("Turns").":" . $rs2->fields["turns_played"] . ")";
					$silver_networth = $rs2->fields["networth"];
					$rs3 = $DB->Execute("SELECT * FROM system_tb_players WHERE id=".$rs2->fields["player_id"]);
					$rs3->fields["score"] += 30;
					$DB->Execute("UPDATE system_tb_players SET score=" . addslashes($rs3->fields["score"]) . " WHERE id=" . addslashes($rs2->fields["player_id"]));

				}
				$rs2->MoveNext();
				if ($rs2->EOF) {
					$bronze_empire = $gold_empire;
					$bronze_networth = $gold_networth;

				} else {

					$bronze_empire = $rs2->fields["emperor"] . "@" . $rs2->fields["name"] . " (".T_("Turns").":" . $rs2->fields["turns_played"] . ")";
					$bronze_networth = $rs2->fields["networth"];
					$rs3 = $DB->Execute("SELECT * FROM system_tb_players WHERE id=".$rs2->fields["player_id"]);
					$rs3->fields["score"] += 15;
					$DB->Execute("UPDATE system_tb_players SET score=" . addslashes($rs3->fields["score"]) . " WHERE id=" . addslashes($rs2->fields["player_id"]));


				}

				// Update winners count
				$rsw = $DB->Execute("SELECT * FROM game".$game_id."_tb_empire WHERE active=1");
				while(!$rsw->EOF) {
					$rsp = $DB->Execute("SELECT * FROM system_tb_players WHERE id=".$rsw->fields["player_id"]);
					$new_score = $rsp->fields["score"];
					$new_games_won = $rsp->fields["games_won"];
					$new_games_lost = $rsp->fields["games_lost"];

					if (in_array($rsw->fields["id"],$winners)) {
						$new_score += 50;
						$new_games_won++;
					} else {
						$new_games_lost++;
					}

					$DB->Execute("UPDATE system_tb_players SET score=$new_score,games_won=$new_games_won,games_lost=$new_games_lost WHERE id=".$rsw->fields["player_id"]);						
					$rsw->MoveNext();
				}


				$query = "INSERT INTO game".$game_id."_tb_hall_of_fame (game_name,date,elapsed,victory_condition,winner_coalition,gold_empire,gold_networth,silver_empire,silver_networth,bronze_empire,bronze_networth,winner_empire) " .
				"VALUES(" .
				"'" . $game_name . "'," .
				time(NULL) . "," .
				 (time(NULL) - $coord["date"]) . "," .
				"'" . T_("research race") . "'," .
				"'" . addslashes($best_coalition_name) . "'," .
				"'" . addslashes($gold_empire) . "'," .
				addslashes(number_format($gold_networth)) . "," .
				"'" . addslashes($silver_empire) . "'," .
				addslashes(number_format($silver_networth)) . "," .
				"'" . addslashes($bronze_empire) . "'," .
				addslashes(number_format($bronze_networth)) . "," .
				"'" . addslashes($winner_empire) . "'" .
				")";

				$DB->Execute($query);

				$DB->Execute("UPDATE game".$game_id."_tb_coordinator SET game_status=1,restart_date=" . (time(NULL) + CONF_GAME_RESTART_DELAY));

				//1) Insert into global hall of fame
				
				$rs2 = $DB->Execute("SELECT nickname FROM system_tb_players WHERE id=".$rs->fields["player_id"]);
				$player_name = $rs2->fields["nickname"];

				$query = "INSERT INTO system_tb_hall_of_fame (player_name,game_name,date) VALUES('".addslashes($player_name)."','".addslashes($game_name)."',".time(NULL).")";
				$DB->Execute($query);
				
				// increment games count
				$query1 = "SELECT * FROM system_tb_games WHERE id=".addslashes($game_id);
				$rs = $DB->Execute($query1);
				$rs->fields["count"]++;
				$query2 = "UPDATE system_tb_games SET count=".$rs->fields["count"]." WHERE id=".addslashes($game_id);
				$DB->Execute($query2);
				
				// notice players of the game ending
				$query1 = "SELECT * FROM game".$game_id."_tb_empire WHERE active=1";
				$rs = $DB->Execute($query1);
				$elapsed = round((time(NULL) - $coord["date"])/(60*60*24));
				$message = T_("Game")." <b>".$game_name."</b> ".T_("has ended, the game lasted")." <b>$elapsed</b> day(s), the winners are: <br/><br/>";
				$message .= "#1(".T_("Gold").") : ".$gold_empire." (Nwt:".number_format($gold_networth).")<br/>";
				$message .= "#1(".T_("Silver").") : ".$silver_empire." (Nwt:".number_format($silver_networth).")<br/>";
				$message .= "#1(".T_("Bronze").") : ".$bronze_empire." (Nwt:".number_format($bronze_networth).")<br/>";
				$message .= "<br/><b><i>".T_("Victory Condition:")." ".T_("Research Race")."</i></br></b><br/>";

				$rank = 0;
				while(!$rs->EOF) {
	
					$rank++;
					$planets = $DB->Execute("SELECT * FROM game".$game_id."_tb_planets WHERE empire=".$rs->fields["id"]);
					$planets = $planets->fields;

					$DB->Execute("INSERT INTO system_tb_messages (player_id,date,message) VALUES(".$rs->fields["player_id"].",".time(NULL).",'".addslashes($message)."')");

					// insert data and ranking
					$planets_count = $planets["food_planets"]+$planets["ore_planets"]+$planets["tourism_planets"]+$planets["supply_planets"]+$planets["gov_planets"]+$planets["edu_planets"]+$planets["research_planets"]+$planets["urban_planets"]+$planets["petro_planets"]+$planets["antipollu_planets"];
					$military_might = $rs->fields["networth"]-($rs->fields["population"] * CONF_NETWORTH_POPULATION) - ($planets_count * CONF_NETWORTH_PLANETS);

					$DB->Execute(
						"INSERT INTO system_tb_history (game_id,player_id,date,rank,empire_name,networth,military_might,planets,
						population,turns_played) 
						VALUES(".$game_id.",".$rs->fields["player_id"].",".time(NULL).",".$rank.",'".$rs->fields["name"]."',
						".$rs->fields["networth"].",
						".$military_might.",
						".$planets_count.",
						".$rs->fields["population"].",
						".$rs->fields["turns_played"]."
					)");



					$rs->MoveNext();
				}
				
				
				

				return false;
				
			}
		}

		// Classic 1 month game
		
		if ($victory_condition == "classic") {

		
			if ((time(NULL) - $coord["date"]) >= ($lifetime * 60 * 60 * 24)) {

//				print "*** CLASSIC GAME VICTORY!\r\n";
				// we have a winner
			
				$winners = array();
				$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_empire WHERE active=1 ORDER BY networth DESC");
				$winners[] = $rs->fields["id"];


				$bc =  $DB->Execute("SELECT * FROM game".$game_id."_tb_coalition ORDER BY networth DESC LIMIT 0,1");
				$best_coalition_name = "---";

				if (!$bc->EOF) {
					$best_coalition_name = $bc->fields["name"];
					$rs_members = $DB->Execute("SELECT * FROM game".$game_id."_tb_member WHERE coalition=".$bc->fields["id"]);
					while(!$rs_members->EOF) {
						if (!in_array($rs_members->fields["empire"],$winners)) $winners[] = $rs_members->fields["empire"]; 
						$rs_members->MoveNext();
					}
				}


				$gold_empire = "";
				$gold_networth = 0;
				$silver_empire = "";
				$silver_networth = 0;
				$bronze_empire = "";
				$bronze_networth = 0;

				$rs2 = $DB->Execute("SELECT * FROM game".$game_id."_tb_empire WHERE player_id > -1 AND active=1 ORDER BY networth DESC LIMIT 0,3");
				if ($rs2->EOF)
					return;

				$gold_empire = $rs2->fields["emperor"] . "@" . $rs2->fields["name"] . " (".T_("Turns").":" . $rs2->fields["turns_played"] . ")";
				$gold_networth = $rs2->fields["networth"];

				$rs3 = $DB->Execute("SELECT * FROM system_tb_players WHERE id=".$rs2->fields["player_id"]);
				$rs3->fields["score"] += 60;
				$DB->Execute("UPDATE system_tb_players SET score=" . addslashes($rs3->fields["score"]) . " WHERE id=" . addslashes($rs2->fields["player_id"]));

				$rs2->MoveNext();
				if ($rs2->EOF) {
					$silver_empire = $gold_empire;
					$silver_networth = $gold_networth;

				} else {

					$silver_empire = $rs2->fields["emperor"] . "@" . $rs2->fields["name"] . " (".T_("Turns").":" . $rs2->fields["turns_played"] . ")";
					$silver_networth = $rs2->fields["networth"];

					$rs3 = $DB->Execute("SELECT * FROM system_tb_players WHERE id=".$rs2->fields["player_id"]);
					$rs3->fields["score"] += 30;
					$DB->Execute("UPDATE system_tb_players SET score=" . addslashes($rs3->fields["score"]) . " WHERE id=" . addslashes($rs2->fields["player_id"]));

				}
				$rs2->MoveNext();
				if ($rs2->EOF) {
					$bronze_empire = $gold_empire;
					$bronze_networth = $gold_networth;

				} else {

					$bronze_empire = $rs2->fields["emperor"] . "@" . $rs2->fields["name"] . " (".T_("Turns").":" . $rs2->fields["turns_played"] . ")";
					$bronze_networth = $rs2->fields["networth"];

					$rs3 = $DB->Execute("SELECT * FROM system_tb_players WHERE id=".$rs2->fields["player_id"]);
					$rs3->fields["score"] += 15;
					$DB->Execute("UPDATE system_tb_players SET score=" . addslashes($rs3->fields["score"]) . " WHERE id=" . addslashes($rs2->fields["player_id"]));
				}

				// Update winners count
				$rsw = $DB->Execute("SELECT * FROM game".$game_id."_tb_empire WHERE active=1");
				while(!$rsw->EOF) {
					$rsp = $DB->Execute("SELECT * FROM system_tb_players WHERE id=".$rsw->fields["player_id"]);
					$new_score = $rsp->fields["score"];
					$new_games_won = $rsp->fields["games_won"];
					$new_games_lost = $rsp->fields["games_lost"];

					if (in_array($rsw->fields["id"],$winners)) {
						$new_score += 50;
						$new_games_won++;
					} else {
						$new_games_lost++;
					}

					$DB->Execute("UPDATE system_tb_players SET score=$new_score,games_won=$new_games_won,games_lost=$new_games_lost WHERE id=".$rsw->fields["player_id"]);						
					$rsw->MoveNext();
				}



				$winner_empire = $gold_empire;

				$query = "INSERT INTO game".$game_id."_tb_hall_of_fame (game_name,date,elapsed,victory_condition,winner_coalition,gold_empire,gold_networth,silver_empire,silver_networth,bronze_empire,bronze_networth,winner_empire) " .
				"VALUES(" .
				"'" . $game_name . "'," .
				time(NULL) . "," .
				 (time(NULL) - $coord["date"]) . "," .
				"'" . T_("classic game victory") . "'," .
				"'" . addslashes($best_coalition_name) . "'," .
				"'" . addslashes($gold_empire) . "'," .
				addslashes(number_format($gold_networth)) . "," .
				"'" . addslashes($silver_empire) . "'," .
				addslashes(number_format($silver_networth)) . "," .
				"'" . addslashes($bronze_empire) . "'," .
				addslashes(number_format($bronze_networth)) . "," .
				"'" . addslashes($winner_empire) . "'" .
				")";

				$DB->Execute($query);

				$DB->Execute("UPDATE game".$game_id."_tb_coordinator SET game_status=1,restart_date=" . (time(NULL) + CONF_GAME_RESTART_DELAY));

				//1) Insert into global hall of fame
				
				$rs2 = $DB->Execute("SELECT nickname FROM system_tb_players WHERE id=".$rs->fields["player_id"]);
				$player_name = $rs2->fields["nickname"];
				$game_name = $game_name;
				$query = "INSERT INTO system_tb_hall_of_fame (player_name,game_name,date) VALUES('".addslashes($player_name)."','".addslashes($game_name)."',".time(NULL).")";
				$DB->Execute($query);
				
				// increment games count
				$query1 = "SELECT * FROM system_tb_games WHERE id=".addslashes($game_id);
				$rs = $DB->Execute($query1);
				$rs->fields["count"]++;
				$query2 = "UPDATE system_tb_games SET count=".$rs->fields["count"]." WHERE id=".addslashes($game_id);
				$DB->Execute($query2);
				
				// notice players of the game ending
				$query1 = "SELECT * FROM game".$game_id."_tb_empire WHERE active=1 ORDER BY networth DESC";
				$rs = $DB->Execute($query1);
				$elapsed = round((time(NULL) - $coord["date"])/(60*60*24));
				$message = "Game <b>".$game_name."</b> ".T_("has ended, the game lasted")." <b>$elapsed</b> ".T_("day(s), the winners are:")." <br/><br/>";
				$message .= "#1(".T_("Gold").") : ".$gold_empire." (Nwt:".number_format($gold_networth).")<br/>";
				$message .= "#1(".T_("Silver").") : ".$silver_empire." (Nwt:".number_format($silver_networth).")<br/>";
				$message .= "#1(".T_("Bronze").") : ".$bronze_empire." (Nwt:".number_format($bronze_networth).")<br/>";
				$message .= "<br/><b><i>".T_("Victory Condition:")." ".T_("Classic Game")."</i></br></b><br/>";

				$rank = 0;
				while(!$rs->EOF) {
	
					$rank++;
					$planets = $DB->Execute("SELECT * FROM game".$game_id."_tb_planets WHERE empire=".$rs->fields["id"]);
					$planets = $planets->fields;

					$DB->Execute("INSERT INTO system_tb_messages (player_id,date,message) VALUES(".$rs->fields["player_id"].",".time(NULL).",'".addslashes($message)."')");

					// insert data and ranking
					$planets_count = $planets["food_planets"]+$planets["ore_planets"]+$planets["tourism_planets"]+$planets["supply_planets"]+$planets["gov_planets"]+$planets["edu_planets"]+$planets["research_planets"]+$planets["urban_planets"]+$planets["petro_planets"]+$planets["antipollu_planets"];
					$military_might = $rs->fields["networth"]-($rs->fields["population"] * CONF_NETWORTH_POPULATION) - ($planets_count * CONF_NETWORTH_PLANETS);

					$DB->Execute(
						"INSERT INTO system_tb_history (game_id,player_id,date,rank,empire_name,networth,military_might,planets,
						population,turns_played) 
						VALUES(".$game_id.",".$rs->fields["player_id"].",".time(NULL).",".$rank.",'".$rs->fields["name"]."',
						".$rs->fields["networth"].",
						".$military_might.",
						".$planets_count.",
						".$rs->fields["population"].",
						".$rs->fields["turns_played"]."
					)");



					$rs->MoveNext();
				}
				
				
				
				return false;
			}

		}


	
	return true;
}
?>
