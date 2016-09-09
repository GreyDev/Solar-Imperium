<?php

// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //

function NewTurn_handleResearchGrowth($game_id, $empire)
{
	global $GAME,$DB;
	
	$game_id = round($_SESSION["game"]);
	
	// retrieve all points made during this turn.
	$points = $empire->research->getGrowthPoints(
		$empire->planets->data["research_planets"],
		$empire->production->data["research_short"]);

	$points += floor($empire->research->getGrowthPoints(
		$empire->planets->data["edu_planets"],
		$empire->production->data["edu_short"])/20);

   $points_sold = round(($points / 100) * $empire->data["research_rate"]);
   $points -= $points_sold;
   
   $empire->data["last_turn_research_sold"] = $points_sold*CONF_COST_RESEARCH;


	// append the number of points to the total the empire already have
	$empire->data["research_points"] += $points;
	
	// if the empire is doing fundamental research
	if ($empire->data["research_tech_id"] == -1) {
	
		$maxpoints = ($empire->data["research_level"]+1);

		// update stats
		$_SESSION["player"]["score"] += (2*$maxpoints);
		$DB->Execute("UPDATE system_tb_players SET score=".addslashes($_SESSION["player"]["score"])." WHERE id='".$_SESSION["player"]["id"]."'");
	
		$maxpoints = $maxpoints * (($maxpoints * $maxpoints) * CONF_RESEARCH_BASECOST);
		if ($empire->data["research_points"] >= $maxpoints)
		{
			$empire->data["research_points"] = 0;
			if ($empire->data["research_level"] != 9) {
				$empire->data["research_level"]++;
				$evt = new EventCreator($DB);
				$evt->type = CONF_EVENT_RESEARCHDONE;
				$evt->from = -1;
				$evt->seen = 1;
				$evt->to = $empire->data["id"];
				$evt->params = array("tech_name"=>T_("Fundamental research"),"tech_image"=>"images/research/fundamental.gif");
				$evt->send();
			
				if ($empire->data["research_level"] > 5) {
					$evt = new EventCreator($DB);
					$evt->type = CONF_EVENT_FUNDAMENTAL_COMPLETED;
					$evt->from = -1;
					$evt->seen = 1;
					$evt->to = $empire->data["id"];
					$e = $GAME["template"]->displayEmpireHTML($empire->data["id"],$empire->data["emperor"],$empire->data["name"],$empire->data["networth"]);
					$evt->params = array("research_level"=>$empire->data["research_level"],"empire"=>$e);
					$evt->broadcast();
				}
			}
		}
		
	} else {	// not fundamental, more specific research

		$tech_data = $empire->research->getTechFromId($empire->data["research_tech_id"]);
		if ($empire->data["research_points"] >= $tech_data["cost"])
		{
			$empire->data["research_points"] = 0;

			$evt = new EventCreator($DB);
			$evt->type = CONF_EVENT_RESEARCHDONE;
			$evt->from = -1;
			$evt->seen = 1;
			$evt->to = $empire->data["id"];
			$evt->params = array("tech_name"=>$tech_data["name"],"tech_image"=>$tech_data["image"]);
			$evt->send();

			$target = explode("_",$tech_data["target"]);
			switch($target[1]) {
				case "level":
					$empire->army->data[$tech_data["target"]] = floor($tech_data["value"]);
											
				break;

                case "civilstatus":
                    $empire->data["civil_status"] = floor($tech_data["value"]);
                    break;

				case "protection":
					$empire->data["protection_turns_left"] += floor($tech_data["value"]);
				break;
				
				case "production":

					$empire->production->data[$target[0]."_long"] += floor($tech_data["value"]);
				break;	
			}	
			
			$DB->Execute("INSERT INTO game".$game_id."_tb_research_done (empire_id,tech_id) VALUES(".$empire->data["id"].",".$tech_data["id"].")");
			$empire->data["research_tech_id"] = -1;
		}
	}
	
}
