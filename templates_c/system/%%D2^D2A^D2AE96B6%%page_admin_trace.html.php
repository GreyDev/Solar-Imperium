<?php /* Smarty version 2.6.19, created on 2009-06-04 23:19:10
         compiled from page_admin_trace.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'page_admin_trace.html', 2, false),array('modifier', 'date_format', 'page_admin_trace.html', 16, false),array('modifier', 'stripslashes', 'page_admin_trace.html', 18, false),)), $this); ?>
<?php ob_start(); ?>
<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Admin Section<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
<?php $this->_smarty_vars['capture']['page_title'] = ob_get_contents(); ob_end_clean(); ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "frame_header.html", 'smarty_include_vars' => array('title' => $this->_smarty_vars['capture']['page_title'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!-- begin content -->
<div style="margin:5px" class="text_normal"><a href="admin.php" class="link"><b>Back to administration</b></a></div>
<table width="100%" cellspacing="1" cellpadding="2" border="0" class="text_normal">
<tr>
<td bgcolor="#222222"  style="color:yellow"><b>Date</b></td>
<td bgcolor="#222222"  style="color:yellow"><b>Turn</b></td>
<td bgcolor="#222222"  style="color:yellow"><b>Description</b></td>
</tr>
<?php unset($this->_sections['item']);
$this->_sections['item']['name'] = 'item';
$this->_sections['item']['loop'] = is_array($_loop=$this->_tpl_vars['items']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['item']['show'] = true;
$this->_sections['item']['max'] = $this->_sections['item']['loop'];
$this->_sections['item']['step'] = 1;
$this->_sections['item']['start'] = $this->_sections['item']['step'] > 0 ? 0 : $this->_sections['item']['loop']-1;
if ($this->_sections['item']['show']) {
    $this->_sections['item']['total'] = $this->_sections['item']['loop'];
    if ($this->_sections['item']['total'] == 0)
        $this->_sections['item']['show'] = false;
} else
    $this->_sections['item']['total'] = 0;
if ($this->_sections['item']['show']):

            for ($this->_sections['item']['index'] = $this->_sections['item']['start'], $this->_sections['item']['iteration'] = 1;
                 $this->_sections['item']['iteration'] <= $this->_sections['item']['total'];
                 $this->_sections['item']['index'] += $this->_sections['item']['step'], $this->_sections['item']['iteration']++):
$this->_sections['item']['rownum'] = $this->_sections['item']['iteration'];
$this->_sections['item']['index_prev'] = $this->_sections['item']['index'] - $this->_sections['item']['step'];
$this->_sections['item']['index_next'] = $this->_sections['item']['index'] + $this->_sections['item']['step'];
$this->_sections['item']['first']      = ($this->_sections['item']['iteration'] == 1);
$this->_sections['item']['last']       = ($this->_sections['item']['iteration'] == $this->_sections['item']['total']);
?>
<tr>
<td bgcolor="#353535"  nowrap style="color:lightblue"><?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['item']['index']]['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</td>
<td bgcolor="#555555" style="color:cyan"><?php echo $this->_tpl_vars['items'][$this->_sections['item']['index']]['turn']; ?>
</td>
<td bgcolor="#444444" style="color:white"><?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['item']['index']]['description'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</td>
</tr>

<?php endfor; endif; ?>
</table>
<div style="margin:5px" class="text_normal"><a href="admin.php" class="link"><b>Back to administration</b></a></div>

<!-- end content -->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "frame_footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>