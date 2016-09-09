<?php

// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //


class Diplomacy {

	var $DB;
	var $data;
	var $data_footprint;
	var $game_id;

	///////////////////////////////////////////////////////////////////////////
	// Constructor
	///////////////////////////////////////////////////////////////////////////
	function Diplomacy($DB) {
		$this->DB = $DB;
		$this->data = array ();
		$this->data_footprint = array ();
		$this->game_id = round($_SESSION["game"]);
	}

	///////////////////////////////////////////////////////////////////////////
	// load
	///////////////////////////////////////////////////////////////////////////
	function load($empire_id) {
		$rs = $this->DB->Execute("SELECT * FROM game".$this->game_id."_tb_treaty WHERE empire_from='" . intval($empire_id) ."' ".
		" OR empire_to='" . intval($empire_id)."'");

		if (!$rs) trigger_error($this->DB->ErrorMsg());

		while (!$rs->EOF) {

			// verify if the other empire still exists :)
			$empire = $rs->fields["empire_from"];
			if ($empire == $empire_id)
				$empire = $rs->fields["empire_to"];

			$rs2 = $this->DB->Execute("SELECT id FROM game".$this->game_id."_tb_empire WHERE active='1' AND id='$empire'");
			if (!$rs2) trigger_error($this->DB->ErrorMsg());
			if ($rs2->EOF) {
				// empire is not here or dead
				if (!$this->DB->Execute("DELETE FROM game".$this->game_id."_tb_treaty WHERE id='" . $rs->fields["id"]."'")) trigger_error($this->DB->ErrorMsg());
			} else {

				$this->data[] = $rs->fields;
				$this->data_footprint[] = md5(serialize($this->data));
			}

			$rs->MoveNext();
		}

		return true;
	}

	///////////////////////////////////////////////////////////////////////////
	// save
	///////////////////////////////////////////////////////////////////////////
	function save() {
		for ($i = 0; $i < count($this->data); $i++) {
			if (md5(serialize($this->data[$i])) != $this->data_footprint[$i]) {

				$query = "UPDATE game".$this->game_id."_tb_treaty SET " .
				"empire_from='" . $this->data[$i]["empire_from"] . "'," .
				"empire_to='" . $this->data[$i]["empire_to"] . "'," .
				"type='" . $this->data[$i]["type"] . "'," .
				"date='" . $this->data[$i]["date"] . "'," .
				"status='" . $this->data[$i]["status"] . "' WHERE id='" . $this->data[$i]["id"]."'";

				if (!$this->DB->Execute($query)) trigger_error($this->DB->ErrorMsg());

			}
		}
	}

	///////////////////////////////////////////////////////////////////////////
	// treatyFrom
	///////////////////////////////////////////////////////////////////////////
	function treatyFrom($empire_id) {
		for ($i = 0; $i < count($this->data); $i++) {
			$empire = $this->data[$i]["empire_from"];
			if ($empire != $empire_id)
				$empire = $this->data[$i]["empire_to"];
			if ($empire == $empire_id)
				return array (
					$this->data[$i]["type"],
					$this->data[$i]["status"]
				);
		}

		return null;
	}

	///////////////////////////////////////////////////////////////////////////
	// sendTreaty
	///////////////////////////////////////////////////////////////////////////
	function sendTreaty($treaty, $empire_data, $target_data) {
		$query = "INSERT INTO game".$this->game_id."_tb_treaty (empire_from,empire_to,type,date,status) " .
		"VALUES('" . $empire_data["id"] . "'," .
		"'".$target_data["id"] . "'," .
		"'".addslashes($treaty) . "'," .
		"'".time(NULL) . "','" . CONF_TREATY_ACCEPT_PENDING . "');";

		if (!$this->DB->Execute($query)) trigger_error($this->DB->ErrorMsg());

		$evt = new EventCreator($this->DB);
		$evt->from = $empire_data["id"];
		$evt->to = $target_data["id"];
		$evt->type = CONF_EVENT_PENDINGTREATY;
		$evt->params = array (
			"empire_id" => $empire_data["id"],
			"empire_name" => $empire_data["name"],
			"empire_emperor" => $empire_data["emperor"],
			"gender" => $empire_data["gender"],
			"treaty" => $treaty
		);
		$evt->sticky = true;
		
		$evt->send();

		$this->load($empire_data["id"]);
	}

	///////////////////////////////////////////////////////////////////////////
	// sendTreaty
	///////////////////////////////////////////////////////////////////////////
	function getTreaty($treaty_id) {
		for ($i = 0; $i < count($this->data); $i++) {
			if ($this->data[$i]["id"] == $treaty_id)
				return $this->data[$i];
		}

		return null;
	}

	///////////////////////////////////////////////////////////////////////////
	// breakTreaty
	///////////////////////////////////////////////////////////////////////////
	function breakTreaty($treaty_id,$empire_data,$target_id) {
		
		$query = "UPDATE game".$this->game_id."_tb_treaty SET status='" . CONF_TREATY_BREAK_PENDING . "' WHERE id='" . intval($treaty_id)."'";
		if (!$this->DB->Execute($query)) trigger_error($this->DB->ErrorMsg());

		$evt = new EventCreator($this->DB);
		$evt->from = $empire_data["id"];
		$evt->to = $target_id;
		$evt->type = CONF_EVENT_BREAKTREATY;
		$evt->params = array (
			"empire_id"=>$empire_data["id"],
			"empire_name" => $empire_data["name"],
			"empire_emperor" => $empire_data["emperor"],
			"gender" => $empire_data["gender"]
		);
		$evt->send();
	}
	
	///////////////////////////////////////////////////////////////////////////
	// deleteTreaty
	///////////////////////////////////////////////////////////////////////////
	function deleteTreaty($treaty_id)
	{
		if (!$this->DB->Execute("DELETE FROM game".$this->game_id."_tb_treaty WHERE id='".intval($treaty_id)."'")) trigger_error($this->DB->ErrorMsg());
	}
}
?>
