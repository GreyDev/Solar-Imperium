<?php


function HandleArmyConvoys($game_id)
{
	global $DB,$TPL;
	$time_now = time(NULL);

	
	$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_armyconvoy");
	while (!$rs->EOF) {

		$rs2 = $DB->Execute("SELECT * FROM game".$game_id."_tb_empire WHERE id=" . $rs->fields["empire_to"]);
		$rs3 = $DB->Execute("SELECT * FROM game".$game_id."_tb_empire WHERE id=" . $rs->fields["empire_from"]);
		if (($rs2->EOF) || ($rs3->EOF)) {
			$DB->Execute("DELETE FROM game".$game_id."_tb_armyconvoy WHERE id=" . $rs->fields["id"]);
			$rs->MoveNext();
			continue;
		}


		if ($rs->fields["time_end"] <= $time_now) {

			if (($rs->fields["convoy_type"] == CONF_CONVOY_INVASION_RETREAT) || ($rs->fields["convoy_type"] == CONF_CONVOY_DEFENSE_RETREAT)) {
				// returning convoy!
				//print "*** Returning convoy ...\r\n";


				$target_empire = new Empire($DB, new Template($DB,$game_id), new GameplayCosts($DB));
				$result = $target_empire->Load($rs->fields["empire_from"]);
					
				if ($result["code"] == true) {
					$target_empire->army->data["soldiers"] += $rs->fields["convoy_soldiers"];
					$target_empire->army->data["fighters"] += $rs->fields["convoy_fighters"];
					$target_empire->army->data["lightcruisers"] += $rs->fields["convoy_lightcruisers"];
					$target_empire->army->data["heavycruisers"] += $rs->fields["convoy_heavycruisers"];
					$target_empire->army->data["carriers"] += $rs->fields["carriers"];
					$target_empire->Save();
				}
					
				if (!$DB->Execute("DELETE FROM game".$game_id."_tb_armyconvoy WHERE id=" . $rs->fields["id"])) trigger_error($DB->ErrorMsg());
	
			} else {


				if ($rs->fields["convoy_type"] == CONF_CONVOY_INVASION) {
					//print "*** Attacking convoy ...\r\n";
					$invasion = new Invasion($DB, $rs->fields);
					$invasion->Attack();
				} else {
	
					//print "*** Defense convoy ...\r\n";

					// make the defense convoy come back if the invasion is done.
					$rs2 = $DB->Execute("SELECT * FROM game".$game_id."_tb_armyconvoy WHERE id=" . $rs->fields["convoy_target"]);
					if (($rs2->EOF) || ($rs2->fields["convoy_type"] == CONF_CONVOY_INVASION_RETREAT)) {
						$time_start = $rs->fields["time_start"];
						$time_end = $rs->fields["time_end"];
						$time_elapsed = $time_now - $time_start;

						if (!$DB->Execute("UPDATE game".$game_id."_tb_armyconvoy SET convoy_type=" . CONF_CONVOY_DEFENSE_RETREAT . ",time_start=$time_now,time_end=".($time_now + $time_elapsed)." WHERE id=" . $rs->fields["id"])) {
							trigger_error($DB->ErrorMsg());
						}


						$evt = new EventCreator($DB);
						$evt->from = -1;
						$evt->to = $rs->fields["empire_to"];
						$evt->type = CONF_EVENT_CONVOY_RETREAT;
						$evt->params = $rs->fields["empire_from"];
						$evt->send();

					}
				}

			}

		}

		$rs->MoveNext();
	}


}

?>