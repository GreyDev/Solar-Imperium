<?php /* Smarty version 2.6.19, created on 2009-07-28 21:59:36
         compiled from page_gamesbrowser.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'page_gamesbrowser.html', 23, false),array('modifier', 'round', 'page_gamesbrowser.html', 24, false),)), $this); ?>
<xml>

    <Games>
        <?php unset($this->_sections['game']);
$this->_sections['game']['name'] = 'game';
$this->_sections['game']['loop'] = is_array($_loop=$this->_tpl_vars['games']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['game']['show'] = true;
$this->_sections['game']['max'] = $this->_sections['game']['loop'];
$this->_sections['game']['step'] = 1;
$this->_sections['game']['start'] = $this->_sections['game']['step'] > 0 ? 0 : $this->_sections['game']['loop']-1;
if ($this->_sections['game']['show']) {
    $this->_sections['game']['total'] = $this->_sections['game']['loop'];
    if ($this->_sections['game']['total'] == 0)
        $this->_sections['game']['show'] = false;
} else
    $this->_sections['game']['total'] = 0;
if ($this->_sections['game']['show']):

            for ($this->_sections['game']['index'] = $this->_sections['game']['start'], $this->_sections['game']['iteration'] = 1;
                 $this->_sections['game']['iteration'] <= $this->_sections['game']['total'];
                 $this->_sections['game']['index'] += $this->_sections['game']['step'], $this->_sections['game']['iteration']++):
$this->_sections['game']['rownum'] = $this->_sections['game']['iteration'];
$this->_sections['game']['index_prev'] = $this->_sections['game']['index'] - $this->_sections['game']['step'];
$this->_sections['game']['index_next'] = $this->_sections['game']['index'] + $this->_sections['game']['step'];
$this->_sections['game']['first']      = ($this->_sections['game']['iteration'] == 1);
$this->_sections['game']['last']       = ($this->_sections['game']['iteration'] == $this->_sections['game']['total']);
?>
        <Entry>
            <Id><?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['id']; ?>
</Id>
            <GameName><?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['name']; ?>
</GameName>
            <Description><?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['description']; ?>
</Description>
            <ConnectedPlayers><?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['connected_players']; ?>
</ConnectedPlayers>
            <MaxPlayerSlots><?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['players_slot']; ?>
</MaxPlayerSlots>
            <RegisteredPlayers><?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['empires_count']; ?>
</RegisteredPlayers>
            <MaxPlayersRegister><?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['max_players']; ?>
</MaxPlayersRegister>
            <VictoryCondition><?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['victory_condition']; ?>
</VictoryCondition>
            <MaxGameDuration><?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['lifetime']; ?>
</MaxGameDuration>
            <TimeElapsed><?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['time_elapsed']; ?>
</TimeElapsed>
            <PremiumRequired><?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['premium_only']; ?>
</PremiumRequired>
            <TurnsPerDay><?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['turns_per_day']; ?>
</TurnsPerDay>
            <ProtectionTurns><?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['protection_turns']; ?>
</ProtectionTurns>
            <CompletedGames><?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['count']; ?>
</CompletedGames>


            <?php if ($this->_tpl_vars['games'][$this->_sections['game']['index']]['need_restart'] == 1): ?>
            <NeedRestart><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>The current game has ended, the winner is:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['winner']; ?>
 <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>, you can still visit the scoreboard and the starmap,
                A new game will start in:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <?php echo ((is_array($_tmp=$this->_tpl_vars['games'][$this->_sections['game']['index']]['restart_date']/60)) ? $this->_run_mod_handler('round', true, $_tmp) : round($_tmp)); ?>
 <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>minutes<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></NeedRestart>
            <?php else: ?>
            <?php if ($this->_tpl_vars['games'][$this->_sections['game']['index']]['need_login'] == 1): ?>
            <PlayerStatus>NeedLogin</PlayerStatus>
            <?php elseif ($this->_tpl_vars['games'][$this->_sections['game']['index']]['join_game'] == 1): ?>
            <PlayerStatus>JoinGame</PlayerStatus>
            <?php elseif ($this->_tpl_vars['games'][$this->_sections['game']['index']]['continue_game'] == 1): ?>
            <PlayerStatus>Continue</PlayerStatus>
            <?php endif; ?>
            <?php endif; ?>

            <History>
                <?php if ($this->_tpl_vars['games'][$this->_sections['game']['index']]['history_game'] == 1): ?>

                <?php unset($this->_sections['hist']);
$this->_sections['hist']['name'] = 'hist';
$this->_sections['hist']['loop'] = is_array($_loop=$this->_tpl_vars['games'][$this->_sections['game']['index']]['history']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['hist']['show'] = true;
$this->_sections['hist']['max'] = $this->_sections['hist']['loop'];
$this->_sections['hist']['step'] = 1;
$this->_sections['hist']['start'] = $this->_sections['hist']['step'] > 0 ? 0 : $this->_sections['hist']['loop']-1;
if ($this->_sections['hist']['show']) {
    $this->_sections['hist']['total'] = $this->_sections['hist']['loop'];
    if ($this->_sections['hist']['total'] == 0)
        $this->_sections['hist']['show'] = false;
} else
    $this->_sections['hist']['total'] = 0;
if ($this->_sections['hist']['show']):

            for ($this->_sections['hist']['index'] = $this->_sections['hist']['start'], $this->_sections['hist']['iteration'] = 1;
                 $this->_sections['hist']['iteration'] <= $this->_sections['hist']['total'];
                 $this->_sections['hist']['index'] += $this->_sections['hist']['step'], $this->_sections['hist']['iteration']++):
$this->_sections['hist']['rownum'] = $this->_sections['hist']['iteration'];
$this->_sections['hist']['index_prev'] = $this->_sections['hist']['index'] - $this->_sections['hist']['step'];
$this->_sections['hist']['index_next'] = $this->_sections['hist']['index'] + $this->_sections['hist']['step'];
$this->_sections['hist']['first']      = ($this->_sections['hist']['iteration'] == 1);
$this->_sections['hist']['last']       = ($this->_sections['hist']['iteration'] == $this->_sections['hist']['total']);
?>
                <Entry>
                    <Date><?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['history'][$this->_sections['hist']['index']]['date']; ?>
</Date>
                    <Rank><?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['history'][$this->_sections['hist']['index']]['rank']; ?>
</Rank>
                    <EmpireName><?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['history'][$this->_sections['hist']['index']]['empire_name']; ?>
</EmpireName>
                    <Networth><?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['history'][$this->_sections['hist']['index']]['networth']; ?>
</Networth>
                    <MilitaryMight><?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['history'][$this->_sections['hist']['index']]['military_might']; ?>
</MilitaryMight>
                    <Planets><?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['history'][$this->_sections['hist']['index']]['planets']; ?>
</Planets>
                    <Population><?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['history'][$this->_sections['hist']['index']]['population']; ?>
</Population>
                    <TurnsPlayed><?php echo $this->_tpl_vars['games'][$this->_sections['game']['index']]['history'][$this->_sections['hist']['index']]['turns_played']; ?>
</TurnsPlayed>
                </Entry>
                <?php endfor; endif; ?>
                <?php endif; ?>

            </History>



        </Entry>
        <?php endfor; endif; ?>
    </Games>
</xml>