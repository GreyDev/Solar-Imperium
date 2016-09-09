<?php /* Smarty version 2.6.19, created on 2009-07-18 16:38:39
         compiled from starmap.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'number_format', 'starmap.html', 20, false),array('block', 't', 'starmap.html', 329, false),)), $this); ?>
<script type="text/javascript" src="../scripts/game/wz_jsgraphics.js"></script>
<LINK href='../css/game/slider_default.css' type='text/css' rel='stylesheet'>

<script type="text/javascript" src="../scripts/game/AFLAX/aflax.js"></script>

<script type="text/javascript">

var grid;
var mouse;
var pressed;
var root;
var last_x;
var last_y;

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
,<?php echo $this->_tpl_vars['lines_data'][$this->_sections['ld']['index']]['start_y']; ?>
,<?php echo $this->_tpl_vars['lines_data'][$this->_sections['ld']['index']]['end_x']; ?>
,<?php echo $this->_tpl_vars['lines_data'][$this->_sections['ld']['index']]['end_y']; ?>
,'<?php echo $this->_tpl_vars['lines_data'][$this->_sections['ld']['index']]['color']; ?>
']<?php echo $this->_tpl_vars['lines_data'][$this->_sections['ld']['index']]['separator']; ?>

<?php endfor; endif; ?>
);

<?php echo '

var imageClip = Array();


function zoom(v) 
{
	grid.set_xscale(v);
	grid.set_yscale(v);

	var v2 = 800 - v;	
	v2 /= 12;

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
	last_y = y ;

	if (pressed == true) {
		document.getElementById(\'debug_text\').innerHTML = \'Dragging ... X:\'+x+\', Y:\'+y+\', X2:\'+x2+\', Y2:\'+y2+\', X3:\'+x3+\', Y3:\'+y3;
		grid.set_x(grid.get_x()+x3);
		grid.set_y(grid.get_y()+y3);
	} else {
		document.getElementById(\'debug_text\').innerHTML = \'Moving ... X:\'+x+\', Y:\'+y+\', X2:\'+x2+\', Y2:\'+y2;
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

function draw()
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
	grid.lineStyle(2, 0x000099, 100);

	for (var x = 25;x<500;x+=25) {
		grid.moveTo(-250+x,-244);
		grid.lineTo(-250+x,244);
		grid.moveTo(-244,-250+x);
		grid.lineTo(244,-250+x);
	}

	// draw lines
	for (var x = 0;x < lines.length;x++)
	{
		//[-305,-676,827,51,\'#3333FF\']
		var x_from = Math.round(lines[x][0]/4);		
		var y_from = Math.round(lines[x][1]/4);		
		var x_to = Math.round(lines[x][2]/4);		
		var y_to = Math.round(lines[x][3]/4);		
		var line_color = lines[x][4];	
		line_color = line_color.substring(1);
		line_color = \'0x\'+line_color;

		grid.lineStyle(3, line_color, 100);
		grid.moveTo(x_from,y_from);
		grid.lineTo(x_to,y_to);
		

	}

	// draw empires
	// emperor , empire, networth, pop, radius, posx, posy, image
	grid.lineStyle(3, 0xFFFF00, 100);


	var textLine1 = Array();
	var textLine2 = Array();
	var textLine3 = Array();

        line1_fmt = new AFLAX.FlashObject(aflax, "TextFormat");
        line1_fmt.exposeProperty("size", line1_fmt);
        line1_fmt.exposeProperty("color", line1_fmt);
        line1_fmt.exposeProperty("font", line1_fmt);
        line1_fmt.exposeProperty("align", line1_fmt);
        line1_fmt.exposeProperty("bold", line1_fmt);
	line1_fmt.setColor(0xFFFFFF);
	line1_fmt.setSize(12);
	line1_fmt.setBold(true);
	line1_fmt.setFont("Verdana");

        line2_fmt = new AFLAX.FlashObject(aflax, "TextFormat");
        line2_fmt.exposeProperty("size", line2_fmt);
        line2_fmt.exposeProperty("color", line2_fmt);
        line2_fmt.exposeProperty("font", line2_fmt);
        line2_fmt.exposeProperty("align", line2_fmt);
	line2_fmt.setColor(0xCCCCCC);
	line2_fmt.setSize(8);
	line2_fmt.setFont("Verdana");

        line3_fmt = new AFLAX.FlashObject(aflax, "TextFormat");
        line3_fmt.exposeProperty("size", line3_fmt);
        line3_fmt.exposeProperty("color", line3_fmt);
        line3_fmt.exposeProperty("font", line3_fmt);
        line3_fmt.exposeProperty("align", line3_fmt);
	line3_fmt.setColor(0xAAAAAA);
	line3_fmt.setSize(8);
	line3_fmt.setFont("Verdana");


	for (j=0;j<empires.length;j++) {

		var emperor = empires[j][0];
		var empire = empires[j][1];
		var networth = empires[j][2];
		var population = empires[j][3];
		var radius = empires[j][4];
		var pos_x = empires[j][5];
		var pos_y = empires[j][6];
		var image = empires[j][7];

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

		grid.drawCircle(pos_x,pos_y,radius);

	        textLine1[j] = new AFLAX.TextField(aflax, grid.createTextField(0, 10, 600, 250));
		textLine1[j].setText(empire);
		textLine1[j].set_x(pos_x+10);
		textLine1[j].set_y(pos_y-10);
		textLine1[j].set_xscale(50);
		textLine1[j].set_yscale(50);
		textLine1[j].callFunction("setTextFormat", line1_fmt);

	        textLine2[j] = new AFLAX.TextField(aflax, grid.createTextField(0, 10, 600, 250));
		textLine2[j].setText(\'Pop:\' + population);
		textLine2[j].set_x(pos_x+10);
		textLine2[j].set_y(pos_y-4);
		textLine2[j].set_xscale(50);
		textLine2[j].set_yscale(50);
		textLine2[j].callFunction("setTextFormat", line2_fmt);

	        textLine3[j] = new AFLAX.TextField(aflax, grid.createTextField(0, 10, 600, 250));
		textLine3[j].setText(\'Networth:\' + networth);
		textLine3[j].set_x(pos_x+10);
		textLine3[j].set_y(pos_y);
		textLine3[j].set_xscale(50);
		textLine3[j].set_yscale(50);
		textLine3[j].callFunction("setTextFormat", line3_fmt);
			
	}

	grid.set_x(400);
	grid.set_y(300);

	zoom(150);
	document.getElementById(\'vertical_slider_2\').style.top = \'150px\';
}	


function go()
{
	init();
	draw();
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


<div id="debug_text" style="display:none">Debug info</div>

<div style="margin:10px" align="center">

<table>
<tr><td style="border:1px solid white">

		<script>
			aflax.insertFlash(800, 600, "#666666", "go");
		</script>
</td><td valign="top">
<form>
<table>
<tr>
<td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Focus the starmap on empire:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
</tr>
<tr>
<td>
	<select class="input_text" id="empires_select" onChange="changeSelection(this.value)">
		<option value="-1">---</option>

	</select>
</td>
</tr>
</table>
</form>
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
