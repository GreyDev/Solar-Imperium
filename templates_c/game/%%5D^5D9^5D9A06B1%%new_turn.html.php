<?php /* Smarty version 2.6.19, created on 2009-05-25 23:47:00
         compiled from event/new_turn.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'event/new_turn.html', 3, false),)), $this); ?>
<table bgcolor="#dddddd" width="100%">
<tr><td width="100%" style="color:black">
<b>Turn #<?php echo $this->_tpl_vars['turns_played']; ?>
 <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>started.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b>
</td>
</table>