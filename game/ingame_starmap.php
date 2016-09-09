<?php
// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //

define("LANGUAGE_DOMAIN","game");
require_once("../include/game/init.php");
require_once("../include/game/init_ingame.php");


////////////////////////////////////////////////////////////////////////////////////
// Display page
////////////////////////////////////////////////////////////////////////////////////

$GAME["template"]->setPage("starmap_ingame.html");

$empires_data = array();

$rs = $DB->Execute("SELECT SUM(networth) FROM game".$game_id."_tb_empire WHERE active='1'");
$total_networth = $rs->fields[0];

$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_empire WHERE active='1'");
while(!$rs->EOF) {

    $data = array();
    $data["empire"] = str_replace("'","\\'",str_replace("\\","\\\\",stripslashes($rs->fields["name"])));
    $data["emperor"] = str_replace("'","\\'",str_replace("\\","\\\\",stripslashes($rs->fields["emperor"])));
    $data["x"] = $rs->fields["x"];
    $data["y"] = $rs->fields["y"];
    if ($total_networth == 0) $total_networth = 1;
    $data["radius"] = floor(($rs->fields["networth"] / $total_networth)*200);
    $data["networth"]  = $rs->fields["networth"];
    $data["population"] = $rs->fields["population"];
    $data["turns_played"] = $rs->fields["turns_played"];
    $data["img"] = "../images/game/empires/$game_id/".$rs->fields["id"].".jpg";
    if (!file_exists($data["img"])) {
        $data["img"] = "img_logo.php?empire=".$rs->fields["id"];
    }

    $data["separator"] = ",";
    $empires_data[] = $data;
    $rs->MoveNext();
}

if (count($empires_data) != 0) {
    $empires_data[count($empires_data)-1]["separator"] = "";
}

$GAME["template"]->setLoop("empires_data",$empires_data);

// lines
$lines_data = array();


if (isset($_SESSION["empire_id"])) {


    // add diplomacy
    for ($i=0;$i<count($GAME["empire"]->diplomacy->data);$i++) {

        if ($GAME["empire"]->diplomacy->data[$i]["status"] == 0) continue;
        
        $empire_dest = $GAME["empire"]->diplomacy->data[$i]["empire_from"];
        if ($empire_dest == $GAME["empire"]->data["id"]) $empire_dest = $GAME["empire"]->diplomacy->data[$i]["empire_to"];

        $rs  = $DB->Execute("SELECT x,y FROM game".$game_id."_tb_empire WHERE id='".$empire_dest."'");
        $data = array();
        $data["start_x"] = $rs->fields["x"]-5;
        $data["start_y"] = $rs->fields["y"]-5;
        $data["end_x"] = $GAME["empire"]->data["x"]-5;
        $data["end_y"] = $GAME["empire"]->data["y"]-5;
        $data["percent"] = 100;
        $data["convoy_type"] = -1;
        $data["separator"] = ",";
        $lines_data[] = $data;

    }

}


$time_now = time(NULL);

$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_armyconvoy");
while(!$rs->EOF) {

    $data = array();

    $data["separator"] = ",";

    $rs2 = $DB->Execute("SELECT x,y FROM game".$game_id."_tb_empire WHERE id='".$rs->fields["empire_from"]."'");
    $rs3 = $DB->Execute("SELECT x,y FROM game".$game_id."_tb_empire WHERE id='".$rs->fields["empire_to"]."'");


    $time_start = $rs->fields["time_start"];
    $time_end = $rs->fields["time_end"];
    $time_total = $time_end - $time_start;
    $time_elapsed = $time_total - ($time_end - $time_now);
    $percent = $time_elapsed / $time_total;
    $percent *= 100;
    $percent = round($percent);
    if ($percent > 100) $percent = 100;
    if ($percent < 0) $percent = 0;
    $data["percent"] = $percent;
    $data["start_x"] = $rs2->fields["x"];
    $data["start_y"] = $rs2->fields["y"];
    $data["end_x"] = $rs3->fields["x"];
    $data["end_y"] = $rs3->fields["y"];
    $data["convoy_type"] = $rs->fields["convoy_type"];

    $lines_data[] = $data;
    $rs->MoveNext();
}


if (isset($_SESSION["empire_id"])) {

// add trades

    $query ="SELECT * FROM game".$game_id."_tb_tradeconvoy WHERE empire_from='".$GAME["empire"]->data["id"]."' OR empire_to='".$GAME["empire"]->data["id"]."'";
    $rs = $DB->Execute($query);

    while(!$rs->EOF) {

        $rs2 = $DB->Execute("SELECT x,y FROM game".$game_id."_tb_empire WHERE id='".$rs->fields["empire_from"]."'");
        $rs3 = $DB->Execute("SELECT x,y FROM game".$game_id."_tb_empire WHERE id='".$rs->fields["empire_to"]."'");


        $time_start = $rs->fields["time_start"];
        $time_end = $rs->fields["time_end"];
        $time_total = $time_end - $time_start;
        $time_elapsed = $time_end - $time_now;
        $percent = $time_elapsed / $time_total;
        $percent *= 100;
        $percent = round($percent);
        if ($percent > 100) $percent = 100;
        if ($percent < 0) $percent = 0;
                
        $data = array();

        $data["start_x"] = $rs2->fields["x"]+5;
        $data["start_y"] = $rs2->fields["y"]+5;
        $data["end_x"] = $data["start_x"] + floor((($rs3->fields["x"]-$rs2->fields["x"])/100)*$percent);
        $data["end_y"] = $data["start_y"] + floor((($rs3->fields["y"]-$rs2->fields["y"])/100)*$percent);

        $data["convoy_type"] = -2;
        $time_total = $time_end - $time_start;
        $time_elapsed = $time_total - ($time_end - $time_now);
        $data["percent"] = $percent;

        $data["separator"] = ",";
        $lines_data[] = $data;

        $rs->MoveNext();
    }




}

if (count($lines_data) != 0) {
    $lines_data[count($lines_data)-1]["separator"] = "";
}

$GAME["template"]->setLoop("lines_data",$lines_data);

$DB->CompleteTrans();

print $GAME["template"]->render();

?>

