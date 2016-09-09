<?php

// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //

function NewTurn_HandleLotteryPayout($game_id, $empire)
{
	global $DB,$GAME;
	
	if ($GAME["template"]->coord["lottery_date"] < time(NULL))
	{
		// we determine who is a winner
		$pool = array();
		$range = 0;

		$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_empire WHERE lottery_tickets > 0 AND active='1'");
		while(!$rs->EOF)
		{
				
			$p = array();
			$p["empire"] = $rs->fields["id"];
			$p["start"] = $range;
			$range += $rs->fields["lottery_tickets"];
			$p["end"] = $range;
			$pool[] = $p;			
			$rs->MoveNext();
		}



		if (count($pool) != 0) {

			srand(time(NULL));
			
			$winner = rand(0,$range);
			$winner_empire = -1;

			for ($i=0;$i<count($pool);$i++)
			{
				if (($pool[$i]["start"] <= $winner) && ($pool[$i]["end"] > $winner))
				{
					$winner_empire = $pool[$i]["empire"];
					break;
				}
			}

		
			if ($winner_empire != -1) {
 				$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_empire WHERE id='$winner_empire'");
				if (!$rs) trigger_error($DB->ErrorMsg());

				if ($empire->data["id"] == $winner_empire) {

					$empire->data["credits"]  += $GAME["template"]->coord["lottery_cash"];
					$empire->save();

				} else {
					if (!$DB->Execute("UPDATE game".$game_id."_tb_empire SET credits='".($rs->fields["credits"]+$GAME["template"]->coord["lottery_cash"])."' WHERE id='$winner_empire'")) trigger_error($DB->ErrorMsg());
				}

			
				$evt = new EventCreator($DB);
				$evt->type = CONF_EVENT_LOTTERYWINNER;
				$evt->from = -1;
				$evt->params = array("empire_id"=>$rs->fields["id"],"empire_emperor"=>$rs->fields["emperor"],"empire_name"=>$rs->fields["name"],"gender"=>$rs->fields["gender"],"lottery_cash"=>$GAME["template"]->coord["lottery_cash"]);
				$evt->broadcast();
			
				$GAME["template"]->coord["lottery_cash"] = 0;
			}
		}

	}

	if ($GAME["template"]->coord["lottery_cash"] == 0)
	{		
		$date = mktime(0,0,1,date("m"),date("d")+1,date("Y"));

		$jackpot = 0;		
		$count = 0;
		$rs = $DB->Execute("SELECT credits FROM game".$game_id."_tb_empire WHERE  active='1'");
		while (!$rs->EOF)
		{
			$jackpot += abs($rs->fields["credits"]);
			$count++;
			$rs->MoveNext();
		}
		
		$jackpot /= ($count>0?$count:1);
		
		$jackpot = $GAME["system"]->alterNumber($jackpot,25);
		
		$query = "UPDATE game".$game_id."_tb_coordinator SET lottery_cash='".$jackpot."',lottery_date='$date'";
		if (!$DB->Execute($query)) trigger_error($DB->ErrorMsg());

		$query = "UPDATE game".$game_id."_tb_empire SET lottery_tickets='0' WHERE active = '1'";
		if (!$DB->Execute($query)) trigger_error($DB->ErrorMsg());

	}

}

?>
