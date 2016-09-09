<?php /* Smarty version 2.6.19, created on 2009-07-18 15:56:01
         compiled from page_serverstatus.html */ ?>
<xml>

    <ServerName><?php echo $this->_tpl_vars['server_name']; ?>
</ServerName>
    <GameVersion><?php echo $this->_tpl_vars['game_version']; ?>
</GameVersion>
    <ServerUptime><?php echo $this->_tpl_vars['server_uptime']; ?>
</ServerUptime>
    <ConnectedPlayers><?php echo $this->_tpl_vars['online_players']; ?>
</ConnectedPlayers>
    <PremiumAccounts><?php echo $this->_tpl_vars['premium_accounts']; ?>
</PremiumAcccounts>
    <RegisteredPlayers><?php echo $this->_tpl_vars['registered_players']; ?>
</RegisteredPlayers>
    <AvailableGames><?php echo $this->_tpl_vars['available_games']; ?>
</AvailableGames>

    <Stats>
    <?php unset($this->_sections['s']);
$this->_sections['s']['name'] = 's';
$this->_sections['s']['loop'] = is_array($_loop=$this->_tpl_vars['stats']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['s']['show'] = true;
$this->_sections['s']['max'] = $this->_sections['s']['loop'];
$this->_sections['s']['step'] = 1;
$this->_sections['s']['start'] = $this->_sections['s']['step'] > 0 ? 0 : $this->_sections['s']['loop']-1;
if ($this->_sections['s']['show']) {
    $this->_sections['s']['total'] = $this->_sections['s']['loop'];
    if ($this->_sections['s']['total'] == 0)
        $this->_sections['s']['show'] = false;
} else
    $this->_sections['s']['total'] = 0;
if ($this->_sections['s']['show']):

            for ($this->_sections['s']['index'] = $this->_sections['s']['start'], $this->_sections['s']['iteration'] = 1;
                 $this->_sections['s']['iteration'] <= $this->_sections['s']['total'];
                 $this->_sections['s']['index'] += $this->_sections['s']['step'], $this->_sections['s']['iteration']++):
$this->_sections['s']['rownum'] = $this->_sections['s']['iteration'];
$this->_sections['s']['index_prev'] = $this->_sections['s']['index'] - $this->_sections['s']['step'];
$this->_sections['s']['index_next'] = $this->_sections['s']['index'] + $this->_sections['s']['step'];
$this->_sections['s']['first']      = ($this->_sections['s']['iteration'] == 1);
$this->_sections['s']['last']       = ($this->_sections['s']['iteration'] == $this->_sections['s']['total']);
?>
    <Entry>
        <Date><?php echo $this->_tpl_vars['stats'][$this->_sections['s']['index']]['date']; ?>
</Date>
        <NewPlayers><?php echo $this->_tpl_vars['stats'][$this->_sections['s']['index']]['maxsignup_count']; ?>
</NewPlayers>
        <ConnectedPlayers><?php echo $this->_tpl_vars['stats'][$this->_sections['s']['index']]['maxlogin_count']; ?>
</ConnectedPlayers>
    </Entry>
    <?php endfor; endif; ?>
    </Stats>

</xml>