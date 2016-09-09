<?php
// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //


class Coalition
{

	var $DB;
	var $member;
	var $data;
	var $data_footprint;
	var $members;
	var $game_id;

	///////////////////////////////////////////////////////////////////////
	// constructor
	///////////////////////////////////////////////////////////////////////
	function Coalition($DB)
	{
		$this->DB = $DB;
		$this->member = null;
		$this->game_id = round($_SESSION["game"]);
	}

	///////////////////////////////////////////////////////////////////////
	// 
	///////////////////////////////////////////////////////////////////////
	function load($empire_id)
	{
	
		$this->member = $this->DB->Execute("SELECT * FROM game".$this->game_id."_tb_member WHERE empire='".addslashes($empire_id)."'");
		if (!$this->member) trigger_error($this->DB->ErrorMsg());

		if ($this->member->EOF) {
			$this->member = null;
		
			return true;
		}
		$this->member = $this->member->fields;
		
		$this->data = $this->DB->Execute("SELECT * FROM game".$this->game_id."_tb_coalition WHERE id='".$this->member["coalition"]."'");
		if (!$this->data) trigger_error($this->DB->ErrorMsg());

		$this->data = $this->data->fields;
		$this->data_footprint = md5(serialize($this->data));

		$this->members = array();
		$rs = $this->DB->Execute("SELECT game".$this->game_id."_tb_member.*,game".$this->game_id."_tb_empire.networth FROM game".$this->game_id."_tb_member,game".$this->game_id."_tb_empire WHERE game".$this->game_id."_tb_empire.id = game".$this->game_id."_tb_member.empire AND game".$this->game_id."_tb_member.coalition='".$this->data["id"]."'");

		if (!$rs) trigger_error($this->DB->ErrorMsg());

		while(!$rs->EOF)
		{
			if ($rs->fields["empire"] != $this->member["empire"])
				$this->members[] = $rs->fields;
			$rs->MoveNext();
		}
		
		return true;
	}

	///////////////////////////////////////////////////////////////////////
	// 
	///////////////////////////////////////////////////////////////////////
	function save()
	{
		if ($this->member == null) return;
		if (md5(serialize($this->data)) == $this->data_footprint) return;

		$query = "UPDATE game".$this->game_id."_tb_coalition SET ";
		reset($this->data);
		while (list($key,$value) = each($this->data))
		{
			if ($key == "id") continue;
			if (is_numeric($key)) continue;
			if ((is_numeric($value)) && ($key != "logo"))
				$query .= "$key=$value,";
			else
				$query .= "$key='".addslashes($value)."',";
			
		}

		$query = substr($query,0,strlen($query)-1); // removing remaining ,
		$query .= " WHERE id='".$this->data["id"]."'";

		if (!$this->DB->Execute($query)) trigger_error($this->DB->ErrorMsg());
		
	}
	
	///////////////////////////////////////////////////////////////////////
	// 
	///////////////////////////////////////////////////////////////////////
	function updateNetworth($your_networth)
	{
		$this->data["networth"] = $your_networth;

		for ($i=0;$i<count($this->members);$i++)
		{
			$this->data["networth"] += $this->members[$i]["networth"];
		}
		
		$this->updatePlanetsCount();
	}

	///////////////////////////////////////////////////////////////////////
	// 
	///////////////////////////////////////////////////////////////////////
	function updatePlanetsCount()
	{
			
		$this->data["planets"] = 0;
		$query = "SELECT * FROM game".$this->game_id."_tb_planets WHERE empire='".$this->member["empire"]."'";
		$rs = $this->DB->Execute($query);
                
		$this->data["planets"] += $rs->fields["food_planets"];
		$this->data["planets"] += $rs->fields["ore_planets"];
		$this->data["planets"] += $rs->fields["tourism_planets"];
		$this->data["planets"] += $rs->fields["supply_planets"];
		$this->data["planets"] += $rs->fields["gov_planets"];
		$this->data["planets"] += $rs->fields["edu_planets"];
		$this->data["planets"] += $rs->fields["research_planets"];
		$this->data["planets"] += $rs->fields["urban_planets"];
		$this->data["planets"] += $rs->fields["petro_planets"];
		$this->data["planets"] += $rs->fields["antipollu_planets"];	

		for ($i=0;$i<count($this->members);$i++)
		{
			$rs = $this->DB->Execute("SELECT * FROM game".$this->game_id."_tb_planets WHERE empire='".$this->members[$i]["empire"]."'");	

			$this->data["planets"] += $rs->fields["food_planets"];
			$this->data["planets"] += $rs->fields["ore_planets"];
			$this->data["planets"] += $rs->fields["tourism_planets"];
			$this->data["planets"] += $rs->fields["supply_planets"];
			$this->data["planets"] += $rs->fields["gov_planets"];
			$this->data["planets"] += $rs->fields["edu_planets"];
			$this->data["planets"] += $rs->fields["research_planets"];
			$this->data["planets"] += $rs->fields["urban_planets"];
			$this->data["planets"] += $rs->fields["petro_planets"];
			$this->data["planets"] += $rs->fields["antipollu_planets"];
		}
	}
	
	///////////////////////////////////////////////////////////////////////
	// 
	///////////////////////////////////////////////////////////////////////
	function isMember()
	{
		if ($this->member == null) return false; else return true;
	}

	///////////////////////////////////////////////////////////////////////
	// 
	///////////////////////////////////////////////////////////////////////
	function isMemberFromId($empire_id)
	{
		
		for ($i=0;$i<count($this->members);$i++) {
			if ($this->members[$i]["empire"] == $empire_id) return true;
		}
		
		if ($this->member["empire"] == $empire_id) return true;
		return false;
	}


	///////////////////////////////////////////////////////////////////////
	// 
	///////////////////////////////////////////////////////////////////////
	function isOwner()
	{
		if (!$this->isMember()) return false;
		
		if ($this->member["level"] != 1) return false;
		
		return true;	
	}

	///////////////////////////////////////////////////////////////////////
	// 
	///////////////////////////////////////////////////////////////////////
	function isOwnerFromId($empire_id)
	{
		if (!$this->isMemberFromId($empire_id)) return false;
		
		for ($i=0;$i<count($this->members);$i++)
		{
			if (($this->members[$i]["empire"] == $empire_id) && ($this->members[$i]["level"] == 1))
				 return true;
		}
		
		if (($this->member["empire"] == $empire_id) && ($this->member["level"] == 1))
			return true;
		
		return false;	
	}

	///////////////////////////////////////////////////////////////////////
	// 
	///////////////////////////////////////////////////////////////////////
	function transferOwnership($id)
	{
		if (!$this->isOwner()) return false;
		
		$empire_id = $id;
		if ($empire_id == -1) {
			// Find another member
			for ($i=0;$i<count($this->members);$i++) {
		
				if (($this->members[$i]["empire"] ==$this->member["empire"]) && ($this->members[$i]["level"] == 1))
					continue;
				
				$empire_id = $this->members[$i]["empire"];
			
				break;
			}
		
		}
		
		if ($empire_id == -1) {
			// no more coalition members, delete the coalition
			disband();
			return true;
		}
		
		// remove my ownership
		if (!$this->DB->Execute("UPDATE game".$this->game_id."_tb_member SET level='0' WHERE empire='".$this->member["empire"]."'")) trigger_error($this->DB->ErrorMsg());
	
		// set the ownership
		if (!$this->DB->Execute("UPDATE game".$this->game_id."_tb_member SET level='1' WHERE empire='".addslashes($empire_id)."' AND coalition='".$this->member["coalition"]."'")) trigger_error($this->DB->ErrorMsg());

		
		// send a event
		
		$evt = new EventCreator($this->DB);
		$evt->type = CONF_EVENT_COALITION_OWNERSHIP_CHANGED;
		$evt->from = -1;
		$empire_data = $this->DB->Execute("SELECT id,emperor,name,gender FROM game".$this->game_id."_tb_empire WHERE id='".intval($id)."'");
		if (!$empire_data) trigger_error($this->DB->ErrorMsg());
		$empire_data = $empire_data->fields;
		$evt->params  = array("empire_id"=>$empire_data["id"],"empire_name"=>$empire_data["name"],"empire_emperor"=>$empire_data["emperor"],"gender"=>$empire_data["gender"],"coalition_name"=>$this->data["name"]);
		$evt->broadcast();
		$this->load($this->member["empire"]);
		return true;
		
	}	

	///////////////////////////////////////////////////////////////////////
	// 
	///////////////////////////////////////////////////////////////////////
	function transferRandomOwnership()
	{
		srand(time(NULL));
		
		$this->transferOwnership(rand(0,count($this->members)-1));
		
	}	

	///////////////////////////////////////////////////////////////////////
	// 
	///////////////////////////////////////////////////////////////////////
	function kickMember($empire_id)	
	{
		$query = "DELETE FROM game".$this->game_id."_tb_member WHERE empire='".intval($empire_id)."'";
		if (!$this->DB->Execute($query)) trigger_error($this->DB->ErrorMsg());
		
		$rs = $this->DB->Execute("SELECT * FROM game".$this->game_id."_tb_empire WHERE id='".intval($empire_id)."'");
		$params = array("empire_id"=>$rs->fields["id"],
		"empire_emperor"=>$rs->fields["emperor"],
		"empire_name"=>$rs->fields["name"],
		"gender"=>$rs->fields["gender"],
		"coalition_name"=>$this->data["name"]);
	
		$evt = new EventCreator($this->DB);
		$evt->from = $_SESSION["empire_id"];
		$evt->type = CONF_EVENT_COALITION_KICKED;
		$evt->params = $params;
		$evt->broadcast();
		
		$this->load($this->member["empire"]);
	}


	///////////////////////////////////////////////////////////////////////
	// 
	///////////////////////////////////////////////////////////////////////
	function disband()	
	{
		$rs = $this->DB->Execute("SELECT * FROM game".$this->game_id."_tb_empire WHERE id='".intval($_SESSION["empire_id"])."'");
		if (!$rs) trigger_error($this->DB->ErrorMsg());
		
		$this->DB->Execute("DELETE FROM game".$this->game_id."_tb_member WHERE coalition='".$this->data["id"]."'");
		$this->DB->Execute("DELETE FROM game".$this->game_id."_tb_coalition WHERE id='".$this->data["id"]."'");
		
		$params = array("empire_id"=>$rs->fields["id"],
		"empire_emperor"=>$rs->fields["emperor"],
		"empire_name"=>$rs->fields["name"],
		"gender"=>$rs->fields["gender"],
		"coalition_name"=>$this->data["name"]);
	
		$evt = new EventCreator($this->DB);
		$evt->from = $_SESSION["empire_id"];
		$evt->type = CONF_EVENT_COALITION_DISBANDED;
		$evt->params = $params;
		$evt->broadcast();
		
		$this->load($this->member["empire"]);
	}	


	///////////////////////////////////////////////////////////////////////
	// 
	///////////////////////////////////////////////////////////////////////
	function create($coalition_name,$empire_id)
	{
		
	
		$query = "INSERT INTO game".$this->game_id."_tb_coalition (date,name,planets,networth,logo)".
		"VALUES(".time(NULL).",".
		"'".addslashes($coalition_name)."',".
		"0,".
		"0,".
		"'5488888888888845554888881888845545549991199945548459222112229548889222211222298888922221122229888892222112222988888922211222988888892221122298888889233333329888888922244222988888459224422954888455492002945548455488922988455455488889988884555488888888888845'".
		")";

		if (!$this->DB->Execute($query)) trigger_error($this->DB->ErrorMsg());
				
		$rs = $this->DB->Execute("SELECT * FROM game".$this->game_id."_tb_coalition WHERE name='".addslashes($coalition_name)."'");
		if (!$rs) trigger_error($this->DB->ErrorMsg());
		$id = $rs->fields["id"];
	
		$query = "INSERT INTO game".$this->game_id."_tb_member (date,empire,coalition,level) ".
		"VALUES(".
		time(NULL).",".
		$empire_id.",".
		$id.",".
		"1)";

		if (!$this->DB->Execute($query)) trigger_error($this->DB->ErrorMsg()." QUERY:".$query);
		
		$rs = $this->DB->Execute("SELECT * FROM game".$this->game_id."_tb_empire WHERE id='".intval($empire_id)."'");
		$params = array("empire_id"=>$rs->fields["id"],
		"empire_emperor"=>$rs->fields["emperor"],
		"empire_name"=>$rs->fields["name"],
		"gender"=>$rs->fields["gender"],
		"coalition_name"=>$coalition_name);

		if (!$rs) trigger_error($this->DB->ErrorMsg());
	
		$evt = new EventCreator($this->DB);
		$evt->from = $_SESSION["empire_id"];
		$evt->type = CONF_EVENT_COALITION_CREATED;
		$evt->params = $params;
		$evt->broadcast();		
		
		$this->load($empire_id);
	}
}

?>
