<?php /* Smarty version 2.6.19, created on 2009-09-13 04:11:04
         compiled from page_topframe.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'page_topframe.html', 80, false),)), $this); ?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/system/common.css" />
<script language="javascript" type="text/javascript" src="scripts/system/common.js"></script>
<script language="javascript" type="text/javascript" src="scripts/system/topframe.js"></script>

<?php echo '
<SCRIPT LANGUAGE = "JavaScript">
<!--
var secs;
var timerID = null;
var timerRunning = false;
var delay = 1000;

function InitializeTimer()
{
    // Set the length of the timer, in seconds
    secs = 60;
    StopTheClock();
    StartTheTimer();
	ajax_request_update_onlinecount();
	
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
        self.status = secs;
        secs = secs - 1;
        timerRunning = true;
        timerID = self.setTimeout("StartTheTimer()", delay);
    }
}

function CloseChatPanel()
{
	parent.document.getElementById(\'frameset1\').rows="25px,*,25px";

	parent.frame_chat.location.href = \'nochat.php\';
}

var chatwnd = null;

function OpenOnlineChat()
{
	chatwnd = window.open(\'chat.php\',\'chat\',\'width=800,height=600\');
	CloseChatPanel();
}

function CloseOnlineChat()
{
	if (chatwnd && chatwnd.open && !chatwnd.closed) chatwnd.close();
}

//-->
</SCRIPT>
'; ?>


</head>
<body  background="images/system/topframe_background.png"  onload="InitializeTimer()" bgcolor="#acacac" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table class="text_normal" cellspacing="0" cellpadding="0" border="0" height="25px">
<tr>
<td height="24px"><img src="images/common/star.gif" border="0" class="topframe_image"></td>
<td valign="middle" width="90%" style="color:white">
<b style="color:#cacaca">Solar Imperium</b><b> (<?php echo $this->_tpl_vars['game_name']; ?>
)</b></td>
<td nowrap><a class="topframe_link" href="gamesbrowser.php" target="_TOP"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Leave Game<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a><a class="topframe_link" href="http://galaxypedia.mrgtech.ca" target="_NEW"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Help<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a><a class="topframe_link" href="#" onclick="OpenOnlineChat()"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Online Chat<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>(<b id="online_count">0</b>)</a></td>
<td nowrap width="20px">&nbsp;</td>
</tr>
<tr>
    <td colspan="4" width="100%" bgcolor="orange">a</td>
</tr>
</table>
</body>
</html>