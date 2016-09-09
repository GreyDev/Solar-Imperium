<?php /* Smarty version 2.6.19, created on 2009-05-03 21:43:11
         compiled from frame_header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_image', 'frame_header.tpl', 42, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>

	<title>Solar Imperium :: <?php echo $this->_tpl_vars['title']; ?>
</title>
	<meta content="MRG Technologies" name="author">
	<meta content="Rules the universe or prepare for annihilation" name="description">

	<link rel="stylesheet" type="text/css" href="css/system/common.css" />
	<script language="javascript" type="text/javascript" src="scripts/system/common.js"></script>
	<script language="javascript" type="text/javascript" src="scripts/system/login.js"></script>
	<script language="javascript" type="text/javascript" src="scripts/system/gamesbrowser.js"></script>
	<script language="javascript" type="text/javascript" src="scripts/system/registernow.js"></script>
	<script language="javascript" type="text/javascript" src="scripts/system/joingame.js"></script>
	<script language="javascript" type="text/javascript" src="scripts/system/welcome.js"></script>


</head>


<body>

<div id="bg_image">
<img style="width: 100%; height: 100%; position: absolute;z-order:-100" src="images/system/background.png"/>
</div>

<div id="contents">

<table align="center" width="780" cellspacing="0" cellpadding="0" border="0">
<tr>
<td><a href="index.php" style="color:#cacaca;text-decoration:none"><img src="images/common/sword.png" border="0"></a></td>
<td valign="middle" class="text_verybig" valign="top" style="color:white" width="100%">
&nbsp;
<b><a href="index.php" style="color:#cacaca;text-decoration:none">Solar Imperium</a></b>
</td>

<td nowrap>
<?php unset($this->_sections['mysec']);
$this->_sections['mysec']['name'] = 'mysec';
$this->_sections['mysec']['loop'] = is_array($_loop=$this->_tpl_vars['LANGUAGES']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['mysec']['show'] = true;
$this->_sections['mysec']['max'] = $this->_sections['mysec']['loop'];
$this->_sections['mysec']['step'] = 1;
$this->_sections['mysec']['start'] = $this->_sections['mysec']['step'] > 0 ? 0 : $this->_sections['mysec']['loop']-1;
if ($this->_sections['mysec']['show']) {
    $this->_sections['mysec']['total'] = $this->_sections['mysec']['loop'];
    if ($this->_sections['mysec']['total'] == 0)
        $this->_sections['mysec']['show'] = false;
} else
    $this->_sections['mysec']['total'] = 0;
if ($this->_sections['mysec']['show']):

            for ($this->_sections['mysec']['index'] = $this->_sections['mysec']['start'], $this->_sections['mysec']['iteration'] = 1;
                 $this->_sections['mysec']['iteration'] <= $this->_sections['mysec']['total'];
                 $this->_sections['mysec']['index'] += $this->_sections['mysec']['step'], $this->_sections['mysec']['iteration']++):
$this->_sections['mysec']['rownum'] = $this->_sections['mysec']['iteration'];
$this->_sections['mysec']['index_prev'] = $this->_sections['mysec']['index'] - $this->_sections['mysec']['step'];
$this->_sections['mysec']['index_next'] = $this->_sections['mysec']['index'] + $this->_sections['mysec']['step'];
$this->_sections['mysec']['first']      = ($this->_sections['mysec']['iteration'] == 1);
$this->_sections['mysec']['last']       = ($this->_sections['mysec']['iteration'] == $this->_sections['mysec']['total']);
?>
<?php echo '<a style="color:black;font-size:11px" href="?LANG='; ?><?php echo $this->_tpl_vars['LANGUAGES'][$this->_sections['mysec']['index']]['gettext']; ?><?php echo '">'; ?><?php echo smarty_function_html_image(array('class' => 'img_language','alt' => ($this->_tpl_vars['LANGUAGES'][$this->_sections['mysec']['index']]['name']),'file' => "images/languages/".($this->_tpl_vars['LANGUAGES'][$this->_sections['mysec']['index']]['name']).".png"), $this);?><?php echo '</a>'; ?>

<?php endfor; endif; ?>
</td>
</tr>
</table><br/>
<div align="center" id="warning_message" class="div_warning"></div>
<?php if (isset ( $this->_tpl_vars['warning_message'] )): ?>
<div align="center" class="div_warning_visible"><?php echo $this->_tpl_vars['warning_message']; ?>
</div>
<?php endif; ?>