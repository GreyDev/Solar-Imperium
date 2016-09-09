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
  $newtext = stripslashes($newtext);

  return $newtext;
}

if (!isset($_SESSION["forum_page"])) $_SESSION["forum_page"] = 0;
if (isset($_GET["forum_page"])) $_SESSION["forum_page"] = intval($_GET["forum_page"]);

if (isset($_GET["BACK"])) {
	unset($_SESSION["current_forum"]);
}


if (isset($_GET["forum"])) {

	reset($FORUMS);
	$found = false;
	while(list($key,$value) = each($FORUMS)) {
		if ($key == $_GET["forum"]) { $found = true; break; }
	}

	if ($found) $_SESSION["current_forum"] = addslashes($_GET["forum"]);
}




// **********************************************************
// Post a new forum topic callback
// **********************************************************
if (isset($_POST["forum_newtopic"]))
{
	
	$subject = $_POST["subject"];
	$content = $_POST["content"];
	
	if ($subject == "") { 
		$DB->CompleteTrans();
		die(header("Location: forum.php?WARNING=".T_("Empty subject field!")));
	}
	
	if ($content == "") { 
		$DB->CompleteTrans();
		die(header("Location: forum.php?WARNING=".T_("Empty content field!")));
	}
	
	
	if (!isset($_SESSION["player"])) 
    die(header("Location: forum.php?WARNING=".T_("You need to be logged to post something, there is the content of your post (if you want to copypaste it back later) : <b>").stripslashes($content)."</b>"));

	if (!isset($_SESSION["current_forum"])) {
		$DB->CompleteTrans();
		die(header("Location: forum.php?WARNING=".T_("You can't post until you have choosen a forum!")));
		
	}

	if (($FORUMS[$_SESSION["current_forum"]]["admin_post"] ==1) && ($_SESSION["player"]["admin"] != 1)) {
		die(header("Location: forum.php?WARNING=".T_("Only administrators can post in this forum!")));
	}
	
		
	$query = "INSERT INTO system_tb_forum (player,date_creation,date_update,title,content,forum_name) VALUES(".$_SESSION["player"]["id"].",".time(NULL).",".time(NULL).",'".addslashes($subject)."','".addslashes($content)."','".$_SESSION["current_forum"]."');";
	$DB->Execute($query);
	if (!$DB) trigger_error($DB->ErrorMsg());
	
	$DB->CompleteTrans();
			
	die(header("Location: forum.php?"));
}



// **********************************************************
// Delete a forum thread callback (ADMIN ONLY)
// **********************************************************
if (isset($_SESSION["player"]))
if ($_SESSION["player"]["admin"]==1) {
	
	if (isset($_GET["DELETE"])) {
        $topic_id = -1;
        $page = -1;
        if (isset($_GET["topic"])) $topic_id = intval($_GET["topic"]);
        if (isset($_GET["page"])) $page = intval($_GET["page"]);
		$id = intval($_GET["DELETE"]);

		$DB->Execute("DELETE FROM system_tb_forum WHERE id=$id OR parent=$id");
		if (!$DB) trigger_error($DB->ErrorMsg());
		$DB->CompleteTrans();
        if ($topic_id == -1) {
            header("Location: forum.php?");
        } else {
            header("Location: forum_viewtopic.php?topic=$topic_id&page=$page");
        }

		die();
	}
}


// Show the main page (Select a forum)
if (!isset($_SESSION["current_forum"])) {

	reset($FORUMS);
	$items = array();
	
	$count = 0;	
	while(list($key,$value) = each($FORUMS))
	{
		$item = array();
		$item["bgcolor"] =  ($count++ % 2 == 0?"#cacada":"#dadaea");
		$item["fgcolor"] =  ($count % 2 == 0?"#000000":"#333333");
		$item["url"] = "forum.php?forum=".$key;
		$item["description"] = $value["description"];
		$rs = $DB->Execute("SELECT COUNT(*) FROM system_tb_forum WHERE parent=-1 AND forum_name='".addslashes($key)."'");
		$item["posts"] = $rs->fields[0];
		$rs = $DB->Execute("SELECT COUNT(*) FROM system_tb_forum WHERE parent > -1 AND forum_name='".addslashes($key)."'");

		$item["replies"] = $rs->fields[0];
		
		if ($item["posts"] == 0) $item["lastpost"] = "---"; else {
			$rs = $DB->Execute("SELECT date_creation FROM system_tb_forum WHERE parent=-1 AND forum_name='".addslashes($key)."' ORDER BY date_creation DESC");
			if (!$rs) trigger_error($DB->ErrorMsg());
			
			$days = floor((time() - $rs->fields["date_creation"]) / (60*60*24));
			
			if ($days == 0) 
				$item["lastpost"] = T_("Today");
			else
				$item["lastpost"] = $days . T_(" days");
		}
		
		if ($item["replies"] == 0) $item["lastreply"] = "---"; else {
			$rs = $DB->Execute("SELECT date_creation FROM system_tb_forum WHERE parent > -1 AND forum_name='".addslashes($key)."' ORDER BY date_creation DESC");
			if (!$rs) trigger_error($DB->ErrorMsg());
			
			$days = floor((time() - $rs->fields["date_creation"]) / (60*60*24));
			
			if ($days == 0) 
				$item["lastreply"] = T_("Today");
			else
				$item["lastreply"] = $days . T_(" days");
		}
		
		

		$items[] = $item;		
	}	

	
	$TPL->assign("items",$items);
		
	$DB->CompleteTrans();
	$TPL->display("page_forum.html");
	die();
}


// Display selected forum

if (!isset($_SESSION["forum_page"])) $_SESSION["forum_page"] = 0;
if (isset($_GET["forum_page"])) $_SESSION["forum_page"] = intval($_GET["forum_page"]);
$total_posts = $DB->Execute("SELECT COUNT(*) FROM system_tb_forum WHERE parent=-1 AND forum_name='".addslashes($_SESSION["current_forum"])."'");
$total_posts = $total_posts->fields[0];

$query = "SELECT * FROM system_tb_forum WHERE parent=-1 AND forum_name='".addslashes($_SESSION["current_forum"])."' ORDER BY date_update DESC";
$rs = $DB->Execute($query);
if (!$rs) trigger_error($DB->ErrorMsg());

$forum_items = array();
$count = 0;

while(!$rs->EOF)
{
		$item = array();
		$item["bgcolor"] =  ($count++ % 2 == 0?"#cacada":"#dadaea");
		$item["fgcolor"] =  ($count % 2 == 0?"#000000":"#333333");
		
		$item["title"] = str_replace("\\'","'",bbcode2html($rs->fields["title"]));
		
		if (isset($_SESSION["player"]))
		if ($_SESSION["player"]["admin"]==1) {
			$item["title"].=" <a class=\"link2\" href=?DELETE=".$rs->fields["id"]." onClick=\"return confirm('".T_("Are you sure?")."');\">".T_("Delete")."</a>";
		}
		
		$item["views"] = $rs->fields["views"];
		
		$rs2 = $DB->Execute("SELECT COUNT(*) FROM system_tb_forum WHERE forum_name='".$_SESSION["current_forum"]."' AND parent=".$rs->fields["id"]);
		$item["replies"] = $rs2->fields[0];


		$page = 0;
		$page = floor($item["replies"] / CONF_FORUM_REPLIES_PER_PAGE);
		if ($page < 0) $page = 0;
		
		$rs2 = $DB->Execute("SELECT * FROM system_tb_forum WHERE forum_name='".$_SESSION["current_forum"]."' AND parent=".$rs->fields["id"]." AND forum_name='".addslashes($_SESSION["current_forum"])."' ORDER BY date_creation DESC LIMIT 1");
	    if (!$rs2->EOF) {
           $rs3 = $DB->Execute("SELECT * FROM system_tb_players WHERE id=".$rs2->fields["player"]);
   	       $item["lastreply"] = $rs3->fields["nickname"];
		   $item["date"] = (floor((time(NULL) - $rs2->fields["date_update"])/(60*60*24))+1).T_(" days");
	    
	    } else {
	    	$item["lastreply"] = "---";
	
	    }
	
		$rs2 = $DB->Execute("SELECT * FROM system_tb_players WHERE id=".$rs->fields["player"]);
		$item["author"] = $rs2->fields["nickname"];
					
		
		$item["date"] = (floor((time(NULL) - $rs->fields["date_creation"])/(60*60*24))+1).T_(" days");
		$item["url"] = "forum_viewtopic.php?topic=".$rs->fields["id"]."&page=0";	
		$item["lastseen"] =  (floor((time(NULL) - $rs->fields["date_seen"])/(60*60*24))+1).T_(" days");
		$item["new"] = "";
		
		if ((time(NULL) - $rs->fields["date_update"]) < (60*60*24*2)) $item["new"] = "<img border=\"0\" src=\"images/common/new.png\">";
	    $forum_items[] = $item;
		
		$rs->MoveNext();
}


$tmp = $forum_items;
$forum_items = array();
$offset = ($_SESSION["forum_page"]*CONF_FORUM_POSTS_PER_PAGE);
$count = 0;

while (list($key,$value) = each($tmp))
{
	if (($count >= $offset) && ($count < ($offset+CONF_FORUM_POSTS_PER_PAGE)))
	{
		$forum_items[] = $value;
	}
	
	$count++;
}
unset($tmp);

$TPL->assign("items",$forum_items);

$forum_pages = "";
for ($i=0;$i<($total_posts/CONF_FORUM_POSTS_PER_PAGE);$i++)
{
	if ($i == $_SESSION["forum_page"]) 
		$forum_pages .= "<b class=\"text_normal\">".($i+1)."</b>&nbsp;";
		else
		$forum_pages .= "<a class=\"link\" href=\"?forum_page=$i\"><b>".($i+1)."</b></a>&nbsp;";
}

$TPL->assign("pages",$forum_pages);
$TPL->assign("current_forum",$FORUMS[$_SESSION["current_forum"]]["description"]);


if (isset($_SESSION["player"])) {

	if (($FORUMS[$_SESSION["current_forum"]]["admin_post"] ==1) && ($_SESSION["player"]["admin"] != 1)) {
		$TPL->assign("player_connected",0);
	} else
		$TPL->assign("player_connected",1);

} else
	$TPL->assign("player_connected",0);


$DB->CompleteTrans();
$TPL->display("page_forum_showpage.html");

?>
