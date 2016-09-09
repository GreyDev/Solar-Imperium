<?php /* Smarty version 2.6.19, created on 2009-05-25 23:52:21
         compiled from event/oregrowth.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'event/oregrowth.html', 9, false),)), $this); ?>
<table align="center" width="100%">
<tr>
<td rowspan="3" width="80">
<img src="../images/game/ore_growth.jpg" width="64" height="64" style="border:1px solid white">
</td><td   width="300"  bgcolor="#663333">


<table cellspacing="0" cellpadding="0" border="0">
<tr><td style="color:white" align="right"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Initial ore:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b> </td><td><b ><?php echo $this->_tpl_vars['ore_initial']; ?>
</b></td></tr>
</table>
</td><td width="300" bgcolor="#663333">

<table cellspacing="0" cellpadding="0" border="0">
<tr><td style="color:white" align="right"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Final:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b> </td><td><b ><?php echo $this->_tpl_vars['ore_final']; ?>
 <b style="color:black">(<?php echo $this->_tpl_vars['growrate']; ?>
 %)</b></td></tr>
</table>

</td></tr>
<tr><td>

<table cellspacing="0" cellpadding="0" border="0">
<tr><td style="color:#dddddd" align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Used for army maintenance:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><b ><?php echo $this->_tpl_vars['ore_used_by_army']; ?>
</b></td></tr>
</table>


</td><td>
<table cellspacing="0" cellpadding="0" border="0">
<tr><td style="color:#aaaaaa" align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Produced:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><b ><?php echo $this->_tpl_vars['ore_produced']; ?>
</b></td></tr>
</table>

</td></tr>
<tr>
<td>

&nbsp;

</td>
<td>

<table cellspacing="0" cellpadding="0" border="0">
<tr><td style="color:#aaaaaa" align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Sold:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><b ><?php echo $this->_tpl_vars['ore_sold']; ?>
  x <?php echo $this->_tpl_vars['ore_unit_price']; ?>
</b></td></tr>
</table>

</td>
</tr>

</table>