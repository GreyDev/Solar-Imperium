<?php

// define languages availables
$LANGUAGES = array();
$LANGUAGES[] = array("gettext"=>"en_US","name"=>"English");
$LANGUAGES[] = array("gettext"=>"fr_CA","name"=>"French");
$LANGUAGES[] = array("gettext"=>"hu_HU","name"=>"Hungarian");

if (session_id() == "") die("This script need to be called after session initialization!");

// verify is language is already initialized
if (!isset($_SESSION["LANG"])) {
	$_SESSION["LANG"] = "en_US";
}


// set current language
if (isset($_POST["LANG"])) $_GET["LANG"] = $_POST["LANG"];

if (isset($_GET["LANG"])) {

	$lang = $_GET["LANG"];
	$lang = str_replace(".","",$lang);
	$lang = str_replace("/","",$lang);
	$lang = str_replace("<","",$lang);
	$lang = str_replace(">","",$lang);
	$lang = str_replace("\\","",$lang);

	$found = false;
	for ($i=0;$i<count($LANGUAGES);$i++) {
		
		if ($lang == $LANGUAGES[$i]["gettext"]) {
			$found = true;
			break;

		}

	}
	
	if ($found == false) die("Invalid language specified: ".$lang);
	$_SESSION["LANG"] = $lang;

}

// set gettext
require_once("thirdparty/gettext/gettext.inc");

// gettext setup
T_setlocale(LC_MESSAGES, $_SESSION["LANG"]);
if (!defined("LANGUAGE_DOMAIN")) define("LANGUAGE_DOMAIN","message");

if (defined("CALLED_FROM_GAME_INIT"))
	$locales_dir = realpath("./../locale");
else
	$locales_dir = realpath("./locale");


T_bindtextdomain(LANGUAGE_DOMAIN, $locales_dir);
T_bind_textdomain_codeset(LANGUAGE_DOMAIN, "UTF-8");
T_textdomain(LANGUAGE_DOMAIN);

header("Content-type: text/html; charset=UTF-8");


?>
