<?php /* Smarty version 2.6.19, created on 2009-08-01 23:50:28
         compiled from manage.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip_credits', 'manage.html', 8, false),)), $this); ?>
<xml>

    <MilitaryUnits>
        <Soldiers>
            <Level><?php echo $this->_tpl_vars['soldiers_level']; ?>
</Level>
            <Quantity><?php echo $this->_tpl_vars['soldiers']; ?>
</Quantity>
            <Cost>
                <Buy><?php echo ((is_array($_tmp=$this->_tpl_vars['buy_soldiers'])) ? $this->_run_mod_handler('strip_credits', true, $_tmp) : smarty_modifier_strip_credits($_tmp)); ?>
</Buy>
                <Sell><?php echo ((is_array($_tmp=$this->_tpl_vars['sell_soldiers'])) ? $this->_run_mod_handler('strip_credits', true, $_tmp) : smarty_modifier_strip_credits($_tmp)); ?>
</Sell>
                <BuyMax><?php echo $this->_tpl_vars['buy_max_soldiers']; ?>
</BuyMax>
            </Cost>
            <Labels>
                <Buy><?php echo $this->_tpl_vars['soldiers_buy_label']; ?>
</Buy>
                <Sell><?php echo $this->_tpl_vars['soldiers_sell_label']; ?>
</Sell>
            </Labels>
        </Soldiers>

        <Fighters>
            <Level><?php echo $this->_tpl_vars['fighters_level']; ?>
</Level>
            <Quantity><?php echo $this->_tpl_vars['fighters']; ?>
</Quantity>
            <Cost>
                <Buy><?php echo ((is_array($_tmp=$this->_tpl_vars['buy_fighters'])) ? $this->_run_mod_handler('strip_credits', true, $_tmp) : smarty_modifier_strip_credits($_tmp)); ?>
</Buy>
                <Sell><?php echo ((is_array($_tmp=$this->_tpl_vars['sell_fighters'])) ? $this->_run_mod_handler('strip_credits', true, $_tmp) : smarty_modifier_strip_credits($_tmp)); ?>
</Sell>
                <BuyMax><?php echo $this->_tpl_vars['buy_max_fighters']; ?>
</BuyMax>
            </Cost>
            <Labels>
                <Buy><?php echo $this->_tpl_vars['fighters_buy_label']; ?>
</Buy>
                <Sell><?php echo $this->_tpl_vars['fighters_sell_label']; ?>
</Sell>
            </Labels>
        </Fighters>


        <Stations>
            <Level><?php echo $this->_tpl_vars['stations_level']; ?>
</Level>
            <Quantity><?php echo $this->_tpl_vars['stations']; ?>
</Quantity>
            <Cost>
                <Buy><?php echo ((is_array($_tmp=$this->_tpl_vars['buy_stations'])) ? $this->_run_mod_handler('strip_credits', true, $_tmp) : smarty_modifier_strip_credits($_tmp)); ?>
</Buy>
                <Sell><?php echo ((is_array($_tmp=$this->_tpl_vars['sell_stations'])) ? $this->_run_mod_handler('strip_credits', true, $_tmp) : smarty_modifier_strip_credits($_tmp)); ?>
</Sell>
                <BuyMax><?php echo $this->_tpl_vars['buy_max_stations']; ?>
</BuyMax>
            </Cost>
            <Labels>
                <Buy><?php echo $this->_tpl_vars['stations_buy_label']; ?>
</Buy>
                <Sell><?php echo $this->_tpl_vars['stations_sell_label']; ?>
</Sell>
            </Labels>
        </Stations>

        <CovertAgents>
            <Level><?php echo $this->_tpl_vars['covertagents_level']; ?>
</Level>
            <Quantity><?php echo $this->_tpl_vars['covertagents']; ?>
</Quantity>
            <Cost>
                <Buy><?php echo ((is_array($_tmp=$this->_tpl_vars['buy_covertagents'])) ? $this->_run_mod_handler('strip_credits', true, $_tmp) : smarty_modifier_strip_credits($_tmp)); ?>
</Buy>
                <Sell><?php echo ((is_array($_tmp=$this->_tpl_vars['sell_covertagents'])) ? $this->_run_mod_handler('strip_credits', true, $_tmp) : smarty_modifier_strip_credits($_tmp)); ?>
</Sell>
                <BuyMax><?php echo $this->_tpl_vars['buy_max_covertagents']; ?>
</BuyMax>
            </Cost>
            <Labels>
                <Buy><?php echo $this->_tpl_vars['covertagents_buy_label']; ?>
</Buy>
                <Sell><?php echo $this->_tpl_vars['covertagents_sell_label']; ?>
</Sell>
            </Labels>
        </CovertAgents>

        <LightCruisers>
            <Level><?php echo $this->_tpl_vars['lightcruisers_level']; ?>
</Level>
            <Quantity><?php echo $this->_tpl_vars['light_cruisers']; ?>
</Quantity>
            <Cost>
                <Sell><?php echo ((is_array($_tmp=$this->_tpl_vars['sell_lightcruisers'])) ? $this->_run_mod_handler('strip_credits', true, $_tmp) : smarty_modifier_strip_credits($_tmp)); ?>
</Sell>
            </Cost>
            <Labels>
                <Sell><?php echo $this->_tpl_vars['lightcruisers_sell_label']; ?>
</Sell>
            </Labels>
        </LightCruisers>


        <HeavyCruisers>
            <Level><?php echo $this->_tpl_vars['heavycruisers_level']; ?>
</Level>
            <Quantity><?php echo $this->_tpl_vars['heavy_cruisers']; ?>
</Quantity>
            <Cost>
                <Buy><?php echo ((is_array($_tmp=$this->_tpl_vars['buy_heavycruisers'])) ? $this->_run_mod_handler('strip_credits', true, $_tmp) : smarty_modifier_strip_credits($_tmp)); ?>
</Buy>
                <Sell><?php echo ((is_array($_tmp=$this->_tpl_vars['sell_heavycruisers'])) ? $this->_run_mod_handler('strip_credits', true, $_tmp) : smarty_modifier_strip_credits($_tmp)); ?>
</Sell>
                <BuyMax><?php echo $this->_tpl_vars['buy_max_heavycruisers']; ?>
</BuyMax>
            </Cost>
            <Labels>
                <Buy><?php echo $this->_tpl_vars['heavycruisers_buy_label']; ?>
</Buy>
                <Sell><?php echo $this->_tpl_vars['heavycruisers_sell_label']; ?>
</Sell>
            </Labels>
        </HeavyCruisers>

        <Carriers>
            <Level><?php echo $this->_tpl_vars['carriers_level']; ?>
</Level>
            <Quantity><?php echo $this->_tpl_vars['carriers']; ?>
</Quantity>
            <Cost>
                <Buy><?php echo ((is_array($_tmp=$this->_tpl_vars['buy_carriers'])) ? $this->_run_mod_handler('strip_credits', true, $_tmp) : smarty_modifier_strip_credits($_tmp)); ?>
</Buy>
                <Sell><?php echo ((is_array($_tmp=$this->_tpl_vars['sell_carriers'])) ? $this->_run_mod_handler('strip_credits', true, $_tmp) : smarty_modifier_strip_credits($_tmp)); ?>
</Sell>
                <BuyMax><?php echo $this->_tpl_vars['buy_max_carriers']; ?>
</BuyMax>
            </Cost>
            <Labels>
                <Buy><?php echo $this->_tpl_vars['carriers_buy_label']; ?>
</Buy>
                <Sell><?php echo $this->_tpl_vars['carriers_sell_label']; ?>
</Sell>
            </Labels>
        </Carriers>
    </MilitaryUnits>

    <Planets>

        <Food>
            <Efficency><?php echo $this->_tpl_vars['food_short_xml']; ?>
</Efficiency>
                <Quantity><?php echo $this->_tpl_vars['food_planets']; ?>
</Quantity>
                <Cost>
                    <Buy><?php echo ((is_array($_tmp=$this->_tpl_vars['cost_planet_food'])) ? $this->_run_mod_handler('strip_credits', true, $_tmp) : smarty_modifier_strip_credits($_tmp)); ?>
</Buy>
                    <BuyMax><?php echo $this->_tpl_vars['buy_max_planet_food']; ?>
</BuyMax>
                </Cost>

                <Labels>
                    <Buy><?php echo $this->_tpl_vars['food_planets_buy_label']; ?>
</Buy>
                    <Release><?php echo $this->_tpl_vars['food_planets_sell_label']; ?>
</Release>
                </Labels>
        </Food>

        <Ore>
            <Efficency><?php echo $this->_tpl_vars['ore_short_xml']; ?>
</Efficiency>
                <Quantity><?php echo $this->_tpl_vars['ore_planets']; ?>
</Quantity>
                <Cost>
                    <Buy><?php echo ((is_array($_tmp=$this->_tpl_vars['cost_planet_ore'])) ? $this->_run_mod_handler('strip_credits', true, $_tmp) : smarty_modifier_strip_credits($_tmp)); ?>
</Buy>
                    <BuyMax><?php echo $this->_tpl_vars['buy_max_planet_ore']; ?>
</BuyMax>
                </Cost>

                <Labels>
                    <Buy><?php echo $this->_tpl_vars['ore_planets_buy_label']; ?>
</Buy>
                    <Release><?php echo $this->_tpl_vars['ore_planets_sell_label']; ?>
</Release>
                </Labels>
        </Ore>


        <Tourism>
            <Efficency><?php echo $this->_tpl_vars['tourism_short_xml']; ?>
</Efficiency>
                <Quantity><?php echo $this->_tpl_vars['tourism_planets']; ?>
</Quantity>
                <Cost>
                    <Buy><?php echo ((is_array($_tmp=$this->_tpl_vars['cost_planet_tourism'])) ? $this->_run_mod_handler('strip_credits', true, $_tmp) : smarty_modifier_strip_credits($_tmp)); ?>
</Buy>
                    <BuyMax><?php echo $this->_tpl_vars['buy_max_planet_tourism']; ?>
</BuyMax>
                </Cost>

                <Labels>
                    <Buy><?php echo $this->_tpl_vars['tourism_planets_buy_label']; ?>
</Buy>
                    <Release><?php echo $this->_tpl_vars['tourism_planets_sell_label']; ?>
</Release>
                </Labels>
        </Tourism>

        <Supply>
            <Efficency><?php echo $this->_tpl_vars['supply_short_xml']; ?>
</Efficiency>
                <Quantity><?php echo $this->_tpl_vars['supply_planets']; ?>
</Quantity>
                <Cost>
                    <Buy><?php echo ((is_array($_tmp=$this->_tpl_vars['cost_planet_supply'])) ? $this->_run_mod_handler('strip_credits', true, $_tmp) : smarty_modifier_strip_credits($_tmp)); ?>
</Buy>
                    <BuyMax><?php echo $this->_tpl_vars['buy_max_planet_supply']; ?>
</BuyMax>
                </Cost>

                <Labels>
                    <Buy><?php echo $this->_tpl_vars['supply_planets_buy_label']; ?>
</Buy>
                    <Release><?php echo $this->_tpl_vars['supply_planets_sell_label']; ?>
</Release>
                </Labels>
        </Supply>

        <Government>
            <Efficency><?php echo $this->_tpl_vars['gov_short_xml']; ?>
</Efficiency>
                <Quantity><?php echo $this->_tpl_vars['gov_planets']; ?>
</Quantity>
                <Cost>
                    <Buy><?php echo ((is_array($_tmp=$this->_tpl_vars['cost_planet_gov'])) ? $this->_run_mod_handler('strip_credits', true, $_tmp) : smarty_modifier_strip_credits($_tmp)); ?>
</Buy>
                    <BuyMax><?php echo $this->_tpl_vars['buy_max_planet_gov']; ?>
</BuyMax>
                </Cost>

                <Labels>
                    <Buy><?php echo $this->_tpl_vars['gov_planets_buy_label']; ?>
</Buy>
                    <Release><?php echo $this->_tpl_vars['gov_planets_sell_label']; ?>
</Release>
                </Labels>
        </Government>

        <Education>
            <Efficency><?php echo $this->_tpl_vars['edu_short_xml']; ?>
</Efficiency>
                <Quantity><?php echo $this->_tpl_vars['edu_planets']; ?>
</Quantity>
                <Cost>
                    <Buy><?php echo ((is_array($_tmp=$this->_tpl_vars['cost_planet_edu'])) ? $this->_run_mod_handler('strip_credits', true, $_tmp) : smarty_modifier_strip_credits($_tmp)); ?>
</Buy>
                    <BuyMax><?php echo $this->_tpl_vars['buy_max_planet_edu']; ?>
</BuyMax>
                </Cost>

                <Labels>
                    <Buy><?php echo $this->_tpl_vars['edu_planets_buy_label']; ?>
</Buy>
                    <Release><?php echo $this->_tpl_vars['edu_planets_sell_label']; ?>
</Release>
                </Labels>
        </Education>

        <Research>
            <Efficency><?php echo $this->_tpl_vars['research_short_xml']; ?>
</Efficiency>
                <Quantity><?php echo $this->_tpl_vars['research_planets']; ?>
</Quantity>
                <Cost>
                    <Buy><?php echo ((is_array($_tmp=$this->_tpl_vars['cost_planet_research'])) ? $this->_run_mod_handler('strip_credits', true, $_tmp) : smarty_modifier_strip_credits($_tmp)); ?>
</Buy>
                    <BuyMax><?php echo $this->_tpl_vars['buy_max_planet_research']; ?>
</BuyMax>
                </Cost>

                <Labels>
                    <Buy><?php echo $this->_tpl_vars['research_planets_buy_label']; ?>
</Buy>
                    <Release><?php echo $this->_tpl_vars['research_planets_sell_label']; ?>
</Release>
                </Labels>
        </Research>

        <Urban>
            <Efficency><?php echo $this->_tpl_vars['urban_short_xml']; ?>
</Efficiency>
                <Quantity><?php echo $this->_tpl_vars['urban_planets']; ?>
</Quantity>
                <Cost>
                    <Buy><?php echo ((is_array($_tmp=$this->_tpl_vars['cost_planet_urban'])) ? $this->_run_mod_handler('strip_credits', true, $_tmp) : smarty_modifier_strip_credits($_tmp)); ?>
</Buy>
                    <BuyMax><?php echo $this->_tpl_vars['buy_max_planet_urban']; ?>
</BuyMax>
                </Cost>

                <Labels>
                    <Buy><?php echo $this->_tpl_vars['urban_planets_buy_label']; ?>
</Buy>
                    <Release><?php echo $this->_tpl_vars['urban_planets_sell_label']; ?>
</Release>
                </Labels>
        </Urban>

        <Petroleum>
            <Efficency><?php echo $this->_tpl_vars['petro_short_xml']; ?>
</Efficiency>
                <Quantity><?php echo $this->_tpl_vars['petro_planets']; ?>
</Quantity>
                <Cost>
                    <Buy><?php echo ((is_array($_tmp=$this->_tpl_vars['cost_planet_petro'])) ? $this->_run_mod_handler('strip_credits', true, $_tmp) : smarty_modifier_strip_credits($_tmp)); ?>
</Buy>
                    <BuyMax><?php echo $this->_tpl_vars['buy_max_planet_petro']; ?>
</BuyMax>
                </Cost>

                <Labels>
                    <Buy><?php echo $this->_tpl_vars['petro_planets_buy_label']; ?>
</Buy>
                    <Release><?php echo $this->_tpl_vars['petro_planets_sell_label']; ?>
</Release>
                </Labels>
        </Petroleum>

        <AntiPollution>
            <Efficency><?php echo $this->_tpl_vars['antipollu_short_xml']; ?>
</Efficiency>
                <Quantity><?php echo $this->_tpl_vars['antipollu_planets']; ?>
</Quantity>
                <Cost>
                    <Buy><?php echo ((is_array($_tmp=$this->_tpl_vars['cost_planet_antipollu'])) ? $this->_run_mod_handler('strip_credits', true, $_tmp) : smarty_modifier_strip_credits($_tmp)); ?>
</Buy>
                    <BuyMax><?php echo $this->_tpl_vars['buy_max_planet_antipollu']; ?>
</BuyMax>
                </Cost>

                <Labels>
                    <Buy><?php echo $this->_tpl_vars['antipollu_planets_buy_label']; ?>
</Buy>
                    <Release><?php echo $this->_tpl_vars['antipollu_planets_sell_label']; ?>
</Release>
                </Labels>
        </AntiPollution>

    </Planets>

</xml>