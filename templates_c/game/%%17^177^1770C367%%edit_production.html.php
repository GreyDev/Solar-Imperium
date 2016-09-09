<?php /* Smarty version 2.6.19, created on 2009-09-13 00:32:03
         compiled from edit_production.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'edit_production.html', 6, false),)), $this); ?>
<form method="post" name="prefsfrm" onsubmit="ajax_submit_form('edit_production.php',this); return false;" action="#">

    <table  cellspacing="0" cellpadding="0" border="0">
        <tr>
            <td nowrap><img src="../images/game/tab2_left.gif" border="0"></td>
            <td nowrap bgcolor="#666666" style="padding:0px 5px 0px 5px"><a  class="link" href="#" onClick="open_page('manage.php')"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Manage<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></td>
            <td><img src="../images/game/tab2_right.gif" border="0"></td>

            <td nowrap><img src="../images/game/tab2_left.gif" border="0"></td>
            <td nowrap bgcolor="#666666"  style="padding:0px 5px 0px 5px"><a  class="link" href="#" onClick="open_page('stats.php')"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Performance<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></td>
            <td><img src="../images/game/tab2_right.gif" border="0"></td>

            <td nowrap><img src="../images/game/tab2_left.gif" border="0"></td>
            <td nowrap bgcolor="#666666"  style="padding:0px 5px 0px 5px"><a  class="link" href="#" onClick="open_page('logs.php')"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Activity Logs<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></td>
            <td><img src="../images/game/tab2_right.gif" border="0"></td>

            <td nowrap><img src="../images/game/tab2_left.gif" border="0"></td>
            <td nowrap bgcolor="#666666"  style="padding:0px 5px 0px 5px"><a  class="link" href="#" onClick="open_page('logo_editor.php')"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Edit Logo<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></td>
            <td><img src="../images/game/tab2_right.gif" border="0"></td>

            <td nowrap><img src="../images/game/tab2_left.gif" border="0"></td>
            <td nowrap bgcolor="#666666"  style="padding:0px 5px 0px 5px"><a  class="link" href="#" onClick="open_page('lastturn.php')"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Turn Summary<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></td>
            <td><img src="../images/game/tab2_right.gif" border="0"></td>


            <td nowrap><img src="../images/game/tab2_left.gif" border="0"></td>
            <td nowrap bgcolor="#666666"  style="padding:0px 5px 0px 5px"><a  class="link" href="#" onClick="open_page('research.php')"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Research Map<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></td>
            <td><img src="../images/game/tab2_right.gif" border="0"></td>

            <td nowrap><img src="../images/game/tab_left.gif" border="0"></td>
            <td nowrap bgcolor="darkred"  style="padding:0px 5px 0px 5px"><a  style="text-decoration:none;color:white" href="#" onClick="open_page('edit_production.php')"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Production<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></td>
            <td><img src="../images/game/tab_right.gif" border="0"></td>
        </tr>

    </table>


    <table width="780"  bgcolor="darkred" cellspacing="1"
           cellpadding="0" border="0">
        <tr>
            <td>
                <table background="../images/game/background1.jpg" width="100%" align="center"
                       cellspacing="0" cellpadding="5" border="0"
                       style="font-size:13px;font-family:verdana" bgcolor="#333333">
                    <tr>
                        <td colspan="3">
                            <br/>
                            <b style="color:white"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Tax rate and Production<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
                    </tr>
                    <tr>
                        <td align="right"><a href="javascript:show_help('taxrate')" class="link" onmouseover="ajax_showTooltip('galaxypedia_short.php?search=taxrate',this);return false" onmouseout="ajax_hideTooltip()"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Tax rate<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>:</td>
                        <td colspan="2"><input maxlength=3
                                               class="input_text" style="width:60px"
                                               type="text" name="taxrate" value="<?php echo $this->_tpl_vars['taxrate']; ?>
"> %</td>
                    </tr>
                    <tr>
                        <td align="right"><a href="javascript:show_help('sellrate')" class="link" onmouseover="ajax_showTooltip('galaxypedia_short.php?search=sellrate',this);return false" onmouseout="ajax_hideTooltip()"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Food auto-sell rate<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
                            </a>:</td>
                        <td colspan="2"><input maxlength=3
                                               class="input_text" style="width:60px"
                                               type="text" name="food_rate" value="<?php echo $this->_tpl_vars['food_rate']; ?>
"> %</td>
                    </tr>
                    <tr>
                        <td align="right"><a href="javascript:show_help('sellrate')" class="link" onmouseover="ajax_showTooltip('galaxypedia_short.php?search=sellrate',this);return false" onmouseout="ajax_hideTooltip()"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Ore auto-sell rate<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
                            </a>:</td>
                        <td colspan="2"><input maxlength=3
                                               class="input_text" style="width:60px"
                                               type="text" name="ore_rate" value="<?php echo $this->_tpl_vars['ore_rate']; ?>
"> %</td>
                    </tr>

                    <tr>
                        <td align="right"><a href="javascript:show_help('sellrate')" class="link" onmouseover="ajax_showTooltip('galaxypedia_short.php?search=sellrate',this);return false" onmouseout="ajax_hideTooltip()"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Petroleum auto-sell rate<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
                            </a>:</td>
                        <td colspan="2"><input maxlength=3
                                               class="input_text" style="width:60px"
                                               type="text" name="petroleum_rate" value="<?php echo $this->_tpl_vars['petroleum_rate']; ?>
"> %</td>
                    </tr>

                    <tr>
                        <td align="right"><a href="javascript:show_help('sellrate')" class="link" onmouseover="ajax_showTooltip('galaxypedia_short.php?search=sellrate',this);return false" onmouseout="ajax_hideTooltip()"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Research converted into credits<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
                            </a>:</td>
                        <td colspan="2"><input maxlength=3
                                               class="input_text" style="width:60px"
                                               type="text" name="research_rate" value="<?php echo $this->_tpl_vars['research_rate']; ?>
"> %</td>
                    </tr>

                    <tr>
                        <td colspan="3">
                            <hr color="darkred" size="1" border="0">
                            <br />
                            <b style="color:white"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Supply / Production<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
                    </tr>
                    <tr>
                        <td align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Soldiers:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
                        <td><input maxlength=3
                                   class="input_text" style="width:60px"
                                   type="text" name="rate_soldier" value="<?php echo $this->_tpl_vars['rate_soldier']; ?>
"> %</td>
                        <td style="color:#ff6666"><b>+<?php echo $this->_tpl_vars['prod_soldier']; ?>
</b></td>
                    </tr>
                    <tr>
                        <td align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Fighters:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
                        <td><input maxlength=3
                                   class="input_text" style="width:60px"
                                   type="text" name="rate_fighter" value="<?php echo $this->_tpl_vars['rate_fighter']; ?>
"> %</td>
                        <td style="color:#ff6666"><b>+<?php echo $this->_tpl_vars['prod_fighter']; ?>
</b></td>
                    </tr>

                    <tr>
                        <td align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Defense Stations:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
                        <td><input maxlength=3
                                   class="input_text" style="width:60px"
                                   type="text" name="rate_station" value="<?php echo $this->_tpl_vars['rate_station']; ?>
"> %</td>
                        <td style="color:#ff6666"><b>+<?php echo $this->_tpl_vars['prod_station']; ?>
</b></td>
                    </tr>

                    <tr>
                        <td align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Heavy Cruisers:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
                        <td><input maxlength=3
                                   class="input_text" style="width:60px"
                                   type="text" name="rate_heavycruiser" value="<?php echo $this->_tpl_vars['rate_heavycruiser']; ?>
">
				%</td>
                        <td style="color:#ff6666"><b>+<?php echo $this->_tpl_vars['prod_heavycruiser']; ?>
</b></td>
                    </tr>

                    <tr>
                        <td align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Carriers:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
                        <td><input maxlength=3
                                   class="input_text" style="width:60px"
                                   type="text" name="rate_carrier" value="<?php echo $this->_tpl_vars['rate_carrier']; ?>
"> %</td>
                        <td style="color:#ff6666"><b>+<?php echo $this->_tpl_vars['prod_carrier']; ?>
</b></td>
                    </tr>

                    <tr>
                        <td align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Covert agents:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
                        <td><input maxlength=3
                                   class="input_text" style="width:60px"
                                   type="text" name="rate_covert" value="<?php echo $this->_tpl_vars['rate_covert']; ?>
"> %</td>
                        <td style="color:#ff6666"><b>+<?php echo $this->_tpl_vars['prod_covert']; ?>
</b></td>
                    </tr>

                    <tr>
                        <td align="right"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Credits:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
                        <td><input maxlength=3
                                   class="input_text" style="width:60px"
                                   type="text" name="rate_credits" value="<?php echo $this->_tpl_vars['rate_credits']; ?>
"> %</td>
                        <td style="color:#ff6666"><b>+<?php echo $this->_tpl_vars['prod_credits']; ?>
</b></td>
                    </tr>


                    <tr>
                        <td>&nbsp;</td>
                        <td colspan="2"><input type="submit" value="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Save preferences<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>">&nbsp;
                            <input type="button" value="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Back to game<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>"
                                   onClick="window.location='manage.php';"></td>
                    </tr>
                    <tr>
                        <td><br />
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

</form>
