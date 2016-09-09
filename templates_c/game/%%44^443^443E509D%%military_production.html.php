<?php /* Smarty version 2.6.19, created on 2009-05-25 23:47:00
         compiled from event/military_production.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'event/military_production.html', 95, false),)), $this); ?>
<table cellpadding="5" width="100%" background="../images/game/bar3.jpg">
<tr><td>

<table align="center">
	<tr>
		<td>
			<img src="../images/game/icons/army/soldiers_<?php echo $this->_tpl_vars['soldiers_level']; ?>
.gif"  style="border:1px solid black">
		</td>
		</tr><tr>
		<td align="center">
			<b style="font-size:10px;font-family:verdana;color:white">
			+<?php echo $this->_tpl_vars['psoldiers']; ?>
</b></td>
	</tr>
</table>
</td><td>	
<table align="center">
	<tr>
		<td>
			<img src="../images/game/icons/army/fighters_<?php echo $this->_tpl_vars['fighters_level']; ?>
.gif"  style="border:1px solid black">
		</td>
		</tr><tr>
		<td align="center">
			<b style="font-size:10px;font-family:verdana;color:white">
			+<?php echo $this->_tpl_vars['pfighters']; ?>
</b></td>
	</tr>
</table>
	
</td><td>	
<table align="center">
	<tr>
		<td>
			<img src="../images/game/icons/army/stations_<?php echo $this->_tpl_vars['stations_level']; ?>
.gif"  style="border:1px solid black">
		</td>
		</tr><tr>
		<td align="center">
			<b style="font-size:10px;font-family:verdana;color:white">
			+<?php echo $this->_tpl_vars['pstations']; ?>
</b></td>
	</tr>
</table>
</td><td>	
<table align="center">
	<tr>
		<td>
			<img src="../images/game/icons/army/lightcruisers_<?php echo $this->_tpl_vars['lightcruisers_level']; ?>
.gif"  style="border:1px solid black">
		</td>
		</tr><tr>
		<td align="center">
			<b style="font-size:10px;font-family:verdana;color:white">
			+<?php echo $this->_tpl_vars['plightcruisers']; ?>
</b></td>
	</tr>
</table>
</td><td>	
<table align="center">
	<tr>
		<td>
			<img src="../images/game/icons/army/heavycruisers_<?php echo $this->_tpl_vars['heavycruisers_level']; ?>
.gif"  style="border:1px solid black">
		</td>
		</tr><tr>
		<td align="center">
			<b style="font-size:10px;font-family:verdana;color:white">
			+<?php echo $this->_tpl_vars['pheavycruisers']; ?>
</b></td>
	</tr>
</table>
</td><td>	
	
<table align="center">
	<tr>
		<td>
			<img src="../images/game/icons/army/carriers_<?php echo $this->_tpl_vars['carriers_level']; ?>
.gif" style="border:1px solid black">
		</td>
		</tr><tr>
		<td align="center">
			<b style="font-size:10px;font-family:verdana;color:white">
			+<?php echo $this->_tpl_vars['pcarriers']; ?>
</b></td>
	</tr>
</table>
</td><td>	
	
<table align="center">
	<tr>
		<td>
			<img src="../images/game/icons/army/covertagents_<?php echo $this->_tpl_vars['covertagents_level']; ?>
.gif"  style="border:1px solid black">
		</td>
		</tr><tr>
		<td align="center">
			<b style="font-size:10px;font-family:verdana;color:white">
			+<?php echo $this->_tpl_vars['pcovertagents']; ?>
</b></td>
	</tr>
</table>
</td><td>	
	
	
</td></tr>	
<tr>
<td colspan="5"><b style="color:white"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Credits produced<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: +<?php echo $this->_tpl_vars['pcredits']; ?>
, <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Population cost<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: -<?php echo $this->_tpl_vars['population_lost']; ?>
</b></td>
</tr>
</table>