<?php /* Smarty version 2.6.19, created on 2009-09-14 17:39:42
         compiled from status.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'status.html', 8, false),array('modifier', 'number_format', 'status.html', 8, false),)), $this); ?>
<script>

    var content_top = '<table width="100%" cellspacing="0" cellpadding="0" border="0">\
                                                       <tr>\
                                                               <td>\
                                                               <table>\
                                                                       <tr>\
                                                                               <td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Net Worth:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <b style="color:#ff9999"><?php echo ((is_array($_tmp=$this->_tpl_vars['networth'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</b>,\
                                                                                       <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Turns played:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <b\
                                                                                       style="color:#ff9999"><?php echo $this->_tpl_vars['turns_played']; ?>
</b>, <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Turns left:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <b\
                                                                                       style="color:#ff9999"><?php echo $this->_tpl_vars['turns_left']; ?>
</b>, <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Protection turns left:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <b\
                                                                                       style="color:#ff9999"><?php echo $this->_tpl_vars['protection_turns_left']; ?>
</b>, <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Pop.:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <b style="color:#ff9999"><?php echo ((is_array($_tmp=$this->_tpl_vars['population'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</b> <b>(<?php echo $this->_tpl_vars['civil_status']; ?>
)</b></td>\
                                                                       </tr>\
                                                                       <tr>\
                                                                               <td>\
                               <table cellspacing="0" cellpadding="0" border="0"><tr>\
                               <td><img style="border:1px solid #666666;margin:0 5 0 5;" alt="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Credits<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" title="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Credits<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" src="../images/game/icon_credits.png"></td><td><b><?php echo ((is_array($_tmp=$this->_tpl_vars['credits'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</b></td>\
                               <td><img style="border:1px solid #666666;margin:0 5 0 5;" alt="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Food<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" title="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Food<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" src="../images/game/icon_food.png"></td><td><b><?php echo ((is_array($_tmp=$this->_tpl_vars['food'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</b></td>\
                               <td><img style="border:1px solid #666666;margin:0 5 0 5;" alt="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Ore<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" title="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Ore<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" src="../images/game/icon_ore.png"></td><td><b><?php echo ((is_array($_tmp=$this->_tpl_vars['ore'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</b></td>\
                               <td><img style="border:1px solid #666666;margin:0 5 0 5;" alt="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Petroleum<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" title="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Petroleum<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" src="../images/game/icon_petro.png"></td><td><b><?php echo ((is_array($_tmp=$this->_tpl_vars['petroleum'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</b></td>\
                               <td><img style="border:1px solid #666666;margin:0 5 0 5;" alt="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Planets total / Planets cap<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" title="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Planets total / Planets cap<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" src="../images/game/icon_planets.png"></td><td><b><?php echo ((is_array($_tmp=$this->_tpl_vars['total_planets'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
 / <?php echo ((is_array($_tmp=$this->_tpl_vars['max_planets'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</b></td>\
                               <td><img style="border:1px solid #666666;margin:0 5 0 5;" alt="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Army effectiveness<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" title="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Army effectiveness<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" src="../images/game/icon_army.png"></td><td><b><?php echo ((is_array($_tmp=$this->_tpl_vars['effectiveness'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
 %</b></td>\
                               </tr></table></td>\
                                                                       </tr>\
                                                               </table>\
                                                               </td>\
                                                               <td align="right"><a href="logo_editor.php"><img src="<?php echo $this->_tpl_vars['logo']; ?>
?<?php echo $this->_tpl_vars['timestamp']; ?>
"\
                                                                       style="border:1px solid #cacaca; margin:0 10 0 0"></a></td>\
                                                       </tr>\
                                               </table><img style=\"display:none\" src=\"update.php?<?php echo $this->_tpl_vars['timestamp']; ?>
\" border=\"0\">\
                               ';

    document.getElementById('div_status').innerHTML = Round(content_top,'gradient_grey','860px','');

    empires = new Array(
    <?php unset($this->_sections['ed']);
$this->_sections['ed']['name'] = 'ed';
$this->_sections['ed']['loop'] = is_array($_loop=$this->_tpl_vars['empires_data']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['ed']['show'] = true;
$this->_sections['ed']['max'] = $this->_sections['ed']['loop'];
$this->_sections['ed']['step'] = 1;
$this->_sections['ed']['start'] = $this->_sections['ed']['step'] > 0 ? 0 : $this->_sections['ed']['loop']-1;
if ($this->_sections['ed']['show']) {
    $this->_sections['ed']['total'] = $this->_sections['ed']['loop'];
    if ($this->_sections['ed']['total'] == 0)
        $this->_sections['ed']['show'] = false;
} else
    $this->_sections['ed']['total'] = 0;
if ($this->_sections['ed']['show']):

            for ($this->_sections['ed']['index'] = $this->_sections['ed']['start'], $this->_sections['ed']['iteration'] = 1;
                 $this->_sections['ed']['iteration'] <= $this->_sections['ed']['total'];
                 $this->_sections['ed']['index'] += $this->_sections['ed']['step'], $this->_sections['ed']['iteration']++):
$this->_sections['ed']['rownum'] = $this->_sections['ed']['iteration'];
$this->_sections['ed']['index_prev'] = $this->_sections['ed']['index'] - $this->_sections['ed']['step'];
$this->_sections['ed']['index_next'] = $this->_sections['ed']['index'] + $this->_sections['ed']['step'];
$this->_sections['ed']['first']      = ($this->_sections['ed']['iteration'] == 1);
$this->_sections['ed']['last']       = ($this->_sections['ed']['iteration'] == $this->_sections['ed']['total']);
?>
    ['<?php echo $this->_tpl_vars['empires_data'][$this->_sections['ed']['index']]['emperor']; ?>
','<?php echo $this->_tpl_vars['empires_data'][$this->_sections['ed']['index']]['empire']; ?>
','<?php echo ((is_array($_tmp=$this->_tpl_vars['empires_data'][$this->_sections['ed']['index']]['networth'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
','<?php echo ((is_array($_tmp=$this->_tpl_vars['empires_data'][$this->_sections['ed']['index']]['population'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
',<?php echo $this->_tpl_vars['empires_data'][$this->_sections['ed']['index']]['radius']; ?>
,<?php echo $this->_tpl_vars['empires_data'][$this->_sections['ed']['index']]['x']; ?>
,<?php echo $this->_tpl_vars['empires_data'][$this->_sections['ed']['index']]['y']; ?>
,<?php echo $this->_tpl_vars['empires_data'][$this->_sections['ed']['index']]['turns_played']; ?>
,'<?php echo $this->_tpl_vars['empires_data'][$this->_sections['ed']['index']]['img']; ?>
']<?php echo $this->_tpl_vars['empires_data'][$this->_sections['ed']['index']]['separator']; ?>

    <?php endfor; endif; ?>
);

    var lines = new Array(
    <?php unset($this->_sections['ld']);
$this->_sections['ld']['name'] = 'ld';
$this->_sections['ld']['loop'] = is_array($_loop=$this->_tpl_vars['lines_data']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['ld']['show'] = true;
$this->_sections['ld']['max'] = $this->_sections['ld']['loop'];
$this->_sections['ld']['step'] = 1;
$this->_sections['ld']['start'] = $this->_sections['ld']['step'] > 0 ? 0 : $this->_sections['ld']['loop']-1;
if ($this->_sections['ld']['show']) {
    $this->_sections['ld']['total'] = $this->_sections['ld']['loop'];
    if ($this->_sections['ld']['total'] == 0)
        $this->_sections['ld']['show'] = false;
} else
    $this->_sections['ld']['total'] = 0;
if ($this->_sections['ld']['show']):

            for ($this->_sections['ld']['index'] = $this->_sections['ld']['start'], $this->_sections['ld']['iteration'] = 1;
                 $this->_sections['ld']['iteration'] <= $this->_sections['ld']['total'];
                 $this->_sections['ld']['index'] += $this->_sections['ld']['step'], $this->_sections['ld']['iteration']++):
$this->_sections['ld']['rownum'] = $this->_sections['ld']['iteration'];
$this->_sections['ld']['index_prev'] = $this->_sections['ld']['index'] - $this->_sections['ld']['step'];
$this->_sections['ld']['index_next'] = $this->_sections['ld']['index'] + $this->_sections['ld']['step'];
$this->_sections['ld']['first']      = ($this->_sections['ld']['iteration'] == 1);
$this->_sections['ld']['last']       = ($this->_sections['ld']['iteration'] == $this->_sections['ld']['total']);
?>
    [<?php echo $this->_tpl_vars['lines_data'][$this->_sections['ld']['index']]['start_x']; ?>
,
     <?php echo $this->_tpl_vars['lines_data'][$this->_sections['ld']['index']]['start_y']; ?>
,
     <?php echo $this->_tpl_vars['lines_data'][$this->_sections['ld']['index']]['end_x']; ?>
,
     <?php echo $this->_tpl_vars['lines_data'][$this->_sections['ld']['index']]['end_y']; ?>
,
     <?php echo $this->_tpl_vars['lines_data'][$this->_sections['ld']['index']]['convoy_type']; ?>
]<?php echo $this->_tpl_vars['lines_data'][$this->_sections['ld']['index']]['separator']; ?>

    <?php endfor; endif; ?>
);


    var x = grid.get_x();
    var y = grid.get_y();
    var sx = grid.get_xscale();
    var sy = grid.get_yscale();
    draw(false);
    grid.set_x(x);
    grid.set_y(y);
    grid.set_xscale(sx);
    grid.set_yscale(sy);

    <?php echo '
    var select = document.getElementById(\'empires_select\');

    for (i = select.length; i > 0; i = i - 1) {
        
        select.remove(select.length-1);
    }
    
    select.options[select.options.length] = new Option(\'---\', \'-1\');
    for (j=0;j<empires.length;j++)
        select.options[j+1] = new Option(empires[j][0]+\'@\'+empires[j][1],empires[j][5]+"x"+empires[j][6]);
    '; ?>

</script>