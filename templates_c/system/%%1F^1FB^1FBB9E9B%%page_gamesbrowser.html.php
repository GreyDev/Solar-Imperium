<?php /* Smarty version 2.6.19, created on 2009-09-14 01:17:08
         compiled from page_gamesbrowser.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'page_gamesbrowser.html', 2, false),array('modifier', 'round', 'page_gamesbrowser.html', 63, false),array('modifier', 'number_format', 'page_gamesbrowser.html', 187, false),array('modifier', 'date_format', 'page_gamesbrowser.html', 289, false),)), $this); ?>
<?php ob_start(); ?>
<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Games Browser<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
<?php $this->_smarty_vars['capture']['page_title'] = ob_get_contents(); ob_end_clean(); ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "frame_header.html", 'smarty_include_vars' => array('title' => $this->_smarty_vars['capture']['page_title'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>



<div align="center" style="background-image:url(images/system/div_bg.jpg);background-color:darkred;padding:10px;border:1px solid red">
<div class="div_welcome_text" style="display:inline"><a class="div_welcome_link" href="login.php"  style="color:yellow"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>PLAY NOW<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></div>&nbsp;<b class="text_huge" style="color:red">|</b>&nbsp;
<div class="div_welcome_text" style="display:inline"><a class="div_welcome2_link" href="take_a_tour.php"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>TAKE A TOUR<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></div>&nbsp;<b class="text_huge" style="color:red">|</b>&nbsp;
<div class="div_welcome_text" style="display:inline"><a class="div_welcome_link" href="scoreboard.php"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>SCOREBOARD<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></div>&nbsp;<b class="text_huge" style="color:red">|</b>&nbsp;
<div class="div_welcome_text" style="display:inline"><a class="div_welcome2_link" href="server_status.php"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>SERVER STATUS<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></div>&nbsp;<b class="text_huge" style="color:red">|</b>&nbsp;
<div class="div_welcome_text" style="display:inline"><a class="div_welcome_link" href="forum.php"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>FORUM<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></div>
</div>
<br/>


<!-- begin content -->


<div align="center">

<table width="720px" cellspacing="0" cellpadding="0" border="0" class="text_normal">
<tr>
<td bgcolor="darkred" style="padding:5px" nowrap><b><a class="link" href="preferences.php">Player Profile</a></b></td>
<td bgcolor="#ca3333" style="padding:5px" nowrap>

     <table cellspacing="0" cellpadding="0" border="0">
        <tr><td><img src="images/common/star.gif" border="0">&nbsp;</td><td><b style="color:yellow">Browse Available Games</b></td></tr>
     </table>

</td>
<td width="100%">&nbsp;</td>
</tr>
</table>

<div style="background-image:url(images/common/alpha1.png);border:1px solid darkred; padding:5px;color:#eaeaea;width:720px" align="left">

<div class="text_big" style="color:white;padding:10px;margin:5px"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Pick a game (You can play on each ones): <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></div>


<?php unset($this->_sections['game']);
$this->_sections['game']['name'] = 'game';
$this->_sections['game']['loop'] = is_array($_loop=$this->_tpl_vars['games']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['game']['show'] = true;
$this->_sections['game']['max'] = $this->_sections['game']['loop'];
$this->_sections['game']['step'] = 1;
$this->_sections['game']['start'] = $this->_sections['game']['step'] > 0 ? 0 : $this->_sections['game']['loop']-1;
if ($this->_sections['game']['show']) {
    $this->_sections['game']['total'] = $this->_sections['game']['loop'];
    if ($this->_sections['game']['total'] == 0)
        $this->_sections['game']['show'] = false;
} else
    $this->_sections['game']['total'] = 0;
if ($this->_sections['game']['show']):

            for ($this->_sections['game']['index'] = $this->_sections['game']['start'], $this->_sections['game']['iteration'] = 1;
                 $this->_sections['game']['iteration'] <= $this->_sections['game']['total'];
                 $this->_sections['game']['index'] += $this->_sections['game']['step'], $this->_sections['game']['iteration']++):
$this->_sections['game']['rownum'] = $this->_sections['game']['iteration'];
$this->_sections['game']['index_prev'] = $this->_sections['game']['index'] - $this->_sections['game']['step'];
$this->_sections['game']['index_next'] = $this->_sections['game']['index'] + $this->_sections['game']['step'];
$this->_sections['game']['first']      = ($this->_sections['game']['iteration'] == 1);
$this->_sections['game']['last']       = ($this->_sections['game']['iteration'] == $this->_sections['game']['total']);
?>

<div align="center">
<table class="text_normal" style="border:1px solid red; background-color:darkred;padding:6px;margin:5px" cellspacing="0" cellpadding="4" width="700" align="center">
<tr>
<td rowspan="3"><img src="images/system/<?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['logo_img']; ?>
.png" style="border:1px solid black"></td>
<td nowrap><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Game Name:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
<td  width="100%" colspan="3"><b><?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['name']; ?>
</b></td>
</tr>
<tr>
<td nowrap valign="top"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Description:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td  colspan="3" style="margin:5px"><b><?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['description']; ?>
</b></td>
</tr>
<tr>
<td nowrap><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Connected players:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td nowrap><b><?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['connected_players']; ?>
 / <?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['players_slot']; ?>
</b></td>
<td nowrap>&nbsp;<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Reg'd players:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td width="100%"><b><?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['empires_count']; ?>
 / <?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['max_players']; ?>
</b></td>
</tr>

<?php if ($this->_tpl_vars['games'][$this->_sections['game']['index']]['need_restart'] == 1): ?>
<tr>
<TD colspan="5" class="text_big"><b style="color:yellow">*** <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>The current game has ended, the winner is:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <b style="color:yellow"><?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['winner']; ?>
</b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>, you can still visit the scoreboard and the starmap,
A new game will start in:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <b style="color:yellow"><?php echo ((is_array($_tmp=$this->_tpl_vars['games'][$this->_sections['game']['index']]['restart_date']/60)) ? $this->_run_mod_handler('round', true, $_tmp) : round($_tmp)); ?>
 <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>minutes<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b> ***</b></TD>
</tr>
<?php endif; ?>

<tr>

<?php if ($this->_tpl_vars['games'][$this->_sections['game']['index']]['need_login'] == 1): ?>
<td colspan="5" align="right" style="padding:0px;color:black">
<table cellspacing="0" cellpadding="0" border="0">
<tr>
<td>

<table style="margin:5px;padding:2px" cellspacing="0" cellpadding="0" border="0">
<tr><td>
<img src="images/system/icon_button_scoreboard.png" style="border:1px solid white;padding:0px">
</td>
<td><b><a class="link" style="margin:5px" target="_NEW" href="game/scoreboard.php?GAME=<?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['id']; ?>
">
<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Scoreboard<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
</a></b>
</td></tr>
</table>

</td>

<td>

<table style="margin:5px;padding:2px"  cellspacing="0" cellpadding="0" border="0">
<tr><td>
<img src="images/system/icon_button_starmap.png" style="border:1px solid white;padding:0px">
</td>
<td><b><a class="link" style="margin:5px" target="_NEW" href="game/starmap.php?GAME=<?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['id']; ?>
">
<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Starmap<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
</a></b>
</td></tr>
</table>

</td>


<td>
<?php if ($this->_tpl_vars['games'][$this->_sections['game']['index']]['need_restart'] == 0): ?>

<table style="margin:5px;padding:2px"  cellspacing="0" cellpadding="0" border="0">
<tr><td>
<img src="images/system/icon_button_continuegame.png" style="border:1px solid white;padding:0px">
</td>
<td><b><a class="link" style="margin:5px" href="login.php">
<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Login to play<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
</a></b>
</td></tr>
</table>
<?php endif; ?>
</td>


</tr>
</table>

</td>

</td>
<?php endif; ?>

<?php if ($this->_tpl_vars['games'][$this->_sections['game']['index']]['join_game'] == 1): ?>
<td colspan="5" align="right" style="padding:0px;color:black">
<table cellspacing="0" cellpadding="0" border="0">
<tr>
<td>

<table style="margin:5px;padding:2px" cellspacing="0" cellpadding="0" border="0">
<tr><td>
<img src="images/system/icon_button_scoreboard.png" style="border:1px solid white;padding:0px">
</td>
<td><b><a class="link" style="margin:5px" target="_NEW" href="game/scoreboard.php?GAME=<?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['id']; ?>
">
<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Scoreboard<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
</a></b>
</td></tr>
</table>

</td>

<td>

<table style="margin:5px;padding:2px"  cellspacing="0" cellpadding="0" border="0">
<tr><td>
<img src="images/system/icon_button_starmap.png" style="border:1px solid white;padding:0px">
</td>
<td><b><a class="link" style="margin:5px" target="_NEW" href="game/starmap.php?GAME=<?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['id']; ?>
">
<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Starmap<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
</a></b>
</td></tr>
</table>

</td>


<td>

<?php if ($this->_tpl_vars['games'][$this->_sections['game']['index']]['need_restart'] == 0): ?>

<table style="margin:5px;padding:2px" cellspacing="0" cellpadding="0" border="0">
<tr><td>
<img src="images/system/icon_button_continuegame.png" style="border:1px solid white;padding:0px">
</td>
<td><b><a class="link" style="margin:5px" href="joingame.php?GAME=<?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['id']; ?>
">
<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Join game<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
</a></b>
</td></tr>
</table>
<?php endif; ?>

</td>


</tr>
</table>

</td>

<?php endif; ?>


<?php if ($this->_tpl_vars['games'][$this->_sections['game']['index']]['continue_game'] == 1): ?>
<td align="right" style="color:yellow" colspan="5">
<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><i><?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['gender']; ?>
 <b><?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['emperor']; ?>
</b> <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>of empire<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <b><?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['empire']; ?>
</b>, <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Networth:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <b><?php echo ((is_array($_tmp=$this->_tpl_vars['games'][$this->_sections['game']['index']]['networth'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</b>, <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Rank:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <b><?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['game_rank']; ?>
</b></i><?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
</td>

</tr><tr>
<td colspan="5" align="right" style="padding:0px;color:black">
<table  cellspacing="0" cellpadding="0" border="0">
<tr>
<td>

<table style="margin:5px;padding:2px"  cellspacing="0" cellpadding="0" border="0">
<tr><td>
<img src="images/system/icon_button_scoreboard.png" style="border:1px solid white;padding:0px">
</td>
<td><b><a class="link" style="margin:5px" target="_NEW" href="game/scoreboard.php?GAME=<?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['id']; ?>
">
<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Scoreboard<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
</a></b>
</td></tr>
</table>

</td>

<td>

<table style="margin:5px;padding:2px" cellspacing="0" cellpadding="0" border="0">
<tr><td>
<img src="images/system/icon_button_starmap.png" style="border:1px solid white;padding:0px">
</td>
<td><b><a class="link" style="margin:5px" target="_NEW" href="game/starmap.php?GAME=<?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['id']; ?>
">
<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Starmap<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
</a></b>
</td></tr>
</table>

</td>


<td>
<?php if ($this->_tpl_vars['games'][$this->_sections['game']['index']]['need_restart'] == 0): ?>

<table style="margin:5px;padding:2px" cellspacing="0" cellpadding="0" border="0">
<tr><td>
<img src="images/system/icon_button_continuegame.png" style="border:1px solid white;padding:0px">
</td>
<td><b><a class="link" style="margin:5px" href="#" onclick="window.open('continuegame.php?GAME=<?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['id']; ?>
','game','titlebar=no,status=no,toolbar=no,location=no,menubar=no,resizable=yes');return false;">
<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Continue game<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
</a></b>
</td></tr>
</table>
<?php endif; ?>
</td>



<td>
<?php if ($this->_tpl_vars['games'][$this->_sections['game']['index']]['need_restart'] == 0): ?>

<table style="margin:5px;padding:2px"  cellspacing="0" cellpadding="0" border="0">
<tr><td>
<img src="images/system/icon_button_destroyempire.png" style="border:1px solid white;padding:0px">
</td>
<td><b><a class="link" style="margin:5px" href="gamesbrowser.php?DESTROY_EMPIRE&GAME=<?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['id']; ?>
">
<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Destroy your empire<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
</a></b>
</td></tr>
</table>
<?php endif; ?>
</td>	

</tr>
</table>

</td>
<?php endif; ?>


</tr>

<?php if ($this->_tpl_vars['games'][$this->_sections['game']['index']]['history_game'] == 1): ?>
<a name="history_<?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['id']; ?>
"></a>
<tr>
<td colspan="6">
<a class="link" href="#history_<?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['id']; ?>
"
onclick="ToggleLastScores('game<?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['id']; ?>
_score_label','game<?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['id']; ?>
_score_details');">
<div id="game<?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['id']; ?>
_score_label" style="border:1px solid #999999;background-color:#333333;padding:3px">
+ <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Show/Hide Your Last Scores<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></div></a>
<div  id="game<?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['id']; ?>
_score_details" style="display:none;visibility:hidden;height:0px;" cellspacing="0" cellpadding="5" border="0">
<table class="text_small" 
	style="margin:5px;border:1px solid #cacaca;background-color:#330000;padding:5px;color:#999999"
	 cellspacing="0" cellpadding="5" width="660">
<tr>
<td><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Date<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
<td><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Rank<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
<td><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Empire name<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
<td><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Networth<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
<td><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Military<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
<td><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Planets<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
<td><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Population<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
<td><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Turns<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
</tr>

<?php unset($this->_sections['hist']);
$this->_sections['hist']['name'] = 'hist';
$this->_sections['hist']['loop'] = is_array($_loop=$this->_tpl_vars['games'][$this->_sections['game']['index']]['history']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['hist']['show'] = true;
$this->_sections['hist']['max'] = $this->_sections['hist']['loop'];
$this->_sections['hist']['step'] = 1;
$this->_sections['hist']['start'] = $this->_sections['hist']['step'] > 0 ? 0 : $this->_sections['hist']['loop']-1;
if ($this->_sections['hist']['show']) {
    $this->_sections['hist']['total'] = $this->_sections['hist']['loop'];
    if ($this->_sections['hist']['total'] == 0)
        $this->_sections['hist']['show'] = false;
} else
    $this->_sections['hist']['total'] = 0;
if ($this->_sections['hist']['show']):

            for ($this->_sections['hist']['index'] = $this->_sections['hist']['start'], $this->_sections['hist']['iteration'] = 1;
                 $this->_sections['hist']['iteration'] <= $this->_sections['hist']['total'];
                 $this->_sections['hist']['index'] += $this->_sections['hist']['step'], $this->_sections['hist']['iteration']++):
$this->_sections['hist']['rownum'] = $this->_sections['hist']['iteration'];
$this->_sections['hist']['index_prev'] = $this->_sections['hist']['index'] - $this->_sections['hist']['step'];
$this->_sections['hist']['index_next'] = $this->_sections['hist']['index'] + $this->_sections['hist']['step'];
$this->_sections['hist']['first']      = ($this->_sections['hist']['iteration'] == 1);
$this->_sections['hist']['last']       = ($this->_sections['hist']['iteration'] == $this->_sections['hist']['total']);
?>
<tr style="color:white">
	<td><?php echo ((is_array($_tmp=$this->_tpl_vars['games'][$this->_sections['game']['index']]['history'][$this->_sections['hist']['index']]['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</td>
	<td><?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['history'][$this->_sections['hist']['index']]['rank']; ?>
</td>
	<td><?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['history'][$this->_sections['hist']['index']]['empire_name']; ?>
</td>
	<td><?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['history'][$this->_sections['hist']['index']]['networth']; ?>
</td>
	<td><?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['history'][$this->_sections['hist']['index']]['military_might']; ?>
</td>
	<td><?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['history'][$this->_sections['hist']['index']]['planets']; ?>
</td>
	<td><?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['history'][$this->_sections['hist']['index']]['population']; ?>
</td>
	<td><?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['history'][$this->_sections['hist']['index']]['turns_played']; ?>
</td>
</tr>
<?php endfor; else: ?>
<tr>
	<td colspan="8"  style="color:white"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>No games finished yet!<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
</tr>
<?php endif; ?>
</table>
</div>

</td>
</tr>
<?php endif; ?>

<tr>
<td colspan="6">
<a name="details_<?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['id']; ?>
"></a>

<a class="link" href="#details_<?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['id']; ?>
"
	onclick="ToggleDetails('game<?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['id']; ?>
_label','game<?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['id']; ?>
_details');">
<div id="game<?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['id']; ?>
_label" 
	style="border:1px solid #999999;background-color:#333333;padding:3px">
	+ <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Show/Hide Game Details<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
</div>
</a>

<div  id="game<?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['id']; ?>
_details" style="display:none;visibility:hidden;height:0px;" cellspacing="0" cellpadding="5" border="0">
<table class="text_small" 
	style="margin:5px;border:1px solid #cacaca;background-color:#330000;padding:5px;color:#999999"
	 cellspacing="0" cellpadding="5">
<tr><td nowrap><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Victory Condition:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td style="color:white"><b><?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['victory_condition']; ?>
</b></td></tr>
<tr><td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Maximum Game Duration:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td style="color:white"><b><?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['lifetime']; ?>
</b></td></tr>
<tr><td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Time Elapsed:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td style="color:white"><b><?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['time_elapsed']; ?>
</b></td></tr>
<tr><td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Premium Membership Required:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td style="color:white"><b><?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['premium_only']; ?>
</b></td></tr>
<tr><td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Turns Per Day:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td style="color:white"><b><?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['turns_per_day']; ?>
</b></td></tr>
<tr><td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Protection Turns:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td style="color:white"><b><?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['protection_turns']; ?>
</b></td></tr>
<tr><td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Connected Players:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td style="color:white"><b><?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['connected_players']; ?>
</b></td></tr>
<tr><td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Max Players Slots:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td style="color:white"><b><?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['players_slot']; ?>
</b></td></tr>
<tr><td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Empires registered:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td style="color:white"><b><?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['empires_count']; ?>
</b></td></tr>
<tr><td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Maximum Empires Limit:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td style="color:white"><b><?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['max_players']; ?>
</b></td></tr>
<tr><td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Completed games:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td style="color:white"><b><?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['count']; ?>
</b></td></tr>
</table>
</div>

</td>
</tr>
</table>
</div>

<?php endfor; else: ?>
<b class="text_big" style="color:yellow">&nbsp;<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>*** No game available for now, the administrator have to create at least one game.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b><br/><br/>
<?php endif; ?>
<!-- end loop -->
<br/>

</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "frame_footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>