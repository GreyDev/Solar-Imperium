<?php
// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //


define("LANGUAGE_DOMAIN","system");
require_once("include/init.php");


// (please do not remove credit)
// author: Louai Munajim
// website: http://elouai.com
// date: 2004/Apr/18

function bbcode2html($text)
{
  $bbcode = array("<", ">",
                "[list]", "[*]", "[/list]", 
                "[b]", "[/b]", 
                "[u]", "[/u]", 
                "[i]", "[/i]",
                "[code]", "[/code]",
                "[quote]", "[/quote]",
                '"]');
  $htmlcode = array("&lt;", "&gt;",
                "<ul>", "<li>", "</ul>", 
                "<b>", "</b>", 
                "<u>", "</u>", 
                "<i>", "</i>",
                "<code>", "</code>",
                "<table width=100% cellpadding=\"5\" cellspacing=\"0\" bgcolor=lightgray style=\"color:#333333;border:1px dashed #333333\"><tr><td bgcolor=\"#eeeeee\">", "</td></tr></table>",
                '">');
  $newtext = str_replace($bbcode, $htmlcode, $text);
  $newtext = nl2br($newtext);//second pass
  $newtext = str_replace("javascript:","",$newtext);
  $newtext = str_replace("onmouseover=","",$newtext);
  $newtext = str_replace("onmouseleave=","",$newtext);
  $newtext = str_replace("onclick=","",$newtext);
  $newtext = str_replace("onload=","",$newtext);
  $newtext = stripslashes($newtext);
  return $newtext;
}

if (!isset($_GET["topic"])) {
	$DB->CompleteTrans();
	die(header("Location: forum.php"));
}

$topic_id = intval($_GET["topic"]);
$rs = $DB->Execute("SELECT * FROM system_tb_forum WHERE id=$topic_id AND parent=-1");
if ($rs->EOF) {
	$DB->CompleteTrans();
	die(header("Location: forum.php"));
}

$topicdata = $rs->fields;

// *******************************************************************************
// Handle requests
// *******************************************************************************

if (isset($_POST["forum_newreply"]))
{
		
	if (!isset($_SESSION["player"])) {
		$DB->CompleteTrans();
		die(header("Location: forum.php?WARNING=".T_("You can't post until you are registered. Please login!")));
		
	}
	
	if (!isset($_SESSION["current_forum"])) {
		$DB->CompleteTrans();
		die(header("Location: forum.php?WARNING=".T_("You can't post until you have choosen a forum!")));
		
	}


	$content = $_POST["content"];
	
	if ($content == "") { 
		$DB->CompleteTrans();			
		die(header("Location: forum.php?WARNING=".T_("Empty reply content!")));
		
	} 
	
	$topic_title = $topicdata["title"];
	$topic_title = addslashes($topic_title);
	
	$query = "INSERT INTO system_tb_forum (player,date_creation,title,content,parent,forum_name) VALUES(".$_SESSION["player"]["id"].",".time(NULL).",'".T_("Forum Reply: ") .$topic_title. "','".addslashes($content)."',".$topic_id.",'".$_SESSION["current_forum"]."');";
	$DB->Execute($query);
	if (!$DB) trigger_error($DB->ErrorMsg());
		
	$query = "UPDATE system_tb_forum SET date_update=".time(NULL)." WHERE id=".$topic_id;
	$DB->Execute($query);

	$DB->CompleteTrans();
	die(header("Location: forum_viewtopic.php?topic=".intval($_GET["topic"])));

}


// *******************************************************************************
// Display page
// *******************************************************************************
$page = 0;
if (isset($_GET["page"])) $page = intval($_GET["page"]);


$TPL->assign("topic_date",(floor((time(NULL) - $topicdata["date_creation"])/(60*60*24))+1)." days");
$TPL->assign("topic_title",str_replace("\\'","'",bbcode2html($topicdata["title"])));
$TPL->assign("topic_content",str_replace("\\'","'",bbcode2html($topicdata["content"])));
$TPL->assign("topic_id",$topicdata["id"]);

if (isset($_SESSION["player"]))
if ($_SESSION["player"]["id"] != $topicdata["last_seen_by"]) {
    $DB->Execute(
        "UPDATE system_tb_forum SET views=".($topicdata["views"]+1).",date_seen=".time(NULL).",last_seen_by=".$_SESSION["player"]["id"]." WHERE id=".$topicdata["id"]
    );
}

if ($page == 0) {

	$rs2 = $DB->Execute("SELECT * FROM system_tb_players WHERE id=".addslashes($rs->fields["player"]));

	$TPL->assign("topic_author_id",$rs->fields["id"]);
	$image_avatar = "show_avatar.php?id=".$rs2->fields["id"];
	$TPL->assign("topic_author_image",$image_avatar);
			
	$TPL->assign("topic_views",$topicdata["views"]);

	if ($rs2->EOF) {
		$TPL->assign("topic_author_nickname",T_("Unknown"));
	} else {
		$TPL->assign("topic_author_nickname",$rs2->fields["nickname"]);
	}

	$TPL->assign("topic_post",1);

} else {
	$TPL->assign("topic_post",0);
}


/* fetch thread replies */

$query = "SELECT COUNT(*) FROM system_tb_forum WHERE parent=$topic_id  ORDER BY date_creation ASC";
$rs = $DB->Execute($query);
$maxpages = $rs->fields[0] / CONF_FORUM_REPLIES_PER_PAGE;
if ($maxpages < 1) $maxpages = 1;

$pages_str = "";

for ($i=0;$i<$maxpages;$i++) {

if ($page == $i) 
	$pages_str .= "<b>".($i+1)."</b>&nbsp;";
else
	$pages_str .= "<a class=\"link\" href=\"forum_viewtopic.php?page=$i&topic=$topic_id\">".($i+1)."</a>&nbsp;";

}


$TPL->assign("pages",$pages_str);

$query = "SELECT * FROM system_tb_forum WHERE parent=$topic_id ORDER BY date_creation ASC LIMIT ".($page*CONF_FORUM_REPLIES_PER_PAGE).",".CONF_FORUM_REPLIES_PER_PAGE;
$rs = $DB->Execute($query);
$forum_replies = array();
$count = 0;

while(!$rs->EOF)
{
		$item = array();
		$item["title"] = stripslashes($rs->fields["title"]);
		
		$item["content"] = str_replace("\\'","'",bbcode2html($rs->fields["content"]));


		$item["views"] = $rs->fields["views"];
		$item["background"] = ($count++ % 2 == 0?"images/background2.jpg":"images/background3.jpg");
		

		$rs2 = $DB->Execute("SELECT * FROM system_tb_players WHERE id=".addslashes($rs->fields["player"]));
		$item["author_nickname"] = $rs2->fields["nickname"];
		if ((isset($_SESSION["player"])) && ($_SESSION["player"]["admin"] == 1))
			$item["author_nickname"].=" <a class=\"link\" href=forum.php?DELETE=".$rs->fields["id"]."&topic=$topic_id&page=$page onClick=\"return confirm('".T_("Are you sure?")."');\">".T_("Delete")."</a>";
		
		$item["author_id"] = $rs->fields["player"];
		$item["author_image"] = "show_avatar.php?id=".$rs2->fields["id"];

		
		$item["author_date"] = (floor((time(NULL) - $rs->fields["date_creation"])/(60*60*24))+1).T_(" days");
		
		
		
		$forum_replies[] = $item;
		
		$rs->MoveNext();
}

$TPL->assign("replies",$forum_replies);
if (isset($_SESSION["player"])) 
	$TPL->assign("player_connected",1);
else
	$TPL->assign("player_connected",0);

$DB->CompleteTrans();

$TPL->display("page_forum_viewtopic.html");


?>
