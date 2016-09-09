<?php /* Smarty version 2.6.19, created on 2009-09-13 00:33:49
         compiled from lottery.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'lottery.html', 8, false),)), $this); ?>
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

                    <td nowrap><img src="../images/game/tab_left.gif" border="0"></td>
                    <td nowrap bgcolor="darkred"  style="padding:0px 5px 0px 5px"><a  style="text-decoration:none;color:white" href="#" onClick="open_page('lottery.php')"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Lottery<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></td>
                    <td><img src="../images/game/tab_right.gif" border="0"></td>

                    <td nowrap><img src="../images/game/tab2_left.gif" border="0"></td>
                    <td nowrap bgcolor="#666666"  style="padding:0px 5px 0px 5px"><a  class="link" href="#" onClick="open_page('trade.php')"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Trade Center<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></td>
                    <td><img src="../images/game/tab2_right.gif" border="0"></td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td>
            <table width="100%" align="center" cellspacing="0" cellpadding="10"
                   style="border:1px solid darkred" background="../images/game/background1.jpg"
                   bgcolor="#333333">
                <tr>
                    <td width="120" rowspan="7" align="right"><img border="1"
                                                                   style="border:1px solid white"
                                                                   src="../images/game/lottery.jpg" border="0"></td>
                    <td></td>
                </tr>
                <tr>
                    <td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Current jackpot:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <b style="color:#ffcaca"><?php echo $this->_tpl_vars['lottery_jackpot']; ?>
</b></td>
                </tr>
                <tr>
                    <td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Tickets sold:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <b style="color:#ffcaca"><?php echo $this->_tpl_vars['lottery_tickets']; ?>
</b></td>
                </tr>
                <tr>
                    <td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Ticket price:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <b style="color:#ffcaca"><?php echo $this->_tpl_vars['lottery_ticketprice']; ?>
</b></i></td>
                </tr>
                <tr>
                    <td><b><i
                                style="font-size:14pt;font-family:sans-serif,verdana;color:white"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>A new winner every day!<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></i></b></td>
                </tr>


                <tr>
                    <td><br />
                        <br />
                        <form><input type="button" value="Buy tickets"
                                     onclick="buy_tickets('<?php echo $this->_tpl_vars['label_tickets']; ?>
')"></form>
                    </td>
                </tr>
                <tr>
                    <td><br />
                    </td>
                </tr>

            </table>
        </td>
    </tr>
</table>