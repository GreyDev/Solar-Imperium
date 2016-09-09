<?php /* Smarty version 2.6.19, created on 2009-09-14 17:27:50
         compiled from simple_frame.html */ ?>
<html>

    <head>
        <title>Solar Imperium <?php echo $this->_tpl_vars['version']; ?>
 (<?php echo $this->_tpl_vars['game_name']; ?>
) <?php echo $this->_tpl_vars['page_title']; ?>
</title>
        <link rel="stylesheet" type="text/css" href="../css/system/common.css" />
        <link rel="stylesheet" type="text/css" href="../css/game/styles.css" />
        <script language="javascript" src="../scripts/game/common.js"></script>

    </head>


    <body bgcolor="black" link="white" vlink="white" alink="white" text="white" style="background-attachment:fixed;"  background="../images/game/background.gif" >

 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "events_data.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo $this->_tpl_vars['events_script']; ?>


<table width="100%"  cellspacing="0" cellpadding="0" border="0">
    <tr><td>
            <?php echo $this->_tpl_vars['page_content']; ?>


        </td></tr>
</table>

    </body>