<?php /* Smarty version 2.6.19, created on 2009-09-16 22:14:48
         compiled from ingame.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'ingame.html', 197, false),array('modifier', 'number_format', 'ingame.html', 308, false),)), $this); ?>
<html>

    <head>
        <title>Solar Imperium <?php echo $this->_tpl_vars['version']; ?>
 (<?php echo $this->_tpl_vars['game_name']; ?>
) <?php echo $this->_tpl_vars['page_title']; ?>
</title>
        <link rel="stylesheet" type="text/css" href="../css/system/common.css" />
        <link rel="stylesheet" type="text/css" href="../css/game/styles.css" />

     <script  type="text/javascript" language="javascript">
        <?php echo '


        function ajax_request_page(link) {

            var obj = document.getElementById(\'div_content\');
            var obj2 = document.getElementById(\'div_content_div\');
            var occl = document.getElementById(\'div_occluder\');
            var xmlhttp = get_xmlhttp();
            xmlhttp.open(\'GET\', link);

            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    occl.style.visibility = \'visible\';
                    occl.style.display = \'block\';
                    obj.style.visibility = \'visible\';
                    obj.style.display = \'block\';
                    obj2.innerHTML = xmlhttp.responseText;                    
                    var x = obj2.getElementsByTagName("script");
                    for(var i=0;i<x.length;i++)
                    {
                        eval(x[i].text);
                    }

                    obj2.scrollTop=0;


                }
            }

            xmlhttp.send(null);

        }



        function ajax_submit_form(link, form) {

            var obj = document.getElementById(\'div_content\');
            var obj2 = document.getElementById(\'div_content_div\');
            var occl = document.getElementById(\'div_occluder\');
            var xmlhttp = get_xmlhttp();
            xmlhttp.open(\'POST\', link);

            var postData = \'\';
             var x = form.getElementsByTagName("input");
                    for(var i=0;i<x.length;i++)
                    {
                        postData += x[i].name + \'=\' + x[i].value + \'&\';
                    }

            var y = form.getElementsByTagName("select");
                    for(var i=0;i<y.length;i++)
                    {
                        postData += y[i].name + \'=\' + y[i].value + \'&\';
                    }


            var z = form.getElementsByTagName("textarea");
                    for(var i=0;i<z.length;i++)
                    {
                        postData += z[i].name + \'=\' + z[i].value + \'&\';
                    }

            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    occl.style.visibility = \'visible\';
                    occl.style.display = \'block\';
                    obj.style.visibility = \'visible\';
                    obj.style.display = \'block\';
                    obj2.innerHTML = xmlhttp.responseText;
                    var x = obj2.getElementsByTagName("script");
                    for(var i=0;i<x.length;i++)
                    {
                        eval(x[i].text);
                    }

                }
            }

            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send(postData);

        }

     function ajax_update_status() {

            var obj = document.getElementById(\'div_status\');
            var xmlhttp = get_xmlhttp();
            xmlhttp.open(\'GET\', \'status.php\');

            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    obj.innerHTML = xmlhttp.responseText;
                    var x = obj.getElementsByTagName("script");
                    for(var i=0;i<x.length;i++)
                    {
                        eval(x[i].text);
                    }

                }
            }

            xmlhttp.send(null);

        }


        function open_page(link) {
            ajax_request_page(link);
        }


        var chatIsHiding = false;
        function hide_show_chat() {
            var obj = window.top.document.getElementById("frameset1");

            if (chatIsHiding) {
                obj.rows = \'25px,*,100px\';
                parent.frames["frame_chat"].InitializeTimer();

                chatIsHiding = false;
            } else {

                obj.rows = \'25px,*,0\';
                chatIsHiding = true;
            }

            //alert(obj);
        }


        '; ?>

        </script>
        <script type="text/javascript" src="../scripts/system/common.js"></script>
        <script type="text/javascript" src="../scripts/game/common.js"></script>
        <script type="text/javascript" src="../scripts/game/ajax-dynamic-content.js"></script>
        <script type="text/javascript" src="../scripts/game/ajax.js"></script>

        <script type="text/javascript" src="../scripts/game/wz_jsgraphics.js"></script>

        <script type="text/javascript" src="../scripts/game/ajax-tooltip.js">

            /************************************************************************************************************
        (C) www.dhtmlgoodies.com, June 2006

        This is a script from www.dhtmlgoodies.com. You will find this and a lot of other scripts at our website.

        Terms of use:
        You are free to use this script as long as the copyright message is kept intact. However, you may not
        redistribute, sell or repost it without our permission.
	
        Thank you!
	
        www.dhtmlgoodies.com
        Alf Magne Kalleland
	
             ************************************************************************************************************/
        </script>

   
        <link rel="stylesheet" href="../css/game/ajax-tooltip.css" media="screen" type="text/css">

    </head>


    <body bgcolor="black" link="white" vlink="white" alink="white" text="white" style="background-attachment:fixed;"  background="../images/game/background.gif" >
        <table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0">
            <tr><td valign="top">

                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "events_data.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                        <tr>
                            <td style="height:1px" bgcolor="#333333"  colspan="2"><img src="../images/game/placeholder.gif" width="100%" style="height:1px"></td>
                        </tr>
                    </table>

                    <table width="100%" cellspacing="0" cellpadding="5" border="0" height="100%">
                        <tr><td valign="top" rowspan="2" width="120" height="100%" bgcolor="#333333" background="../images/game/background/hull.jpg" >


                                    <table cellspacing="0" cellpadding="0" border="0">

                                    <tr>
                                        <td align="center" bgcolor="darkred" style="border:3px solid #330000;padding:5px">
                                            <b>
                                                <font style="color:#ffaaaa"><?php echo $this->_tpl_vars['emperor_short']; ?>
</font><br/>
                                                <font style="color:#cacaca"> <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>of<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> </font><br/>
                                                <font style="color:#ff6666"><?php echo $this->_tpl_vars['empire_short']; ?>
</font>
                                            </b>                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><br/></td>
                                    </tr>
                                    <tr>
                                        <td align="center">
                                            <b><a class="link" href="show_active.php" TARGET="_NEW"><?php echo $this->_tpl_vars['online_players']; ?>
 <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>player(s) online<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></b>
                                            <br/>
                                        </td>
                                    </tr>
                                </table>
                                <br/>


                                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

                                <div id="div_notice" style="padding:10px;width:320px;z-index:300;position:absolute;left:100px;top:100px;display:none;background-color:#6a6a6a;border:1px solid #cacaca;color:white">
                                    <table width="100%">
                                        <tr>
                                            <td align="left">
                                    <div id="div_notice_div">
                                    </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="right">
                                    <form>
                                    <input type="button" value="Ok" onclick="document.getElementById('div_notice').style.display='none'; document.getElementById('div_occluder').style.zIndex=100;">
                                    </form>
                                            </td>
                                        </tr>
                                    </table>
                                </div>

                                <div id="div_occluder" style="width:100%;height:100%;z-index:50;position:absolute;left:0px;top:0px;display:none;background-image:url(../images/game/trans2.png)">
                                </div>

                                <div id="div_content" style="z-index:100;display:none;position:absolute;left:20px;top:20px;">
                                    <table width="820" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td background="../images/game/popup/events/pixmaps.active_top_left.png"><img src="../images/game/placeholder.gif" border="0" width="6" height="1"></td>
                                            <td background="../images/game/popup/events/pixmaps.active_top_orig.png" valign="top" width="100%">
                                                <table width="100%" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td width="100%">
                                                            &nbsp;

                                                        </td>
                                                        <td align="right">
                                                            <a href="#" onclick="document.getElementById('div_content').style.display='none';document.getElementById('div_occluder').style.display='none';ajax_update_status()"><img src="../images/game/popup/events/buttons.close.png" border="0"></a>
                                                        </td>
                                                    </tr>
                                                </table>

                                            </td>
                                            <td background="../images/game/popup/events/pixmaps.active_top_right.png" valign="top"><img src="../images/game/placeholder.gif" border="0" width="6" height="1"></td>
                                        </tr>


                                        <tr><td colspan="3" width="100%">
                                                <table width="100%" cellspacing="0"  cellpadding="0" border="0">
                                                    <tr>
                                                        <td style="width:4px" background="../images/game/popup/events/pixmaps.active_left.png"><img src="../images/game/placeholder.gif" border="0" width="4" height="1"></td>
                                                        <td valign="top" width="100%"  bgcolor="#333333">

                                                            <div id="div_content_div" style="padding:10px;overflow:auto;height:600px">
                                                            </div>
                                                        </td>
                                                        <td style="width:4px" background="../images/game/popup/events/pixmaps.active_right.png"><img src="../images/game/placeholder.gif" border="0" width="4" height="1"></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>

                                        <tr><td colspan="3" width="100%">
                                                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                    <tr>
                                                        <td background="../images/game/popup/events/pixmaps.active_bottom_left.png"><img src="../images/game/placeholder.gif" border="0" width="4" height="6"></td>
                                                        <td width="100%" background="../images/game/popup/events/pixmaps.active_bottom.png"><img src="../images/game/placeholder.gif" border="0" width="4" height="6"></td>
                                                        <td background="../images/game/popup/events/pixmaps.active_bottom_right.png"><img src="../images/game/placeholder.gif" border="0" width="4" height="6"></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <br/><br/>
                                </div>

                                <br/>
                                <!-- PBBGExchange Code Begin -->
                                <div align="center">
                                    <IFRAME SRC="http://www.pbbgexchange.com/work.php?n=73&size=2&nl=0&c=" width=100 height=107 marginwidth=0 marginheight=0 hspace=0 vspace=0 frameborder=0 scrolling="no"></IFRAME>
                                    <!-- PBBGExchange Code End -->
                                </div>
                            </td>
                            <td align="left" width="100%" valign="top">

                                <div style="display:block" id="div_status">
                                </div>

                                <script language="javascript">
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


                                </script>

                                <?php echo $this->_tpl_vars['events_script']; ?>

                                <?php echo $this->_tpl_vars['page_content']; ?>


                                <br/>
                                <br/>
                            </td>
                        </tr>
                    </table>                    
                    <script language="javascript" src="../scripts/game/wz_tooltip.js"></script>
                </td></tr>
        </table>
    </body>
</html>