<?php /* Smarty version 2.6.19, created on 2009-07-19 15:18:38
         compiled from event/coalition_disbanded.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'event/coalition_disbanded.html', 9, false),)), $this); ?>
<table width="100%" bgcolor="black" cellpadding="5" background="../images/game/background1.jpg">
<tr>
<td>
<img src="../images/game/event/coalition_disbanded.jpg" style="border:1px solid yellow">
</td>
<td width="100%" valign="top">
<div style="color:white" align="right" style="margin:0px"><b><?php echo $this->_tpl_vars['date']; ?>
 </b></div>

<b style="color:yellow;font-size:14px;font-family:verdana;sans-serif"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Coalition disbanded<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b><br/>
<br/>
<table style="font-size:12px;font-family:verdana;sans-serif" cellpadding="5">
<tr>
<td><img style="border:1px solid yellow" src="../images/game/empires/<?php echo $this->_tpl_vars['game_id']; ?>
/<?php echo $this->_tpl_vars['empire_id']; ?>
.jpg"></td>
<td><?php echo $this->_tpl_vars['gender']; ?>
 <b>'<?php echo $this->_tpl_vars['emperor']; ?>
'</b> <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>of Empire<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <b>'<?php echo $this->_tpl_vars['empire']; ?>
'</b> <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>disbanded coalition<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> '<b><?php echo $this->_tpl_vars['coalition_name']; ?>
</b>'</td>
</tr>
</table>
</td>
</tr>
</table>