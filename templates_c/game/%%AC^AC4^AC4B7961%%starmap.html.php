<?php /* Smarty version 2.6.19, created on 2009-10-12 18:58:50
         compiled from starmap.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'number_format', 'starmap.html', 28, false),array('block', 't', 'starmap.html', 474, false),)), $this); ?>
<html>
    <head><title>Starmap</title></head>
    <body>

        <div style="padding:100px">

<script type="text/javascript" src="../scripts/game/wz_jsgraphics.js"></script>
<LINK href='../css/game/slider_default.css' type='text/css' rel='stylesheet'>

<script type="text/javascript" src="../scripts/game/AFLAX/aflax.js"></script>
<script type="text/javascript" src="../scripts/game/sylvester.js"></script>

<script type="text/javascript">

    var grid;
    var mouse;
    var pressed;
    var root;
    var last_x;
    var last_y;
    var empire_shown;

    var aflax = new AFLAX('../scripts/game/AFLAX/aflax.swf');


    var empires = new Array(
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
,
     <?php echo $this->_tpl_vars['lines_data'][$this->_sections['ld']['index']]['percent']; ?>
]<?php echo $this->_tpl_vars['lines_data'][$this->_sections['ld']['index']]['separator']; ?>

    <?php endfor; endif; ?>
);

    <?php echo '

    var imageClip = Array();
    var lineClip = Array();



    function showEmpirePopup(i,x,y)
    {
        empire_shown = true;
        var emperor = empires[j][0];
        var empire = empires[j][1];
        var networth = empires[j][2];
        var population = empires[j][3];
        var radius = empires[j][4];
        var pos_x = empires[j][5];
        var pos_y = empires[j][6];
        var turns = empires[j][7];
        var image = empires[j][8];

        var obj = document.getElementById(\'div_empire\');


        var width = obj.style.width;
        var height = obj.style.height;
        width = width.replace(\'px\',\'\');
        height = height.replace(\'px\',\'\');

        obj.style.left = parseInt(x) + (parseInt(width)/2);
        obj.style.top = parseInt(y) + (parseInt(height));
        obj.style.display = \'block\';

        document.getElementById(\'div_empire_emperor\').innerHTML = emperor;
        document.getElementById(\'div_empire_empire\').innerHTML = empire;
        document.getElementById(\'div_empire_networth\').innerHTML = networth;
        document.getElementById(\'div_empire_population\').innerHTML = population;
        document.getElementById(\'div_empire_turns_played\').innerHTML = turns;

    }


    function hideEmpirePopup()
    {
        document.getElementById(\'div_empire\').style.display = \'none\';
        empire_shown = false;
    }

    function zoom(v)
    {
        grid.set_xscale(v);
        grid.set_yscale(v);

        var v2 = 1000 - v;

        v2 /= 12;

        var v3 = v2 - 50;
        v2 = 50 + (v3 * 0.2);

        document.getElementById(\'debug_text\').innerHTML = \'Zoom: \' + v + \' / \' + v2;

        for (j=0;j<imageClip.length;j++) {
            imageClip[j].set_xscale(v2);
            imageClip[j].set_yscale(v2);
        }

    }

    function changeSelection(v)
    {
        if (v == -1) { resetView(); return; }
        var a = v.split(\'x\');
        var x = Math.round(a[0]/2);
        var y = Math.round(a[1]/2);
        grid.set_x(250-x);
        grid.set_y(250-y);
        grid.set_xscale(200);
        grid.set_yscale(200);

        document.getElementById(\'vertical_slider_2\').style.top = \'120px\';
    }



    function init()
    {

        var s = document.getElementById(\'empires_select\');
        for (j=0;j<empires.length;j++)
            s.options[j+1] = new Option(empires[j][0]+\'@\'+empires[j][1],empires[j][5]+"x"+empires[j][6],false,false);

        last_x = -1;
        last_y = -1;

        grid = new AFLAX.MovieClip(aflax);
        root = aflax.getRoot();

        grid.set_xscale(50);
        grid.set_yscale(50);

        grid.addEventHandler(\'onPress\',\'onMousePress\');
        grid.addEventHandler(\'onRelease\',\'onMouseRelease\');
        grid.addEventHandler(\'onReleaseOutside\',\'onMouseReleaseOutside\');
        grid.addEventHandler(\'onMouseMove\',\'onMouseMove\');
        pressed = false;
    }

    function onMouseMove()
    {
        var x = root.get_xmouse();
        var y = root.get_ymouse();
        var x2 = grid.get_xmouse();
        var y2 = grid.get_ymouse();

        if (last_x == -1) last_x = x;
        if (last_y == -1) last_y = y;

        var x3 = x-last_x;
        var y3 = y-last_y;
        last_x = x;
        last_y = y;

        if (pressed == true) {
            document.getElementById(\'debug_text\').innerHTML = \'Dragging ... X:\'+x+\', Y:\'+y+\', X2:\'+x2+\', Y2:\'+y2+\', X3:\'+x3+\', Y3:\'+y3;
            grid.set_x(grid.get_x()+x3);
            grid.set_y(grid.get_y()+y3);
        } else {

            var xx = x2*4; // - 400;
            var yy = y2*4; // - 300;
            var output = \'Moving ... X:\'+xx+\', Y:\'+yy + \'<br/>\';

            for (j=0;j<empires.length;j++) {

                var emperor = empires[j][0];
                var empire = empires[j][1];
                var networth = empires[j][2];
                var population = empires[j][3];
                var radius = empires[j][4];
                var pos_x = empires[j][5];
                var pos_y = empires[j][6];
                var turns = empires[j][7];
                var image = empires[j][8];
                if (radius < 25) radius = 25;


                if (((xx >= pos_x-32) && (xx <= (pos_x+32))) && ((yy >= pos_y-32) && (yy <= (pos_y+32)))) {
                    output += \'OVER ... X:\'+pos_x+\', Y:\'+pos_y+\'<br/>\';
                    showEmpirePopup(j,x,y);
                    break;

                } else {
                    output += \'(EMPIRE \' + j + \' ... X:\'+pos_x+\', Y:\'+pos_y+\')<br/>\';
                    hideEmpirePopup();
                }


            }

            document.getElementById(\'debug_text\').innerHTML = output;

        }

    }


    function onMouseRelease()
    {
        pressed = false;
    }

    function onMouseReleaseOutside()
    {
        pressed = false;
    }

    function onMousePress()
    {
        pressed = true;

        var x = root.get_xmouse();
        var y = root.get_ymouse();
        var x2 = grid.get_xmouse();
        var y2 = grid.get_ymouse();

    }


    function resetView()
    {
        grid.set_x(400);
        grid.set_y(250);
        grid.set_xscale(50);
        grid.set_yscale(50);
        document.getElementById(\'vertical_slider_2\').style.top = \'220px\';

    }

    function resolveAngle(x,  y) {


        y = -y;

        var angle =  (Math.atan(y / x)) * 57.2957;
        if ((x < 0) && (y >= 0)) {
            angle += 180;
        }
        if ((x >= 0) && (y < 0)) {
            angle += 360;
        }
        if ((x < 0) && (y < 0)) {
            angle += 180;
        }

        if (angle > 360) {
            angle -= 360;
        }
        if (angle < 0) {
            angle += 360;
        }

        angle /= 10;
        angle = Math.round(angle);
        angle *= 10;

        return angle;
    }



    function draw(updateZoom)
    {
        grid.set_x(0);
        grid.set_y(0);

        // draw borders
        grid.beginFill(0x111111);
        grid.lineStyle(2, 0x999999, 100);
        grid.moveTo(-250, -250);
        grid.lineTo(-250, 250);
        grid.lineTo(250, 250);
        grid.lineTo(250, -250);
        grid.lineTo(-250, -250);
        grid.endFill();

        // draw grid

        for (var x = 50;x<500;x+=50) {

            grid.lineStyle(2, 0x111122, 100);

            grid.moveTo(-250+x,-244);
            grid.lineTo(-250+x,244);

            grid.moveTo(-244,-250+x);
            grid.lineTo(244,-250+x);
        }

        grid.lineStyle(2, 0x222233, 100);
        grid.moveTo(0,-244);
        grid.lineTo(0,244);
        grid.moveTo(-244,0);
        grid.lineTo(244,0);


   // draw empires
        // emperor , empire, networth, pop, radius, posx, posy, image
        grid.lineStyle(2, 0xFFFF00, 100);




        for (j=0;j<empires.length;j++) {

            var empire = empires[j][0];
            var emperor = empires[j][1];
            var networth = empires[j][2];
            var population = empires[j][3];
            var radius = empires[j][4];
            var pos_x = empires[j][5];
            var pos_y = empires[j][6];
            var turns = empires[j][7];
            var image = empires[j][8];
            if (radius < 25) radius = 25;

            var w = 500;
            var h = 500;

            // 1) Scale positions
            pos_x = pos_x / (2000 / w);
            pos_y = pos_y / (2000 / h);


            // 2) draw image
            imageClip[j] = new AFLAX.MovieClip(aflax,grid.id);
            imageClip[j].loadMovie(image);
            imageClip[j].set_x(pos_x-8);
            imageClip[j].set_y(pos_y-8);
            imageClip[j].set_xscale(50);
            imageClip[j].set_yscale(50);
            grid.drawCircle(pos_x,pos_y,radius * 0.52);


        }


        // draw lines
        for (var x = 0;x < lines.length;x++)
        {
            var x_from = Math.round(lines[x][0]/4);
            var y_from = Math.round(lines[x][1]/4);
            var x_to = Math.round(lines[x][2]/4);
            var y_to = Math.round(lines[x][3]/4);
            var ctype = lines[x][4];
            var percent = lines[x][5];
            var x_current = x_from + Math.floor(((x_to-x_from)/100) * percent);
            var y_current = y_from + Math.floor(((y_to-y_from)/100) * percent);

            var xx = x_to - x_from;
            var yy = y_to - y_from;
            var angle = resolveAngle(xx,yy);



            // Convoy type: Trade
            if (ctype == -2) {
                grid.lineStyle(3, 0x009900, 100);
                lineClip[x] = new AFLAX.MovieClip(aflax,grid.id);
                lineClip[x].loadMovie(\'../images/common/tradeconvoy/\'+angle+\'.png\');
                lineClip[x].set_x(x_current-12);
                lineClip[x].set_y(y_current-10);
                lineClip[x].set_xscale(20);
                lineClip[x].set_yscale(20);
            }
            // Convoy type: Diplomacy
            if (ctype == -1) {
                    grid.lineStyle(3, 0x333333, 100);
            }

            // Convoy type: Invasion
            if (ctype == 0) {

                grid.lineStyle(3, 0xCC0000, 100);
                lineClip[x] = new AFLAX.MovieClip(aflax,grid.id);
                lineClip[x].loadMovie(\'../images/common/armyconvoy/\'+angle+\'.png\');
                lineClip[x].set_x(x_current-12);
                lineClip[x].set_y(y_current-10);
                lineClip[x].set_xscale(20);
                lineClip[x].set_yscale(20);

            }

            // Convoy type: Defense
            if (ctype == 1) {
                grid.lineStyle(3, 0x0000CC, 100);
                lineClip[x] = new AFLAX.MovieClip(aflax,grid.id);
                lineClip[x].loadMovie(\'../images/common/armyconvoy/\'+angle+\'.png\');
                lineClip[x].set_x(x_current-12);
                lineClip[x].set_y(y_current-10);
                lineClip[x].set_xscale(20);
                lineClip[x].set_yscale(20);
            }

            // Convoy type: Invasion retreat
            if (ctype == 2) {
                grid.lineStyle(3, 0x660000, 100);
                lineClip[x] = new AFLAX.MovieClip(aflax,grid.id);
                lineClip[x].loadMovie(\'../images/common/armyconvoy/\'+angle+\'.png\');
                lineClip[x].set_x(x_current-12);
                lineClip[x].set_y(y_current-10);
                lineClip[x].set_xscale(20);
                lineClip[x].set_yscale(20);
            }

            // Convoy type: Defense retreat
            if (ctype == 3) {
                grid.lineStyle(3, 0x000066, 100);
                lineClip[x] = new AFLAX.MovieClip(aflax,grid.id);
                lineClip[x].loadMovie(\'../images/common/armyconvoy/\'+angle+\'.png\');
                lineClip[x].set_x(x_current-12);
                lineClip[x].set_y(y_current-10);
                lineClip[x].set_xscale(20);
                lineClip[x].set_yscale(20);
            }


            grid.moveTo(x_from,y_from);
            grid.lineTo(x_current,y_current);


        }



        grid.set_x(400);
        grid.set_y(300);

        if (updateZoom == true) {
            zoom(150);
            document.getElementById(\'vertical_slider_2\').style.top = \'150px\';
        }

    }


    function go()
    {
        init();
        draw(true);
    }

    var old_v = -1;

    function update_flash(v)
    {
        if (old_v == v) return;

        zoom(v);
        old_v = v;
    }

    '; ?>


</script>
<script type="text/javascript" src="../scripts/game/slider.js"></script>


<div align="left">
    <form>
        <table bgcolor="#7a7a7a" style="border:1px solid #9a9a9a;padding:5px;margin-bottom:5px">
            <tr>
                <td style="color:#eaeaea"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Focus the starmap on empire:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
                <td>
                    <select class="input_text" id="empires_select" onChange="changeSelection(this.value)">
                        <option value="-1">---</option>

                    </select>
                </td>
            </tr>
        </table>
    </form>

    <table>
        <tr><td style="border:1px solid white">

                <script language="javascript">
                    aflax.insertFlash(800, 500, "#333333", "go");
                </script>
            </td><td valign="top">
                <table>
                    <tr>
                        <td>
                            <div class="display_holder"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Zoom<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></div>
                        </td>
                    </tr><tr>
                        <td>

                            <!-- Vertical slider 2 (default color - grey) -->
                            <div class="vertical_track" style="height: 220px" >
                                <div class="vertical_slit" style="height: 220px" >&nbsp;</div>
                                <!-- Total movement: 50 pixels, range: -250 .. 250
			total allowed number of values: 51, 0 decimals,
			default position: 25 pixels from the top (value: 0) -->

                                <div class="vertical_slider" id="vertical_slider_2" style="top: 220px;"
                                     onmousedown="slide(event, 'vertical', 220, 50, 400, 90, 0, 'vertical_display_2');">&nbsp;</div>
                            </div>
                            <div class="display_holder" style="display:block">
                                <input type="text" class="value_display" id="vertical_display_2" value="160" onfocus="blur(this);" />
                            </div>
                        </td>
                    </tr><tr>
                        <td>
                            <div class="display_holder"><a style="color:black" href="javascript:resetView()"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Reset<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></div>
                        </td>
                    </tr>
                </table>

            </td>
        </tr>
    </table>
</div>

<table style="padding:2px;border:1px solid black; background-color: #9f9f9f;width:806px;color:#000000">
    <tr>
        <td bgcolor="#333333" style="width:16px;height:16px">&nbsp;</td>
        <td  class="text_small">Diplomatic Ties</td>
        <td bgcolor="#CC0000" style="width:16px;height:16px">&nbsp;</td>
        <td class="text_small">Invasion Convoy</td>
        <td bgcolor="#660000" style="width:16px;height:16px">&nbsp;</td>
        <td class="text_small">Invasion (Retreating)</td>
        <td bgcolor="#0000CC" style="width:16px;height:16px">&nbsp;</td>
        <td class="text_small">Defense Convoy</td>
        <td bgcolor="#000066" style="width:16px;height:16px">&nbsp;</td>
        <td class="text_small">Defense (Retreating)</td>
        <td bgcolor="#009900" style="width:16px;height:16px">&nbsp;</td>
        <td class="text_small">Trade Convoy</td>
    </tr>
</table>


<div id="debug_text" style="display:none">Debug info</div>

<div id="div_empire" style="position:absolute;left:100px;top:100px;width:280px;z-index:500;height:130px;display:none;background-color:#333333;border:1px solid white">

    <table style="padding:5px">
        <tr>
            <td style="color:#ababab">Emperor/ess:</td>
            <td id="div_empire_emperor">EMPEROR</td>
        </tr>

        <tr>
            <td style="color:#ababab">Empire:</td>
            <td id="div_empire_empire">EMPIRE</td>
        </tr>

        <tr>
            <td style="color:#ababab">Networth:</td>
            <td id="div_empire_networth">NETWORTH</td>
        </tr>

        <tr>
            <td style="color:#ababab">Population:</td>
            <td id="div_empire_population">POP</td>
        </tr>


        <tr>
            <td style="color:#ababab">Turns Played:</td>
            <td id="div_empire_turns_played">TURNS</td>
        </tr>


    </table>

</div>

<script>
    setTimeout('ajax_update_status()', 60000);

</script>

        </div>
</body>
</html>