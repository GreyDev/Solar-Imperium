<?php

// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //



// SYSTEM DEFINITIONS

define("CONF_GAME_VERSION", "2.7.1");

// IG GAME SETTINGS

define("CONF_GAME_NAME", "{game_name}");

define("CONF_VICTORY_CONDITION_CLASSIC_GAME", {game_lifetime}); // 30 days
define("CONF_VICTORY_CONDITION_RESEARCH_RACE", {game_bool_research});

define("CONF_GAME_RESTART_DELAY", 0); // no delay
define("CONF_GAMETYPE_PREMIUM_ONLY", {game_bool_premiumonly});

define("CONF_MAXPLAYERS", {game_maxplayers});
define("CONF_TURNS_PER_DAY", {game_turnsperday});
define("CONF_MAX_SESSIONS", {game_maxslots});
define("CONF_MAXIMUM_COALITION_MEMBERS", 5);
define("CONF_TOPLIST_COUNT", 20);
define("CONF_PROTECTION_TURNS", {game_protection_turns}); // use 20


$CONF_RANDOM_EVENTS = array();
$CONF_RANDOM_EVENTS[] = array("name"=>T_("Major strike at the main food processing company, food production reduced."),"value"=>"production->food_short=-20");
$CONF_RANDOM_EVENTS[] = array("name"=>T_("Jovian flu kill dozens"),"value"=>"empire->population=-3%");
$CONF_RANDOM_EVENTS[] = array("name"=>T_("A new plutonium-based toothpaste prove to be highly toxic, population lost."),"value"=>"empire->population=-2%");
$CONF_RANDOM_EVENTS[] = array("name"=>T_("Unprotected sex was the major new trend this year, population lost."),"value"=>"empire->population=-1%");
$CONF_RANDOM_EVENTS[] = array("name"=>T_("Bungie without a rope was the major new trend this year, population lost."),"value"=>"empire->population=-1%");
$CONF_RANDOM_EVENTS[] = array("name"=>T_("A nasty bug was found in the teleportation system software, population lost"),"value"=>"empire->population=-1%");
$CONF_RANDOM_EVENTS[] = array("name"=>T_("A Bluurgozats Monster eat your food"),"value"=>"empire->food=-30%");
$CONF_RANDOM_EVENTS[] = array("name"=>T_("Your university has hired Dr.Brains"),"value"=>"production->edu_short=+50");
$CONF_RANDOM_EVENTS[] = array("name"=>T_("Your university has hired Dr.Disector"),"value"=>"production->edu_short=+25");
$CONF_RANDOM_EVENTS[] = array("name"=>T_("Your university has hired Dr.Doom"),"value"=>"production->edu_short=-25");
$CONF_RANDOM_EVENTS[] = array("name"=>T_("A new fort increases your supply production"),"value"=>"production->supply_short=+50");
$CONF_RANDOM_EVENTS[] = array("name"=>T_("A new fort increases your supply production"),"value"=>"production->supply_short=+25");
$CONF_RANDOM_EVENTS[] = array("name"=>T_("A new military factory increases your supply production"),"value"=>"production->supply_short=+25");
$CONF_RANDOM_EVENTS[] = array("name"=>T_("A new tourist attraction increases the popularity of your tourism planets"),"value"=>"production->tourism_short=+50");
$CONF_RANDOM_EVENTS[] = array("name"=>T_("New training facilities increases supply production"),"value"=>"production->supply_short=+25");
$CONF_RANDOM_EVENTS[] = array("name"=>T_("A new mine increases ore production"),"value"=>"production->ore_short=+25");
$CONF_RANDOM_EVENTS[] = array("name"=>T_("A new mine increases ore production"),"value"=>"production->ore_short=+50");


$CONF_CIVIL_STATUS = array();
$CONF_CIVIL_STATUS[0] = T_("Peaceful");
$CONF_CIVIL_STATUS[1] = T_("Mild Insurgencies");
$CONF_CIVIL_STATUS[2] = T_("Occasional Riots");
$CONF_CIVIL_STATUS[3] = T_("Violent Demonstrations");
$CONF_CIVIL_STATUS[4] = T_("Political Conflicts");
$CONF_CIVIL_STATUS[5] = T_("Internal Violence");
$CONF_CIVIL_STATUS[6] = T_("Revolutionary warfare");
$CONF_CIVIL_STATUS[7] = T_("Under Coup");

$CONF_PLANETS = array("food","ore","tourism","supply","gov","edu","research","urban","petro","antipollu");
$CONF_UNITS = array("covertagents","soldiers","fighters","stations","lightcruisers","heavycruisers","carriers");

$CONF_DIPLOMACY_TREATIES = array();
$CONF_DIPLOMACY_TREATIES[] = T_("Neutrality Treaty"); // 0
$CONF_DIPLOMACY_TREATIES[] = T_("Minor Alliance"); // 1
$CONF_DIPLOMACY_TREATIES[] = T_("Total Defense"); // 2 

$CONF_COVERT_OPERATIONS = array();
$CONF_COVERT_OPERATIONS[] = array("name"=>T_("Send Spy"),"cost_points"=>5,"cost_credits"=>3100,"ratio"=>1);
$CONF_COVERT_OPERATIONS[] = array("name"=>T_("Insurgent Aid"),"cost_points"=>15,"cost_credits"=>10000,"ratio"=>3);
$CONF_COVERT_OPERATIONS[] = array("name"=>T_("Support Dissension"),"cost_points"=>30,"cost_credits"=>25000,"ratio"=>2);
$CONF_COVERT_OPERATIONS[] = array("name"=>T_("Demoralize Troops"),"cost_points"=>15,"cost_credits"=>30000,"ratio"=>3);
$CONF_COVERT_OPERATIONS[] = array("name"=>T_("Bombing Operations"),"cost_points"=>20,"cost_credits"=>30000,"ratio"=>2);
$CONF_COVERT_OPERATIONS[] = array("name"=>T_("Relations Spying"),"cost_points"=>5,"cost_credits"=>30000,"ratio"=>1);
$CONF_COVERT_OPERATIONS[] = array("name"=>T_("Take Hostages"),"cost_points"=>20,"cost_credits"=>60000,"ratio"=>3);
$CONF_COVERT_OPERATIONS[] = array("name"=>T_("Carriers Sabotage"),"cost_points"=>20,"cost_credits"=>60000,"ratio"=>3);
$CONF_COVERT_OPERATIONS[] = array("name"=>T_("Communications Spying"),"cost_points"=>10,"cost_credits"=>30000,"ratio"=>2);
$CONF_COVERT_OPERATIONS[] = array("name"=>T_("Setup coup"),"cost_points"=>20,"cost_credits"=>30000,"ratio"=>2);
$CONF_COVERT_OPERATIONS[] = array("name"=>T_("Pirates report"),"cost_points"=>10,"cost_credits"=>5000,"ratio"=>1);


?>
