<?php

// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //

define("LANGUAGE_DOMAIN","game");

require_once("../include/game/init.php");
require_once("../include/game/init_ingame.php");


$re_subject = "";
$content = "";

//////////////////////////////////////////////////////////////////////////////////////////
// Handle requests
//////////////////////////////////////////////////////////////////////////////////////////
if (isset($_GET["delete"])) {
        $id = intval($_GET["delete"]);
        $rs = $DB->Execute("DELETE FROM game".$game_id."_tb_event WHERE event_type='".CONF_EVENT_MESSAGE.
        "' AND event_to='".$_SESSION["empire_id"]."' AND id=$id");
}


if ((isset($_POST["subject"])) && (isset($_POST["content"])))
{
	$subject = $GAME["system"]->filterText($_POST["subject"],255);
	$recipient = $_POST["recipient"];
	$content = $GAME["system"]->filterText($_POST["content"],4096);

	if ($recipient == -2) {
		if (!$GAME["empire"]->coalition->isMember()) {
			
			$GAME["system"]->redirect("messages.php",array("WARNING"=>T_("You need to be in a coalition!")));
			
		}
	}
	
	if ($subject == "") { 
			$GAME["system"]->redirect("messages.php",array("WARNING"=>T_("Empty message subject!")));
	}

	if ($content == "") { 
			$GAME["system"]->redirect("messages.php",array("WARNING"=>T_("Empty message content!")));		
	}
		
	if ($recipient == -1) $subject = "*".strtoupper(T_("Public"))."* ".$subject;
	if ($recipient == -2) $subject = "*".strtoupper(T_("Coalition"))."* ".$subject;
		
	if ($recipient != -3)  {			
		$query = "SELECT * FROM game".$game_id."_tb_empire WHERE active = '1'"; //  AND NOT id = ".$GAME["empire"]->data <- BUGGY
		$rs = $DB->Execute($query);
		while(!$rs->EOF)
		{
			if (($rs->fields["id"] == $recipient) || ($recipient == -1))
			{
				$content = str_replace("\n","<br/>",$content);

				$evt = new EventCreator($DB);
				$evt->type = CONF_EVENT_MESSAGE;
				$evt->from = $_SESSION["empire_id"];
				$evt->to = $rs->fields["id"];
				$evt->params = array("subject"=>addslashes($subject),"content"=>addslashes($content));
				$evt->send();
								
			}

			if ($recipient == -2)
			{
					$rs2 = $DB->Execute("SELECT coalition FROM game".$game_id."_tb_member WHERE empire='".$rs->fields["id"]."'");
					if ((!$rs2->EOF) && ($rs2->fields["coalition"] == $GAME["empire"]->coalition->data["id"]))
					{
							$evt = new EventCreator($DB);
							$evt->type = CONF_EVENT_MESSAGE;
							$evt->from = $_SESSION["empire_id"];
							$evt->to = $rs->fields["id"];
							$evt->params = array("subject"=>addslashes($subject),"content"=>addslashes($content));
							$evt->send();
					}
					
			}


			$rs->MoveNext();
		}

		$GAME["system"]->redirect("messages.php",array("NOTICE"=>T_("Message successfully sent!")));		
		
	}
	$content = "";
		
}

$use_recipient = -1;
	
if (isset($_GET["empire_id"])) $use_recipient = intval($_GET["empire_id"]);
if (isset($_GET["id"])) {
  $id = intval($_GET["id"]);

  $rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_event WHERE id='$id'");
  if ($rs->EOF) die("Fatal error, invalid id");
  $params = unserialize($rs->fields["params"]);
  $use_recipient = $rs->fields["event_from"];

  $re_subject = "RE: ".stripslashes($params["subject"]);
  $content = stripslashes($params["content"]);
  $content = str_replace("<br/>","\r\n",$content);
  $content_array = explode("\r\n",$content);
  $content = "";
  for ($i=0;$i<count($content_array);$i++)
	  $content .= "// ".$content_array[$i];	
}

//////////////////////////////////////////////////////////////////////////////////////////
// Display page
//////////////////////////////////////////////////////////////////////////////////////////

$GAME["template"]->setPage("messages.html");
$GAME["template"]->setVar("msg_re_subject",$re_subject);
$GAME["template"]->setVar("msg_content",$content);


/* Populating empires/recipients */
$recipients = array();

$query = "SELECT * FROM game".$game_id."_tb_empire WHERE active = '1' ORDER BY emperor ASC";
$rs = $DB->Execute($query);
while (!$rs->EOF)
{
	$recipient = array();
	$recipient["id"] = $rs->fields["id"];
	$recipient["selected"] = "";
	
	 if ($rs->fields["id"] == $use_recipient) $recipient["selected"] = "selected";
	
	$recipient["name"] = $GAME["template"]->displayEmpire($rs->fields["emperor"],$rs->fields["name"],$GAME["empire"]->data["networth"]);

	$rs2 = $DB->Execute("SELECT game".$game_id."_tb_coalition.name FROM game".$game_id."_tb_member,game".$game_id."_tb_coalition WHERE game".$game_id."_tb_member.empire=".$rs->fields["id"]." AND game".$game_id."_tb_member.coalition = game".$game_id."_tb_coalition.id");
	if (!$rs2->EOF) $recipient["name"] .= " [".$rs2->fields["name"]."]";

	$recipients[] = $recipient;
	$rs->MoveNext();
}

$GAME["template"]->setLoop("recipients",$recipients);



$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_event WHERE event_type='".CONF_EVENT_MESSAGE.
"' AND event_to='".$_SESSION["empire_id"]."' ORDER BY date DESC LIMIT 0,40");
$content = "";
while(!$rs->EOF)
{
	$content .= $GAME["template"]->showMessage($rs->fields)."<br/>";
	$rs->MoveNext();
}

$GAME["template"]->setVar("messages",$content);



print $GAME["template"]->render();
$DB->CompleteTrans();

?>