<?php /* Smarty version 2.6.19, created on 2009-07-28 21:40:09
         compiled from covertop/bombingoperations.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'covertop/bombingoperations.html', 1, false),)), $this); ?>
<div class="text_normal"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Food bombed<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <b style="color:yellow"><?php echo $this->_tpl_vars['food_lost']; ?>
</b></div>