<?php /* Smarty version 2.6.19, created on 2009-05-25 23:49:07
         compiled from event/civilstatus.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'event/civilstatus.html', 5, false),)), $this); ?>
<table>
<tr><td>
<img src="../images/game/insurgency/<?php echo $this->_tpl_vars['civil_status_id']; ?>
.gif" style="border:0px solid white">
</td><td>
<font style="color:#cacaca"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Current civil status:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> </b>
<b style="color:white"><?php echo $this->_tpl_vars['civil_status']; ?>
</b></font>

</td></tr>
</table>

<?php if ($this->_tpl_vars['content'] != ''): ?>
<br/><br/>
<div align="center" style="color:yellow"><b>
<?php echo $this->_tpl_vars['content']; ?>
</b>
</div>
<?php endif; ?>
