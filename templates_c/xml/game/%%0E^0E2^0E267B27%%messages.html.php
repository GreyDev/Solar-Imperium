<?php /* Smarty version 2.6.19, created on 2009-07-18 16:38:47
         compiled from messages.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'messages.html', 4, false),)), $this); ?>
		<table  cellspacing="0" cellpadding="0" border="0">
		<tr>	
		<td nowrap><img src="../images/game/tab_left.gif" border="0"></td>
		<td nowrap bgcolor="darkred" style="padding:0px 5px 0px 5px"><a  style="text-decoration:none;color:white" href="messages.php"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Messages<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></td> 
		<td><img src="../images/game/tab_right.gif" border="0"></td>

		<td nowrap><img src="../images/game/tab2_left.gif" border="0"></td>
		<td nowrap bgcolor="#666666"  style="padding:0px 5px 0px 5px"><a  class="link" href="diplomacy.php"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Diplomatic Ties<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></td> 
		<td><img src="../images/game/tab2_right.gif" border="0"></td>

		<td nowrap><img src="../images/game/tab2_left.gif" border="0"></td>
		<td nowrap bgcolor="#666666"  style="padding:0px 5px 0px 5px"><a  class="link" href="shoutbox.php"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Coalition Shoutbox<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></td>
		<td><img src="../images/game/tab2_right.gif" border="0"></td>

		</table>


<form method="post" action="messages.php">
<table cellpadding="1" cellspacing="0" border="0" bgcolor="darkred"
	width="720">
	
	<tr>
		<td>
		<table style="font-size:11pt" background="../images/game/background1.jpg"
			bgcolor="#333333" width="100%" cellspacing="0" cellpadding="5"
			border="0" align="center">
			<tr><td><br/></td></tr>
			<tr>
				<td align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Subject:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
				<td><input
					style="width:500px;" class="input_text" 
					type="text" name="subject" value="<?php echo $this->_tpl_vars['msg_re_subject']; ?>
"></td>
			</tr>
			<tr>
				<td align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>To:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
				<td><select name="recipient"  class="select_box" 
					style="width:500px">
					<option value="-3">---</option>
					<option value="-2"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>### Coalition members ###<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></option>
					<option value="-1"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>*** Everyone / All ***<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></option>
					<?php unset($this->_sections['r']);
$this->_sections['r']['name'] = 'r';
$this->_sections['r']['loop'] = is_array($_loop=$this->_tpl_vars['recipients']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['r']['show'] = true;
$this->_sections['r']['max'] = $this->_sections['r']['loop'];
$this->_sections['r']['step'] = 1;
$this->_sections['r']['start'] = $this->_sections['r']['step'] > 0 ? 0 : $this->_sections['r']['loop']-1;
if ($this->_sections['r']['show']) {
    $this->_sections['r']['total'] = $this->_sections['r']['loop'];
    if ($this->_sections['r']['total'] == 0)
        $this->_sections['r']['show'] = false;
} else
    $this->_sections['r']['total'] = 0;
if ($this->_sections['r']['show']):

            for ($this->_sections['r']['index'] = $this->_sections['r']['start'], $this->_sections['r']['iteration'] = 1;
                 $this->_sections['r']['iteration'] <= $this->_sections['r']['total'];
                 $this->_sections['r']['index'] += $this->_sections['r']['step'], $this->_sections['r']['iteration']++):
$this->_sections['r']['rownum'] = $this->_sections['r']['iteration'];
$this->_sections['r']['index_prev'] = $this->_sections['r']['index'] - $this->_sections['r']['step'];
$this->_sections['r']['index_next'] = $this->_sections['r']['index'] + $this->_sections['r']['step'];
$this->_sections['r']['first']      = ($this->_sections['r']['iteration'] == 1);
$this->_sections['r']['last']       = ($this->_sections['r']['iteration'] == $this->_sections['r']['total']);
?>
					<option <?php echo $this->_tpl_vars['recipients'][$this->_sections['r']['index']]['selected']; ?>
 value="<?php echo $this->_tpl_vars['recipients'][$this->_sections['r']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['recipients'][$this->_sections['r']['index']]['name']; ?>
</option>
					<?php endfor; endif; ?>
				</select></td>
			</tr>
			<tr>
				<td align="right" valign="top"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Content:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
				<td><textarea name="content"  class="text_area"  rows="12" cols="60"
					style="width:500px;"><?php echo $this->_tpl_vars['msg_content']; ?>
</textarea></td>
			</tr>
			<tr>
				<td align="right">&nbsp;</td>
				<td><input type="submit" value="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Send Message<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>"></td>
			</tr>
			<tr><td><br/></td></tr>

			
		</table>
		</td>
	</tr>
</table>
</form>
<br />
<?php echo $this->_tpl_vars['messages']; ?>

<br />