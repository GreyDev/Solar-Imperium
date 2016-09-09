<?php /* Smarty version 2.6.19, created on 2009-07-22 22:43:38
         compiled from event/collapsedempire.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'event/collapsedempire.html', 9, false),array('modifier', 'stripslashes', 'event/collapsedempire.html', 13, false),)), $this); ?>
<table width="100%" bgcolor="black" cellpadding="5" background="../images/game/background1.jpg">
<tr>
<td>
<img src="../images/game/event/collapsedempire.jpg" style="border:1px solid yellow">
</td>
<td width="100%" valign="top">
<div style="color:white" align="right" style="margin:0px"><b><?php echo $this->_tpl_vars['date']; ?>
 </b></div>

<b style="color:yellow;font-size:14px;font-family:verdana;sans-serif"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Empire collapsed!<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b><br/>
<br/>
<table style="font-size:12px;font-family:verdana;sans-serif" cellpadding="5">
<tr>
<td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Goodbye<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <?php echo $this->_tpl_vars['gender']; ?>
 <b>'<?php echo ((is_array($_tmp=$this->_tpl_vars['emperor'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
'</b> <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>of Empire<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <b>'<?php echo ((is_array($_tmp=$this->_tpl_vars['empire'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
'</b> !!!</td>
</tr>
</table>
</td>
</tr>
</table>