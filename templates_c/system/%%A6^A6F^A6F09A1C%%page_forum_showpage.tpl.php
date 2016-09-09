<?php /* Smarty version 2.6.19, created on 2009-05-03 21:32:41
         compiled from page_forum_showpage.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'page_forum_showpage.tpl', 2, false),)), $this); ?>
<?php ob_start(); ?>
<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Forum<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
<?php $this->_smarty_vars['capture']['page_title'] = ob_get_contents(); ob_end_clean(); ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "frame_header.tpl", 'smarty_include_vars' => array('title' => $this->_smarty_vars['capture']['page_title'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>



<div align="center">
<div align="center" style="background-image:url(images/system/div_bg.jpg);background-color:darkred;padding:10px;border:1px solid red">
<div class="div_welcome_text" style="display:inline"><a class="div_welcome_link" href="login.php"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>PLAY NOW<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></div>&nbsp;<b class="text_huge" style="color:red">|</b>&nbsp;
<div class="div_welcome_text" style="display:inline"><a class="div_welcome2_link" href="take_a_tour.php"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>TAKE A TOUR<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></div>&nbsp;<b class="text_huge" style="color:red">|</b>&nbsp;
<div class="div_welcome_text" style="display:inline"><a class="div_welcome_link" href="scoreboard.php"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>SCOREBOARD<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></div>&nbsp;<b class="text_huge" style="color:red">|</b>&nbsp;
<div class="div_welcome_text" style="display:inline"><a class="div_welcome2_link" href="server_status.php"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>SERVER STATUS<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></div>&nbsp;<b class="text_huge" style="color:red">|</b>&nbsp;
<div class="div_welcome_text" style="display:inline"><a class="div_welcome_link" href="forum.php" style="color:yellow"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>FORUM<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></div>
</div>
<br/>


<div align="center">
<div style="width:800px;background-image:url(images/common/alpha1.png);border:1px solid #6a6a6a;padding:10px">


<table cellpadding="1" cellspacing="0" border="0" width="760">
	<tr>
		<td>
		<table class="text_small" 
			 width="100%" cellspacing="0" cellpadding="0"
			border="0" align="center">
			<tr>
				<td>
	
				<div class="text_normal" style="padding:5px;color:white">

                <table width="100%" cellspacing="0" cellpadding="0">
                <tr><td width="100%" nowrap>
                <b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Current forum:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b> <b style="color:yellow"><?php echo $this->_tpl_vars['current_forum']; ?>
</b>
                </td><td nowrap><a class="link" href="forum.php?BACK"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Back To Forums<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></td>
                </tr></table>

                </div>

				<table class="text_small" style="background-color:darkred;color:white" width="100%" cellspacing="1"
					cellpadding="10" border="0">
					<tr>
						<td background="images/system/div_bg.jpg"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Topic<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
						<td background="images/system/div_bg.jpg"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Views<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
						<td background="images/system/div_bg.jpg"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Replies<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
						<td background="images/system/div_bg.jpg"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Author<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
						<td background="images/system/div_bg.jpg"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Life<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
						<td background="images/system/div_bg.jpg"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Last Reply<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>

					</tr>

					<?php unset($this->_sections['item']);
$this->_sections['item']['name'] = 'item';
$this->_sections['item']['loop'] = is_array($_loop=$this->_tpl_vars['items']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['item']['show'] = true;
$this->_sections['item']['max'] = $this->_sections['item']['loop'];
$this->_sections['item']['step'] = 1;
$this->_sections['item']['start'] = $this->_sections['item']['step'] > 0 ? 0 : $this->_sections['item']['loop']-1;
if ($this->_sections['item']['show']) {
    $this->_sections['item']['total'] = $this->_sections['item']['loop'];
    if ($this->_sections['item']['total'] == 0)
        $this->_sections['item']['show'] = false;
} else
    $this->_sections['item']['total'] = 0;
if ($this->_sections['item']['show']):

            for ($this->_sections['item']['index'] = $this->_sections['item']['start'], $this->_sections['item']['iteration'] = 1;
                 $this->_sections['item']['iteration'] <= $this->_sections['item']['total'];
                 $this->_sections['item']['index'] += $this->_sections['item']['step'], $this->_sections['item']['iteration']++):
$this->_sections['item']['rownum'] = $this->_sections['item']['iteration'];
$this->_sections['item']['index_prev'] = $this->_sections['item']['index'] - $this->_sections['item']['step'];
$this->_sections['item']['index_next'] = $this->_sections['item']['index'] + $this->_sections['item']['step'];
$this->_sections['item']['first']      = ($this->_sections['item']['iteration'] == 1);
$this->_sections['item']['last']       = ($this->_sections['item']['iteration'] == $this->_sections['item']['total']);
?>
					<tr style="height:32px;color:<?php echo $this->_tpl_vars['items'][$this->_sections['item']['index']]['fgcolor']; ?>
">
						<td width="100%" bgcolor="<?php echo $this->_tpl_vars['items'][$this->_sections['item']['index']]['bgcolor']; ?>
"><?php echo $this->_tpl_vars['items'][$this->_sections['item']['index']]['new']; ?>
<a
							style="color:<?php echo $this->_tpl_vars['items'][$this->_sections['item']['index']]['fgcolor']; ?>
" class="text_normal" href="<?php echo $this->_tpl_vars['items'][$this->_sections['item']['index']]['url']; ?>
"><?php echo $this->_tpl_vars['items'][$this->_sections['item']['index']]['title']; ?>
</a></td>
						<td align="center" bgcolor="<?php echo $this->_tpl_vars['items'][$this->_sections['item']['index']]['bgcolor']; ?>
"><?php echo $this->_tpl_vars['items'][$this->_sections['item']['index']]['views']; ?>
</td>
						<td align="center" bgcolor="<?php echo $this->_tpl_vars['items'][$this->_sections['item']['index']]['bgcolor']; ?>
"><?php echo $this->_tpl_vars['items'][$this->_sections['item']['index']]['replies']; ?>
</td>
						<td nowrap bgcolor="<?php echo $this->_tpl_vars['items'][$this->_sections['item']['index']]['bgcolor']; ?>
"><?php echo $this->_tpl_vars['items'][$this->_sections['item']['index']]['author']; ?>
</td>
						<td nowrap bgcolor="<?php echo $this->_tpl_vars['items'][$this->_sections['item']['index']]['bgcolor']; ?>
"><?php echo $this->_tpl_vars['items'][$this->_sections['item']['index']]['date']; ?>
</td>
						<td nowrap bgcolor="<?php echo $this->_tpl_vars['items'][$this->_sections['item']['index']]['bgcolor']; ?>
"><?php echo $this->_tpl_vars['items'][$this->_sections['item']['index']]['lastreply']; ?>
</td>

					</tr>

					<?php endfor; else: ?>
					<tr>
						<td bgcolor="#dadaea" colspan="6" style="color:#333333" background="images/common/alpha1.png" class="text_normal"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Forum is empty!<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
					</tr>
					<?php endif; ?>
					<tr>
						<td colspan="6"  align="right"><?php echo $this->_tpl_vars['pages']; ?>
</td>
					</tr>
				</table>

				</td>
			</tr>
		</table>
		</td>
	</tr>
</table>
<br />
</div></div>

<?php if ($this->_tpl_vars['player_connected'] == 1): ?>
<form method="post" action="forum.php?POST_TOPIC">
<table cellpadding="1" cellspacing="0" border="0" width="100%">
	<tr>
		<td class="text_normal"><b>&nbsp;<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Post a new
		topic<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
	</tr>
	<tr>
		<td>
		<table class="text_small" width="100%" cellspacing="10" cellpadding="5"
			border="0" align="center">
			<tr>
				<td align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Subject:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
				<td><input
					class="input_text" style="width:500px"
					type="text" name="subject" value=""></td>
			</tr>
			<tr>
				<td align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>BB Codes allowed:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
				<td><b>[list] [img] [b] [u] [i] [color=] [size=] [url=] [mail=] [code] [quote]</b></td>
			</tr>
			<tr>
				<td align="right" valign="top"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Content:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
				<td><textarea name="content" rows="12" cols="80"
					class="input_text"></textarea></td>
			</tr>
			<tr>
				<td align="right">&nbsp;</td>
				<td><input type="submit" name="forum_newtopic"
					value="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Post topic<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" class="input_button"></td>
			</tr>

			<tr>
				<td colspan="2"><br />
				<b class="text_small" style="color:black"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Please do not spam or
				your account will be terminated.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b> <br />
				<br />
				</td>
			</tr>
		</table>
		</td>
	</tr>
</table>
</form>
<?php endif; ?>

<br/>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "frame_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>