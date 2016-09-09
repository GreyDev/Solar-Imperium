<?php /* Smarty version 2.6.19, created on 2009-07-22 21:28:27
         compiled from event/invaded.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'event/invaded.html', 7, false),)), $this); ?>
<table width="100%" background="../images/game/background/battle.jpg">
<tr>
<td><img src="../images/game/guerilla.jpg" style="border:1px solid yellow"></td>
<td width="100%">
<table width="100%">
<tr><td width="200px" nowrap align="left"><?php echo $this->_tpl_vars['empire_from']; ?>
</td>
<td><b style="color:yellow"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>INVADED<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>&nbsp;>>&nbsp;&nbsp;</b></td>
<td width="100%" align="left"><?php echo $this->_tpl_vars['empire_to']; ?>
</td>
</tr>
<tr>
<td colspan="3" align="right">
<b><?php echo $this->_tpl_vars['won']; ?>
</b>
<td>
</tr>
</table>
</td>
</tr>
</table>