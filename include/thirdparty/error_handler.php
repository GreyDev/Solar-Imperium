<?php

	/********************************************************************************************
	 *
	 * SOLAR IMPERIUM project, released under GPL 2 (see LICENSE.TXT)
	 * ------------------------------------------------------------------------------------------
	 * By Yanick Bourbeau @ MRG Technologies '2006 (ybourbeau@mrgtech.ca)
	 * ------------------------------------------------------------------------------------------
	 *
	 * 2.0 Release: 2006-04-15 :: File created (ybo)
	 *
	 *********************************************************************************************/

// configuration
//define("MRGERR_DEBUG_VERBOSE",true); // Display verbose debug to web user
//define("MRGERR_DEBUG_SENDMAIL",false); // Send a email containing debug information
define("MRGERR_DEBUG_VERBOSE",true); // Display verbose debug to web user
define("MRGERR_DEBUG_SENDMAIL",false); // Send a email containing debug information
define("MRGERR_SMTP_SERVER","127.0.0.1");
define("MRGERR_SMTP_MAILFROM","ybourbeau@mrgtech.ca");
define("MRGERR_SMTP_MAILTO","ybourbeau@mrgtech.ca");

$MRGERR_ERROR_TYPES = array();
$MRGERR_ERROR_TYPES[E_ERROR] = array("E_ERROR","Fatal Error");
$MRGERR_ERROR_TYPES[E_WARNING] = array("E_WARNING","Warning");
$MRGERR_ERROR_TYPES[E_PARSE] = array("E_PARSE","Parse Error");
$MRGERR_ERROR_TYPES[E_NOTICE] = array("E_NOTICE","Notice");
$MRGERR_ERROR_TYPES[E_CORE_ERROR] = array("E_CORE_ERROR","Fatal Core Error");
$MRGERR_ERROR_TYPES[E_CORE_WARNING] = array("E_CORE_WARNING","Fatal Core Warning");
$MRGERR_ERROR_TYPES[E_COMPILE_ERROR] = array("E_COMPILE_ERROR","Fatal Compile Error");
$MRGERR_ERROR_TYPES[E_COMPILE_WARNING] = array("E_COMPILE_WARNING","Fatal Compile Warning");
$MRGERR_ERROR_TYPES[E_USER_ERROR] = array("E_ERROR","Fatal User Error");
$MRGERR_ERROR_TYPES[E_USER_WARNING] = array("E_WARNING","User Warning");
$MRGERR_ERROR_TYPES[E_USER_NOTICE] = array("E_NOTICE","User Notice");
$MRGERR_ERROR_TYPES[E_STRICT] = array("E_STRICT","Strict Code");
$MRGERR_ERROR_TYPES[E_DEPRECATED] = array("E_DEPRECATED","Deprecated Code");

// required initialization
error_reporting(E_ALL);
ini_set('display_errors',true);
ini_set('display_startup_errors',true);
ob_start();

// if you want to use smtp under unix
ini_set('SMTP',MRGERR_SMTP_SERVER);


function MRG_error_handler_HTML_template()
{
	$body = "
	<html>
	<head>
	<title>Oops ... {title}</title>
	</head>
	<body bgcolor=\"#aaaaaa\">
	<table align=\"center\" bgcolor=\"darkred\" width=\"90%\">
	<tr>
	<td style=\"color:yellow;font-size:13px;font-family:verdana\"><b>Oops ... {title}</b>
	</td>
	</tr>
	<tr>
	<td bgcolor=\"#cacaca\">
	<table cellspacing=\"0\" width=\"100%\" cellpadding=\"5\"><tr><td style=\"color:black;font-size:13px;font-family:verdana\">
	{body}
	</td></tr></table>
	</td>
	</tr>
	<tr>
	<td align=\"right\" style=\"color:yellow;font-size:10pt;font-family:verdana\">{platform}
	</td>
	</tr>
	</table>
	</body>
	</html>
	";
	return $body;
}

function MRG_error_handler_list_HTML($title,$listing)
{
	$html = "<table width=\"100%\"><tr><td colspan=\"2\" style=\"font-size:13px;font-family:verdana;color:darkred\"><b>".$title."</td></tr>\r\n";

	reset($listing);
	$count = 0;
	while(list($key,$value) = each($listing))
	{
		$bgcolor = ($count++%2==1?"#dedede":"#efefef");

		$html .= "<tr><td bgcolor=\"".$bgcolor."\"><b>$key</b></td><td width=\"100%\" bgcolor=\"".$bgcolor."\">$value</td></tr>\r\n";
	}

	$html .= "</table>\r\n<br/>";

	return $html;
}

function MRG_error_handler($errno, $errstr, $errfile, $errline)
{
	global $MRGERR_ERROR_TYPES;
	ob_clean();

	$html = MRG_error_handler_HTML_template();
        $html = str_replace("{title}",$MRGERR_ERROR_TYPES[$errno][1]." : ".$errstr,$html);

	$html = str_replace("{platform}","PHP ". PHP_VERSION ." (".PHP_OS.")",$html);

	$body = "";
	$body .=  "<br/><div align=\"center\">$errstr in <b>$errfile:$errline</b></div><br/>\n";
	$body_short = $body;

	// code
	$body .= "<b style=\"font-size:13px;font-family:verdana;color:darkred\">Error line in $errfile: </b>";
	$body .= "<table width=\"100%\" style=\"font-size:10pt;font-family:verdana\">";

	$line = $errline - 4;
	$code = file($errfile);
	for ($i=$line;$i<($errline+3);$i++)
	{
		$bgcolor = ($i%2==0?"#dedede":"#efefef");
		if (($i+1) == $errline) $bgcolor = "#FF9999";

		if (isset($code[$i]))
		{
			if (($i+1) == $errline)
			{
				$body .=  "<tr><td bgcolor=\"".$bgcolor."\" style=\"color:#666666;font-size:13px;font-family:verdana\"><i>".str_pad($i,6,0,STR_PAD_LEFT)."</i></td>
				<td width=\"100%\" bgcolor=\"".$bgcolor."\" style=\"color:darkred;font-size:13px;font-family:verdana\"><b>".str_replace("\t","&nbsp;&nbsp;&nbsp;&nbsp;",$code[$i])."</b></td></tr>";
			} else {
				$body .=  "<tr><td bgcolor=\"".$bgcolor."\" style=\"color:#666666;font-size:13px;font-family:verdana\"><i>".str_pad($i,6,0,STR_PAD_LEFT)."</i></td>
				<td width=\"100%\" bgcolor=\"".$bgcolor."\" style=\"color:black;font-size:13px;font-family:verdana\">".str_replace("\t","&nbsp;&nbsp;&nbsp;&nbsp;",$code[$i])."</td></tr>";
			}
		}

	}

	$body .= "</table>";
	$body .= "<br/>";
	$body .= "<b style=\"font-size:13px;font-family:verdana;color:darkred\">Execution backtrace: </b>";

	// backtrace
	$bt = debug_backtrace();

	$body .= "<table width=\"100%\" style=\"font-size:10pt;font-family:verdana\">";
	$line = $errline - 4;
	$code = file($errfile);

	$count = 0;


	while (list($key,$value) = each($bt))
	{
		if ($count == 0) { $count++; continue; }
		$bgcolor = ($count++%2==0?"#dedede":"#efefef");
		if (!isset($value["args"])) $value["args"] = "";

		if (is_array($value["args"])) 
			$args = serialize($value["args"]);
		else
			$args = @implode(",",$value["args"]);

		$body .=  "<tr><td bgcolor=\"".$bgcolor."\" style=\"color:#666666;font-size:13px;font-family:verdana\"><i>".$value["file"].":".$value["line"]."</i></td>
				<td width=\"100%\" bgcolor=\"".$bgcolor."\" style=\"color:black;font-size:13px;font-family:verdana\">".$value["function"]."(<b>".$args."</b>)</td></tr>";

	}

	$body .= "</table>";
	$body .= "<br/>";


	if (isset($_SESSION) && (count($_SESSION)!=0))
	{
		// session variables
		$body .=  MRG_error_handler_list_HTML("Session Variables:",$_SESSION);
	}


	if (isset($_POST) && (count($_POST)!=0))
	{
		// posted variables
		$body .=  MRG_error_handler_list_HTML("POST Variables:",$_POST);
	}

	if (isset($_GET) && (count($_GET)!=0))
	{
		// get variables
		$body .=  MRG_error_handler_list_HTML("GET Variables:",$_GET);
	}

	// $_SERVER contents
	if (isset($_SERVER) && (count($_SERVER)!=0))
	{
		// server variables
		$body .=  MRG_error_handler_list_HTML("SERVER Variables:",$_SERVER);
	}

	// DEFINED variables

	$const = get_defined_vars();
	unset($const["html"]);
	unset($const["body"]);
	unset($const["body_short"]);

	if (isset($const) && (count($const)!=0))
	{
		// server variables
		$body .=  MRG_error_handler_list_HTML("USER Defined Variables:",$const);
	}

	
	// functions in scope
	$funct = get_defined_functions();
	$funct = @$funct["user"];

	if (isset($funct) && (count($funct)!=0))
	{
		// server variables
		$body .=  MRG_error_handler_list_HTML("USER Defined Functions:",$funct);
	}


	// Sending email
	if (MRGERR_DEBUG_SENDMAIL==true)
	{

		// To send HTML mail, the Content-type header must be set
		$headers  = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

		// Mail it
	   $fd = fsockopen (MRGERR_SMTP_SERVER, 25);
	   $failed = false;

 	   if ($fd) {

			fputs($fd, "HELO foreigner\n");
	  	 	$res=fgets($fd,256);
	  	 	if(substr($res,0,3) == "220")	$res=fgets($fd,256);
  			if(substr($res,0,3) != "250") { print $res; $failed = true; }

	   	fputs($fd, "MAIL FROM: <".MRGERR_SMTP_MAILFROM.">\n");
	   	$res=fgets($fd,256);
	  	if(substr($res,0,3) != "250") $failed = true;

	   	fputs($fd, "RCPT TO: <".MRGERR_SMTP_MAILTO.">\n");
	   	$res=fgets($fd,256);
	 	   if(substr($res,0,3) != "250") $failed = true;

	  	fputs($fd, "DATA\n");
	  	$res=fgets($fd,256);
	  	if(substr($res,0,3) != "354") $failed = true;

		   fputs($fd, "To: ".MRGERR_SMTP_MAILTO."\nFrom: ".MRGERR_SMTP_MAILFROM."\nSubject: ".$errstr." in ".$errfile.":".$errline."\n$headers\n\n".$body."\n.\n");
  			$res=fgets($fd,256);
  			if(substr($res,0,3) != "250") $failed = true;

			fputs($fd,"QUIT\n");
			$res=fgets($fd,256);
  			if(substr($res,0,3) != "221") $failed = true;

			if ($failed == false)
			{
				$body_short .= "<div align=\"center\" style=\"font-size:14pt;font-family:verdana;color:blue;\"><b>A complete report was sent to the code maintainer</b></div><br/>";
				$body .= "<div align=\"center\" style=\"font-size:14pt;font-family:verdana;color:blue;\"><b>A complete report was sent to the code maintainer</b></div><br/>";
			}

		}

		/////////
	}

	if (MRGERR_DEBUG_VERBOSE==true) {
		$html = str_replace("{body}",$body,$html);
	} else {
		$html = str_replace("{body}",$body_short,$html);
	}


	die($html);
}


set_error_handler("MRG_error_handler");

?>
