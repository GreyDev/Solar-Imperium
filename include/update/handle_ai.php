<?php

// Toughest part of all my entire code :)
//
// The AI so far will try to growth by buying the good amount of planets.
// After each turns the AI will (maybe):
// - try to attack a pirate OR
// - Try a covert operation OR
// - Try a invasion or guerilla attack against another empire
// - Do nothing
//
// SO FAR THE AI WILL NOT INVEST IN BANKS, IN SOME CASES I MIGHT NEED
// TO CHEAT WITH RESOURCES.




function HandleAITurns($game_id)
{



    require_once ("../include/game/newturn/pirateraid.php");
    require_once ("../include/game/newturn/researchgrowth.php");
    require_once ("../include/game/newturn/marketgrowth.php");
    require_once ("../include/game/newturn/foodgrowth.php");
    require_once ("../include/game/newturn/oregrowth.php");
    require_once ("../include/game/newturn/petroleumgrowth.php");
    require_once ("../include/game/newturn/moneygrowth.php");
    require_once ("../include/game/newturn/military_production.php");
    require_once ("../include/game/newturn/populationgrowth.php");
    require_once ("../include/game/newturn/randomevent.php");
    require_once ("../include/game/newturn/civilstatus.php");
    require_once ("../include/game/newturn/lottery.php");
    require_once ("../include/game/newturn/blackmarket.php");
    require_once("../include/update/victory_condition.php");
    require_once ("../include/game/functions/covert.php");


    global $DB,$GAME;

    $timeStart = time(NULL);
    while(true) {

        $timeNow = time(NULL);
        if ($timeNow - $timeStart > 1) break;

        $rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_empire WHERE active < 2 AND turns_left > 0 AND player_id = -1");
        if ($rs->EOF) break;

        while(!$rs->EOF) {

            $timeNow = time(NULL);
            if ($timeNow - $timeStart > 1) break;

            $empire = new Empire($DB,$GAME["template"],$GAME["gameplay_costs"]);
            $empire->Load($rs->fields["id"]);


            $output = $empire->checkForEnoughCredits();
            if ($output != "") trace_action($game_id, $rs->fields["id"],$output);
            $output = $empire->checkForEnoughFood();
            if ($output != "") trace_action($game_id, $rs->fields["id"],$output);
            $output = $empire->checkForEnoughOre();
            if ($output != "") trace_action($game_id, $rs->fields["id"],$output);
            $output = $empire->checkForEnoughPetroleum();
            if ($output != "") trace_action($game_id, $rs->fields["id"],$output);


            if ($empire->data["active"] != 2) // already collapsed
            if (!$empire->checkForEnoughPopulation()) {
                trace_action($game_id, $rs->fields["id"], "Collapsed, not enough population!");
                $empire->collapse();
                $empire->updateNetworth();
                $empire->save();

            } else {

                $empire->updateNetworth();
                $empire->save();

            }

            /* Updating turns count */

            $empire->data["turns_left"]--;

            if ($empire->data["protection_turns_left"] > 0)
            $empire->data["protection_turns_left"]--;

            $empire->data["turns_played"]++;


            /* Updating covert points */

            $empire->army->data["covert_points"] += CONF_COVERTPOINTS_PER_TURN;
            if ($empire->army->data["covert_points"] > CONF_MAX_COVERTPOINTS)
            $empire->army->data["covert_points"] = CONF_MAX_COVERTPOINTS;

            /* Reset specific values */
            $empire->data["planets_bought"] = 0;
            $empire->data["already_attacked"] = 0;
            $empire->data["last_turn_date"] = time(NULL);
            $empire->data["food_traded"] = 0;
            $empire->data["ore_traded"] = 0;
            $empire->data["petroleum_traded"] = 0;


            $evt = new EventCreator($DB);
            $evt->type = CONF_EVENT_NEWTURN;
            $evt->from = -1;
            $evt->seen = 1;
            $evt->to = $empire->data["id"];
            $evt->params = array("turns_played"=>$empire->data["turns_played"]);
            $evt->send();


            /* Army effectiveness */
            if ($empire->army->data["effectiveness"] != 100)
            if ($empire->army->data["effectiveness"] < 100)
            {
                $empire->army->data["effectiveness"] += CONF_EFFECTIVENESS_GROWTH_PER_TURN;
                if ($empire->army->data["effectiveness"] > 100) $empire->army->data["effectiveness"] = 100;
            } else {
                $empire->army->data["effectiveness"] -= CONF_EFFECTIVENESS_GROWTH_PER_TURN;
                if ($empire->army->data["effectiveness"] < 100) $empire->army->data["effectiveness"] = 100;
            }


            NewTurn_HandlePirateRaid($game_id, $empire);
            NewTurn_HandleResearchGrowth($game_id, $empire);
            NewTurn_HandleMarketGrowth($game_id, $empire);
            NewTurn_HandleMilitaryProduction($game_id, $empire);
            NewTurn_HandlePopulationGrowth($game_id, $empire);
            NewTurn_HandleFoodGrowth($game_id, $empire);
            NewTurn_HandleOreGrowth($game_id, $empire);
            NewTurn_HandlePetroleumGrowth($game_id, $empire);
            NewTurn_HandleMoneyGrowth($game_id, $empire);
            NewTurn_PickRandomEvent($game_id, $empire);
            NewTurn_HandleCivilStatus($game_id, $empire);
            NewTurn_HandleLotteryPayout($game_id, $empire);
            NewTurn_HandleBlackMarket($game_id, $empire);


            /* Updating empire inflation */
            $empire->data["inflation"] += CONF_COST_INFLATION;


            // UPDATING production
            $production_food_short = $empire->production->data["food_short"];
            $production_food_long = $empire->production->data["food_long"];
            $production_ore_short = $empire->production->data["ore_short"];
            $production_ore_long = $empire->production->data["ore_long"];
            $production_tourism_short = $empire->production->data["tourism_short"];
            $production_tourism_long = $empire->production->data["tourism_long"];
            $production_supply_short = $empire->production->data["supply_short"];
            $production_supply_long = $empire->production->data["supply_long"];
            $production_edu_short = $empire->production->data["edu_short"];
            $production_edu_long = $empire->production->data["edu_long"];
            $production_research_short = $empire->production->data["research_short"];
            $production_research_long = $empire->production->data["research_long"];
            $production_urban_short = $empire->production->data["urban_short"];
            $production_urban_long = $empire->production->data["urban_long"];
            $production_petro_short = $empire->production->data["petro_short"];
            $production_petro_long = $empire->production->data["petro_long"];
            $production_antipollu_short = $empire->production->data["antipollu_short"];
            $production_antipollu_long = $empire->production->data["antipollu_long"];

            $production_food = ($production_food_short - $production_food_long)/10;
            $production_ore = ($production_ore_short - $production_ore_long)/10;
            $production_tourism = ($production_tourism_short - $production_tourism_long)/10;
            $production_supply = ($production_supply_short - $production_supply_long)/10;
            $production_edu = ($production_edu_short - $production_edu_long)/10;
            $production_research = ($production_research_short - $production_research_long)/10;
            $production_urban = ($production_urban_short - $production_urban_long)/10;
            $production_petro = ($production_petro_short - $production_petro_long)/10;
            $production_antipollu = ($production_antipollu_short - $production_antipollu_long)/10;

            $empire->production->data["food_short"] -= $production_food;
            $empire->production->data["ore_short"] -= $production_ore;
            $empire->production->data["tourism_short"] -= $production_tourism;
            $empire->production->data["supply_short"] -= $production_supply;
            $empire->production->data["edu_short"] -= $production_edu;
            $empire->production->data["research_short"] -= $production_research;
            $empire->production->data["urban_short"] -= $production_urban;
            $empire->production->data["petro_short"] -= $production_petro;
            $empire->production->data["antipollu_short"] -= $production_antipollu;


            $evt = new EventCreator($DB);
            $evt->type = CONF_EVENT_TURNCOMPLETED;
            $evt->from = -1;
            $evt->seen = 1;
            $evt->to = $empire->data["id"];
            $evt->params = array("turns_played"=>$empire->data["turns_played"]);
            $evt->send();

            $game_data = $DB->Execute("SELECT * FROM system_tb_games WHERE id=".$game_id);
            $game_data = $game_data->fields;

            CheckVictoryCondition($game_data["id"],$game_data["victory_condition"],$game_data["name"],$game_data["lifetime"]);

            $msg= "----- TURN COMPLETED: (pop=".number_format($empire->data["population"]).
                    ",cr=".number_format($empire->data["credits"]).
                    ",food=".number_format($empire->data["food"]).
                    ",ore=".number_format($empire->data["ore"]).
                    ",petro=".number_format($empire->data["petroleum"]).
                    ",networth=".number_format($empire->data["networth"]).
                    ") -------";
            trace_action($game_id, $empire->data["id"], $msg);

            // Time to do something, buy planets?
            //
            // - BUY ANTIPOLLU FIRST IF NEEDED
            //
            $pollution = $empire->calcPollution();
            $antipollution = $empire->calcAntiPollution();
            $pratio = $pollution / $antipollution;

            if ($pratio > 0.3) {
                $planets_prices = $GAME["gameplay_costs"]->getPlanetsPrices($empire->planets->data,$empire->data["turns_played"],$empire->data["inflation"]);
                // Need to buy some anti-pollution planets! (Invest 50% of your money)
                $max  = floor($GAME["gameplay_costs"]->getMaxQty(intval($empire->data["credits"]/2),$empire->planets->data["antipollu_planets"],$planets_prices["base_antipollu"],$planets_prices["antipollu_increment"]));

                if (($max > 0) && (($empire->planets->GetCount() + $max) <= CONF_MAX_PLANET_BUY))  {
                    trace_action($game_id, $empire->data["id"], T_("Bought $max anti-pollution planets to recover from pollution level: $pratio"));
                    $empire->planets->data["antipollu_planets"] += $max;
                    $empire->planets->data["max_antipollu"] = $empire->planets->data["antipollu_planets"];
                    $total_cost = floor($GAME["gameplay_costs"]->calcTotalCost($planets_prices["base_antipollu"],
                            $empire->planets->data["antipollu_planets"],$max, $planets_prices["antipollu_increment"]));
                    $empire->data["credits"] -= $total_cost;

                }

            }

            // - BUY GOV PLANETS IF TOO MUCH COVERT AGENTS
            if ($empire->army->data["covertagents"] > ($empire->planets->data["gov_planets"] * CONF_COVERTAGENTS_PER_GOVPLANET)) {
                $planets_prices = $GAME["gameplay_costs"]->getPlanetsPrices($empire->planets->data,$empire->data["turns_played"],$empire->data["inflation"]);
                $planets = 1 + (($empire->army->data["covertagents"] - ($empire->planets->data["gov_planets"] * CONF_COVERTAGENTS_PER_GOVPLANET)) / CONF_COVERTAGENTS_PER_GOVPLANET);

                $total_cost = floor($GAME["gameplay_costs"]->calcTotalCost($planets_prices["base_gov"],
                        $empire->planets->data["gov_planets"],$planets, $planets_prices["gov_increment"]));

                if (($total_cost <= $empire->data["credits"]) && (($empire->planets->GetCount() + $planets) <= CONF_MAX_PLANET_BUY)) {
                    trace_action($game_id, $empire->data["id"], T_("Bought $planets anti-pollution planets to recover from pollution level: $pratio"));
                    $empire->data["credits"] -= $total_cost;
                    $empire->planets->data["gov_planets"] += $planets;
                    $empire->planets->data["max_gov"] = $empire->planets->data["gov_planets"];
                }
            }


            //
            // - BUY FOOD / ORE / TOURISM / PETROLEUM / SUPPLY / RESEARCH / EDU
            $planet_types = array(
                "food","food",
                "ore","ore","ore",
                "tourism","tourism","tourism",
                "petro","petro",
                "supply",
                "research",
                "edu"
            );
            $current = $planet_types[rand(0,count($planet_types)-1)];
            $planets_prices = $GAME["gameplay_costs"]->getPlanetsPrices($empire->planets->data,$empire->data["turns_played"],$empire->data["inflation"]);
            $max = 0;
            if ($empire->data["protection_turns_left"] > 0)
                $max  = $GAME["gameplay_costs"]->getMaxQty(intval($empire->data["credits"]/10),$empire->planets->data[$current."_planets"],$planets_prices["base_".$current],$planets_prices[$current."_increment"]);
            else
                $max  = $GAME["gameplay_costs"]->getMaxQty(intval($empire->data["credits"]/5),$empire->planets->data[$current."_planets"],$planets_prices["base_".$current],$planets_prices[$current."_increment"]);

            if (($max > 0) && (($empire->planets->GetCount() + $max) <= CONF_MAX_PLANET_BUY))  {
                trace_action($game_id, $empire->data["id"], T_("Bought $max $current planets (Random)"));
                $empire->planets->data[$current . "_planets"] += $max;
                $empire->planets->data["max_".$current] = $empire->planets->data[$current . "_planets"];
                $total_cost = floor($GAME["gameplay_costs"]->calcTotalCost($planets_prices["base_".$current],
                        $empire->planets->data[$current."_planets"],$max, $planets_prices[$current."_increment"]));
                $empire->data["credits"] -= $total_cost;
            }



            //
            // Time to buy military units?
            //
            $units_prices = $GAME["gameplay_costs"]->getUnitsPrices($empire->army->data,$empire->data,$empire->data["turns_played"],$empire->data["inflation"]);
            $unit_types = array(
                "soldiers","soldiers","soldiers",
                "fighters","fighters",
                "stations","stations","stations",
                "covertagents",
                "heavycruisers"
            );


            $current = $unit_types[rand(0,count($unit_types)-1)];
            $max = $GAME["gameplay_costs"]->getMaxQty(
                $empire->data["credits"]/4,
                $empire->army->data[$current],
                $units_prices["base_".$current],
                $units_prices["increment_".$current]);

            if ($max > 0) {

                $credits = $GAME["gameplay_costs"]->calcTotalCost(
                    $units_prices["base_".$current],
                    $empire->army->data[$current],
                    $max,
                    $units_prices["increment_".$current]);

                $const ="CONF_POP_".strtoupper($current);
                $const = str_replace("COVERTAGENT","COVERT",$const);
                if ($const[strlen($const)-1] == "S") $const = substr($const,0,strlen($const)-1);
                $pop = ceil(constant($const) * $max);

                $abort = false;
                if ($pop > ($empire->data["population"]-5000)) $abort = true;

                if (!$abort) {
                    $empire->data["credits"] -=$credits;
                    $empire->data["population"] -=$pop;
                    $empire->army->data[$current] += $max;

                    trace_action($game_id, $empire->data["id"], T_("Bought $max $current (Pop cost: $pop)"));
                }

            }

            if ($empire->data["protection_turns_left"] == 0) {

                // Covert ops!
                if ($empire->army->data["covertagents"] >= 1000) { // at least 1k
                    $r = rand(0,10);
                    if ($r == 5) {
                        // Launch an attack
                        // Dont use the covert points
                        $op_types = array(1,2,3,4,6,7);
                        $operation = rand(0,count($op_types)-1);
                        $target = $DB->Execute("SELECT * FROM game".$game_id."_tb_empire WHERE active < 2 AND protection_turns_left = 0 AND player_id > -1 ORDER BY RAND() LIMIT 1");
                        PerformCovertOperation($game_id, $target->fields["id"], $operation,$empire);
                    }
                }

                // If outside protection, try to INVADE, GUERILLA , PIRATE OR NOTHING
//                $r = rand(0,20);
//
//                // Invade
//                if ($r == 1) {
//                    // #TODO
//                }
//
//                // Guerilla
//                if ($r == 2) {
//                    // #TODO
//                }
//
//                // Pirate
//                if ($r == 3) {
//                    //
//                }
                $timeNow2 = time(NULL);

            }
            
            
            // #FIXME TECHNOLOGY RACE

  
//            $timeElapsed = $timeNow2 - $timeNow;

            $rs->MoveNext();
        }

            $empire->updateStats();
            $empire->save();
            $DB->CompleteTrans();

    }


}

?>
