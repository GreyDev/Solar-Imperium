<?php /* Smarty version 2.6.19, created on 2009-07-19 23:59:10
         compiled from covert.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'covert.html', 4, false),array('modifier', 'number_format', 'covert.html', 101, false),)), $this); ?>
		<table  cellspacing="0" cellpadding="0" border="0">
		<tr>	
		<td nowrap><img src="../images/game/tab2_left.gif" border="0"></td>
		<td nowrap bgcolor="#666666" style="padding:0px 5px 0px 5px"><a  class="link" href="#" onclick="open_page('battle.php')"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Battle Command<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></td>
		<td><img src="../images/game/tab2_right.gif" border="0"></td>

		<td nowrap><img src="../images/game/tab_left.gif" border="0"></td>
		<td nowrap bgcolor="darkred"  style="padding:0px 5px 0px 5px"><a  style="text-decoration:none;color:white" href="# onclick="open_page('covert.php')"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Covert Operations<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></td>
		<td><img src="../images/game/tab_right.gif" border="0"></td>


		<td nowrap><img src="../images/game/tab2_left.gif" border="0"></td>
		<td nowrap bgcolor="#666666"  style="padding:0px 5px 0px 5px"><a  class="link" href="#" onclick="open_page('last_invasions.php')"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Last Invasions<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></td>
		<td><img src="../images/game/tab2_right.gif" border="0"></td>

		</table>


		<form method="post" name="form1" onsubmit="ajax_submit_form('covert.php',this); return false;">
		<table width="720" bgcolor="darkred" cellspacing="1" cellpadding="0" border="0">
		<tr><td>
		<table width="100%" align="center" cellspacing="0" cellpadding="8" border="0" style="font-size:11pt;" bgcolor="#333333" background="../images/game/background1.jpg">
		
		<tr><td>	
		<b style="color:yellow">&nbsp;<a href="javascript:show_help('covert');" class="link" onmouseover="ajax_showTooltip('galaxypedia_short.php?search=covert',this);return false" onmouseout="ajax_hideTooltip()"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Covert Operations<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></b><br/><br/>
		</td></tr>
		

		<tr>
		<td align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Operation:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
		<td>
		<b style="color:#ffcaca">
		<select name="operation" style="width:400px" class="select_box" onChange="
		
		<?php echo '
			if (this.value ==9) {
				document.getElementById(\'empire_from\').disabled=false; 
				document.getElementById(\'empire_from_label\').style.color=\'white\';
				document.getElementById(\'empire_from\').value = -1; 
			} else {

				if (this.value == 10) {

					document.getElementById(\'empire\').value = -1; 
					document.getElementById(\'empire\').disabled=true; 
					document.getElementById(\'empire_label\').style.color=\'#666666\';

					document.getElementById(\'empire_from\').disabled=true; 
					document.getElementById(\'empire_from_label\').style.color=\'#666666\';
					document.getElementById(\'empire_from\').value = -1; 
				} else {

					document.getElementById(\'empire\').value = -1; 
					document.getElementById(\'empire\').disabled=false; 
					document.getElementById(\'empire_label\').style.color=\'white\';

					document.getElementById(\'empire_from\').disabled=true; 
					document.getElementById(\'empire_from_label\').style.color=\'#666666\';
					document.getElementById(\'empire_from\').value = -1; 
				}
			}
		'; ?>

		">
		<?php unset($this->_sections['op']);
$this->_sections['op']['name'] = 'op';
$this->_sections['op']['loop'] = is_array($_loop=$this->_tpl_vars['operations']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['op']['show'] = true;
$this->_sections['op']['max'] = $this->_sections['op']['loop'];
$this->_sections['op']['step'] = 1;
$this->_sections['op']['start'] = $this->_sections['op']['step'] > 0 ? 0 : $this->_sections['op']['loop']-1;
if ($this->_sections['op']['show']) {
    $this->_sections['op']['total'] = $this->_sections['op']['loop'];
    if ($this->_sections['op']['total'] == 0)
        $this->_sections['op']['show'] = false;
} else
    $this->_sections['op']['total'] = 0;
if ($this->_sections['op']['show']):

            for ($this->_sections['op']['index'] = $this->_sections['op']['start'], $this->_sections['op']['iteration'] = 1;
                 $this->_sections['op']['iteration'] <= $this->_sections['op']['total'];
                 $this->_sections['op']['index'] += $this->_sections['op']['step'], $this->_sections['op']['iteration']++):
$this->_sections['op']['rownum'] = $this->_sections['op']['iteration'];
$this->_sections['op']['index_prev'] = $this->_sections['op']['index'] - $this->_sections['op']['step'];
$this->_sections['op']['index_next'] = $this->_sections['op']['index'] + $this->_sections['op']['step'];
$this->_sections['op']['first']      = ($this->_sections['op']['iteration'] == 1);
$this->_sections['op']['last']       = ($this->_sections['op']['iteration'] == $this->_sections['op']['total']);
?>
		<option value="<?php echo $this->_tpl_vars['operations'][$this->_sections['op']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['operations'][$this->_sections['op']['index']]['name']; ?>
</option>
		<?php endfor; endif; ?>
		
		</select>
                </b>
		</td></tr>

		<tr>
		<td align="right" id="empire_label"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Empire:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
		<td>
		<b style="color:#ffcaca">
		<select name="empire" style="width:400px" id="empire" class="select_box">
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
                </b>
		</td></tr>

        
		<tr>
		<td align="right" style="color:#666666" id="empire_from_label"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Setup with:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
		<td>
		<b style="color:#ffcaca">
		<select  id="empire_from" disabled name="empire_from" style="width:400px" class="select_box">
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
                </b>
		</td></tr>

		<tr><td align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Credits:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
		<td><b style="color:#ffcaca"><?php echo ((is_array($_tmp=$this->_tpl_vars['credits'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
 cr.</b></td></tr>
		<tr><td align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Covert points:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
		<td><b style="color:#ffcaca"><?php echo ((is_array($_tmp=$this->_tpl_vars['covert_points'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</b></td></tr>
	
		<tr><td>&nbsp;</td><td><input type="submit" value="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Launch operation<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>"></td></tr>

<tr><td style="font-size:10pt" colspan=2><b style="color:white"><br/><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>What each operation do:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b><br/>
		<p style="text-align:justify;color:#dddddd;border:1px dashed #BBBBBB;padding:5px;background-color:#333333"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Send Spy:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b> <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>You can get information about another empire, simular but less detailed than your own status screen. Spying may not always be successful, but you can guarantee that you can get a spy report by bribing a spy in the other empire. You can spy as many times as you like.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></p>
		<p style="text-align:justify;color:#dddddd;border:1px dashed #BBBBBB;padding:5px;background-color:#333333"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Insurgent Aid:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b> <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>By sending rebellious troublemakers and pamphlets an opponent empire, you can increase the internal violence in that empire. To restore peace may be costly or impossible for the other emperor, and may cause civil war. The violence in the other empire will cause tourism profits to decrease and the population to drop. It's harder to do Insurgent Aid if the other empire is already in civil disorder<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></p>
		<p style="text-align:justify;color:#dddddd;border:1px dashed #BBBBBB;padding:5px;background-color:#333333"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Support Dissension:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b> <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>You try to convince enemy troops to leave or flee the army. ( They might join your army)<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></p>
		<p style="text-align:justify;color:#dddddd;border:1px dashed #BBBBBB;padding:5px;background-color:#333333"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Demoralize Troops:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b> <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>By sending distractions and interruptions to the target empire, you can redecue the training efficiency of their soldiers and reduce the effectiveness of the army.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></p>
		<p style="text-align:justify;color:#dddddd;border:1px dashed #BBBBBB;padding:5px;background-color:#333333"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Bombing Operations:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b> <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Your spies can booby-trap the target's food supplies. Some or all of the food may be blown up. This is useful in starving another empire to death.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></p>
		<p style="text-align:justify;color:#dddddd;border:1px dashed #BBBBBB;padding:5px;background-color:#333333"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Relations Spying:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b> <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Your agents didscover the treaties held by another empire.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></p>
		<p style="text-align:justify;color:#dddddd;border:1px dashed #BBBBBB;padding:5px;background-color:#333333"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Take Hostages:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b> <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Your terrorist spies capture a prominent official from the other empire and demand a sum of money for his or her return. The opponent emperor is forced to pay the fee, and you will receive the money.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></p>
		<p style="text-align:justify;color:#dddddd;border:1px dashed #BBBBBB;padding:5px;background-color:#333333"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Carriers Sabotage:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b> <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Destroying carriers can ground a big empire for some turns, use it as a defensive tactic<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></p>
		<p style="text-align:justify;color:#dddddd;border:1px dashed #BBBBBB;padding:5px;background-color:#333333"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Communication Spying:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b> <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Allow you to read the 5 last received messages of an empire<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></p>
		<p style="text-align:justify;color:#dddddd;border:1px dashed #BBBBBB;padding:5px;background-color:#333333"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Setup Coup:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b> <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Send a failed covert operation notice to a target empire and make it look the covert operation was coming from another empire.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></p>
		</td></tr>
			
		</table>
		</td></tr></table>

		<br/><br/>

		</form>

		<br/> <br/>
