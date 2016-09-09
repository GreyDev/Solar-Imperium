<?php /* Smarty version 2.6.19, created on 2009-07-18 16:38:48
         compiled from battle.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'battle.html', 4, false),array('modifier', 'number_format', 'battle.html', 37, false),)), $this); ?>
		<table  cellspacing="0" cellpadding="0" border="0">
		<tr>	
		<td nowrap><img src="../images/game/tab_left.gif" border="0"></td>
		<td nowrap bgcolor="darkred" style="padding:0px 5px 0px 5px"><a  style="text-decoration:none;color:white" href="battle.php"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Battle Command<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></td> 
		<td><img src="../images/game/tab_right.gif" border="0"></td>

		<td nowrap><img src="../images/game/tab2_left.gif" border="0"></td>
		<td nowrap bgcolor="#666666"  style="padding:0px 5px 0px 5px"><a  class="link" href="covert.php"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Covert Operations<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></td> 
		<td><img src="../images/game/tab2_right.gif" border="0"></td>

		<td nowrap><img src="../images/game/tab2_left.gif" border="0"></td>
		<td nowrap bgcolor="#666666"  style="padding:0px 5px 0px 5px"><a  class="link" href="last_invasions.php"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Last Invasions<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></td> 
		<td><img src="../images/game/tab2_right.gif" border="0"></td>
		</table>

<?php unset($this->_sections['c']);
$this->_sections['c']['name'] = 'c';
$this->_sections['c']['loop'] = is_array($_loop=$this->_tpl_vars['convoys']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['c']['show'] = true;
$this->_sections['c']['max'] = $this->_sections['c']['loop'];
$this->_sections['c']['step'] = 1;
$this->_sections['c']['start'] = $this->_sections['c']['step'] > 0 ? 0 : $this->_sections['c']['loop']-1;
if ($this->_sections['c']['show']) {
    $this->_sections['c']['total'] = $this->_sections['c']['loop'];
    if ($this->_sections['c']['total'] == 0)
        $this->_sections['c']['show'] = false;
} else
    $this->_sections['c']['total'] = 0;
if ($this->_sections['c']['show']):

            for ($this->_sections['c']['index'] = $this->_sections['c']['start'], $this->_sections['c']['iteration'] = 1;
                 $this->_sections['c']['iteration'] <= $this->_sections['c']['total'];
                 $this->_sections['c']['index'] += $this->_sections['c']['step'], $this->_sections['c']['iteration']++):
$this->_sections['c']['rownum'] = $this->_sections['c']['iteration'];
$this->_sections['c']['index_prev'] = $this->_sections['c']['index'] - $this->_sections['c']['step'];
$this->_sections['c']['index_next'] = $this->_sections['c']['index'] + $this->_sections['c']['step'];
$this->_sections['c']['first']      = ($this->_sections['c']['iteration'] == 1);
$this->_sections['c']['last']       = ($this->_sections['c']['iteration'] == $this->_sections['c']['total']);
?>

		<table style="margin:0 0 10 0" width="720"  bgcolor="red" cellspacing="1" cellpadding="0" border="0">
		<tr><td>
		<table width="100%" align="center" cellspacing="0" cellpadding="5" border="0" style="font-size:11pt;" bgcolor="#333333" background="../images/game/background/<?php echo $this->_tpl_vars['convoys'][$this->_sections['c']['index']]['background']; ?>
">
		<tr><td>

		<table width="100%" cellspacing="0" cellpadding="3">
		<tr>
		<td background="../images/game/warbar.gif" style="color:#6a6a6a" width="80" align="right"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>From:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
		<td background="../images/game/warbar.gif" style="color:black" width="250"><b><?php echo $this->_tpl_vars['convoys'][$this->_sections['c']['index']]['from_empire']; ?>
</b></td>
		<td background="../images/game/warbar.gif" style="color:#6a6a6a" width="80" align="right"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Target:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
		<td background="../images/game/warbar.gif" style="color:black" width="250"><b><?php echo $this->_tpl_vars['convoys'][$this->_sections['c']['index']]['target_empire']; ?>
</b></td>
		</tr>
		<tr>
		<td align="right" nowrap><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Convoy Type:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
		<td><b><?php echo $this->_tpl_vars['convoys'][$this->_sections['c']['index']]['convoy_type']; ?>
</b></td>
		<td colspan="2" align="right"><b><a href="battle.php?retreat=<?php echo $this->_tpl_vars['convoys'][$this->_sections['c']['index']]['id']; ?>
" class="link" onClick="return confirm('<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Retreating will affect troops morale if your convoy is far from your empire, do it?<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>')"><?php echo $this->_tpl_vars['convoys'][$this->_sections['c']['index']]['retreat']; ?>
</a></b></td>
		</tr>
		<tr>
		<td align="right" nowrap><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Soldiers:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
		<td><b><?php echo ((is_array($_tmp=$this->_tpl_vars['convoys'][$this->_sections['c']['index']]['soldiers'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</b></td>
		<td align="right" nowrap><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Fighters:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
		<td><b><?php echo ((is_array($_tmp=$this->_tpl_vars['convoys'][$this->_sections['c']['index']]['fighters'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</b></td></tr>
		<tr><td align="right" nowrap><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Light Cruisers:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><b><?php echo ((is_array($_tmp=$this->_tpl_vars['convoys'][$this->_sections['c']['index']]['lightcruisers'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</b></td>
		<td align="right" nowrap><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Heavy Cruisers:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><b><?php echo ((is_array($_tmp=$this->_tpl_vars['convoys'][$this->_sections['c']['index']]['heavycruisers'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</b></td></tr>
		<tr>
			<td align="right" nowrap><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Carriers:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
			<td><b><?php echo ((is_array($_tmp=$this->_tpl_vars['convoys'][$this->_sections['c']['index']]['carriers'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</b></td>
			<td align="right" nowrap><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Time remaining:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
			<td><b><?php echo $this->_tpl_vars['convoys'][$this->_sections['c']['index']]['time_left']; ?>
</b></td>

		</tr>
		</table>

		</td></tr>
		</table>
		</td></tr>
		</table>

<?php endfor; endif; ?>

		<table width="720"  bgcolor="darkred" cellspacing="1" cellpadding="0" border="0">
		<tr><td>
		<table width="100%" align="center" cellspacing="0" cellpadding="5" border="0" style="font-size:11pt;" bgcolor="#333333" background="../images/game/background1.jpg">
			
<?php if ($this->_tpl_vars['do_nuclear_warfare'] == true): ?>

	<tr><td colspan="3"><form action="battle_nuclearwarfare.php" method="post" name="form_nuke">
		<b style="color:yellow"><a href="javascript:show_help('battle_nuclear')"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Nuclear Warfare<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></b></td></tr>
	
		<tr><td>&nbsp;</td></tr>
		<tr>
		<td align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Empire:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
		<td colspan="2">
		<b style="color:#ffcaca">
		<select name="nuke_empire" style="width:400px" class="select_box">
		<option value="-1">---</option>
		<?php unset($this->_sections['e']);
$this->_sections['e']['name'] = 'e';
$this->_sections['e']['loop'] = is_array($_loop=$this->_tpl_vars['empires']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['e']['show'] = true;
$this->_sections['e']['max'] = $this->_sections['e']['loop'];
$this->_sections['e']['step'] = 1;
$this->_sections['e']['start'] = $this->_sections['e']['step'] > 0 ? 0 : $this->_sections['e']['loop']-1;
if ($this->_sections['e']['show']) {
    $this->_sections['e']['total'] = $this->_sections['e']['loop'];
    if ($this->_sections['e']['total'] == 0)
        $this->_sections['e']['show'] = false;
} else
    $this->_sections['e']['total'] = 0;
if ($this->_sections['e']['show']):

            for ($this->_sections['e']['index'] = $this->_sections['e']['start'], $this->_sections['e']['iteration'] = 1;
                 $this->_sections['e']['iteration'] <= $this->_sections['e']['total'];
                 $this->_sections['e']['index'] += $this->_sections['e']['step'], $this->_sections['e']['iteration']++):
$this->_sections['e']['rownum'] = $this->_sections['e']['iteration'];
$this->_sections['e']['index_prev'] = $this->_sections['e']['index'] - $this->_sections['e']['step'];
$this->_sections['e']['index_next'] = $this->_sections['e']['index'] + $this->_sections['e']['step'];
$this->_sections['e']['first']      = ($this->_sections['e']['iteration'] == 1);
$this->_sections['e']['last']       = ($this->_sections['e']['iteration'] == $this->_sections['e']['total']);
?>
		<option value="<?php echo $this->_tpl_vars['empires'][$this->_sections['e']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['empires'][$this->_sections['e']['index']]['name']; ?>
</option>
		<?php endfor; endif; ?>
		</select>

		</td></tr>

			<tr>
		<td align="right">
			<img src="../images/game/nuclear_warfare.jpg" style="border:1px solid yellow">
		</td>
		<td><b style="color:yellow"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Warning: If you get caught by the galactic coordinator, your empire will collapse!<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></B>
		</tr>
		<tr>
		<td>&nbsp;</td>
		<td><input type="submit" value="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>PUSH THE RED BUTTON<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" style="color:yellow;font-weight:bold;background-color:red;border:1px solid yellow" onClick="return confirm('ARE YOU REALLY REALLY SURE?');"></td>
		</tr>
		</form>
		<tr><td><br/></td></tr>
<?php endif; ?>


		<tr><td colspan="3"><form action="battle_invasion.php" method="post" name="form1">
		<b style="color:yellow"><a href="javascript:show_help('battle_invasion')" class="link" onmouseover="ajax_showTooltip('galaxypedia_short.php?search=battle_invasion',this);return false" onmouseout="ajax_hideTooltip()"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Conventional Invasion<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></b></td></tr>
	
		<tr><td colspan="2">
			
		<div style="color:#999999;border:1px dashed #999999;background-color:#333333;padding:10px;margin:10px">
			<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Attacking weaker empires (lesser or 33% of your net worth) make your population ashamed and your insurgency level will undoubtly increase.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
		</div>
			</td></tr>
		<tr>
		<td align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Empire:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
		<td colspan="2">
		<b style="color:#ffcaca">
		<select name="invasion_empire" style="width:400px" class="select_box">
		<option value="-1">---</option>
		<?php unset($this->_sections['e']);
$this->_sections['e']['name'] = 'e';
$this->_sections['e']['loop'] = is_array($_loop=$this->_tpl_vars['empires']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['e']['show'] = true;
$this->_sections['e']['max'] = $this->_sections['e']['loop'];
$this->_sections['e']['step'] = 1;
$this->_sections['e']['start'] = $this->_sections['e']['step'] > 0 ? 0 : $this->_sections['e']['loop']-1;
if ($this->_sections['e']['show']) {
    $this->_sections['e']['total'] = $this->_sections['e']['loop'];
    if ($this->_sections['e']['total'] == 0)
        $this->_sections['e']['show'] = false;
} else
    $this->_sections['e']['total'] = 0;
if ($this->_sections['e']['show']):

            for ($this->_sections['e']['index'] = $this->_sections['e']['start'], $this->_sections['e']['iteration'] = 1;
                 $this->_sections['e']['iteration'] <= $this->_sections['e']['total'];
                 $this->_sections['e']['index'] += $this->_sections['e']['step'], $this->_sections['e']['iteration']++):
$this->_sections['e']['rownum'] = $this->_sections['e']['iteration'];
$this->_sections['e']['index_prev'] = $this->_sections['e']['index'] - $this->_sections['e']['step'];
$this->_sections['e']['index_next'] = $this->_sections['e']['index'] + $this->_sections['e']['step'];
$this->_sections['e']['first']      = ($this->_sections['e']['iteration'] == 1);
$this->_sections['e']['last']       = ($this->_sections['e']['iteration'] == $this->_sections['e']['total']);
?>
		<option value="<?php echo $this->_tpl_vars['empires'][$this->_sections['e']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['empires'][$this->_sections['e']['index']]['name']; ?>
</option>
		<?php endfor; endif; ?>		
		</select>
		</td></tr>


		<tr>
		<td align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Soldiers:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
		<td><input type="text" name="invasion_soldiers" style="width:100px" class="input_text" value="0">
		<b><a class="link" href="#"  onClick="document.form1.invasion_soldiers.value=Math.floor(<?php echo $this->_tpl_vars['invasion_soldiers']; ?>
/4);return false;">25%</a>
		<a class="link" href="#"  onClick="document.form1.invasion_soldiers.value=Math.floor(<?php echo $this->_tpl_vars['invasion_soldiers']; ?>
/2);return false;">50%</a>
		<a class="link" href="#"  onClick="document.form1.invasion_soldiers.value=Math.floor((<?php echo $this->_tpl_vars['invasion_soldiers']; ?>
/4)*3);return false;">75%</a>
		<a class="link" href="#"  onClick="document.form1.invasion_soldiers.value=<?php echo $this->_tpl_vars['invasion_soldiers']; ?>
;return false;">MAX</a>: <?php echo ((is_array($_tmp=$this->_tpl_vars['invasion_soldiers'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</b></td>
		</tr>

		<tr>
		<td align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Fighters:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
		<td><input type="text" name="invasion_fighters"    style="width:100px" class="input_text" value="0">
		<b>
		<a class="link" href="#"  onClick="document.form1.invasion_fighters.value=Math.floor(<?php echo $this->_tpl_vars['invasion_fighters']; ?>
/4);return false;">25%</a>
		<a class="link" href="#"  onClick="document.form1.invasion_fighters.value=Math.floor(<?php echo $this->_tpl_vars['invasion_fighters']; ?>
/2);return false;">50%</a>
		<a class="link" href="#"  onClick="document.form1.invasion_fighters.value=Math.floor((<?php echo $this->_tpl_vars['invasion_fighters']; ?>
/4)*3);return false;">75%</a>
		<a class="link" href="#"  onClick="document.form1.invasion_fighters.value=<?php echo $this->_tpl_vars['invasion_fighters']; ?>
;return false;">MAX</a>: <?php echo ((is_array($_tmp=$this->_tpl_vars['invasion_fighters'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</b></td>
		</tr>

		<tr>
		<td align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Light Cruisers:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
		<td><input type="text" name="invasion_lightcruisers"    style="width:100px" class="input_text" value="0">
		<b>
		<a class="link" href="#"  onClick="document.form1.invasion_lightcruisers.value=Math.floor(<?php echo $this->_tpl_vars['invasion_lightcruisers']; ?>
/4);return false;">25%</a>
		<a class="link" href="#"  onClick="document.form1.invasion_lightcruisers.value=Math.floor(<?php echo $this->_tpl_vars['invasion_lightcruisers']; ?>
/2);return false;">50%</a>
		<a class="link" href="#"  onClick="document.form1.invasion_lightcruisers.value=Math.floor((<?php echo $this->_tpl_vars['invasion_lightcruisers']; ?>
/4)*3);return false;">75%</a>
		<a class="link" href="#" onClick="document.form1.invasion_lightcruisers.value=<?php echo $this->_tpl_vars['invasion_lightcruisers']; ?>
;return false;">MAX</a>: <?php echo ((is_array($_tmp=$this->_tpl_vars['invasion_lightcruisers'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</b></td>
		</tr>

		<tr>
		<td align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Heavy Cruisers:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
		<td><input type="text" name="invasion_heavycruisers"    style="width:100px" class="input_text" value="0">
		<b>
		<a class="link" href="#"  onClick="document.form1.invasion_heavycruisers.value=Math.floor(<?php echo $this->_tpl_vars['invasion_heavycruisers']; ?>
/4);return false;">25%</a>
		<a class="link" href="#"  onClick="document.form1.invasion_heavycruisers.value=Math.floor(<?php echo $this->_tpl_vars['invasion_heavycruisers']; ?>
/2);return false;">50%</a>
		<a class="link" href="#"  onClick="document.form1.invasion_heavycruisers.value=Math.floor((<?php echo $this->_tpl_vars['invasion_heavycruisers']; ?>
/4)*3);return false;">75%</a>
		<a class="link" href="#" onClick="document.form1.invasion_heavycruisers.value=<?php echo $this->_tpl_vars['invasion_heavycruisers']; ?>
;return false;">MAX</a>: <?php echo ((is_array($_tmp=$this->_tpl_vars['invasion_heavycruisers'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</b></td>
		</tr>

	

		<tr><td>&nbsp;</td><td colspan="2"><input type="submit" value="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Launch invasion<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>"></form></td></tr>
		<tr><td colspan="3"><br/></td></tr>
		<tr><td colspan="3"><form  action="battle_guerilla.php"  method="post" name="form2">
		<b style="color:yellow"><a href="javascript:show_help('battle_guerilla')" class="link" onmouseover="ajax_showTooltip('galaxypedia_short.php?search=battle_guerilla',this);return false" onmouseout="ajax_hideTooltip()"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Guerilla Warfare<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></b></td></tr>
	
		<tr><td colspan="3">&nbsp;</td></tr>
		<tr>
		<td align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Empire:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
		<td colspan="2">
		<b style="color:#ffcaca">
		<select name="guerilla_empire" style="width:400px" class="select_box">
		<option value="-1">---</option>
		<?php unset($this->_sections['e']);
$this->_sections['e']['name'] = 'e';
$this->_sections['e']['loop'] = is_array($_loop=$this->_tpl_vars['empires']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['e']['show'] = true;
$this->_sections['e']['max'] = $this->_sections['e']['loop'];
$this->_sections['e']['step'] = 1;
$this->_sections['e']['start'] = $this->_sections['e']['step'] > 0 ? 0 : $this->_sections['e']['loop']-1;
if ($this->_sections['e']['show']) {
    $this->_sections['e']['total'] = $this->_sections['e']['loop'];
    if ($this->_sections['e']['total'] == 0)
        $this->_sections['e']['show'] = false;
} else
    $this->_sections['e']['total'] = 0;
if ($this->_sections['e']['show']):

            for ($this->_sections['e']['index'] = $this->_sections['e']['start'], $this->_sections['e']['iteration'] = 1;
                 $this->_sections['e']['iteration'] <= $this->_sections['e']['total'];
                 $this->_sections['e']['index'] += $this->_sections['e']['step'], $this->_sections['e']['iteration']++):
$this->_sections['e']['rownum'] = $this->_sections['e']['iteration'];
$this->_sections['e']['index_prev'] = $this->_sections['e']['index'] - $this->_sections['e']['step'];
$this->_sections['e']['index_next'] = $this->_sections['e']['index'] + $this->_sections['e']['step'];
$this->_sections['e']['first']      = ($this->_sections['e']['iteration'] == 1);
$this->_sections['e']['last']       = ($this->_sections['e']['iteration'] == $this->_sections['e']['total']);
?>
		<option value="<?php echo $this->_tpl_vars['empires'][$this->_sections['e']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['empires'][$this->_sections['e']['index']]['name']; ?>
</option>
		<?php endfor; endif; ?>
		</select>
		</td></tr>
		<tr>
		<td align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Soldiers:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
		<td><input type="text" name="guerilla_soldiers"  style="width:100px" class="input_text"  value="0">
		<b>
		<a class="link" href="#"  onClick="document.form2.guerilla_soldiers.value=Math.floor(<?php echo $this->_tpl_vars['guerilla_soldiers']; ?>
/4);return false;">25%</a>
		<a class="link" href="#"  onClick="document.form2.guerilla_soldiers.value=Math.floor(<?php echo $this->_tpl_vars['guerilla_soldiers']; ?>
/2);return false;">50%</a>
		<a class="link" href="#"  onClick="document.form2.guerilla_soldiers.value=Math.floor((<?php echo $this->_tpl_vars['guerilla_soldiers']; ?>
/4)*3);return false;">75%</a>
		<a class="link" href="#" onClick="document.form2.guerilla_soldiers.value=<?php echo $this->_tpl_vars['guerilla_soldiers']; ?>
;return false;">MAX</a>: <?php echo ((is_array($_tmp=$this->_tpl_vars['guerilla_soldiers'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</b></td>
		</tr>
		<tr><td>&nbsp;</td><td colspan="2"><input type="submit" value="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Launch Attack<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>"></td></tr>
		<tr><td colspan="3"><br/></form></td></tr>
		<tr><td colspan="3"><form action="battle_pirate.php" method="post" name="form3">
		<b style="color:yellow"><a href="javascript:show_help('battle_pirate')" class="link" onmouseover="ajax_showTooltip('galaxypedia_short.php?search=battle_pirate',this);return false" onmouseout="ajax_hideTooltip()"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Pirate Bust<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></b></td></tr>
	
		<tr><td>&nbsp;</td></tr>
		<tr>
		<td align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Pirate:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
		<td colspan="2">
		<b style="color:#ffcaca">
		<select name="battle_pirate" style="width:300px" class="select_box">
		<option value="-1">---</option>
		<?php unset($this->_sections['p']);
$this->_sections['p']['name'] = 'p';
$this->_sections['p']['loop'] = is_array($_loop=$this->_tpl_vars['pirates']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['p']['show'] = true;
$this->_sections['p']['max'] = $this->_sections['p']['loop'];
$this->_sections['p']['step'] = 1;
$this->_sections['p']['start'] = $this->_sections['p']['step'] > 0 ? 0 : $this->_sections['p']['loop']-1;
if ($this->_sections['p']['show']) {
    $this->_sections['p']['total'] = $this->_sections['p']['loop'];
    if ($this->_sections['p']['total'] == 0)
        $this->_sections['p']['show'] = false;
} else
    $this->_sections['p']['total'] = 0;
if ($this->_sections['p']['show']):

            for ($this->_sections['p']['index'] = $this->_sections['p']['start'], $this->_sections['p']['iteration'] = 1;
                 $this->_sections['p']['iteration'] <= $this->_sections['p']['total'];
                 $this->_sections['p']['index'] += $this->_sections['p']['step'], $this->_sections['p']['iteration']++):
$this->_sections['p']['rownum'] = $this->_sections['p']['iteration'];
$this->_sections['p']['index_prev'] = $this->_sections['p']['index'] - $this->_sections['p']['step'];
$this->_sections['p']['index_next'] = $this->_sections['p']['index'] + $this->_sections['p']['step'];
$this->_sections['p']['first']      = ($this->_sections['p']['iteration'] == 1);
$this->_sections['p']['last']       = ($this->_sections['p']['iteration'] == $this->_sections['p']['total']);
?>			
		<option value="<?php echo $this->_tpl_vars['pirates'][$this->_sections['p']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['pirates'][$this->_sections['p']['index']]['name']; ?>
</option>
		<?php endfor; endif; ?>		
		</select>
		</td></tr>


		<tr>
		<td align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Soldiers<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>:</td>
		<td><input type="text" name="pirate_soldiers"    style="width:100px" class="input_text" value="0">
		<b>

		<a class="link" href="#"  onClick="document.form3.pirate_soldiers.value=Math.floor(<?php echo $this->_tpl_vars['invasion_soldiers']; ?>
/4);return false;">25%</a>
		<a class="link" href="#"  onClick="document.form3.pirate_soldiers.value=Math.floor(<?php echo $this->_tpl_vars['invasion_soldiers']; ?>
/2);return false;">50%</a>
		<a class="link" href="#"  onClick="document.form3.pirate_soldiers.value=Math.floor((<?php echo $this->_tpl_vars['invasion_soldiers']; ?>
/4)*3);return false;">75%</a>
		<a class="link" href="#"  onClick="document.form3.pirate_soldiers.value=<?php echo $this->_tpl_vars['invasion_soldiers']; ?>
;return false;">MAX</a>: <?php echo ((is_array($_tmp=$this->_tpl_vars['invasion_soldiers'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</b></td>
		</tr>

		<tr>
		<td align="right"<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Fighters:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
		<td><input type="text" name="pirate_fighters"    style="width:100px" class="input_text" value="0">
		<b>
		<a class="link" href="#"  onClick="document.form3.pirate_fighters.value=Math.floor(<?php echo $this->_tpl_vars['invasion_fighters']; ?>
/4);return false;">25%</a>
		<a class="link" href="#"  onClick="document.form3.pirate_fighters.value=Math.floor(<?php echo $this->_tpl_vars['invasion_fighters']; ?>
/2);return false;">50%</a>
		<a class="link" href="#"  onClick="document.form3.pirate_fighters.value=Math.floor((<?php echo $this->_tpl_vars['invasion_fighters']; ?>
/4)*3);return false;">75%</a>
		<a class="link" href="#"  onClick="document.form3.pirate_fighters.value=<?php echo $this->_tpl_vars['invasion_fighters']; ?>
;return false;">MAX</a>: <?php echo ((is_array($_tmp=$this->_tpl_vars['invasion_fighters'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</b></td>
		</tr>

		<tr>
		<td align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Light Cruisers:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
		<td><input type="text" name="pirate_lightcruisers"    style="width:100px" class="input_text" value="0">
		<b>
		<a class="link" href="#"  onClick="document.form3.pirate_lightcruisers.value=Math.floor(<?php echo $this->_tpl_vars['invasion_lightcruisers']; ?>
/4);return false;">25%</a>
		<a class="link" href="#"  onClick="document.form3.pirate_lightcruisers.value=Math.floor(<?php echo $this->_tpl_vars['invasion_lightcruisers']; ?>
/2);return false;">50%</a>
		<a class="link" href="#"  onClick="document.form3.pirate_lightcruisers.value=Math.floor((<?php echo $this->_tpl_vars['invasion_lightcruisers']; ?>
/4)*3);return false;">75%</a>
		<a class="link" href="#" onClick="document.form3.pirate_lightcruisers.value=<?php echo $this->_tpl_vars['invasion_lightcruisers']; ?>
;return false;">MAX</a>: <?php echo ((is_array($_tmp=$this->_tpl_vars['invasion_lightcruisers'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</b></td>
		</tr>

		<tr>
		<td align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Heavy Cruisers:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
		<td><input type="text" name="pirate_heavycruisers"    style="width:100px" class="input_text" value="0">
		<b>
		<a class="link" href="#"  onClick="document.form3.pirate_heavycruisers.value=Math.floor(<?php echo $this->_tpl_vars['invasion_heavycruisers']; ?>
/4);return false;">25%</a>
		<a class="link" href="#"  onClick="document.form3.pirate_heavycruisers.value=Math.floor(<?php echo $this->_tpl_vars['invasion_heavycruisers']; ?>
/2);return false;">50%</a>
		<a class="link" href="#"  onClick="document.form3.pirate_heavycruisers.value=Math.floor((<?php echo $this->_tpl_vars['invasion_heavycruisers']; ?>
/4)*3);return false;">75%</a>
		<a class="link" href="#" onClick="document.form3.pirate_heavycruisers.value=<?php echo $this->_tpl_vars['invasion_heavycruisers']; ?>
;return false;">MAX</a>: <?php echo ((is_array($_tmp=$this->_tpl_vars['invasion_heavycruisers'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</b></td>
		</tr>

	
	
		<tr><td>&nbsp;</td><td colspan="2"><input type="submit" value="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Launch attack<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>"></form></td></tr>
		<tr><td colspan="3"><br/><img src="../images/game/battle.jpg" style="border:1px solid darkred">
		</td></tr>

			
		</table>
		</td></tr></table>

		<br/><br/>
