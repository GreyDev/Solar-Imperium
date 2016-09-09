<?php

// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //

class Session {
	var $DB;
	var $game_id;

	//////////////////////////////////////////////////////////////////////
	// Constructor
	//////////////////////////////////////////////////////////////////////
	function Session($DB) {
		$this->DB = $DB;
		$this->game_id = round($_SESSION["game"]);

		if (isset ($_SESSION["empire_id"])) {

			$rs = $this->DB->Execute("SELECT * FROM game".$this->game_id."_tb_session WHERE empire='" . intval($_SESSION["empire_id"])."'");
			if (!$rs) trigger_error($this->DB->ErrorMsg());
			if ($rs->EOF) {
				if (!$this->DB->Execute("INSERT INTO game".$this->game_id."_tb_session (empire,lastdate) " .
				"VALUES('" . $_SESSION["empire_id"] . "','" .
				time(NULL) . "')")) trigger_error($this->DB->ErrorMsg());

			}
			// update session date
			if (!$this->DB->Execute("UPDATE game".$this->game_id."_tb_session " .
			"SET lastdate = '" . time(NULL) . "' WHERE empire='" . $_SESSION["empire_id"]."'")) trigger_error($this->DB->ErrorMsg());

		}

		// delete old sessions
		$date_timeout = time(NULL) - CONF_SESSION_TIMEOUT;
		if (!$this->DB->Execute("DELETE FROM game".$this->game_id."_tb_session WHERE lastdate < $date_timeout")) trigger_error($this->DB->ErrorMsg());

	}

	//////////////////////////////////////////////////////////////////////
	// Logout of the system
	//////////////////////////////////////////////////////////////////////
	function logout() {
		if (isset ($_SESSION["empire_id"]))
			if (!$this->DB->Execute("DELETE FROM game".$this->game_id."_tb_session WHERE empire='".$_SESSION["empire_id"]."'")) trigger_error($this->DB->ErrorMsg());

		session_destroy();
		$_SESSION = null;
	}

	//////////////////////////////////////////////////////////////////////
	// Login of the system
	//////////////////////////////////////////////////////////////////////
	function login($username, $password) {

		global $CONF_PREMIUM_MEMBERS;

		if ($this->getOnlinePLayers() >= CONF_MAX_SESSIONS) {
			if (!in_array($username,$CONF_PREMIUM_MEMBERS))
				die(T_("Too much players connected, cannot login!"));
		}
		
		$empire = $this->DB->Execute("SELECT id FROM game".$this->game_id."_tb_empire WHERE email='" . addslashes($username) . "' AND " .
		"password='" . md5($password) . "' AND active > 0");

		if (!$empire) trigger_error($this->DB->ErrorMsg());
		if ($empire->EOF)
			return false;

		$_SESSION["empire_id"] = $empire->fields["id"];
		$_SESSION["email"] = $username;

		if (!$this->DB->Execute("INSERT INTO game".$this->game_id."_tb_session (empire,lastdate) " .
		"VALUES('" . $_SESSION["empire_id"] . "'," .
		time(NULL) . ")")) trigger_error($this->DB->ErrorMsg());

	
		return true;
	}

	//////////////////////////////////////////////////////////////////////
	// Empire is active?
	//////////////////////////////////////////////////////////////////////
	function isActive() {

		if (!isset ($_SESSION["empire_id"]))
			return 0;
			
		$query = "SELECT * FROM game".$this->game_id."_tb_empire WHERE id='" . $_SESSION["empire_id"]."'";
		$empire = $this->DB->Execute($query);

                
		if (!$empire) trigger_error($this->DB->ErrorMsg());
		return $empire->fields["active"];
	}

	//////////////////////////////////////////////////////////////////////
	// how much online players?
	//////////////////////////////////////////////////////////////////////
	function getOnlinePLayers() {
		$count = $this->DB->Execute("SELECT COUNT(*) FROM game".$this->game_id."_tb_session");
		if (!$count) trigger_error($this->DB->ErrorMsg());
		return $count->fields[0];
	}



}
?>
