<?php

// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //

function NewTurn_handlePirateRaid($game_id, $empire)
{
	global $DB,$GAME;

	srand(time(NULL));
	$malus = 0;
	
	if ($empire->data["protection_turns_left"] > 0)
		$r = rand(1,16);
	else
		$r = rand(1,4);
			
	
	if ($r == 1) {

		$pirate = $DB->Execute("SELECT * FROM game".$game_id."_tb_pirate ORDER BY rand() LIMIT 1");
		$pirate = $pirate->fields;
		$p = rand(1,10+$malus);
		
		$msg = "";
		
		switch(rand(1,16)) 
		{
			
			/*************************************************************/
			case 1:
				$lost_soldiers = floor(($empire->army->data["soldiers"] / 100) * $p);
				if ($lost_soldiers == 0) return;
				$msg = $GAME["template"]->formatNumber($lost_soldiers)." "." ".T_("soldiers stolen");
				$empire->army->data["soldiers"] -= $lost_soldiers;
				$pirate["soldiers"] += $lost_soldiers;
			break;
		
			/*************************************************************/
			case 2:	
				$lost_fighters = floor(($empire->army->data["fighters"] / 100) * $p);
				if ($lost_fighters == 0) return;
				$msg = $GAME["template"]->formatNumber($lost_fighters)." ".T_("fighters stolen");
				$empire->army->data["fighters"] -= $lost_fighters;
				$pirate["fighters"] += $lost_fighters;
			break;
		
			/*************************************************************/
			case 3:
				$lost_stations = floor(($empire->army->data["stations"] / 100) * $p);
				if ($lost_stations == 0) return;
				$msg = $GAME["template"]->formatNumber($lost_stations)." ".T_("defense stations stolen");
				$empire->army->data["stations"] -= $lost_stations;
				$pirate["stations"] += $lost_stations;
				
			break;

			/*************************************************************/
			case 4:
				$lost_lightcruisers = floor(($empire->army->data["lightcruisers"] / 100) * $p);
				if ($lost_lightcruisers == 0) return;
				$msg = $GAME["template"]->formatNumber($lost_lightcruisers)." ".T_("light cruisers stolen");
				$empire->army->data["lightcruisers"] -= $lost_lightcruisers;
				$pirate["lightcruisers"] += $lost_lightcruisers;
				
			break;
			
			/*************************************************************/
			case 5:
				$lost_heavycruisers = floor(($empire->army->data["heavycruisers"] / 100) * $p);
				if ($lost_heavycruisers == 0) return;
				$msg = $GAME["template"]->formatNumber($lost_heavycruisers)." ".T_("heavy cruisers stolen");
				$empire->army->data["heavycruisers"] -= $lost_heavycruisers;
				$pirate["heavycruisers"] += $lost_heavycruisers;
				
			break;

	
			/*************************************************************/
			case 6:
				$lost_carriers = floor(($empire->army->data["carriers"] / 100) * $p);
				if ($lost_carriers == 0) return;
				$msg = $GAME["template"]->formatNumber($lost_carriers)." ".T_("carriers stolen");
				$empire->army->data["carriers"] -= $lost_carriers;
				$pirate["carriers"] += $lost_carriers;
				
			break;
			

			/*************************************************************/
			case 7:
				$lost_credits = floor(($empire->data["credits"] / 100) * $p);
				if ($lost_credits == 0) return;
				$msg = $GAME["template"]->formatCredits($lost_credits)." ".T_("credits stolen");
				$empire->data["credits"] -= $lost_credits;
				$pirate["credits"] += $lost_credits;
				
			break;


			/*************************************************************/
			case 8:
				$lost_food = floor(($empire->data["food"] / 100) * $p);
				if ($lost_food == 0) return;
				$msg = $GAME["template"]->formatFood($lost_food)." ".T_("megatons of food stolen");
				$empire->data["food"] -= $lost_food;
				$pirate["food"] += $lost_food;
			break;
				
			/*************************************************************/
			case 9:
				$lost_covertagents = floor(($empire->army->data["covertagents"] / 100) * $p);
				if ($lost_covertagents == 0) return;
				$msg = $GAME["template"]->formatNumber($lost_covertagents)." ".T_("covert agents deserted");
				$empire->army->data["covertagents"] -= $lost_covertagents;
				$pirate["covertagents"] += $lost_covertagents;
			break;
			
			/*************************************************************/
			case 10:
				$lost_covertagents = floor(($empire->army->data["covertagents"] / 100) * $p);
				if ($lost_covertagents == 0) return;
				$msg = $GAME["template"]->formatNumber($lost_covertagents)." ".T_("covert agents deserted");
				$empire->army->data["covertagents"] -= $lost_covertagents;
				$pirate["covertagents"] += $lost_covertagents;
			break;
	
	
			/*************************************************************/
			case 11:
				$lost_planets = floor(($empire->planets->data["food_planets"] / 100) * $p);
				if ($lost_planets == 0) return;
				$msg = $GAME["template"]->formatNumber($lost_planets)." ".T_("food planets stolen");
				$pirate["food_planets"] += $lost_planets;
				$empire->planets->data["food_planets"] -= $lost_planets;
			break;
			

			/*************************************************************/
			case 12:
				$lost_planets = floor(($empire->planets->data["ore_planets"] / 100) * $p);
				if ($lost_planets == 0) return;
				$msg = $GAME["template"]->formatNumber($lost_planets)." ".T_("ore planets stolen");
				$pirate["ore_planets"] += $lost_planets;
				$empire->planets->data["ore_planets"] -= $lost_planets;
			break;
					
			/*************************************************************/
			case 13:
				$lost_planets = floor(($empire->planets->data["tourism_planets"] / 100) * $p);
				if ($lost_planets == 0) return;
				$msg = $GAME["template"]->formatNumber($lost_planets)." ".T_("tourism planets stolen");
				$pirate["tourism_planets"] += $lost_planets;
				$empire->planets->data["tourism_planets"] -= $lost_planets;
			break;		


			/*************************************************************/
			case 14:
				$lost_planets = floor(($empire->planets->data["petro_planets"] / 100) * $p);
				if ($lost_planets == 0) return;
				$msg = $GAME["template"]->formatNumber($lost_planets)." ".T_("petroleum planets stolen");
				$pirate["petro_planets"] += $lost_planets;
				$empire->planets->data["petro_planets"] -= $lost_planets;
			break;

			/*************************************************************/
			case 15:
				$lost_planets = floor(($empire->planets->data["supply_planets"] / 100) * $p);
				if ($lost_planets == 0) return;
				$msg = $GAME["template"]->formatNumber($lost_planets)." ".T_("supply planets stolen");
				$pirate["supply_planets"] += $lost_planets;
				$empire->planets->data["supply_planets"] -= $lost_planets;
			break;
		
			/*************************************************************/
			case 16:
				$lost_planets = floor(($empire->planets->data["research_planets"] / 100) * $p);
				if ($lost_planets == 0) return;
				$msg = $GAME["template"]->formatNumber($lost_planets)." ".T_("research planets stolen");
				$pirate["research_planets"] += $lost_planets;
				$empire->planets->data["research_planets"] -= $lost_planets;

			break;
		}

		/* Update pirate networth */
		$networth = 0;
		$networth += ($pirate["credits"] * CONF_NETWORTH_CREDITS);
	
		$planets = 0;
		$planets += $pirate["food_planets"];
		$planets += $pirate["ore_planets"];
		$planets += $pirate["tourism_planets"];
		$planets += $pirate["supply_planets"];
		$planets += $pirate["gov_planets"];
		$planets += $pirate["edu_planets"];
		$planets += $pirate["research_planets"];
		$planets += $pirate["urban_planets"];
		$planets += $pirate["petro_planets"];
		$planets += $pirate["antipollu_planets"];
		$networth += ($planets * CONF_NETWORTH_PLANETS);

		$army = 0;
		$army += $pirate["soldiers"] * CONF_NETWORTH_MILITARY_SOLDIER;
		$army += $pirate["fighters"]* CONF_NETWORTH_MILITARY_FIGHTER;
		$army += $pirate["stations"]* CONF_NETWORTH_MILITARY_STATION;
		$army += $pirate["lightcruisers"]* CONF_NETWORTH_MILITARY_LIGHTCRUISER;
		$army += $pirate["heavycruisers"]* CONF_NETWORTH_MILITARY_HEAVYCRUISER;
		$army += $pirate["carriers"]* CONF_NETWORTH_MILITARY_CARRIER;
		$army += $pirate["covertagents"]* CONF_NETWORTH_MILITARY_COVERT;

		$networth += $army;
		
		$pirate["networth"] = floor($networth);
		
		/* Update pirate data */
		$query = "UPDATE game".$game_id."_tb_pirate SET ";
		while(list($key,$value) = each($pirate)) {
				if ($key == "id") continue;
			if (is_numeric($key)) continue;
			if ((is_numeric($value)) && ($key != "logo"))
				$query .= "$key=$value,";
			else
				$query .= "$key='$value',";
			
		}
		$query = substr($query,0,strlen($query)-1); // removing remaining ,
		$query .= " WHERE id='".$pirate["id"]."'";
		$DB->Execute($query);
		
		$evt = new EventCreator($DB);
		$evt->type = CONF_EVENT_PIRATERAID;
		$evt->from = -1;
		$evt->seen = 1;
		$evt->to = $empire->data["id"];
		$evt->params = array("message"=>str_replace("{pirate_name}",$pirate["name"],$msg));
		$evt->send();
	
	}
}


?>
