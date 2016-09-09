<?php /* Smarty version 2.6.19, created on 2009-07-18 16:05:22
         compiled from page_scoreboard.html */ ?>
<xml>

    <HallOfFame>

        <?php unset($this->_sections['hlf']);
$this->_sections['hlf']['name'] = 'hlf';
$this->_sections['hlf']['loop'] = is_array($_loop=$this->_tpl_vars['hall_of_fame']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['hlf']['show'] = true;
$this->_sections['hlf']['max'] = $this->_sections['hlf']['loop'];
$this->_sections['hlf']['step'] = 1;
$this->_sections['hlf']['start'] = $this->_sections['hlf']['step'] > 0 ? 0 : $this->_sections['hlf']['loop']-1;
if ($this->_sections['hlf']['show']) {
    $this->_sections['hlf']['total'] = $this->_sections['hlf']['loop'];
    if ($this->_sections['hlf']['total'] == 0)
        $this->_sections['hlf']['show'] = false;
} else
    $this->_sections['hlf']['total'] = 0;
if ($this->_sections['hlf']['show']):

            for ($this->_sections['hlf']['index'] = $this->_sections['hlf']['start'], $this->_sections['hlf']['iteration'] = 1;
                 $this->_sections['hlf']['iteration'] <= $this->_sections['hlf']['total'];
                 $this->_sections['hlf']['index'] += $this->_sections['hlf']['step'], $this->_sections['hlf']['iteration']++):
$this->_sections['hlf']['rownum'] = $this->_sections['hlf']['iteration'];
$this->_sections['hlf']['index_prev'] = $this->_sections['hlf']['index'] - $this->_sections['hlf']['step'];
$this->_sections['hlf']['index_next'] = $this->_sections['hlf']['index'] + $this->_sections['hlf']['step'];
$this->_sections['hlf']['first']      = ($this->_sections['hlf']['iteration'] == 1);
$this->_sections['hlf']['last']       = ($this->_sections['hlf']['iteration'] == $this->_sections['hlf']['total']);
?>
        <Entry>
            <Date><?php echo $this->_tpl_vars['hall_of_fame'][$this->_sections['hlf']['index']]['date']; ?>
</Date>
            <PlayerName><?php echo $this->_tpl_vars['hall_of_fame'][$this->_sections['hlf']['index']]['player_name']; ?>
</PlayerName>
            <GameName><?php echo $this->_tpl_vars['hall_of_fame'][$this->_sections['hlf']['index']]['game_name']; ?>
</GameName>
        </Entry>
        <?php endfor; endif; ?>

    </HallOfFame>


    <Scoreboard>
        <?php unset($this->_sections['sc']);
$this->_sections['sc']['name'] = 'sc';
$this->_sections['sc']['loop'] = is_array($_loop=$this->_tpl_vars['scores']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['sc']['show'] = true;
$this->_sections['sc']['max'] = $this->_sections['sc']['loop'];
$this->_sections['sc']['step'] = 1;
$this->_sections['sc']['start'] = $this->_sections['sc']['step'] > 0 ? 0 : $this->_sections['sc']['loop']-1;
if ($this->_sections['sc']['show']) {
    $this->_sections['sc']['total'] = $this->_sections['sc']['loop'];
    if ($this->_sections['sc']['total'] == 0)
        $this->_sections['sc']['show'] = false;
} else
    $this->_sections['sc']['total'] = 0;
if ($this->_sections['sc']['show']):

            for ($this->_sections['sc']['index'] = $this->_sections['sc']['start'], $this->_sections['sc']['iteration'] = 1;
                 $this->_sections['sc']['iteration'] <= $this->_sections['sc']['total'];
                 $this->_sections['sc']['index'] += $this->_sections['sc']['step'], $this->_sections['sc']['iteration']++):
$this->_sections['sc']['rownum'] = $this->_sections['sc']['iteration'];
$this->_sections['sc']['index_prev'] = $this->_sections['sc']['index'] - $this->_sections['sc']['step'];
$this->_sections['sc']['index_next'] = $this->_sections['sc']['index'] + $this->_sections['sc']['step'];
$this->_sections['sc']['first']      = ($this->_sections['sc']['iteration'] == 1);
$this->_sections['sc']['last']       = ($this->_sections['sc']['iteration'] == $this->_sections['sc']['total']);
?>
        <Entry>
            <Rank><?php echo $this->_tpl_vars['scores'][$this->_sections['sc']['index']]['rank']; ?>
</Rank>
            <PlayerName><?php echo $this->_tpl_vars['scores'][$this->_sections['sc']['index']]['name']; ?>
</PlayerName>
            <Score><?php echo $this->_tpl_vars['scores'][$this->_sections['sc']['index']]['score']; ?>
</Score>
            <LastVisit><?php echo $this->_tpl_vars['scores'][$this->_sections['sc']['index']]['lastvisit']; ?>
</LastVisit>
            <Elapsed><?php echo $this->_tpl_vars['scores'][$this->_sections['sc']['index']]['lifespan']; ?>
</Elapsed>
        </Entry>
        <?php endfor; endif; ?>

    </Scoreboard>

</xml>