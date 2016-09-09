<?php


// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //

define("LANGUAGE_DOMAIN","game");

require_once ("../include/game/init.php");
require_once ("../include/game/init_ingame.php");

$max_lightcruisers = floor($GAME["empire"]->data["credits"] / CONF_BLACKMARKET_PRICE_LIGHTCRUISERS);

if ($GAME["empire"]->data["blackmarket"]==0) $GAME["system"]->redirect("manage.php");

//////////////////////////////////////////////////////////////////////////////////////////////////////
// buy light cruisers
//////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_GET["buy_lightcruisers"])) {
    $qty = str_replace(",","",$_GET["buy_lightcruisers"]);
    $qty = intval($qty);

    if ($qty > $max_lightcruisers) {
        $GAME["system"]->redirect("blackmarket.php",array("WARNING"=>T_("Invalid light cruisers quantity !")));
    }

    if (($qty * CONF_BLACKMARKET_PRICE_LIGHTCRUISERS) > $GAME["empire"]->data["credits"]) {
        $GAME["system"]->redirect("blackmarket.php",array("WARNING"=>T_("No enough credits !")));
    }


    $GAME["empire"]->data["credits"] -= ($qty * CONF_BLACKMARKET_PRICE_LIGHTCRUISERS);
    $GAME["empire"]->army->data["lightcruisers"] += $qty;
    $GAME["empire"]->data["blackmarket"] = 0;
    $GAME["empire"]->save();

    $GAME["system"]->redirect("manage.php",array("NOTICE"=>T_("light cruisers bought!")));
}


//////////////////////////////////////////////////////////////////////////////////////////////////////
// buy protection
//////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_GET["buy_extraprotection"])) {

    if ($GAME["empire"]->data["protection_turns_left"] > 0)
    $GAME["system"]->redirect("blackmarket.php",array("WARNING"=>T_("You are already under protection!")));

    if ($GAME["empire"]->data["credits"] < CONF_BLACKMARKET_PRICE_EXTRAPROTECTION)
    $GAME["system"]->redirect("blackmarket.php",array("WARNING"=>T_("No enough credits!")));

    $GAME["empire"]->data["credits"] -= CONF_BLACKMARKET_PRICE_EXTRAPROTECTION;
    $GAME["empire"]->data["protection_turns_left"] += 4;
    $GAME["empire"]->data["blackmarket"] = 0;
    $GAME["empire"]->save();

    $GAME["system"]->redirect("manage.php",array("NOTICE"=>T_("Extra protection bought!")));



}

//////////////////////////////////////////////////////////////////////////////////////////////////////
// buy nuke
//////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_GET["buy_nuke"])) {

    if ($GAME["empire"]->data["credits"] < CONF_BLACKMARKET_PRICE_NUKES)
    $GAME["system"]->redirect("blackmarket.php",array("WARNING"=>T_("No enough credits !")));

    if ($GAME["empire"]->data["have_nukes"]==1) {
        $GAME["system"]->redirect("blackmarket.php",array("WARNING"=>T_("You already have nukes!")));
    }

    $GAME["empire"]->data["have_nukes"] = 1;
    $GAME["empire"]->data["blackmarket"] = 0;
    $GAME["empire"]->save();


    $evt = new EventCreator($DB);
    $evt->type = CONF_EVENT_EMPIRE_BUY_NUKES;
    $evt->from = $GAME["empire"]->data["id"];
    $evt->broadcast();


    $GAME["system"]->redirect("manage.php",array("NOTICE"=>T_("Nuke bought!")));
}

//////////////////////////////////////////////////////////////////////////////////////////////////////
// buy teleport
//////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_GET["buy_teleport"])) {

    if ($GAME["empire"]->data["credits"] < CONF_BLACKMARKET_PRICE_EXTRAPROTECTION)
    $GAME["system"]->redirect("blackmarket.php",array("WARNING"=>T_("No enough credits !")));


    $GAME["empire"]->data["population"] = floor($GAME["empire"]->data["population"]/2);


    srand(time(NULL));
    do {
        $x = -950+rand(0,1900);
        $y = -950+rand(0,1900);
        $rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_empire WHERE (x>=".($x-50)." AND x<=".($x+50).") AND (y>=".($y-50)." AND y<=".($y+50).")");

    } while(!$rs->EOF);

    $GAME["empire"]->data["x"] = $x;
    $GAME["empire"]->data["y"] = $y;
    $GAME["empire"]->data["blackmarket"] = 0;
    $GAME["empire"]->save();

    $evt = new EventCreator($DB);
    $evt->type = CONF_EVENT_EMPIRE_TELEPORTED;
    $evt->from = $GAME["empire"]->data["id"];
    $evt->params = array("empire_id"=>$GAME["empire"]->data["id"],"empire_name"=>$GAME["empire"]->data["name"],"empire_emperor"=>$GAME["empire"]->data["emperor"],"gender"=>$GAME["empire"]->data["gender"]);
    $evt->broadcast();

    $GAME["system"]->redirect("manage.php",array("NOTICE"=>T_("Teleportation successfully done!")));

    // do not modify convoys
}


// render

$GAME["template"]->setPage("blackmarket.html");

$GAME["template"]->setVar("price_lightcruisers",CONF_BLACKMARKET_PRICE_LIGHTCRUISERS);
$GAME["template"]->setVar("max_lightcruisers",$max_lightcruisers);


$GAME["template"]->setVar("price_nukes",CONF_BLACKMARKET_PRICE_NUKES);
$GAME["template"]->setVar("price_teleport",CONF_BLACKMARKET_PRICE_TELEPORT);
$GAME["template"]->setVar("price_extraprotection",CONF_BLACKMARKET_PRICE_EXTRAPROTECTION);

print $GAME["template"]->render();

?>