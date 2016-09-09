<?php /* Smarty version 2.6.19, created on 2009-09-13 00:30:51
         compiled from stats.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'stats.html', 4, false),)), $this); ?>
<table  cellspacing="0" cellpadding="0" border="0">
    <tr>
        <td nowrap><img src="../images/game/tab2_left.gif" border="0"></td>
        <td nowrap bgcolor="#666666" style="padding:0px 5px 0px 5px"><a  class="link" href="#" onClick="open_page('manage.php')"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Manage<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></td>
        <td><img src="../images/game/tab2_right.gif" border="0"></td>

        <td nowrap><img src="../images/game/tab_left.gif" border="0"></td>
        <td nowrap bgcolor="darkred"  style="padding:0px 5px 0px 5px"><a  style="text-decoration:none;color:white" href="#" onClick="open_page('stats.php')"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Performance<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></td>
        <td><img src="../images/game/tab_right.gif" border="0"></td>

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

        <td nowrap><img src="../images/game/tab2_left.gif" border="0"></td>
        <td nowrap bgcolor="#666666"  style="padding:0px 5px 0px 5px"><a  class="link" href="#" onClick="open_page('edit_production.php')"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Production<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></td>
        <td><img src="../images/game/tab2_right.gif" border="0"></td>
    </tr>
</table>


<form method="post" name="form1">
    <table width="780"  bgcolor="darkred" cellspacing="1"
           cellpadding="0" border="0">
        <tr>
            <td>
                <table width="100%" align="center" cellspacing="0" cellpadding="8"
                       border="0" bgcolor="#333333" background="../images/game/background1.jpg">


                    <tr>
                        <td><a class="link" href="#" onClick="open_page('stats.php')"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Stats<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a> | <a class="link" href="#" onclick="open_page('stats.php?rankings')"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Rankings<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></td>
                    </tr>

			<?php if (isset ( $this->_tpl_vars['block_graphs'] )): ?>
                    <tr>
                        <td><b><a href="javascript:show_help('credits')" class="link" onmouseover="ajax_showTooltip('galaxypedia_short.php?search=credits',this);return false" onmouseout="ajax_hideTooltip()"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Credits flow<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></b><br />
                            <br />
                            <div align="center">
                                <div id="div_graph_credits" style="position:relative;border:1px solid #ffffff; width:600px;height:100px;background-color:#333333">
                                </div>
                            </div>
                            <br />
                            <b>
                                <a href="javascript:show_help('food_storage')" class="link" onmouseover="ajax_showTooltip('galaxypedia_short.php?search=food_storage',this);return false" onmouseout="ajax_hideTooltip()"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Food Storage<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></b><br />
                            <br />

                            <div align="center">
                                <div id="div_graph_food" style="position:relative;border:1px solid #ffffff; width:600px;height:100px;background-color:#333333">
                                </div>
                            </div>

                            <br />
                            <b><a href="javascript:show_help('networth')" class="link" onmouseover="ajax_showTooltip('galaxypedia_short.php?search=networth',this);return false" onmouseout="ajax_hideTooltip()"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Networth<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></b><br />
                            <br />
                            <div align="center">
                                <div id="div_graph_networth" style="position:relative;border:1px solid #ffffff; width:600px;height:100px;background-color:#333333">
                                </div>
                            </div>
                            <br/>
                            <b><a href="javascript:show_help('warfare')" class="link" onmouseover="ajax_showTooltip('galaxypedia_short.php?search=warfare',this);return false" onmouseout="ajax_hideTooltip()"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Military Might<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></b><br />
                            <br/>
                            <div align="center">
                                <div id="div_graph_warfare" style="position:relative;border:1px solid #ffffff; width:600px;height:100px;background-color:#333333">
                                </div>
                            </div>
                            <br/>
                            <b><a href="javascript:show_help('planet_types')" class="link" onmouseover="ajax_showTooltip('galaxypedia_short.php?search=planet_types',this);return false" onmouseout="ajax_hideTooltip()"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Planets<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></b><br />
                            <br />
                            <div align="center">
                                <div id="div_graph_planets" style="position:relative;border:1px solid #ffffff; width:600px;height:100px;background-color:#333333">
                                </div>
                            </div>
                            <br />
                            <b><a href="javascript:show_help('pop_growth')" class="link" onmouseover="ajax_showTooltip('galaxypedia_short.php?search=pop_growth',this);return false" onmouseout="ajax_hideTooltip()"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Population Growth<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></b><br />
                            <br />
                            <div align="center">
                                <div id="div_graph_population" style="position:relative;border:1px solid #ffffff; width:600px;height:100px;background-color:#333333">
                                </div>
                            </div>
                            <br />
                            <b><a href="javascript:show_help('pollution')" class="link" onmouseover="ajax_showTooltip('galaxypedia_short.php?search=pollution',this);return false" onmouseout="ajax_hideTooltip()"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Pollution<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></b><br />
                            <br />
                            <div align="center">
                                <div id="div_graph_pollution" style="position:relative;border:1px solid #ffffff; width:600px;height:100px;background-color:#333333">
                                </div>
                            </div>
                            <br />
                        </td>
                    </tr>


                    <script>
                        <?php echo '

                        function draw_graph(divtag,data)
                        {
                            var cnv = document.getElementById(divtag);
                            var dc = new jsGraphics(cnv);
                            data = data.split(\',\');
	

                            var max = 0;
                            var data_out = \'\';
	
                            for (i=0;i<40;i++)
                            {
                                if (parseInt(data[i]) <= 0) data[i] = 1;
                                if (parseInt(data[i]) > max) max = parseInt(data[i]);
                                data_out += data[i]+", ";
                            }
                            data_out += \'MAX:\'+max;

                            for (i=0;i<40;i++)
                            {
                                dc.setColor(\'#101010\');
                                dc.drawLine(7+(i*15),1,7+(i*15),99);
                                if (i != 0)
                                {
                                    d1 = data[i-1];
                                    d2 = data[i];
                                    d1 /= max;
                                    d2 /= max;
                                    pos1 = Math.round(d1*80);
                                    pos2 = Math.round(d2*80);
                                    pos1 = 90-pos1;
                                    pos2 = 90-pos2;
				
                                    if (pos1 >= pos2)
                                    {
                                        dc.setColor(\'#ffffff\');
                                        dc.drawLine(7+((i-1)*15),pos1-1,7+(i*15),pos2-1);
                                        dc.drawLine(7+((i-1)*15),pos1,7+(i*15),pos2);
                                        dc.drawLine(7+((i-1)*15),pos1+1,7+(i*15),pos2+1);
                                    }
                                    else
                                    {
                                        dc.setColor(\'#c8c8c8\');
                                        dc.drawLine(7+((i-1)*15),pos1-1,7+(i*15),pos2-1);
                                        dc.drawLine(7+((i-1)*15),pos1,7+(i*15),pos2);
                                        dc.drawLine(7+((i-1)*15),pos1+1,7+(i*15),pos2+1);
                                    }
                                }
                            }

	
                            dc.paint();
                        }

                        '; ?>


                        draw_graph('div_graph_credits','<?php echo $this->_tpl_vars['stats_credits']; ?>
');
                        draw_graph('div_graph_food','<?php echo $this->_tpl_vars['stats_food']; ?>
');
                        draw_graph('div_graph_networth','<?php echo $this->_tpl_vars['stats_networth']; ?>
');
                        draw_graph('div_graph_warfare','<?php echo $this->_tpl_vars['stats_military']; ?>
');
                        draw_graph('div_graph_planets','<?php echo $this->_tpl_vars['stats_planets']; ?>
');
                        draw_graph('div_graph_population','<?php echo $this->_tpl_vars['stats_population']; ?>
');
                        draw_graph('div_graph_pollution','<?php echo $this->_tpl_vars['stats_pollution']; ?>
');

                    </script>


			<?php endif; ?>


			<?php if (isset ( $this->_tpl_vars['block_rankings'] )): ?>
                    <tr>
                        <td><b><a class="link" href="javascript:show_help('credits')"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Rankings by credits<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></b><br />
                            <br />
                            <div align="center">
                                <div id="div_piechart_credits" style="position:relative;width:600px;height:200px;"></div>
                            </div>
                            <br />

                        </td>
                    </tr>

                    <tr>
                        <td><b><a class="link" href="javascript:show_help('networth')"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Rankings by networth<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></b><br />
                            <br />
                            <div align="center">
                                <div id="div_piechart_networth" style="position:relative;width:600px;height:200px;"></div>
                            </div>
                            <br />

                        </td>
                    </tr>

                    <tr>
                        <td><b><a class="link"  href="javascript:show_help('population')"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Rankings by population<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></b><br />
                            <br />
                            <div align="center">
                                <div id="div_piechart_population" style="position:relative;width:600px;height:200px;"></div>
                            </div>
                            <br />

                        </td>
                    </tr>

                    <tr>
                        <td><b><a class="link"  href="javascript:show_help('warfare')"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Rankings by military strength<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></b><br />
                            <br />
                            <div align="center">
                                <div id="div_piechart_warfare" style="position:relative;width:600px;height:200px;"></div>
                            </div>
                            <br />

                        </td>
                    </tr>


                    <script>
                        <?php echo '
                        /**
                         *
                         *  Base64 encode / decode
                         *  http://www.webtoolkit.info/
                         *
                         **/

                        var Base64 = {

                            // private property
                            _keyStr : "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",

                            // public method for encoding
                            encode : function (input) {
                                var output = "";
                                var chr1, chr2, chr3, enc1, enc2, enc3, enc4;
                                var i = 0;

                                input = Base64._utf8_encode(input);

                                while (i < input.length) {

                                    chr1 = input.charCodeAt(i++);
                                    chr2 = input.charCodeAt(i++);
                                    chr3 = input.charCodeAt(i++);

                                    enc1 = chr1 >> 2;
                                    enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
                                    enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
                                    enc4 = chr3 & 63;

                                    if (isNaN(chr2)) {
                                        enc3 = enc4 = 64;
                                    } else if (isNaN(chr3)) {
                                        enc4 = 64;
                                    }

                                    output = output +
                                        this._keyStr.charAt(enc1) + this._keyStr.charAt(enc2) +
                                        this._keyStr.charAt(enc3) + this._keyStr.charAt(enc4);

                                }

                                return output;
                            },

                            // public method for decoding
                            decode : function (input) {
                                var output = "";
                                var chr1, chr2, chr3;
                                var enc1, enc2, enc3, enc4;
                                var i = 0;

                                input = input.replace(/[^A-Za-z0-9\\+\\/\\=]/g, "");

                                while (i < input.length) {

                                    enc1 = this._keyStr.indexOf(input.charAt(i++));
                                    enc2 = this._keyStr.indexOf(input.charAt(i++));
                                    enc3 = this._keyStr.indexOf(input.charAt(i++));
                                    enc4 = this._keyStr.indexOf(input.charAt(i++));

                                    chr1 = (enc1 << 2) | (enc2 >> 4);
                                    chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
                                    chr3 = ((enc3 & 3) << 6) | enc4;

                                    output = output + String.fromCharCode(chr1);

                                    if (enc3 != 64) {
                                        output = output + String.fromCharCode(chr2);
                                    }
                                    if (enc4 != 64) {
                                        output = output + String.fromCharCode(chr3);
                                    }

                                }

                                output = Base64._utf8_decode(output);

                                return output;

                            },

                            // private method for UTF-8 encoding
                            _utf8_encode : function (string) {
                                string = string.replace(/\\r\\n/g,"\\n");
                                var utftext = "";

                                for (var n = 0; n < string.length; n++) {

                                    var c = string.charCodeAt(n);

                                    if (c < 128) {
                                        utftext += String.fromCharCode(c);
                                    }
                                    else if((c > 127) && (c < 2048)) {
                                        utftext += String.fromCharCode((c >> 6) | 192);
                                        utftext += String.fromCharCode((c & 63) | 128);
                                    }
                                    else {
                                        utftext += String.fromCharCode((c >> 12) | 224);
                                        utftext += String.fromCharCode(((c >> 6) & 63) | 128);
                                        utftext += String.fromCharCode((c & 63) | 128);
                                    }

                                }

                                return utftext;
                            },

                            // private method for UTF-8 decoding
                            _utf8_decode : function (utftext) {
                                var string = "";
                                var i = 0;
                                var c = c1 = c2 = 0;

                                while ( i < utftext.length ) {

                                    c = utftext.charCodeAt(i);

                                    if (c < 128) {
                                        string += String.fromCharCode(c);
                                        i++;
                                    }
                                    else if((c > 191) && (c < 224)) {
                                        c2 = utftext.charCodeAt(i+1);
                                        string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
                                        i += 2;
                                    }
                                    else {
                                        c2 = utftext.charCodeAt(i+1);
                                        c3 = utftext.charCodeAt(i+2);
                                        string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
                                        i += 3;
                                    }

                                }

                                return string;
                            }

                        }


                        function draw_piechart(divtag,data)
                        {
                            var cnv = document.getElementById(divtag);
                            var dc = new jsGraphics(cnv);
                            data = Base64.decode(data);
                            data = data.split(\';\');
                            dc.setFont("sans-serif", "10px", Font.BOLD);
	
                            var colors = new Array( \'#990000\', \'#009900\', \'#ff8080\', \'#804080\', \'#999900\', \'#009999\', \'#408080\', \'#0000ff\', \'#804000\', \'#40ff80\' );

	
                            var DEG2RAD = Math.PI / 180;
                            var offset = 0;

                            for (i=0;i<data.length;i++)
                            {
	
                                var item = data[i].split(\':\');
                                var name = item[0];

                                var value = 0;
		
                                if (item.length > 1)
                                    value = item[1];
                                else
                                    value = 1;

                                angle = Math.floor((360 / 100)*value);
                                start = offset;
                                stop = (offset + angle);
                                dc.setColor(colors[i]);
                                if (start != stop)
                                    dc.fillArc(100-75,100-75,150,150,start,stop);
                                offset += angle;
	
                                x = 210;
                                if (i >= 5) x += 210;

                                y = 45+((i%5)*25);
		
                                dc.setColor(colors[i]);
                                dc.fillRect(x+0,y+0,200,20);

                                dc.setColor(\'#000000\');
                                dc.drawString(Math.floor(value) + \'%\', x+2,y);
                                dc.setColor(\'#ffffff\');
                                dc.drawString(name, x+40,y);
                            }


                            dc.paint();
   
                        }

                        '; ?>


                        draw_piechart('div_piechart_credits','<?php echo $this->_tpl_vars['rankings_credits_data']; ?>
');
                        draw_piechart('div_piechart_networth','<?php echo $this->_tpl_vars['rankings_networth_data']; ?>
');
                        draw_piechart('div_piechart_population','<?php echo $this->_tpl_vars['rankings_population_data']; ?>
');
                        draw_piechart('div_piechart_warfare','<?php echo $this->_tpl_vars['rankings_military_data']; ?>
');

                    </script>

			<?php endif; ?>


                    <tr>
                        <td>&nbsp;</td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

    <br />
    <br />

</form>

