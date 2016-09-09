<?php /* Smarty version 2.6.19, created on 2009-09-14 16:23:44
         compiled from last_invasions_details.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'last_invasions_details.html', 4, false),array('modifier', 'date_format', 'last_invasions_details.html', 26, false),)), $this); ?>
<table  cellspacing="0" cellpadding="0" border="0">
    <tr>
        <td nowrap><img src="../images/game/tab2_left.gif" border="0"></td>
        <td nowrap bgcolor="#666666" style="padding:0px 5px 0px 5px"><a  class="link" href="#" onclick="open_page('battle.php')"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Battle Command<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></td>
        <td><img src="../images/game/tab2_right.gif" border="0"></td>

        <td nowrap><img src="../images/game/tab2_left.gif" border="0"></td>
        <td nowrap bgcolor="#666666"  style="padding:0px 5px 0px 5px"><a  class="link" href="#" onclick="open_page('covert.php')"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Covert Operations<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></td>
        <td><img src="../images/game/tab2_right.gif" border="0"></td>


        <td nowrap><img src="../images/game/tab_left.gif" border="0"></td>
        <td nowrap bgcolor="darkred"  style="padding:0px 5px 0px 5px"><a  style="text-decoration:none;color:white" href="#" onclick="open_page('last_invasions.php')"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Last Invasions<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></td>
        <td><img src="../images/game/tab_right.gif" border="0"></td>
    </tr>
</table>

<table  width="780" bgcolor="darkred" cellspacing="1" cellpadding="0" border="0">
    <tr>
        <td>
            <table background="../images/game/background1.jpg" bgcolor="#333333" width="100%" cellpadding="5" cellspacing="0">
                <tr>
                    <td>


                        <b style="font-size:14px">Invasion details</b><b> (<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Date<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <?php echo ((is_array($_tmp=$this->_tpl_vars['invasion_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
), <a href="#" class="link3" onClick="open_page('last_invasions.php'); return false;">Back to invasions list</a></b><br/>


                        <br/>
                        <b>
                            <a  class="link4" href="#summary"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Summary<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a> |
                            <a class="link4" href="#before_attack"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Before attack<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a> |
                            <a class="link4" href="#assault"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Assault<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a> |
                            <a class="link4" href="#after_attack"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>After attack<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>
                        </b>
                        <br/>
                        <br/>

                        <table style="border:1px solid red" width="100%">
                            <tr><td bgcolor="darkred"><a class="link" name="summary"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Summary<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></td></tr>
                            <tr>
                                <td bgcolor="#333333" background="../images/game/invasion_background1.png">

                                    <table>
                                        <tr>
                                            <td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Deep space battles won?<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
                                            <td><b><?php echo $this->_tpl_vars['space_battles_won']; ?>
</b></td>
                                        </tr>

                                        <tr>
                                            <td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Orbital battles won?<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
                                            <td><b><?php echo $this->_tpl_vars['orbital_battles_won']; ?>
</b></td>
                                        </tr>

                                        <tr>
                                            <td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Ground battles won?<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
                                            <td><b><?php echo $this->_tpl_vars['ground_battles_won']; ?>
</b></td>
                                        </tr>

                                        <tr>
                                            <td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>How many attackers?<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
                                            <td><b><?php echo $this->_tpl_vars['attackers_count']; ?>
</b></td>
                                        </tr>

                                        <tr>
                                            <td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>How many defenders?<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
                                            <td><b><?php echo $this->_tpl_vars['defenders_count']; ?>
</b></td>
                                        </tr>

                                    </table>

                                </td>
                            </tr>
                        </table>
                        <br/>

                        <table style="border:1px solid red" width="100%">
                            <tr><td bgcolor="darkred"><a class="link" name="before_attack"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Before attack<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></td></tr>
                            <tr><td bgcolor="#333333">

                                    <table width="100%">
                                        <tr>
                                            <td valign="top">
                                                <b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Attackers side:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b><br/>
                                                <?php unset($this->_sections['a']);
$this->_sections['a']['name'] = 'a';
$this->_sections['a']['loop'] = is_array($_loop=$this->_tpl_vars['attackers']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['a']['show'] = true;
$this->_sections['a']['max'] = $this->_sections['a']['loop'];
$this->_sections['a']['step'] = 1;
$this->_sections['a']['start'] = $this->_sections['a']['step'] > 0 ? 0 : $this->_sections['a']['loop']-1;
if ($this->_sections['a']['show']) {
    $this->_sections['a']['total'] = $this->_sections['a']['loop'];
    if ($this->_sections['a']['total'] == 0)
        $this->_sections['a']['show'] = false;
} else
    $this->_sections['a']['total'] = 0;
if ($this->_sections['a']['show']):

            for ($this->_sections['a']['index'] = $this->_sections['a']['start'], $this->_sections['a']['iteration'] = 1;
                 $this->_sections['a']['iteration'] <= $this->_sections['a']['total'];
                 $this->_sections['a']['index'] += $this->_sections['a']['step'], $this->_sections['a']['iteration']++):
$this->_sections['a']['rownum'] = $this->_sections['a']['iteration'];
$this->_sections['a']['index_prev'] = $this->_sections['a']['index'] - $this->_sections['a']['step'];
$this->_sections['a']['index_next'] = $this->_sections['a']['index'] + $this->_sections['a']['step'];
$this->_sections['a']['first']      = ($this->_sections['a']['iteration'] == 1);
$this->_sections['a']['last']       = ($this->_sections['a']['iteration'] == $this->_sections['a']['total']);
?>

                                                <table bgcolor="#4a4a4a" style="border:1px solid #cacaca;padding:5px" cellspacing="0" cellpadding="2" width="330px">
                                                    <tr><td nowrap><img width="32" height="32" style="border:1px solid darkred" src="../images/game/empires/<?php echo $this->_tpl_vars['attackers'][$this->_sections['a']['index']]['game_id']; ?>
/<?php echo $this->_tpl_vars['attackers'][$this->_sections['a']['index']]['empire_id']; ?>
.jpg"></td><td nowrap><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Empire:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td width="100%"><b><?php echo $this->_tpl_vars['attackers'][$this->_sections['a']['index']]['empire_name']; ?>
</b></td></tr>
                                                    <tr><td nowrap>&nbsp;</td><td nowrap>Effectiveness:</td><td width="100%"><b><?php echo $this->_tpl_vars['attackers'][$this->_sections['a']['index']]['effectiveness']; ?>
 %</b></td></tr>
                                                    <tr><td><img width="32" height="32" style="border:1px solid darkred" src="../images/game/icons/army/soldiers_<?php echo $this->_tpl_vars['attackers'][$this->_sections['a']['index']]['soldiers_level']; ?>
.gif"></td><td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Soldiers:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><b><?php echo $this->_tpl_vars['attackers'][$this->_sections['a']['index']]['soldiers']; ?>
</b></td></tr>
                                                    <tr><td><img width="32" height="32" style="border:1px solid darkred" src="../images/game/icons/army/fighters_<?php echo $this->_tpl_vars['attackers'][$this->_sections['a']['index']]['fighters_level']; ?>
.gif"></td><td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Fighters:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><b><?php echo $this->_tpl_vars['attackers'][$this->_sections['a']['index']]['fighters']; ?>
</b></td></tr>
                                                    <tr><td><img width="32" height="32" style="border:1px solid darkred" src="../images/game/icons/army/lightcruisers_<?php echo $this->_tpl_vars['attackers'][$this->_sections['a']['index']]['lightcruisers_level']; ?>
.gif"></td><td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Light&nbsp;Cruisers:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><b><?php echo $this->_tpl_vars['attackers'][$this->_sections['a']['index']]['lightcruisers']; ?>
</b></td></tr>
                                                    <tr><td><img width="32" height="32" style="border:1px solid darkred" src="../images/game/icons/army/heavycruisers_<?php echo $this->_tpl_vars['attackers'][$this->_sections['a']['index']]['heavycruisers_level']; ?>
.gif"></td><td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Heavy&nbsp;Cruisers:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><b><?php echo $this->_tpl_vars['attackers'][$this->_sections['a']['index']]['heavycruisers']; ?>
</b></td></tr>
                                                    <tr><td><img width="32" height="32" style="border:1px solid darkred" src="../images/game/icons/army/carriers_<?php echo $this->_tpl_vars['attackers'][$this->_sections['a']['index']]['carriers_level']; ?>
.gif"></td><td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Carriers:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><b><?php echo $this->_tpl_vars['attackers'][$this->_sections['a']['index']]['carriers']; ?>
</b></b></td></tr>
                                                </table>
                                                <br/>
                                                <?php endfor; else: ?>
                                                <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>No attackers!<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
                                                <?php endif; ?>
                                            </td>
                                            <td valign="top">
                                                <b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Defenders side:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b><br/>
                                                <?php unset($this->_sections['d']);
$this->_sections['d']['name'] = 'd';
$this->_sections['d']['loop'] = is_array($_loop=$this->_tpl_vars['defenders']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['d']['show'] = true;
$this->_sections['d']['max'] = $this->_sections['d']['loop'];
$this->_sections['d']['step'] = 1;
$this->_sections['d']['start'] = $this->_sections['d']['step'] > 0 ? 0 : $this->_sections['d']['loop']-1;
if ($this->_sections['d']['show']) {
    $this->_sections['d']['total'] = $this->_sections['d']['loop'];
    if ($this->_sections['d']['total'] == 0)
        $this->_sections['d']['show'] = false;
} else
    $this->_sections['d']['total'] = 0;
if ($this->_sections['d']['show']):

            for ($this->_sections['d']['index'] = $this->_sections['d']['start'], $this->_sections['d']['iteration'] = 1;
                 $this->_sections['d']['iteration'] <= $this->_sections['d']['total'];
                 $this->_sections['d']['index'] += $this->_sections['d']['step'], $this->_sections['d']['iteration']++):
$this->_sections['d']['rownum'] = $this->_sections['d']['iteration'];
$this->_sections['d']['index_prev'] = $this->_sections['d']['index'] - $this->_sections['d']['step'];
$this->_sections['d']['index_next'] = $this->_sections['d']['index'] + $this->_sections['d']['step'];
$this->_sections['d']['first']      = ($this->_sections['d']['iteration'] == 1);
$this->_sections['d']['last']       = ($this->_sections['d']['iteration'] == $this->_sections['d']['total']);
?>

                                                <table bgcolor="#4a4a4a" style="border:1px solid #cacaca;padding:5px" cellspacing="0" cellpadding="2" width="330px">
                                                    <tr><td nowrap><img width="32" height="32" style="border:1px solid darkred" src="../images/game/empires/<?php echo $this->_tpl_vars['defenders'][$this->_sections['d']['index']]['game_id']; ?>
/<?php echo $this->_tpl_vars['defenders'][$this->_sections['d']['index']]['empire_id']; ?>
.jpg"></td><td nowrap><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Empire:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td width="100%"><b><?php echo $this->_tpl_vars['defenders'][$this->_sections['d']['index']]['empire_name']; ?>
</b></td></tr>
                                                    <tr><td nowrap>&nbsp;</td><td nowrap>Effectiveness:</td><td width="100%"><b><?php echo $this->_tpl_vars['defenders'][$this->_sections['d']['index']]['effectiveness']; ?>
 %</b></td></tr>
                                                    <tr><td><img width="32" height="32" style="border:1px solid darkred" src="../images/game/icons/army/soldiers_<?php echo $this->_tpl_vars['defenders'][$this->_sections['d']['index']]['soldiers_level']; ?>
.gif"></td><td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Soldiers:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><b><?php echo $this->_tpl_vars['defenders'][$this->_sections['d']['index']]['soldiers']; ?>
</b></td></tr>
                                                    <tr><td><img width="32" height="32" style="border:1px solid darkred" src="../images/game/icons/army/fighters_<?php echo $this->_tpl_vars['defenders'][$this->_sections['d']['index']]['fighters_level']; ?>
.gif"></td><td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Fighters:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><b><?php echo $this->_tpl_vars['defenders'][$this->_sections['d']['index']]['fighters']; ?>
</b></td></tr>
                                                    <tr><td><img width="32" height="32" style="border:1px solid darkred" src="../images/game/icons/army/stations_<?php echo $this->_tpl_vars['defenders'][$this->_sections['d']['index']]['stations_level']; ?>
.gif"></td><td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Stations:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><b><?php echo $this->_tpl_vars['defenders'][$this->_sections['d']['index']]['stations']; ?>
</b></td></tr>
                                                    <tr><td><img width="32" height="32" style="border:1px solid darkred" src="../images/game/icons/army/lightcruisers_<?php echo $this->_tpl_vars['defenders'][$this->_sections['d']['index']]['lightcruisers_level']; ?>
.gif"></td><td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Light&nbsp;Cruisers:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><b><?php echo $this->_tpl_vars['defenders'][$this->_sections['d']['index']]['lightcruisers']; ?>
</b></td></tr>
                                                    <tr><td><img width="32" height="32" style="border:1px solid darkred" src="../images/game/icons/army/heavycruisers_<?php echo $this->_tpl_vars['defenders'][$this->_sections['d']['index']]['heavycruisers_level']; ?>
.gif"></td><td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Heavy&nbsp;Cruisers:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><b><?php echo $this->_tpl_vars['defenders'][$this->_sections['d']['index']]['heavycruisers']; ?>
</b></td></tr>
                                                    <tr><td><img width="32" height="32" style="border:1px solid darkred" src="../images/game/icons/army/carriers_<?php echo $this->_tpl_vars['defenders'][$this->_sections['d']['index']]['carriers_level']; ?>
.gif"></td><td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Carriers:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><b><?php echo $this->_tpl_vars['defenders'][$this->_sections['d']['index']]['carriers']; ?>
</b></b></td></tr>
                                                </table>
                                                <br/>
                                                <?php endfor; else: ?>
                                                <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>No defenders!<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
                                                <?php endif; ?>

                                            </td>
                                        </tr>
                                    </table>
                                    <br/>
                                    <b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Overall power:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b>
                                    <table width="96%" align="center" style="border:1px solid #cacaca;padding:5px" bgcolor="#4a4a4a">
                                        <tr>
                                            <td width="100"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Unit type<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
                                            <td><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Attackers<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
                                            <td><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Defenders<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
                                            <td><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Balance<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
                                        </tr>
                                        <tr>
                                            <td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Soldiers<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
                                            <td><?php echo $this->_tpl_vars['attackers_soldiers']; ?>
</td>
                                            <td><?php echo $this->_tpl_vars['defenders_soldiers']; ?>
</td>
                                            <td>
                                                <table width="100%" height="24">
                                                    <tr>
                                                        <td bgcolor="red" width="<?php echo $this->_tpl_vars['attackers_soldiers_percent']; ?>
%"><img src="../images/game/placeholder.gif"></td>
                                                        <td bgcolor="darkblue" width="<?php echo $this->_tpl_vars['defenders_soldiers_percent']; ?>
%"><img src="../images/game/placeholder.gif"></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Fighters<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
                                            <td><?php echo $this->_tpl_vars['attackers_fighters']; ?>
</td>
                                            <td><?php echo $this->_tpl_vars['defenders_fighters']; ?>
</td>
                                            <td>
                                                <table width="100%" height="24">
                                                    <tr>
                                                        <td bgcolor="red" width="<?php echo $this->_tpl_vars['attackers_fighters_percent']; ?>
%"><img src="../images/game/placeholder.gif"></td>
                                                        <td bgcolor="darkblue" width="<?php echo $this->_tpl_vars['defenders_fighters_percent']; ?>
%"><img src="../images/game/placeholder.gif"></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Defense Stations<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
                                            <td><?php echo $this->_tpl_vars['attackers_stations']; ?>
</td>
                                            <td><?php echo $this->_tpl_vars['defenders_stations']; ?>
</td>
                                            <td>
                                                <table width="100%" height="24">
                                                    <tr>
                                                        <td bgcolor="red" width="<?php echo $this->_tpl_vars['attackers_stations_percent']; ?>
%"><img src="../images/game/placeholder.gif"></td>
                                                        <td bgcolor="darkblue" width="<?php echo $this->_tpl_vars['defenders_stations_percent']; ?>
%"><img src="../images/game/placeholder.gif"></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Light Cruisers<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
                                            <td><?php echo $this->_tpl_vars['attackers_lightcruisers']; ?>
</td>
                                            <td><?php echo $this->_tpl_vars['defenders_lightcruisers']; ?>
</td>
                                            <td>
                                                <table width="100%" height="24">
                                                    <tr>
                                                        <td bgcolor="red" width="<?php echo $this->_tpl_vars['attackers_lightcruisers_percent']; ?>
%"><img src="../images/game/placeholder.gif"></td>
                                                        <td bgcolor="darkblue" width="<?php echo $this->_tpl_vars['defenders_lightcruisers_percent']; ?>
%"><img src="../images/game/placeholder.gif"></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Heavy Cruisers<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
                                            <td><?php echo $this->_tpl_vars['attackers_heavycruisers']; ?>
</td>
                                            <td><?php echo $this->_tpl_vars['defenders_heavycruisers']; ?>
</td>
                                            <td>
                                                <table width="100%" height="24">
                                                    <tr>
                                                        <td bgcolor="red" width="<?php echo $this->_tpl_vars['attackers_heavycruisers_percent']; ?>
%"><img src="../images/game/placeholder.gif"></td>
                                                        <td bgcolor="darkblue" width="<?php echo $this->_tpl_vars['defenders_heavycruisers_percent']; ?>
%"><img src="../images/game/placeholder.gif"></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <br/>
                                    <br/>
                                </td>
                            </tr>
                        </table>
                        <br/>

                        <table style="border:1px solid red" width="100%">
                            <tr><td bgcolor="darkred"><a class="link" name="assault"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Assault<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></td></tr>
                            <tr>
                                <td bgcolor="#333333">

                                    <table width="100%" cellspacing="1" cellpadding="2">
                                        <tr>
                                            <td><img style="border:1px solid darkred" src="../images/game/space.png"></td>
                                            <td width="100%" bgcolor="#330000"><b style="color:#FF9999">Deep Space Battles</b></td>
                                        </tr>
                                    </table>

                                    <?php unset($this->_sections['sr']);
$this->_sections['sr']['name'] = 'sr';
$this->_sections['sr']['loop'] = is_array($_loop=$this->_tpl_vars['space_rounds']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['sr']['show'] = true;
$this->_sections['sr']['max'] = $this->_sections['sr']['loop'];
$this->_sections['sr']['step'] = 1;
$this->_sections['sr']['start'] = $this->_sections['sr']['step'] > 0 ? 0 : $this->_sections['sr']['loop']-1;
if ($this->_sections['sr']['show']) {
    $this->_sections['sr']['total'] = $this->_sections['sr']['loop'];
    if ($this->_sections['sr']['total'] == 0)
        $this->_sections['sr']['show'] = false;
} else
    $this->_sections['sr']['total'] = 0;
if ($this->_sections['sr']['show']):

            for ($this->_sections['sr']['index'] = $this->_sections['sr']['start'], $this->_sections['sr']['iteration'] = 1;
                 $this->_sections['sr']['iteration'] <= $this->_sections['sr']['total'];
                 $this->_sections['sr']['index'] += $this->_sections['sr']['step'], $this->_sections['sr']['iteration']++):
$this->_sections['sr']['rownum'] = $this->_sections['sr']['iteration'];
$this->_sections['sr']['index_prev'] = $this->_sections['sr']['index'] - $this->_sections['sr']['step'];
$this->_sections['sr']['index_next'] = $this->_sections['sr']['index'] + $this->_sections['sr']['step'];
$this->_sections['sr']['first']      = ($this->_sections['sr']['iteration'] == 1);
$this->_sections['sr']['last']       = ($this->_sections['sr']['iteration'] == $this->_sections['sr']['total']);
?>

                                    <table style="margin:5px" width="100%" bgcolor="darkred" >
                                        <tr>
                                            <td nowrap align="center"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Round<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><br/></b><b style="font-size:22px"><?php echo $this->_tpl_vars['space_rounds'][$this->_sections['sr']['index']]['round']; ?>
</b></td>
                                            <td width="100%">
                                                <table width="100%">
                                                    <tr>
                                                        <td width="50%" valign="top" bgcolor="#220000"><?php echo $this->_tpl_vars['space_rounds'][$this->_sections['sr']['index']]['img_attack']; ?>
</td>
                                                        <td bgcolor="darkred"><b>VS</b></td>
                                                        <td width="50%" valign="top" bgcolor="#000022"><?php echo $this->_tpl_vars['space_rounds'][$this->_sections['sr']['index']]['img_defense']; ?>
</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>

                                    <?php endfor; else: ?>
                                    <b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>No battle!<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b>
                                    <?php endif; ?>
                                    <br/><br/>

                                    <table width="100%" cellspacing="1" cellpadding="2">
                                        <tr>
                                            <td><img style="border:1px solid darkred" src="../images/game/orbital.png"></td>
                                            <td width="100%" bgcolor="#330000"><b style="color:#FF9999"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Orbital Battles<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
                                        </tr>
                                    </table>

                                    <?php unset($this->_sections['or']);
$this->_sections['or']['name'] = 'or';
$this->_sections['or']['loop'] = is_array($_loop=$this->_tpl_vars['orbital_rounds']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['or']['show'] = true;
$this->_sections['or']['max'] = $this->_sections['or']['loop'];
$this->_sections['or']['step'] = 1;
$this->_sections['or']['start'] = $this->_sections['or']['step'] > 0 ? 0 : $this->_sections['or']['loop']-1;
if ($this->_sections['or']['show']) {
    $this->_sections['or']['total'] = $this->_sections['or']['loop'];
    if ($this->_sections['or']['total'] == 0)
        $this->_sections['or']['show'] = false;
} else
    $this->_sections['or']['total'] = 0;
if ($this->_sections['or']['show']):

            for ($this->_sections['or']['index'] = $this->_sections['or']['start'], $this->_sections['or']['iteration'] = 1;
                 $this->_sections['or']['iteration'] <= $this->_sections['or']['total'];
                 $this->_sections['or']['index'] += $this->_sections['or']['step'], $this->_sections['or']['iteration']++):
$this->_sections['or']['rownum'] = $this->_sections['or']['iteration'];
$this->_sections['or']['index_prev'] = $this->_sections['or']['index'] - $this->_sections['or']['step'];
$this->_sections['or']['index_next'] = $this->_sections['or']['index'] + $this->_sections['or']['step'];
$this->_sections['or']['first']      = ($this->_sections['or']['iteration'] == 1);
$this->_sections['or']['last']       = ($this->_sections['or']['iteration'] == $this->_sections['or']['total']);
?>

                                    <table style="margin:5px" width="100%" bgcolor="darkred" >
                                        <tr>
                                            <td nowrap align="center"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Round<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><br/></b><b style="font-size:22px"><?php echo $this->_tpl_vars['orbital_rounds'][$this->_sections['or']['index']]['round']; ?>
</b></td>
                                            <td width="100%">
                                                <table width="100%">
                                                    <tr>
                                                        <td width="50%" valign="top" bgcolor="#220000"><?php echo $this->_tpl_vars['orbital_rounds'][$this->_sections['or']['index']]['img_attack']; ?>
</td>
                                                        <td bgcolor="darkred"><b>VS<b/></td>
                                                        <td width="50%" valign="top" bgcolor="#000022"><?php echo $this->_tpl_vars['orbital_rounds'][$this->_sections['or']['index']]['img_defense']; ?>
</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>

                                    <?php endfor; else: ?>
                                    <b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>No battle!<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b>
                                    <?php endif; ?>

                                    <br/><br/>
                                    <table width="100%" cellspacing="1" cellpadding="2">
                                        <tr>
                                            <td><img style="border:1px solid darkred" src="../images/game/ground.png"></td>
                                            <td width="100%" bgcolor="#330000"><b style="color:#FF9999"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Ground Battles<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
                                        </tr>
                                    </table>

                                    <?php unset($this->_sections['gr']);
$this->_sections['gr']['name'] = 'gr';
$this->_sections['gr']['loop'] = is_array($_loop=$this->_tpl_vars['ground_rounds']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['gr']['show'] = true;
$this->_sections['gr']['max'] = $this->_sections['gr']['loop'];
$this->_sections['gr']['step'] = 1;
$this->_sections['gr']['start'] = $this->_sections['gr']['step'] > 0 ? 0 : $this->_sections['gr']['loop']-1;
if ($this->_sections['gr']['show']) {
    $this->_sections['gr']['total'] = $this->_sections['gr']['loop'];
    if ($this->_sections['gr']['total'] == 0)
        $this->_sections['gr']['show'] = false;
} else
    $this->_sections['gr']['total'] = 0;
if ($this->_sections['gr']['show']):

            for ($this->_sections['gr']['index'] = $this->_sections['gr']['start'], $this->_sections['gr']['iteration'] = 1;
                 $this->_sections['gr']['iteration'] <= $this->_sections['gr']['total'];
                 $this->_sections['gr']['index'] += $this->_sections['gr']['step'], $this->_sections['gr']['iteration']++):
$this->_sections['gr']['rownum'] = $this->_sections['gr']['iteration'];
$this->_sections['gr']['index_prev'] = $this->_sections['gr']['index'] - $this->_sections['gr']['step'];
$this->_sections['gr']['index_next'] = $this->_sections['gr']['index'] + $this->_sections['gr']['step'];
$this->_sections['gr']['first']      = ($this->_sections['gr']['iteration'] == 1);
$this->_sections['gr']['last']       = ($this->_sections['gr']['iteration'] == $this->_sections['gr']['total']);
?>

                                    <table style="margin:5px" width="100%" bgcolor="darkred" >
                                        <tr>
                                            <td nowrap align="center"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Round<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><br/></b><b style="font-size:22px"><?php echo $this->_tpl_vars['ground_rounds'][$this->_sections['gr']['index']]['round']; ?>
</b></td>
                                            <td width="100%">
                                                <table width="100%">
                                                    <tr>
                                                        <td width="50%" valign="top" bgcolor="#220000"><?php echo $this->_tpl_vars['ground_rounds'][$this->_sections['gr']['index']]['img_attack']; ?>
</td>
                                                        <td bgcolor="darkred"><b>VS</b></td>
                                                        <td width="50%" valign="top" bgcolor="#000022"><?php echo $this->_tpl_vars['ground_rounds'][$this->_sections['gr']['index']]['img_defense']; ?>
</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>

                                    <?php endfor; else: ?>
                                    <b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>No battle!<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b>
                                    <?php endif; ?>

                                    <br/><br/>
                                </td>
                            </tr>
                        </table>
                        <br/>

                        <table style="border:1px solid red" width="100%">
                            <tr><td bgcolor="darkred"><a class="link" name="after_attack"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>After attack<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></td></tr>
                            <tr>
                                <td bgcolor="#333333">

                                    <table width="100%">
                                        <tr>
                                            <td valign="top">
                                                <b>Attackers side:</b><br/>
                                                <?php unset($this->_sections['a2']);
$this->_sections['a2']['name'] = 'a2';
$this->_sections['a2']['loop'] = is_array($_loop=$this->_tpl_vars['attackers2']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['a2']['show'] = true;
$this->_sections['a2']['max'] = $this->_sections['a2']['loop'];
$this->_sections['a2']['step'] = 1;
$this->_sections['a2']['start'] = $this->_sections['a2']['step'] > 0 ? 0 : $this->_sections['a2']['loop']-1;
if ($this->_sections['a2']['show']) {
    $this->_sections['a2']['total'] = $this->_sections['a2']['loop'];
    if ($this->_sections['a2']['total'] == 0)
        $this->_sections['a2']['show'] = false;
} else
    $this->_sections['a2']['total'] = 0;
if ($this->_sections['a2']['show']):

            for ($this->_sections['a2']['index'] = $this->_sections['a2']['start'], $this->_sections['a2']['iteration'] = 1;
                 $this->_sections['a2']['iteration'] <= $this->_sections['a2']['total'];
                 $this->_sections['a2']['index'] += $this->_sections['a2']['step'], $this->_sections['a2']['iteration']++):
$this->_sections['a2']['rownum'] = $this->_sections['a2']['iteration'];
$this->_sections['a2']['index_prev'] = $this->_sections['a2']['index'] - $this->_sections['a2']['step'];
$this->_sections['a2']['index_next'] = $this->_sections['a2']['index'] + $this->_sections['a2']['step'];
$this->_sections['a2']['first']      = ($this->_sections['a2']['iteration'] == 1);
$this->_sections['a2']['last']       = ($this->_sections['a2']['iteration'] == $this->_sections['a2']['total']);
?>

                                                <table bgcolor="#4a4a4a" style="border:1px solid #cacaca;padding:5px" cellspacing="0" cellpadding="2" width="330px">
                                                    <tr><td nowrap><img width="32" height="32" style="border:1px solid darkred" src="../images/game/empires/<?php echo $this->_tpl_vars['attackers2'][$this->_sections['a2']['index']]['game_id']; ?>
/<?php echo $this->_tpl_vars['attackers2'][$this->_sections['a2']['index']]['empire_id']; ?>
.jpg"></td><td nowrap><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Empire:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td width="100%"><b><?php echo $this->_tpl_vars['attackers2'][$this->_sections['a2']['index']]['empire_name']; ?>
</b></td></tr>
                                                    <tr><td><img width="32" height="32" style="border:1px solid darkred" src="../images/game/icons/army/soldiers_<?php echo $this->_tpl_vars['attackers2'][$this->_sections['a2']['index']]['soldiers_level']; ?>
.gif"></td><td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Soldiers:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><b><?php echo $this->_tpl_vars['attackers2'][$this->_sections['a2']['index']]['soldiers2']; ?>
 / <?php echo $this->_tpl_vars['attackers2'][$this->_sections['a2']['index']]['soldiers']; ?>
 </b><b style="color:#FF9999">(-<?php echo $this->_tpl_vars['attackers2'][$this->_sections['a2']['index']]['casualties_soldiers']; ?>
)</b></td></tr>
                                                    <tr><td><img width="32" height="32" style="border:1px solid darkred" src="../images/game/icons/army/fighters_<?php echo $this->_tpl_vars['attackers2'][$this->_sections['a2']['index']]['fighters_level']; ?>
.gif"></td><td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Fighters:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><b><?php echo $this->_tpl_vars['attackers2'][$this->_sections['a2']['index']]['fighters2']; ?>
 / <?php echo $this->_tpl_vars['attackers2'][$this->_sections['a2']['index']]['fighters']; ?>
 </b><b style="color:#FF9999">(-<?php echo $this->_tpl_vars['attackers2'][$this->_sections['a2']['index']]['casualties_fighters']; ?>
)</b></td></tr>
                                                    <tr><td><img width="32" height="32" style="border:1px solid darkred" src="../images/game/icons/army/lightcruisers_<?php echo $this->_tpl_vars['attackers2'][$this->_sections['a2']['index']]['lightcruisers_level']; ?>
.gif"></td><td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Light&nbsp;Cruisers:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><b><?php echo $this->_tpl_vars['attackers2'][$this->_sections['a2']['index']]['lightcruisers2']; ?>
 / <?php echo $this->_tpl_vars['attackers2'][$this->_sections['a2']['index']]['lightcruisers']; ?>
 </b><b style="color:#FF9999">(-<?php echo $this->_tpl_vars['attackers2'][$this->_sections['a2']['index']]['casualties_lightcruisers']; ?>
)</b></td></tr>
                                                    <tr><td><img width="32" height="32" style="border:1px solid darkred" src="../images/game/icons/army/heavycruisers_<?php echo $this->_tpl_vars['attackers2'][$this->_sections['a2']['index']]['heavycruisers_level']; ?>
.gif"></td><td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Heavy&nbsp;Cruisers:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><b><?php echo $this->_tpl_vars['attackers2'][$this->_sections['a2']['index']]['heavycruisers2']; ?>
 / <?php echo $this->_tpl_vars['attackers2'][$this->_sections['a2']['index']]['heavycruisers']; ?>
 </b><b style="color:#FF9999">(-<?php echo $this->_tpl_vars['attackers2'][$this->_sections['a2']['index']]['casualties_heavycruisers']; ?>
)</b></td></tr>
                                                    <tr><td><img width="32" height="32" style="border:1px solid darkred" src="../images/game/icons/army/carriers_<?php echo $this->_tpl_vars['attackers2'][$this->_sections['a2']['index']]['carriers_level']; ?>
.gif"></td><td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Carriers:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><b><?php echo $this->_tpl_vars['attackers2'][$this->_sections['a2']['index']]['carriers2']; ?>
 / <?php echo $this->_tpl_vars['attackers2'][$this->_sections['a2']['index']]['carriers']; ?>
 </b><b style="color:#FF9999">(-<?php echo $this->_tpl_vars['attackers2'][$this->_sections['a2']['index']]['casualties_carriers']; ?>
)</b></td></tr>
                                                </table>
                                                <br/>
                                                <?php endfor; else: ?>
                                                <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>No attackers!<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
                                                <?php endif; ?>

                                            </td>
                                            <td valign="top">
                                                <b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Defenders side:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b><br/>
                                                <?php unset($this->_sections['d2']);
$this->_sections['d2']['name'] = 'd2';
$this->_sections['d2']['loop'] = is_array($_loop=$this->_tpl_vars['defenders2']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['d2']['show'] = true;
$this->_sections['d2']['max'] = $this->_sections['d2']['loop'];
$this->_sections['d2']['step'] = 1;
$this->_sections['d2']['start'] = $this->_sections['d2']['step'] > 0 ? 0 : $this->_sections['d2']['loop']-1;
if ($this->_sections['d2']['show']) {
    $this->_sections['d2']['total'] = $this->_sections['d2']['loop'];
    if ($this->_sections['d2']['total'] == 0)
        $this->_sections['d2']['show'] = false;
} else
    $this->_sections['d2']['total'] = 0;
if ($this->_sections['d2']['show']):

            for ($this->_sections['d2']['index'] = $this->_sections['d2']['start'], $this->_sections['d2']['iteration'] = 1;
                 $this->_sections['d2']['iteration'] <= $this->_sections['d2']['total'];
                 $this->_sections['d2']['index'] += $this->_sections['d2']['step'], $this->_sections['d2']['iteration']++):
$this->_sections['d2']['rownum'] = $this->_sections['d2']['iteration'];
$this->_sections['d2']['index_prev'] = $this->_sections['d2']['index'] - $this->_sections['d2']['step'];
$this->_sections['d2']['index_next'] = $this->_sections['d2']['index'] + $this->_sections['d2']['step'];
$this->_sections['d2']['first']      = ($this->_sections['d2']['iteration'] == 1);
$this->_sections['d2']['last']       = ($this->_sections['d2']['iteration'] == $this->_sections['d2']['total']);
?>

                                                <table bgcolor="#4a4a4a" style="border:1px solid #cacaca;padding:5px" cellspacing="0" cellpadding="2" width="330px">
                                                    <tr><td nowrap><img width="32" height="32" style="border:1px solid darkred" src="../images/game/empires/<?php echo $this->_tpl_vars['defenders2'][$this->_sections['d2']['index']]['game_id']; ?>
/<?php echo $this->_tpl_vars['defenders2'][$this->_sections['d2']['index']]['empire_id']; ?>
.jpg"></td><td nowrap><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Empire:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td width="100%"><b><?php echo $this->_tpl_vars['defenders2'][$this->_sections['d2']['index']]['empire_name']; ?>
</b></td></tr>
                                                    <tr><td><img width="32" height="32" style="border:1px solid darkred" src="../images/game/icons/army/soldiers_<?php echo $this->_tpl_vars['defenders2'][$this->_sections['d2']['index']]['soldiers_level']; ?>
.gif"></td><td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Soldiers:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><b><?php echo $this->_tpl_vars['defenders2'][$this->_sections['d2']['index']]['soldiers2']; ?>
 / <?php echo $this->_tpl_vars['defenders2'][$this->_sections['d2']['index']]['soldiers']; ?>
 </b><b style="color:#FF9999">(-<?php echo $this->_tpl_vars['defenders2'][$this->_sections['d2']['index']]['casualties_soldiers']; ?>
)</b></td></tr>
                                                    <tr><td><img width="32" height="32" style="border:1px solid darkred" src="../images/game/icons/army/fighters_<?php echo $this->_tpl_vars['defenders2'][$this->_sections['d2']['index']]['fighters_level']; ?>
.gif"></td><td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Fighters:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><b><?php echo $this->_tpl_vars['defenders2'][$this->_sections['d2']['index']]['fighters2']; ?>
 / <?php echo $this->_tpl_vars['defenders2'][$this->_sections['d2']['index']]['fighters']; ?>
 </b><b style="color:#FF9999">(-<?php echo $this->_tpl_vars['defenders2'][$this->_sections['d2']['index']]['casualties_fighters']; ?>
)</b></td></tr>
                                                    <tr><td><img width="32" height="32" style="border:1px solid darkred" src="../images/game/icons/army/stations_<?php echo $this->_tpl_vars['defenders2'][$this->_sections['d2']['index']]['stations_level']; ?>
.gif"></td><td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Stations:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><b><?php echo $this->_tpl_vars['defenders2'][$this->_sections['d2']['index']]['stations2']; ?>
 / <?php echo $this->_tpl_vars['defenders2'][$this->_sections['d2']['index']]['stations']; ?>
 </b><b style="color:#FF9999">(-<?php echo $this->_tpl_vars['defenders2'][$this->_sections['d2']['index']]['casualties_stations']; ?>
)</b></td></tr>
                                                    <tr><td><img width="32" height="32" style="border:1px solid darkred" src="../images/game/icons/army/lightcruisers_<?php echo $this->_tpl_vars['defenders2'][$this->_sections['d2']['index']]['lightcruisers_level']; ?>
.gif"></td><td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Light&nbsp;Cruisers:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><b><?php echo $this->_tpl_vars['defenders2'][$this->_sections['d2']['index']]['lightcruisers2']; ?>
 / <?php echo $this->_tpl_vars['defenders2'][$this->_sections['d2']['index']]['lightcruisers']; ?>
 </b><b style="color:#FF9999">(-<?php echo $this->_tpl_vars['defenders2'][$this->_sections['d2']['index']]['casualties_lightcruisers']; ?>
)</b></td></tr>
                                                    <tr><td><img width="32" height="32" style="border:1px solid darkred" src="../images/game/icons/army/heavycruisers_<?php echo $this->_tpl_vars['defenders2'][$this->_sections['d2']['index']]['heavycruisers_level']; ?>
.gif"></td><td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Heavy&nbsp;Cruisers:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><b><?php echo $this->_tpl_vars['defenders2'][$this->_sections['d2']['index']]['heavycruisers2']; ?>
 / <?php echo $this->_tpl_vars['defenders2'][$this->_sections['d2']['index']]['heavycruisers']; ?>
 </b><b style="color:#FF9999">(-<?php echo $this->_tpl_vars['defenders2'][$this->_sections['d2']['index']]['casualties_heavycruisers']; ?>
)</b></td></tr>
                                                    <tr><td><img width="32" height="32" style="border:1px solid darkred" src="../images/game/icons/army/carriers_<?php echo $this->_tpl_vars['defenders2'][$this->_sections['d2']['index']]['carriers_level']; ?>
.gif"></td><td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Carriers:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><b><?php echo $this->_tpl_vars['defenders2'][$this->_sections['d2']['index']]['carriers2']; ?>
 / <?php echo $this->_tpl_vars['defenders2'][$this->_sections['d2']['index']]['carriers']; ?>
 </b></td></tr>
                                                </table>
                                                <br/>

                                                <?php endfor; else: ?>
                                                <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>No defenders!<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    </table>


                                    <table>
                                        <?php if ($this->_tpl_vars['invasion_won'] == false): ?>
                                        <tr>
                                            <td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Outcome:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
                                            <td><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Invasion failed!<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
                                        </tr>
	<?php else: ?>
                                        <tr>
                                            <td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Outcome:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
                                            <td><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Invasion won!<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
                                        </tr>

                                        <tr>
                                            <td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Food planets taken:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><b><?php echo $this->_tpl_vars['outcome_lost_food_planets']; ?>
</b></td>
                                        </tr>
                                        <tr>
                                            <td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Ore planets taken:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><b><?php echo $this->_tpl_vars['outcome_lost_ore_planets']; ?>
</b></td>
                                        </tr>
                                        <tr>
                                            <td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Tourism planets taken:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><b><?php echo $this->_tpl_vars['outcome_lost_tourism_planets']; ?>
</b></td>
                                        </tr>
                                        <tr>
                                            <td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Supply planets taken:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><b><?php echo $this->_tpl_vars['outcome_lost_supply_planets']; ?>
</b></td>
                                        </tr>
                                        <tr>
                                            <td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Gov. planets taken:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><b><?php echo $this->_tpl_vars['outcome_lost_gov_planets']; ?>
</b></td>
                                        </tr>
                                        <tr>
                                            <td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Education planets taken:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><b><?php echo $this->_tpl_vars['outcome_lost_edu_planets']; ?>
</b></td>
                                        </tr>
                                        <tr>
                                            <td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Urban planets taken:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><b><?php echo $this->_tpl_vars['outcome_lost_urban_planets']; ?>
</b></td>
                                        </tr>
                                        <tr>
                                            <td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Research planets taken:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><b><?php echo $this->_tpl_vars['outcome_lost_research_planets']; ?>
</b></td>
                                        </tr>
                                        <tr>
                                            <td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Petroleum planets taken:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><b><?php echo $this->_tpl_vars['outcome_lost_petro_planets']; ?>
</b></td>
                                        </tr>
                                        <tr>
                                            <td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Anti-pollu. planets taken:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><b><?php echo $this->_tpl_vars['outcome_lost_antipollu_planets']; ?>
</b></td>
                                        </tr>
                                        <tr>
                                            <td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Population killed:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><b><?php echo $this->_tpl_vars['outcome_lost_population']; ?>
</b></td>
                                        </tr>
                                        <tr>
                                            <td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Credits stolen:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><b><?php echo $this->_tpl_vars['outcome_lost_credits']; ?>
</b></td>
                                        </tr>
                                        <?php endif; ?>
                                    </table>


                                </td>
                            </tr>
                        </table>
                        <br/>



                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
