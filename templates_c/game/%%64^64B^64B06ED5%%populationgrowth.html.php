<?php /* Smarty version 2.6.19, created on 2009-05-26 00:56:00
         compiled from event/populationgrowth.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'event/populationgrowth.html', 11, false),)), $this); ?>
<table width="100%" align="center">
<tr>

<td width="80" rowspan="4" valign="top">
<img src="../images/game/population_growth.jpg" width="64" height="64" style="border:1px solid white">
</td>

<td width="300" bgcolor="#663333">

<table  cellspacing="0" cellpadding="0" border="0">
<tr><td  style="color:white" align="right"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Initial population:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td><td><b style="color:white"><?php echo $this->_tpl_vars['initial_population']; ?>
</b></td></tr>
</table>

</td><td width="300" bgcolor="#663333">

<table  cellspacing="0" cellpadding="0" border="0">
<tr><td style="color:white" align="right"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Final:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td><td><b style="color:white"><?php echo $this->_tpl_vars['final_population']; ?>
 </b><b style="color:black">(<?php echo $this->_tpl_vars['growrate']; ?>
 %)</b></td></tr>
</table>

</td></tr>
<tr><td>

<table  cellspacing="0" cellpadding="0" border="0">
<tr><td style="color:#dddddd" align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Born:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><b style="color:white"><?php echo $this->_tpl_vars['born']; ?>
</b></td></tr>
</table>

</td><td>

<table  cellspacing="0" cellpadding="0" border="0">
<tr><td style="color:#aaaaaa" align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Dead:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><b style="color:white"><?php echo $this->_tpl_vars['dead']; ?>
</b></td></tr>
</table>

</td></tr>
<tr><td>

<table cellspacing="0" cellpadding="0" border="0">
<tr><td style="color:#dddddd" align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Immigration:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><b style="color:white"><?php echo $this->_tpl_vars['immigration']; ?>
</b></td></tr>
</table>

</td><td>

<table cellspacing="0" cellpadding="0" border="0">
<tr><td style="color:#aaaaaa" align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Emmigration:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><b style="color:white"><?php echo $this->_tpl_vars['emmigration']; ?>
</b></td></tr>
</table>

</td></tr>
<tr><td>

<table cellspacing="0" cellpadding="0" border="0">
<tr><td style="color:#dddddd" align="right"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Pollution level:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td><td><b style="color:<?php echo $this->_tpl_vars['color']; ?>
"><?php echo $this->_tpl_vars['pratio']; ?>


<?php if ($this->_tpl_vars['pratio'] > 1): ?>
<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>**POLLUTED**<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
<?php endif; ?>

</b></td></tr>
</table>

</td></tr>
</table>