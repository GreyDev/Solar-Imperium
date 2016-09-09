<?php /* Smarty version 2.6.19, created on 2009-09-16 21:59:15
         compiled from events_data.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'events_data.html', 100, false),)), $this); ?>
<script type="text/javascript">

    var events_data_content_system = '';
    var events_data_content_warfare = '';
    var events_data_content_communication = '';
    var events_data_content_diplomacy = '';


    <?php echo '
    function onClickSystem()
    {
        document.getElementById(\'link_system\').style.color = \'white\';
        document.getElementById(\'link_warfare\').style.color = \'#999999\';
        document.getElementById(\'link_communication\').style.color = \'#999999\';
        document.getElementById(\'link_diplomacy\').style.color = \'#999999\';
        document.getElementById(\'events_content\').innerHTML = events_data_content_system;
    }

    function onClickWarfare()
    {
        if (events_data_content_warfare == \'\') return;
        document.getElementById(\'link_system\').style.color = \'#999999\';
        document.getElementById(\'link_warfare\').style.color = \'white\';
        document.getElementById(\'link_communication\').style.color = \'#999999\';
        document.getElementById(\'link_diplomacy\').style.color = \'#999999\';
        document.getElementById(\'events_content\').innerHTML = events_data_content_warfare;
    }

    function onClickCommunication()
    {
        if (events_data_content_communication == \'\') return;
        document.getElementById(\'link_system\').style.color = \'#999999\';
        document.getElementById(\'link_warfare\').style.color = \'#999999\';
        document.getElementById(\'link_communication\').style.color = \'white\';
        document.getElementById(\'link_diplomacy\').style.color = \'#999999\';
        document.getElementById(\'events_content\').innerHTML = events_data_content_communication;
    }

    function onClickDiplomacy()
    {
        if (events_data_content_diplomacy == \'\') return;
        document.getElementById(\'link_system\').style.color = \'#999999\';
        document.getElementById(\'link_warfare\').style.color = \'#999999\';
        document.getElementById(\'link_communication\').style.color = \'#999999\';
        document.getElementById(\'link_diplomacy\').style.color = \'white\';
        document.getElementById(\'events_content\').innerHTML = events_data_content_diplomacy;
    }



    function renderEvents(height)
    {
        if ((events_data_content_system == \'\') && (events_data_content_warfare == \'\') && (events_data_content_communication == \'\') && (events_data_content_diplomacy == \'\')) return;

        document.getElementById(\'events_data\').style.height = height;
        document.getElementById(\'events_data\').style.visibility = \'visible\';
        document.getElementById(\'events_data\').style.display = \'block\';
        document.getElementById(\'div_occluder\').style.zIndex = \'205\';
        if (events_data_content_system != \'\') onClickSystem();
        if (events_data_content_warfare != \'\') onClickWarfare();
        if (events_data_content_communication != \'\') onClickCommunication();
        if (events_data_content_diplomacy != \'\') onClickDiplomacy();
    }

    '; ?>


</script>


<div id="events_data" class="floating_events" style="z-index: 210; display: none">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td background="../images/game/popup/events/pixmaps.active_top_left.png"><img src="../images/game/placeholder.gif" border="0" width="6" height="1"></td>
            <td background="../images/game/popup/events/pixmaps.active_top.png" valign="top" width="100%">
                <table width="100%" cellspacing="0" cellpadding="0">
                    <tr>
                        <td><img src="../images/game/popup/events/icon.png" border="0"></td>
                        <td width="100%">
                            &nbsp;

                        </td>
                        <td align="right"><a href="#" onclick="document.getElementById('events_data').style.display='none';    document.getElementById('div_occluder').style.zIndex = '100';
                                             "><img src="../images/game/popup/events/buttons.close.png" border="0"></a>
                        </td>
                    </tr>
                </table>

            </td>
            <td background="../images/game/popup/events/pixmaps.active_top_right.png" valign="top"><img src="../images/game/placeholder.gif" border="0" width="6" height="1"></td>
        </tr>


        <tr><td colspan="3" width="100%">
                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                    <tr>
                        <td style="width:4px" background="../images/game/popup/events/pixmaps.active_left.png"><img src="../images/game/placeholder.gif" border="0" width="4" height="1"></td>
                        <td bgcolor="#333333">
                            &nbsp;
                            <b style="color:#999999">
                                <a href="#" style="color:#999999" id="link_system" onClick="onClickSystem();return false;"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>System<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> (<b id="events_count_content_system"></b>)</a>
                                &nbsp;|&nbsp;
                                <a href="#" style="color:#999999" id="link_warfare" onClick="onClickWarfare();return false;"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Warfare<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> (<b id="events_count_content_warfare"></b>)</a>
                                &nbsp;|&nbsp;
                                <a href="#" style="color:#999999" id="link_communication" onClick="onClickCommunication();return false;"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Communication<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> (<b id="events_count_content_communication"></b>)</a>
                                &nbsp;|&nbsp;
                                <a href="#" style="color:#999999" id="link_diplomacy" onClick="onClickDiplomacy();return false;"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Diplomacy<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> (<b id="events_count_content_diplomacy"></b>)</a>
                            </b>
                        </td>
                        <td style="width:4px" background="../images/game/popup/events/pixmaps.active_right.png"><img src="../images/game/placeholder.gif" border="0" width="4" height="1"></td>

                    </tr>
                    <tr>
                        <td style="width:4px" background="../images/game/popup/events/pixmaps.active_left.png"><img src="../images/game/placeholder.gif" border="0" width="4" height="1"></td>
                        <td valign="top" width="100%" height="100%" bgcolor="black" background="../images/game/background5.gif">

                            <div class="events_content" style="height:100%;border:0px" id="events_content">
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

</div>