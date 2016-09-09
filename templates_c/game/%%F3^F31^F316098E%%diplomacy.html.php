<?php /* Smarty version 2.6.19, created on 2009-10-12 20:49:46
         compiled from diplomacy.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'diplomacy.html', 4, false),)), $this); ?>
<table  cellspacing="0" cellpadding="0" border="0">
    <tr>
        <td nowrap><img src="../images/game/tab2_left.gif" border="0"></td>
        <td nowrap bgcolor="#666666" style="padding:0px 5px 0px 5px"><a  class="link" href="#" onclick="open_page('messages.php')"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Messages<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></td>
        <td><img src="../images/game/tab2_right.gif" border="0"></td>

        <td nowrap><img src="../images/game/tab_left.gif" border="0"></td>
        <td nowrap bgcolor="darkred"  style="padding:0px 5px 0px 5px"><a  style="text-decoration:none;color:white" href="#" onclick="open_page('diplomacy.php')"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Diplomatic Ties<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></td>
        <td><img src="../images/game/tab_right.gif" border="0"></td>

        <td nowrap><img src="../images/game/tab2_left.gif" border="0"></td>
        <td nowrap bgcolor="#666666"  style="padding:0px 5px 0px 5px"><a  class="link" href="#" onclick="open_page('shoutbox.php')"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Coalition Shoutbox<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></td>
        <td><img src="../images/game/tab2_right.gif" border="0"></td>
    </tr>
</table>



<table cellpadding="5" cellspacing="0" style="border:1px solid darkred" background="../images/game/background1.jpg" width="780">
    <tr>
        <td><b>&nbsp;<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Active Diplomatic Treaties<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
    </tr>
    <tr>
        <td>
            <table  bgcolor="#333333" width="100%"
                    cellspacing="1" cellpadding="5" border="0" align="center"
                    >
                <tr>
                    <td align="left" width="220"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Empire<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
                    <td align="left" width="100"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Treaty<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
                    <td align="left"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Date<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
                    <td align="left"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Status<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
                    <td align="left"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Action<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
                </tr>

			<?php unset($this->_sections['l']);
$this->_sections['l']['name'] = 'l';
$this->_sections['l']['loop'] = is_array($_loop=$this->_tpl_vars['listing']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['l']['show'] = true;
$this->_sections['l']['max'] = $this->_sections['l']['loop'];
$this->_sections['l']['step'] = 1;
$this->_sections['l']['start'] = $this->_sections['l']['step'] > 0 ? 0 : $this->_sections['l']['loop']-1;
if ($this->_sections['l']['show']) {
    $this->_sections['l']['total'] = $this->_sections['l']['loop'];
    if ($this->_sections['l']['total'] == 0)
        $this->_sections['l']['show'] = false;
} else
    $this->_sections['l']['total'] = 0;
if ($this->_sections['l']['show']):

            for ($this->_sections['l']['index'] = $this->_sections['l']['start'], $this->_sections['l']['iteration'] = 1;
                 $this->_sections['l']['iteration'] <= $this->_sections['l']['total'];
                 $this->_sections['l']['index'] += $this->_sections['l']['step'], $this->_sections['l']['iteration']++):
$this->_sections['l']['rownum'] = $this->_sections['l']['iteration'];
$this->_sections['l']['index_prev'] = $this->_sections['l']['index'] - $this->_sections['l']['step'];
$this->_sections['l']['index_next'] = $this->_sections['l']['index'] + $this->_sections['l']['step'];
$this->_sections['l']['first']      = ($this->_sections['l']['iteration'] == 1);
$this->_sections['l']['last']       = ($this->_sections['l']['iteration'] == $this->_sections['l']['total']);
?>
                <tr>
                    <td background="<?php echo $this->_tpl_vars['listing'][$this->_sections['l']['index']]['background']; ?>
" align="left"
                        bgcolor="<?php echo $this->_tpl_vars['listing'][$this->_sections['l']['index']]['bgcolor']; ?>
" style="color:yellow"><b><a
                                href="javascript:show_info(<?php echo $this->_tpl_vars['listing'][$this->_sections['l']['index']]['empire_id']; ?>
)"
                                style="text-decoration:none;color:black"><?php echo $this->_tpl_vars['listing'][$this->_sections['l']['index']]['empire']; ?>
</a></b></td>
                    <td background="<?php echo $this->_tpl_vars['listing'][$this->_sections['l']['index']]['background']; ?>
" bgcolor="<?php echo $this->_tpl_vars['listing'][$this->_sections['l']['index']]['bgcolor']; ?>
"
                        style="color:#333333"><b><?php echo $this->_tpl_vars['listing'][$this->_sections['l']['index']]['treaty']; ?>
</a></b></td>
                    <td background="<?php echo $this->_tpl_vars['listing'][$this->_sections['l']['index']]['background']; ?>
" align="left"
                        bgcolor="<?php echo $this->_tpl_vars['listing'][$this->_sections['l']['index']]['bgcolor']; ?>
" style="color:#333333"><b><?php echo $this->_tpl_vars['listing'][$this->_sections['l']['index']]['date']; ?>
</b></td>
                    <td background="<?php echo $this->_tpl_vars['listing'][$this->_sections['l']['index']]['background']; ?>
" align="left"
                        bgcolor="<?php echo $this->_tpl_vars['listing'][$this->_sections['l']['index']]['bgcolor']; ?>
" style="color:#333333"><b><?php echo $this->_tpl_vars['listing'][$this->_sections['l']['index']]['status']; ?>
</b></td>
                    <td background="<?php echo $this->_tpl_vars['listing'][$this->_sections['l']['index']]['background']; ?>
" align="left"
                        bgcolor="<?php echo $this->_tpl_vars['listing'][$this->_sections['l']['index']]['bgcolor']; ?>
" style="color:#cacaca"><b><a
                                onClick="if (!confirm('<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Are you sure?<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>')) return false; else open_page('diplomacy.php?break=<?php echo $this->_tpl_vars['listing'][$this->_sections['l']['index']]['id']; ?>
');"
                                href="#" class="link"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Break<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></b></td>

                </tr>
			<?php endfor; else: ?>
                <tr>
                    <td colspan="5" bgcolor="#666666" style="color:#ffcaca"><b>No
				active treaty</b></td>
                </tr>
			<?php endif; ?>
            </table>
        </td>
    </tr>
</table>

<br />
<form method="post" action="#" onsubmit="ajax_submit_form('diplomacy.php',this); return false;">

    <table cellpadding="1" cellspacing="0" border="0" bgcolor="darkred"
           width="780">
        <tr>
            <td background="../images/game/header.jpg">
                <b>&nbsp;Send
		diplomatic proposal</b></td>
        </tr>
        <tr>
            <td>
                <table style="font-size:11pt;" bgcolor="#333333" width="100%"
                       cellspacing="5" cellpadding="0" border="0" align="center"
                       background="../images/game/background1.jpg">
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Empire:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
                        <td><b style="color:#ffcaca"> <select name="empire"
                                                              class="select_box" style="width:400px">
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
                                </select> </b></td>
                    </tr>

                    <tr>
                        <td align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Treaty:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
                        <td><b style="color:#ffcaca"> <select name="treaty"
                                                              style="width:200px" class="select_box">
					<?php unset($this->_sections['t']);
$this->_sections['t']['name'] = 't';
$this->_sections['t']['loop'] = is_array($_loop=$this->_tpl_vars['treaties']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['t']['show'] = true;
$this->_sections['t']['max'] = $this->_sections['t']['loop'];
$this->_sections['t']['step'] = 1;
$this->_sections['t']['start'] = $this->_sections['t']['step'] > 0 ? 0 : $this->_sections['t']['loop']-1;
if ($this->_sections['t']['show']) {
    $this->_sections['t']['total'] = $this->_sections['t']['loop'];
    if ($this->_sections['t']['total'] == 0)
        $this->_sections['t']['show'] = false;
} else
    $this->_sections['t']['total'] = 0;
if ($this->_sections['t']['show']):

            for ($this->_sections['t']['index'] = $this->_sections['t']['start'], $this->_sections['t']['iteration'] = 1;
                 $this->_sections['t']['iteration'] <= $this->_sections['t']['total'];
                 $this->_sections['t']['index'] += $this->_sections['t']['step'], $this->_sections['t']['iteration']++):
$this->_sections['t']['rownum'] = $this->_sections['t']['iteration'];
$this->_sections['t']['index_prev'] = $this->_sections['t']['index'] - $this->_sections['t']['step'];
$this->_sections['t']['index_next'] = $this->_sections['t']['index'] + $this->_sections['t']['step'];
$this->_sections['t']['first']      = ($this->_sections['t']['iteration'] == 1);
$this->_sections['t']['last']       = ($this->_sections['t']['iteration'] == $this->_sections['t']['total']);
?>
                                    <option value="<?php echo $this->_tpl_vars['treaties'][$this->_sections['t']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['treaties'][$this->_sections['t']['index']]['name']; ?>
</option>
					<?php endfor; endif; ?>
                                </select></b></td>
                    </tr>

                    <tr>
                        <td>&nbsp;</td>
                        <td><input type="submit" value="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Send<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>"></td>
                    </tr>

                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="text-align:justify" colspan=2><b style="color:white"><br />
				<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>What each treaty do (All the treaties allow trading):<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b><br />
                            <p style="color:#ffcaca"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Neutrality Treaty:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b> <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>This is a
				treaty with another empire that will prevent you from being attacked
				by the other empire.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></p>
                            <p style="color:#ff9999"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Minor Alliance:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b> <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>This treaty not
				only protect you from the other empire's attacks, but the other
				empire will also send you defensive forces when you are attacked.
				You will automatically send him or her forces when he/she is
				attacked also.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></p>
                            <p style="color:#ffcaca"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Total Defense:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b> <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>This is the same
				as the Minor Alliance, but each of you will send more forces in
				defense than in a Minor Alliance.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></p>


                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <br />
    <br />
</form>



<?php if (isset ( $this->_tpl_vars['form_coalition_create_block'] )): ?>

<form method="post" onsubmit="ajax_submit_form('diplomacy.php',this); return false;">

    <table cellpadding="1" cellspacing="0" border="0" bgcolor="darkred"
           width="780">
        <tr>
            <td background="../images/game/header.jpg"><b>&nbsp;
			<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Create a coalition<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
        </tr>
        <tr>
            <td>
                <table style="font-size:10pt;" bgcolor="#333333" width="100%"
                       cellspacing="1" cellpadding="5" border="0" align="center"
                       background="../images/game/background1.jpg">
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td align="right"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Coalition name:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
                        <td align="left"><b><input
                                    class="input_text"
                                    type="text" name="coalition_name"></b></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><input type="submit" value="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Create<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>"></td>
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
</form>
<?php endif; ?>


<?php if (isset ( $this->_tpl_vars['form_coalition_manage_block'] )): ?>

<form method="post" onsubmit="ajax_submit_form('diplomacy.php',this); return false;">

    <table cellpadding="1" cellspacing="0" border="0" bgcolor="darkred"
           width="780">
        <tr>
            <td background="../images/game/header.jpg"><font
                    color="yellow" style="font-size:13px;"> <b>
                        <table border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td>&nbsp;<a href="#" onclick="open_page('logo_editor_coalition.php')"><img
                                            src="img_logo.php?data=<?php echo $this->_tpl_vars['coalition_logo']; ?>
&<?php echo $this->_tpl_vars['timestamp']; ?>
" width="16" height="16"
                                            border="1" bordercolor="yellow" style="border-color:yellow"></a></td>
                                <td>&nbsp;<b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Coalition<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> (<?php echo $this->_tpl_vars['coalition_name']; ?>
)</b>
                                    &nbsp;<a class="link" onClick="if (!confirm('<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Are you sure?<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>')) return false; else open_page('diplomacy.php?disband_coalition');"
                                             href="#">Disband</a>&nbsp;|&nbsp;<a class="link" href="logo_editor_coalition.php"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Edit Logo<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></b></font></td>
                            </tr>
                        </table></td>
                        </tr>
                        <tr>
                            <td>
                                <table  bgcolor="#333333" width="100%"
                                        cellspacing="1" cellpadding="5" border="0" align="center"
                                        background="../images/game/background1.jpg">
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td align="left" width="220"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Empire<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
                                        <td align="left"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Date<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
                                        <td align="left" width="120"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Status<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
                                        <td align="left" width="60"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Action<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
                                    </tr>

			<?php unset($this->_sections['cl']);
$this->_sections['cl']['name'] = 'cl';
$this->_sections['cl']['loop'] = is_array($_loop=$this->_tpl_vars['coalition_listing']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['cl']['show'] = true;
$this->_sections['cl']['max'] = $this->_sections['cl']['loop'];
$this->_sections['cl']['step'] = 1;
$this->_sections['cl']['start'] = $this->_sections['cl']['step'] > 0 ? 0 : $this->_sections['cl']['loop']-1;
if ($this->_sections['cl']['show']) {
    $this->_sections['cl']['total'] = $this->_sections['cl']['loop'];
    if ($this->_sections['cl']['total'] == 0)
        $this->_sections['cl']['show'] = false;
} else
    $this->_sections['cl']['total'] = 0;
if ($this->_sections['cl']['show']):

            for ($this->_sections['cl']['index'] = $this->_sections['cl']['start'], $this->_sections['cl']['iteration'] = 1;
                 $this->_sections['cl']['iteration'] <= $this->_sections['cl']['total'];
                 $this->_sections['cl']['index'] += $this->_sections['cl']['step'], $this->_sections['cl']['iteration']++):
$this->_sections['cl']['rownum'] = $this->_sections['cl']['iteration'];
$this->_sections['cl']['index_prev'] = $this->_sections['cl']['index'] - $this->_sections['cl']['step'];
$this->_sections['cl']['index_next'] = $this->_sections['cl']['index'] + $this->_sections['cl']['step'];
$this->_sections['cl']['first']      = ($this->_sections['cl']['iteration'] == 1);
$this->_sections['cl']['last']       = ($this->_sections['cl']['iteration'] == $this->_sections['cl']['total']);
?>
                                    <tr>
                                        <td width="100%" background="<?php echo $this->_tpl_vars['coalition_listing'][$this->_sections['cl']['index']]['background']; ?>
" align="left"
                                            bgcolor="<?php echo $this->_tpl_vars['coalition_listing'][$this->_sections['cl']['index']]['bgcolor']; ?>
" style="color:yellow"><b><a
                                                    href="javascript:show_info(<?php echo $this->_tpl_vars['coalition_listing'][$this->_sections['cl']['index']]['empire_id']; ?>
)"
                                                    style="text-decoration:none;color:#191919"><?php echo $this->_tpl_vars['coalition_listing'][$this->_sections['cl']['index']]['empire']; ?>
</a></b></td>
                                        <td nowrap background="<?php echo $this->_tpl_vars['coalition_listing'][$this->_sections['cl']['index']]['background']; ?>
" align="left"
                                            bgcolor="<?php echo $this->_tpl_vars['coalition_listing'][$this->_sections['cl']['index']]['bgcolor']; ?>
" style="color:#191919"><b><?php echo $this->_tpl_vars['coalition_listing'][$this->_sections['cl']['index']]['date']; ?>
</b></td>
                                        <td nowrap background="<?php echo $this->_tpl_vars['coalition_listing'][$this->_sections['cl']['index']]['background']; ?>
" align="left"
                                            bgcolor="<?php echo $this->_tpl_vars['coalition_listing'][$this->_sections['cl']['index']]['bgcolor']; ?>
" style="color:#191919"><b><?php echo $this->_tpl_vars['coalition_listing'][$this->_sections['cl']['index']]['status']; ?>
</b></td>
                                        <td nowrap background="<?php echo $this->_tpl_vars['coalition_listing'][$this->_sections['cl']['index']]['background']; ?>
" align="left"
                                            bgcolor="<?php echo $this->_tpl_vars['coalition_listing'][$this->_sections['cl']['index']]['bgcolor']; ?>
"><b>
                                                <a class="link" onClick="if (!confirm('<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Are you sure?<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>')) return false; else open_page('diplomacy.php?coalition_kick=<?php echo $this->_tpl_vars['coalition_listing'][$this->_sections['cl']['index']]['empire_id']; ?>
');"
                                                   href="#"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Kick<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>
                                                &nbsp;
                                                <a class="link" onClick="if (!confirm('<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Are you sure? You will loose the ownership of this coalition<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>')) return false; else open_page('diplomacy.php?coalition_transferownership=<?php echo $this->_tpl_vars['coalition_listing'][$this->_sections['cl']['index']]['empire_id']; ?>
');"
                                                   href="#"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Set Owner<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>
                                            </b></td>

                                    </tr>
			<?php endfor; endif; ?>
                                    <tr>
                                        <td></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        </table>

                        <br />
                        <br />
                        </form>

                        <?php endif; ?>


                        <?php if (isset ( $this->_tpl_vars['form_coalition_invite_block'] )): ?>

                        <form method="post" onsubmit="ajax_submit_form('diplomacy.php',this); return false;">

                            <table cellpadding="1" cellspacing="0" border="0" bgcolor="darkred"
                                   width="780">
                                <tr>
                                    <td background="../images/game/header.jpg"><font
                                            color="black" style="font-size:13px;color:white"><b>&nbsp;<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Invite someone<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></font></td>
                                </tr>
                                <tr>
                                    <td>
                                        <table style="font-size:10pt;" bgcolor="#333333" width="100%"
                                               cellspacing="1" cellpadding="5" border="0" align="center"
                                               background="../images/game/background1.jpg">
                                            <tr>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td align="right"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Empire:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
                                                <td align="left"><b><select
                                                            style="width:500px" class="text_area"
                                                            type="text" name="coalition_invite">
                                                            <option value="-1">---</option>
					<?php unset($this->_sections['ec']);
$this->_sections['ec']['name'] = 'ec';
$this->_sections['ec']['loop'] = is_array($_loop=$this->_tpl_vars['empires_coalition']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['ec']['show'] = true;
$this->_sections['ec']['max'] = $this->_sections['ec']['loop'];
$this->_sections['ec']['step'] = 1;
$this->_sections['ec']['start'] = $this->_sections['ec']['step'] > 0 ? 0 : $this->_sections['ec']['loop']-1;
if ($this->_sections['ec']['show']) {
    $this->_sections['ec']['total'] = $this->_sections['ec']['loop'];
    if ($this->_sections['ec']['total'] == 0)
        $this->_sections['ec']['show'] = false;
} else
    $this->_sections['ec']['total'] = 0;
if ($this->_sections['ec']['show']):

            for ($this->_sections['ec']['index'] = $this->_sections['ec']['start'], $this->_sections['ec']['iteration'] = 1;
                 $this->_sections['ec']['iteration'] <= $this->_sections['ec']['total'];
                 $this->_sections['ec']['index'] += $this->_sections['ec']['step'], $this->_sections['ec']['iteration']++):
$this->_sections['ec']['rownum'] = $this->_sections['ec']['iteration'];
$this->_sections['ec']['index_prev'] = $this->_sections['ec']['index'] - $this->_sections['ec']['step'];
$this->_sections['ec']['index_next'] = $this->_sections['ec']['index'] + $this->_sections['ec']['step'];
$this->_sections['ec']['first']      = ($this->_sections['ec']['iteration'] == 1);
$this->_sections['ec']['last']       = ($this->_sections['ec']['iteration'] == $this->_sections['ec']['total']);
?>
                                                            <option value="<?php echo $this->_tpl_vars['empires_coalition'][$this->_sections['ec']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['empires_coalition'][$this->_sections['ec']['index']]['name']; ?>
</option>
					<?php endfor; endif; ?>

                                                        </select> </b></td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td><input type="submit" value="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Send Invitation<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>"></td>
                                            </tr><tr>
                                                <td colspan="2" style="color:#ffcaca"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Joining a coalition will give you a total defense treaty with every members<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                            <br />
                        </form>

                        <?php endif; ?>