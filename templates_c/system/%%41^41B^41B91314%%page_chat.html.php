<?php /* Smarty version 2.6.19, created on 2009-09-14 01:19:54
         compiled from page_chat.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Solar Imperium Chat</title>
<script type="text/javascript" src="scripts/system/common.js"></script>
<script type="text/javascript" src="scripts/game/ajax-dynamic-content.js"></script>
<script type="text/javascript" src="scripts/game/ajax.js"></script>

<script type="text/javascript" src="scripts/game/ajax-tooltip.js">
/************************************************************************************************************
(C) www.dhtmlgoodies.com, June 2006

This is a script from www.dhtmlgoodies.com. You will find this and a lot of other scripts at our website.	

Terms of use:
You are free to use this script as long as the copyright message is kept intact. However, you may not
redistribute, sell or repost it without our permission.
	
Thank you!
	
www.dhtmlgoodies.com
Alf Magne Kalleland
	
************************************************************************************************************/	
</script>	

<link rel="stylesheet" href="css/system/ajax-tooltip_chat.css" media="screen" type="text/css" />


<script type="text/javascript" src="scripts/system/chat.js"></script>
<link rel="stylesheet" type="text/css" href="css/system/chat.css" />
<link rel="stylesheet" type="text/css" href="css/system/common.css" />

<?php echo '
<script type="text/javascript" language="Javascript">
<!--
var secs;
var timerID = null;
var timerRunning = false;
var delay = 1000;
var already_called = false;

function InitializeTimer()
{
    // Set the length of the timer, in seconds
    secs = 6;
    StopTheClock();
    StartTheTimer();

	if (already_called) {
		ajax_request_list_messages_delta();
		ajax_request_list_sessions_delta();
	} else {
		ajax_request_list_messages_initial();
		ajax_request_list_sessions_initial();
		already_called = true;
	}
	
	
//	document.chatfrm.textfield.focus();
}

function StopTheClock()
{
    if(timerRunning)
        clearTimeout(timerID);
    timerRunning = false;
}

function StartTheTimer()
{

    if (secs==0)
    {
        StopTheClock();
		InitializeTimer();
    }
    else
    {
        secs = secs - 1;
        timerRunning = true;
        timerID = self.setTimeout("StartTheTimer()", delay);
    }
}

function ShowChatPanel()
{
	opener.parent.document.getElementById(\'frameset1\').rows="25px,*,100px";

	opener.parent.frame_chat.location.href = \'chat.php?SMALL\';
}


//-->
</script>

'; ?>



</head>

<body onload="InitializeTimer()" onunload="ShowChatPanel()">

<form id="chatfrm" name="chatfrm" method="post" onSubmit="ajax_request_send_message();return false;" action="">
<table width="100%" height="550" border="0">
  <tr>
    <td height="520" align="left" valign="top">
	<div id="td_left"  class="scrolling_div">Loading ...</div></td>
    <td height="520" align="left" valign="top" id="td_right">
	Loading ...	</td>
  </tr>
  <tr>
    <td colspan="2"><input name="textfield" autocomplete="off"  type="text" class="textfield_form" maxlength="255" /></td>
  </tr>
</table></form>
</body>
</html>