<?php /* Smarty version 2.6.19, created on 2009-09-13 00:38:14
         compiled from scoreboard.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'scoreboard.html', 4, false),array('modifier', 'number_format', 'scoreboard.html', 110, false),)), $this); ?>
<table width="720px"  align="center" bgcolor="#333333" background="../images/game/background1.jpg"  style="border:1px solid darkred">
    <tr>
        <td width="100%" align="center">
            <b style="color:#cacaca"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Scoreboard<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b> |
            <a  class="link" href="#" onclick="open_page('hall_of_fame.php')"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Hall Of Fame<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a>
        </td>
    </tr>
</table>

<br/>
<table cellpadding="1" cellspacing="0" border="0" bgcolor="darkred"
       width="720" align="center">
    <tr>
        <td background="../images/game/header.jpg"><b>&nbsp;<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Top Players<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
    </tr>
    <tr>
        <td>
            <table background="../images/game/background1.jpg" style="font-size:11pt;"
                   bgcolor="#333333" width="100%" cellspacing="0" cellpadding="3"
                   border="0" align="center">
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td align="right" style="color:#cacaca"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Current Galaxy Master:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
                    <td><b><?php echo $this->_tpl_vars['galaxy_master']; ?>
</b></td>
                </tr>
                <tr>
                    <td align="right" style="color:#cacaca"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Current Planets Master:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
                    </td>
                    <td><b><?php echo $this->_tpl_vars['planets_master']; ?>
</b></td>
                </tr>
                <tr>
                    <td align="right" style="color:#cacaca"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Current Galactic	Warlord:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
                    <?php if ($this->_tpl_vars['galactic_warlord'] == ''): ?>
                    <td><b>---</b></td>
                    <?php else: ?>
                    <td><b><?php echo $this->_tpl_vars['galactic_warlord']; ?>
</b></td>
                    <?php endif; ?>
                </tr>
                <tr>
                    <td align="right" style="color:#cacaca"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Current Technology Master:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
                    <td><b><?php echo $this->_tpl_vars['tech_master']; ?>
</b></td>
                </tr>
                <tr>
                    <td align="right" style="color:#cacaca"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Current Population Zealot:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
                    <td><b><?php echo $this->_tpl_vars['pop_zealot']; ?>
</b></td>
                </tr>
                <tr>
                    <td align="right" style="color:#cacaca"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Current Food Master:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
                    <td><b><?php echo $this->_tpl_vars['food_master']; ?>
</b></td>
                </tr>
                <tr>
                    <td align="right" style="color:#cacaca"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Current Credits Overlord:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
                    <td><b><?php echo $this->_tpl_vars['credits_overlord']; ?>
</b></td>
                </tr>
                <tr>
                    <td></td>
                </tr>

            </table>
        </td>
    </tr>
</table>


<br />
<br />


<table cellpadding="1" align="center" cellspacing="0" border="0" bgcolor="darkred"
       width="720">
    <tr>
        <td background="../images/game/header.jpg"><b>&nbsp;<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Coalitions score<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b><br/>
        </td>
    </tr>
    <tr>
        <td>
            <table background="../images/game/background1.jpg"
                   style="font-size:10pt;color:white" bgcolor="#333333" width="720"
                   cellspacing="1" cellpadding="5" border="0" align="center">
                <tr>
                    <td align="left" width="40"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Rank<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
                    <td align="left" width="100%"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Name<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
                    <td align="left" width="100"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Members<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
                    <td align="left" width="200"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Planets<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
                    <td align="left" nowrap><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Net Worth<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
                </tr>

			<?php unset($this->_sections['ct']);
$this->_sections['ct']['name'] = 'ct';
$this->_sections['ct']['loop'] = is_array($_loop=$this->_tpl_vars['coalition_toplist']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['ct']['show'] = true;
$this->_sections['ct']['max'] = $this->_sections['ct']['loop'];
$this->_sections['ct']['step'] = 1;
$this->_sections['ct']['start'] = $this->_sections['ct']['step'] > 0 ? 0 : $this->_sections['ct']['loop']-1;
if ($this->_sections['ct']['show']) {
    $this->_sections['ct']['total'] = $this->_sections['ct']['loop'];
    if ($this->_sections['ct']['total'] == 0)
        $this->_sections['ct']['show'] = false;
} else
    $this->_sections['ct']['total'] = 0;
if ($this->_sections['ct']['show']):

            for ($this->_sections['ct']['index'] = $this->_sections['ct']['start'], $this->_sections['ct']['iteration'] = 1;
                 $this->_sections['ct']['iteration'] <= $this->_sections['ct']['total'];
                 $this->_sections['ct']['index'] += $this->_sections['ct']['step'], $this->_sections['ct']['iteration']++):
$this->_sections['ct']['rownum'] = $this->_sections['ct']['iteration'];
$this->_sections['ct']['index_prev'] = $this->_sections['ct']['index'] - $this->_sections['ct']['step'];
$this->_sections['ct']['index_next'] = $this->_sections['ct']['index'] + $this->_sections['ct']['step'];
$this->_sections['ct']['first']      = ($this->_sections['ct']['iteration'] == 1);
$this->_sections['ct']['last']       = ($this->_sections['ct']['iteration'] == $this->_sections['ct']['total']);
?>
                <tr>
                    <td background="<?php echo $this->_tpl_vars['coalition_toplist'][$this->_sections['ct']['index']]['background']; ?>
" align="right"
                        bgcolor="<?php echo $this->_tpl_vars['coalition_toplist'][$this->_sections['ct']['index']]['bgcolor']; ?>
" style="color:yellow"><b><?php echo $this->_tpl_vars['coalition_toplist'][$this->_sections['ct']['index']]['rank']; ?>
</b></td>
                    <td background="<?php echo $this->_tpl_vars['coalition_toplist'][$this->_sections['ct']['index']]['background']; ?>
"
                        bgcolor="<?php echo $this->_tpl_vars['coalition_toplist'][$this->_sections['ct']['index']]['bgcolor']; ?>
">
                        <table cellspacing="0" cellpadding="2" border="0">
                            <tr>
                                <td>
                                    <a  href="javascript:show_coalition(<?php echo $this->_tpl_vars['coalition_toplist'][$this->_sections['ct']['index']]['id']; ?>
)"
                                        style="text-decoration:none;color:<?php echo $this->_tpl_vars['coalition_toplist'][$this->_sections['ct']['index']]['color']; ?>
">
                                        <img src="<?php echo $this->_tpl_vars['coalition_toplist'][$this->_sections['ct']['index']]['img_logo']; ?>
" width="32" height="32" border="1" bordercolor="yellow" style="color:yellow">
                                    </a></td>
                                <td><b style="font-size:10pt;color:#333333;"><?php echo $this->_tpl_vars['coalition_toplist'][$this->_sections['ct']['index']]['name']; ?>
</a></b></td>
                            </tr>
                        </table>
                    </td>
                    <td background="<?php echo $this->_tpl_vars['coalition_toplist'][$this->_sections['ct']['index']]['background']; ?>
" align="right"
                        bgcolor="<?php echo $this->_tpl_vars['coalition_toplist'][$this->_sections['ct']['index']]['bgcolor']; ?>
" style="color:black"><b><?php echo $this->_tpl_vars['coalition_toplist'][$this->_sections['ct']['index']]['members']; ?>
</b></td>
                    <td background="<?php echo $this->_tpl_vars['coalition_toplist'][$this->_sections['ct']['index']]['background']; ?>
" align="right"
                        bgcolor="<?php echo $this->_tpl_vars['coalition_toplist'][$this->_sections['ct']['index']]['bgcolor']; ?>
" style="color:black"><b><?php echo ((is_array($_tmp=$this->_tpl_vars['coalition_toplist'][$this->_sections['ct']['index']]['planets_count'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</b></td>
                    <td background="<?php echo $this->_tpl_vars['coalition_toplist'][$this->_sections['ct']['index']]['background']; ?>
" align="right"
                        bgcolor="<?php echo $this->_tpl_vars['coalition_toplist'][$this->_sections['ct']['index']]['bgcolor']; ?>
" style="color:black"><b><?php echo ((is_array($_tmp=$this->_tpl_vars['coalition_toplist'][$this->_sections['ct']['index']]['networth'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</b></td>

                </tr>
			<?php endfor; else: ?>
                <tr>
                    <td bgcolor="#333333" colspan="5"><b style="color:yellow"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>No coalitions<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
                </tr>
			<?php endif; ?>


            </table>
        </td>
    </tr>
</table>



<br />
<br />


<table cellpadding="1" align="center" cellspacing="0" border="0" bgcolor="darkred"
       width="720">
    <tr>
        <td background="../images/game/header.jpg"><b>&nbsp;<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Players score<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b><br/>
        </td>
    </tr>
    <tr>
        <td>
            <table background="../images/game/background1.jpg"
                   style="font-size:10pt;color:white" bgcolor="#333333" width="720"
                   cellspacing="1" cellpadding="5" border="0" align="center">
                <tr>
                    <td align="left" width="40"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Rank<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
                    <td align="left" width="100%"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Empire<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
                    <td align="left" width="200"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Planets<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
                    <td align="left" nowrap><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Net Worth<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
                </tr>

			<?php unset($this->_sections['tl']);
$this->_sections['tl']['name'] = 'tl';
$this->_sections['tl']['loop'] = is_array($_loop=$this->_tpl_vars['toplist']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['tl']['show'] = true;
$this->_sections['tl']['max'] = $this->_sections['tl']['loop'];
$this->_sections['tl']['step'] = 1;
$this->_sections['tl']['start'] = $this->_sections['tl']['step'] > 0 ? 0 : $this->_sections['tl']['loop']-1;
if ($this->_sections['tl']['show']) {
    $this->_sections['tl']['total'] = $this->_sections['tl']['loop'];
    if ($this->_sections['tl']['total'] == 0)
        $this->_sections['tl']['show'] = false;
} else
    $this->_sections['tl']['total'] = 0;
if ($this->_sections['tl']['show']):

            for ($this->_sections['tl']['index'] = $this->_sections['tl']['start'], $this->_sections['tl']['iteration'] = 1;
                 $this->_sections['tl']['iteration'] <= $this->_sections['tl']['total'];
                 $this->_sections['tl']['index'] += $this->_sections['tl']['step'], $this->_sections['tl']['iteration']++):
$this->_sections['tl']['rownum'] = $this->_sections['tl']['iteration'];
$this->_sections['tl']['index_prev'] = $this->_sections['tl']['index'] - $this->_sections['tl']['step'];
$this->_sections['tl']['index_next'] = $this->_sections['tl']['index'] + $this->_sections['tl']['step'];
$this->_sections['tl']['first']      = ($this->_sections['tl']['iteration'] == 1);
$this->_sections['tl']['last']       = ($this->_sections['tl']['iteration'] == $this->_sections['tl']['total']);
?>
                <tr>
                    <td background="<?php echo $this->_tpl_vars['toplist'][$this->_sections['tl']['index']]['background']; ?>
" align="right"
                        bgcolor="<?php echo $this->_tpl_vars['toplist'][$this->_sections['tl']['index']]['bgcolor']; ?>
" style="color:yellow"><b><?php echo $this->_tpl_vars['toplist'][$this->_sections['tl']['index']]['rank']; ?>
</b></td>
                    <td background="<?php echo $this->_tpl_vars['toplist'][$this->_sections['tl']['index']]['background']; ?>
" bgcolor="<?php echo $this->_tpl_vars['toplist'][$this->_sections['tl']['index']]['bgcolor']; ?>
">
                        <table cellspacing="0" cellpadding="1" border="0">
                            <tr>
                                <td><a href="javascript:show_info(<?php echo $this->_tpl_vars['toplist'][$this->_sections['tl']['index']]['id']; ?>
)"
                                       style="text-decoration:none;color:<?php echo $this->_tpl_vars['toplist'][$this->_sections['tl']['index']]['color']; ?>
"><img
                                            src="<?php echo $this->_tpl_vars['toplist'][$this->_sections['tl']['index']]['img_logo']; ?>
" width="32" height="32" border="1"
                                            bordercolor="yellow" style="border-color:yellow"></a></td>
                                        <td><b style="font-size:10pt;color:#333333;"><?php echo $this->_tpl_vars['toplist'][$this->_sections['tl']['index']]['name']; ?>
</b></a></td>
                            </tr>
                        </table>
                    </td>
                    <td background="<?php echo $this->_tpl_vars['toplist'][$this->_sections['tl']['index']]['background']; ?>
" align="right"
                        bgcolor="<?php echo $this->_tpl_vars['toplist'][$this->_sections['tl']['index']]['bgcolor']; ?>
" style="color:black"><b><?php echo ((is_array($_tmp=$this->_tpl_vars['toplist'][$this->_sections['tl']['index']]['planets_count'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</b></td>
                    <td background="<?php echo $this->_tpl_vars['toplist'][$this->_sections['tl']['index']]['background']; ?>
" align="right"
                        bgcolor="<?php echo $this->_tpl_vars['toplist'][$this->_sections['tl']['index']]['bgcolor']; ?>
" style="color:black"><b><?php echo ((is_array($_tmp=$this->_tpl_vars['toplist'][$this->_sections['tl']['index']]['networth'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</b></td>

                </tr>

			<?php endfor; endif; ?>

            </table>
        </td>
    </tr>
</table>



<br />
<br />