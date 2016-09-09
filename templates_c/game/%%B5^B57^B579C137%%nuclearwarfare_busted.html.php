<?php /* Smarty version 2.6.19, created on 2009-06-12 15:36:30
         compiled from event/nuclearwarfare_busted.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'event/nuclearwarfare_busted.html', 11, false),)), $this); ?>
<table width="100%" bgcolor="black" cellpadding="5" background="../images/game/background1.jpg">
<tr>
<td>
<img src="../images/game/event/busted_by_coordinator.jpg" style="border:1px solid yellow">
</td>
<td width="100%" valign="top">
<div style="color:white" align="right" style="margin:0px"><b><?php echo $this->_tpl_vars['date']; ?>
 </b></div>

<table>
<tr><td>
<b style="color:yellow"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Evil empire got busted!<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td></tr></table>
<table  cellpadding="5" class="text_normal">
<tr><td><?php echo $this->_tpl_vars['empire']; ?>
</td></tr>
<tr><td style="color:#cacaca"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Galactic Coordinator busted and jailed the entire governement for illegal nuclear activities. So, the empire collapsed!<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td></tr>
</table>
</td>
</tr>
</table>