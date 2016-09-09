<?php /* Smarty version 2.6.19, created on 2009-05-25 23:41:10
         compiled from logo_editor_coalition.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'logo_editor_coalition.html', 25, false),)), $this); ?>
<script language="javascript">
<?php echo '
		var current_color = \'white\';
		
		
		function ChangeCurrentcolor(color)
		{
			current_color = color;
			current_color_picker.style.backgroundColor = color;
		}

		function UpdateCellColor(cell,data)
		{
			document.getElementById(cell).style.backgroundColor = current_color;
			data.value = current_color;
			
		}
'; ?>

		</script>

<table cellspacing="0" cellpadding="10" border="0" style="border:1px solid darkred" background="../images/game/background1.jpg">
<tr><td>
<table align="align" width="720" style="font-size:13px">
	<tr>
		<td><b style="font-size:14pt"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Coalition LOGO Editor<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b> <br />
		<br />

		<form name="logo_form" method="post">
		<table width="100%">
			<tr>
				<td valign="top"><?php echo $this->_tpl_vars['logo_data_html']; ?>
</td>
				<td valign="top">

				<table bgcolor="yellow" cellpadding="0" cellspacing="1" border="0">
					<tr>
						<td>
						<table name="table_current_color" cellspacing="0" cellpadding="5"
							border="0">
							<tr>
								<td id="current_color_picker" bgcolor="<?php echo $this->_tpl_vars['current_color']; ?>
"><font
									color="black"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Current color<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></font></td>
							</tr>
						</table>
						</td>
					</tr>
				</table>
				<?php echo $this->_tpl_vars['color_palette_html']; ?>
 <br/>
				<br />
				<img src="img_logo.php?data=<?php echo $this->_tpl_vars['logo_data']; ?>
" border="1"
					bordercolor="yellow"><br />
				<br />
				<input type="submit" value="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Save logo<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>"> <input type="button"
					value="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Fill<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>"
					onclick="window.location='logo_editor_coalition.php?fill='+escape(current_color)">
				</td>
		</table>
		</td>
	</tr>
</table>
</form>
</td></tr>
<tr><td>
<form method="post">
<b style="color:yellow"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Import / Export logo data<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b><br/>
<textarea name="logo_data_update" rows="2" cols="80" class="text_area">
<?php echo $this->_tpl_vars['logo_data']; ?>

</textarea><br/>
<input type="submit" value="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Update logo<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>">
</form>
</td></tr>
</table>