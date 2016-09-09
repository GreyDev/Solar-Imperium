<?php /* Smarty version 2.6.19, created on 2009-04-28 13:24:09
         compiled from page_register_complete.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'page_register_complete.tpl', 2, false),)), $this); ?>
<?php ob_start(); ?>
<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Registration completed<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
<?php $this->_smarty_vars['capture']['page_title'] = ob_get_contents(); ob_end_clean(); ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "frame_header.tpl", 'smarty_include_vars' => array('title' => $this->_smarty_vars['capture']['page_title'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div align="center" style="background-image:url(images/system/div_bg.jpg);background-color:darkred;padding:10px;border:1px solid red">
<div class="div_welcome_text" style="display:inline"><a class="div_welcome_link" href="login.php"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>PLAY NOW<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></div>&nbsp;<b class="text_huge" style="color:red">|</b>&nbsp;
<div class="div_welcome_text" style="display:inline"><a class="div_welcome2_link" href="take_a_tour.php"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>TAKE A TOUR<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></div>&nbsp;<b class="text_huge" style="color:red">|</b>&nbsp;
<div class="div_welcome_text" style="display:inline"><a class="div_welcome_link" href="scoreboard.php"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>SCOREBOARD<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></div>&nbsp;<b class="text_huge" style="color:red">|</b>&nbsp;
<div class="div_welcome_text" style="display:inline"><a class="div_welcome2_link" href="server_status.php"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>SERVER STATUS<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></div>&nbsp;<b class="text_huge" style="color:red">|</b>&nbsp;
<div class="div_welcome_text" style="display:inline"><a class="div_welcome_link" href="forum.php"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>FORUM<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a></div>
</div>
<br/>

<div align="center">
<div style="background-image:url(images/common/alpha1.png);width:720px;border:1px solid darkred" align="left" class="text_normal">
<br/>
<b class="text_big" style="color:white;padding:10px">
<img src="images/system/icon_button_continuegame.png" style="border:1px solid white">
<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>New Player Registration<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b>
<br/>


				<div class="text_big" style="color:#cacaca;margin:10px;padding:10px">
				<b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Congralutation, you are now a Solar Imperium registered player!<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b><br/><br/>
				<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>To start playing go to <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><b><a class="link" href="welcome.php">welcome page</a></b> <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>and login with your nickname and password, to learn how to play visit the<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <b><a class="link" target="_NEW" href="http://www.galaxypedia.com"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Galaxypedia<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></b>.<br/>
				</div>
				
				<div class="text_normal" style="color:yellow;border:1px solid #7a7a7a;padding:10px;margin:10px;background-image:url(images/common/alpha2.png);text-align:justify">
<img src="images/system/intro.png" style="border:1px solid white;margin:0 0 10 10" align="right">

<?php echo '

<script language="JavaScript1.2">

// Distributed by http://www.hypergurl.com

// Scrollers width here (in pixels)
var scrollerwidth="540px"

// Scrollers height here
var scrollerheight="400px"

// Scrollers speed here (larger is faster 1-10)
var scrollerspeed=1



// Scrollers content goes here! Keep all of the message on the same line!

'; ?>

var scrollercontent='<font style=font-size:24px;font-family:verdana,sans-serif><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>The year is now 27006. The old Imperium has long since crashed universe-wide, because of the constant battles and the complete chaos caused by over inflation and empires being so big that they imploded from poor management. All that remained were a loosely knit group of traders who chose not to become part of the previous Imperium. These traders and craftsmen have made available bare planets and terraforming equipment to new arrivals in the galaxy. The traders and craftsmen will not rule the Imperium, they are content to see new arrivals and offer their services and collect their profits in the form of taxes. They operate as a group under the guise of the Galactic Coordinator, and appear to be the Supreme Being.<br/><br/><br/>In the event you successfully invade an empire you will receive free terraforming as a reward from the Traders. The Traders put a high value on intelligence and research and will possibly let you win the game with these attributes. You may also win the game by conquest. Welcome new immigrants and begin building your empire. There are new improved methods of communications, more information and methods to manage your empire available to you. The all new GalaxyPedia is now available to you. You may use it and add your own content. The GalaxyPedia is a dynamic tool that is constantly being updated and changed. You might become tempted to do unethical things in this game such as use nuclear weapons, teleport your empire to a new location or other underhanded acts. Do so at your own risk because the Traders frown upon such things.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><br/></font>'
<?php echo '

var pauseit=1


// Change nothing below!

scrollerspeed=(document.all)? scrollerspeed : Math.max(1, scrollerspeed-1) //slow speed down by 1 for NS
var copyspeed=scrollerspeed

var iedom=document.all||document.getElementById
var actualheight=\'\'
var cross_scroller, ns_scroller
var pausespeed=(pauseit==0)? copyspeed: 0

function populate()
{

	if (iedom)
	{
		cross_scroller=document.getElementById? document.getElementById("iescroller") : document.all.iescroller
		cross_scroller.style.top=parseInt(scrollerheight)+8+"px"
		cross_scroller.innerHTML=scrollercontent
		actualheight=cross_scroller.offsetHeight
	} else if (document.layers)
	{

		ns_scroller=document.ns_scroller.document.ns_scroller2
		ns_scroller.top=parseInt(scrollerheight)+8
		ns_scroller.document.write(scrollercontent)
		ns_scroller.document.close()
		actualheight=ns_scroller.document.height
	}

	lefttime=setInterval("scrollscroller()",20)
}
window.onload=populate

var count = 0;

function scrollscroller(){

if (count++ < 2) return;
count = 0;

if (iedom){
if (parseInt(cross_scroller.style.top)>(actualheight*(-1)+8))
cross_scroller.style.top=parseInt(cross_scroller.style.top)-copyspeed+"px"
else
cross_scroller.style.top=parseInt(scrollerheight)+8+"px"
}
else if (document.layers){
if (ns_scroller.top>(actualheight*(-1)+8))
ns_scroller.top-=copyspeed
else
ns_scroller.top=parseInt(scrollerheight)+8
}
}

if (iedom||document.layers){
with (document){
if (iedom){
write(\'<div style="position:relative;width:\'+scrollerwidth+\';height:\'+scrollerheight+\';overflow:hidden">\')
write(\'<div id="iescroller" style="position:absolute;left:0px;top:0px;width:100%;">\')
write(\'</div></div>\')
}
else if (document.layers){
write(\'<ilayer width=\'+scrollerwidth+\' height=\'+scrollerheight+\' name="ns_scroller">\')
write(\'<layer name="ns_scroller2" width=\'+scrollerwidth+\' height=\'+scrollerheight+\' left=0 top=0></layer>\')
write(\'</ilayer>\')
}
}
}

</script> 
'; ?>


</div>

</b>
				<div>
				</div>
				
				
			</td></tr>
				</table>
			


</div>
		</div>

<!-- end content -->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "frame_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>