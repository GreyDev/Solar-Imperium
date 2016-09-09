<?php /* Smarty version 2.6.19, created on 2009-03-04 22:27:22
         compiled from page_scoreboards.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'page_scoreboards.tpl', 2, false),array('modifier', 'date_format', 'page_scoreboards.tpl', 35, false),array('modifier', 'number_format', 'page_scoreboards.tpl', 38, false),)), $this); ?>
<?php ob_start(); ?>
<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Scoreboards<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
<?php $this->_smarty_vars['capture']['page_title'] = ob_get_contents(); ob_end_clean(); ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "frame_header.tpl", 'smarty_include_vars' => array('title' => $this->_smarty_vars['capture']['page_title'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!-- begin content -->


<table cellspacing="0" cellpadding="0" border="0">
<tr>
<td><img src="images/common/round_topleft.png" border="0"></td>
<td background="images/common/round_bg.gif" width="100%"><img src="images/common/transparent.gif" border="0"></td>
<td><img src="images/common/round_topright.png" border="0"></td>
</tr>

<tr>
<td background="images/common/round_bg.gif"><img src="images/common/transparent.gif" border="0"></td>
<td background="images/common/round_bg.gif" width="100%">
<div style="padding:10px">
<b class="text_big" style="color:white"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Server Hall Of Fame<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b>
<br/>
<br/>

<div align="center" class="text_small">
<table class="text_small" width="600px">
<tr>
<td style="color:#dadada"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Date/Time<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
<td style="color:#dadada"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Player<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
<td style="color:#dadada"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Game<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
<td style="color:#dadada"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Score<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
</tr>

<?php unset($this->_sections['hlf']);
$this->_sections['hlf']['name'] = 'hlf';
$this->_sections['hlf']['loop'] = is_array($_loop=$this->_tpl_vars['hall_of_fame']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['hlf']['show'] = true;
$this->_sections['hlf']['max'] = $this->_sections['hlf']['loop'];
$this->_sections['hlf']['step'] = 1;
$this->_sections['hlf']['start'] = $this->_sections['hlf']['step'] > 0 ? 0 : $this->_sections['hlf']['loop']-1;
if ($this->_sections['hlf']['show']) {
    $this->_sections['hlf']['total'] = $this->_sections['hlf']['loop'];
    if ($this->_sections['hlf']['total'] == 0)
        $this->_sections['hlf']['show'] = false;
} else
    $this->_sections['hlf']['total'] = 0;
if ($this->_sections['hlf']['show']):

            for ($this->_sections['hlf']['index'] = $this->_sections['hlf']['start'], $this->_sections['hlf']['iteration'] = 1;
                 $this->_sections['hlf']['iteration'] <= $this->_sections['hlf']['total'];
                 $this->_sections['hlf']['index'] += $this->_sections['hlf']['step'], $this->_sections['hlf']['iteration']++):
$this->_sections['hlf']['rownum'] = $this->_sections['hlf']['iteration'];
$this->_sections['hlf']['index_prev'] = $this->_sections['hlf']['index'] - $this->_sections['hlf']['step'];
$this->_sections['hlf']['index_next'] = $this->_sections['hlf']['index'] + $this->_sections['hlf']['step'];
$this->_sections['hlf']['first']      = ($this->_sections['hlf']['iteration'] == 1);
$this->_sections['hlf']['last']       = ($this->_sections['hlf']['iteration'] == $this->_sections['hlf']['total']);
?>
<tr>
<td bgcolor="#666699" style="color:white"><?php echo ((is_array($_tmp=$this->_tpl_vars['hall_of_fame'][$this->_sections['hlf']['index']]['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</td>
<td bgcolor="#666699" style="color:white"><?php echo $this->_tpl_vars['hall_of_fame'][$this->_sections['hlf']['index']]['player_name']; ?>
</td>
<td bgcolor="#666699" style="color:white"><?php echo $this->_tpl_vars['hall_of_fame'][$this->_sections['hlf']['index']]['game_name']; ?>
</td>
<td bgcolor="#666699" align="right" style="color:white"><?php echo ((is_array($_tmp=$this->_tpl_vars['hall_of_fame'][$this->_sections['hlf']['index']]['score'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</td>
</tr>
<?php endfor; endif; ?>

</table>

<br/><br/>
<div align="center" class="text_small">
<a style="color:cyan" href="welcome.php"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Back to main menu<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a>
</div>

</div>

</td>
<td background="images/common/round_bg.gif"><img src="images/common/transparent.gif" border="0"></td>
</tr>

<tr>
<td><img src="images/common/round_bottomleft.png" border="0"></td>
<td background="images/common/round_bg.gif" width="100%"><img src="images/common/transparent.gif" border="0"></td>
<td><img src="images/common/round_bottomright.png" border="0"></td>
</tr>
</table>



<!-- end content -->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "frame_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>