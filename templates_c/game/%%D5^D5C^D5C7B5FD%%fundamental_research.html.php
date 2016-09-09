<?php /* Smarty version 2.6.19, created on 2009-06-12 12:30:31
         compiled from event/fundamental_research.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'event/fundamental_research.html', 11, false),)), $this); ?>
<table width="100%" bgcolor="black" cellpadding="5" background="../images/game/background1.jpg">
<tr>
<td>
<img src="../images/game/event/research.jpg" style="border:1px solid yellow">
</td>
<td width="100%" valign="top">
<div style="color:white" align="right" style="margin:0px"><b><?php echo $this->_tpl_vars['date']; ?>
 </b></div>

<table>
<tr><td><?php echo $this->_tpl_vars['empire']; ?>
</td><td>
<b style="color:yellow;font-size:12px;font-family:verdana;sans-serif"> <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>reached fundamental research level<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <?php echo $this->_tpl_vars['research_level']; ?>
 !</td></tr></table>
</td>
</tr>
</table>