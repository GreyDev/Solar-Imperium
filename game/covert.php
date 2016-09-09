<?php

// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //

define("LANGUAGE_DOMAIN","game");

require_once ("../include/game/init.php");
require_once ("../include/game/init_ingame.php");
require_once ("../include/game/functions/covert.php");

if ($GAME["empire"]->data["protection_turns_left"] != 0)
$GAME["system"]->redirect("battle.php", array (
        "WARNING" => T_("No covert operations available while being under protection")
    ));

if ($GAME["empire"]->army->data["covertagents"] == 0)
$GAME["system"]->redirect("battle.php", array (
        "WARNING" =>T_("You don't have any covert agents!")
    ));


////////////////////////////////////////////////////////////////////////////////
// Handle requests
////////////////////////////////////////////////////////////////////////////////

if (isset ($_POST["operation"])) {

    $empire = -1;
    if (isset($_POST["empire"])) {
        $empire = intval($_POST["empire"]);
    }

    if ($empire == -1) {
        $GAME["system"]->redirect("covert.php", array (
            "WARNING" => T_("Invalid empire ID !")
            ));

    }

    $operation = $_POST["operation"];

    if (($operation < 0) || ($operation > (count($CONF_COVERT_OPERATIONS) - 1)))
    $GAME["system"]->redirect("covert.php", array (
            "WARNING" => T_("Invalid covert operation !")
        ));

    if ($CONF_COVERT_OPERATIONS[$operation]["cost_points"] > $GAME["empire"]->army->data["covert_points"])
    $GAME["system"]->redirect("covert.php", array (
            "WARNING" => T_("No enough covert points !")
        ));

    if ($CONF_COVERT_OPERATIONS[$operation]["cost_credits"] > $GAME["empire"]->data["credits"])
    $GAME["system"]->redirect("covert.php", array (
            "WARNING" => T_("No enough credits !")
        ));

    if ($empire != -1) {
        $rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_empire WHERE id='$empire'");
        if ($rs->EOF)
        $GAME["system"]->redirect("covert.php", array (
                "WARNING" => T_("Invalid empire ID !")
            ));
    }

    if ($rs->fields["protection_turns_left"] != 0)
    $GAME["system"]->redirect("covert.php", array (
            "WARNING" => T_("Empire under protection")
        ));

    $result = PerformCovertOperation($game_id, $empire,$operation, $GAME["empire"]);

    $GAME["empire"]->save();

    $evt = new EventCreator($DB);
    $evt->from = -1;
    $evt->to = $GAME["empire"]->data["id"];
    $evt->type = CONF_EVENT_COVERTOP_RESULT;
    $evt->params = array (
    "result" => $result
    );
    $evt->send();

    $GAME["system"]->redirect("covert.php");
}

////////////////////////////////////////////////////////////////////////////////
// Display page
////////////////////////////////////////////////////////////////////////////////
$GAME["template"]->setPage("covert.html");

/* Populate empires */
$empires = array ();
$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_empire WHERE active='1' AND protection_turns_left = '0' ORDER BY emperor ASC");
while (!$rs->EOF) {
    if ($rs->fields["id"] != $GAME["empire"]->data["id"]) {

        $empire = array ();
        $empire["id"] = $rs->fields["id"];
        $empire["name"] = $GAME["template"]->displayEmpire($rs->fields["emperor"], $rs->fields["name"], false);

        $rs2 = $DB->Execute("SELECT game".$game_id."_tb_coalition.name FROM game".$game_id."_tb_member,game".$game_id."_tb_coalition WHERE game".$game_id."_tb_member.empire='" . $rs->fields["id"] . "' AND game".$game_id."_tb_member.coalition = game".$game_id."_tb_coalition.id");
        if (!$rs2->EOF)
        $empire["name"] .= " [" . $rs2->fields["name"] . "]";

        $empires[] = $empire;

    }

    $rs->MoveNext();
}

$GAME["template"]->setLoop("empires", $empires);

/* Populate operations */
$operations = array ();
for ($i = 0; $i < count($CONF_COVERT_OPERATIONS); $i++) {
    $op = array ();
    $op["id"] = $i;
    $op["name"] = $CONF_COVERT_OPERATIONS[$i]["name"] . " (COST: " . $GAME["template"]->formatNumber($CONF_COVERT_OPERATIONS[$i]["cost_points"]) . " points, " . $GAME["template"]->FormatNumber($CONF_COVERT_OPERATIONS[$i]["cost_credits"]) . " cr.)";

    $operations[] = $op;
}
$GAME["template"]->setLoop("operations", $operations);

$GAME["template"]->setVar("covert_points", $GAME["empire"]->army->data["covert_points"]);

print $GAME["template"]->render();
$DB->CompleteTrans();

?>