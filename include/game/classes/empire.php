<?php

// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //

class Empire
{

	var $DB;
	var $TEMPLATE;
	var $data;
	var $data_footprint;
	var $gameplay_costs;
	var $army;
	var $planets;
	var $coalition;
	var $production;
	var $supply;
	var $diplomacy;
	var $research;
	var $game_id;


	/////////////////////////////////////////////////////////////
	//
	/////////////////////////////////////////////////////////////
	function Empire($DB,$TEMPLATE,$gameplay_costs)
	{
		$this->DB = $DB;
		$this->game_id = round($_SESSION["game"]);
		$this->TEMPLATE = $TEMPLATE;
		$this->gameplay_costs = $gameplay_costs;
		$this->army = new Army($DB,$TEMPLATE);
		$this->planets = new Planets($DB,$TEMPLATE);
		$this->coalition = new Coalition($DB);
		$this->production = new Production($DB,$TEMPLATE);
		$this->supply = new Supply($DB,$TEMPLATE);
		$this->diplomacy = new Diplomacy($DB);
		$this->research = new Research($DB,$TEMPLATE);
		

	}

	/////////////////////////////////////////////////////////////
	//
	/////////////////////////////////////////////////////////////
	function load($id)
	{
		$query = "SELECT * FROM game".$this->game_id."_tb_empire WHERE id='".intval($id)."'";
		$this->data = $this->DB->Execute($query);
		if (!$this->data) trigger_error($query ." = ".$this->DB->ErrorMsg());
		if ($this->data->EOF) return array("code"=>false,"desc"=>T_("Fatal error while loading empire object"));
		$this->data = $this->data->fields;


		$this->data_footprint = md5(serialize($this->data));

		if (!$this->army->load($id)) return array("code"=>false,"desc"=>T_("Fatal error while loading army object"));
		if (!$this->planets->load($id)) return array("code"=>false,"desc"=>T_("Fatal error while loading planets object"));
		if (!$this->coalition->load($id)) return array("code"=>false,"desc"=>T_("Fatal error while loading coalition object"));
		if (!$this->production->load($id)) return array("code"=>false,"desc"=>T_("Fatal error while loading petroleum object"));
		if (!$this->supply->load($id)) return array("code"=>false,"desc"=>T_("Fatal error while loading supply object"));
		if (!$this->diplomacy->load($id)) return array("code"=>false,"desc"=>T_("Fatal error while loading diplomacy object"));
		if (!$this->research->load($id)) return array("code"=>false,"desc"=>T_("Fatal error while loading research object"));
		return array("code"=>true,"desc"=>null);
	}

	/////////////////////////////////////////////////////////////
	// save, but only if data have changed !
	/////////////////////////////////////////////////////////////
	function save()
	{

		$query = "UPDATE game".$this->game_id."_tb_empire SET ";
		reset($this->data);
		while (list($key,$value) = each($this->data))
		{
			if ($key == "id") continue;
			if (is_numeric($key)) continue;

            if ((is_numeric($value)) && ($key != "logo"))
				$query .= "$key=$value,";
			else
				$query .= "$key='".addslashes($value)."',";
			
		}

		$query = substr($query,0,strlen($query)-1); // removing remaining ,
		$query .= " WHERE id='".$this->data["id"]."'";
		
//		$this->DB->beginTrans();		
		if (!$this->DB->Execute($query)) trigger_error($this->DB->ErrorMsg());
		
		$this->army->save();
		$this->planets->save();
		$this->coalition->save();
		$this->production->save();
		$this->supply->save();

//		$this->DB->completeTrans();
	}

	/////////////////////////////////////////////////////////////
	//
	/////////////////////////////////////////////////////////////
	function collapse()
	{	
		global $NEWS_DATA;

		$this->data["active"] = 2;
		$this->data["population"] = 0;
		
		$evt = new EventCreator($this->DB);
		$evt->type = CONF_EVENT_COLLAPSEDEMPIRE;
		$evt->from = -1;
		$empire_data = $this->data;
		$evt->params  = array("empire_emperor"=>$this->data["emperor"],"empire_name"=>$this->data["name"],"gender"=>$this->data["gender"]);
		$evt->broadcast();

		// notice player
		$message = T_("Sorry but your empire have collapsed in game")." <b>".CONF_GAME_NAME."</b> <br/>";
		if (!$this->DB->Execute("INSERT INTO system_tb_messages (player_id,date,message) VALUES(".$this->data["player_id"].",".time(NULL).",'".addslashes($message)."')")) trigger_error($this->DB->ErrorMsg());

		$this->coalition->transferRandomOwnership(-1);

		// update history

		$military_might = $this->data["networth"]-($this->data["population"] * CONF_NETWORTH_POPULATION) - ($this->planets->getCount() * CONF_NETWORTH_PLANETS);


		$this->DB->Execute(
			"INSERT INTO system_tb_history (game_id,player_id,date,rank,empire_name,networth,military_might,planets,
			population,turns_played) 
			VALUES(".$_SESSION["game"].",".$this->data["player_id"].",".time(NULL).",0,'".$this->data["name"]."',
			".$this->data["networth"].",
			".$military_might.",
			".$this->planets->getCount().",
			".$this->data["population"].",
			".$this->data["turns_played"]."
			)");

		
		if (!$this->DB->Execute("DELETE FROM game".$this->game_id."_tb_armyconvoy WHERE empire_from='".$this->data["id"]."'")) trigger_error($this->DB->ErrorMsg());


	}

	/////////////////////////////////////////////////////////////
	//
	/////////////////////////////////////////////////////////////
	function delete()
	{
		
		if (!$this->DB->Execute("UPDATE game".$this->game_id."_tb_empire SET active='3' WHERE id='".$this->data["id"]."'")) trigger_error($this->DB->ErrorMsg());
		if (!$this->DB->Execute("DELETE FROM game".$this->game_id."_tb_army WHERE empire='".$this->data["id"]."'")) trigger_error($this->DB->ErrorMsg());
		if (!$this->DB->Execute("DELETE FROM game".$this->game_id."_tb_event WHERE event_from='".$this->data["id"]."'")) trigger_error($this->DB->ErrorMsg());
		if (!$this->DB->Execute("DELETE FROM game".$this->game_id."_tb_event WHERE event_to='".$this->data["id"]."'")) trigger_error($this->DB->ErrorMsg());
		if (!$this->DB->Execute("DELETE FROM game".$this->game_id."_tb_loan WHERE empire='".$this->data["id"]."'")) trigger_error($this->DB->ErrorMsg());
		if (!$this->DB->Execute("DELETE FROM game".$this->game_id."_tb_planets WHERE empire='".$this->data["id"]."'")) trigger_error($this->DB->ErrorMsg());
		if (!$this->DB->Execute("DELETE FROM game".$this->game_id."_tb_production WHERE empire='".$this->data["id"]."'")) trigger_error($this->DB->ErrorMsg());
		if (!$this->DB->Execute("DELETE FROM game".$this->game_id."_tb_stats WHERE empire='".$this->data["id"]."'")) trigger_error($this->DB->ErrorMsg());
		if (!$this->DB->Execute("DELETE FROM game".$this->game_id."_tb_supply WHERE empire='".$this->data["id"]."'"))trigger_error($this->DB->ErrorMsg());
		if (!$this->DB->Execute("DELETE FROM game".$this->game_id."_tb_tradeconvoy WHERE empire_from='".$this->data["id"]."'")) trigger_error($this->DB->ErrorMsg());
		if (!$this->DB->Execute("DELETE FROM game".$this->game_id."_tb_tradeconvoy WHERE empire_to='".$this->data["id"]."'")) trigger_error($this->DB->ErrorMsg());
		if (!$this->DB->Execute("DELETE FROM game".$this->game_id."_tb_armyconvoy WHERE empire_from='".$this->data["id"]."'")) trigger_error($this->DB->ErrorMsg());


		if (!$this->DB->Execute("DELETE FROM game".$this->game_id."_tb_treaty WHERE empire_from='".$this->data["id"]."'")) trigger_error($this->DB->ErrorMsg());
		if (!$this->DB->Execute("DELETE FROM game".$this->game_id."_tb_treaty WHERE empire_to='".$this->data["id"]."'")) trigger_error($this->DB->ErrorMsg());

        // Time to give coalition to a different member, if not exist, just simply delete
        // and send a event.
        if ($this->coalition->isMember())
        	if ($this->coalition->isOwner())
                $this->coalition->disband();

	}

	/////////////////////////////////////////////////////////////
	//
	/////////////////////////////////////////////////////////////
	function checkForEnoughFood()
	{
		global $CONF_CIVIL_STATUS;

		if ($this->data["active"] != 1) return "";
		
		if ($this->data["food"] >= 0) return "";
 
		
		$msg = "<table width=\"100%\"><tr><td><img src=\"../images/game/starving.gif\" style=\"border:0px solid yellow\"></td><td align=\"center\" width=\"100%\">&nbsp;<b style=\"color:yellow\">".T_("Your population is starving!")."</b><br/>";

		// First we evaluate how much food is needed
		$food_needed = abs($this->data["food"]);
		
		// we get the market supply
		$market = $this->DB->Execute("SELECT * FROM game".$this->game_id."_tb_market");
		if (!$market) trigger_error($this->DB->ErrorMsg());
		$market = $market->fields;

		// Now we check if the food market have what we need
		if ($market["food"] >= $food_needed)
		{
			$food_price = round((CONF_COST_FOOD * $market["food_ratio"]));
			$food_total_cost = $food_needed * $food_price;
			
			// then we check for credits
			if ($this->data["credits"] >= $food_total_cost)
			{
				$msg_food = T_("Bought food: {food} for {credits}");
				
				
				$this->DB->Execute("UPDATE game".$this->game_id."_tb_market SET food='".($market["food"] - $food_needed)."',food_buy='".($market["food_buy"] + $food_needed)."'");	
				
				$msg_food = str_replace("{food}",
					$this->TEMPLATE->formatFood($food_needed),
					$msg_food
					);

				$msg_food = str_replace("{credits}",
					$this->TEMPLATE->formatCredits($food_total_cost),
					$msg_food
					);

				$msg .= $msg_food;
				
				$this->data["credits"] -= $food_total_cost;
				$this->data["food"] = 0;
				$msg .= "</td></tr></table>";
				
				return $msg;	
			}
		}
		
		$pop_lost = round(($this->data["population"]/100
		*CONF_POPULATION_STARVING));

		$msg_death = T_("{population} civilians starved to death!");
		$msg_death = str_replace("{percent}",CONF_POPULATION_STARVING,$msg_death);
		$msg_death = str_replace("{population}",
			$this->TEMPLATE->formatNumber($pop_lost),$msg_death);

		$msg .= $msg_death;
		$this->data["population"] -= $pop_lost;
		$soldiers_lost = round(($this->army->data["soldiers"]/100)
		*CONF_SOLDIERS_STARVING);
		
		$msg_death = T_("{soldiers} soldiers starved to death!");
		$msg_death = str_replace("{percent}",CONF_SOLDIERS_STARVING,$msg_death);
		$msg_death = str_replace("{soldiers}",
			$this->TEMPLATE->formatNumber($soldiers_lost),$msg_death);
		$msg .= $msg_death;


		$this->army->data["soldiers"] -= $soldiers_lost;

		$this->data["civil_status"]++;

		if ($this->data["civil_status"] > 7) 
			$this->data["civil_status"] = 7;

		$msg .= str_replace("{civil}",
		$CONF_CIVIL_STATUS[$this->data["civil_status"]],
		T_("Population is angry! New civil status: {civil}"))."<br/>\r\n";

		$this->data["food"] = 0;
		
		$msg .= "</td></tr></table>";
		return $msg;

	}

	/////////////////////////////////////////////////////////////
	//
	/////////////////////////////////////////////////////////////
	function checkForEnoughCredits()
	{
		if ($this->data["active"] != 1) return "";
		
		global $CONF_CIVIL_STATUS;
		
		if ($this->data["credits"] >= 0) return ""; 
	
		srand(time(NULL));
	
		$msg = "<table width=\"100%\"><tr><td><img src=\"../images/game/bankrupt.gif\" style=\"border:0px solid yellow\"></td><td valign=\"top\" align=\"center\" width=\"100%\">&nbsp;<b style=\"color:yellow\">".T_("Cannot afford maintenance costs!")."<br/>\r\n";


	
		$msg .= str_replace("{percent}",CONF_BANKRUPT_PLANETS,T_("{percent}% planets released!"))."<br/>\r\n";
	
		$this->planets->data["food_planets"] -= ceil(($this->planets->data["food_planets"]/100)*CONF_BANKRUPT_PLANETS);
		$this->planets->data["ore_planets"] -= ceil(($this->planets->data["ore_planets"]/100)*CONF_BANKRUPT_PLANETS);
		$this->planets->data["tourism_planets"] -= ceil(($this->planets->data["tourism_planets"]/100)*CONF_BANKRUPT_PLANETS);
		$this->planets->data["supply_planets"] -= ceil(($this->planets->data["supply_planets"]/100)*CONF_BANKRUPT_PLANETS);
		$this->planets->data["gov_planets"] -= ceil(($this->planets->data["gov_planets"]/100)*CONF_BANKRUPT_PLANETS);
		$this->planets->data["edu_planets"] -= ceil(($this->planets->data["edu_planets"]/100)*CONF_BANKRUPT_PLANETS);
		$this->planets->data["research_planets"] -= ceil(($this->planets->data["research_planets"]/100)*CONF_BANKRUPT_PLANETS);
		$this->planets->data["urban_planets"] -= ceil(($this->planets->data["urban_planets"]/100)*CONF_BANKRUPT_PLANETS);
		$this->planets->data["petro_planets"] -= ceil(($this->planets->data["petro_planets"]/100)*CONF_BANKRUPT_PLANETS);
		$this->planets->data["antipollu_planets"] -= ceil(($this->planets->data["antipollu_planets"]/100)*CONF_BANKRUPT_PLANETS);

		

		$msg .= str_replace("{percent}",CONF_BANKRUPT_MILITARY,T_("{percent}% army disbanded!"))."<br/>\r\n";

		$this->army->data["soldiers"] -= ceil(($this->army->data["soldiers"]/100) * CONF_BANKRUPT_MILITARY);
		$this->army->data["fighters"] -= ceil(($this->army->data["fighters"]/100) * CONF_BANKRUPT_MILITARY);
		$this->army->data["stations"] -= ceil(($this->army->data["stations"]/100) * CONF_BANKRUPT_MILITARY);
		$this->army->data["lightcruisers"] -= ceil(($this->army->data["lightcruisers"]/100) * CONF_BANKRUPT_MILITARY);
		$this->army->data["heavycruisers"] -= ceil(($this->army->data["heavycruisers"]/100) * CONF_BANKRUPT_MILITARY);
		$this->army->data["carriers"] -= ceil(($this->army->data["carriers"]/100) * CONF_BANKRUPT_MILITARY);
		
		
		if (rand(0,5) == 0)
		{
			$this->army->data["effectiveness"] -= 5;
			if ($this->army->data["effectiveness"] < 10) $this->army->data["effectiveness"] = 10;
			$msg .= str_replace("{percent}",$this->army->data["effectiveness"],T_("Army effectiveness going down!"))."<br/>\r\n";

		}

		
		if (rand(0,5) == 0)
		{
			$this->data["civil_status"]++;
			if ($this->data["civil_status"] > 7) $this->data["civil_status"] = 7;
			$msg .= str_replace("{civil}",
			$CONF_CIVIL_STATUS[$this->data["civil_status"]],
			T_("Population is angry! New civil status: {civil}"))."<br/>\r\n";
		}
				
		$this->data["credits"] = 0;

		$msg .="</td></tr></table>";
		return $msg;

	}


	/////////////////////////////////////////////////////////////
	//
	/////////////////////////////////////////////////////////////
	function checkForEnoughOre()
	{
		if ($this->data["active"] != 1) return "";
		
		global $CONF_CIVIL_STATUS;
		
		if ($this->data["ore"] >= 0) return ""; 
	
		srand(time(NULL));
	
		$msg = "<table width=\"100%\"><tr><td><img src=\"../images/game/no_ore.jpg\" style=\"border:0px solid yellow\"></td><td valign=\"top\" align=\"center\" width=\"100%\">&nbsp;<b style=\"color:yellow\">".T_("No enough ore!")."<br/>\r\n";

		// First we evaluate how much ore is needed
		$ore_needed = abs($this->data["ore"]);
		
		// we get the market supply
		$market = $this->DB->Execute("SELECT * FROM game".$this->game_id."_tb_market");
		if (!$market) trigger_error($this->DB->ErrorMsg());
		$market = $market->fields;

		// Now we check if the market have what we need
		if ($market["ore"] >= $ore_needed)
		{
			$ore_price = round((CONF_COST_ORE * $market["ore_ratio"]));
			$ore_total_cost = $ore_needed * $ore_price;
			
			// then we check for credits
			if ($this->data["credits"] >= $ore_total_cost)
			{
				$msg_ore = T_("bought ore: {ore} for {credits}");
				
				
				$this->DB->Execute("UPDATE game".$this->game_id."_tb_market SET ore=".($market["ore"] - $ore_needed).",ore_buy=".($market["ore_buy"] + $ore_needed));	
				
				$msg_ore = str_replace("{ore}",
					$this->TEMPLATE->formatFood($ore_needed),
					$msg_ore
					);

				$msg_ore = str_replace("{credits}",
					$this->TEMPLATE->formatCredits($ore_total_cost),
					$msg_ore
					);

				$msg .= $msg_ore;
				
				$this->data["credits"] -= $ore_total_cost;
				$this->data["ore"] = 0;
				$msg .= "</td></tr></table>";
				
				return $msg;	
			}
		}
		


		$msg .= str_replace("{percent}",CONF_BANKRUPT_MILITARY,T_("Army disbanded!"))."<br/>\r\n";

		$this->army->data["fighters"] -= ceil(($this->army->data["fighters"]/100) * CONF_BANKRUPT_MILITARY);
		$this->army->data["lightcruisers"] -= ceil(($this->army->data["lightcruisers"]/100) * CONF_BANKRUPT_MILITARY);
		$this->army->data["heavycruisers"] -= ceil(($this->army->data["heavycruisers"]/100) * CONF_BANKRUPT_MILITARY);
		$this->army->data["carriers"] -= ceil(($this->army->data["carriers"]/100) * CONF_BANKRUPT_MILITARY);
		
		
		if (rand(0,5) == 0)
		{
			$this->army->data["effectiveness"] -= 5;
			if ($this->army->data["effectiveness"] < 10) $this->army->data["effectiveness"] = 10;
			$msg .= str_replace("{percent}",$this->army->data["effectiveness"],T_("Army effectiveness going down!"))."<br/>\r\n";

		}

		
		if (rand(0,5) == 0)
		{
			$this->data["civil_status"]++;
			if ($this->data["civil_status"] > 7) $this->data["civil_status"] = 7;
			$msg .= str_replace("{civil}",
			$CONF_CIVIL_STATUS[$this->data["civil_status"]],
			T_("Population is angry! New civil status: {civil}"))."<br/>\r\n";
		}
				
		$this->data["ore"] = 0;

		$msg .="</td></tr></table>";
		return $msg;

	}


	/////////////////////////////////////////////////////////////
	//
	/////////////////////////////////////////////////////////////
	function checkForEnoughPetroleum()
	{
		if ($this->data["active"] != 1) return "";
		
		global $CONF_CIVIL_STATUS;
		
		if ($this->data["petroleum"] >= 0) return ""; 
	
		srand(time(NULL));
	
		$msg = "<table width=\"100%\"><tr><td><img src=\"../images/game/no_petro.jpg\" style=\"border:0px solid yellow\"></td><td valign=\"top\" align=\"center\" width=\"100%\">&nbsp;<b style=\"color:yellow\">".T_("No enough petroleum!")."<br/>\r\n";

		// First we evaluate how much petroleum is needed
		$petroleum_needed = abs($this->data["petroleum"]);
		
		// we get the market supply
		$market = $this->DB->Execute("SELECT * FROM game".$this->game_id."_tb_market");
		if (!$market) trigger_error($this->DB->ErrorMsg());
		$market = $market->fields;

		// Now we check if the market have what we need
		if ($market["petroleum"] >= $petroleum_needed)
		{
			$petroleum_price = round((CONF_COST_PETROLEUM * $market["petroleum_ratio"]));
			$petroleum_total_cost = $petroleum_needed * $petroleum_price;
			
			// then we check for credits
			if ($this->data["credits"] >= $petroleum_total_cost)
			{
				$msg_petroleum = T_("Bought petroleum: {petroleum} for {credits}");
				
				
				$this->DB->Execute("UPDATE game".$this->game_id."_tb_market SET petroleum=".($market["petroleum"] - $petroleum_needed).",petroleum_buy=".($market["petroleum_buy"] + $petroleum_needed));	
				
				$msg_petroleum = str_replace("{petroleum}",
					$this->TEMPLATE->formatFood($petroleum_needed),
					$msg_petroleum
					);

				$msg_petroleum = str_replace("{credits}",
					$this->TEMPLATE->formatCredits($petroleum_total_cost),
					$msg_petroleum
					);

				$msg .= $msg_petroleum;
				
				$this->data["credits"] -= $petroleum_total_cost;
				$this->data["petroleum"] = 0;
				$msg .= "</td></tr></table>";
				
				return $msg;	
			}
		}
		

		$msg .= str_replace("{percent}",CONF_BANKRUPT_MILITARY,T_("{percent}% army disbanded!"))."<br/>\r\n";

		$this->army->data["fighters"] -= ceil(($this->army->data["fighters"]/100) * CONF_BANKRUPT_MILITARY);
		$this->army->data["stations"] -= ceil(($this->army->data["stations"]/100) * CONF_BANKRUPT_MILITARY);
		$this->army->data["lightcruisers"] -= ceil(($this->army->data["lightcruisers"]/100) * CONF_BANKRUPT_MILITARY);
		$this->army->data["heavycruisers"] -= ceil(($this->army->data["heavycruisers"]/100) * CONF_BANKRUPT_MILITARY);
		$this->army->data["carriers"] -= ceil(($this->army->data["carriers"]/100) * CONF_BANKRUPT_MILITARY);
		
		
		if (rand(0,5) == 0)
		{
			$this->army->data["effectiveness"] -= 5;
			if ($this->army->data["effectiveness"] < 10) $this->army->data["effectiveness"] = 10;
			$msg .= str_replace("{percent}",$this->army->data["effectiveness"],T_("{percent}% rmy effectiveness going down!"))."<br/>\r\n";

		}

		
		if (rand(0,5) == 0)
		{
			$this->data["civil_status"]++;
			if ($this->data["civil_status"] > 7) $this->data["civil_status"] = 7;
			$msg .= str_replace("{civil}",
			$CONF_CIVIL_STATUS[$this->data["civil_status"]],
			T_("Population is angry! New civil status: {civil}"))."<br/>\r\n";
		}
				
		$this->data["petroleum"] = 0;

		$msg .="</td></tr></table>";
		return $msg;

	}


	/////////////////////////////////////////////////////////////
	//
	/////////////////////////////////////////////////////////////
	function checkForEnoughPopulation()
	{

		// you are dead, jim
		if (($this->data["population"] < 10) || ($this->planets->getCount() == 0))
			return false;

		return true;
		
	
	}


	/////////////////////////////////////////////////////////
	//
	/////////////////////////////////////////////////////////
	function updateNetworth()
	{

		$networth = 0;
		$networth += ($this->data["population"] * CONF_NETWORTH_POPULATION);
		$networth += ($this->data["credits"] * CONF_NETWORTH_CREDITS);
	
		$planets = 0;
		$planets += $this->planets->data["food_planets"];
		$planets += $this->planets->data["ore_planets"];
		$planets += $this->planets->data["tourism_planets"];
		$planets += $this->planets->data["supply_planets"];
		$planets += $this->planets->data["gov_planets"];
		$planets += $this->planets->data["edu_planets"];
		$planets += $this->planets->data["research_planets"];
		$planets += $this->planets->data["urban_planets"];
		$planets += $this->planets->data["petro_planets"];
		$planets += $this->planets->data["antipollu_planets"];
		$networth += ($planets * CONF_NETWORTH_PLANETS);

		$army = 0;
		$army += $this->army->data["soldiers"] * CONF_NETWORTH_MILITARY_SOLDIER;
		$army += $this->army->data["fighters"]* CONF_NETWORTH_MILITARY_FIGHTER;
		$army += $this->army->data["stations"]* CONF_NETWORTH_MILITARY_STATION;
		$army += $this->army->data["lightcruisers"]* CONF_NETWORTH_MILITARY_LIGHTCRUISER;
		$army += $this->army->data["heavycruisers"]* CONF_NETWORTH_MILITARY_HEAVYCRUISER;
		$army += $this->army->data["carriers"]* CONF_NETWORTH_MILITARY_CARRIER;
		$army += $this->army->data["covertagents"]* CONF_NETWORTH_MILITARY_COVERT;

		$rs = $this->DB->Execute("SELECT * FROM game".$this->game_id."_tb_armyconvoy WHERE empire_from=".$this->data["id"]." OR empire_to=".$this->data["id"]);
		if (!$rs) trigger_error($DB->ErrorMsg());

		while (!$rs->EOF) {

			$army += $rs->fields["convoy_soldiers"] * CONF_NETWORTH_MILITARY_SOLDIER;
			$army += $rs->fields["convoy_fighters"]* CONF_NETWORTH_MILITARY_FIGHTER;
			$army += $rs->fields["convoy_lightcruisers"]* CONF_NETWORTH_MILITARY_LIGHTCRUISER;
			$army += $rs->fields["convoy_heavycruisers"]* CONF_NETWORTH_MILITARY_HEAVYCRUISER;
			$army += $rs->fields["carriers"]* CONF_NETWORTH_MILITARY_CARRIER;
			$rs->MoveNext();
		}



		$networth += ($army);
		$this->data["networth"] = floor($networth);

                if ($this->coalition->IsMember())
               		$this->coalition->updateNetworth($this->data["networth"]);
	}


	/////////////////////////////////////////////////////////
	//
	/////////////////////////////////////////////////////////
    function calcAntiPollution()
    {
        if ($this->planets->data["antipollu_planets"]!=0) {
            $antipollution = $this->planets->data["antipollu_planets"] * CONF_ANTIPOLLUTION;
            $antipollution = round(($antipollution/100)* $this->production->data["antipollu_short"]);
            if ($antipollution == 0) $antipollution = 1;

            return $antipollution;
        } else return 1;
    }

	/////////////////////////////////////////////////////////
	//
	/////////////////////////////////////////////////////////
    function calcPollution()
    {

        $pollution = floor((int) (($this->planets->data["petro_planets"]/100) * $this->production->data["petro_short"]) * CONF_PETRO_POLLUTION);
        $pollution += floor((int) $this->data["population"] * CONF_POP_POLLUTION);
        $pollution = round($pollution,2);
        return $pollution;
    }

	/////////////////////////////////////////////////////////
	//
	/////////////////////////////////////////////////////////
	function updateStats()
	{
        $pollution = $this->calcPollution();
		$army = 0;
		$army += $this->army->data["soldiers"] * CONF_NETWORTH_MILITARY_SOLDIER;
		$army += $this->army->data["fighters"]* CONF_NETWORTH_MILITARY_FIGHTER;
		$army += $this->army->data["stations"]* CONF_NETWORTH_MILITARY_STATION;
		$army += $this->army->data["lightcruisers"]* CONF_NETWORTH_MILITARY_LIGHTCRUISER;
		$army += $this->army->data["heavycruisers"]* CONF_NETWORTH_MILITARY_HEAVYCRUISER;
		$army += $this->army->data["carriers"]* CONF_NETWORTH_MILITARY_CARRIER;
		$army += $this->army->data["covertagents"]* CONF_NETWORTH_MILITARY_COVERT;

		$rs = $this->DB->Execute("SELECT * FROM game".$this->game_id."_tb_armyconvoy WHERE empire_from=".$this->data["id"]." OR empire_to=".$this->data["id"]);
		if (!$rs) trigger_error($DB->ErrorMsg());


		while (!$rs->EOF) {

			$army += $rs->fields["convoy_soldiers"] * CONF_NETWORTH_MILITARY_SOLDIER;
			$army += $rs->fields["convoy_fighters"]* CONF_NETWORTH_MILITARY_FIGHTER;
			$army += $rs->fields["convoy_lightcruisers"]* CONF_NETWORTH_MILITARY_LIGHTCRUISER;
			$army += $rs->fields["convoy_heavycruisers"]* CONF_NETWORTH_MILITARY_HEAVYCRUISER;
			$army += $rs->fields["carriers"]* CONF_NETWORTH_MILITARY_CARRIER;
			$rs->MoveNext();
		}


		$query = "INSERT INTO game".$this->game_id."_tb_stats (empire,date,credits,food,networth,military,planets,population,pollution,turn) 
		VALUES(".
		$this->data["id"].",".
		time(NULL).",".
		$this->data["credits"].",".
		$this->data["food"].",".
		$this->data["networth"].",".
		$army.",".
		$this->planets->getCount().",".
		$this->data["population"].",".
		$pollution.",".
		$this->data["turns_played"].");";

		if (!$this->DB->Execute($query)) trigger_error($this->DB->ErrorMsg());
	}


}



?>
