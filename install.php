<?php

// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //


$pos = strpos($_SERVER["SCRIPT_NAME"],"install.php_old");
if ($pos === FALSE) {
	// do nothing
} else {
	die("Installer disabled.");
}

/*
 * Remove file
 */
if (isset($_GET["REMOVE"])) {

	if (!is_writable("install.php")) die("<b>Unable to rename 'install.php' to 'install.php_old'! Please remove the file manually.</b>");
	if (!is_writable("."))  die("<b>Unable to rename 'install.php' to 'install.php_old'! Please remove the file manually.</b>");
	rename("install.php","install.php_old");
	die(header("Location: index.php"));
}


require_once("include/thirdparty/adodb/adodb.inc.php");
require_once("include/thirdparty/smarty/Smarty.class.php");
require_once("include/thirdparty/error_handler.php");

// basic PHP initialization

function phpnum() {
$version = explode('.', phpversion());
return (int) $version[0];
}
function is_php5() { return phpnum() == 5; }
function is_php4() { return phpnum() == 4; }

if (is_php5()) {
	 date_default_timezone_set("America/Montreal"); 
}


ob_start();	// output buffering


// if 'register_globals' directive is active, halt the process
if (ini_get("register_globals")==1)
{
	die("Disable register_globals PHP Directive!");
}

$TPL = new Smarty;
$TPL->template_dir = "templates/installer/";
$TPL->compile_dir = "templates_c/installer/";

$current_page = 1;
if (isset($_GET["page"])) $current_page = intval($_GET["page"]);

if (file_exists("include/config.php")) $current_page = 4;

if ($current_page < 1) $current_page = 1;
if ($current_page > 4) $current_page = 4;

/**
 * Page 1
 */
if ($current_page == 1) {

	$TPL->display("page".$current_page.".html");
	die();
}

/**
 * Page 2
 */

if ($current_page == 2) {

	$output = "";

    $ex = get_loaded_extensions();
	$ok_count = 0;
    
    // Check for required extensions
    $extensions = array();
    $extensions[] = "mbstring";
    $extensions[] = "gd";
    $extensions[] = "mysqli";

    for ($i=0;$i<count($extensions);$i++) {

        if (in_array($extensions[$i], $ex)) {
            $ok_count++;
			$output .= "Extension <b>".$extensions[$i]."</b> :: <b style=color:blue>Found</b><br/>";
        } else {
            $output .= "Extension <b>".$extensions[$i]."</b> :: <b style=color:red>Missing</b><br/>";
		}
    }

    // Checkf ro valid paths
	$paths = array();
	$paths[] = "images/game/empires/";
	$paths[] = "include/game/games_config/";
	$paths[] = "include/game/games_rules/";
	$paths[] = "templates_c/";
	$paths[] = "templates_c/game/";
	$paths[] = "templates_c/system/";


	for ($i=0;$i<count($paths);$i++) {
		
		if (file_exists($paths[$i])) {

			if (is_writable($paths[$i])) {
				$ok_count++;
				$output .= "Path <b>".$paths[$i]."</b> :: <b style=color:blue>Writable</b><br/>";
			} else {
				$output .= "Path <b>".$paths[$i]."</b> :: <b style=color:red>Not Writable!</b><br/>";
			}

		} else {
		
			$path = explode("/",$paths[$i]);
			$parent_path = "";
			for ($j=0;$j<(count($path)-2);$j++) {
				$parent_path .= $path[$j]."/";
				
			}

			if (!is_writable($parent_path)) {
				$output .= $paths[$i]." :: <b style=color:red>Not Found! Unable to create!</b><br/>";

			} else {
				if (!mkdir($paths[$i],0777)) {
					$output .= $paths[$i]." :: <b style=color:red>Not Found!</b><br/>";
				} else {
					$output .= $paths[$i]." :: <b style=color:blue>Not Found but created</b><br/>";
					$ok_count++;
				}
			}

		}
		
		
	}
	if ($ok_count != (count($paths) + count($extensions))) $output .= "<br/><b style=color:red>*** Please fix theses isssues before continuing ***</b><br/>";
	
	$TPL->assign("output",$output);
	$TPL->display("page".$current_page.".html");
	die();
}

/**
 * Page #3
 */
if ($current_page==3) {
	
	if (!isset($_POST["db_driver"])) die("Invalid post data.");
	
	$db_driver = $_POST["db_driver"];
	$db_hostname = $_POST["db_hostname"];
	$db_name = $_POST["db_name"];
	$db_username = $_POST["db_username"];
	$db_password1 = $_POST["db_password1"];
	$db_password2 = $_POST["db_password2"];
	if ($db_password1 != $db_password2) die("Passwords don't matches!");
	$db_password = $db_password1;
	$output = "";
	
	$DB = NewADOConnection($db_driver);
	if (!$DB->Connect($db_hostname,$db_username,$db_password,"")) die(trigger_error($DB->ErrorMsg()));

	$query = "DROP DATABASE ".addslashes($db_name);
	$DB->Execute($query);

	$query = "CREATE DATABASE ".addslashes($db_name);
	$DB->Execute($query);

	if (!$DB->Connect($db_hostname,$db_username,$db_password,$db_name)) die(trigger_error($DB->ErrorMsg()));

	$sql_data = file_get_contents("include/sql_base.txt");
	$sql_data = explode("/***/",$sql_data);
	for ($i=0;$i<count($sql_data);$i++) 
		if (!$DB->Execute($sql_data[$i])) die(trigger_error($DB->ErrorMsg()));

	$output .= "Database correctly configured. Click on continue button to complete installation.";
	
	$config_data = file_get_contents("include/config_orig.php");
	$config_data = str_replace("{db_hostname}",$db_hostname,$config_data);
	$config_data = str_replace("{db_name}",$db_name,$config_data);
	$config_data = str_replace("{db_username}",$db_username,$config_data);
	$config_data = str_replace("{db_password}",$db_password,$config_data);
	$config_data = str_replace("{db_driver}",$db_driver,$config_data);
	
	$fd = fopen("include/config.php","w");
	fwrite($fd,$config_data);
	fclose($fd);
	
	$TPL->assign("output",$output);
	$TPL->display("page".$current_page.".html");
	die();
}

if ($current_page == 4) {
	$TPL->display("page".$current_page.".html");
	die();
}

?>
