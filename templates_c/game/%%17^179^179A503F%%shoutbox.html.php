<?php /* Smarty version 2.6.19, created on 2009-09-13 00:35:10
         compiled from shoutbox.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'shoutbox.html', 4, false),)), $this); ?>
<table  cellspacing="0" cellpadding="0" border="0">
    <tr>
        <td nowrap><img src="../images/game/tab2_left.gif" border="0"></td>
        <td nowrap bgcolor="#666666" style="padding:0px 5px 0px 5px"><a  class="link" href="#" onclick="open_page('messages.php')"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Messages<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></td>
        <td><img src="../images/game/tab2_right.gif" border="0"></td>

        <td nowrap><img src="../images/game/tab2_left.gif" border="0"></td>
        <td nowrap bgcolor="#666666"  style="padding:0px 5px 0px 5px"><a  class="link" href="#" onclick="open_page('diplomacy.php')"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Diplomatic Ties<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></td>
        <td><img src="../images/game/tab2_right.gif" border="0"></td>

        <td nowrap><img src="../images/game/tab_left.gif" border="0"></td>
        <td nowrap bgcolor="darkred"  style="padding:0px 5px 0px 5px"><a   style="text-decoration:none;color:white" href="#" onclick="open_page('shoutbox.php')"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Coalition Shoutbox<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></td>
        <td><img src="../images/game/tab_right.gif" border="0"></td>
    </tr>
</table>


<form method="POST" name="form1" onsubmit="ajax_submit_form('shoutbox.php',this); return false;">
    <table id="table_shoutbox" style="border:1px solid darkred" bgcolor="#111111" width="780">
        <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['items']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
        <tr>
            <td><img src="../images/game/empires/<?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['game_id']; ?>
/<?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['empire_id']; ?>
.jpg" width="16" height="16" style="border:1px solid white"></td>
            <td nowrap style="color:white"><b><?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['timedate']; ?>
</b></td>
            <td nowrap style="color:red">|</td>
            <td nowrap><b style="color:white"><?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['player']; ?>
</b></td>
            <td nowrap style="color:red">|</td>
            <td width="100%" style="color:<?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['color']; ?>
"><?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['message']; ?>
</td>
        </tr>
        <?php endfor; endif; ?>
    </table>
    <table>
        <tr>
            <td><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Message:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>&nbsp;</b></td>
            <td><input type="text" onkeypress="clearTimeout(timer1)" name="chatbox" class="input_text" style="width:500px"></td>
            <td><input type="button" value="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Refresh<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" onclick="open_page('shoutbox.php')"></td>
        </tr>
    </table>
</form>
<script>
    <?php echo '
    var timer1 = null;

    function sf() {
    }
    document.form1.chatbox.focus();



    function update_shoutbox() {

        if (document.getElementById(\'table_shoutbox\') == null)
            clearTimeout(timer1);
        else
            open_page(\'shoutbox.php\');
    }

    '; ?>


    sf();

    timer1 = setTimeout("update_shoutbox();", Math.ceil(parseFloat(10) * 1000));
</script>