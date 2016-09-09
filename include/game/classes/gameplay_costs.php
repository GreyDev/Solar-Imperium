<?php

// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //

class GameplayCosts {

	var $DB;
	var $game_id;

	///////////////////////////////////////////////////////////////////////
	// constructor
	///////////////////////////////////////////////////////////////////////
	function GameplayCosts($DB) {
		$this->DB = $DB;
		$this->game_id = round($_SESSION["game"]);
	}


	///////////////////////////////////////////////////////////////////////
	// Retrieve detailed planets prices
	///////////////////////////////////////////////////////////////////////
	function getPlanetsPrices($planets_data, $turns_played, $inflation) {

		$costs = array ();

		if ($planets_data["max_ore"] < $planets_data["ore_planets"])
			$planets_data["max_ore"] = $planets_data["ore_planets"];
		if ($planets_data["max_tourism"] < $planets_data["tourism_planets"])
			$planets_data["max_tourism"] = $planets_data["tourism_planets"];
		if ($planets_data["max_petro"] < $planets_data["petro_planets"])
			$planets_data["max_petro"] = $planets_data["petro_planets"];

		if ($planets_data["max_food"] < $planets_data["food_planets"])
			$planets_data["max_food"] = $planets_data["food_planets"];
		if ($planets_data["max_supply"] < $planets_data["supply_planets"])
			$planets_data["max_supply"] = $planets_data["supply_planets"];
		if ($planets_data["max_gov"] < $planets_data["gov_planets"])
			$planets_data["max_gov"] = $planets_data["gov_planets"];
		if ($planets_data["max_edu"] < $planets_data["edu_planets"])
			$planets_data["max_edu"] = $planets_data["edu_planets"];
		if ($planets_data["max_research"] < $planets_data["research_planets"])
			$planets_data["max_research"] = $planets_data["research_planets"];
		if ($planets_data["max_urban"] < $planets_data["urban_planets"])
			$planets_data["max_urban"] = $planets_data["urban_planets"];
		if ($planets_data["max_antipollu"] < $planets_data["antipollu_planets"])
			$planets_data["max_antipollu"] = $planets_data["antipollu_planets"];

		$food_planets = $planets_data["food_planets"];
		if ($food_planets == 0)	$food_planets = 1;

    $increment = 1 + (CONF_COST_INCREMENT + ((CONF_COST_PLANET_FOOD+$turns_played) * $inflation * 0.00001));
    $costs["food_increment"] = $increment;
		$costs["base_food"] = CONF_COST_PLANET_FOOD;
    $costs["planet_food"] = $this->calcUnitCost($costs["base_food"], $planets_data["max_food"], $increment);

  
		$supply_planets = $planets_data["supply_planets"];
		if ($supply_planets == 0)	$supply_planets = 1;

		$increment = 1 + (CONF_COST_INCREMENT + ((CONF_COST_PLANET_SUPPLY+$turns_played) * $inflation * 0.00001));
    $costs["supply_increment"] = $increment;
		$costs["base_supply"] = CONF_COST_PLANET_SUPPLY;
		$costs["planet_supply"] = $this->calcUnitCost($costs["base_supply"], $planets_data["max_supply"], $increment);


		$gov_planets = $planets_data["gov_planets"];
		if ($gov_planets == 0)	$gov_planets = 1;

		$increment = 1 + (CONF_COST_INCREMENT + ((CONF_COST_PLANET_GOV+$turns_played) * $inflation * 0.00001));
    $costs["gov_increment"] = $increment;
    $costs["base_gov"] = CONF_COST_PLANET_GOV;
		$costs["planet_gov"] = $this->calcUnitCost($costs["base_gov"], $planets_data["max_gov"], $increment);


		$edu_planets = $planets_data["edu_planets"];
		if ($edu_planets == 0)	$edu_planets = 1;
	
    $increment = 1 + (CONF_COST_INCREMENT + ((CONF_COST_PLANET_EDU+$turns_played) * $inflation * 0.00001));
    $costs["edu_increment"] = $increment;
  	$costs["base_edu"] = CONF_COST_PLANET_EDU;
		$costs["planet_edu"] = $this->calcUnitCost($costs["base_edu"], $planets_data["max_edu"], $increment);


		$research_planets = $planets_data["research_planets"];
		if ($research_planets == 0)	$research_planets = 1;

    $increment = 1 + (CONF_COST_INCREMENT + ((CONF_COST_PLANET_RESEARCH+$turns_played) * $inflation * 0.00001));
		$costs["research_increment"] = $increment;
    $costs["base_research"] = CONF_COST_PLANET_RESEARCH;
		$costs["planet_research"] = $this->calcUnitCost($costs["base_research"], $planets_data["max_research"], $increment);


		$urban_planets = $planets_data["urban_planets"];
		if ($urban_planets == 0)	$urban_planets = 1;

		$increment = 1 + (CONF_COST_INCREMENT + ((CONF_COST_PLANET_URBAN+$turns_played) * $inflation * 0.00001));
    $costs["urban_increment"] = $increment;
    $costs["base_urban"] = CONF_COST_PLANET_URBAN;
		$costs["planet_urban"] = $this->calcUnitCost($costs["base_urban"], $planets_data["max_urban"], $increment);


		$ore_planets = $planets_data["ore_planets"];
		if ($ore_planets == 0) $ore_planets = 1;

		$increment = 1 + (CONF_COST_INCREMENT + ((CONF_COST_PLANET_ORE+$turns_played) * $inflation * 0.00001));
    $costs["ore_increment"] = $increment;
    $costs["base_ore"] = CONF_COST_PLANET_ORE;
		$costs["planet_ore"] = $this->calcUnitCost($costs["base_ore"], $planets_data["max_ore"], $increment);


		$tourism_planets = $planets_data["tourism_planets"];
		if ($tourism_planets == 0) $tourism_planets = 1;

		$increment = 1 + (CONF_COST_INCREMENT + ((CONF_COST_PLANET_TOURISM+$turns_played) * $inflation * 0.00001));
    $costs["tourism_increment"] = $increment;
    $costs["base_tourism"] = CONF_COST_PLANET_TOURISM;
		$costs["planet_tourism"] = $this->calcUnitCost($costs["base_tourism"], $planets_data["max_tourism"], $increment);


		$petro_planets = $planets_data["petro_planets"];
		if ($petro_planets == 0) $petro_planets = 1;

		$increment = 1 + (CONF_COST_INCREMENT + ((CONF_COST_PLANET_PETROLEUM+$turns_played) * $inflation * 0.00001));
    $costs["petro_increment"] = $increment;
    $costs["base_petro"] = CONF_COST_PLANET_PETROLEUM;
		$costs["planet_petro"] = $this->calcUnitCost($costs["base_petro"], $planets_data["max_petro"], $increment);


		$antipollu_planets = $planets_data["antipollu_planets"];
		if ($antipollu_planets == 0) $antipollu_planets = 1;

		$increment = 1 + (CONF_COST_INCREMENT + ((CONF_COST_PLANET_ANTIPOLLU+$turns_played) * $inflation * 0.00001));
    $costs["antipollu_increment"] = $increment;
    $costs["base_antipollu"] = CONF_COST_PLANET_ANTIPOLLU;
		$costs["planet_antipollu"] = $this->calcUnitCost($costs["base_antipollu"], $planets_data["max_antipollu"], $increment);

		return $costs;

	}

	///////////////////////////////////////////////////////////////////////
	//
	///////////////////////////////////////////////////////////////////////
	function calcTotalCost($base, $instock,$qty, $increment) {

		  $first = $this->calcUnitCost($base,$instock,$increment);
		  $last = $this->calcUnitCost($base,$instock+$qty,$increment);
			
			$price = ($qty*($first+$last))/2;		  
		  
			return $price;
	}

	///////////////////////////////////////////////////////////////////////
	//
	///////////////////////////////////////////////////////////////////////
	function calcUnitCost($base, $pos, $increment) {


		$price = floor($base + (($pos -1) * $increment));
  		if ($price == 0) $price = 1;

	  return $price;
	
	}



	///////////////////////////////////////////////////////////////////////
	//
	///////////////////////////////////////////////////////////////////////
	function getMaxQty($cash, $instock, $baseprice, $increment) {

      $q = 0;
      $it = 0;
      $timeout = 1000;
      $slice = ceil($cash / $baseprice);

      for ($i=0;$i<10;$i++) {

        $timeout = 1000;
        $target = pow(10,9-$i);
        $level = $target;

        while(true) {
          if ($timeout-- == 0) {
            break;
          }

          $q+= $level;

          $it++;
          $total = $this->calcTotalCost($baseprice, $instock, $q, $increment);
          if ($total > $cash) { 
  
            $q -= $level;
            if ($level == $target) {
              break;
            } else {
              $level -= $target;
             }

          }

        }


      }

    return $q;

	}

	///////////////////////////////////////////////////////////////////////
	//
	///////////////////////////////////////////////////////////////////////
	function getUnitsPrices($army_data,$empire_data,$turns_played,$inflation) {

		$costs = array();
		$convoy_soldiers = 0;
		$convoy_fighters = 0;
		$convoy_lightcruisers = 0;
		$convoy_heavycruisers = 0;
		$convoy_carriers = 0;

		$rs = $this->DB->Execute("SELECT * FROM game".$this->game_id."_tb_armyconvoy WHERE empire_from='".$empire_data["id"]."'");
		if (!$rs) trigger_error($this->DB->ErrorMsg());
		while(!$rs->EOF)
		{
			$convoy_soldiers += $rs->fields["convoy_soldiers"];
			$convoy_fighters += $rs->fields["convoy_fighters"];
			$convoy_lightcruisers += $rs->fields["convoy_lightcruisers"];
			$convoy_heavycruisers += $rs->fields["convoy_heavycruisers"];
			$convoy_carriers += $rs->fields["carriers"];
			$rs->MoveNext();
		}


  
	  $increment = 1 + (CONF_COST_INCREMENT + ((CONF_COST_SOLDIER+$turns_played) * $inflation * 0.00001));
    $costs["increment_soldiers"] = $increment;
  	$costs["base_soldiers"] = CONF_COST_SOLDIER;
		$total = $army_data["soldiers"] + $convoy_soldiers;
		$costs["buy_soldiers"] = $this->calcUnitCost($costs["base_soldiers"],$total, $increment);
		$costs["sell_soldiers"] = floor($costs["base_soldiers"] / CONF_COST_SELLRATIO);

			
	  $increment = 1 + (CONF_COST_INCREMENT + ((CONF_COST_FIGHTER+$turns_played) * $inflation * 0.00001));
    $costs["increment_fighters"] = $increment;
		$costs["base_fighters"] = CONF_COST_FIGHTER;
		$total = $army_data["fighters"] + $convoy_fighters;
		$costs["buy_fighters"] = $this->calcUnitCost($costs["base_fighters"], $total, $increment);
 	  $costs["sell_fighters"] = floor($costs["base_fighters"] / CONF_COST_SELLRATIO);
	
	  $increment = 1 + (CONF_COST_INCREMENT + ((CONF_COST_STATION+$turns_played) * $inflation * 0.00001));
    $costs["increment_stations"] = $increment;
		$costs["base_stations"] = CONF_COST_STATION;
		$costs["buy_stations"] = $this->calcUnitCost($costs["base_stations"], $army_data["stations"], $increment);
		$costs["sell_stations"] = floor($costs["base_stations"] / CONF_COST_SELLRATIO);

	  $increment = 1 + (CONF_COST_INCREMENT + ((CONF_COST_COVERT+$turns_played) * $inflation * 0.00001));
    $costs["increment_covertagents"] = $increment;
		$costs["base_covertagents"] = CONF_COST_COVERT;
		$costs["buy_covertagents"] = $this->calcUnitCost($costs["base_covertagents"], $army_data["covertagents"], $increment);
		$costs["sell_covertagents"] = floor($costs["base_covertagents"] / CONF_COST_SELLRATIO);

	  $increment = 1 + (CONF_COST_INCREMENT + ((CONF_COST_HEAVYCRUISER+$turns_played) * $inflation * 0.00001));
    $costs["increment_heavycruisers"] = $increment;
		$costs["base_heavycruisers"] = CONF_COST_HEAVYCRUISER;
		$total = $army_data["heavycruisers"] + $convoy_heavycruisers;
		$costs["buy_heavycruisers"] = $this->calcUnitCost($costs["base_heavycruisers"], $total, $increment);
		$costs["sell_heavycruisers"] = floor($costs["base_heavycruisers"] / CONF_COST_SELLRATIO);

		$costs["sell_lightcruisers"] = round(((CONF_COST_HEAVYCRUISER / 4) + $turns_played) + ((CONF_COST_HEAVYCRUISER / 4) * $empire_data["inflation"] * 0.005));

	  $increment = 1 + (CONF_COST_INCREMENT + ((CONF_COST_CARRIER+$turns_played) * $inflation * 0.00001));
    $costs["increment_carriers"] = $increment;
		$costs["base_carriers"] = CONF_COST_CARRIER;
		$total = $army_data["carriers"] + $convoy_carriers;
		$costs["buy_carriers"] = $this->calcUnitCost($costs["base_carriers"], $total, $increment);
		$costs["sell_carriers"] = floor($costs["base_carriers"] / CONF_COST_SELLRATIO);
	
		return $costs;
		
	}

}
?>
