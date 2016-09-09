<?php /* Smarty version 2.6.19, created on 2009-06-12 12:29:49
         compiled from covertop/relationsspying.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'covertop/relationsspying.html', 1, false),)), $this); ?>
<br/><b style="color:yellow"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Relations Spying<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b><br/><br/>
<table width="640" style="font-size:13px;font-family:verdana;color:white">
<tr><td><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>From<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td><td><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>To<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td><td><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Type<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td><td><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Status<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></td></tr>
<?php unset($this->_sections['rel']);
$this->_sections['rel']['name'] = 'rel';
$this->_sections['rel']['loop'] = is_array($_loop=$this->_tpl_vars['relations']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['rel']['show'] = true;
$this->_sections['rel']['max'] = $this->_sections['rel']['loop'];
$this->_sections['rel']['step'] = 1;
$this->_sections['rel']['start'] = $this->_sections['rel']['step'] > 0 ? 0 : $this->_sections['rel']['loop']-1;
if ($this->_sections['rel']['show']) {
    $this->_sections['rel']['total'] = $this->_sections['rel']['loop'];
    if ($this->_sections['rel']['total'] == 0)
        $this->_sections['rel']['show'] = false;
} else
    $this->_sections['rel']['total'] = 0;
if ($this->_sections['rel']['show']):

            for ($this->_sections['rel']['index'] = $this->_sections['rel']['start'], $this->_sections['rel']['iteration'] = 1;
                 $this->_sections['rel']['iteration'] <= $this->_sections['rel']['total'];
                 $this->_sections['rel']['index'] += $this->_sections['rel']['step'], $this->_sections['rel']['iteration']++):
$this->_sections['rel']['rownum'] = $this->_sections['rel']['iteration'];
$this->_sections['rel']['index_prev'] = $this->_sections['rel']['index'] - $this->_sections['rel']['step'];
$this->_sections['rel']['index_next'] = $this->_sections['rel']['index'] + $this->_sections['rel']['step'];
$this->_sections['rel']['first']      = ($this->_sections['rel']['iteration'] == 1);
$this->_sections['rel']['last']       = ($this->_sections['rel']['iteration'] == $this->_sections['rel']['total']);
?>
<tr>
<td style="color:cyan"><?php echo $this->_tpl_vars['relations'][$this->_sections['rel']['index']]['from']; ?>
</td>
<td style="color:cyan"><?php echo $this->_tpl_vars['relations'][$this->_sections['rel']['index']]['to']; ?>
</td>
<td style="color:cyan"><?php echo $this->_tpl_vars['relations'][$this->_sections['rel']['index']]['type']; ?>
</td>
<td style="color:cyan"><?php echo $this->_tpl_vars['relations'][$this->_sections['rel']['index']]['status']; ?>
</td>
</tr>
<?php endfor; else: ?>
<tr><td colspan="4">
<b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>*** No active relations ***<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b>
</td></tr>
<?php endif; ?>

</table><br/><br/>