<?php /* Smarty version 2.6.19, created on 2009-05-24 22:31:49
         compiled from page_scoreboard.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'page_scoreboard.html', 2, false),array('modifier', 'date_format', 'page_scoreboard.html', 38, false),array('modifier', 'number_format', 'page_scoreboard.html', 71, false),)), $this); ?>
<?php ob_start(); ?>
<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Scoreboards<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
<?php $this->_smarty_vars['capture']['page_title'] = ob_get_contents(); ob_end_clean(); ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "frame_header.html", 'smarty_include_vars' => array('title' => $this->_smarty_vars['capture']['page_title'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!-- begin content -->


<div align="center" style="background-image:url(images/system/div_bg.jpg);background-color:darkred;padding:10px;border:1px solid red">
<div class="div_welcome_text" style="display:inline"><a class="div_welcome_link" href="login.php"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>PLAY NOW<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></div>&nbsp;<b class="text_huge" style="color:red">|</b>&nbsp;
<div class="div_welcome_text" style="display:inline"><a class="div_welcome2_link" href="take_a_tour.php"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>TAKE A TOUR<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></div>&nbsp;<b class="text_huge" style="color:red">|</b>&nbsp;
<div class="div_welcome_text" style="display:inline"><a class="div_welcome_link"  style="color:yellow" href="scoreboard.php"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>SCOREBOARD<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></div>&nbsp;<b class="text_huge" style="color:red">|</b>&nbsp;
<div class="div_welcome_text" style="display:inline"><a class="div_welcome2_link" href="server_status.php"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>SERVER STATUS<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></div>&nbsp;<b class="text_huge" style="color:red">|</b>&nbsp;
<div class="div_welcome_text" style="display:inline"><a class="div_welcome_link" href="forum.php"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>FORUM<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></div>
</div>

<br/>

<table cellspacing="0" width="720" cellpadding="0" border="0" align="center" background="images/common/alpha1.png" style="border:1px solid darkred">
<tr>
<td  width="100%">
<div style="padding:10px">
<b class="text_big" style="color:white">
<img src="images/system/icon_button_scoreboard.png" style="border:1px solid white">
<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Hall Of Fame<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b>
<br/>
<br/>

    <div align="center" class="text_small">
        <table class="text_small" width="700" style="border:1px solid #6a6a6a;color:#eaeaea" cellspacing="0" cellpadding="5">
        <tr>
        <td style="color:#eaeaea" background="images/system/div_bg.jpg"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Date/Time<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
        <td style="color:#eaeaea" background="images/system/div_bg.jpg"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Player<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
        <td style="color:#eaeaea" background="images/system/div_bg.jpg"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Game<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
        </tr>
        <?php unset($this->_sections['hlf']);
$this->_sections['hlf']['name'] = 'hlf';
$this->_sections['hlf']['loop'] = is_array($_loop=$this->_tpl_vars['hall_of_fame']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['hlf']['show'] = true;
$this->_sections['hlf']['max'] = $this->_sections['hlf']['loop'];
$this->_sections['hlf']['step'] = 1;
$this->_sections['hlf']['start'] = $this->_sections['hlf']['step'] > 0 ? 0 : $this->_sections['hlf']['loop']-1;
if ($this->_sections['hlf']['show']) {
    $this->_sections['hlf']['total'] = $this->_sections['hlf']['loop'];
    if ($this->_sections['hlf']['total'] == 0)
        $this->_sections['hlf']['show'] = false;
} else
    $this->_sections['hlf']['total'] = 0;
if ($this->_sections['hlf']['show']):

            for ($this->_sections['hlf']['index'] = $this->_sections['hlf']['start'], $this->_sections['hlf']['iteration'] = 1;
                 $this->_sections['hlf']['iteration'] <= $this->_sections['hlf']['total'];
                 $this->_sections['hlf']['index'] += $this->_sections['hlf']['step'], $this->_sections['hlf']['iteration']++):
$this->_sections['hlf']['rownum'] = $this->_sections['hlf']['iteration'];
$this->_sections['hlf']['index_prev'] = $this->_sections['hlf']['index'] - $this->_sections['hlf']['step'];
$this->_sections['hlf']['index_next'] = $this->_sections['hlf']['index'] + $this->_sections['hlf']['step'];
$this->_sections['hlf']['first']      = ($this->_sections['hlf']['iteration'] == 1);
$this->_sections['hlf']['last']       = ($this->_sections['hlf']['iteration'] == $this->_sections['hlf']['total']);
?>
        <tr>
        <td background="images/common/alpha2.png"><?php echo ((is_array($_tmp=$this->_tpl_vars['hall_of_fame'][$this->_sections['hlf']['index']]['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</td>
        <td background="images/common/alpha2.png"><?php echo $this->_tpl_vars['hall_of_fame'][$this->_sections['hlf']['index']]['player_name']; ?>
</td>
        <td background="images/common/alpha2.png"><?php echo $this->_tpl_vars['hall_of_fame'][$this->_sections['hlf']['index']]['game_name']; ?>
</td>
        </tr>
        <?php endfor; else: ?>
        <tr>
            <td colspan="3"  background="images/common/alpha2.png"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>No entry found<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
        </tr>
        <?php endif; ?>
        </table>
    </div>
</div>
<br/>
<br/>
    <div style="padding:10px">
    <b class="text_big" style="color:white">
    <img src="images/system/icon_button_scoreboard.png" style="border:1px solid white">
    <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Players score<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b>
    <br/><br/>
        <div align="center" class="text_small">
            <table class="text_small" width="700"  style="color:#cacaca;border:1px solid #6a6a6a" cellspacing="0" cellpadding="5">
            <tr>
            <td style="color:#eaeaea" background="images/system/div_bg.jpg"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Rank<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
            <td style="color:#eaeaea" background="images/system/div_bg.jpg"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Player<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
            <td style="color:#eaeaea" background="images/system/div_bg.jpg"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Score<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
            <td style="color:#eaeaea" background="images/system/div_bg.jpg"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Last Visit<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
            <td style="color:#eaeaea" background="images/system/div_bg.jpg"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Elapsed<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td>
            </tr>

            <?php unset($this->_sections['sc']);
$this->_sections['sc']['name'] = 'sc';
$this->_sections['sc']['loop'] = is_array($_loop=$this->_tpl_vars['scores']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['sc']['show'] = true;
$this->_sections['sc']['max'] = $this->_sections['sc']['loop'];
$this->_sections['sc']['step'] = 1;
$this->_sections['sc']['start'] = $this->_sections['sc']['step'] > 0 ? 0 : $this->_sections['sc']['loop']-1;
if ($this->_sections['sc']['show']) {
    $this->_sections['sc']['total'] = $this->_sections['sc']['loop'];
    if ($this->_sections['sc']['total'] == 0)
        $this->_sections['sc']['show'] = false;
} else
    $this->_sections['sc']['total'] = 0;
if ($this->_sections['sc']['show']):

            for ($this->_sections['sc']['index'] = $this->_sections['sc']['start'], $this->_sections['sc']['iteration'] = 1;
                 $this->_sections['sc']['iteration'] <= $this->_sections['sc']['total'];
                 $this->_sections['sc']['index'] += $this->_sections['sc']['step'], $this->_sections['sc']['iteration']++):
$this->_sections['sc']['rownum'] = $this->_sections['sc']['iteration'];
$this->_sections['sc']['index_prev'] = $this->_sections['sc']['index'] - $this->_sections['sc']['step'];
$this->_sections['sc']['index_next'] = $this->_sections['sc']['index'] + $this->_sections['sc']['step'];
$this->_sections['sc']['first']      = ($this->_sections['sc']['iteration'] == 1);
$this->_sections['sc']['last']       = ($this->_sections['sc']['iteration'] == $this->_sections['sc']['total']);
?>
            <tr>
            <td  style="color:#cacaca" background="images/common/alpha2.png" align="right"><?php echo $this->_tpl_vars['scores'][$this->_sections['sc']['index']]['rank']; ?>
</td>
            <td  style="color:#cacaca" background="images/common/alpha2.png"><?php echo $this->_tpl_vars['scores'][$this->_sections['sc']['index']]['name']; ?>
</td>
            <td  style="color:#cacaca" background="images/common/alpha2.png" align="center"><?php echo ((is_array($_tmp=$this->_tpl_vars['scores'][$this->_sections['sc']['index']]['score'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</td>
            <td  style="color:#cacaca" background="images/common/alpha2.png"><?php echo $this->_tpl_vars['scores'][$this->_sections['sc']['index']]['lastvisit']; ?>
</td>
            <td  style="color:#cacaca" background="images/common/alpha2.png"><?php echo $this->_tpl_vars['scores'][$this->_sections['sc']['index']]['lifespan']; ?>
</td>
            </tr>
            <?php endfor; else: ?>
            <tr>
                <td colspan="5" background="images/common/alpha2.png"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>No entry found<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
            </tr>
            <?php endif; ?>

            </table>
        </div>
    </div>
</td>
</tr>
</table>



<!-- end content -->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "frame_footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>