<?php /* Smarty version 2.6.19, created on 2009-05-25 21:38:09
         compiled from welcomeback.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'welcomeback.html', 2, false),array('modifier', 'date_format', 'welcomeback.html', 37, false),array('modifier', 'number_format', 'welcomeback.html', 42, false),)), $this); ?>
<form action="newturn.php" style="margin:0 0 10 0">
<input type="submit" value="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Start new turn<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>">
</form>
<table width="720" bgcolor="darkred" cellspacing="1"
	cellpadding="0" border="0">
	<tr>
		<td background="../images/game/header.jpg"><b>&nbsp;<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Welcome back!<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
	</tr>
	<tr>
		<td>
		<table background="../images/game/background1.jpg" width="100%" align="center"
			cellspacing="0" cellpadding="5" border="0" bgcolor="#333333">

			<tr>
			<td>
			<div align="center">
			<img style="border:1px solid #666666" src="<?php echo $this->_tpl_vars['emperor_avatar']; ?>
"><br/><br/>
			<img style="border:1px solid #666666" src="img_logo.php?empire=<?php echo $this->_tpl_vars['empire_id']; ?>
"><br/><br/>
			<?php if ($this->_tpl_vars['is_coalition_member'] == true): ?>
			<img style="border:1px solid #666666" src="img_logo.php?data=<?php echo $this->_tpl_vars['coalition_logo']; ?>
"><br/>
			<?php endif; ?>
			</div>
			</td>
			<td>
			<table cellspacing="0" cellpadding="4" border="0">
		
			<tr>
				<td style="color:#CACACA" align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Empire name:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
				<td><b style="color:#ff9999"><?php echo $this->_tpl_vars['empire_short']; ?>
</b></td>
			</tr>
			<tr>
				<td style="color:#CACACA" align="right"><?php echo $this->_tpl_vars['gender']; ?>
 <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>name:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
				<td><b style="color:#ff9999"><?php echo $this->_tpl_vars['emperor_short']; ?>
</b></td>
			</tr>
			<tr>
				<td style="color:#CACACA" align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Created on:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
				<td><b style="color:#ff9999"><?php echo ((is_array($_tmp=$this->_tpl_vars['creation_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</b></td>
			</tr>
			<tr>
				<td style="color:#CACACA" align="right"><a
					href=javascript:show_help('networth') class="link" onmouseover="ajax_showTooltip('galaxypedia_short.php?search=networth',this);return false" onmouseout="ajax_hideTooltip()"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Net. Worth<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>:</td>
				<td><b style="color:#ff9999"><?php echo ((is_array($_tmp=$this->_tpl_vars['networth'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</b></td>
			</tr>
			<tr>
				<td style="color:#CACACA" align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Ranking:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
				<td><b style="color:#ff9999"><?php echo ((is_array($_tmp=$this->_tpl_vars['ranking'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
<b
					style="color:white"> /</b> <b style="color:white"><?php echo ((is_array($_tmp=$this->_tpl_vars['total_players'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</b></td>
			</tr>
			<tr>
				<td style="color:#CACACA" align="right"><a
					href=javascript:show_help('money') class="link" onmouseover="ajax_showTooltip('galaxypedia_short.php?search=money',this);return false" onmouseout="ajax_hideTooltip()"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Money<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>:</td>
				<td><b style="color:#ff9999"><?php echo ((is_array($_tmp=$this->_tpl_vars['credits'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</b></td>
			</tr>
			<tr>
				<td style="color:#CACACA" align="right"><a
					href=javascript:show_help('population') class="link" onmouseover="ajax_showTooltip('galaxypedia_short.php?search=population',this);return false" onmouseout="ajax_hideTooltip()"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Population<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>:</td>
				<td><b style="color:#ff9999"><?php echo ((is_array($_tmp=$this->_tpl_vars['population'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</b></td>
			</tr>

			<tr>
				<td style="color:#CACACA" align="right"><a
					href=javascript:show_help('insurgency') class="link" onmouseover="ajax_showTooltip('galaxypedia_short.php?search=insurgency',this);return false" onmouseout="ajax_hideTooltip()"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Insurgency<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>:</td>
				<td><b style="color:#ff9999"><?php echo $this->_tpl_vars['civil_status']; ?>
</b></td>
			</tr>

			<tr>
				<td style="color:#CACACA" align="right"><a
					href=javascript:show_help('food') class="link" onmouseover="ajax_showTooltip('galaxypedia_short.php?search=food',this);return false" onmouseout="ajax_hideTooltip()"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Food<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>:</td>
				<td><b style="color:#ff9999"><?php echo ((is_array($_tmp=$this->_tpl_vars['food'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</b></td>
			</tr>

			<tr>
				<td style="color:#CACACA" align="right"><a
					href=javascript:show_help('ore') class="link" onmouseover="ajax_showTooltip('galaxypedia_short.php?search=food',this);return false" onmouseout="ajax_hideTooltip()"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Ore<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>:</td>
				<td><b style="color:#ff9999"><?php echo ((is_array($_tmp=$this->_tpl_vars['ore'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</b></td>
			</tr>

			<tr>
				<td style="color:#CACACA" align="right"><a
					href=javascript:show_help('petroleum') class="link" onmouseover="ajax_showTooltip('galaxypedia_short.php?search=food',this);return false" onmouseout="ajax_hideTooltip()"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Petroleum<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>:</td>
				<td><b style="color:#ff9999"><?php echo ((is_array($_tmp=$this->_tpl_vars['petroleum'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</b></td>
			</tr>


			<tr>
				<td style="color:#CACACA" align="right"><a
					href=javascript:show_help('covertagents') class="link" onmouseover="ajax_showTooltip('galaxypedia_short.php?search=covert_agents',this);return false" onmouseout="ajax_hideTooltip()"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Covert agents<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>:</td>
				<td><b style="color:#ff9999"><?php echo ((is_array($_tmp=$this->_tpl_vars['covertagents'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</b></td>
			</tr>

			<tr>
				<td style="color:#CACACA" align="right"><a
					href=javascript:show_help('effectiveness')  class="link" onmouseover="ajax_showTooltip('galaxypedia_short.php?search=effectiveness',this);return false" onmouseout="ajax_hideTooltip()"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Military
				effectiveness<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>:</td>
				<td><b style="color:#ff9999"><?php echo $this->_tpl_vars['effectiveness']; ?>
</b> <b
					style="color:white">%</b></td>
			</tr>
			</table>
			</td>
			<td>
			<table cellspacing="0" cellpadding="4" border="0">
			<tr>
				<td style="color:#CACACA" align="right"><a
					href=javascript:show_help('soldiers')  class="link" onmouseover="ajax_showTooltip('galaxypedia_short.php?search=soldiers',this);return false" onmouseout="ajax_hideTooltip()"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Soldiers<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>:</td>
				<td><b style="color:#ff9999"><?php echo ((is_array($_tmp=$this->_tpl_vars['soldiers'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</b></td>
			</tr>

			<tr>
				<td style="color:#CACACA" align="right"><a
					href=javascript:show_help('fighters')  class="link" onmouseover="ajax_showTooltip('galaxypedia_short.php?search=fighters',this);return false" onmouseout="ajax_hideTooltip()"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Fighters<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>:</td>
				<td><b style="color:#ff9999"><?php echo ((is_array($_tmp=$this->_tpl_vars['fighters'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</b></td>
			</tr>

			<tr>
				<td style="color:#CACACA" align="right"><a
					href=javascript:show_help('stations')  class="link" onmouseover="ajax_showTooltip('galaxypedia_short.php?search=stations',this);return false" onmouseout="ajax_hideTooltip()"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Defense Stations<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>:</td>
				<td><b style="color:#ff9999"><?php echo ((is_array($_tmp=$this->_tpl_vars['stations'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</b></td>
			</tr>

			<tr>
				<td style="color:#CACACA" align="right"><a
					href=javascript:show_help('lightcruisers')  class="link" onmouseover="ajax_showTooltip('galaxypedia_short.php?search=lightcruisers',this);return false" onmouseout="ajax_hideTooltip()"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Light cruisers<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>:</td>
				<td><b style="color:#ff9999"><?php echo ((is_array($_tmp=$this->_tpl_vars['light_cruisers'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</b></td>
			</tr>

			<tr>
				<td style="color:#CACACA" align="right"><a
					href=javascript:show_help('heavycruisers')  class="link" onmouseover="ajax_showTooltip('galaxypedia_short.php?search=heavycruisers',this);return false" onmouseout="ajax_hideTooltip()"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Heavy cruisers<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>:</td>
				<td><b style="color:#ff9999"><?php echo ((is_array($_tmp=$this->_tpl_vars['heavy_cruisers'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</b></td>
			</tr>

			<tr>
				<td style="color:#CACACA" align="right"><a
					href=javascript:show_help('carriers')  class="link" onmouseover="ajax_showTooltip('galaxypedia_short.php?search=carriers',this);return false" onmouseout="ajax_hideTooltip()"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Carriers<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>:</td>
				<td><b style="color:#ff9999"><?php echo ((is_array($_tmp=$this->_tpl_vars['carriers'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</b></td>
			</tr>

			<tr>
				<td style="color:#CACACA" align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Planets count:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
				<td><b style="color:#ff9999"><?php echo ((is_array($_tmp=$this->_tpl_vars['planets_count'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
 </b> <b
					style="color:white"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>planets<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
			</tr>
			<tr>
				<td style="color:#CACACA" align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Research Level:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
				<td><b style="color:#ff9999"><?php echo $this->_tpl_vars['research_level']; ?>
 </b></td>
			</tr>


			<tr>
				<td style="color:#CACACA" align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Turns played:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
				<td><b style="color:#ff9999"><?php echo ((is_array($_tmp=$this->_tpl_vars['turns_played'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</b></td>
			</tr>

			<tr>
				<td style="color:#CACACA" align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Turns left:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
				<td><b style="color:#ff9999"><?php echo ((is_array($_tmp=$this->_tpl_vars['turns_left'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</b></td>
			</tr>
			<tr>
				<td style="color:#CACACA" align="right"><a
					href=javascript:show_help('protection')  class="link" onmouseover="ajax_showTooltip('galaxypedia_short.php?search=protection',this);return false" onmouseout="ajax_hideTooltip()"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Protection<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a> <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>turns
				remaining:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
				<td><b style="color:#ff9999"><?php echo ((is_array($_tmp=$this->_tpl_vars['protection_turns_left'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</b></td>
			</tr>
		</table>
		</td>
		</tr>
		<tr><td colspan="3"><br/><img style="border:1px solid darkred" src="../images/game/nextturn.jpg"></td></tr>
		</table>
		
		</td>
	</tr>
</table>