<?php /* Smarty version 2.6.19, created on 2009-09-13 00:17:02
         compiled from manage.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'manage.html', 4, false),array('modifier', 'number_format', 'manage.html', 41, false),)), $this); ?>
<table  cellspacing="0" cellpadding="0" border="0">
    <tr>
        <td nowrap><img src="../images/game/tab_left.gif" border="0"></td>
        <td nowrap bgcolor="darkred" style="padding:0px 5px 0px 5px"><a  style="text-decoration:none;color:white" href="#" onClick="open_page('manage.php')"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Manage<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></td>
        <td><img src="../images/game/tab_right.gif" border="0"></td>

        <td nowrap><img src="../images/game/tab2_left.gif" border="0"></td>
        <td nowrap bgcolor="#666666"  style="padding:0px 5px 0px 5px"><a  class="link"  href="#" onClick="open_page('stats.php')"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Performance<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></td>
        <td><img src="../images/game/tab2_right.gif" border="0"></td>

        <td nowrap><img src="../images/game/tab2_left.gif" border="0"></td>
        <td nowrap bgcolor="#666666"  style="padding:0px 5px 0px 5px"><a  class="link" href="#"  onClick="open_page('logs.php')"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Activity Logs<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></td>
        <td><img src="../images/game/tab2_right.gif" border="0"></td>

        <td nowrap><img src="../images/game/tab2_left.gif" border="0"></td>
        <td nowrap bgcolor="#666666"  style="padding:0px 5px 0px 5px"><a  class="link"  href="#" onClick="open_page('logo_editor.php')"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Edit Logo<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></td>
        <td><img src="../images/game/tab2_right.gif" border="0"></td>

        <td nowrap><img src="../images/game/tab2_left.gif" border="0"></td>
        <td nowrap bgcolor="#666666"  style="padding:0px 5px 0px 5px"><a  class="link"  href="#" onClick="open_page('lastturn.php')"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Turn Summary<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></td>
        <td><img src="../images/game/tab2_right.gif" border="0"></td>

        <td nowrap><img src="../images/game/tab2_left.gif" border="0"></td>
        <td nowrap bgcolor="#666666"  style="padding:0px 5px 0px 5px"><a  class="link"  href="#" onClick="open_page('research.php')"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Research Map<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></td>
        <td><img src="../images/game/tab2_right.gif" border="0"></td>

        <td nowrap><img src="../images/game/tab2_left.gif" border="0"></td>
        <td nowrap bgcolor="#666666"  style="padding:0px 5px 0px 5px"><a  class="link"  href="#" onClick="open_page('edit_production.php')"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Production<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></td>
        <td><img src="../images/game/tab2_right.gif" border="0"></td>
    </tr>
</table>


<table bgcolor="black" 
       cellspacing="1" cellpadding="2" border="0" width="780px"
       style="font-size:11pt;font-family:verdana;border:1px solid darkred">

    <tr>
        <td colspan="4">
            <table cellspacing="0" cellpadding="5" border="0"><tr>
                    <td><img style="border:1px solid #666666;margin:0 5 0 5;" alt="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Credits<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" title="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Credits<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" src="../images/game/icon_credits.png"></td><td><b><?php echo ((is_array($_tmp=$this->_tpl_vars['credits'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</b></td>
                    <td><img style="border:1px solid #666666;margin:0 5 0 5;" alt="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Food<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" title="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Food<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" src="../images/game/icon_food.png"></td><td><b><?php echo ((is_array($_tmp=$this->_tpl_vars['food'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</b></td>
                    <td><img style="border:1px solid #666666;margin:0 5 0 5;" alt="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Ore<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" title="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Ore<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" src="../images/game/icon_ore.png"></td><td><b><?php echo ((is_array($_tmp=$this->_tpl_vars['ore'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</b></td>
                    <td><img style="border:1px solid #666666;margin:0 5 0 5;" alt="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Petroleum<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" title="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Petroleum<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" src="../images/game/icon_petro.png"></td><td><b><?php echo ((is_array($_tmp=$this->_tpl_vars['petroleum'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</b></td>
                    <td><img style="border:1px solid #666666;margin:0 5 0 5;" alt="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Planets total / Planets cap<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" title="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Planets total / Planets cap<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" src="../images/game/icon_planets.png"></td><td><b><?php echo ((is_array($_tmp=$this->_tpl_vars['total_planets'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
 / <?php echo ((is_array($_tmp=$this->_tpl_vars['max_planets'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</b></td>
                </tr></table>
        </td>

    </tr>
    <tr>
        <td bgcolor="#333333" background="../images/game/background/topbar.jpg" width="250">&nbsp;</td>
        <td bgcolor="#333333" background="../images/game/background/topbar.jpg" width="150"><b style="color:#999999"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Qty.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
        <td bgcolor="#333333" background="../images/game/background/topbar.jpg" width="250"><b style="color:#999999"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Buy / Sell<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
        <td bgcolor="#333333" background="../images/game/background/topbar.jpg" width="100"><b style="color:#999999"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Actions<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
    </tr>
    <tr>
        <td background="../images/game/bar3.jpg">

            <table cellspacing="0" border="0">
                <tr>
                    <td>
                        <img src="../images/game/icons/army/soldiers_<?php echo $this->_tpl_vars['soldiers_level']; ?>
.gif" width="32" height="32" style="border:1px solid black;margin:0 5 0 0">
                    </td>
                    <td>
                        <a href="javascript:show_help('soldiers')" class="link" onmouseover="ajax_showTooltip('galaxypedia_short.php?search=soldiers',this);return false" onmouseout="ajax_hideTooltip()"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Soldiers<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>:
                    </td>
                </tr>
            </table>

        </td>
        <td background="../images/game/bar4.jpg" align="right"><?php echo ((is_array($_tmp=$this->_tpl_vars['soldiers'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</td>
        <td background="../images/game/bar3.jpg" align="right"><b><?php echo $this->_tpl_vars['buy_soldiers']; ?>
 / <?php echo $this->_tpl_vars['sell_soldiers']; ?>
</b></td>
        <td background="../images/game/bar3.jpg" >
            <a class="menu2" href="#" onclick="buy('soldiers','<?php echo $this->_tpl_vars['soldiers_buy_label']; ?>
')"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Buy<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>
            <a class="menu2"href="#"
               onClick="if (!confirm('<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Buy Maximum LUMP PURCHASE?<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>')) return false; else open_page('manage.php?buy=soldiers&quantity=<?php echo $this->_tpl_vars['buy_max_soldiers']; ?>
')" class="link" onmouseover="return escape('Maximum LUMP PURCHASE: <?php echo $this->_tpl_vars['buy_max_soldiers']; ?>
');"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Max<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>
            <a  class="menu2" href="javascript:sell('soldiers','<?php echo $this->_tpl_vars['soldiers_sell_label']; ?>
')"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Sell<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></td>
    </tr>
    <tr>
        <td  background="../images/game/bar3.jpg">
            <table cellspacing="0" border="0">
                <tr>
                    <td>
                        <img src="../images/game/icons/army/fighters_<?php echo $this->_tpl_vars['fighters_level']; ?>
.gif" width="32" height="32" style="border:1px solid black;margin:0 5 0 0">
                    </td>
                    <td>
                        <a href="javascript:show_help('fighters')" class="link" onmouseover="ajax_showTooltip('galaxypedia_short.php?search=fighters',this);return false" onmouseout="ajax_hideTooltip()"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Fighters<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>:
                    </td>
                </tr>
            </table>
        </td>
        <td background="../images/game/bar4.jpg" align="right"><?php echo ((is_array($_tmp=$this->_tpl_vars['fighters'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</td>
        <td background="../images/game/bar3.jpg" align="right"><b><?php echo $this->_tpl_vars['buy_fighters']; ?>
 / <?php echo $this->_tpl_vars['sell_fighters']; ?>
</b></td>
        <td background="../images/game/bar3.jpg" ><a  class="menu2"href="javascript:buy('fighters','<?php echo $this->_tpl_vars['fighters_buy_label']; ?>
')"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Buy<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a> <a
                class="menu2" href="#"
                onClick="if (!confirm('<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Buy Maximum LUMP PURCHASE?<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>')) return false; else open_page('manage.php?buy=fighters&quantity=<?php echo $this->_tpl_vars['buy_max_fighters']; ?>
');" class="link" onmouseover="return escape('Maximum LUMP PURCHASE: <?php echo $this->_tpl_vars['buy_max_fighters']; ?>
');"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Max<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a> <a  class="menu2" href="javascript:sell('fighters','<?php echo $this->_tpl_vars['fighters_sell_label']; ?>
')"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Sell<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></td>
    </tr>
    <tr>
        <td background="../images/game/bar3.jpg">

            <table cellspacing="0" border="0">
                <tr><td>

                        <img src="../images/game/icons/army/stations_<?php echo $this->_tpl_vars['stations_level']; ?>
.gif" width="32" height="32" style="border:1px solid black;margin:0 5 0 0"></td>
                    <td><a href="javascript:show_help('defense stations')" class="link" onmouseover="ajax_showTooltip('galaxypedia_short.php?search=stations',this);return false" onmouseout="ajax_hideTooltip()"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Defense stations<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>:</td></tr></table></td>
        <td background="../images/game/bar4.jpg" align="right"><?php echo ((is_array($_tmp=$this->_tpl_vars['stations'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</td>
        <td background="../images/game/bar3.jpg" align="right"><b><?php echo $this->_tpl_vars['buy_stations']; ?>
 / <?php echo $this->_tpl_vars['sell_stations']; ?>
</b></td>
        <td background="../images/game/bar3.jpg" >
            <a  class="menu2" href="javascript:buy('stations','<?php echo $this->_tpl_vars['stations_buy_label']; ?>
')"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Buy<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>
            <a  class="menu2" href="#"
                onClick="if (!confirm('<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Buy Maximum LUMP PURCHASE?<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>')) return false; else open_page('manage.php?buy=stations&quantity=<?php echo $this->_tpl_vars['buy_max_stations']; ?>
');" class="link" onmouseover="return escape('Maximum LUMP PURCHASE: <?php echo $this->_tpl_vars['buy_max_stations']; ?>
');"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Max<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a> <a  class="menu2" href="javascript:sell('stations','<?php echo $this->_tpl_vars['stations_sell_label']; ?>
')"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Sell<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></td>


    </tr>
    <tr>
        <td background="../images/game/bar3.jpg">


            <table cellspacing="0" border="0">
                <tr>
                    <td>
                        <img src="../images/game/icons/army/covertagents_<?php echo $this->_tpl_vars['covertagents_level']; ?>
.gif" width="32" height="32" style="border:1px solid black;margin:0 5 0 0">
                    </td>
                    <td><a href="javascript:show_help('covert_agents')" class="link" onmouseover="ajax_showTooltip('galaxypedia_short.php?search=covert_agents',this);return false" onmouseout="ajax_hideTooltip()"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Covert agents<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>:</td>
                </tr></table></td>

        <td background="../images/game/bar4.jpg" align="right"><?php echo ((is_array($_tmp=$this->_tpl_vars['covertagents'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</td>
        <td background="../images/game/bar3.jpg" align="right"><b><?php echo $this->_tpl_vars['buy_covertagents']; ?>
 / <?php echo $this->_tpl_vars['sell_covertagents']; ?>
</b></td>
        <td background="../images/game/bar3.jpg"><a
                href="javascript:buy('covertagents','<?php echo $this->_tpl_vars['covertagents_buy_label']; ?>
')"  class="menu2"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Buy<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a> <a
                href="#" class="menu2"
                onClick="if (!confirm('<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Buy Maximum LUMP PURCHASE?<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>')) return false; else open_page('manage.php?buy=covertagents&quantity=<?php echo $this->_tpl_vars['buy_max_covertagents']; ?>
');" class="link" onmouseover="return escape('Maximum LUMP PURCHASE: <?php echo $this->_tpl_vars['buy_max_covertagents']; ?>
');"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Max<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a> <a
                href="javascript:sell('covertagents','<?php echo $this->_tpl_vars['covertagents_sell_label']; ?>
')"  class="menu2"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Sell<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></td>
    </tr>
    <tr>
        <td background="../images/game/bar3.jpg">


            <table cellspacing="0" border="0">
                <tr>
                    <td>
                        <img src="../images/game/icons/army/lightcruisers_<?php echo $this->_tpl_vars['lightcruisers_level']; ?>
.gif" width="32" height="32" style="border:1px solid black;margin:0 5 0 0"></td>
                    <td><a href="javascript:show_help('lightcruisers')" class="link" onmouseover="ajax_showTooltip('galaxypedia_short.php?search=lightcruisers',this);return false" onmouseout="ajax_hideTooltip()"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Light cruisers<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>:</td></tr></table></td>
        <td background="../images/game/bar4.jpg" align="right"><?php echo ((is_array($_tmp=$this->_tpl_vars['light_cruisers'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</td>
        <td background="../images/game/bar3.jpg" align="right"><b><?php echo $this->_tpl_vars['sell_lightcruisers']; ?>
</b></td>


        <td background="../images/game/bar3.jpg"><a  class="menu2"
                                                     href="javascript:sell('lightcruisers','<?php echo $this->_tpl_vars['lightcruisers_sell_label']; ?>
')"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Sell<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></td>
    </tr>
    <tr>
        <td background="../images/game/bar3.jpg">

            <table cellspacing="0" border="0">
                <tr>
                    <td>

                        <img
                            src="../images/game/icons/army/heavycruisers_<?php echo $this->_tpl_vars['heavycruisers_level']; ?>
.gif" width="32" height="32"
                            style="border:1px solid black;margin:0 5 0 0"></td>
                    <td><a href="javascript:show_help('heavycruisers')" class="link" onmouseover="ajax_showTooltip('galaxypedia_short.php?search=heavycruisers',this);return false" onmouseout="ajax_hideTooltip()"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Heavy cruisers<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>:</td></tr></table></td>
        <td background="../images/game/bar4.jpg" align="right"><?php echo ((is_array($_tmp=$this->_tpl_vars['heavy_cruisers'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</td>
        <td background="../images/game/bar3.jpg" align="right"><b><?php echo $this->_tpl_vars['buy_heavycruisers']; ?>
 / <?php echo $this->_tpl_vars['sell_heavycruisers']; ?>
</b></td>
        <td background="../images/game/bar3.jpg"><a
                href="javascript:buy('heavycruisers','<?php echo $this->_tpl_vars['heavycruisers_buy_label']; ?>
')"  class="menu2"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Buy<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a> <a
                href="#"  class="menu2"
                onClick="if (!confirm('<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Buy Maximum LUMP PURCHASE?<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>')) return false; else open_page('manage.php?buy=heavycruisers&quantity=<?php echo $this->_tpl_vars['buy_max_heavycruisers']; ?>
');" class="link" onmouseover="return escape('Maximum LUMP PURCHASE: <?php echo $this->_tpl_vars['buy_max_heavycruisers']; ?>
');"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Max<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a> <a  class="menu2"
                href="javascript:sell('heavycruisers','<?php echo $this->_tpl_vars['heavycruisers_sell_label']; ?>
')"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Sell<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></td>
    </tr>
    <tr>
        <td background="../images/game/bar3.jpg">

            <table cellspacing="0" border="0">
                <tr>
                    <td>
                        <img src="../images/game/icons/army/carriers_<?php echo $this->_tpl_vars['carriers_level']; ?>
.gif"  width="32" height="32" style="border:1px solid black;margin:0 5 0 0"></td>
                    <td><a href="javascript:show_help('carriers')" class="link" onmouseover="ajax_showTooltip('galaxypedia_short.php?search=carriers',this);return false" onmouseout="ajax_hideTooltip()"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Carriers<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>:</td>
                </tr></table></td>
        <td background="../images/game/bar4.jpg" align="right"><?php echo ((is_array($_tmp=$this->_tpl_vars['carriers'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</td>
        <td background="../images/game/bar3.jpg" align="right"><b><?php echo $this->_tpl_vars['buy_carriers']; ?>
 / <?php echo $this->_tpl_vars['sell_carriers']; ?>
</b></td>
        <td background="../images/game/bar3.jpg"><a  class="menu2" href="javascript:buy('carriers','<?php echo $this->_tpl_vars['carriers_buy_label']; ?>
')"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Buy<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a> <a
                href="#"  class="menu2"
                onClick="if (!confirm('<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Buy Maximum LUMP PURCHASE?<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>')) return false; else open_page('manage.php?buy=carriers&quantity=<?php echo $this->_tpl_vars['buy_max_carriers']; ?>
')" class="link" onmouseover="return escape('Maximum LUMP PURCHASE: <?php echo $this->_tpl_vars['buy_max_carriers']; ?>
');"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Max<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a> <a href="javascript:sell('carriers','<?php echo $this->_tpl_vars['carriers_sell_label']; ?>
')"  class="menu2"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Sell<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></td>
    </tr>

    <tr>
        <td bgcolor="#333333" background="../images/game/background/topbar.jpg">&nbsp;</td>
        <td bgcolor="#333333" background="../images/game/background/topbar.jpg"><b style="color:#999999"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Qty.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
        <td bgcolor="#333333" background="../images/game/background/topbar.jpg"><b style="color:#999999"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Buy / Sell<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
        <td bgcolor="#333333" background="../images/game/background/topbar.jpg"><b style="color:#999999"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Actions<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
    </tr>

    <tr>
        <td background="../images/game/bar3.jpg" >



            <table cellspacing="0" border="0">
                <tr>
                    <td><img src="../images/game/icons/planets/food.jpg" width="32" height="32"
                             style="border:1px solid black;margin:0 5 0 0"></td>
                    <td><?php echo $this->_tpl_vars['food_short']; ?>
 <a href="javascript:show_help('food_planets')" class="link" onmouseover="ajax_showTooltip('galaxypedia_short.php?search=food_planets',this);return false" onmouseout="ajax_hideTooltip()"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Food planets<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></td></tr></table></td>
        <td background="../images/game/bar4.jpg" align="right"><?php echo ((is_array($_tmp=$this->_tpl_vars['food_planets'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</td>
        <td background="../images/game/bar3.jpg" align="right"><b><?php echo $this->_tpl_vars['cost_planet_food']; ?>
</b></td>
        <td background="../images/game/bar3.jpg" width="110px">
            <a href="javascript:buy('food_planets','<?php echo $this->_tpl_vars['food_planets_buy_label']; ?>
')"  class="menu2"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Buy<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>
            <a href="#"  class="menu2" onclick="if (confirm('<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Buy Maximum LUMP PURCHASE?<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>')) open_page('manage.php?buy=food_planets&quantity=<?php echo $this->_tpl_vars['buy_max_planet_food']; ?>
');" class="link" onmouseover="return escape('Maximum LUMP PURCHASE: <?php echo $this->_tpl_vars['buy_max_planet_food']; ?>
');"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Max<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>
            <a href="javascript:sell('food_planets','<?php echo $this->_tpl_vars['food_planets_sell_label']; ?>
')"  class="menu2"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Drop<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>
        </td>
    </tr>
    <tr>
        <td background="../images/game/bar3.jpg" >

            <table cellspacing="0" border="0">
                <tr>
                    <td><img src="../images/game/icons/planets/ore.jpg" width="32" height="32"
                             style="border:1px solid black;margin:0 5 0 0"></td>
                    <td><?php echo $this->_tpl_vars['ore_short']; ?>
 <a href="javascript:show_help('ore_planets')" class="link" onmouseover="ajax_showTooltip('galaxypedia_short.php?search=ore_planets',this);return false" onmouseout="ajax_hideTooltip()"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Ore planets<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></td></tr></table></td>
        <td background="../images/game/bar4.jpg"  align="right"><?php echo ((is_array($_tmp=$this->_tpl_vars['ore_planets'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</td>
        <td background="../images/game/bar3.jpg" align="right"><b><?php echo $this->_tpl_vars['cost_planet_ore']; ?>
</b></td>
        <td background="../images/game/bar3.jpg" >
            <a href="javascript:buy('ore_planets','<?php echo $this->_tpl_vars['ore_planets_buy_label']; ?>
')"  class="menu2"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Buy<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>
            <a href="#"  class="menu2" onclick="if (confirm('<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Buy Maximum LUMP PURCHASE?<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>')) open_page('manage.php?buy=ore_planets&quantity=<?php echo $this->_tpl_vars['buy_max_planet_ore']; ?>
');"  class="link" onmouseover="return escape('Maximum LUMP PURCHASE: <?php echo $this->_tpl_vars['buy_max_planet_ore']; ?>
');"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Max<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>
            <a href="javascript:sell('ore_planets','<?php echo $this->_tpl_vars['ore_planets_sell_label']; ?>
')"  class="menu2"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Drop<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></td>
    </tr>
    <tr>
        <td background="../images/game/bar3.jpg">
            <table cellspacing="0" border="0">
                <tr>
                    <td><img
                            src="../images/game/icons/planets/tourism.jpg" width="32" height="32" style="border:1px solid black;margin:0 5 0 0"></td>
                    <td><?php echo $this->_tpl_vars['tourism_short']; ?>
 <a href="javascript:show_help('tourism_planets')" class="link" onmouseover="ajax_showTooltip('galaxypedia_short.php?search=tourism_planets',this);return false" onmouseout="ajax_hideTooltip()"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Tourism planets<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></td></tr></table></td>
        <td background="../images/game/bar4.jpg" align="right"><?php echo ((is_array($_tmp=$this->_tpl_vars['tourism_planets'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</td>
        <td background="../images/game/bar3.jpg" align="right"><b><?php echo $this->_tpl_vars['cost_planet_tourism']; ?>
</b></td>
        <td background="../images/game/bar3.jpg">
            <a href="javascript:buy('tourism_planets','<?php echo $this->_tpl_vars['tourism_planets_buy_label']; ?>
')"  class="menu2"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Buy<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>
            <a href="#"  class="menu2" onclick="if (confirm('<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Buy Maximum LUMP PURCHASE?<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>')) open_page('manage.php?buy=tourism_planets&quantity=<?php echo $this->_tpl_vars['buy_max_planet_tourism']; ?>
')" class="link" onmouseover="return escape('Maximum LUMP PURCHASE: <?php echo $this->_tpl_vars['buy_max_planet_tourism']; ?>
');"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Max<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>
            <a href="javascript:sell('tourism_planets','<?php echo $this->_tpl_vars['tourism_planets_sell_label']; ?>
')"  class="menu2"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Drop<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></td>
    </tr>
    <tr>
        <td background="../images/game/bar3.jpg" >			<table cellspacing="0" border="0">
                <tr>
                    <td><img
                            src="../images/game/icons/planets/supply.jpg" width="32" height="32" style="border:1px solid black;margin:0 5 0 0"></td>
                    <td><?php echo $this->_tpl_vars['supply_short']; ?>
 <a href="javascript:show_help('supply_planets')" class="link" onmouseover="ajax_showTooltip('galaxypedia_short.php?search=supply_planets',this);return false" onmouseout="ajax_hideTooltip()"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Supply planets<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></td></tr></table></td>
        <td background="../images/game/bar4.jpg" align="right"><?php echo ((is_array($_tmp=$this->_tpl_vars['supply_planets'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</td>
        <td background="../images/game/bar3.jpg" align="right"><b><?php echo $this->_tpl_vars['cost_planet_supply']; ?>
</b></td>
        <td background="../images/game/bar3.jpg" >
            <a href="javascript:buy('supply_planets','<?php echo $this->_tpl_vars['supply_planets_buy_label']; ?>
')"  class="menu2"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Buy<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>
            <a href="#"  class="menu2" onclick="if (confirm('<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Buy Maximum LUMP PURCHASE?<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>')) open_page('manage.php?buy=supply_planets&quantity=<?php echo $this->_tpl_vars['buy_max_planet_supply']; ?>
');"  class="link" onmouseover="return escape('Maximum LUMP PURCHASE: <?php echo $this->_tpl_vars['buy_max_planet_supply']; ?>
');"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Max<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>
            <a href="javascript:sell('supply_planets','<?php echo $this->_tpl_vars['supply_planets_sell_label']; ?>
')"  class="menu2"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Drop<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></td>
    </tr>
    <tr>
        <td background="../images/game/bar3.jpg" >			<table cellspacing="0" border="0">
                <tr>
                    <td><img src="../images/game/icons/planets/gov.jpg" width="32" height="32"
                             style="border:1px solid black;margin:0 5 0 0"></td>
                    <td><?php echo $this->_tpl_vars['gov_short']; ?>
 <a href="javascript:show_help('gov_planets')" class="link" onmouseover="ajax_showTooltip('galaxypedia_short.php?search=gov_planets',this);return false" onmouseout="ajax_hideTooltip()"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Government planets<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></td></tr></table></td>
        <td background="../images/game/bar4.jpg" align="right"><?php echo ((is_array($_tmp=$this->_tpl_vars['gov_planets'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</td>
        <td background="../images/game/bar3.jpg" align="right"><b><?php echo $this->_tpl_vars['cost_planet_gov']; ?>
</b></td>
        <td background="../images/game/bar3.jpg" >
            <a href="javascript:buy('gov_planets','<?php echo $this->_tpl_vars['gov_planets_buy_label']; ?>
')"  class="menu2"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Buy<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>
            <a href="#" class="menu2" onclick="if (confirm('<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Buy Maximum LUMP PURCHASE?<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>')) open_page('manage.php?buy=gov_planets&quantity=<?php echo $this->_tpl_vars['buy_max_planet_gov']; ?>
');"  class="link" onmouseover="return escape('Maximum LUMP PURCHASE: <?php echo $this->_tpl_vars['buy_max_planet_gov']; ?>
');"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Max<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>
            <a href="javascript:sell('gov_planets','<?php echo $this->_tpl_vars['gov_planets_sell_label']; ?>
')"  class="menu2"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Drop<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></td>
    </tr>
    <tr>
        <td background="../images/game/bar3.jpg" >			<table cellspacing="0" border="0">
                <tr>
                    <td><img src="../images/game/icons/planets/edu.jpg" width="32" height="32"
                             style="border:1px solid black;margin:0 5 0 0"></td>
                    <td><?php echo $this->_tpl_vars['edu_short']; ?>
 <a href="javascript:show_help('edu_planets')" class="link" onmouseover="ajax_showTooltip('galaxypedia_short.php?search=edu_planets',this);return false" onmouseout="ajax_hideTooltip()"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Education planets<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></td></tr></table></td>
        <td background="../images/game/bar4.jpg" align="right"><?php echo ((is_array($_tmp=$this->_tpl_vars['edu_planets'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</td>
        <td background="../images/game/bar3.jpg" align="right"><b><?php echo $this->_tpl_vars['cost_planet_edu']; ?>
<b></td>
                    <td background="../images/game/bar3.jpg" >
                        <a href="javascript:buy('edu_planets','<?php echo $this->_tpl_vars['edu_planets_buy_label']; ?>
')"  class="menu2"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Buy<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>
                        <a href="#" class="menu2" onclick="if (confirm('<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Buy Maximum LUMP PURCHASE?<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>')) open_page('manage.php?buy=edu_planets&quantity=<?php echo $this->_tpl_vars['buy_max_planet_edu']; ?>
');" class="link" onmouseover="return escape('Maximum LUMP PURCHASE: <?php echo $this->_tpl_vars['buy_max_planet_edu']; ?>
');" ><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Max<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>
                        <a href="javascript:sell('edu_planets','<?php echo $this->_tpl_vars['edu_planets_sell_label']; ?>
')"  class="menu2"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Drop<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></td>
                    </tr>
                    <tr>
                        <td background="../images/game/bar3.jpg" >			<table cellspacing="0" border="0">
                                <tr>
                                    <td><img
                                            src="../images/game/icons/planets/research.jpg" width="32" height="32" style="border:1px solid black;margin:0 5 0 0"></td>
                                    <td><?php echo $this->_tpl_vars['research_short']; ?>
 <a href="javascript:show_help('research_planets')" class="link" onmouseover="ajax_showTooltip('galaxypedia_short.php?search=research_planets',this);return false" onmouseout="ajax_hideTooltip()"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Research planets<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></td></tr></table></td>
                        <td background="../images/game/bar4.jpg" align="right"><?php echo ((is_array($_tmp=$this->_tpl_vars['research_planets'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</td>
                        <td background="../images/game/bar3.jpg" align="right"><b><?php echo $this->_tpl_vars['cost_planet_research']; ?>
</b></td>
                        <td background="../images/game/bar3.jpg" >
                            <a href="javascript:buy('research_planets','<?php echo $this->_tpl_vars['research_planets_buy_label']; ?>
')"  class="menu2"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Buy<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>
                            <a href="#" class="menu2" onclick="if (confirm('<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Buy Maximum LUMP PURCHASE?<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>')) open_page('manage.php?buy=research_planets&quantity=<?php echo $this->_tpl_vars['buy_max_planet_research']; ?>
');"  class="link" onmouseover="return escape('Maximum LUMP PURCHASE: <?php echo $this->_tpl_vars['buy_max_planet_research']; ?>
');"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Max<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>
                            <a href="javascript:sell('research_planets','<?php echo $this->_tpl_vars['research_planets_sell_label']; ?>
')"  class="menu2"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Drop<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></td>
                    </tr>
                    <tr>
                        <td background="../images/game/bar3.jpg" >			<table cellspacing="0" border="0">
                                <tr>
                                    <td><img
                                            src="../images/game/icons/planets/urban.jpg" width="32" height="32" style="border:1px solid black;margin:0 5 0 0"></td>
                                    <td ><?php echo $this->_tpl_vars['urban_short']; ?>
 <a href="javascript:show_help('urban_planets')" class="link" onmouseover="ajax_showTooltip('galaxypedia_short.php?search=urban_planets',this);return false" onmouseout="ajax_hideTooltip()"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Urban planets<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></td></tr></table></td>
                        <td background="../images/game/bar4.jpg" align="right"><?php echo ((is_array($_tmp=$this->_tpl_vars['urban_planets'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</td>
                        <td background="../images/game/bar3.jpg" align="right"><b><?php echo $this->_tpl_vars['cost_planet_urban']; ?>
</b></td>
                        <td background="../images/game/bar3.jpg" >
                            <a href="javascript:buy('urban_planets','<?php echo $this->_tpl_vars['urban_planets_buy_label']; ?>
')"  class="menu2"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Buy<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>
                            <a href="#" class="menu2" onclick="if (confirm('<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Buy Maximum LUMP PURCHASE?<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>')) open_page('manage.php?buy=urban_planets&quantity=<?php echo $this->_tpl_vars['buy_max_planet_urban']; ?>
');"  class="link" onmouseover="return escape('Maximum LUMP PURCHASE: <?php echo $this->_tpl_vars['buy_max_planet_urban']; ?>
');"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Max<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>
                            <a href="javascript:sell('urban_planets','<?php echo $this->_tpl_vars['urban_planets_sell_label']; ?>
')"  class="menu2"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Drop<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></td>
                    </tr>
                    <tr>
                        <td background="../images/game/bar3.jpg" >			<table cellspacing="0" border="0">
                                <tr>
                                    <td><img
                                            src="../images/game/icons/planets/petro.jpg" width="32" height="32" style="border:1px solid black;margin:0 5 0 0"></td>
                                    <td><?php echo $this->_tpl_vars['petro_short']; ?>
 <a href="javascript:show_help('petro_planets')" class="link" onmouseover="ajax_showTooltip('galaxypedia_short.php?search=petroleum_planets',this);return false" onmouseout="ajax_hideTooltip()"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Petroleum planets<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></td></tr></table></td>
                        <td background="../images/game/bar4.jpg" align="right"><?php echo ((is_array($_tmp=$this->_tpl_vars['petro_planets'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</td>
                        <td background="../images/game/bar3.jpg" align="right"><b><?php echo $this->_tpl_vars['cost_planet_petro']; ?>
</b></td>
                        <td background="../images/game/bar3.jpg" >
                            <a href="javascript:buy('petro_planets','<?php echo $this->_tpl_vars['petro_planets_buy_label']; ?>
')"  class="menu2"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Buy<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>
                            <a href="#" class="menu2" onclick="if (confirm('<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Buy Maximum LUMP PURCHASE?<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>')) open_page('manage.php?buy=petro_planets&quantity=<?php echo $this->_tpl_vars['buy_max_planet_petro']; ?>
');" class="link" onmouseover="return escape('Maximum LUMP PURCHASE: <?php echo $this->_tpl_vars['buy_max_planet_petro']; ?>
');" ><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Max<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>
                            <a href="javascript:sell('petro_planets','<?php echo $this->_tpl_vars['petro_planets_sell_label']; ?>
')"  class="menu2"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Drop<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></td>
                    </tr>
                    <tr>
                        <td background="../images/game/bar3.jpg"  style="height: 32px">			<table cellspacing="0" border="0">
                                <tr>
                                    <td><img
                                            src="../images/game/icons/planets/antipollu.jpg" width="32" height="32" style="border:1px solid black;margin:0 5 0 0"></td>
                                    <td><?php echo $this->_tpl_vars['antipollu_short']; ?>
 <a href="javascript:show_help('antipollu_planets')" class="link" onmouseover="ajax_showTooltip('galaxypedia_short.php?search=antipollu_planets',this);return false" onmouseout="ajax_hideTooltip()"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Anti-pollution planets<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></td></tr></table></td>
                        <td background="../images/game/bar4.jpg"  align="right"><?php echo ((is_array($_tmp=$this->_tpl_vars['antipollu_planets'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</td>
                        <td background="../images/game/bar3.jpg"  align="right"><b><?php echo $this->_tpl_vars['cost_planet_antipollu']; ?>
</b></td>
                        <td background="../images/game/bar3.jpg">
                            <a href="javascript:buy('antipollu_planets','<?php echo $this->_tpl_vars['antipollu_planets_buy_label']; ?>
')"  class="menu2"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Buy<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>
                            <a href="#" onclick="if (confirm('<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Buy Maximum LUMP PURCHASE?<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>')) open_page('manage.php?buy=antipollu_planets&quantity=<?php echo $this->_tpl_vars['buy_max_planet_antipollu']; ?>
');" class="menu2"  class="link" onmouseover="return escape('Maximum LUMP PURCHASE: <?php echo $this->_tpl_vars['buy_max_planet_antipollu']; ?>
');"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Max<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>
                            <a href="javascript:sell('antipollu_planets','<?php echo $this->_tpl_vars['antipollu_planets_sell_label']; ?>
')"  class="menu2"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Drop<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></td>
                    </tr>

                    </table>