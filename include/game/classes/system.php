<?php
// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //


class System {
	var $DB;
	var $game_status;
	var $game_id;

	//////////////////////////////////////////////////////////////////////
	// Constructor
	//////////////////////////////////////////////////////////////////////
	function System($DB) {

		$this->DB = $DB;
		$this->game_status = 0;
		$this->game_id = round($_SESSION["game"]);
	}

	//////////////////////////////////////////////////////////////////////
	// Initialization
	//////////////////////////////////////////////////////////////////////
	function init() {
		// do nothing


	}



	//////////////////////////////////////////////////////////////////////
	// HTTP redirect
	//////////////////////////////////////////////////////////////////////
	function redirect($path, $args = array ()) {
	
		$this->DB->CompleteTrans();
		$warning = "";
        	ob_clean();

		if ((count($args)) == 0)
			$url = $path;
		else {

			$url = $path . "?";
                        $url2 = "";
			reset($args);
			while (list ($key, $value) = each($args)) {
                            if ($key == 'WARNING') $warning = base64_encode($value);
                            if ($key == 'NOTICE') $warning = base64_encode($value);
				$url .= $key . "=" . urlencode($value) . "&";
			}
                        //$url .= base64_encode($url2);
		}

		//	die("Redirect to: $url");



                print("<html><body><script type=\"text/javascript\">open_page('$url');");
                if ($warning != "")  print "CustomAlert(Base64.decode('$warning'));";
                print("</script></body></html>");
                die();
	}


	//////////////////////////////////////////////////////////////////////
	// Generate Password
	//////////////////////////////////////////////////////////////////////
	function generatePassword() {

		$keyspace = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

		$new_password = "";

		for ($i = 0; $i < 8; $i++) {
			$new_password .= $keyspace[rand() % strlen($keyspace)];
		}

		return $new_password;
	}

	//////////////////////////////////////////////////////////////////////
	// Filter text
	//////////////////////////////////////////////////////////////////////
	function filterText($text, $size = -1) {

		$text = stripslashes($text);
		$text = str_replace("..", ".", $text);
		$text = str_replace("<", "(", $text);
		$text = str_replace(">", ")", $text);
		$text = str_replace("\n", "<br/>", $text);

		if ($size > -1)
			$text = substr($text, 0, $size);

		return $text;
	}

	//////////////////////////////////////////////////////////////////////
	//
	//////////////////////////////////////////////////////////////////////
	function alterNumber($number, $percent) {
		$p = rand(0, $percent);

		$r = rand(0, 1);
		if ($r == 0)
			$number += (($number / 100) * $p);
		else
			$number -= (($number / 100) * $p);

		return round($number);
	}

	//////////////////////////////////////////////////////////////////////
	//
	//////////////////////////////////////////////////////////////////////
	function Reset() {

		$players = $this->DB->Execute("SELECT id FROM game".$this->game_id."_tb_empire");
		while (!$players->EOF) {

				$this->DB->Execute("DELETE FROM game".$this->game_id."_tb_army WHERE  empire='" . $players->fields["id"]."'");
				$this->DB->Execute("DELETE FROM game".$this->game_id."_tb_planets WHERE empire='" . $players->fields["id"]."'");
				$this->DB->Execute("DELETE FROM game".$this->game_id."_tb_production WHERE empire='" . $players->fields["id"]."'");
				$this->DB->Execute("DELETE FROM game".$this->game_id."_tb_empire WHERE id='" . $players->fields["id"]."'");
				$this->DB->Execute("DELETE FROM game".$this->game_id."_tb_supply WHERE empire='" . $players->fields["id"]."'");

			$players->MoveNext();
		}

		$this->DB->Execute("DELETE FROM game".$this->game_id."_tb_bond");
		$this->DB->Execute("DELETE FROM game".$this->game_id."_tb_coalition");
		$this->DB->Execute("DELETE FROM game".$this->game_id."_tb_event");
		$this->DB->Execute("DELETE FROM game".$this->game_id."_tb_loan");
		$this->DB->Execute("DELETE FROM game".$this->game_id."_tb_log_login");
		$this->DB->Execute("DELETE FROM game".$this->game_id."_tb_member");
		$this->DB->Execute("DELETE FROM game".$this->game_id."_tb_research_done");
		$this->DB->Execute("DELETE FROM game".$this->game_id."_tb_session");
		$this->DB->Execute("DELETE FROM game".$this->game_id."_tb_shoutbox");
		$this->DB->Execute("DELETE FROM game".$this->game_id."_tb_stats");
		$this->DB->Execute("DELETE FROM game".$this->game_id."_tb_treaty");
		$this->DB->Execute("DELETE FROM game".$this->game_id."_tb_tradeconvoy");

		$this->DB->Execute("DELETE FROM game".$this->game_id."_tb_coordinator");
		$this->DB->Execute("INSERT INTO game".$this->game_id."_tb_coordinator (lottery_cash) VALUES(0)");

		$query = "UPDATE game".$this->game_id."_tb_coordinator SET
			date='" . time(NULL) . "',game_status='0',
			lottery_cash='0',
			lottery_date='0'
			";

		$this->DB->Execute($query);



		// remove empire logos
		if (file_exists("images/empires/".$this->game_id."/")) {
			$dir =opendir("images/empires/".$this->game_id."/");
			while ($file = readdir($dir)) {
				if ($file[0] == ".")
					continue;
				if ($file == "new.jpg")
					continue;
				unlink("images/empires/".$this->game_id."/" . $file);
			}
			closedir($dir);
		}

		// reset pirates
		$rs = $this->DB->Execute("SELECT * FROM game".$this->game_id."_tb_pirate");

		while (!$rs->EOF) {
			$pirate = $rs->fields;
			$pirate["credits"] = rand(0, CONF_PIRATE_BASEVALUE);
			$pirate["food"] = rand(0, CONF_PIRATE_BASEVALUE);
			$pirate["research"] = rand(0, CONF_PIRATE_BASEVALUE);
			$pirate["covertagents"] = rand(0, CONF_PIRATE_BASEVALUE);
			$pirate["stations"] = rand(0, CONF_PIRATE_BASEVALUE);
			$pirate["soldiers"] = rand(0, CONF_PIRATE_BASEVALUE);
			$pirate["fighters"] = rand(0, CONF_PIRATE_BASEVALUE);
			$pirate["lightcruisers"] = rand(0, CONF_PIRATE_BASEVALUE);
			$pirate["heavycruisers"] = rand(0, CONF_PIRATE_BASEVALUE);
			$pirate["carriers"] = rand(0, CONF_PIRATE_BASEVALUE);
			$pirate["food_planets"] = rand(0, CONF_PIRATE_BASEVALUE);
			$pirate["ore_planets"] = rand(0, CONF_PIRATE_BASEVALUE);
			$pirate["tourism_planets"] = rand(0, CONF_PIRATE_BASEVALUE);
			$pirate["supply_planets"] = rand(0, CONF_PIRATE_BASEVALUE);
			$pirate["gov_planets"] = rand(0, CONF_PIRATE_BASEVALUE);
			$pirate["edu_planets"] = rand(0, CONF_PIRATE_BASEVALUE);
			$pirate["urban_planets"] = rand(0, CONF_PIRATE_BASEVALUE);
			$pirate["research_planets"] = rand(0, CONF_PIRATE_BASEVALUE);
			$pirate["petro_planets"] = rand(0, CONF_PIRATE_BASEVALUE);
			$pirate["antipollu_planets"] = rand(0, CONF_PIRATE_BASEVALUE);

			$networth = 0;
			$networth += ($pirate["credits"] * CONF_NETWORTH_CREDITS);

			$planets = 0;
			$planets += $pirate["food_planets"];
			$planets += $pirate["ore_planets"];
			$planets += $pirate["tourism_planets"];
			$planets += $pirate["supply_planets"];
			$planets += $pirate["gov_planets"];
			$planets += $pirate["edu_planets"];
			$planets += $pirate["research_planets"];
			$planets += $pirate["urban_planets"];
			$planets += $pirate["petro_planets"];
			$planets += $pirate["antipollu_planets"];
			$networth += ($planets * CONF_NETWORTH_PLANETS);

			$army = 0;
			$army += $pirate["soldiers"] * CONF_NETWORTH_MILITARY_SOLDIER;
			$army += $pirate["fighters"] * CONF_NETWORTH_MILITARY_FIGHTER;
			$army += $pirate["stations"] * CONF_NETWORTH_MILITARY_STATION;
			$army += $pirate["lightcruisers"] * CONF_NETWORTH_MILITARY_LIGHTCRUISER;
			$army += $pirate["heavycruisers"] * CONF_NETWORTH_MILITARY_HEAVYCRUISER;
			$army += $pirate["carriers"] * CONF_NETWORTH_MILITARY_CARRIER;
			$army += $pirate["covertagents"] * CONF_NETWORTH_MILITARY_COVERT;
			$networth += $army;

			$pirate["networth"] = $networth;

			$this->DB->Execute("UPDATE game".$this->game_id."_tb_pirate SET soldiers=" . $pirate["soldiers"] . "',
												fighters='" . $pirate["fighters"] . "',
												lightcruisers='" . $pirate["lightcruisers"] . "',
												heavycruisers='" . $pirate["heavycruisers"] . "',
												stations='" . $pirate["stations"] . "',
												carriers='" . $pirate["carriers"] . "',
												covertagents='" . $pirate["covertagents"] . "',
												food='" . $pirate["food"] . "',
												credits='" . $pirate["credits"] . "',
												research='" . $pirate["research"] . "',
												food_planets='" . $pirate["food_planets"] . "',
												ore_planets='" . $pirate["ore_planets"] . "',
												tourism_planets='" . $pirate["tourism_planets"] . "',
												supply_planets='" . $pirate["supply_planets"] . "',
												gov_planets='" . $pirate["gov_planets"] . "',
												edu_planets='" . $pirate["edu_planets"] . "',
												research_planets='" . $pirate["research_planets"] . "',
												urban_planets='" . $pirate["urban_planets"] . "',
												petro_planets='" . $pirate["petro_planets"] . "',
												antipollu_planets='" . $pirate["antipollu_planets"] . "',
												networth='" . intval($pirate["networth"]) . "'
											 	WHERE id='" . $pirate["id"]."'");

			$rs->MoveNext();
		}
	}

}

?>
