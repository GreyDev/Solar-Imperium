<?php

// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //

function NewTurn_PickRandomEvent($game_id, $empire)
{
	global $CONF_RANDOM_EVENTS,$GAME,$DB;
	
	srand(time(NULL));
	$p = rand(0,100);
	if ($p > CONF_RANDOMEVENT_PERCENTAGE) {
		return;
	}
	
	
	// Pick a random event
	$event = $CONF_RANDOM_EVENTS[rand(0,count($CONF_RANDOM_EVENTS)-1)];

	$action = explode("->",$event["value"]);
	$action_params = explode("=",$action[1]);
	$action_label = $action_params[0];
	$action_value = $action_params[1];
	$action_percent = false;
	
	if ($action_value[strlen($action_value)-1] == "%") {
		$action_value = substr($action_value,0,strlen($action_value)-1);
		$action_percent = true;		
	}
	
	$action_positive = true;
	if ($action_value[0] == "-") $action_positive = false;
	$action_value = substr($action_value,1);
		
	switch($action[0]) {
	
		//////////////////////////////////////////////////////////////
		case "empire":
			$initial_value = $empire->data[$action_label];
			$final_value = $initial_value;
			
			if ($action_percent) {
				$initial_value /= 100;
				$value = $initial_value * $action_value;
				
				if ($action_positive)
					$final_value += $value;
				else
					$final_value -= $value;
					
			} else {
				
				if ($action_positive)
					$final_value += $action_value;
				else
					$final_value -= $action_value;
			}
			
			$empire->data[$action_label] = $final_value;
			
		break;
		
		//////////////////////////////////////////////////////////////
		case "production":
			$initial_value = $empire->production->data[$action_label];
			$final_value = $initial_value;
			
			if ($action_percent) {
				$initial_value /= 100;
				$value = $initial_value * $action_value;
				
				if ($action_positive)
					$final_value += $value;
				else
					$final_value -= $value;
					
			} else {
				
				if ($action_positive)
					$final_value += $action_value;
				else
					$final_value -= $action_value;
			}
			
			$empire->production->data[$action_label] = $final_value;
		break;
		
		//////////////////////////////////////////////////////////////
		case "coordinator":

			if ($action_label == "terraform") {
			
				// add planets
				$query = "UPDATE game".$game_id."_tb_coordinator SET ";
				$query .= "food_planets=".$GAME["template"]->coord["food_planets"]+$action_value.",".
				$query .= "ore_planets=".$GAME["template"]->coord["ore_planets"]+$action_value.",".
				$query .= "supply_planets=".$GAME["template"]->coord["supply_planets"]+$action_value.",".
				$query .= "tourism_planets=".$GAME["template"]->coord["tourism_planets"]+$action_value.",".
				$query .= "supply_planets=".$GAME["template"]->coord["supply_planets"]+$action_value.",".
				$query .= "edu_planets=".$GAME["template"]->coord["edu_planets"]+$action_value.",".
				$query .= "gov_planets=".$GAME["template"]->coord["gov_planets"]+$action_value.",".
				$query .= "research_planets=".$GAME["template"]->coord["research_planets"]+$action_value.",".
				$query .= "petro_planets=".$GAME["template"]->coord["petro_planets"]+$action_value.",".
				$query .= "antipollu_planets=".$GAME["template"]->coord["antipollu_planets"]+$action_value;
					
				$DB->Execute($query);
			}
			
		break;
		
	}
	

	
	// send a event
	$evt = new EventCreator($DB);
	$evt->type = CONF_EVENT_RANDOMEVENT;
	$evt->from = -1;
	$evt->to = $empire->data["id"];
	$evt->seen = 1;
	$evt->params = $event;
	$evt->send();
	
}



?>
