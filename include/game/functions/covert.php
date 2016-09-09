<?php

function PerformCovertOperation($game_id,$empire_id,$operation, $empire)
{
    global $DB, $TPL, $GAME,$CONF_COVERT_OPERATIONS,$CONF_CIVIL_STATUS, $CONF_DIPLOMACY_TREATIES, $CONF_PLANETS, $CONF_UNITS;

    if ($operation != 10) {

        $enemy_empire = new Empire($DB, $TPL, $GAME["gameplay_costs"]);
        $enemy_empire->game_id = $game_id;
        $ret = $enemy_empire->load($empire_id);

        if ($ret["code"] == false) {
            return;

        }

        $covert1 = $empire->army->data["covertagents"];
        if ($covert1 == 0) $covert1 = 1;
        $planets_count = $empire->planets->getCount();
        if ($planets_count == 0) $planets_count = 1;
        $covert1 = $covert1 / $planets_count;

        $covert2 = $enemy_empire->army->data["covertagents"];
        if ($covert2 == 0) $covert2 = 1;
        $planets_count = $enemy_empire->planets->getCount();
        if ($planets_count == 0) $planets_count = 1;
        $covert2 = $covert2 / $planets_count;

        if ($covert1 == 0) $covert1 = 1;
        if ($covert2 == 0) $covert2 = 1;

        $c = $empire->army->data["covertagents"] / ($enemy_empire->army->data["covertagents"] == 0 ? 1 : $enemy_empire->army->data["covertagents"]);

        $success_rate = (($covert1 / $covert2) * 100);
        $success_rate /= $CONF_COVERT_OPERATIONS[$operation]["ratio"];
    } else {
        $success_rate = 50;
        $c = 1;
    }

    $difficulty = T_("Impossible");
    if ($success_rate > 0) $difficulty = T_("Nearly impossible!");
    if ($success_rate > 20) $difficulty = T_("Unlikely!");
    if ($success_rate > 40) $difficulty = T_("Fair!");
    if ($success_rate > 60)	$difficulty = T_("Nearly safe!");
    if ($success_rate > 80)	$difficulty = T_("Safe!");

    $result = T_("Success rate") . ": " . $difficulty . "<br/>\n";
    srand(time(NULL));
    $percent = rand(1, 100);
    if ($success_rate > $percent) {

        if ($empire->data["player_id"] != -1) {
            $_SESSION["player"]["score"] += 1;
            $DB->Execute("UPDATE system_tb_players SET score='" . intval($_SESSION["player"]["score"]) . "' WHERE id='" . $_SESSION["player"]["id"]."'");
        }




        switch ($operation) {

            /***************************************************************************/
            case CONF_COVERTOP_TAKEHOSTAGES :
            /***************************************************************************/


                $SMARTY = new Smarty();
                $SMARTY->template_dir = "../templates/game/";
                $SMARTY->compile_dir = "../templates_c/game/";

                $p = rand(20 + ($empire->army->data["covertagents_level"] * 10), 90);
                $credits_lost = floor(($enemy_empire->data["credits"] / 100) * $p);
                $credits_lost *= $c;
                if ($credits_lost > $enemy_empire->data["credits"])
                $credits_lost = $enemy_empire->data["credits"];

                $enemy_empire->data["credits"] -= $credits_lost;
                $enemy_empire->save();

                $SMARTY->assign("credits_lost", $credits_lost);
                $result .=$SMARTY->fetch("covertop/takehostages.html");

                $empire->data["credits"] += $credits_lost;
                $empire->save();

                $evt = new EventCreator($DB);
                $evt->type = CONF_EVENT_HOSTAGES;
                $evt->from = $empire->data["id"];
                $evt->to = $enemy_empire->data["id"];
                $evt->params = array (
                    "credits_lost" => $credits_lost
                );
                $evt->send();

                break;

            /***************************************************************************/
            case CONF_COVERTOP_RELATIONSSPYING :
            /***************************************************************************/

                $SMARTY = new Smarty();
                $SMARTY->template_dir = "../templates/game/";
                $SMARTY->compile_dir = "../templates_c/game/";


                $treaties = array ();
                for ($i = 0; $i < count($enemy_empire->diplomacy->data); $i++) {

                    $treaty = $enemy_empire->diplomacy->data[$i];

                    switch ($treaty["status"]) {
                        case 1 :
                            $treaty["status"] = T_("Active");
                            break;

                        case 2 :
                            $treaty["status"] = T_("Break Pending");
                            break;

                        default :
                            $treaty["status"] = T_("Accept  Pending");
                        }

                        $treaty["type"] = $CONF_DIPLOMACY_TREATIES[$treaty["type"]];

                        $r1 = $DB->Execute("SELECT emperor,name FROM game".$game_id."_tb_empire WHERE id='" . $treaty["empire_from"]."'");
                        $r2 = $DB->Execute("SELECT emperor,name FROM game".$game_id."_tb_empire WHERE id='" . $treaty["empire_to"]."'");
                        $treaty["from"] = $r1->fields["emperor"] . "@" . $r1->fields["name"];
                        $treaty["to"] = $r2->fields["emperor"] . "@" . $r2->fields["name"];

                        $r = rand(0, 4);
                        if ($r > $empire->army->data["covertagents_level"])
                        $treaty["from"] = "???";

                        $r = rand(0, 4);
                        if ($r > $empire->army->data["covertagents_level"])
                        $treaty["to"] = "???";

                        $r = rand(0, 4);
                        if ($r > $empire->army->data["covertagents_level"])
                        $treaty["type"] = "???";

                        $r = rand(0, 4);
                        if ($r > $empire->army->data["covertagents_level"])
                        $treaty["status"] = "???";

                        $treaties[] = $treaty;

                    }
                    $SMARTY->assign("relations", $treaties);
                    $result .= $SMARTY->fetch("covertop/relationsspying.html");
                    break;

            /***************************************************************************/
            case CONF_COVERTOP_BOMBINGOPERATIONS :
            /***************************************************************************/

                $e = rand(30 + (10 * $empire->army->data["covertagents_level"]), 100);
                $food_lost = floor(($enemy_empire->data["food"] / 100) * $e);
                $food_lost *= $c;
                if ($food_lost > $enemy_empire->data["food"])
                $food_lost = $enemy_empire->data["food"];


                $SMARTY = new Smarty();
                $SMARTY->template_dir = "../templates/game/";
                $SMARTY->compile_dir = "../templates_c/game/";

                $SMARTY->assign("food_lost", $GAME["template"]->formatFood($food_lost));

                $enemy_empire->data["food"] -= $food_lost;
                $enemy_empire->save();

                $result .= $SMARTY->fetch("covertop/bombingoperations.html");

                $evt = new EventCreator($DB);
                $evt->type = CONF_EVENT_FOODBOMBED;
                $evt->from = $empire->data["id"];
                $evt->to = $enemy_empire->data["id"];
                $evt->params = array (
                    "content" => $result
                );
                $evt->send();

                break;

            /***************************************************************************/
            case CONF_COVERTOP_DEMORALIZETROOPS :
            /***************************************************************************/
                $SMARTY = new Smarty();
                $SMARTY->template_dir = "../templates/game/";
                $SMARTY->compile_dir = "../templates_c/game/";

                $e = $enemy_empire->army->data["effectiveness"];

                if ($e >= (5 + $empire->army->data["covertagents_level"]))
                $e -= (5 + $empire->army->data["covertagents_level"]);

                $enemy_empire->army->data["effectiveness"] = $e;
                $enemy_empire->save();

                $SMARTY->assign("effectiveness", $e);
                $result .= $SMARTY->fetch("covertop/demoralizetroops.html");

                break;

            /***************************************************************************/
            case CONF_COVERTOP_SUPPORTDISSENSION :
            /***************************************************************************/
                $percent = rand(1, 20 * ($empire->army->data["covertagents_level"] + 1));
                $percent *= $c;
                $percent = floor($percent);
                if ($percent == 0)
                $percent = 1;
                if ($percent > 16)
                $percent = 16;

                $soldiers_lost = floor(($enemy_empire->army->data["soldiers"] / 100) * $percent);
                $fighters_lost = floor(($enemy_empire->army->data["fighters"] / 100) * $percent);
                $lightcruisers_lost = floor(($enemy_empire->army->data["lightcruisers"] / 100) * $percent);
                $heavycruisers_lost = floor(($enemy_empire->army->data["heavycruisers"] / 100) * $percent);
                $covertagents_lost = floor(($enemy_empire->army->data["covertagents"] / 100) * $percent);

                $reclaim_percent = rand(10, 50);
                $soldiers_reclaimed = floor(($soldiers_lost / 100) * $reclaim_percent);
                $fighters_reclaimed = floor(($fighters_lost / 100) * $reclaim_percent);
                $lightcruisers_reclaimed = floor(($lightcruisers_lost / 100) * $reclaim_percent);
                $heavycruisers_reclaimed = floor(($heavycruisers_lost / 100) * $reclaim_percent);
                $covertagents_reclaimed = floor(($covertagents_lost / 100) * $reclaim_percent);

                $empire->army->data["soldiers"] += $soldiers_reclaimed;
                $empire->army->data["fighters"] += $fighters_reclaimed;
                $empire->army->data["lightcruisers"] += $lightcruisers_reclaimed;
                $empire->army->data["heavycruisers"] += $heavycruisers_reclaimed;
                $empire->army->data["covertagents"] += $covertagents_reclaimed;
                $empire->save();

                $SMARTY = new Smarty();
                $SMARTY->template_dir = "../templates/game/";
                $SMARTY->compile_dir = "../templates_c/game/";


                $SMARTY->assign("soldiers_lost", $soldiers_lost);
                $SMARTY->assign("fighters_lost", $fighters_lost);
                $SMARTY->assign("lightcruisers_lost", $lightcruisers_lost);
                $SMARTY->assign("heavycruisers_lost", $heavycruisers_lost);
                $SMARTY->assign("covertagents_lost", $covertagents_lost);
                $SMARTY->assign("soldiers_reclaimed", $soldiers_reclaimed);
                $SMARTY->assign("fighters_reclaimed", $fighters_reclaimed);
                $SMARTY->assign("lightcruisers_reclaimed", $lightcruisers_reclaimed);
                $SMARTY->assign("heavycruisers_reclaimed", $heavycruisers_reclaimed);
                $SMARTY->assign("covertagents_reclaimed", $covertagents_reclaimed);

                $enemy_empire->army->data["soldiers"] -= $soldiers_lost;
                $enemy_empire->army->data["fighters"] -= $fighters_lost;
                $enemy_empire->army->data["lightcruisers"] -= $lightcruisers_lost;
                $enemy_empire->army->data["heavycruisers"] -= $heavycruisers_lost;
                $enemy_empire->army->data["covertagents"] -= $covertagents_lost;
                $enemy_empire->save();

                $result .= $SMARTY->fetch("covertop/supportdissension.html");

                $msg =  $SMARTY->fetch("covertop/supportdissension.html");

                $evt = new EventCreator($DB);
                $evt->type = CONF_EVENT_DISSENSION;
                $evt->from = $empire->data["id"];
                $evt->params = array (
                    "content" => $msg
                );
                $evt->to = $enemy_empire->data["id"];
                $evt->send();

                break;

            /***************************************************************************/
            case CONF_COVERTOP_CARRIERSSABOTAGE :
            /***************************************************************************/


                $SMARTY = new Smarty();
                $SMARTY->template_dir = "../templates/game/";
                $SMARTY->compile_dir = "../templates_c/game/";

                $percent = rand(10, 20 * ($empire->army->data["covertagents_level"] + 1));
                $percent *= $c;
                $percent = floor($percent);
                if ($percent <= 0)
                $percent = 1;
                if ($percent > 50)
                $percent = 50;

                $carriers_lost = floor(($enemy_empire->army->data["carriers"] / 100) * $percent);

                $SMARTY->assign("carriers_lost", $carriers_lost);

                $result .= $SMARTY->fetch("covertop/carrierssabotage.html");

                $msg = "<b>" . $GAME["template"]->formatNumber($carriers_lost) . " ".T_("carriers destroyed!")."</b>\n";
                if ($enemy_empire->army->data["carriers"] == 0) $msg .= "<b>".T_("This empire have no carriers !")."</b>\n";
                $enemy_empire->army->data["carriers"] -= $carriers_lost;
                $enemy_empire->save();

                $evt = new EventCreator($DB);
                $evt->type = CONF_EVENT_CARRIERS_SABOTAGE;
                $evt->from = $empire->data["id"];
                $evt->to = $enemy_empire->data["id"];
                $evt->params = array (
                    "content" => $msg
                );
                $evt->send();

                break;

            /***************************************************************************/
            case CONF_COVERTOP_COMMUNICATIONSSPYING :
            /***************************************************************************/

                $rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_event WHERE event_type='".CONF_EVENT_MESSAGE."' AND event_to='" . $enemy_empire->data["id"] . "' ORDER BY id DESC LIMIT 0," . (5 + $empire->army->data["covertagents_level"]));
                if ($rs->EOF) $result .= T_("No communication available.");
                while (!$rs->EOF) {
                    $result .= $GAME["template"]->showMessage($rs->fields) . "<br/>";

                    $rs->MoveNext();
                }

                break;

            /***************************************************************************/
            case CONF_COVERTOP_INSURGENTAID :
            /***************************************************************************/

                $SMARTY = new Smarty();
                $SMARTY->template_dir = "../templates/game/";
                $SMARTY->compile_dir = "../templates_c/game/";

                $civil_status = $enemy_empire->data["civil_status"];
                $r = rand(0, count($CONF_CIVIL_STATUS) - 1);
                $r2 = ((count($CONF_CIVIL_STATUS) - 1) - $civil_status);
                if ($r < $r2) {

                    $r = rand(0, 4);
                    if ($r <= $empire->army->data["covertagents_level"]) {
                        $civil_status += 1;
                        if ($civil_status > (count($CONF_CIVIL_STATUS) - 2))
                        $civil_status = count($CONF_CIVIL_STATUS) - 2;
                    }

                    $enemy_empire->data["civil_status"] = $civil_status;
                    $enemy_empire->save();
                }

                $SMARTY->assign("civil_status", $CONF_CIVIL_STATUS[$civil_status]);


                $result .= $SMARTY->fetch("covertop/insurgentaid.html");

                break;

            /***************************************************************************/
            case CONF_COVERTOP_SENDSPY :
            /***************************************************************************/

                $SMARTY = new Smarty();
                $SMARTY->template_dir = "../templates/game/";
                $SMARTY->compile_dir = "../templates_c/game/";

                $SMARTY->assign("empire_name", $enemy_empire->data["name"]);
                $SMARTY->assign("empire_emperor", $enemy_empire->data["emperor"]);
                $SMARTY->assign("credits", (rand(0, 4) > $empire->army->data["covertagents_level"] ? "???" : $GAME["template"]->formatCredits($enemy_empire->data["credits"])));
                $SMARTY->assign("population", (rand(0, 4) > $empire->army->data["covertagents_level"] ? "???" : $GAME["template"]->formatPopulation($enemy_empire->data["population"])));
                $SMARTY->assign("food", (rand(0, 4) > $empire->army->data["covertagents_level"] ? "???" : $GAME["template"]->formatFood($enemy_empire->data["food"])));
                $SMARTY->assign("civil_status", (rand(0, 4) > $empire->army->data["covertagents_level"] ? "???" : $CONF_CIVIL_STATUS[$enemy_empire->data["civil_status"]]));
                $SMARTY->assign("taxrate", (rand(0, 4) > $empire->army->data["covertagents_level"] ? "???" : $enemy_empire->data["taxrate"]));

                $SMARTY->assign("effectiveness", (rand(0, 4) > $empire->army->data["covertagents_level"] ? "???" : $enemy_empire->army->data["effectiveness"]));

                srand(time(NULL));

                for ($i = 0; $i < count($CONF_PLANETS); $i++) {

                    $r = rand(0, 4);
                    if ($r > $empire->army->data["covertagents_level"])
                    $SMARTY->assign($CONF_PLANETS[$i] .
                        "_planets", "???");
                    else
                    $SMARTY->assign($CONF_PLANETS[$i] .
                        "_planets", $GAME["template"]->formatNumber($enemy_empire->planets->data[$CONF_PLANETS[$i] . "_planets"]));
                }

                for ($i = 0; $i < count($CONF_UNITS); $i++) {

                    $r = rand(0, 4);
                    if ($r > $empire->army->data["covertagents_level"])
                    $SMARTY->assign($CONF_UNITS[$i], "???");
                    else
                    $SMARTY->assign($CONF_UNITS[$i], $GAME["template"]->formatNumber($enemy_empire->army->data[$CONF_UNITS[$i]]));
                }

                $result .= $SMARTY->fetch("covertop/sendspy.html");

                break;

            /***************************************************************************/
            case CONF_COVERTOP_SETUPCOUP :
            /***************************************************************************/

                $SMARTY = new Smarty();
                $SMARTY->template_dir = "../templates/game/";
                $SMARTY->compile_dir = "../templates_c/game/";

                $result .= $SMARTY->fetch("covertop/setupcoup.html");

                $empire_from = intval($_POST["empire_from"]);
                if ($empire_from == -1) $GAME["system"]->redirect("covert.php", array (
                  "WARNING" => T_("Invalid empire ID !")
                    ));
                if ($empire_from == $empire) $GAME["system"]->redirect("covert.php", array (
                  "WARNING" => T_("Invalid empire ID !")
                    ));

                $rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_empire WHERE id='$empire_from'");
                if ($rs->EOF) {
                    $GAME["system"]->redirect("covert.php", array (
                      "WARNING" => T_("Invalid empire ID !")
                        ));
                }


                $evt = new EventCreator($DB);
                $evt->from = $empire_from;
                $evt->to = $empire;
                $evt->type = CONF_EVENT_SPYCAUGHT;
                $evt->params = array (
                    "opname" => $CONF_COVERT_OPERATIONS[rand(0,count($CONF_COVERT_OPERATIONS)-1)]["name"],
                    "empire_id" => $rs->fields["id"],
                    "empire_name" => $rs->fields["name"],
                    "empire_emperor" => $rs->fields["emperor"],
                    "gender" => $rs->fields["gender"]
                );
                $evt->send();

                break;


            /***************************************************************************/
            case CONF_COVERTOP_PIRATESREPORT :
            /***************************************************************************/

                $SMARTY = new Smarty();
                $SMARTY->template_dir = "../templates/game/";
                $SMARTY->compile_dir = "../templates_c/game/";

                $pirates = array();
                $rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_pirate ORDER BY name");
                while(!$rs->EOF) {
                    $pirates[] = $rs->fields;
                    $rs->MoveNext();
                }

                $SMARTY->assign("pirates",$pirates);
                $result .= $SMARTY->fetch("covertop/pirates_report.html");


                break;
        }




    } else {

        $casualties = floor(($empire->army->data["covertagents"] / 100) * 5);
        $result .= T_("Your covert agents were caught !") . " (" . $GAME["template"]->formatNumber($casualties) . ")";
        $empire->army->data["covertagents"] -= $casualties;

        $evt = new EventCreator($DB);
        $evt->from = $empire->data["id"];
        $evt->to = $empire_id;
        $evt->type = CONF_EVENT_SPYCAUGHT;
        $evt->params = array (
        "opname" => $CONF_COVERT_OPERATIONS[$operation]["name"],
        "empire_id" => $empire->data["id"],
        "empire_name" => $empire->data["name"],
        "empire_emperor" => $empire->data["emperor"],
        "gender" => $empire->data["gender"]
        );
        $evt->send();

    }

    $empire->data["credits"] -= $CONF_COVERT_OPERATIONS[$operation]["cost_credits"];
    $empire->army->data["covert_points"] -= $CONF_COVERT_OPERATIONS[$operation]["cost_points"];
    if ($empire_id != -1)
        $enemy_empire->save();


    return $result;
}


?>
