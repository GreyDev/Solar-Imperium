<?php
// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //


define("CONF_BLACKMARKET_MINIMUM_NETWORTH", 1000000);
define("CONF_BLACKMARKET_COVERT_RATIO_PERCENT", 400);
define("CONF_BLACKMARKET_RANDOMNESS", 10);
define("CONF_BLACKMARKET_PRICE_LIGHTCRUISERS", 25000);
define("CONF_BLACKMARKET_PRICE_NUKES", 500000000);
define("CONF_BLACKMARKET_PRICE_TELEPORT", 20000000);
define("CONF_BLACKMARKET_PRICE_EXTRAPROTECTION", 100000000);

define("CONF_TRADE_TAXRATE", 30);
define("CONF_TRADE_MAXCONVOYS", 3);

define("CONF_MARKET_GROWTH", 1000);
define("CONF_MARKET_UPDATE_DELAY",(60*60));
define("CONF_MARKET_RATIO_MIN",0.4);
define("CONF_MARKET_RATIO_MAX",1.6);

define("CONF_RANDOMEVENT_PERCENTAGE", 10);

define("CONF_TRADETAX_MONEY", 0.01);
define("CONF_TRADETAX_FOOD", 0.1);
define("CONF_TRADETAX_GENERAL", 1);
define("CONF_TRADETAX_COVERT", 1);
define("CONF_TRADETAX_SOLDIER", 1);
define("CONF_TRADETAX_FIGHTER", 2);
define("CONF_TRADETAX_LIGHTCRUISER", 20);
define("CONF_TRADETAX_HEAVYCRUISER", 30);

$units_info = array ();
$units_info["soldiers_0"] = array (
	"guerilla" => 1,
	"invasion_ground" => 1,
	"invasion_orbital" => 0,
	"invasion_space" => 0,
	"pirate_bust" => 0.5
);
$units_info["soldiers_1"] = array (
	"guerilla" => 1.5,
	"invasion_ground" => 1,
	"invasion_orbital" => 0,
	"invasion_space" => 0,
	"pirate_bust" => 1
);
$units_info["soldiers_2"] = array (
	"guerilla" => 0.5,
	"invasion_ground" => 2,
	"invasion_orbital" => 1,
	"invasion_space" => 0,
	"pirate_bust" => 2
);

$units_info["fighters_0"] = array (
	"guerilla" => 0,
	"invasion_ground" => 0.5,
	"invasion_orbital" => 1,
	"invasion_space" => 0,
	"pirate_bust" => 0.5
);
$units_info["fighters_1"] = array (
	"guerilla" => 0,
	"invasion_ground" => 0.5,
	"invasion_orbital" => 2,
	"invasion_space" => 1,
	"pirate_bust" => 1
);
$units_info["fighters_2"] = array (
	"guerilla" => 0,
	"invasion_ground" => 0.5,
	"invasion_orbital" => 3,
	"invasion_space" => 1,
	"pirate_bust" => 2
);

$units_info["stations_0"] = array (
	"guerilla" => 0,
	"invasion_ground" => 1,
	"invasion_orbital" => 1,
	"invasion_space" => 0,
	"pirate_bust" => 0
);
$units_info["stations_1"] = array (
	"guerilla" => 0,
	"invasion_ground" => 1,
	"invasion_orbital" => 2,
	"invasion_space" => 0,
	"pirate_bust" => 0
);
$units_info["stations_2"] = array (
	"guerilla" => 0,
	"invasion_ground" => 2,
	"invasion_orbital" => 2,
	"invasion_space" => 1,
	"pirate_bust" => 0
);

$units_info["lightcruisers_0"] = array (
	"guerilla" => 0,
	"invasion_ground" => 0,
	"invasion_orbital" => 1,
	"invasion_space" => 1,
	"pirate_bust" => 0.5
);
$units_info["lightcruisers_1"] = array (
	"guerilla" => 0,
	"invasion_ground" => 0.1,
	"invasion_orbital" => 2,
	"invasion_space" => 1,
	"pirate_bust" => 1
);
$units_info["lightcruisers_2"] = array (
	"guerilla" => 0,
	"invasion_ground" => 0.2,
	"invasion_orbital" => 3,
	"invasion_space" => 1,
	"pirate_bust" => 2
);

$units_info["heavycruisers_0"] = array (
	"guerilla" => 0,
	"invasion_ground" => 0,
	"invasion_orbital" => 1,
	"invasion_space" => 1,
	"pirate_bust" => 0.5
);
$units_info["heavycruisers_1"] = array (
	"guerilla" => 0,
	"invasion_ground" => 0,
	"invasion_orbital" => 1,
	"invasion_space" => 2,
	"pirate_bust" => 1
);
$units_info["heavycruisers_2"] = array (
	"guerilla" => 0,
	"invasion_ground" => 0.5,
	"invasion_orbital" => 1,
	"invasion_space" => 3,
	"pirate_bust" => 2
);

$units_info["carriers_0"] = array (
	"toughness" => 1,
	"speed" => 1,
	"cargo_hold" => 1
);
$units_info["carriers_1"] = array (
	"toughness" => 2,
	"speed" => 2,
	"cargo_hold" => 0.5
);
$units_info["carriers_2"] = array (
	"toughness" => 4,
	"speed" => 4,
	"cargo_hold" => 0.25
);


// population growth

define("CONF_POP_DEAD", 0.01);
define("CONF_POP_BORN", 0.04);
define("CONF_POP_POLLUTION", 0.000002);
define("CONF_POP_URBAN", 0.015);
define("CONF_POP_OVERCROWD", 20000);
define("CONF_POP_OVERCROWD_GETOUT", 0.3);
define("CONF_POP_EDUCATION", 50);
define("CONF_POP_TAXRATE", 0.0020);
define("CONF_POP_TAXRATE_GETOUT", 0.07);
define("CONF_POP_CIVILSTATUS", 0.05);
define("CONF_PLANETS_CIVILSTATUS", 0.2);
define("CONF_PETRO_POLLUTION", 0.20);
define("CONF_ANTIPOLLUTION", 0.5);

define("CONF_INCOME_TOURISM", 8000);
define("CONF_INCOME_CIVILSTATUS", 4);
define("CONF_INCOME_POPTAX", 1);
define("CONF_INCOME_URBANTAX", 1000);

define("CONF_MAINTENANCE_CREDITS_PLANETS", 168);
define("CONF_MAINTENANCE_CREDITS_SOLDIER", 24);
define("CONF_MAINTENANCE_CREDITS_FIGHTER", 72);
define("CONF_MAINTENANCE_CREDITS_STATION", 66);
define("CONF_MAINTENANCE_CREDITS_LIGHTCRUISER", 72);
define("CONF_MAINTENANCE_CREDITS_HEAVYCRUISER", 120);
define("CONF_MAINTENANCE_CREDITS_CARRIER", 64);

define("CONF_MAINTENANCE_FOOD_SOLDIER", 0.16);
define("CONF_MAINTENANCE_FOOD_FIGHTER", 0);
define("CONF_MAINTENANCE_FOOD_STATION", 0);
define("CONF_MAINTENANCE_FOOD_LIGHTCRUISER", 0);
define("CONF_MAINTENANCE_FOOD_HEAVYCRUISER", 0);
define("CONF_MAINTENANCE_FOOD_CARRIER", 0);

define("CONF_MAINTENANCE_ORE_SOLDIER", 0);
define("CONF_MAINTENANCE_ORE_FIGHTER", 0.8);
define("CONF_MAINTENANCE_ORE_STATION", 2.2);
define("CONF_MAINTENANCE_ORE_LIGHTCRUISER",1.4);
define("CONF_MAINTENANCE_ORE_HEAVYCRUISER", 2.4);
define("CONF_MAINTENANCE_ORE_CARRIER", 1.4);

define("CONF_MAINTENANCE_PETROLEUM_SOLDIER", 0);
define("CONF_MAINTENANCE_PETROLEUM_FIGHTER", 0.8);
define("CONF_MAINTENANCE_PETROLEUM_STATION", 0);
define("CONF_MAINTENANCE_PETROLEUM_LIGHTCRUISER", 1.6);
define("CONF_MAINTENANCE_PETROLEUM_HEAVYCRUISER", 2.8);
define("CONF_MAINTENANCE_PETROLEUM_CARRIER", 1.6);


define("CONF_FOOD_PRODUCTION", 160);
define("CONF_FOOD_POPULATION_EATING", 0.05);
define("CONF_ORE_PRODUCTION", 112);
define("CONF_PETROLEUM_PRODUCTION", 92);


define("CONF_RESEARCH_LIGHTCRUISER", 1);

define("CONF_MAX_PLANET_BUY", 5000000);


// SOLAR BANK

define("CONF_SOLARBANK_LOAN_BASE_RATE",10);
define("CONF_SOLARBANK_LOAN_LOTTERY", 10);
define("CONF_SOLARBANK_LOAN_MAXTURNS", 20);
define("CONF_SOLARBANK_LOAN_BASE_AMOUNT", 199999);
define("CONF_SOLARBANK_LOAN_MAXLOANS", 3);
define("CONF_SOLARBANK_BOND_BASE_RATE", 1);
define("CONF_SOLARBANK_BOND_MAXTURNS", 100);
define("CONF_SOLARBANK_BOND_MAXBONDS", 10);
define("CONF_SOLARBANK_LOTTERY", 10);

// LOTTERY
define("CONF_LOTTERY_TICKETPRICE", 10000);
define("CONF_LOTTERY_TICKETRATIO", 25);
define("CONF_LOTTERY_MAXTICKETS", 100);

// COST
define("CONF_COST_SOLDIER", 300);
define("CONF_COST_FIGHTER", 420);
define("CONF_COST_STATION", 600);
define("CONF_COST_COVERT", 4090);
define("CONF_COST_HEAVYCRUISER", 1900);
define("CONF_COST_CARRIER", 1430);

define("CONF_POP_SOLDIER", 0.2);
define("CONF_POP_FIGHTER", 0.4);
define("CONF_POP_STATION", 0.5);
define("CONF_POP_COVERT", 1);
define("CONF_POP_HEAVYCRUISER", 2);
define("CONF_POP_CARRIER", 3);


define("CONF_MILITARY_PRODUCTION_CREDITS", 4000);
define("CONF_MILITARY_PRODUCTION_SOLDIER", floor((CONF_MILITARY_PRODUCTION_CREDITS*2) / CONF_COST_SOLDIER));
define("CONF_MILITARY_PRODUCTION_FIGHTER", floor((CONF_MILITARY_PRODUCTION_CREDITS*2) / CONF_COST_FIGHTER));
define("CONF_MILITARY_PRODUCTION_STATION", floor((CONF_MILITARY_PRODUCTION_CREDITS*2) / CONF_COST_STATION));
define("CONF_MILITARY_PRODUCTION_HEAVYCRUISER", floor((CONF_MILITARY_PRODUCTION_CREDITS*2) / CONF_COST_HEAVYCRUISER));
define("CONF_MILITARY_PRODUCTION_CARRIER", floor((CONF_MILITARY_PRODUCTION_CREDITS*2) / CONF_COST_CARRIER));
define("CONF_MILITARY_PRODUCTION_COVERT", floor((CONF_MILITARY_PRODUCTION_CREDITS*2) / CONF_COST_COVERT));



define("CONF_COST_INFLATION", 0.000004);
define("CONF_COST_PLANET_FOOD", 8000);
define("CONF_COST_PLANET_ORE", 6000);
define("CONF_COST_PLANET_TOURISM", 8000);
define("CONF_COST_PLANET_SUPPLY", 11500);
define("CONF_COST_PLANET_GOV", 7500);
define("CONF_COST_PLANET_EDU", 8000);
define("CONF_COST_PLANET_RESEARCH", 23000);
define("CONF_COST_PLANET_URBAN", 8000);
define("CONF_COST_PLANET_PETROLEUM", 11500);
define("CONF_COST_PLANET_ANTIPOLLU", 10500);
define("CONF_COST_SELLRATIO", 1.1);
define("CONF_COST_FOOD", 80);
define("CONF_COST_ORE", 120);
define("CONF_COST_PETROLEUM", 300);
define("CONF_COST_RESEARCH",5);
define("CONF_COST_INCREMENT", 0.0001);

define("CONF_POPULATION_STARVING", 20);
define("CONF_SOLDIERS_STARVING", 10);
define("CONF_BANKRUPT_PLANETS", 10);
define("CONF_BANKRUPT_MILITARY", 10);

define("CONF_RESEARCH_POINTS_PER_PLANET", 800);

// carrier transportation

define("CONF_CARRIER_MONEY", 0.000005);
define("CONF_CARRIER_FOOD", 0.0005);
define("CONF_CARRIER_COVERT", 0.005);
define("CONF_CARRIER_SOLDIER", 0.005);
define("CONF_CARRIER_FIGHTER", 0.025);
define("CONF_CARRIER_LIGHTCRUISER", 0.05);
define("CONF_CARRIER_HEAVYCRUISER", 0.5);
define("CONF_TRADE_MAXCARRIERS", 500000);
define("CONF_TRADE_PIRATERAID", 50);

define("CONF_COVERTAGENTS_PER_GOVPLANET", 300);

define("CONF_TOO_MUCH_COVERTAGENTS_PERCENTAGE", 50);
define("CONF_TOO_MUCH_COVERTAGENTS_LOST_PERCENTAGE", 25);

define("CONF_COVERTOP_SENDSPY", 0);
define("CONF_COVERTOP_INSURGENTAID", 1);
define("CONF_COVERTOP_SUPPORTDISSENSION", 2);
define("CONF_COVERTOP_DEMORALIZETROOPS", 3);
define("CONF_COVERTOP_BOMBINGOPERATIONS", 4);
define("CONF_COVERTOP_RELATIONSSPYING", 5);
define("CONF_COVERTOP_TAKEHOSTAGES", 6);
define("CONF_COVERTOP_CARRIERSSABOTAGE", 7);
define("CONF_COVERTOP_COMMUNICATIONSSPYING", 8);
define("CONF_COVERTOP_SETUPCOUP", 9);
define("CONF_COVERTOP_PIRATESREPORT", 10);


define("CONF_COVERTPOINTS_PER_TURN", 5);

define("CONF_MAX_COVERTPOINTS", 50);


// BATTLE RELATED

// INVASION

define("CONF_INVASION_ATTACK_ROUNDS", 20); // orig: 35

define("CONF_INVASION_PLANETS_MINIMUM", "5"); // 5-15% base
define("CONF_INVASION_PLANETS_MAXIMUM", "15"); // 5-15% base

define("CONF_INVASION_EFFECTIVENESS_WON", 10);
define("CONF_INVASION_EFFECTIVENESS_LOST", 5);
define("CONF_PIRATE_EFFECTIVENESS_WON", 5);
define("CONF_INVASION_CASUALTIES_WON", 8);
define("CONF_INVASION_CASUALTIES_LOOSE", 10);
define("CONF_PIRATE_EFFECTIVENESS_LOST", 5);
define("CONF_EFFECTIVENESS_GROWTH_PER_TURN", 2);

define("CONF_INVASION_DEFENSE_BONUS", 1.3);
define("CONF_INVASION_CARRIERS_DAMAGE", 2);
define("CONF_INVASION_LIGHTCRUISER_PROTECTION_ROUNDS", 3);
define("CONF_INVASION_RANDOMNESS", 20);

// GUERILLA

define("CONF_GUERILLA_SOLDIER_DEFENSE", 1);
define("CONF_GUERILLA_SOLDIER_LOST", 8);
define("CONF_GUERILLA_ATTACK_ROUNDS", 10);

// PIRATE BATTLE

define("CONF_PIRATE_DEFENSE", 14);

define("CONF_NUCLEARWARFARE_BASE_DAMAGE", 40);
define("CONF_NUCLEARWARFARE_EXTRA_DAMAGE", 25);

// RESEARCH
define("CONF_RESEARCH_BASECOST", 3000000);


?>
