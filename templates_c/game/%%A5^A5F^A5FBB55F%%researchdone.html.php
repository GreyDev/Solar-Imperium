<?php /* Smarty version 2.6.19, created on 2009-05-26 00:59:54
         compiled from event/researchdone.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'event/researchdone.html', 7, false),)), $this); ?>
<table bgcolor="#996699" background="../images/game/background/research.jpg" width="100%">
<tr>
<td>
<img src="../images/game/research/<?php echo $this->_tpl_vars['tech_image']; ?>
" style="border:1px solid yellow">
</td>
<td width="100%">
<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>New research completed:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <b style="color:cyan"><?php echo $this->_tpl_vars['tech_name']; ?>
</b>
</td>
</tr>
</table>