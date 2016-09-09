<?php /* Smarty version 2.6.19, created on 2009-05-03 21:55:27
         compiled from page_preferences.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'page_preferences.tpl', 2, false),array('modifier', 'date_format', 'page_preferences.tpl', 95, false),)), $this); ?>
<?php ob_start(); ?>
<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Preferences<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
<?php $this->_smarty_vars['capture']['page_title'] = ob_get_contents(); ob_end_clean(); ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "frame_header.tpl", 'smarty_include_vars' => array('title' => $this->_smarty_vars['capture']['page_title'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>



<div align="center">
<div align="center" style="background-image:url(images/system/div_bg.jpg);background-color:darkred;padding:10px;border:1px solid red">
<div class="div_welcome_text" style="display:inline"><a class="div_welcome_link" href="login.php"  style="color:yellow"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>PLAY NOW<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></div>&nbsp;<b class="text_huge" style="color:red">|</b>&nbsp;
<div class="div_welcome_text" style="display:inline"><a class="div_welcome2_link" href="take_a_tour.php"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>TAKE A TOUR<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></div>&nbsp;<b class="text_huge" style="color:red">|</b>&nbsp;
<div class="div_welcome_text" style="display:inline"><a class="div_welcome_link" href="scoreboard.php"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>SCOREBOARD<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></div>&nbsp;<b class="text_huge" style="color:red">|</b>&nbsp;
<div class="div_welcome_text" style="display:inline"><a class="div_welcome2_link" href="server_status.php"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>SERVER STATUS<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></div>&nbsp;<b class="text_huge" style="color:red">|</b>&nbsp;
<div class="div_welcome_text" style="display:inline"><a class="div_welcome_link" href="forum.php"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>FORUM<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></div>
</div>
<br/>


<div align="center">
<div style="background-image:url(images/common/alpha1.png);border:1px solid darkred; padding:5px;color:#eaeaea;width:720px" align="left">

<?php if ($this->_tpl_vars['welcomeback'] == 1): ?>
<b class="text_big" style="color:yellow">
<br/>
&nbsp;Welcome back <?php echo $this->_tpl_vars['real_name']; ?>
!
<br/>
</b>
<?php endif; ?>

<table width="100%">
<tr>
<td  valign="top" width="100%">

<form enctype="multipart/form-data" method="post" name="signup_form" action="preferences.php?UPDATE">
<input type="hidden" name="MAX_FILE_SIZE" value="10000000" />

<table cellspacing="0" cellpadding="2" border="0" style="margin:20px" width="100%">
<tr>
	<td nowrap class="text_normal"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Email address<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>:</td>
	<td><input type="text" maxlength="255" style="width:250px" class="input_text" name="email" value="<?php echo $this->_tpl_vars['email']; ?>
"></td>
</tr>
<tr>
	<td nowrap class="text_normal"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Real name<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>:</td>
	<td><input type="text" maxlength="75" style="width:150px" class="input_text" name="real_name" value="<?php echo $this->_tpl_vars['real_name']; ?>
"></td>
</tr>
<tr>
	<td nowrap class="text_normal"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Country<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>:</td>
	<td><input type="text" maxlength="35" style="width:150px" class="input_text" name="country" value="<?php echo $this->_tpl_vars['country']; ?>
"></td>
</tr>

<tr>
	<td nowrap class="text_normal"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Password<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>:</td>
	<td><input type="password" maxlength="35" style="width:80px" class="input_text" name="password1"><b class="text_tiny" style="color:yellow">&nbsp;<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Leave empty to keep old password<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
</b></td>
</tr>
<tr>
	<td nowrap class="text_normal"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Confirm password<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>:</td>
	<td><input type="password" maxlength="35" style="width:80px"  class="input_text" name="password2"></td>
</tr>

<tr>	
	<td nowrap class="text_normal" valign="top"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Avatar image<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>:</td>
	<td><input type="file"  class="input_text" name="avatar_img"><br/>
	<img src="<?php echo $this->_tpl_vars['avatar_img']; ?>
" style="margin:10px 0px 10px 0px;border:1px solid white"></td>
</tr>

<tr>					
	<td>&nbsp;</td>
	<td width="100%">
<input type="submit" class="input_button" value="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Update Account<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>">
</td>
</tr>
</table>

<script language="javascript">
	document.signup_form.email.focus();
</script>
</form>
<b class="text_big" style="color:yellow">
<br/>
&nbsp;<a href="gamesbrowser.php" class="link">Browse available games</a>
<br/>
</b>
</td>
<td valign="top">
<table background="images/common/alpha2.png" style="border:1px solid #3a3a3a" width="240" cellspacing="0" cellpadding="5">
<tr><td valign="top">

<b class="text_normal" style="color:yellow"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Player statistics:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b>

<table style="color:#dadada" class="text_normal" cellpadding="2" cellspacing="2">
<tr>
	<td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Created on<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>:</td>
	<td><b style="color:white"><?php echo ((is_array($_tmp=$this->_tpl_vars['stats_created_on'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</b></td>
</tr>
<tr>
	<td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Game(s) won<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>:</td>
	<td><b style="color:white"><?php echo $this->_tpl_vars['stats_games_won']; ?>
</b></td>
</tr>
<tr>
	<td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Game(s) lost<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>:</td>
	<td><b style="color:white"><?php echo $this->_tpl_vars['stats_games_lost']; ?>
</b></td>
</tr>
<tr>
	<td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Score<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>:</td>
	<td><b style="color:white"><?php echo $this->_tpl_vars['stats_score']; ?>
</b></td>
</tr>
</table>
<br/>
<table class="text_normal" cellpadding="2" cellspacing="2">
<?php unset($this->_sections['stats']);
$this->_sections['stats']['name'] = 'stats';
$this->_sections['stats']['loop'] = is_array($_loop=$this->_tpl_vars['stats_games']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['stats']['show'] = true;
$this->_sections['stats']['max'] = $this->_sections['stats']['loop'];
$this->_sections['stats']['step'] = 1;
$this->_sections['stats']['start'] = $this->_sections['stats']['step'] > 0 ? 0 : $this->_sections['stats']['loop']-1;
if ($this->_sections['stats']['show']) {
    $this->_sections['stats']['total'] = $this->_sections['stats']['loop'];
    if ($this->_sections['stats']['total'] == 0)
        $this->_sections['stats']['show'] = false;
} else
    $this->_sections['stats']['total'] = 0;
if ($this->_sections['stats']['show']):

            for ($this->_sections['stats']['index'] = $this->_sections['stats']['start'], $this->_sections['stats']['iteration'] = 1;
                 $this->_sections['stats']['iteration'] <= $this->_sections['stats']['total'];
                 $this->_sections['stats']['index'] += $this->_sections['stats']['step'], $this->_sections['stats']['iteration']++):
$this->_sections['stats']['rownum'] = $this->_sections['stats']['iteration'];
$this->_sections['stats']['index_prev'] = $this->_sections['stats']['index'] - $this->_sections['stats']['step'];
$this->_sections['stats']['index_next'] = $this->_sections['stats']['index'] + $this->_sections['stats']['step'];
$this->_sections['stats']['first']      = ($this->_sections['stats']['iteration'] == 1);
$this->_sections['stats']['last']       = ($this->_sections['stats']['iteration'] == $this->_sections['stats']['total']);
?>
<tr>
	<td nowrap>Game: <b><?php echo $this->_tpl_vars['stats_games'][$this->_sections['stats']['index']]['name']; ?>
</b>, <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Rank<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <b><?php echo $this->_tpl_vars['stats_games'][$this->_sections['stats']['index']]['rank']; ?>
</b></td>
	<td><b><a href="<?php echo $this->_tpl_vars['stats_games'][$this->_sections['stats']['index']]['link']; ?>
" style="color:darkblue"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Play<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></b></td>
</tr>

<?php endfor; else: ?>
<tr><td><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>*** No games joined yet.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td></tr>
<?php endif; ?>
</table>


</td></tr>
</table>

<br/>
<?php if ($this->_tpl_vars['premium_offer'] == 1): ?>
<table bgcolor="yellow" style="border:1px solid red" width="240" cellspacing="0" cellpadding="5">
<tr><td valign="top">

<a class="text_small" style="color:red" href="premiumaccount.php"><b>&gt;&gt; <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>UPGRADE TO PREMIUM<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a>
<br/>
<table class="text_tiny">
<tr><td><b style="color:darkred">-<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>A non-waiting access to all the games<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td></tr>
<tr><td><b style="color:darkred">-<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>One extra TURN per day per game<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td></tr>
</table>
<div align="right">
<a class="text_small" style="color:red" href="premiumaccount.php"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>More details<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a>
</div>

</td></tr>
</table>
<?php endif; ?>

<br>
<table class="text_tiny" background="images/common/alpha2.png" style="border:1px solid #6a6a6a;color:#cacaca" width="240" cellspacing="0" cellpadding="5">
<tr><td colspan="2"><b  class="text_normal" style="color:yellow"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Last logins<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td></tr>
<?php unset($this->_sections['last']);
$this->_sections['last']['name'] = 'last';
$this->_sections['last']['loop'] = is_array($_loop=$this->_tpl_vars['last_logins']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['last']['show'] = true;
$this->_sections['last']['max'] = $this->_sections['last']['loop'];
$this->_sections['last']['step'] = 1;
$this->_sections['last']['start'] = $this->_sections['last']['step'] > 0 ? 0 : $this->_sections['last']['loop']-1;
if ($this->_sections['last']['show']) {
    $this->_sections['last']['total'] = $this->_sections['last']['loop'];
    if ($this->_sections['last']['total'] == 0)
        $this->_sections['last']['show'] = false;
} else
    $this->_sections['last']['total'] = 0;
if ($this->_sections['last']['show']):

            for ($this->_sections['last']['index'] = $this->_sections['last']['start'], $this->_sections['last']['iteration'] = 1;
                 $this->_sections['last']['iteration'] <= $this->_sections['last']['total'];
                 $this->_sections['last']['index'] += $this->_sections['last']['step'], $this->_sections['last']['iteration']++):
$this->_sections['last']['rownum'] = $this->_sections['last']['iteration'];
$this->_sections['last']['index_prev'] = $this->_sections['last']['index'] - $this->_sections['last']['step'];
$this->_sections['last']['index_next'] = $this->_sections['last']['index'] + $this->_sections['last']['step'];
$this->_sections['last']['first']      = ($this->_sections['last']['iteration'] == 1);
$this->_sections['last']['last']       = ($this->_sections['last']['iteration'] == $this->_sections['last']['total']);
?>
<tr><td><?php echo $this->_tpl_vars['last_logins'][$this->_sections['last']['index']]['date']; ?>
</td><td><?php echo $this->_tpl_vars['last_logins'][$this->_sections['last']['index']]['name']; ?>
</td><td><?php echo $this->_tpl_vars['last_logins'][$this->_sections['last']['index']]['hostname']; ?>
</td></tr>

<?php endfor; else: ?>
<tr><td colspan="3">---</td></tr>
<?php endif; ?>

</table>
<br/>
</td>
</tr>
</table>
</div>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "frame_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>