<?php /* Smarty version 2.6.19, created on 2009-05-24 22:31:45
         compiled from frame_footer.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'frame_footer.html', 9, false),)), $this); ?>

<br/>
<div align="center">
<table align="center" style="color:#9a9a9a" class="text_tiny">
<tr>
	<td>
		<img width="16px" height="16px" src="images/common/mrgtech.png" border="0">
	</td>
	<td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>This game is a creation of <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><a style="color:#cacaca;text-decoration:none" href="http://www.mrgtech.ca" target="_NEW">Yanick Bourbeau</a> / 2005-2009
	</td>
</tr>
</table>
</div>

<br />
</div>
</body>
</html>