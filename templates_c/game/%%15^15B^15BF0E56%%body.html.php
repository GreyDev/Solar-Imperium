<?php /* Smarty version 2.6.19, created on 2009-07-19 22:48:10
         compiled from message/body.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'message/body.html', 8, false),)), $this); ?>
<table  background="../images/game/background/notice.jpg"  width="720" style="border:1px solid white" cellspacing="0"
	cellpadding="2">
	<tr>
		<td>&nbsp;<img src="../images/game/letter.gif" border="0">&nbsp;</td>
		<td width="100%">
		
		<b style="color:yellow"><?php echo $this->_tpl_vars['subject']; ?>
</b>,
		 <?php echo $this->_tpl_vars['date']; ?>
 <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>ago<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><br />
		<table cellspacing="0" cellpadding="0" border="0">
			<tr>
				<td><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>From<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>&nbsp;</b></td>
				<td><?php echo $this->_tpl_vars['author']; ?>
</td>
			</tr>
		</table>
		</td>
		<td align="right">
                    <a class="link" href="#" onclick="open_page('messages.php?id=<?php echo $this->_tpl_vars['id']; ?>
')"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Reply<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a>&nbsp;
                    <a class="link" href="#" onclick="if (confirm('<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Are you sure?<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>')) open_page('messages.php?delete=<?php echo $this->_tpl_vars['id']; ?>
'); else return false;"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Delete<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a>&nbsp;
                </td>
	</tr>
	<tr>
		<td colspan="3">
		<table bgcolor="#545454" width="100%"
			cellspacing="0" cellpadding="12"
			border="0">
			<tr>
				<td style="color:white;text-align:justify"><?php echo $this->_tpl_vars['content']; ?>
</td>
			</tr>

		</table>

		</td>
	</tr>
</table>