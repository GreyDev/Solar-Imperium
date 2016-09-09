<?php /* Smarty version 2.6.19, created on 2009-07-22 21:28:27
         compiled from event/invasion_report.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'event/invasion_report.html', 9, false),)), $this); ?>
<table width="100%" bgcolor="black" cellpadding="5" background="../images/game/background1.jpg">
	<tr>
		<td width="100%" valign="top">
		<div style="color:white" align="right" style="margin:0px"><b><?php echo $this->_tpl_vars['date']; ?>
 </b></div>

		<table width="100%">
			<tr>
				<td>
				<b style="color:white;font-size:16px"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Invasion report<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> (<a href="last_invasions.php"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Click here fo a advanced report<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>)</b><br/></br>

				<table width="300" align="center" style="border:1px solid white">
					<tr>
						<td width="100" align="center" background="<?php echo $this->_tpl_vars['background_space']; ?>
" bgcolor="<?php echo $this->_tpl_vars['color_space']; ?>
" height="50"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Space<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
						<td width="100" align="center" background="<?php echo $this->_tpl_vars['background_orbital']; ?>
" bgcolor="<?php echo $this->_tpl_vars['color_orbital']; ?>
" height="50"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Orbital<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
						<td width="100" align="center" background="<?php echo $this->_tpl_vars['background_ground']; ?>
" bgcolor="<?php echo $this->_tpl_vars['color_ground']; ?>
" height="50"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Ground<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
					</tr>
				</table>
				<br/>

				<?php if ($this->_tpl_vars['invasion_won'] == true): ?>
				<table background width="100%" bgcolor="darkred" style="border:1px solid white">
				<tr><td>
				<b style="color:white"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Attacker(s) successfully invaded the empire!<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b><br/>

					<table width="100%">
					<tr><td valign="top" width="50%" bgcolor="#660000">
					<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Food planets taken:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <b><?php echo $this->_tpl_vars['lost_food_planets']; ?>
</b></br>
					<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Ore planets taken:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <b><?php echo $this->_tpl_vars['lost_ore_planets']; ?>
</b></br>
					<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Tourism planets taken:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <b><?php echo $this->_tpl_vars['lost_tourism_planets']; ?>
</b></br>
					<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Supply planets taken:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <b><?php echo $this->_tpl_vars['lost_supply_planets']; ?>
</b></br>
					<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Gov. planets taken:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <b><?php echo $this->_tpl_vars['lost_gov_planets']; ?>
</b></br>
					<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Education planets taken:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <b><?php echo $this->_tpl_vars['lost_edu_planets']; ?>
</b></br>
					<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Urban planets taken:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <b><?php echo $this->_tpl_vars['lost_urban_planets']; ?>
</b></br>
					<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Research planets taken:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <b><?php echo $this->_tpl_vars['lost_research_planets']; ?>
</b></br>
					<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Petroleum planets taken:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <b><?php echo $this->_tpl_vars['lost_petro_planets']; ?>
</b></br>
					<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Anti-Pollution planets taken:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <b><?php echo $this->_tpl_vars['lost_antipollu_planets']; ?>
</b></br>
					</td><td valign="top">
					<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Population killed:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <b><?php echo $this->_tpl_vars['lost_population']; ?>
</b></br>
					<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Credits stolen:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <b><?php echo $this->_tpl_vars['lost_credits']; ?>
</b></br>
					<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>New civil status:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <b><?php echo $this->_tpl_vars['civil_status']; ?>
</b><br/>
					<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>New military effectiveness:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <b><?php echo $this->_tpl_vars['military_effectiveness']; ?>
 %</b><br/>
					</td></tr>
					</table>
				</td></tr>
				</table>
				<?php else: ?>
				<table width="100%" bgcolor="darkblue" background="../images/game/background/invasion_defense.jpg" style="border:1px solid cyan">
				<tr><td>
				<b style="color:white"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Attacker(s) got defeated by defending empire(s)!<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b><br/>
				</td></tr>
				</table>
				<br/>
				<?php endif; ?>
				

				<table width="100%" cellspacing="0" cellpadding="0" border="0" style="border:1px solid white">
				<tr>
					<td width="50%" height="100%"> <!-- left -->
					<table width="100%" height="100%" background="../images/game/background/backdrop_attack.jpg">
					<tr>
						<td colspan="2"><b style="color:white"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Attacker(s)<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
					</tr>
					<tr>
						<td width="40"><img style="border:1px solid white" src="../images/game/empires/<?php echo $this->_tpl_vars['game_id']; ?>
/<?php echo $this->_tpl_vars['attack_empire_id']; ?>
.jpg"></td>
						<td width="260"><b style="color:white"><?php echo $this->_tpl_vars['attack_empires']; ?>
</b></td>
					</tr>
					<tr>
						<td width="40"><img style="border:1px solid white" width="32" height="32" src="../images/game/icons/army/soldiers_<?php echo $this->_tpl_vars['attack_soldiers_level']; ?>
.gif"></td>
						<td><?php echo $this->_tpl_vars['attack_soldiers_qty']; ?>
</td>
					</tr>
					<tr>
						<td  width="40"><img style="border:1px solid white"  width="32" height="32" src="../images/game/icons/army/fighters_<?php echo $this->_tpl_vars['attack_fighters_level']; ?>
.gif"></td>
						<td ><?php echo $this->_tpl_vars['attack_fighters_qty']; ?>
</td>
					</tr>
					<tr>
						<td width="40">&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td width="40"><img style="border:1px solid white"  width="32" height="32" src="../images/game/icons/army/lightcruisers_<?php echo $this->_tpl_vars['attack_lightcruisers_level']; ?>
.gif"></td>
						<td><?php echo $this->_tpl_vars['attack_lightcruisers_qty']; ?>
</td>
					</tr>
					<tr>
						<td width="40"><img style="border:1px solid white"  width="32" height="32" src="../images/game/icons/army/heavycruisers_<?php echo $this->_tpl_vars['attack_heavycruisers_level']; ?>
.gif"></td>
						<td><?php echo $this->_tpl_vars['attack_heavycruisers_qty']; ?>
</td>
					</tr>
					</table>

				</td>

				<td width="50%" height="100%"> <!-- right -->
				<table width="100%" height="100%" background="../images/game/background/backdrop_defense.jpg">
				<tr>
					<td colspan="2" ><b style="color:white"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Defender(s)<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
				</tr>
				<tr>
					<td  width="40"><img style="border:1px solid white" src="../images/game/empires/<?php echo $this->_tpl_vars['game_id']; ?>
/<?php echo $this->_tpl_vars['defense_empire_id']; ?>
.jpg"></td>
					<td  width="260"><b style="color:white"><?php echo $this->_tpl_vars['defense_empires']; ?>
</b></td>
				</tr>
				<tr>
					<td  width="40"><img  style="border:1px solid white" width="32" height="32" src="../images/game/icons/army/soldiers_<?php echo $this->_tpl_vars['defense_soldiers_level']; ?>
.gif"></td>
					<td ><?php echo $this->_tpl_vars['defense_soldiers_qty']; ?>
</td>
				</tr>
				<tr>
					<td  width="40"><img  style="border:1px solid white" width="32" height="32" src="../images/game/icons/army/fighters_<?php echo $this->_tpl_vars['defense_fighters_level']; ?>
.gif"></td>
					<td ><?php echo $this->_tpl_vars['defense_fighters_qty']; ?>
</td>
				</tr>
				<tr>
					<td  width="40"><img  style="border:1px solid white" width="32" height="32" src="../images/game/icons/army/stations_<?php echo $this->_tpl_vars['defense_stations_level']; ?>
.gif"></td>
					<td ><?php echo $this->_tpl_vars['defense_stations_qty']; ?>
</td>
				</tr>
				<tr>
					<td  width="40"><img style="border:1px solid white"  width="32" height="32" src="../images/game/icons/army/lightcruisers_<?php echo $this->_tpl_vars['defense_lightcruisers_level']; ?>
.gif"></td>
					<td ><?php echo $this->_tpl_vars['defense_lightcruisers_qty']; ?>
</td>
				</tr>
				<tr>
					<td  width="40"><img style="border:1px solid white"  width="32" height="32" src="../images/game/icons/army/heavycruisers_<?php echo $this->_tpl_vars['defense_heavycruisers_level']; ?>
.gif"></td>
					<td ><?php echo $this->_tpl_vars['defense_heavycruisers_qty']; ?>
</td>
				</tr>
			</table>

			</td>
		</tr>
	</table>


	<br/>
	<b style="color:white;font-size:14px"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Casualties<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b><br/><br/>

	<table style="border:1px solid white" background="../images/game/background/invasion_attack.jpg" bgcolor="darkred" width="100%">
	<?php unset($this->_sections['ac']);
$this->_sections['ac']['name'] = 'ac';
$this->_sections['ac']['loop'] = is_array($_loop=$this->_tpl_vars['attack_casualties']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['ac']['show'] = true;
$this->_sections['ac']['max'] = $this->_sections['ac']['loop'];
$this->_sections['ac']['step'] = 1;
$this->_sections['ac']['start'] = $this->_sections['ac']['step'] > 0 ? 0 : $this->_sections['ac']['loop']-1;
if ($this->_sections['ac']['show']) {
    $this->_sections['ac']['total'] = $this->_sections['ac']['loop'];
    if ($this->_sections['ac']['total'] == 0)
        $this->_sections['ac']['show'] = false;
} else
    $this->_sections['ac']['total'] = 0;
if ($this->_sections['ac']['show']):

            for ($this->_sections['ac']['index'] = $this->_sections['ac']['start'], $this->_sections['ac']['iteration'] = 1;
                 $this->_sections['ac']['iteration'] <= $this->_sections['ac']['total'];
                 $this->_sections['ac']['index'] += $this->_sections['ac']['step'], $this->_sections['ac']['iteration']++):
$this->_sections['ac']['rownum'] = $this->_sections['ac']['iteration'];
$this->_sections['ac']['index_prev'] = $this->_sections['ac']['index'] - $this->_sections['ac']['step'];
$this->_sections['ac']['index_next'] = $this->_sections['ac']['index'] + $this->_sections['ac']['step'];
$this->_sections['ac']['first']      = ($this->_sections['ac']['iteration'] == 1);
$this->_sections['ac']['last']       = ($this->_sections['ac']['iteration'] == $this->_sections['ac']['total']);
?>
	<tr>
		<td>
		<b style="color:white"><?php echo $this->_tpl_vars['attack_casualties'][$this->_sections['ac']['index']]['emperor']; ?>
@<?php echo $this->_tpl_vars['attack_casualties'][$this->_sections['ac']['index']]['name']; ?>
</b> :: 
		<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>soldiers<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <b><?php echo $this->_tpl_vars['attack_casualties'][$this->_sections['ac']['index']]['soldiers']; ?>
</b>, 
		<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>fighters<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <b><?php echo $this->_tpl_vars['attack_casualties'][$this->_sections['ac']['index']]['fighters']; ?>
</b>, 
		<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>light cruisers<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <b><?php echo $this->_tpl_vars['attack_casualties'][$this->_sections['ac']['index']]['lightcruisers']; ?>
</b>, 
		<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>heavy cruisers<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <b><?php echo $this->_tpl_vars['attack_casualties'][$this->_sections['ac']['index']]['heavycruisers']; ?>
</b>, 
		<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>carriers<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <b><?php echo $this->_tpl_vars['attack_casualties'][$this->_sections['ac']['index']]['carriers']; ?>
</b>
		</td>
	</tr>
	<?php endfor; endif; ?>
	
	</table>
	<br/>

	<table style="border:1px solid cyan" bgcolor="darkblue" background="../images/game/background/invasion_defense.jpg" width="100%">
	<?php unset($this->_sections['dc']);
$this->_sections['dc']['name'] = 'dc';
$this->_sections['dc']['loop'] = is_array($_loop=$this->_tpl_vars['defense_casualties']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['dc']['show'] = true;
$this->_sections['dc']['max'] = $this->_sections['dc']['loop'];
$this->_sections['dc']['step'] = 1;
$this->_sections['dc']['start'] = $this->_sections['dc']['step'] > 0 ? 0 : $this->_sections['dc']['loop']-1;
if ($this->_sections['dc']['show']) {
    $this->_sections['dc']['total'] = $this->_sections['dc']['loop'];
    if ($this->_sections['dc']['total'] == 0)
        $this->_sections['dc']['show'] = false;
} else
    $this->_sections['dc']['total'] = 0;
if ($this->_sections['dc']['show']):

            for ($this->_sections['dc']['index'] = $this->_sections['dc']['start'], $this->_sections['dc']['iteration'] = 1;
                 $this->_sections['dc']['iteration'] <= $this->_sections['dc']['total'];
                 $this->_sections['dc']['index'] += $this->_sections['dc']['step'], $this->_sections['dc']['iteration']++):
$this->_sections['dc']['rownum'] = $this->_sections['dc']['iteration'];
$this->_sections['dc']['index_prev'] = $this->_sections['dc']['index'] - $this->_sections['dc']['step'];
$this->_sections['dc']['index_next'] = $this->_sections['dc']['index'] + $this->_sections['dc']['step'];
$this->_sections['dc']['first']      = ($this->_sections['dc']['iteration'] == 1);
$this->_sections['dc']['last']       = ($this->_sections['dc']['iteration'] == $this->_sections['dc']['total']);
?>
	<tr><td>
	<b style="color:cyan"><?php echo $this->_tpl_vars['defense_casualties'][$this->_sections['dc']['index']]['emperor']; ?>
@<?php echo $this->_tpl_vars['defense_casualties'][$this->_sections['dc']['index']]['name']; ?>
</b> :: 
		<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>soldiers<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>:<b><?php echo $this->_tpl_vars['defense_casualties'][$this->_sections['dc']['index']]['soldiers']; ?>
</b>,
		<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>fighters<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <b><?php echo $this->_tpl_vars['defense_casualties'][$this->_sections['dc']['index']]['fighters']; ?>
</b>,
		<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>light cruisers<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <b><?php echo $this->_tpl_vars['defense_casualties'][$this->_sections['dc']['index']]['lightcruisers']; ?>
</b>, 
		<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>heavy cruisers<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <b><?php echo $this->_tpl_vars['defense_casualties'][$this->_sections['dc']['index']]['heavycruisers']; ?>
</b>, 
		<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>defense stations<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <b><?php echo $this->_tpl_vars['defense_casualties'][$this->_sections['dc']['index']]['stations']; ?>
</b>
	</td></tr>
	<?php endfor; endif; ?>
	</table>
	<br/>

	</td></tr>
	</table>
	</td>
</tr>
</table>