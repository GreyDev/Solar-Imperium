<?php /* Smarty version 2.6.19, created on 2009-09-14 01:19:54
         compiled from page_nochat.html */ ?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/system/common.css" />
	<link rel="stylesheet" type="text/css" href="css/system/chat.css" />
<script>

<?php echo '
function ShowChatPanel()
{

//	parent.document.CloseOnlineChat();

	parent.document.getElementById(\'frameset1\').rows="25px,*,100px";

	parent.frame_chat.location.href = \'chat.php?SMALL\';
}
'; ?>



</script>
</head>
<body style="margin:0px">
&nbsp;<a style="font-size:12px;font-family:sans-serif;color:yellow" href="javascript:ShowChatPanel()"><b>Restore chat window</b></a>
</body>
</html>