<?php /* Smarty version 2.6.19, created on 2009-09-13 04:31:43
         compiled from page_chat_small.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'page_chat_small.html', 71, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Solar Imperium Chat</title>
<script type="text/javascript" src="scripts/system/common.js"></script>
<script type="text/javascript" src="scripts/system/chat_small.js"></script>
	<link rel="stylesheet" type="text/css" href="css/system/chat.css" />
	<link rel="stylesheet" type="text/css" href="css/system/common.css" />
<?php echo '
<script language="Javascript" type="text/javascript">
<!--
var secs;
var timerID = null;
var timerRunning = false;
var delay = 1000;
var already_called = false;

function InitializeTimer()
{
    // Set the length of the timer, in seconds
    secs = 5;
    StopTheClock();
    StartTheTimer();
	
	if (already_called) {
		ajax_request_list_messages_delta();
	} else {
		ajax_request_list_messages_initial();
		already_called = true;
	}
	
	scrollTo(0,500);

	//document.chatfrm.textfield.focus();

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
//-->
</script>
'; ?>


</head>

<body  onload="InitializeTimer()" leftmargin="0" topmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0">

    <form id="chatfrm" name="chatfrm" method="post" onSubmit="ajax_request_send_message();return false;" action="">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="76" align="left" valign="top"><div id="td_left_small" class="scrolling_div"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Loading ...<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></div></td>
  </tr>
  <tr>
    <td><input name="textfield" autocomplete="off" type="text" class="textfield_form"  maxlength="200" /></td>
  </tr>
</table></form>
</body>
</html>