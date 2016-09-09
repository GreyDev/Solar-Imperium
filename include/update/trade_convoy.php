<?php

function HandleTradeConvoys($game_id)
{

	global $DB,$TPL;

	$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_tradeconvoy");
	if (!$rs) {
		print $DB->ErrorMsg()."\r\n";
		die();
	}

	while (!$rs->EOF) {

		if ($rs->fields["time_end"] <= time(NULL)) {
//			print "Trade convoy reached destination ...\r\n";

			$source_empire = new Empire($DB, new Template($DB,$game_id), new GameplayCosts($DB));
			$retval1 = $source_empire->load($rs->fields["empire_from"]);
			$target_empire = new Empire($DB, new Template($DB,$game_id), new GameplayCosts($DB));
			$retval2 = $target_empire->load($rs->fields["empire_to"]);
			if (($retval1["code"] == true) && ($retval2["code"] == true)) {

				// time to unload stuff
				$target_empire->data["credits"] += $rs->fields["trade_money"];
				$target_empire->data["food"] += $rs->fields["trade_food"];
				$target_empire->army->data["covertagents"] += $rs->fields["trade_covertagents"];
				$target_empire->army->data["soldiers"] += $rs->fields["trade_soldiers"];
				$target_empire->army->data["fighters"] += $rs->fields["trade_fighters"];
				$target_empire->army->data["stations"] += $rs->fields["trade_stations"];
				$target_empire->army->data["lightcruisers"] += $rs->fields["trade_lightcruisers"];
				$target_empire->army->data["heavycruisers"] += $rs->fields["trade_heavycruisers"];
				$target_empire->save();

				$source_empire->army->data["carriers"] += $rs->fields["carriers"];
				$source_empire->save();

				// send notifications
				$evt = new EventCreator($DB);
				$evt->type = CONF_EVENT_TRADECONVOY_RECEIVED;
				$evt->from = -1;
				$evt->params = $rs->fields;
				$evt->to = $rs->fields["empire_from"];
				$evt->send();

				$evt->to = $rs->fields["empire_to"];
				$evt->send();
			}

			$DB->Execute("DELETE FROM game".$game_id."_tb_tradeconvoy WHERE id=" . $rs->fields["id"]);

		} else {

			// check if pirates attack
			$r = rand(0, CONF_TRADE_PIRATERAID);
			if ($r == 0) {

				$pirates = array ();
				$rs2 = $DB->Execute("SELECT * FROM game".$game_id."_tb_pirate");
				while (!$rs2->EOF) {
					$pirates[] = $rs2->fields;

					$rs2->MoveNext();
				}

				$pirate = $pirates[rand(0, count($pirates) - 1)];

				$stolen_food = floor(($rs->fields["trade_food"] / 100) * rand(0, 10));
				$stolen_credits = floor(($rs->fields["trade_money"] / 100) * rand(0, 10));
				$stolen_covertagents = floor(($rs->fields["trade_covertagents"] / 100) * rand(0, 10));
				$stolen_soldiers = floor(($rs->fields["trade_soldiers"] / 100) * rand(0, 10));
				$stolen_fighters = floor(($rs->fields["trade_fighters"] / 100) * rand(0, 10));
				$stolen_lightcruisers = floor(($rs->fields["trade_lightcruisers"] / 100) * rand(0, 10));
				$stolen_heavycruisers = floor(($rs->fields["trade_heavycruisers"] / 100) * rand(0, 10));
	
				$pirate["food"] += $stolen_food;
				$pirate["credits"] += $stolen_credits;
				$pirate["covertagents"] += $stolen_covertagents;
				$pirate["soldiers"] += $stolen_soldiers;
				$pirate["fighters"] += $stolen_fighters;
				$pirate["lightcruisers"] += $stolen_lightcruisers;
				$pirate["heavycruisers"] += $stolen_heavycruisers;
				$DB->Execute("UPDATE game".$game_id."_tb_pirate SET food=" . $pirate["food"] . ",credits=" . $pirate["credits"] . ",covertagents=" . $pirate["covertagents"] . ",soldiers=" . $pirate["soldiers"] . ",fighters=" . $pirate["fighters"] . ",lightcruisers=" . $pirate["lightcruisers"] . ",heavycruisers=" . $pirate["heavycruisers"] . " WHERE id=" + $pirate["id"]);

				$DB->Execute("UDPDATE game".$game_id."_tb_tradeconvoy SET trade_food=".($rs->fields["trade_food"]-$stolen_food).",trade_money=".($rs->fields["trade_money"]-$stolen_credits).",trade_covertagents=".($rs->fields["trade_covertagents"]-$stolen_covertagents).",trade_soldiers=".($rs->fields["trade_soldiers"]-$stolen_soldiers).",trade_fighters=".($rs->fields["trade_fighters"]-$stolen_fighters).",trade_lightcruisers=".($rs->fields["trade_lightcruisers"]-$stolen_lightcruisers).",trade_heavycruisers=".($rs->fields["trade_heavycruisers"]-$stolen_heavycruisers)." WHERE id=".$rs->fields["id"]);

				// send notifications
				$evt = new EventCreator($DB);
				$evt->type = CONF_EVENT_TRADECONVOY_RAIDEDBYPIRATE;
				$evt->from = -1;
				$evt->params = array (
					"stolen_food" => $stolen_food,
					"stolen_credits" => $stolen_credits,
					"stolen_covertagents" => $stolen_covertagents,
					"stolen_soldiers" => $stolen_soldiers,
					"stolen_fighters" => $stolen_fighters,
					"stolen_lightcruisers" => $stolen_lightcruisers,
					"stolen_heavycruisers" => $stolen_heavycruisers
				);
				$evt->to = $rs->fields["empire_from"];
				$evt->send();

			}


		}

		$rs->MoveNext();
	}	


}

?>
