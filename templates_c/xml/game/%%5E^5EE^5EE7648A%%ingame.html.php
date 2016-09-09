<?php /* Smarty version 2.6.19, created on 2009-07-18 16:38:34
         compiled from ingame.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'ingame.html', 65, false),array('modifier', 'number_format', 'ingame.html', 101, false),)), $this); ?>
<html>

<head>
<title>Solar Imperium <?php echo $this->_tpl_vars['version']; ?>
 (<?php echo $this->_tpl_vars['game_name']; ?>
) <?php echo $this->_tpl_vars['page_title']; ?>
</title>
<link rel="stylesheet" type="text/css" href="../css/system/common.css" />
<link rel="stylesheet" type="text/css" href="../css/game/styles.css" />


<script language="javascript" src="../scripts/game/common.js"></script>
<script type="text/javascript" src="../scripts/game/ajax-dynamic-content.js"></script>
<script type="text/javascript" src="../scripts/game/ajax.js"></script>
<script type="text/javascript" src="../scripts/game/ajax-tooltip.js">
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
<link rel="stylesheet" href="../css/game/ajax-tooltip.css" media="screen" type="text/css">

</head>


<body bgcolor="black" link="white" vlink="white" alink="white" text="white" style="background-attachment:fixed"  background="../images/game/background.gif" >
<table width="100%" cellspacing="0" cellpadding="0" border="0">
<tr><td>

<?php echo $this->_tpl_vars['events_data']; ?>


<a name=top>
<table width="100%" cellspacing="0" cellpadding="0" border="0">
<tr>
<td style="height:1px" bgcolor="#333333"  colspan="2"><img src="../images/game/placeholder.gif" width="100%" style="height:1px"></td>
</tr>
</table>

<table width="100%" cellspacing="0" cellpadding="5" border="0" height="100%">
<tr><td valign="top" rowspan="2" width="120" height="100%" bgcolor="#333333" background="../images/game/background/hull.jpg" >



	<table cellspacing="0" cellpadding="0" border="0">
		<tr>
		
			<td align="center"> 
			<a href="starmap.php" target="_NEW">
			<img src="../images/game/starmap.jpg" border="0" style="border:1px solid darkred" width="110" height="50">
			</a>
			</td>
		</tr>
		<tr>
			<td align="center">
                <b>
			<font style="color:#ffffff"><?php echo $this->_tpl_vars['emperor_short']; ?>
</font>
			<font style="color:#cacaca"> <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>of<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> </font>
			<font style="color:#ffffff"><?php echo $this->_tpl_vars['empire_short']; ?>
</font>
			</b>
			<br/><br/>
			</td>
		</tr>
		<tr>
			<td align="center">
			<b><a class="link" href="show_active.php" TARGET="_NEW"><?php echo $this->_tpl_vars['online_players']; ?>
 <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>player(s) online<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></b>
			<br/>
			</td>
		</tr>		
	</table>
	<br/>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<br/>
    <!-- PBBGExchange Code Begin -->
    <div align="center">
<SCRIPT language="JavaScript">
document.write('<S'+'CRIPT language="JavaScript" src="http://www.pbbgexchange.com/work.php?n=73&size=2&j=1&nl=0&c=&code='+new Date().getTime()+'"></S'+'CRIPT>');
</SCRIPT>
<NOSCRIPT><IFRAME SRC="http://www.pbbgexchange.com/work.php?n=73&size=2&nl=0&c=" width=100 height=107 marginwidth=0 marginheight=0 hspace=0 vspace=0 frameborder=0 scrolling="no"></IFRAME></NOSCRIPT>
<!-- PBBGExchange Code End -->
    </div>
</td>
<td align="left" width="100%" valign="top">

<script>
var content_top = '<table width="100%" cellspacing="0" cellpadding="0" border="0">\
			<tr>\
				<td>\
				<table>\
					<tr>\
						<td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Net Worth:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <b style="color:#ff9999"><?php echo ((is_array($_tmp=$this->_tpl_vars['networth'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</b>,\
							<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Turns played:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <b\
							style="color:#ff9999"><?php echo $this->_tpl_vars['turns_played']; ?>
</b>, <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Turns left:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <b\
							style="color:#ff9999"><?php echo $this->_tpl_vars['turns_left']; ?>
</b>, <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Protection turns left:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <b\
							style="color:#ff9999"><?php echo $this->_tpl_vars['protection_turns_left']; ?>
</b>, <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Pop.:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <b style="color:#ff9999"><?php echo ((is_array($_tmp=$this->_tpl_vars['population'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</b> <b>(<?php echo $this->_tpl_vars['civil_status']; ?>
)</b></td>\
					</tr>\
					<tr>\
						<td>\
<table cellspacing="0" cellpadding="0" border="0"><tr>\
<td><img style="border:1px solid #666666;margin:0 5 0 5;" alt="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Credits<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" title="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Credits<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" src="../images/game/icon_credits.png"></td><td><b><?php echo ((is_array($_tmp=$this->_tpl_vars['credits'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</b></td>\
<td><img style="border:1px solid #666666;margin:0 5 0 5;" alt="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Food<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" title="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Food<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" src="../images/game/icon_food.png"></td><td><b><?php echo ((is_array($_tmp=$this->_tpl_vars['food'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</b></td>\
<td><img style="border:1px solid #666666;margin:0 5 0 5;" alt="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Ore<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" title="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Ore<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" src="../images/game/icon_ore.png"></td><td><b><?php echo ((is_array($_tmp=$this->_tpl_vars['ore'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</b></td>\
<td><img style="border:1px solid #666666;margin:0 5 0 5;" alt="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Petroleum<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" title="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Petroleum<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" src="../images/game/icon_petro.png"></td><td><b><?php echo ((is_array($_tmp=$this->_tpl_vars['petroleum'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</b></td>\
<td><img style="border:1px solid #666666;margin:0 5 0 5;" alt="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Planets total / Planets cap<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" title="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Planets total / Planets cap<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" src="../images/game/icon_planets.png"></td><td><b><?php echo ((is_array($_tmp=$this->_tpl_vars['total_planets'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
 / <?php echo ((is_array($_tmp=$this->_tpl_vars['max_planets'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</b></td>\
<td><img style="border:1px solid #666666;margin:0 5 0 5;" alt="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Army effectiveness<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" title="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Army effectiveness<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" src="../images/game/icon_army.png"></td><td><b><?php echo ((is_array($_tmp=$this->_tpl_vars['effectiveness'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
 %</b></td>\
</tr></table></td>\
					</tr>\
				</table>\
				</td>\
				<td align="right"><a href="logo_editor.php"><img src="<?php echo $this->_tpl_vars['logo']; ?>
?<?php echo $this->_tpl_vars['timestamp']; ?>
"\
					style="border:1px solid #cacaca; margin:0 10 0 0"></a></td>\
			</tr>\
		</table>\
';

Round(content_top,'gradient_grey','720px','');


</script>

<?php echo $this->_tpl_vars['page_content']; ?>


<table>
<tr>
<td><a href=#top><img src="../images/game/uparrow.gif" border="0"></a></td>
<td>
<a href=#top class="link"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Back to top<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a>
</td>
</tr>
</table>
<br />
<br/>


<div align="center">
<table align="center" style="font-size:10px">
<tr><td><img src="../images/game/mrgtech.gif" border="0"></td><td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>This game is a creation of<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <a class="link" href="http://www.mrgtech.ca" target="_NEW"><b>MRG Technologies</b></a></td></tr>
</table>
</div>
<br />
</td>
</tr>
</table>
<table width="100%" style="border:0px solid yellow"  cellspacing="0" cellpadding="0" border="0">
<tr>
<td style="height:1px" bgcolor="#333333"  colspan="2"><img src="../images/game/placeholder.gif" width="100%" style="height:1px"></td>
</tr>
</table>
<script language="javascript" src="../scripts/game/wz_tooltip.js"></script>
</td></tr>
</table>
</body>
</html>