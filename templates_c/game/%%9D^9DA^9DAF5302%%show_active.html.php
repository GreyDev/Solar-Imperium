<?php /* Smarty version 2.6.19, created on 2009-05-25 20:51:25
         compiled from show_active.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'show_active.html', 6, false),)), $this); ?>

		<table width="90%" align="center" bgcolor="darkred" cellspacing="1" cellpadding="0" border="0">
		<tr><td>
		<table width="100%" background="images/background1.jpg" align="center" cellspacing="0" cellpadding="5" border="0" style="font-size:11pt;font-family:verdana" bgcolor="#333333">
		<tr>
			<td align="left"><b style="color:white"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Active Players<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
		</tr>

		<tr><td></td></tr>
		<tr>
			<td align="center">
			<?php echo $this->_tpl_vars['current_players']; ?>

			</td>
		</tr>
		
		<tr><td></td></tr>
		
		</table>
		</td>
		</tr>
		</table>