<?php

// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //

define("LANGUAGE_DOMAIN","game");

require_once("../include/game/init.php");
require_once("../include/game/init_ingame.php");


//////////////////////////////////////////////////////////////////////
// Handle request
//////////////////////////////////////////////////////////////////////

/* Kicked from coalition */
if (isset($_GET["coalition_transferownership"]))
{
		if (!$GAME["empire"]->coalition->isOwner()) $GAME["system"]->redirect("diplomacy.php",array("WARNING"=>T_("You need to be the owner!")));
		$new_empire = intval($_GET["coalition_transferownership"]);
		if ($GAME["empire"]->data["id"] == $new_empire) 
				$GAME["system"]->redirect("diplomacy.php",array("WARNING"=>T_("You are already the owner!")));
		
		$GAME["empire"]->coalition->transferOwnership($new_empire);		
		$GAME["system"]->redirect("diplomacy.php",array("NOTICE"=>T_("Coalition ownership successfully transfered")));
}

/* Kicked from coalition */
if (isset($_GET["coalition_kick"]))
{
	$id = intval($_GET["coalition_kick"]);
	
	if (!$GAME["empire"]->coalition->isMember()) 
		$GAME["system"]->redirect("diplomacy.php",array("WARNING"=>T_("You need to be in a coalition!")));
	
	if (($_SESSION["empire_id"] != $id) && (!$GAME["empire"]->coalition->isOwner()))
		$GAME["system"]->redirect("diplomacy.php",array("WARNING"=>T_("You need to be the coalition owner!")));
	
	if (!$GAME["empire"]->coalition->isMemberFromId($id)) 
		$GAME["system"]->redirect("diplomacy.php",array("WARNING"=>T_("Invalid empire ID!")));
	
	if ($GAME["empire"]->coalition->isOwnerFromId($id)) 
		$GAME["system"]->redirect("diplomacy.php",array("WARNING"=>T_("You can't kick a coalition owner!")));

	$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_empire WHERE id='$id'");
	if ($rs->EOF) 
			$GAME["system"]->redirect("diplomacy.php",array("WARNING"=>T_("Invalid empire ID!")));

	$GAME["empire"]->coalition->kickMember($id);
	$GAME["system"]->redirect("diplomacy.php",array("NOTICE",T_("Empire kicked from coalition")));
}

/* Accept to join a coalition */
if (isset($_GET["coalition_yes"]))
{

	$id = intval($_GET["coalition_yes"]);

	$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_member WHERE empire='$id' AND level='1'");
	if ($rs->EOF) $GAME["system"]->redirect("diplomacy.php",array("WARNING"=>T_("Invalid coalition ID!")));
	$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_coalition WHERE id='".$rs->fields["coalition"]."'");
	
	if (isset($_SESSION["member"])) $GAME["system"]->redirect("diplomacy.php",array("WARNING"=>T_("Invalid coalition ID!")));
	
	
	$count = $DB->Execute("SELECT COUNT(*) FROM game".$game_id."_tb_member WHERE coalition='".$rs->fields["id"]."'");
	$count = $count->fields[0];
	if ($count > CONF_MAXIMUM_COALITION_MEMBERS) {
		$GAME["system"]->redirect("diplomacy.php",array("WARNING"=>T_("Sorry, this coalition is full!")));	
	}
	
	$query = "INSERT INTO game".$game_id."_tb_member (date,empire,coalition,level)
	VALUES(
	'".time(NULL)."',
	'".$GAME["empire"]->data["id"]."',
	'".$rs->fields["id"]."',
	'0'
	);";

	$DB->Execute($query);

	// etablish a default treaty [major alliance] to every member
	$rs2 = $DB->Execute("SELECT * FROM game".$game_id."_tb_member WHERE coalition='".$rs->fields["id"]."' AND empire <> ".$GAME["empire"]->data["id"]);	
	while(!$rs2->EOF)
	{
		
		$DB->Execute("DELETE FROM game".$game_id."_tb_treaty WHERE empire_from='".$GAME["empire"]->data["id"]."' AND empire_to='".$rs2->fields["empire"]."'");	
		$DB->Execute("DELETE FROM game".$game_id."_tb_treaty WHERE empire_to='".$GAME["empire"]->data["id"]."' AND empire_from='".$rs2->fields["empire"]."'");	
		
		$DB->Execute("INSERT INTO game".$game_id."_tb_treaty (empire_from,empire_to,type,date,status) VALUES('".$GAME["empire"]->data["id"]."','".$rs2->fields["empire"]."','2','".time(NULL)."','".CONF_TREATY_ACCEPTED."')");
		$rs2->MoveNext();
		
	}

	$query = "DELETE FROM game".$game_id."_tb_event WHERE event_to='".$GAME["empire"]->data["id"]."' AND event_from='".$id."' AND event_type='".CONF_EVENT_COALITION_INVITE."';";	
	$DB->Execute($query);
	$query = "DELETE FROM game".$game_id."_tb_event WHERE event_to='".$id."' AND event_from='".$GAME["empire"]->data["id"]."' AND event_type='".CONF_EVENT_COALITION_INVITE."';";
	$DB->Execute($query);
	

	$evt = new EventCreator($DB);
	$evt->type = CONF_EVENT_COALITION_JOINED;
	$evt->from = $GAME["empire"]->data["id"];
	$evt->to = addslashes($id);
	$evt->params  = array("empire_id"=>$GAME["empire"]->data["id"],"empire_name"=>$GAME["empire"]->data["name"],"empire_emperor"=>$GAME["empire"]->data["emperor"],"gender"=>$GAME["empire"]->data["gender"]);
	$evt->send();	

	$GAME["system"]->redirect("diplomacy.php",array("NOTICE"=>T_("Coalition invitation accepted")));
	

}


/* Decline a invitation */
if (isset($_GET["coalition_no"]))
{
	$id = intval($_GET["coalition_no"]);


	$query = "DELETE FROM game".$game_id."_tb_event WHERE event_to='".$GAME["empire"]->data["id"]." AND event_from='$id' AND event_type='".CONF_EVENT_COALITION_INVITE."';";	
	$DB->Execute($query);
	$query = "DELETE FROM game".$game_id."_tb_event WHERE event_to='$id' AND event_from='".$GAME["empire"]->data["id"]."' AND event_type='".CONF_EVENT_COALITION_INVITE."';";	
	$DB->Execute($query);


	$evt = new EventCreator($DB);
	$evt->type = CONF_EVENT_COALITION_REFUSED;
	$evt->from = $GAME["empire"]->data["id"];
	$evt->to = addslashes($id);
	$evt->params  = array("empire_id"=>$GAME["empire"]->data["id"],"empire_name"=>$GAME["empire"]->data["name"],"empire_emperor"=>$GAME["empire"]->data["emperor"],"gender"=>$GAME["empire"]->data["gender"]);
	$evt->send();	
	
	
	$GAME["system"]->redirect("diplomacy.php",array("NOTICE"=>T_("Coalition invitation refused")));
			

}


/* Invite someone into a coalition */
if (isset($_POST["coalition_invite"]))
{
	
	$id = intval($_POST["coalition_invite"]);

	if (!$GAME["empire"]->coalition->isOwner())
		$GAME["system"]->redirect("diplomacy.php",array("WARNING"=>T_("You need to be the coalition owner!")));

	$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_empire WHERE active='1' AND id='$id'");
		
	if ($rs->EOF) {
		$GAME["system"]->redirect("diplomacy.php",array("WARNING"=>T_("Invalid empire ID!")));
	}
	
	$rs2 = $DB->Execute("SELECT * FROM game".$game_id."_tb_member WHERE empire='$id'");
	if (!$rs2->EOF) {
		$GAME["system"]->redirect("diplomacy.php",array("WARNING"=>T_("This empire is already in another coalition!")));	
	}

	$count = $DB->Execute("SELECT COUNT(*) FROM game".$game_id."_tb_member WHERE coalition='".$rs->fields["id"]."'");
	$count = $count->fields[0];
	if ($count > CONF_MAXIMUM_COALITION_MEMBERS) {
		$GAME["system"]->redirect("diplomacy.php",array("WARNING"=>T_("Sorry, this coalition is full!")));	
	}

	
	$evt = new EventCreator($DB);
	$evt->type = CONF_EVENT_COALITION_INVITE;
	$evt->from = $_SESSION["empire_id"];
	$evt->to = $_POST["coalition_invite"];
	$evt->sticky = 1;
	$evt->params  = array("empire_id"=>$GAME["empire"]->data["id"],"empire_name"=>$GAME["empire"]->data["name"],"empire_emperor"=>$GAME["empire"]->data["emperor"],"gender"=>$GAME["empire"]->data["gender"],"coalition_name"=>$GAME["empire"]->coalition->data["name"]);
	$evt->send();
	
	
	$GAME["system"]->redirect("diplomacy.php",array("NOTICE"=>T_("Invitation sent!")));

}

/* Disband your coalition */
if (isset($_GET["disband_coalition"]))
{
	if (!$GAME["empire"]->coalition->isMember()) 
		$GAME["system"]->redirect("diplomacy.php",array("WARNING"=>T_("You need to be in a coalition!")));
	
	if (!$GAME["empire"]->coalition->isOwner())
		$GAME["system"]->redirect("diplomacy.php",array("WARNING"=>T_("You need to be the coalition owner!")));

	$GAME["empire"]->coalition->disband();
	$GAME["system"]->redirect("diplomacy.php",array("NOTICE"=>T_("Coalition disbanded!")));
}

/* Create a new coalition */
if (isset($_POST["coalition_name"]))
{
	if ($GAME["empire"]->coalition->isMember()) {
		$GAME["system"]->redirect("diplomacy.php",array("WARNING"=>T_("You are already member of a coalition!")));
	}

	$coalition_name = stripslashes($_POST["coalition_name"]);
	if ($coalition_name == "") {
		$GAME["system"]->redirect("diplomacy.php",array("WARNING"=>T_("Invalid coalition name!")));
	}
	
	$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_coalition WHERE name='".addslashes($coalition_name)."'");
	if (!$rs->EOF) {
		$GAME["system"]->redirect("diplomacy.php",array("WARNING"=>T_("Coalition name already in use!")));
	}
	
	
	$GAME["empire"]->coalition->create($coalition_name,$_SESSION["empire_id"]);	
	
	$GAME["system"]->redirect("diplomacy.php",array("NOTICE"=>T_("New coalition created!")));
}

/* Break a active treaty */
if (isset($_GET["break"]))
{
	$treaty_data = $GAME["empire"]->diplomacy->getTreaty(intval($_GET["break"]));
	if ($treaty_data == null) {
		$GAME["system"]->redirect("diplomacy.php",array("WARNING"=>T_("Invalid treaty ID!")));
		
	}
	

	if ($treaty_data["status"] == CONF_TREATY_BREAK_PENDING) 
	{
		$GAME["system"]->redirect("diplomacy.php",array("WARNING"=>T_("You can't break a pending treaty proposal!")));
	} else {
	
		if ($treaty_data["status"] == CONF_TREATY_ACCEPT_PENDING)
		{
			$GAME["empire"]->diplomacy->deleteTreaty(intval($_GET["break"]));
		} else {
			
			$target_id = $treaty_data["empire_from"];
			if ($target_id == $_SESSION["empire_id"]) $target_id = $treaty_data["empire_to"];
			
			$GAME["empire"]->diplomacy->breakTreaty(intval($_GET["break"]),$GAME["empire"]->data,$target_id);
		}

	
	}
	
	$GAME["system"]->redirect("diplomacy.php",array("NOTICE"=>T_("Treaty successfully broken!")));
	
	
}

/* Accept a treaty */
if (isset($_GET["yes"]))
{

	$id = intval($_GET["yes"]);

	$query = "UPDATE game".$game_id."_tb_treaty SET status='".CONF_TREATY_ACCEPTED."' WHERE empire_from='".$_SESSION["empire_id"]."' AND empire_to='$id' AND status='".CONF_TREATY_ACCEPT_PENDING."'";
	$DB->Execute($query);
	$query = "UPDATE game".$game_id."_tb_treaty SET status='".CONF_TREATY_ACCEPTED."' WHERE empire_from='$id' AND empire_to='".$_SESSION["empire_id"]."' AND status='".CONF_TREATY_ACCEPT_PENDING."'";
	$DB->Execute($query);

	$query = "DELETE FROM game".$game_id."_tb_event WHERE event_to='".$_SESSION["empire_id"]."' AND event_from='$id' AND event_type='".CONF_EVENT_PENDINGTREATY."';";	
	$DB->Execute($query);
	$query = "DELETE FROM game".$game_id."_tb_event WHERE event_to='$id' AND event_from='".$_SESSION["empire_id"]."' AND event_type='".CONF_EVENT_PENDINGTREATY."';";	
	$DB->Execute($query);
	

	$evt = new EventCreator($DB);
	$evt->type = CONF_EVENT_ACCEPTEDTREATY;
	$evt->from = $_SESSION["empire_id"];
	$evt->to = $id;
	$evt->params = array("empire_id"=>$GAME["empire"]->data["id"],"empire_name"=>$GAME["empire"]->data["name"],"empire_emperor"=>$GAME["empire"]->data["emperor"],"gender"=>$GAME["empire"]->data["gender"]);	
	$evt->send();
			

	$GAME["system"]->redirect("diplomacy.php",array("NOTICE"=>T_("Treaty successfully accepted!")));	

}


/* Refuse a treaty */
if (isset($_GET["no"]))
{
	$id = addslashes($_GET["no"]);

	$query = "DELETE FROM game".$game_id."_tb_treaty WHERE empire_from='".$_SESSION["empire_id"]."' AND empire_to='$id'";
	$DB->Execute($query);
	$query = "DELETE FROM game".$game_id."_tb_treaty WHERE empire_from='$id' AND empire_to='".$_SESSION["empire_id"]."'";
	$DB->Execute($query);

	$query = "DELETE FROM game".$game_id."_tb_event WHERE event_to='".$_SESSION["empire_id"]."' AND event_from='$id' AND event_type='".CONF_EVENT_PENDINGTREATY."'";	
	$DB->Execute($query);
	$query = "DELETE FROM game".$game_id."_tb_event WHERE event_to='$id' AND event_from='".$_SESSION["empire_id"]."' AND event_type='".CONF_EVENT_PENDINGTREATY."'";	
	$DB->Execute($query);


	$evt = new EventCreator($DB);
	$evt->type = CONF_EVENT_REFUSEDTREATY;
	$evt->from = $_SESSION["empire_id"];
	$evt->to = $id;
	$evt->params = array("empire_id"=>$GAME["empire"]->data["id"],"empire_name"=>$GAME["empire"]->data["name"],"empire_emperor"=>$GAME["empire"]->data["emperor"],"gender"=>$GAME["empire"]->data["gender"]);	
	$evt->send();
	
	$GAME["system"]->redirect("diplomacy.php");	

}

/* Propose a treaty */
if (isset($_POST["treaty"]))
{
	if (!isset($_POST["empire"])) {
		$GAME["system"]->redirect("diplomay.php",array("WARNING"=>T_("No empire selected!")));	
	}
    
        $id = intval($_POST["empire"]);
	
	$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_empire WHERE active='1' AND id='$id'");
	if ($rs->EOF) {
		$GAME["system"]->redirect("diplomacy.php",array("WARNING"=>T_("Invalid empire ID!")));
	}
	
	if ($rs->fields["id"] == $_SESSION["empire_id"]) {
		$GAME["system"]->redirect("diplomacy.php",array("WARNING"=>T_("Invalid empire ID!")));
	}


	if (($_POST["treaty"] < 0) || ($_POST["treaty"] > (count($CONF_DIPLOMACY_TREATIES)-1)))
	{
		$GAME["system"]->redirect("diplomacy.php",array("WARNING"=>T_("Invalid treaty type!")));
	}

	$already = $GAME["empire"]->diplomacy->treatyFrom($_POST["empire"]);
	

	if ($already != null) {
		$GAME["system"]->redirect("diplomacy.php",array("NOTICE"=>T_("Another treaty is active!")));
	}

	$GAME["empire"]->diplomacy->sendTreaty($_POST["treaty"],$GAME["empire"]->data,$rs->fields);
	$GAME["system"]->redirect("diplomacy.php",array("NOTICE"=>T_("Treaty proposition sent!")));
	
}


////////////////////////////////////////////////////////////////
// Render page
////////////////////////////////////////////////////////////////

$GAME["template"]->setPage("diplomacy.html");


/* Populate treaties */
$treaties = array();
for ($i=0;$i<count($CONF_DIPLOMACY_TREATIES);$i++)
{
	$treaty = array();
	$treaty["id"] = $i;
	$treaty["name"] = $CONF_DIPLOMACY_TREATIES[$i];		
	
	$treaties[] = $treaty;
}

$GAME["template"]->setVar("treaties",$treaties);


/* Populate active treaties */
$listing = array();

for ($i=0;$i<count($GAME["empire"]->diplomacy->data);$i++)
{
	$item = array();
	$item["empire"] = $GAME["empire"]->diplomacy->data[$i]["empire_from"];
	if ($_SESSION["empire_id"] == $item["empire"]) 
		$item["empire"] = $GAME["empire"]->diplomacy->data[$i]["empire_to"];
	
	$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_empire WHERE id=".$item["empire"]);
	
	$item["empire"] = $rs->fields["emperor"]."@".$rs->fields["name"];
	$item["empire_id"] = $rs->fields["id"];

	$item["treaty"] = $CONF_DIPLOMACY_TREATIES[$GAME["empire"]->diplomacy->data[$i]["type"]];
	
	$item["bgcolor"] =  ($i % 2 == 0?"#666666":"#777777");
	$item["background"] =  ($i % 2 == 0?"images/background2.jpg":"images/background3.jpg");

	$item["date"] =  $GAME["template"]->formatTime(time(NULL) - $GAME["empire"]->diplomacy->data[$i]["date"]);
	$item["status"] = T_("Unknown");
	if ($GAME["empire"]->diplomacy->data[$i]["status"] == CONF_TREATY_ACCEPT_PENDING) $item["status"] = T_("Accept pending");
	if ($GAME["empire"]->diplomacy->data[$i]["status"] == CONF_TREATY_ACCEPTED) $item["status"] = T_("Accepted");
	if ($GAME["empire"]->diplomacy->data[$i]["status"] == CONF_TREATY_BREAK_PENDING) $item["status"] = T_("Break pending");

	$item["id"] = $GAME["empire"]->diplomacy->data[$i]["id"];
	$listing[] = $item;

}

$GAME["template"]->setVar("listing",$listing);


/* Populate empires */

$empires = array();
$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_empire WHERE active='1' ORDER BY emperor ASC");
while (!$rs->EOF)
{
	if ($rs->fields["id"] != $_SESSION["empire_id"]) {

		if ($GAME["empire"]->diplomacy->treatyFrom($rs->fields["id"]) == null) {

			$empire = array();
			$empire["id"] = $rs->fields["id"];
			$empire["name"] = $GAME["template"]->displayEmpire($rs->fields["emperor"],$rs->fields["name"],$GAME["empire"]->data["networth"]);
			
			$rs2 = $DB->Execute("SELECT game".$game_id."_tb_coalition.name FROM game".$game_id."_tb_member,game".$game_id."_tb_coalition WHERE game".$game_id."_tb_member.empire='".$rs->fields["id"]."' AND game".$game_id."_tb_member.coalition = game".$game_id."_tb_coalition.id");
			if (!$rs2->EOF) $empire["name"] .= " [".$rs2->fields["name"]."]";
			
			$empires[] = $empire;
		}
	}

	$rs->MoveNext();
}

$GAME["template"]->setVar("empires",$empires);

/* Create coalition form */
if (!$GAME["empire"]->coalition->isMember())
{
	$GAME["template"]->setVar("form_coalition_create_block",true);

}
else
{
	
	$GAME["template"]->setVar("coalition_name",$GAME["empire"]->coalition->data["name"]);
	$GAME["template"]->setVar("coalition_logo",$GAME["empire"]->coalition->data["logo"]);

	////////////////////////////////////////////////////////////////
	// Populate active members
	////////////////////////////////////////////////////////////////
	$coalition_listing = array();

	$all_members = $GAME["empire"]->coalition->members;
	$all_members[] = $GAME["empire"]->coalition->member;
	
	for ($i=0;$i<count($all_members);$i++)
	{
		$item = array();
	
		$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_empire WHERE id='".$all_members[$i]["empire"]."'");

		$item["empire"] = $rs->fields["emperor"]."@".$rs->fields["name"];
		$item["empire_id"] = $rs->fields["id"];

		$item["bgcolor"] =  ($i % 2 == 0?"#666666":"#777777");
		$item["background"] =  ($i % 2 == 0?"images/background2.jpg":"images/background3.jpg");

		$item["date"] = $GAME["template"]->formatTime(time(NULL) - $all_members[$i]["date"]);
		$item["status"] = T_("Member");
		if ($all_members[$i]["level"] == 1) $item["status"] = T_("Owner");
		$item["id"] = $all_members[$i]["id"];
		$coalition_listing[] = $item;
		$rs->MoveNext();

	}

	$GAME["template"]->setLoop("coalition_listing",$coalition_listing);
	$GAME["template"]->setVar("form_coalition_manage_block",true);
		
	if ($GAME["empire"]->coalition->isMember())
	{

		/* Populate empires */
		$empires_coalition = array();
		$rs = $DB->Execute("SELECT * FROM game".$game_id."_tb_empire WHERE active='1' ORDER BY emperor ASC");
		while (!$rs->EOF)
		{
			if ($rs->fields["id"] != $_SESSION["empire_id"]) {

				$rs2 = $DB->Execute("SELECT * FROM game".$game_id."_tb_member WHERE empire='".$rs->fields["id"]."'");

				if ($rs2->EOF) {
					$empire = array();
					$empire["id"] = $rs->fields["id"];
					$empire["name"] = $GAME["template"]->displayEmpire($rs->fields["emperor"],$rs->fields["name"],$GAME["empire"]->data["networth"]);
					$empires_coalition[] = $empire;
				}
			}
			$rs->MoveNext();
		}


		$GAME["template"]->setVar("empires_coalition",$empires_coalition);

		$GAME["template"]->setVar("form_coalition_invite_block",true);
		
	}

}


$DB->CompleteTrans();
print $GAME["template"]->render();

?> 
