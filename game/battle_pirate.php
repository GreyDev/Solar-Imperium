<?php


// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //

define("LANGUAGE_DOMAIN","game");

require_once ("../include/game/init.php");
require_once ("../include/game/init_ingame.php");


if ($GAME["empire"]->data["already_attacked"] != 0) {
    $GAME["system"]->redirect("battle.php", array (
        "WARNING" => T_("Sorry, only one attack per turn!")
        ));
}

////////////////////////////////////////////////////////////////
// PIRATE ATTACK
////////////////////////////////////////////////////////////////
if (isset ($_POST["battle_pirate"])) {

    $pirate = $DB->Execute("SELECT * FROM game".$game_id."_tb_pirate WHERE id='" . intval($_POST["battle_pirate"])."'");
    if ($pirate->EOF)
    $GAME["system"]->redirect("battle.php", array (
            "WARNING" => T_("Invalid pirate ID!")
        ));

    $pirate = $pirate->fields;

    $soldiers = $_POST["pirate_soldiers"];
    if ($soldiers < 0) $soldiers = 0;

    $fighters = $_POST["pirate_fighters"];
    if ($fighters < 0) $fighters = 0;

    $lightcruisers = $_POST["pirate_lightcruisers"];
    if ($lightcruisers < 0) $lightcruisers = 0;

    $heavycruisers = $_POST["pirate_heavycruisers"];
    if ($heavycruisers < 0) $heavycruisers  =0;

    if ($soldiers > $GAME["empire"]->army->data["soldiers"])
    $GAME["system"]->redirect("battle.php", array (
            "WARNING" => T_("Invalid soldiers quantity!")
        ));

    if ($fighters > $GAME["empire"]->army->data["fighters"])
    $GAME["system"]->redirect("battle.php", array (
            "WARNING" => T_("Invalid fighters quantity!")
        ));

    if ($lightcruisers > $GAME["empire"]->army->data["lightcruisers"])
    $GAME["system"]->redirect("battle.php", array (
            "WARNING" => T_("Invalid light cruisers quantity!")
        ));

    if ($heavycruisers > $GAME["empire"]->army->data["heavycruisers"])
    $GAME["system"]->redirect("battle.php", array (
            "WARNING" => T_("Invalid heavy cruisers quantity!")
        ));

    $total = $soldiers + $fighters + $lightcruisers + $heavycruisers;
    if ($total == 0)
    $GAME["system"]->redirect("battle.php", array (
            "WARNING" => T_("No army was selected for this attack!")
        ));

    $result = "";

    $r = rand(0, 3);

    //	if ($r == 1) {
    if (1==2) {
        $result .= "<br/><b style=\"color:yellow\">*** " . T_("Pirate fled the attack") . " ***</b><br</br>\n";
        $evt = new EventCreator($DB);
        $evt->type = CONF_EVENT_PIRATEBUST;
        $evt->from = -1;
        $evt->to = $GAME["empire"]->data["id"];
        $evt->params = array (
            "result" => $result,
            "pirate_name" => $pirate["name"]
        );
        $evt->send();
        $GAME["empire"]->data["already_attacked"] = 1;
        $GAME["empire"]->save();

    } else {

        $result .= "<b>".T_("Attacking with")." </b><b style=\"color:#ffcaca\">" .
        $GAME["template"]->formatNumber($soldiers) . "</b><b> ".T_("soldiers").", </b><b style=\"color:#ffcaca\">" .
        $GAME["template"]->formatNumber($fighters) . "</b><b> ".T_("fighters").
        ", </b><b style=\"color:#ffcaca\">" . $GAME["template"]->formatNumber($lightcruisers) .
         "</b><b> ".T_("light cruisers").", </b><b style=\"color:#ffcaca\">" .
        $GAME["template"]->formatNumber($heavycruisers) . "</b><b> ".T_("heavy cruisers")."</b><br/><br/>\n";

        $attack_strength = floor(((
                    ($soldiers*$units_info["soldiers_".$GAME["empire"]->army->data["soldiers_level"]]["pirate_bust"]) +
                    ($fighters*$units_info["fighters_".$GAME["empire"]->army->data["fighters_level"]]["pirate_bust"]) +
                    ($lightcruisers*$units_info["lightcruisers_".$GAME["empire"]->army->data["lightcruisers_level"]]["pirate_bust"]) +
                    ($heavycruisers*$units_info["heavycruisers_".$GAME["empire"]->army->data["heavycruisers_level"]]["pirate_bust"])
                ) / 100) * $GAME["empire"]->army->data["effectiveness"]);
        $defense_strength = ($pirate["soldiers"] + $pirate["fighters"] + $pirate["lightcruisers"] + $pirate["heavycruisers"]) * CONF_PIRATE_DEFENSE;

        $damage = $attack_strength - $defense_strength;

        $lost_soldiers = 0;
        $lost_fighters = 0;
        $lost_lightcruisers = 0;
        $lost_heavycruisers = 0;
        $lost_pirate_soldiers = 0;
        $lost_pirate_fighters = 0;
        $lost_pirate_lightcruisers = 0;
        $lost_pirate_sheavycruisers = 0;

        if ($damage < 0) {


            // pirate casualties

            $lost_pirate_soldiers = $GAME["system"]->alterNumber(floor(($soldiers+($fighters/10)+($lightcruisers/20)+($heavycruisers/40)) / 40), 10);
            if ($lost_pirate_soldiers > $pirate["soldiers"]) $lost_pirate_soldiers = $pirate["soldiers"];
            $lost_pirate_fighters = $GAME["system"]->alterNumber(floor(($fighters+($soldiers/50)+($lightcruisers/10)+($heavycruisers/20)) / 40), 10);
            if ($lost_pirate_fighters > $pirate["fighters"]) $lost_pirate_fighters = $pirate["fighters"];
            $lost_pirate_lightcruisers = $GAME["system"]->alterNumber(floor(($lightcruisers+($fighters/20)+($heavycruisers/10)) / 40), 10);
            if ($lost_pirate_lightcruisers > $pirate["lightcruisers"]) $lost_pirate_lightcruisers = $pirate["lightcruisers"];
            $lost_pirate_heavycruisers = $GAME["system"]->alterNumber(floor(($heavycruisers+($lightcruisers/10)+($fighters/50)) / 40), 10);
            if ($lost_pirate_heavycruisers > $pirate["heavycruisers"]) $lost_pirate_heavycruisers = $pirate["heavycruisers"];


            // empire casualties

            $lost_soldiers = $GAME["system"]->alterNumber(floor(($pirate["soldiers"] + ($pirate["fighters"]/10) + ($pirate["lightcruisers"]/20)+($pirate["heavycruisers"]/40))/ 20), 10);
            if ($lost_soldiers > $soldiers) $lost_soldiers = $soldiers;
            $lost_fighters = $GAME["system"]->alterNumber(floor(($pirate["fighters"]+($pirate["soldiers"]/50)+($pirate["lightcruisers"]/10)+($pirate["heavycruisers"]/20)) / 20), 10);
            if ($lost_fighters > $fighters) $lost_fighters = $fighters;
            $lost_lightcruisers = $GAME["system"]->alterNumber(floor(($pirate["lightcruisers"]+($pirate["fighters"]/20) + ($pirate["heavycruisers"]/10)) / 20), 10);
            if ($lost_lightcruisers > $lightcruisers) $lost_lightcruisers = $lightcruisers;
            $lost_heavycruisers = $GAME["system"]->alterNumber(floor(($pirate["heavycruisers"]+($pirate["lightcruisers"]/10)+($pirate["fighters"]/50)) / 20), 10);
            if ($lost_heavycruisers > $heavycruisers) $lost_heavycruisers = $heavycruisers;



            $GAME["empire"]->army->data["effectiveness"] -= rand(1, CONF_PIRATE_EFFECTIVENESS_LOST);
            if ($GAME["empire"]->army->data["effectiveness"] < 10)
            $GAME["empire"]->army->data["effectiveness"] = 10;
            $result .= "<b style=\"color:white\">".T_("Your casualties").": </b><b style=\"color:#9999FF\">" . $GAME["template"]->formatNumber(floor($lost_soldiers)) . "</b><b style=\"color:white\"> ".T_("soldiers").",
                                     </b><b style=\"color:#9999FF\">" . $GAME["template"]->formatNumber(floor($lost_fighters)) . "</b><b style=\"color:white\"> ".T_("fighters").",
                                      </b><b style=\"color:#999FFF\">" . $GAME["template"]->formatNumber(floor($lost_lightcruisers)) . "</b><b style=\"color:white\"> ".T_("light cruisers").",
                                       </b><b style=\"color:#9999FF\">" . $GAME["template"]->formatNumber(floor($lost_heavycruisers)) . "</b><b style=\"color:white\"> ".T_("heavy cruisers")."</b><br/><br/>\n";

            $result .= "<b style=\"color:#FF9999\">".T_("Pirate casualties").": </b><b style=\"color:yellow\">" . $GAME["template"]->formatNumber(floor($lost_pirate_soldiers)) . "</b><b style=\"color:#FF9999\"> ".T_("soldiers").",
                                     </b><b style=\"color:yellow\">" . $GAME["template"]->formatNumber(floor($lost_pirate_fighters)) . "</b><b style=\"color:#FF9999\"> ".T_("fighters").",
                                      </b><b style=\"color:yellow\">" . $GAME["template"]->formatNumber(floor($lost_pirate_lightcruisers)) . "</b><b style=\"color:#FF9999\"> ".T_("light cruisers").",
                                       </b><b style=\"color:yellow\">" . $GAME["template"]->formatNumber(floor($lost_pirate_heavycruisers)) . "</b><b style=\"color:#FF9999\"> ".T_("heavy cruisers")."</b><br/><br/>\n";


            $GAME["empire"]->army->data["soldiers"] -= $lost_soldiers;
            $GAME["empire"]->army->data["fighters"] -= $lost_fighters;
            $GAME["empire"]->army->data["lightcruisers"] -= $lost_lightcruisers;
            $GAME["empire"]->army->data["heavycruisers"] -= $lost_heavycruisers;

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
            $army += ($pirate["soldiers"]-$lost_pirate_soldiers) * CONF_NETWORTH_MILITARY_SOLDIER;
            $army += ($pirate["fighters"]-$lost_pirate_fighters)* CONF_NETWORTH_MILITARY_FIGHTER;
            $army += ($pirate["stations"])* CONF_NETWORTH_MILITARY_STATION;
            $army += ($pirate["lightcruisers"]-$lost_pirate_lightcruisers)* CONF_NETWORTH_MILITARY_LIGHTCRUISER;
            $army += ($pirate["heavycruisers"]-$lost_pirate_heavycruisers)* CONF_NETWORTH_MILITARY_HEAVYCRUISER;
            $army += ($pirate["carriers"])* CONF_NETWORTH_MILITARY_CARRIER;
            $army += ($pirate["covertagents"])* CONF_NETWORTH_MILITARY_COVERT;
            $networth += $army;

            $pirate["networth"] = $networth;


            if (!$DB->Execute("UPDATE game".$game_id."_tb_pirate SET soldiers=" . ($pirate["soldiers"] - $lost_pirate_soldiers) . ",
                                    fighters=" . ($pirate["fighters"] - $lost_pirate_fighters) . ",
                                    lightcruisers=" . ($pirate["lightcruisers"] - $lost_pirate_lightcruisers) . ",
                                    heavycruisers=" . ($pirate["heavycruisers"] - $lost_pirate_heavycruisers) . ",".
                                    "networth='".intval($pirate["networth"])."'
                                    WHERE id='" . $pirate["id"]."'")) trigger_error($DB->ErrorMsg());

            $result .= "<b style=\"color:yellow\">*** ".T_("Pirate prevailed, new army effectiveness").": " . $GAME["empire"]->army->data["effectiveness"] . "%<br/></b>\n";

            // loose
            $_SESSION["player"]["score"] -= 1;
            if (!$DB->Execute("UPDATE system_tb_players SET score='".intval($_SESSION["player"]["score"])."' WHERE id='".intval($_SESSION["player"]["id"])."'"))
                trigger_error($DB->ErrorMsg());

            $GAME["empire"]->data["already_attacked"] = 1;
            $GAME["empire"]->save();

        } else {

            // win
            $_SESSION["player"]["score"] += 1;
            $DB->Execute("UPDATE system_tb_players SET score='".intval($_SESSION["player"]["score"])."' WHERE id='".intval($_SESSION["player"]["id"])."'");

            $lost_pirate_soldiers = $GAME["system"]->alterNumber(floor(($soldiers+($fighters/10)+($lightcruisers/20)+($heavycruisers/40)) / 40), 10);
            if ($lost_pirate_soldiers > $pirate["soldiers"]) $lost_pirate_soldiers = $pirate["soldiers"];
            $lost_pirate_fighters = $GAME["system"]->alterNumber(floor(($fighters+($soldiers/50)+($lightcruisers/10)+($heavycruisers/20)) / 40), 10);
            if ($lost_pirate_fighters > $pirate["fighters"]) $lost_pirate_fighters = $pirate["fighters"];
            $lost_pirate_lightcruisers = $GAME["system"]->alterNumber(floor(($lightcruisers+($fighters/20)+($heavycruisers/10)) / 40), 10);
            if ($lost_pirate_lightcruisers > $pirate["lightcruisers"]) $lost_pirate_lightcruisers = $pirate["lightcruisers"];
            $lost_pirate_heavycruisers = $GAME["system"]->alterNumber(floor(($heavycruisers+($lightcruisers/10)+($fighters/50)) / 40), 10);
            if ($lost_pirate_heavycruisers > $pirate["heavycruisers"]) $lost_pirate_heavycruisers = $pirate["heavycruisers"];


            $lost_soldiers = $GAME["system"]->alterNumber(floor(($pirate["soldiers"] + ($pirate["fighters"]/10) + ($pirate["lightcruisers"]/20)+($pirate["heavycruisers"]/40))/ 20), 10);
            if ($lost_soldiers > $soldiers) $lost_soldiers = $soldiers;
            $lost_fighters = $GAME["system"]->alterNumber(floor(($pirate["fighters"]+($pirate["soldiers"]/50)+($pirate["lightcruisers"]/10)+($pirate["heavycruisers"]/20)) / 20), 10);
            if ($lost_fighters > $fighters) $lost_fighters = $fighters;
            $lost_lightcruisers = $GAME["system"]->alterNumber(floor(($pirate["lightcruisers"]+($pirate["fighters"]/20) + ($pirate["heavycruisers"]/10)) / 20), 10);
            if ($lost_lightcruisers > $lightcruisers) $lost_lightcruisers = $lightcruisers;
            $lost_heavycruisers = $GAME["system"]->alterNumber(floor(($pirate["heavycruisers"]+($pirate["lightcruisers"]/10)+($pirate["fighters"]/50)) / 20), 10);
            if ($lost_heavycruisers > $heavycruisers) $lost_heavycruisers = $heavycruisers;


            $result .= "<b style=\"color:white\">".T_("Your casualties").": </b><b style=\"color:#9999FF\">" . $GAME["template"]->formatNumber(floor($lost_soldiers)) . "</b><b style=\"color:white\"> ".T_("soldiers").",
                                     </b><b style=\"color:#9999FF\">" . $GAME["template"]->formatNumber(floor($lost_fighters)) . "</b><b style=\"color:white\"> ".T_("fighters").",
                                      </b><b style=\"color:#999FFF\">" . $GAME["template"]->formatNumber(floor($lost_lightcruisers)) . "</b><b style=\"color:white\"> ".T_("light cruisers").",
                                       </b><b style=\"color:#9999FF\">" . $GAME["template"]->formatNumber(floor($lost_heavycruisers)) . "</b><b style=\"color:white\"> ".T_("heavy cruisers")."</b><br/><br/>\n";

            $result .= "<b style=\"color:#FF9999\">".T_("Pirate casualties").": </b><b style=\"color:yellow\">" . $GAME["template"]->formatNumber(floor($lost_pirate_soldiers)) . "</b><b style=\"color:#FF9999\"> ".T_("soldiers").",
                                     </b><b style=\"color:yellow\">" . $GAME["template"]->formatNumber(floor($lost_pirate_fighters)) . "</b><b style=\"color:#FF9999\"> ".T_("fighters").",
                                      </b><b style=\"color:yellow\">" . $GAME["template"]->formatNumber(floor($lost_pirate_lightcruisers)) . "</b><b style=\"color:#FF9999\"> ".T_("light cruisers").",
                                       </b><b style=\"color:yellow\">" . $GAME["template"]->formatNumber(floor($lost_pirate_heavycruisers)) . "</b><b style=\"color:#FF9999\"> ".T_("heavy cruisers")."</b><br/><br/>\n";

            $result .= "<b style=\"color:lightgreen\">*** ".T_("Pirate gang lost")."<br/></b>\n";
            $GAME["empire"]->army->data["effectiveness"] += rand(1, CONF_PIRATE_EFFECTIVENESS_WON);
            if ($GAME["empire"]->army->data["effectiveness"] > 150)
            $GAME["empire"]->army->data["effectiveness"] = 150;

            $GAME["empire"]->army->data["soldiers"] -= $lost_soldiers;
            $GAME["empire"]->army->data["fighters"] -= $lost_fighters;
            $GAME["empire"]->army->data["lightcruisers"] -= $lost_lightcruisers;
            $GAME["empire"]->army->data["heavycruisers"] -= $lost_heavycruisers;


            $pirate = $DB->Execute("SELECT * FROM game".$game_id."_tb_pirate WHERE id='" . $pirate["id"]."'");
            $pirate = $pirate->fields;

            $reclaimed_credits = (($pirate["credits"] / 100) * rand(2, 10));
            $reclaimed_food = (($pirate["food"] / 100) * rand(2, 10));
            $reclaimed_covertagents = ((($pirate["covertagents"]) / 100) * rand(2, 10));
            $reclaimed_stations = ((($pirate["stations"]) / 100) * rand(2, 10));
            $reclaimed_soldiers = ((($pirate["soldiers"]-$lost_pirate_soldiers) / 100) * rand(2, 10));
            $reclaimed_fighters = ((($pirate["fighters"]-$lost_pirate_fighters) / 100) * rand(2, 10));
            $reclaimed_lightcruisers = ((($pirate["lightcruisers"]-$lost_pirate_lightcruisers) / 100) * rand(2, 10));
            $reclaimed_heavycruisers = ((($pirate["heavycruisers"]-$lost_pirate_heavycruisers) / 100) * rand(2, 10));
            $reclaimed_carriers = ((($pirate["carriers"]) / 100) * rand(2, 10));
            $reclaimed_food_planets = (($pirate["food_planets"] / 100) * rand(2, 10));
            $reclaimed_ore_planets = (($pirate["ore_planets"] / 100) * rand(2, 10));
            $reclaimed_tourism_planets = (($pirate["tourism_planets"] / 100) * rand(2, 10));
            $reclaimed_supply_planets = (($pirate["supply_planets"] / 100) * rand(2, 10));
            $reclaimed_gov_planets = (($pirate["gov_planets"] / 100) * rand(2, 10));
            $reclaimed_edu_planets = (($pirate["edu_planets"] / 100) * rand(2, 10));
            $reclaimed_research_planets = (($pirate["research_planets"] / 100) * rand(2, 10));
            $reclaimed_urban_planets = (($pirate["urban_planets"] / 100) * rand(2, 10));
            $reclaimed_petro_planets = (($pirate["petro_planets"] / 100) * rand(2, 10));
            $reclaimed_antipollu_planets = (($pirate["antipollu_planets"] / 100) * rand(2, 10));

            $networth = 0;
            $networth += (($pirate["credits"]-$reclaimed_credits) * CONF_NETWORTH_CREDITS);

            $planets = 0;
            $planets += ($pirate["food_planets"]- $reclaimed_food_planets);
            $planets += ($pirate["ore_planets"]- $reclaimed_ore_planets);
            $planets += ($pirate["tourism_planets"]- $reclaimed_tourism_planets);
            $planets += ($pirate["supply_planets"]- $reclaimed_supply_planets);
            $planets += ($pirate["gov_planets"]- $reclaimed_gov_planets);
            $planets += ($pirate["edu_planets"]- $reclaimed_edu_planets);
            $planets += ($pirate["research_planets"]- $reclaimed_research_planets);
            $planets += ($pirate["urban_planets"]- $reclaimed_urban_planets);
            $planets += ($pirate["petro_planets"]- $reclaimed_petro_planets);
            $planets += ($pirate["antipollu_planets"]- $reclaimed_antipollu_planets);
            $networth += ($planets * CONF_NETWORTH_PLANETS);

            $army = 0;
            $army += ($pirate["soldiers"]-$lost_pirate_soldiers-$reclaimed_soldiers) * CONF_NETWORTH_MILITARY_SOLDIER;
            $army += ($pirate["fighters"]-$lost_pirate_fighters-$reclaimed_fighters)* CONF_NETWORTH_MILITARY_FIGHTER;
            $army += ($pirate["stations"]-$reclaimed_stations)* CONF_NETWORTH_MILITARY_STATION;
            $army += ($pirate["lightcruisers"]-$lost_pirate_lightcruisers-$reclaimed_lightcruisers)* CONF_NETWORTH_MILITARY_LIGHTCRUISER;
            $army += ($pirate["heavycruisers"]-$lost_pirate_heavycruisers-$reclaimed_heavycruisers)* CONF_NETWORTH_MILITARY_HEAVYCRUISER;
            $army += ($pirate["carriers"]-$reclaimed_carriers)* CONF_NETWORTH_MILITARY_CARRIER;
            $army += ($pirate["covertagents"])* CONF_NETWORTH_MILITARY_COVERT;
            $networth += $army;

            $pirate["networth"] = $networth;


            if (!$DB->Execute("UPDATE game".$game_id."_tb_pirate SET soldiers='" . ($pirate["soldiers"] - $lost_pirate_soldiers) . "',
                                    fighters='" . ($pirate["fighters"] - $lost_pirate_fighters) . "',
                                    lightcruisers='" . ($pirate["lightcruisers"] - $lost_pirate_lightcruisers) . "',
                                    heavycruisers='" . ($pirate["heavycruisers"] - $lost_pirate_heavycruisers) . "',".
                                    "networth='".intval($pirate["networth"])."'
                                    WHERE id='" . $pirate["id"]."'")) trigger_error($DB->ErrorMsg());


            $result .= "<br/><div style=\"color:#66AAAA;font-size:12px;font-family:verdana\">";
            $result .= T_("reclaimed")." ".T_("credits").": " . $GAME["template"]->formatCredits($reclaimed_credits) . "<br/>\n";
            $result .= T_("reclaimed")." ".T_("food").": " . $GAME["template"]->formatFood($reclaimed_food) . "<br/>\n";
            $result .= T_("reclaimed")." ".T_("covert agents").": <b style=\"color:white\">" . $GAME["template"]->formatNumber($reclaimed_covertagents) . "</b><br/>\n";
            $result .= T_("reclaimed")." ".T_("stations").": <b style=\"color:white\">" . $GAME["template"]->formatNumber($reclaimed_stations) . "</b><br/>\n";
            $result .= T_("reclaimed")." ".T_("soldiers").": <b style=\"color:white\">" . $GAME["template"]->formatNumber($reclaimed_soldiers) . "</b><br/>\n";
            $result .= T_("reclaimed")." ".T_("fighters").": <b style=\"color:white\">" . $GAME["template"]->formatNumber($reclaimed_fighters) . "</b><br/>\n";
            $result .= T_("reclaimed")." ".T_("light cruisers").": <b style=\"color:white\">" . $GAME["template"]->formatNumber($reclaimed_lightcruisers) . "</b><br/>\n";
            $result .= T_("reclaimed")." ".T_("heavy cruisers").": <b style=\"color:white\">" . $GAME["template"]->formatNumber($reclaimed_heavycruisers) . "</b><br/>\n";
            $result .= T_("reclaimed")." ".T_("carriers").": <b style=\"color:white\">" . $GAME["template"]->formatNumber($reclaimed_carriers) . "</b><br/>\n";
            $result .= T_("reclaimed")." ".T_("food planets").": <b style=\"color:white\">" . $GAME["template"]->formatNumber($reclaimed_food_planets) . "</b><br/>\n";
            $result .= T_("reclaimed")." ".T_("ore planets").": <b style=\"color:white\">" . $GAME["template"]->formatNumber($reclaimed_ore_planets) . "</b><br/>\n";
            $result .= T_("reclaimed")." ".T_("tourism planets").": <b style=\"color:white\">" . $GAME["template"]->formatNumber($reclaimed_tourism_planets) . "</b><br/>\n";
            $result .= T_("reclaimed")." ".T_("supply planets").": <b style=\"color:white\">" . $GAME["template"]->formatNumber($reclaimed_supply_planets) . "</b><br/>\n";
            $result .= T_("reclaimed")." ".T_("gov. planets").": <b style=\"color:white\">" . $GAME["template"]->formatNumber($reclaimed_gov_planets) . "</b><br/>\n";
            $result .= T_("reclaimed")." ".T_("edu. planets").": <b style=\"color:white\">" . $GAME["template"]->formatNumber($reclaimed_edu_planets) . "</b><br/>\n";
            $result .= T_("reclaimed")." ".T_("urban planets").": <b style=\"color:white\">" . $GAME["template"]->formatNumber($reclaimed_urban_planets) . "</b><br/>\n";
            $result .= T_("reclaimed")." ".T_("research planets").": <b style=\"color:white\">" . $GAME["template"]->formatNumber($reclaimed_research_planets) . "</b><br/>\n";
            $result .= T_("reclaimed")." ".T_("petroleum planets").": <b style=\"color:white\">" . $GAME["template"]->formatNumber($reclaimed_petro_planets) . "</b><br/>\n";
            $result .= T_("reclaimed")." ".T_("anti-pollution planets").": <b style=\"color:white\">" . $GAME["template"]->formatNumber($reclaimed_antipollu_planets) . "</b><br/>\n";
            $result .= "</div><br/>";

            $query = "UPDATE game".$game_id."_tb_pirate SET credits='" . floor($pirate["credits"] - $reclaimed_credits) . "',
                                food='" . floor($pirate["food"] - $reclaimed_food) . "',
                                covertagents='" . floor($pirate["covertagents"] - $reclaimed_covertagents) . "',
                                stations='" . floor($pirate["stations"] - $reclaimed_stations) . "',
                                soldiers='" . floor($pirate["soldiers"] - $reclaimed_soldiers) . "',
                                fighters='" . floor($pirate["fighters"] - $reclaimed_fighters) . "',
                                lightcruisers='" . floor($pirate["lightcruisers"] - $reclaimed_lightcruisers) . "',
                                heavycruisers='" . floor($pirate["heavycruisers"] - $reclaimed_heavycruisers) . "',
                                carriers='" . floor($pirate["carriers"] - $reclaimed_carriers) . "',
                                food_planets='" . floor($pirate["food_planets"] - $reclaimed_food_planets) . "',
                                ore_planets='" . floor($pirate["ore_planets"] - $reclaimed_ore_planets) . "',
                                tourism_planets='" . floor($pirate["tourism_planets"] - $reclaimed_tourism_planets) . "',
                                supply_planets='" . floor($pirate["supply_planets"] - $reclaimed_supply_planets) . "',
                                gov_planets='" . floor($pirate["gov_planets"] - $reclaimed_gov_planets) . "',
                                edu_planets='" . floor($pirate["edu_planets"] - $reclaimed_edu_planets) . "',
                                urban_planets='" . floor($pirate["urban_planets"] - $reclaimed_urban_planets) . "',
                                research_planets='" . floor($pirate["research_planets"] - $reclaimed_research_planets) . "',
                                petro_planets='" . floor($pirate["petro_planets"] - $reclaimed_petro_planets) . "',
                                antipollu_planets='" . floor($pirate["antipollu_planets"] - $reclaimed_antipollu_planets) . "'
                                WHERE id='" . $pirate["id"]."'";

            if (!$DB->Execute($query)) trigger_error($DB->ErrorMsg());

            $GAME["empire"]->data["credits"] += $reclaimed_credits;
            $GAME["empire"]->data["food"] += $reclaimed_food;

            $GAME["empire"]->army->data["soldiers"] += $reclaimed_soldiers;
            $GAME["empire"]->army->data["fighters"] += $reclaimed_fighters;
            $GAME["empire"]->army->data["stations"] += $reclaimed_stations;
            $GAME["empire"]->army->data["lightcruisers"] += $reclaimed_lightcruisers;
            $GAME["empire"]->army->data["heavycruisers"] += $reclaimed_heavycruisers;
            $GAME["empire"]->army->data["carriers"] += $reclaimed_carriers;
            $GAME["empire"]->army->data["covertagents"] += $reclaimed_covertagents;

            $GAME["empire"]->planets->data["food_planets"] += $reclaimed_food_planets;
            $GAME["empire"]->planets->data["ore_planets"] += $reclaimed_ore_planets;
            $GAME["empire"]->planets->data["tourism_planets"] += $reclaimed_tourism_planets;
            $GAME["empire"]->planets->data["supply_planets"] += $reclaimed_supply_planets;
            $GAME["empire"]->planets->data["gov_planets"] += $reclaimed_gov_planets;
            $GAME["empire"]->planets->data["edu_planets"] += $reclaimed_edu_planets;
            $GAME["empire"]->planets->data["urban_planets"] += $reclaimed_urban_planets;
            $GAME["empire"]->planets->data["research_planets"] += $reclaimed_research_planets;
            $GAME["empire"]->planets->data["petro_planets"] += $reclaimed_petro_planets;
            $GAME["empire"]->planets->data["antipollu_planets"] += $reclaimed_antipollu_planets;
            $GAME["empire"]->data["already_attacked"] = 1;
            $GAME["empire"]->save();


        }


        $evt = new EventCreator($DB);
        $evt->type = CONF_EVENT_PIRATEBUST;
        $evt->from = -1;
        $evt->to = $GAME["empire"]->data["id"];
        $evt->params = array (
                "result" => $result,
                "pirate_name" => $pirate["name"]
        );
        $evt->send();


    }

}

////////////////////////////////////////////////////////////////
// MAIN
////////////////////////////////////////////////////////////////

$GAME["system"]->redirect("battle.php");
?>
