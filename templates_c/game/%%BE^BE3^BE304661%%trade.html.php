<?php /* Smarty version 2.6.19, created on 2009-09-14 02:51:23
         compiled from trade.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'trade.html', 10, false),)), $this); ?>
<form method="post" name="form1" action="#" onsubmit="ajax_submit_form('trade.php',this); return false;">

    <table width="780px"  style="margin:0 0 10 0;border:0px solid darkred;" cellspacing="0" cellpadding="0">
        <tr>
            <td width="100%" align="left">

                <table  cellspacing="0" cellpadding="0" border="0">
                    <tr>
                        <td nowrap><img src="../images/game/tab2_left.gif" border="0"></td>
                        <td nowrap bgcolor="#666666" style="padding:0px 5px 0px 5px"><a  class="link" href="#" onclick="open_page('solarbank.php')"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Solar Bank<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></td>
                        <td><img src="../images/game/tab2_right.gif" border="0"></td>


                        <td nowrap><img src="../images/game/tab2_left.gif" border="0"></td>
                        <td nowrap bgcolor="#666666"  style="padding:0px 5px 0px 5px"><a  class="link" href="#" onClick="open_page('globalmarket.php')"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Global Market<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></td>
                        <td><img src="../images/game/tab2_right.gif" border="0"></td>

                        <td nowrap><img src="../images/game/tab2_left.gif" border="0"></td>
                        <td nowrap bgcolor="#666666"  style="padding:0px 5px 0px 5px"><a  class="link" href="#" onClick="open_page('lottery.php')"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Lottery<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></td>
                        <td><img src="../images/game/tab2_right.gif" border="0"></td>

                        <td nowrap><img src="../images/game/tab_left.gif" border="0"></td>
                        <td nowrap bgcolor="darkred"  style="padding:0px 5px 0px 5px"><a  style="text-decoration:none;color:white" href="#" onclick="open_page('trade.php')"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Trade Center<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></td>
                        <td><img src="../images/game/tab_right.gif" border="0"></td>

                    </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td>

                <table width="100%" align="center" cellspacing="0" cellpadding="5" style="font-size:11pt;border:1px solid darkred" bgcolor="#333333" background="../images/game/background1.jpg">


                    <tr>
                        <td colspan="2">


                            <br/>
                            <table  width="100%" bgcolor="darkred" cellspacing="1" cellpadding="0" border="0">
                                <tr>
                                    <td  background="../images/game/header.jpg"><b style="color:yellow">&nbsp;
                                            <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Active Trades<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td></tr>

                                <tr>
                                    <td>
                                        <table width="100%" align="center" cellspacing="0" cellpadding="5" border="0" style="font-size:11pt" bgcolor="#333333">
                                            <tr><td><?php echo $this->_tpl_vars['active_trades']; ?>

                                                </td></tr>
                                        </table>

                                    </td>
                                </tr>
                            </table>
                            <br/>

                        </td>
                    </tr>
                    <tr><td align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Current tax rate:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> </td><td><b style="color:#ffcaca"><?php echo $this->_tpl_vars['trade_taxrate']; ?>
 %</b></td></tr>
                    <tr><td align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Available carriers:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> </td><td><b style="color:#ffcaca"><?php echo $this->_tpl_vars['trade_carriers']; ?>
</b></td></tr>
                    <tr>
                        <td align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Empire:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
                        <td>
                            <b style="color:#ffcaca">
                                <select name="empire" style="width:500" class="select_box" >
                                    <option value="-1">---</option>
		<?php unset($this->_sections['emp']);
$this->_sections['emp']['name'] = 'emp';
$this->_sections['emp']['loop'] = is_array($_loop=$this->_tpl_vars['empires']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['emp']['show'] = true;
$this->_sections['emp']['max'] = $this->_sections['emp']['loop'];
$this->_sections['emp']['step'] = 1;
$this->_sections['emp']['start'] = $this->_sections['emp']['step'] > 0 ? 0 : $this->_sections['emp']['loop']-1;
if ($this->_sections['emp']['show']) {
    $this->_sections['emp']['total'] = $this->_sections['emp']['loop'];
    if ($this->_sections['emp']['total'] == 0)
        $this->_sections['emp']['show'] = false;
} else
    $this->_sections['emp']['total'] = 0;
if ($this->_sections['emp']['show']):

            for ($this->_sections['emp']['index'] = $this->_sections['emp']['start'], $this->_sections['emp']['iteration'] = 1;
                 $this->_sections['emp']['iteration'] <= $this->_sections['emp']['total'];
                 $this->_sections['emp']['index'] += $this->_sections['emp']['step'], $this->_sections['emp']['iteration']++):
$this->_sections['emp']['rownum'] = $this->_sections['emp']['iteration'];
$this->_sections['emp']['index_prev'] = $this->_sections['emp']['index'] - $this->_sections['emp']['step'];
$this->_sections['emp']['index_next'] = $this->_sections['emp']['index'] + $this->_sections['emp']['step'];
$this->_sections['emp']['first']      = ($this->_sections['emp']['iteration'] == 1);
$this->_sections['emp']['last']       = ($this->_sections['emp']['iteration'] == $this->_sections['emp']['total']);
?>
                                    <option value="<?php echo $this->_tpl_vars['empires'][$this->_sections['emp']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['empires'][$this->_sections['emp']['index']]['name']; ?>
</option>
		<?php endfor; endif; ?>
                                </select>
                            </b>
                        </td>
                    </tr>

                    <tr>
                        <td align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Money:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
                        <td>
                            <input value="0" type="text" name="trade_money" style="width:200px;" class="input_text">
                            <b style="font-size:10pt;color:#ffcaca">
                                <a href="#" style="color:white"  onclick="form1.trade_money.value=<?php echo $this->_tpl_vars['trade_money_max_noformat']; ?>
;"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>MAX<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>: <?php echo $this->_tpl_vars['trade_money_max']; ?>
 cr.</b>
                        </td>
                    </tr>

                    <tr>
                        <td align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Food:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
                        <td><input value="0" type="text" name="trade_food"  class="input_text" style="width:200px">
                            <b style="font-size:10pt;color:#ffcaca">
                                <a href="#" style="color:white"  onclick="form1.trade_food.value=<?php echo $this->_tpl_vars['trade_food_max_noformat']; ?>
;"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>MAX<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>: <?php echo $this->_tpl_vars['trade_food_max']; ?>
 <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>megatons<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b>
                        </td>
                    </tr>

                    <tr>
                        <td align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Covert Agents:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
                        <td><input value="0" type="text" name="trade_coverts" class="input_text" style="width:200px">
                            <b style="font-size:10pt;color:#ffcaca">
                                <a href="#" style="color:white"  onclick="form1.trade_coverts.value=<?php echo $this->_tpl_vars['trade_coverts_max_noformat']; ?>
;"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>MAX<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>: <?php echo $this->_tpl_vars['trade_coverts_max']; ?>
</b>
                        </td>
                    </tr>


                    <tr>
                        <td align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Soldiers:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
                        <td><input value="0" type="text" name="trade_soldiers" class="input_text" style="width:200px">
                            <b style="font-size:10pt;color:#ffcaca">
                                <a href="#" style="color:white"  onclick="form1.trade_soldiers.value=<?php echo $this->_tpl_vars['trade_soldiers_max_noformat']; ?>
;"<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>>MAX<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>: <?php echo $this->_tpl_vars['trade_soldiers_max']; ?>
</b>
                        </td>
                    </tr>


                    <tr>
                        <td align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Fighters:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
                        <td><input value="0" type="text" name="trade_fighters" class="input_text" style="width:200px">
                            <b style="font-size:10pt;color:#ffcaca">
                                <a href="#" style="color:white" onclick="form1.trade_fighters.value=<?php echo $this->_tpl_vars['trade_fighters_max_noformat']; ?>
;"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>MAX<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>: <?php echo $this->_tpl_vars['trade_fighters_max']; ?>
</b>
                        </td>
                    </tr>


                    <tr>
                        <td align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Light cruisers:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
                        <td><input value="0" type="text" name="trade_lightcruisers" class="input_text" style="width:200px">
                            <b style="font-size:10pt;color:#ffcaca">
                                <a href="#" style="color:white" onclick="form1.trade_lightcruisers.value=<?php echo $this->_tpl_vars['trade_lightcruisers_max_noformat']; ?>
;"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>MAX<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>: <?php echo $this->_tpl_vars['trade_lightcruisers_max']; ?>
</b>
                        </td>
                    </tr>


                    <tr>
                        <td align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Heavy cruisers:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
                        <td><input value="0" type="text" name="trade_heavycruisers" class="input_text" style="width:200px">
                            <b style="font-size:10pt;color:#ffcaca">
                                <a href="#" style="color:white" onclick="form1.trade_heavycruisers.value=<?php echo $this->_tpl_vars['trade_heavycruisers_max_noformat']; ?>
;"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>MAX<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>: <?php echo $this->_tpl_vars['trade_heavycruisers_max']; ?>
</b>
                        </td>
                    </tr>


                    <tr><td>&nbsp;</td><td><input type="submit" value="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Send convoy<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>"></td></tr>
                    <tr><td><br/></td></tr>

                </table>
            </td>
        </tr>
    </table>
</form>