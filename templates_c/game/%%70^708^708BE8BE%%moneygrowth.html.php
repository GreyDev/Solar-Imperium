<?php /* Smarty version 2.6.19, created on 2009-05-25 23:53:12
         compiled from event/moneygrowth.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'event/moneygrowth.html', 9, false),)), $this); ?>
<table width="100%" align="center" style="font-size:11pt;font-family:sans-serif,verdana">
<tr>
	<td rowspan="8" width="80" valign="top">
		<img src="../images/game/money_growth.jpg" width="64" height="64" style="border:1px solid white">
	</td>
	<td width="300" style="background:#663333">

		<table cellspacing="0" cellpadding="0" border="0">
		<tr><td style="color:white" align="right"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Initial:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b> </td><td><b ><?php echo $this->_tpl_vars['money_initial']; ?>
</b></td></tr>
		</table>

	</td><td  width="300" style="background:#663333">

		<table cellspacing="0" cellpadding="0" border="0">
		<tr><td style="color:white" align="right"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Final:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b> </td><td><b ><?php echo $this->_tpl_vars['money_final']; ?>
 </b><b style="color:black">(<?php echo $this->_tpl_vars['growrate']; ?>
 %)</b></td></tr>
		</table>

	</td></tr><tr><td>

<table cellspacing="0" cellpadding="0" border="0">
<tr><td style="color:#aaaaaa" align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Pop. taxes:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><b ><?php echo $this->_tpl_vars['population_tax_income']; ?>
 (<?php echo $this->_tpl_vars['taxrate']; ?>
 %)</b></td></tr>
</table>

</td><td>

<table cellspacing="0" cellpadding="0" border="0">
<tr><td style="color:#aaaaaa" align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Tourism:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><b ><?php echo $this->_tpl_vars['tourism_income']; ?>
</b></td></tr>
</table>

</td></tr><tr><td>

<table cellspacing="0" cellpadding="0" border="0">
<tr><td style="color:#aaaaaa" align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Food production:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><b ><?php echo $this->_tpl_vars['food_production_income']; ?>
</b></td></tr>
</table>

</td><td>

<table cellspacing="0" cellpadding="0" border="0">
<tr><td style="color:#aaaaaa" align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Research converted:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><b ><?php echo $this->_tpl_vars['research_production_income']; ?>
</b></td></tr>
</table>

</td></tr><tr><td>
<table cellspacing="0" cellpadding="0" border="0">
<tr><td style="color:#aaaaaa" align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Ore production:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><b ><?php echo $this->_tpl_vars['ore_production_income']; ?>
</b></td></tr>
</table>
</td><td>
<table cellspacing="0" cellpadding="0" border="0">
<tr><td style="color:#dddddd" align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Planets support:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><b ><?php echo $this->_tpl_vars['planets_maintenance']; ?>
</b></td></tr>
</table>
</td></tr><tr><td>

<table cellspacing="0" cellpadding="0" border="0">
<tr><td style="color:#aaaaaa" align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Petro. production:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><b ><?php echo $this->_tpl_vars['petroleum_production_income']; ?>
</b></td></tr>
</table>

</td><td>

</td></tr><tr><td>

<table cellspacing="0" cellpadding="0" border="0">
<tr><td style="color:#aaaaaa" align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Urban trade taxes:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><b ><?php echo $this->_tpl_vars['urban_tax_income']; ?>
</b></td></tr>
</table>

</td><td>

<table cellspacing="0" cellpadding="0" border="0">
<tr><td style="color:#dddddd" align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Army support:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><b ><?php echo $this->_tpl_vars['military_maintenance']; ?>
</b></td></tr>
</table>

</td></tr><tr><td>


</td><td>

<table cellspacing="0" cellpadding="0" border="0">
<tr><td style="color:#dddddd" align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Loans payment:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><b ><?php echo $this->_tpl_vars['loans_payment']; ?>
</b></td></tr>
</table>

</td></tr><tr><td>

<table cellspacing="0" cellpadding="0" border="0">
<tr><td style="color:#aaaaaa" align="right"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>TOTAL INCOMES:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td><td><b ><?php echo $this->_tpl_vars['total_incomes']; ?>
</b></td></tr>
</table>

</td><td>

<table cellspacing="0" cellpadding="0" border="0">
<tr><td style="color:#dddddd" align="right"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>TOTAL PAYMENTS:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td><td><b ><?php echo $this->_tpl_vars['total_payments']; ?>
</b></td></tr>
</table>

</td></tr>
</table>