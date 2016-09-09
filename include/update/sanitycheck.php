<?php

function CheckGameSanity_NegativeValues($items,$table)
{
//    echo "Checking ".$table." ... ";
    global $DB;
    
    $query = "SELECT id,".$items." FROM ".$table;

    $rs = $DB->Execute($query); 
    if (!$rs) {
	print "DB ERROR: " .$DB->ErrorMsg() ."\r\n";
	die();
	return;
    }

    while(!$rs->EOF) {
        
        while(list($key,$value) = each($rs->fields)) {
            if (is_numeric($key)) continue;
            if ($key == "id") continue;
            
            if ($value < 0) {
  //              echo "\r\n*** Invalid value(".$key.") (negative) fixed***\r\n";
                $query = "UPDATE ".$table." SET ".$key."=0 WHERE id=".$rs->fields["id"];
                $DB->Execute($query);
                if (!$DB) print $DB->ErrorMsg();
            }
            
            if ($key == "effectiveness") {
                if ($value < 10) {
    //                echo "\r\n*** Invalid effectiveness (<10) fixed***\r\n";
                    $query = "UPDATE ".$table." SET ".$key."=10 WHERE id=".$rs->fields["id"];
                    $DB->Execute($query);
                    if (!$DB) print $DB->ErrorMsg();
                }

                if ($value > 150) {
      //              echo "\r\n*** Invalid effectiveness (>150) fixed***\r\n";
                    $query = "UPDATE ".$table." SET ".$key."=150 WHERE id=".$rs->fields["id"];
                    $DB->Execute($query);
                    if (!$DB) print $DB->ErrorMsg();
                }
            }
            
            
        }
        
        $rs->MoveNext();        
    }
    
//    echo "DONE\r\n";    
}


// The goal of this script is to patch common problems
// Like: negative values :)

function CheckGameSanity($game_id)
{
  //  echo "Checking game sanity ... \r\n";
    global $DB;
    
    CheckGameSanity_NegativeValues(
        "soldiers,fighters,stations,covertagents,covert_points,lightcruisers,heavycruisers,carriers,effectiveness",
        "game".$game_id."_tb_army"
    );

    CheckGameSanity_NegativeValues(
        "convoy_soldiers,convoy_fighters,convoy_lightcruisers,convoy_heavycruisers,carriers",
        "game".$game_id."_tb_armyconvoy"
    );

    CheckGameSanity_NegativeValues(
        "initial_credits,current_credits,total_turns,turns_left,rate",
        "game".$game_id."_tb_bond"
    );

    CheckGameSanity_NegativeValues(
        "networth,planets",
        "game".$game_id."_tb_coalition"
    );

    CheckGameSanity_NegativeValues(
        "turns_left,turns_played,protection_turns_left,credits,last_credits,population,food,ore,petroleum,networth,taxrate,inflation,lottery_tickets,planets_bought,food_rate,ore_rate,petroleum_rate,research_points,research_level,research_rate,blackmarket_cooldown",
        "game".$game_id."_tb_empire"
    );


    CheckGameSanity_NegativeValues(
        "gold_networth,silver_networth,bronze_networth",
        "game".$game_id."_tb_hall_of_fame"
    );
    
    CheckGameSanity_NegativeValues(
        "initial_credits,current_credits,total_turns,turns_left,rate",
        "game".$game_id."_tb_loan"
    );

    CheckGameSanity_NegativeValues(
        "food,food_ratio,ore,ore_ratio,petroleum,petroleum_ratio,food_buy,food_sell,ore_buy,ore_sell,petroleum_buy,petroleum_sell",
        "game".$game_id."_tb_market"
    );

    CheckGameSanity_NegativeValues(
        "networth,credits,food,research,covertagents,stations,soldiers,fighters,lightcruisers,heavycruisers,carriers,food_planets,ore_planets,tourism_planets,supply_planets,gov_planets,edu_planets,urban_planets,research_planets,petro_planets,antipollu_planets",
        "game".$game_id."_tb_pirate"
    );

    CheckGameSanity_NegativeValues(
        "food_planets,ore_planets,tourism_planets,supply_planets,gov_planets,edu_planets,research_planets,urban_planets,petro_planets,antipollu_planets,max_petro,max_tourism,max_ore,max_food,max_supply,max_gov,max_edu,max_research,max_urban,max_antipollu",
        "game".$game_id."_tb_planets"
    );


    CheckGameSanity_NegativeValues(
        "food_short,food_long,ore_short,ore_long,tourism_short,tourism_long,supply_short,supply_long,edu_short,edu_long,research_short,research_long,urban_short,urban_long,petro_short,petro_long,antipollu_short,antipollu_long",
        "game".$game_id."_tb_production"
    );

    CheckGameSanity_NegativeValues(
        "credits,food,networth,military,planets,population,pollution,turn",
        "game".$game_id."_tb_stats"
    );

    CheckGameSanity_NegativeValues(
        "rate_soldier,rate_fighter,rate_station,rate_heavycruiser,rate_carrier,rate_covert,rate_credits",
        "game".$game_id."_tb_supply"
    );

    CheckGameSanity_NegativeValues(
        "trade_money,trade_food,trade_covertagents,trade_soldiers,trade_fighters,trade_stations,trade_lightcruisers,trade_heavycruisers,carriers",
        "game".$game_id."_tb_tradeconvoy"
    );



}



?>