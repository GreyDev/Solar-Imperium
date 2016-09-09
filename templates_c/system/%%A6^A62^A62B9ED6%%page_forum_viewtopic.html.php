<?php /* Smarty version 2.6.19, created on 2009-09-16 22:17:28
         compiled from page_forum_viewtopic.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'page_forum_viewtopic.html', 2, false),)), $this); ?>
<?php ob_start(); ?>
<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Forum View Topic<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
<?php $this->_smarty_vars['capture']['page_title'] = ob_get_contents(); ob_end_clean(); ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "frame_header.html", 'smarty_include_vars' => array('title' => $this->_smarty_vars['capture']['page_title'])));
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
    <div style="width:800px;background-image:url(images/common/alpha1.png);border:1px solid darkred;padding:10px">


<table cellpadding="5" cellspacing="0" width="100%" style="color:#dedede">
	<tr>
		<td class="text_big">
            <table cellspacing="0" width="100%" cellpadding="0" border="0">
                <tr><td width="100%">
            &nbsp;<b>Topic #<?php echo $this->_tpl_vars['topic_id']; ?>
: </b><b style="color:white"><?php echo $this->_tpl_vars['topic_title']; ?>
</b>
                </td><td nowrap>
<a href="forum.php" class="link"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Back to forum<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a>
            </td></tr></table>
		</td>
	</tr>
	<tr>
		<td>
		
		<table  class="text_small" width="100%" cellspacing="1" cellpadding="1" border="0" align="center">
			<tr>
				<td align="right">

                <b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Pages:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> </b><b style="color:white"><?php echo $this->_tpl_vars['pages']; ?>
</b>
				<table class="text_normal" width="100%"
					cellspacing="1" bgcolor="darkred" cellpadding="0">


					<?php if ($this->_tpl_vars['topic_post'] == 1): ?>
					<tr>
						<td valign="top">
						<table cellspacing="0" width="100%" cellpadding="5" border="0">

							<tr bgcolor="#cacada">
								<td class="text_small" bgcolor="#333333" align="center" valign="top">
								<div style="width:140px">
								<b class="text_normal" style="color:#cacaca"><?php echo $this->_tpl_vars['topic_author_nickname']; ?>
</b> <br />
								<br />
								<img src="<?php echo $this->_tpl_vars['topic_author_image']; ?>
" width="32px" style="border:1px solid #000000"><br />
								<br />
								<?php echo $this->_tpl_vars['topic_date']; ?>
<br/>
								<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>viewed<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <?php echo $this->_tpl_vars['topic_views']; ?>
 <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>times<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
								</div>
								</td>

								<td width="100%" valign="top" class="text_normal" style="color:#333333"><?php echo $this->_tpl_vars['topic_content']; ?>
</td>

							</tr>
						</table>
						</td>
					</tr>
					<?php endif; ?>

					
					<?php unset($this->_sections['rep']);
$this->_sections['rep']['name'] = 'rep';
$this->_sections['rep']['loop'] = is_array($_loop=$this->_tpl_vars['replies']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['rep']['show'] = true;
$this->_sections['rep']['max'] = $this->_sections['rep']['loop'];
$this->_sections['rep']['step'] = 1;
$this->_sections['rep']['start'] = $this->_sections['rep']['step'] > 0 ? 0 : $this->_sections['rep']['loop']-1;
if ($this->_sections['rep']['show']) {
    $this->_sections['rep']['total'] = $this->_sections['rep']['loop'];
    if ($this->_sections['rep']['total'] == 0)
        $this->_sections['rep']['show'] = false;
} else
    $this->_sections['rep']['total'] = 0;
if ($this->_sections['rep']['show']):

            for ($this->_sections['rep']['index'] = $this->_sections['rep']['start'], $this->_sections['rep']['iteration'] = 1;
                 $this->_sections['rep']['iteration'] <= $this->_sections['rep']['total'];
                 $this->_sections['rep']['index'] += $this->_sections['rep']['step'], $this->_sections['rep']['iteration']++):
$this->_sections['rep']['rownum'] = $this->_sections['rep']['iteration'];
$this->_sections['rep']['index_prev'] = $this->_sections['rep']['index'] - $this->_sections['rep']['step'];
$this->_sections['rep']['index_next'] = $this->_sections['rep']['index'] + $this->_sections['rep']['step'];
$this->_sections['rep']['first']      = ($this->_sections['rep']['iteration'] == 1);
$this->_sections['rep']['last']       = ($this->_sections['rep']['iteration'] == $this->_sections['rep']['total']);
?>
					<tr>
						<td>
						<table width="100%" cellspacing="0" cellpadding="5" border="0" class="text_normal" style="color:#000000">
							<tr>
								<td bgcolor="#dadaea" width="100%" valign="top"><?php echo $this->_tpl_vars['replies'][$this->_sections['rep']['index']]['content']; ?>
</td>
								<td bgcolor="#606060" valign="top" align="center"><b style="color:#dadada">
								<div style="width:140px">
								<?php echo $this->_tpl_vars['replies'][$this->_sections['rep']['index']]['author_nickname']; ?>
</b> <br />
								<br />
								<img width="32px" src="<?php echo $this->_tpl_vars['replies'][$this->_sections['rep']['index']]['author_image']; ?>
" style="border:1px solid #000000"><br />
								<br />
								<font class="text_small" style="color:white"><?php echo $this->_tpl_vars['replies'][$this->_sections['rep']['index']]['author_date']; ?>
</font>
								</div>
								</td>
							</tr>
						</table>

						</td>
					</tr>
					<?php endfor; else: ?>
					<?php endif; ?>
				</table>
				<b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Pages:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> </b><b style="color:white"><?php echo $this->_tpl_vars['pages']; ?>
</b>
				</td>
			</tr>
		</table>
		</td>
	</tr>
</table>

</div></div><br/>
<?php if ($this->_tpl_vars['player_connected'] == 1): ?>

<div style="width:800px;background-image:url(images/common/alpha3.png);border:1px solid darkred;padding:10px">
<form method="post" action="forum_viewtopic.php?topic=<?php echo $this->_tpl_vars['topic_id']; ?>
">
<table cellpadding="1" cellspacing="0" border="0">
	<tr>
                <td class="text_normal" style="color:white"><b>&nbsp;<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Post a new
                reply<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
            </tr>
	<tr>
		<td>
		<table class="text_small"  width="100%"	cellspacing="10" cellpadding="5" border="0" align="center" style="color:#dedede">
			<tr>
				<td align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>BB Codes allowed:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
				<td><b>[list] [b] [u] [i] [code] [quote]</b></td>
			</tr>
			<tr>
				<td align="right" valign="top"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Content:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
				<td><textarea name="content" rows="12" cols="80"
					class="input_text"></textarea></td>
			</tr>
			<tr>
				<td align="right">&nbsp;</td>
				<td><input type="submit" name="forum_newreply"
					value="Post reply" class="input_button"></td>
			</tr>

			<tr>
				<td colspan="2"><br />
				<b class="text_small" style="color:yellow"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Please do not spam or
				your account will be terminated.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b> <br />
				<br />
				</td>
			</tr>
		</table>
		</td>
	</tr>
</table>
</form>
</div>
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "frame_footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>