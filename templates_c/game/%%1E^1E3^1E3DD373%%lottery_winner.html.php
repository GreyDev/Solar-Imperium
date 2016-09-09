<?php /* Smarty version 2.6.19, created on 2009-05-26 00:08:28
         compiled from event/lottery_winner.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'event/lottery_winner.html', 9, false),)), $this); ?>
<table width="100%" bgcolor="black" cellpadding="5" background="../images/game/background1.jpg">
<tr>
<td>
<img src="../images/game/event/lotterywinner.jpg" style="border:1px solid yellow">
</td>
<td width="100%" valign="top">
<div style="color:white" align="right" style="margin:0px"><b><?php echo $this->_tpl_vars['date']; ?>
 </b></div>

<b style="color:yellow"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Someone won the daily lottery!<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b><br/>
<br/>
<table cellpadding="5">
<tr>
<td><img style="border:1px solid yellow" src="<?php echo $this->_tpl_vars['logo']; ?>
"></td>
<td><?php echo $this->_tpl_vars['gender']; ?>
 <b>'<?php echo $this->_tpl_vars['emperor']; ?>
'</b> <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>of empire<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <b>'<?php echo $this->_tpl_vars['empire']; ?>
'</b> <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>won the jackpot of<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <?php echo $this->_tpl_vars['lottery_cash']; ?>
 !!!</td>
</tr>
</table>
</td>
</tr>
</table>