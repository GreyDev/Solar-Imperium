<?php

// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //

define("LANGUAGE_DOMAIN","game");

$destroy_empire = false;
if (isset($_GET["YES_DESTROY_IT_PLEASE"])) {
	$destroy_empire = true;
}


require_once("../include/game/init.php");
require_once("../include/game/init_ingame.php");



//////////////////////////////////////////////////////////////////////
// Handle request
//////////////////////////////////////////////////////////////////////

if ($destroy_empire) {

	$GAME["empire"]->delete(); // dont save

	$_SESSION["empire_id"] = null;

	$DB->CompleteTrans();
	header("Location: ../gamesbrowser.php");
	die("<script>window.location='../gamesbrowser.php';</script>");
}


////////////////////////////////////////////////////////////////
// Render page
////////////////////////////////////////////////////////////////

$GAME["template"]->setPage("destroy_empire.html");

$DB->CompleteTrans();
print $GAME["template"]->render();

?> 
