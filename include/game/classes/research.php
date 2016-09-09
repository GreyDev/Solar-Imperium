<?php

// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //

class Research
{

	var $DB;
	var $TEMPLATE;
	var $tech_data;
	var $tech_done;
	var $game_id;


	///////////////////////////////////////////////////////////////////////
	//
	///////////////////////////////////////////////////////////////////////
	function Research($DB,$TEMPLATE)
	{

		$this->DB = $DB;
		$this->game_id = round($_SESSION["game"]);
		$this->TEMPLATE = $TEMPLATE;

		$this->tech_data = array();
		$this->tech_done = array();		
	}



	///////////////////////////////////////////////////////////////////////
	//
	///////////////////////////////////////////////////////////////////////
	function load($empire_id)
	{
		$rs = $this->DB->Execute("SELECT * FROM game".$this->game_id."_tb_research_tech");	
		if (!$rs) trigger_error($this->DB->ErrorMsg());
		while(!$rs->EOF)
		{
			$this->tech_data[] = $rs->fields;
			$rs->MoveNext();
		}

		$rs = $this->DB->Execute("SELECT * FROM game".$this->game_id."_tb_research_done WHERE empire_id='".intval($empire_id)."'");	
		if (!$rs) trigger_error($this->DB->ErrorMsg());
		while(!$rs->EOF)
		{
			$this->tech_done[] = $rs->fields["tech_id"];
			$rs->MoveNext();
		}


		return true;
	}


	///////////////////////////////////////////////////////////////////////
	//
	///////////////////////////////////////////////////////////////////////
	function getLevel($level)
	{
		$techs = array();
		for ($i=0;$i<count($this->tech_data);$i++)
		{
			if ($this->tech_data[$i]["level"] == $level) $techs[] = $this->tech_data[$i];	
		}
		
		return $techs;
		
	}

	///////////////////////////////////////////////////////////////////////
	//
	///////////////////////////////////////////////////////////////////////
	function getTechFromId($tech_id)
	{
		for ($i=0;$i<count($this->tech_data);$i++)
		{
			if ($this->tech_data[$i]["id"] == $tech_id) return $this->tech_data[$i];
		}	
	
		return null;
	}	

	///////////////////////////////////////////////////////////////////////
	//
	///////////////////////////////////////////////////////////////////////
	function getGrowthPoints($planets,$production)
	{
		$points = floor(($planets/100) * $production);
		$points *= CONF_RESEARCH_POINTS_PER_PLANET;

		return $points;
	}	
}


?>
