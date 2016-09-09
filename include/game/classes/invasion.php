<?php

// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //
define("INVASION_DEBUG",false);



class Invasion {

	var $DB;
	var $convoy;
	var $target;
	var $total_strength;
	var $total_casualties;
	var $time_start;
	var $time_end;

	var $game_id;

	///////////////////////////////////////////////////////////////////////
	//
	///////////////////////////////////////////////////////////////////////
	function Invasion($DB, $convoy) {
		$this->DB = $DB;
		$time_now = time(NULL);

		$this->game_id = round($_SESSION["game"]);
		$this->convoy = $convoy;
		$query = "SELECT * FROM  game".$this->game_id."_tb_army WHERE empire='" . $this->convoy["empire_to"]."'";
		$rs = $this->DB->Execute($query);
		if (!$rs)
			trigger_error($this->DB->ErrorMsg());

		$this->target = $rs->fields;
		
		if ($rs->EOF) {
	
			$time_start = $convoy["time_start"];
			$time_end = $convoy["time_end"];
			$time_elapsed = $time_now - $time_start;
			$time_start = $time_now;
			$time_end = $time_now + $time_elapsed;

			$query = "UPDATE game".$this->game_id."_tb_armyconvoy SET " .
				"convoy_type='" .CONF_CONVOY_INVASION_RETREAT . "'," .
				"time_start='$time_start',time_end='$time_end' WHERE id=" . $convoy["id"];
	
			if (!$DB->Execute($query)) trigger_error($DB->ErrorMsg());
			$convoy = NULL;
		}
		

		srand(time(NULL));
	}

	///////////////////////////////////////////////////////////////////////
	//
	///////////////////////////////////////////////////////////////////////
	function Attack() {

		
		global $units_info;
		if ($this->target == NULL) return;
		if ($this->convoy == NULL) return;
		
		$time_now = time(NULL);
		
		/////////////////////////////////////////////////////////////
		// Step 1: Build invasion force
		/////////////////////////////////////////////////////////////
		$army_attack = array ();
		$this->convoy["casualties_soldiers"] = 0;
		$this->convoy["casualties_fighters"] = 0;
		$this->convoy["casualties_lightcruisers"] = 0;
		$this->convoy["casualties_heavycruisers"] = 0;
		$this->convoy["casualties_carriers"] = 0;
		$rs2 = $this->DB->Execute("SELECT effectiveness FROM  game".$this->game_id."_tb_army WHERE empire='" . $this->convoy["empire_from"]."'");
		if (!$rs2) trigger_error($this->DB->ErrorMsg());
		$rs3 = $this->DB->Execute("SELECT id,emperor,name,player_id FROM  game".$this->game_id."_tb_empire WHERE id='" . $this->convoy["empire_from"]."'");
		if (!$rs3) trigger_error($this->DB->ErrorMsg());

		$this->convoy["empire"] = $rs3->fields["id"];
		$this->convoy["emperor"] = $rs3->fields["emperor"];
		$this->convoy["player_id"] = $rs3->fields["player_id"];
		$this->convoy["name"] = $rs3->fields["name"];

		$this->convoy["effectiveness"] = $rs2->fields["effectiveness"];
		if ($this->convoy["effectiveness"]< 10) $this->convoy["effectiveness"] = 10;
		if ($this->convoy["effectiveness"] > 150) $this->convoy["effectiveness"] = 150;

		$army_attack[] = $this->convoy;

		$rs = $this->DB->Execute("SELECT * FROM  game".$this->game_id."_tb_armyconvoy WHERE " .
		"convoy_type='" . CONF_CONVOY_INVASION . "' AND " .
		"empire_to='" . $this->convoy["empire_to"] . "' AND " .
		"NOT empire_from='" . $this->convoy["empire_from"] . "' AND " .
		"time_end <= ".($time_now-60));
		if (!$rs)
			trigger_error($this->DB->ErrorMsg());

		while (!$rs->EOF) {
			$convoy_data = $rs->fields;

			$rs2 = $this->DB->Execute("SELECT effectiveness FROM  game".$this->game_id."_tb_army WHERE empire='" . $rs->fields["empire_from"]."'");
			if (!$rs2)
				trigger_error($this->DB->ErrorMsg());

			$rs3 = $this->DB->Execute("SELECT id,emperor,name,player_id FROM  game".$this->game_id."_tb_empire WHERE id='" . $rs->fields["empire_from"]."'");
			if (!$rs3)
				trigger_error($this->DB->ErrorMsg());

			$convoy_data["id"] = $rs3->fields["id"];
			$convoy_data["emperor"] = $rs3->fields["emperor"];
			$convoy_data["player_id"] = $rs3->fields["player_id"];
			$convoy_data["name"] = $rs3->fields["name"];

			$convoy_data["effectiveness"] = $rs2->fields["effectiveness"];
			if ($convoy_data["effectiveness"]< 10) $convoy_data["effectiveness"] = 10;
			if ($convoy_data["effectiveness"] > 150) $convoy_data["effectiveness"] = 150;

			$convoy_data["casualties_soldiers"] = 0;
			$convoy_data["casualties_fighters"] = 0;
			$convoy_data["casualties_lightcruisers"] = 0;
			$convoy_data["casualties_heavycruisers"] = 0;
			$convoy_data["casualties_carriers"] = 0;

			$army_attack[] = $convoy_data;
			$rs->MoveNext();
		}

		/////////////////////////////////////////////////////////////
		// Step 2: Build defense force
		/////////////////////////////////////////////////////////////
		$army_defense = array ();
		if (!isset($this->target["soldiers"])) $this->target["soldiers"] = 0;
		if (!isset($this->target["fighters"])) $this->target["fighters"] = 0;
		if (!isset($this->target["lightcruisers"])) $this->target["lightcruisers"] = 0;
		if (!isset($this->target["heavycruisers"])) $this->target["heavycruisers"] = 0;
		if (!isset($this->target["stations"])) $this->target["stations"] = 0;
		$this->target["casualties_soldiers"] = 0;
		$this->target["casualties_fighters"] = 0;
		$this->target["casualties_stations"] = 0;
		$this->target["casualties_lightcruisers"] = 0;
		$this->target["casualties_heavycruisers"] = 0;

		$army_defense[] = $this->target;

		$rs = $this->DB->Execute("SELECT * FROM  game".$this->game_id."_tb_armyconvoy WHERE " .
		"convoy_type='" . CONF_CONVOY_DEFENSE . "' AND " .
		"empire_to='" . $this->convoy["empire_to"] . "' AND " .
		"time_end >= ".($time_now-(60*3)));

		if (!$rs)
			trigger_error($this->DB->ErrorMsg());

	
		while (!$rs->EOF) {
			$convoy_data = $rs->fields;
			$rs2 = $this->DB->Execute("SELECT effectiveness FROM  game".$this->game_id."_tb_army WHERE empire='" . $rs->fields["empire_from"]."'");
			$rs3 = $this->DB->Execute("SELECT id,emperor,name FROM  game".$this->game_id."_tb_empire WHERE id='" . $rs->fields["empire_from"]."'");
			if (!$rs2)
				trigger_error($this->DB->ErrorMsg());
			$convoy_data["empire"] = $rs3->fields["id"];
			$convoy_data["emperor"] = $rs3->fields["emperor"];
			$convoy_data["name"] = $rs3->fields["name"];
			$convoy_data["effectiveness"] = $rs2->fields["effectiveness"];
			if ($convoy_data["effectiveness"]< 10) $convoy_data["effectiveness"] = 10;
			if ($convoy_data["effectiveness"] > 150) $convoy_data["effectiveness"] = 150;

			$convoy_data["soldiers"] = $rs->fields["convoy_soldiers"];
			$convoy_data["fighters"] = $rs->fields["convoy_fighters"];
			$convoy_data["lightcruisers"] = $rs->fields["convoy_lightcruisers"];
			$convoy_data["heavycruisers"] = $rs->fields["convoy_heavycruisers"];
			$convoy_data["soldiers_level"] = $rs->fields["convoy_soldiers_level"];
			$convoy_data["fighters_level"] = $rs->fields["convoy_fighters_level"];
			$convoy_data["lightcruisers_level"] = $rs->fields["convoy_lightcruisers_level"];
			$convoy_data["heavycruisers_level"] = $rs->fields["convoy_heavycruisers_level"];
			$convoy_data["casualties_soldiers"] = 0;
			$convoy_data["casualties_fighters"] = 0;
			$convoy_data["casualties_stations"] = 0;
			$convoy_data["casualties_lightcruisers"] = 0;
			$convoy_data["casualties_heavycruisers"] = 0;
			$army_defense[] = $convoy_data;
			$rs->MoveNext();
		}

		$this->total_strength = array (
			"SPACE" => array (),
			"ORBITAL" => array (),
			"GROUND" => array ()
		);
		$this->total_casualties = array (
			"SPACE" => array (),
			"ORBITAL" => array (),
			"GROUND" => array ()
		);

		/////////////////////////////////////////////////////////////
		// Step 3: Do attacks
		/////////////////////////////////////////////////////////////

		///////////////////////////////////////////////////////////////////////////////////////////////////////
		// Space Attack!
		///////////////////////////////////////////////////////////////////////////////////////////////////////

		$space_won_attack = 0;
		$space_won_defense = 0;

		for ($round = 0; $round < 5; $round++) {

			// print "ROUND ".($round+1)."<br/>";
			$attack_strength = 1;
			$total_attack_strength = array ();
			$total_attack_strength["soldiers"] = 0;
			$total_attack_strength["fighters"] = 0;
			$total_attack_strength["lightcruisers"] = 0;
			$total_attack_strength["heavycruisers"] = 0;

			for ($i = 0; $i < count($army_attack); $i++) {

				$soldiers_strength = (($army_attack[$i]["convoy_soldiers"] - $army_attack[$i]["casualties_soldiers"]) * $units_info["soldiers_" . $army_attack[$i]["convoy_soldiers_level"]]["invasion_space"]);
				$soldiers_strength = floor(($soldiers_strength / 100) * $army_attack[$i]["effectiveness"]);
				$attack_strength += $soldiers_strength;

				$fighters_strength = (($army_attack[$i]["convoy_fighters"] - $army_attack[$i]["casualties_fighters"]) * $units_info["fighters_" . $army_attack[$i]["convoy_fighters_level"]]["invasion_space"]);
				$fighters_strength = floor(($fighters_strength / 100) * $army_attack[$i]["effectiveness"]);
				$attack_strength += $fighters_strength;

				$lightcruisers_strength = (($army_attack[$i]["convoy_lightcruisers"] - $army_attack[$i]["casualties_lightcruisers"]) * $units_info["lightcruisers_" . $army_attack[$i]["convoy_lightcruisers_level"]]["invasion_space"]);
				$lightcruisers_strength = floor(($lightcruisers_strength / 100) * $army_attack[$i]["effectiveness"]);
				$attack_strength += $lightcruisers_strength;

				$heavycruisers_strength = (($army_attack[$i]["convoy_heavycruisers"] - $army_attack[$i]["casualties_heavycruisers"]) * $units_info["heavycruisers_" . $army_attack[$i]["convoy_heavycruisers_level"]]["invasion_space"]);
				$heavycruisers_strength = floor(($heavycruisers_strength / 100) * $army_attack[$i]["effectiveness"]);
				$attack_strength += $heavycruisers_strength;

				$total_attack_strength["soldiers"] += $soldiers_strength;
				$total_attack_strength["fighters"] += $fighters_strength;
				$total_attack_strength["lightcruisers"] += $lightcruisers_strength;
				$total_attack_strength["heavycruisers"] += $heavycruisers_strength;
			}

			$defense_strength = 1;
			$total_defense_strength = array ();
			$total_defense_strength["soldiers"] = 0;
			$total_defense_strength["stations"] = 0;
			$total_defense_strength["fighters"] = 0;
			$total_defense_strength["lightcruisers"] = 0;
			$total_defense_strength["heavycruisers"] = 0;
			for ($i = 0; $i < count($army_defense); $i++) {

				$soldiers_strength = (($army_defense[$i]["soldiers"] - $army_defense[$i]["casualties_soldiers"]) * $units_info["soldiers_" . $army_defense[$i]["soldiers_level"]]["invasion_space"]);
				$soldiers_strength = floor(($soldiers_strength / 100) * $army_defense[$i]["effectiveness"]);
				$defense_strength += $soldiers_strength;

				$fighters_strength = (($army_defense[$i]["fighters"] - $army_defense[$i]["casualties_fighters"]) * $units_info["fighters_" . $army_defense[$i]["fighters_level"]]["invasion_space"]);
				$fighters_strength = floor(($fighters_strength / 100) * $army_defense[$i]["effectiveness"]);
				//$defense_strength += $fighters_strength;

				if (isset ($army_defense[$i]["stations"])) {
					$stations_strength = (($army_defense[$i]["stations"] - $army_defense[$i]["casualties_stations"]) * $units_info["fighters_" . $army_defense[$i]["stations_level"]]["invasion_space"]);
					$stations_strength = floor(($stations_strength / 100) * $army_defense[$i]["effectiveness"]);
					$defense_strength += $stations_strength;
				}

				$lightcruisers_strength = (($army_defense[$i]["lightcruisers"] - $army_defense[$i]["casualties_lightcruisers"]) * $units_info["lightcruisers_" . $army_defense[$i]["lightcruisers_level"]]["invasion_space"]);
				$lightcruisers_strength = floor(($lightcruisers_strength / 100) * $army_defense[$i]["effectiveness"]);
				$defense_strength += $lightcruisers_strength;

				$heavycruisers_strength = (($army_defense[$i]["heavycruisers"] - $army_defense[$i]["casualties_heavycruisers"]) * $units_info["heavycruisers_" . $army_defense[$i]["heavycruisers_level"]]["invasion_space"]);
				$heavycruisers_strength = floor(($heavycruisers_strength / 100) * $army_defense[$i]["effectiveness"]);

				$defense_strength += $heavycruisers_strength;

				$total_defense_strength["soldiers"] += $soldiers_strength;
				$total_defense_strength["fighters"] += $fighters_strength;
				$total_defense_strength["stations"] += $stations_strength;
				$total_defense_strength["lightcruisers"] += $lightcruisers_strength;
				$total_defense_strength["heavycruisers"] += $heavycruisers_strength;

			}
			$defense_strength *= CONF_INVASION_DEFENSE_BONUS;

			$this->total_strength["SPACE"][$round] = array (
				"attack" => $total_attack_strength,
				"defense" => $total_defense_strength
			);


			// add randomness
			$attack_strength += floor(rand(0, CONF_INVASION_RANDOMNESS) * ($attack_strength / 100));
			$defense_strength += floor(rand(0, CONF_INVASION_RANDOMNESS) * ($defense_strength / 100));
			if ($attack_strength == 0)
				$attack_strength = 1;
			if ($defense_strength == 0)
				$defense_strength = 1;

			// print "ATTACK STRENGTH: ".$attack_strength."<br/>";
			// print "DEFENSE STRENGTH: ".$defense_strength."<br/>";
			$casualties = $attack_strength - $defense_strength;
			if ($casualties == 0)
				$casualties = 1;

			// print "RAW DAMAGE: ".$casualties."<br/>";
			$casualties_attack = 0;
			$casualties_defense = 0;

			if ($casualties <= 1) {
				// print "ATTACKERS LOOSE<br/>";
				$casualties_attack = (($defense_strength / $attack_strength) * 100);
				$casualties_defense = (($attack_strength / $defense_strength) * 100);
				$casualties_attack = ($casualties_attack) / CONF_INVASION_CASUALTIES_WON;
				$casualties_defense = ($casualties_defense) / CONF_INVASION_CASUALTIES_LOOSE;
				$space_won_defense++;

			} else {
				// print "DEFENDERS LOOSE<br/>";
				$casualties_attack = (($defense_strength / $attack_strength) * 100);
				$casualties_defense = (($attack_strength / $defense_strength) * 100);
				$casualties_attack = ($casualties_attack) / CONF_INVASION_CASUALTIES_LOOSE;
				$casualties_defense = ($casualties_defense) / CONF_INVASION_CASUALTIES_WON;
				$space_won_attack++;
			}

			if ($casualties_attack > 100)
				$casualties_attack = 100;
			if ($casualties_defense > 100)
				$casualties_defense = 100;

			$this->total_casualties["SPACE"][$round] = array (
				"attack" => $casualties_attack,
				"defense" => $casualties_defense
			);

			// calculating casualties	
			for ($i = 0; $i < count($army_attack); $i++) {
				// print "ATTACK CONVOY: $i<br/>";
				if ($total_attack_strength["soldiers"] != 0) {
					$percent = (((($army_attack[$i]["convoy_soldiers"] - $army_attack[$i]["casualties_soldiers"]) / $total_attack_strength["soldiers"]) * 100) / 100) * $casualties_attack;
					if ($percent > 100)
						$percent = 100;

					$casualties = floor((($army_attack[$i]["convoy_soldiers"] - $army_attack[$i]["casualties_soldiers"]) / 100) * $percent);
					$army_attack[$i]["casualties_soldiers"] += $casualties;
					// print "SOLDIERS CASUALTIES: " .$percent." % (".$casualties.")<br/>";
				}
				if ($total_attack_strength["fighters"] != 0) {
					$percent = (((($army_attack[$i]["convoy_fighters"] - $army_attack[$i]["casualties_fighters"]) / $total_attack_strength["fighters"]) * 100) / 100) * $casualties_attack;
					if ($percent > 100)
						$percent = 100;
					$casualties = floor((($army_attack[$i]["convoy_fighters"] - $army_attack[$i]["casualties_fighters"]) / 100) * $percent);
					$army_attack[$i]["casualties_fighters"] += $casualties;
					// print "FIGHTERS CASUALTIES: " .$percent." % (".$casualties.")<br/>";
				}

				if ($round >= CONF_INVASION_LIGHTCRUISER_PROTECTION_ROUNDS)
					if ($total_attack_strength["lightcruisers"] != 0) {
						$percent = (((($army_attack[$i]["convoy_lightcruisers"] - $army_attack[$i]["casualties_lightcruisers"]) / $total_attack_strength["lightcruisers"]) * 100) / 100) * $casualties_attack;
						if ($percent > 100)
							$percent = 100;
						$casualties = floor((($army_attack[$i]["convoy_lightcruisers"] - $army_attack[$i]["casualties_lightcruisers"]) / 100) * $percent);
						$army_attack[$i]["casualties_lightcruisers"] += $casualties;
						// print "LIGHTCRUISERS CASUALTIES: " .$percent." %  (".$casualties.")<br/>";
					}

				if ($total_attack_strength["heavycruisers"] != 0) {
					$percent = (((($army_attack[$i]["convoy_heavycruisers"] - $army_attack[$i]["casualties_heavycruisers"]) / $total_attack_strength["heavycruisers"]) * 100) / 100) * $casualties_attack;
					if ($percent > 100)
						$percent = 100;
					$casualties = floor((($army_attack[$i]["convoy_heavycruisers"] - $army_attack[$i]["casualties_heavycruisers"]) / 100) * $percent);
					$army_attack[$i]["casualties_heavycruisers"] += $casualties;
					// print "HEAVYCRUISERS CASUALTIES: " .$percent." %  (".$casualties.")<br/>";
				}

				// Calculate carriers lost
				$percent = (($casualties_attack / 100) * CONF_INVASION_CARRIERS_DAMAGE) * $units_info["carriers_" . $army_attack[$i]["carriers_level"]]["toughness"];
				$casualties = floor((($army_attack[$i]["carriers"] - $army_attack[$i]["casualties_carriers"]) / 100) * $percent);

				// we need to calculate the casualties related to the carriers itself (soldiers, fighters)
				$army_attack[$i]["casualties_soldiers"] += ($casualties * (1 / CONF_CARRIER_SOLDIER));

				if ($army_attack[$i]["casualties_soldiers"] > $army_attack[$i]["convoy_soldiers"])
					$army_attack[$i]["casualties_soldiers"] = $army_attack[$i]["convoy_soldiers"];

				$army_attack[$i]["casualties_fighters"] += ($casualties * (1 / CONF_CARRIER_FIGHTER));
				if ($army_attack[$i]["casualties_fighters"] > $army_attack[$i]["convoy_fighters"])
					$army_attack[$i]["casualties_fighters"] = $army_attack[$i]["convoy_fighters"];

				$army_attack[$i]["casualties_carriers"] += $casualties;
				// print "CARRIERS CASUALTIES: " .$percent." %  (".$casualties.")<br/>";

			}

			for ($i = 0; $i < count($army_defense); $i++) {
				// print "DEFENSE CONVOY: $i<br/>";
				if ($total_defense_strength["soldiers"] != 0) {
					$percent = (((($army_defense[$i]["soldiers"] - $army_defense[$i]["casualties_soldiers"]) / $total_defense_strength["soldiers"]) * 100) / 100) * $casualties_defense;
					if ($percent > 100)
						$percent = 100;
					$casualties = floor((($army_defense[$i]["soldiers"] - $army_defense[$i]["casualties_soldiers"]) / 100) * $percent);
					$army_defense[$i]["casualties_soldiers"] += $casualties;
					// print "SOLDIERS CASUALTIES: " .$percent." % (".$casualties.")<br/>";
				}
				if ($total_defense_strength["fighters"] != 0) {
					$percent = (((($army_defense[$i]["fighters"] - $army_defense[$i]["casualties_fighters"]) / $total_defense_strength["fighters"]) * 100) / 100) * $casualties_defense;
					if ($percent > 100)
						$percent = 100;
					$casualties = floor((($army_defense[$i]["fighters"] - $army_defense[$i]["casualties_fighters"]) / 100) * $percent);
					$army_defense[$i]["casualties_fighters"] += $casualties;
					// print "FIGHTERS CASUALTIES: " .$percent." % (".$casualties.")<br/>";
				}

				if (isset ($army_defense[$i]["stations"]))
					if ($total_defense_strength["stations"] != 0) {
						$percent = (((($army_defense[$i]["stations"] - $army_defense[$i]["casualties_stations"]) / $total_defense_strength["stations"]) * 100) / 100) * $casualties_defense;
						if ($percent > 100)
							$percent = 100;
						$casualties = floor((($army_defense[$i]["stations"] - $army_defense[$i]["casualties_stations"]) / 100) * $percent);
						$army_defense[$i]["casualties_stations"] += $casualties;
						// print "STATIONS CASUALTIES: " .$percent." % (".$casualties.")<br/>";
					}

				if ($round >= CONF_INVASION_LIGHTCRUISER_PROTECTION_ROUNDS)
					if ($total_defense_strength["lightcruisers"] != 0) {
						$percent = (((($army_defense[$i]["lightcruisers"] - $army_defense[$i]["casualties_lightcruisers"]) / $total_defense_strength["lightcruisers"]) * 100) / 100) * $casualties_defense;
						if ($percent > 100)
							$percent = 100;
						$casualties = floor((($army_defense[$i]["lightcruisers"] - $army_defense[$i]["casualties_lightcruisers"]) / 100) * $percent);
						$army_defense[$i]["casualties_lightcruisers"] += $casualties;
						// print "LIGHTCRUISERS CASUALTIES: " .$percent." %  (".$casualties.")<br/>";
					}

				if ($total_defense_strength["heavycruisers"] != 0) {
					$percent = (((($army_defense[$i]["heavycruisers"] - $army_defense[$i]["casualties_heavycruisers"]) / $total_defense_strength["heavycruisers"]) * 100) / 100) * $casualties_defense;
					if ($percent > 100)
						$percent = 100;
					$casualties = floor((($army_defense[$i]["heavycruisers"] - $army_defense[$i]["casualties_heavycruisers"]) / 100) * $percent);
					$army_defense[$i]["casualties_heavycruisers"] += $casualties;
					// print "HEAVYCRUISERS CASUALTIES: " .$percent." %  (".$casualties.")<br/>";
				}

			}

			// print "<HR>";			

		}
		// print "Space attack result: (ATTACK: ".$space_won_attack." / DEFENSE: ".$space_won_defense.")<br/>";
		if ($space_won_attack < 3)
			return $this->Finish(false, false, false, $army_attack, $army_defense);

		///////////////////////////////////////////////////////////////////////////////////////////////////////
		// Orbital attack!
		///////////////////////////////////////////////////////////////////////////////////////////////////////
		// print "<B>ORBITAL</B><br/>";
		$orbital_won_attack = 0;
		$orbital_won_defense = 0;

		for ($round = 0; $round < 5; $round++) {

			// print "ROUND ".($round+1)."<br/>";
			$attack_strength = 1;
			$total_attack_strength = array ();
			$total_attack_strength["soldiers"] = 0;
			$total_attack_strength["fighters"] = 0;
			$total_attack_strength["lightcruisers"] = 0;
			$total_attack_strength["heavycruisers"] = 0;

			for ($i = 0; $i < count($army_attack); $i++) {

				$soldiers_strength = (($army_attack[$i]["convoy_soldiers"] - $army_attack[$i]["casualties_soldiers"]) * $units_info["soldiers_" . $army_attack[$i]["convoy_soldiers_level"]]["invasion_orbital"]);
				$soldiers_strength = floor(($soldiers_strength / 100) * $army_attack[$i]["effectiveness"]);
				$attack_strength += $soldiers_strength;

				$fighters_strength = (($army_attack[$i]["convoy_fighters"] - $army_attack[$i]["casualties_fighters"]) * $units_info["fighters_" . $army_attack[$i]["convoy_fighters_level"]]["invasion_orbital"]);
				$fighters_strength = floor(($fighters_strength / 100) * $army_attack[$i]["effectiveness"]);
				$attack_strength += $fighters_strength;

				$lightcruisers_strength = (($army_attack[$i]["convoy_lightcruisers"] - $army_attack[$i]["casualties_lightcruisers"]) * $units_info["lightcruisers_" . $army_attack[$i]["convoy_lightcruisers_level"]]["invasion_orbital"]);
				$lightcruisers_strength = floor(($lightcruisers_strength / 100) * $army_attack[$i]["effectiveness"]);
				$attack_strength += $lightcruisers_strength;

				$heavycruisers_strength = (($army_attack[$i]["convoy_heavycruisers"] - $army_attack[$i]["casualties_heavycruisers"]) * $units_info["heavycruisers_" . $army_attack[$i]["convoy_heavycruisers_level"]]["invasion_orbital"]);
				$heavycruisers_strength = floor(($heavycruisers_strength / 100) * $army_attack[$i]["effectiveness"]);
				$attack_strength += $heavycruisers_strength;

				$total_attack_strength["soldiers"] += $soldiers_strength;
				$total_attack_strength["fighters"] += $fighters_strength;
				$total_attack_strength["lightcruisers"] += $lightcruisers_strength;
				$total_attack_strength["heavycruisers"] += $heavycruisers_strength;
			}

			$defense_strength = 1;
			$total_defense_strength = array ();
			$total_defense_strength["soldiers"] = 0;
			$total_defense_strength["stations"] = 0;
			$total_defense_strength["fighters"] = 0;
			$total_defense_strength["lightcruisers"] = 0;
			$total_defense_strength["heavycruisers"] = 0;
			for ($i = 0; $i < count($army_defense); $i++) {

				$soldiers_strength = (($army_defense[$i]["soldiers"] - $army_defense[$i]["casualties_soldiers"]) * $units_info["soldiers_" . $army_defense[$i]["soldiers_level"]]["invasion_orbital"]);
				$soldiers_strength = floor(($soldiers_strength / 100) * $army_defense[$i]["effectiveness"]);
				$defense_strength += $soldiers_strength;
				
				$fighters_strength = (($army_defense[$i]["fighters"]-$army_defense[$i]["casualties_fighters"]) * $units_info["fighters_".$army_defense[$i]["fighters_level"]]["invasion_orbital"]);
				$fighters_strength = floor(($fighters_strength/100)*$army_defense[$i]["effectiveness"]);
				

				if (isset($army_defense[$i]["stations"])) {
				$stations_strength = (($army_defense[$i]["stations"] - $army_defense[$i]["casualties_stations"]) * $units_info["fighters_" . $army_defense[$i]["stations_level"]]["invasion_orbital"]);
				$stations_strength = floor(($stations_strength / 100) * $army_defense[$i]["effectiveness"]);
				$defense_strength += $stations_strength;
			}
			
				$lightcruisers_strength = (($army_defense[$i]["lightcruisers"] - $army_defense[$i]["casualties_lightcruisers"]) * $units_info["lightcruisers_" . $army_defense[$i]["lightcruisers_level"]]["invasion_orbital"]);
				$soldiers_strength = floor(($soldiers_strength / 100) * $army_defense[$i]["effectiveness"]);
				$defense_strength += $lightcruisers_strength;

				$heavycruisers_strength = (($army_defense[$i]["heavycruisers"] - $army_defense[$i]["casualties_heavycruisers"]) * $units_info["heavycruisers_" . $army_defense[$i]["heavycruisers_level"]]["invasion_orbital"]);
				$heavycruisers_strength = floor(($heavycruisers_strength / 100) * $army_defense[$i]["effectiveness"]);

				$defense_strength += $heavycruisers_strength;

				$total_defense_strength["soldiers"] += $soldiers_strength;
				$total_defense_strength["fighters"] += $fighters_strength;
				$total_defense_strength["stations"] += $stations_strength;
				$total_defense_strength["lightcruisers"] += $lightcruisers_strength;
				$total_defense_strength["heavycruisers"] += $heavycruisers_strength;

			}
			$defense_strength *= CONF_INVASION_DEFENSE_BONUS;

			$this->total_strength["ORBITAL"][$round] = array (
				"attack" => $total_attack_strength,
				"defense" => $total_defense_strength
			);

			//			$attack_strength = 8000;
			//			$defense_strength = 5000;	
			//			$attack_strength = 4000;
			//			$defense_strength = 5000;	

			// add randomness
			$attack_strength += floor(rand(0, CONF_INVASION_RANDOMNESS) * ($attack_strength / 100));
			$defense_strength += floor(rand(0, CONF_INVASION_RANDOMNESS) * ($defense_strength / 100));
			if ($attack_strength == 0)
				$attack_strength = 1;
			if ($defense_strength == 0)
				$defense_strength = 1;

			// print "ATTACK STRENGTH: ".$attack_strength."<br/>";
			// print "DEFENSE STRENGTH: ".$defense_strength."<br/>";
			$casualties = $attack_strength - $defense_strength;
			if ($casualties == 0)
				$casualties = 1;

			// print "RAW DAMAGE: ".$casualties."<br/>";
			$casualties_attack = 0;
			$casualties_defense = 0;

			if ($casualties <= 1) {
				// print "ATTACKERS LOOSE<br/>";
				$casualties_attack = (($defense_strength / $attack_strength) * 100);
				$casualties_defense = (($attack_strength / $defense_strength) * 100);
				$casualties_attack = ($casualties_attack) / CONF_INVASION_CASUALTIES_WON;
				$casualties_defense = ($casualties_defense) / CONF_INVASION_CASUALTIES_LOOSE;
				$orbital_won_defense++;

			} else {
				// print "DEFENDERS LOOSE<br/>";
				$casualties_attack = (($defense_strength / $attack_strength) * 100);
				$casualties_defense = (($attack_strength / $defense_strength) * 100);
				$casualties_attack = ($casualties_attack) / CONF_INVASION_CASUALTIES_LOOSE;
				$casualties_defense = ($casualties_defense) / CONF_INVASION_CASUALTIES_WON;
				$orbital_won_attack++;
			}

			if ($casualties_attack > 100)
				$casualties_attack = 100;
			if ($casualties_defense > 100)
				$casualties_defense = 100;
			$this->total_casualties["ORBITAL"][$round] = array (
				"attack" => $casualties_attack,
				"defense" => $casualties_defense
			);

			// print "CASUALTIES ATTACK: $casualties_attack<br/>";
			// print "CASUALTIES DEFENSE: $casualties_defense<br/>";
			// print "<br/>";

			// calculating casualties	
			for ($i = 0; $i < count($army_attack); $i++) {
				// print "ATTACK CONVOY: $i<br/>";
				if ($total_attack_strength["soldiers"] != 0) {
					$percent = (((($army_attack[$i]["convoy_soldiers"] - $army_attack[$i]["casualties_soldiers"]) / $total_attack_strength["soldiers"]) * 100) / 100) * $casualties_attack;
					if ($percent > 100)
						$percent = 100;
					$casualties = floor((($army_attack[$i]["convoy_soldiers"] - $army_attack[$i]["casualties_soldiers"]) / 100) * $percent);
					$army_attack[$i]["casualties_soldiers"] += $casualties;
					// print "SOLDIERS CASUALTIES: " .$percent." % (".$casualties.")<br/>";
				}
				if ($total_attack_strength["fighters"] != 0) {
					$percent = (((($army_attack[$i]["convoy_fighters"] - $army_attack[$i]["casualties_fighters"]) / $total_attack_strength["fighters"]) * 100) / 100) * $casualties_attack;
					if ($percent > 100)
						$percent = 100;
					$casualties = floor((($army_attack[$i]["convoy_fighters"] - $army_attack[$i]["casualties_fighters"]) / 100) * $percent);
					$army_attack[$i]["casualties_fighters"] += $casualties;
					// print "FIGHTERS CASUALTIES: " .$percent." % (".$casualties.")<br/>";
				}

				if ($round >= CONF_INVASION_LIGHTCRUISER_PROTECTION_ROUNDS)
					if ($total_attack_strength["lightcruisers"] != 0) {
						$percent = (((($army_attack[$i]["convoy_lightcruisers"] - $army_attack[$i]["casualties_lightcruisers"]) / $total_attack_strength["lightcruisers"]) * 100) / 100) * $casualties_attack;
						if ($percent > 100)
							$percent = 100;
						$casualties = floor((($army_attack[$i]["convoy_lightcruisers"] - $army_attack[$i]["casualties_lightcruisers"]) / 100) * $percent);
						$army_attack[$i]["casualties_lightcruisers"] += $casualties;
						// print "LIGHTCRUISERS CASUALTIES: " .$percent." %  (".$casualties.")<br/>";
					}

				if ($total_attack_strength["heavycruisers"] != 0) {
					$percent = (((($army_attack[$i]["convoy_heavycruisers"] - $army_attack[$i]["casualties_heavycruisers"]) / $total_attack_strength["heavycruisers"]) * 100) / 100) * $casualties_attack;
					if ($percent > 100)
						$percent = 100;
					$casualties = floor((($army_attack[$i]["convoy_heavycruisers"] - $army_attack[$i]["casualties_heavycruisers"]) / 100) * $percent);
					$army_attack[$i]["casualties_heavycruisers"] += $casualties;
					// print "HEAVYCRUISERS CASUALTIES: " .$percent." %  (".$casualties.")<br/>";
				}

			}

			for ($i = 0; $i < count($army_defense); $i++) {
				// print "DEFENSE CONVOY: $i<br/>";
				if ($total_defense_strength["soldiers"] != 0) {
					$percent = (((($army_defense[$i]["soldiers"] - $army_defense[$i]["casualties_soldiers"]) / $total_defense_strength["soldiers"]) * 100) / 100) * $casualties_defense;
					if ($percent > 100)
						$percent = 100;
					$casualties = floor((($army_defense[$i]["soldiers"] - $army_defense[$i]["casualties_soldiers"]) / 100) * $percent);
					$army_defense[$i]["casualties_soldiers"] += $casualties;
					// print "SOLDIERS CASUALTIES: " .$percent." % (".$casualties.")<br/>";
				}
				if ($total_defense_strength["fighters"] != 0) {
					$percent = (((($army_defense[$i]["fighters"] - $army_defense[$i]["casualties_fighters"]) / $total_defense_strength["fighters"]) * 100) / 100) * $casualties_defense;
					if ($percent > 100)
						$percent = 100;
					$casualties = floor((($army_defense[$i]["fighters"] - $army_defense[$i]["casualties_fighters"]) / 100) * $percent);
					$army_defense[$i]["casualties_fighters"] += $casualties;
					// print "FIGHTERS CASUALTIES: " .$percent." % (".$casualties.")<br/>";
				}

				if (isset ($army_defense[$i]["stations"]))
					if ($total_defense_strength["stations"] != 0) {
						$percent = (((($army_defense[$i]["stations"] - $army_defense[$i]["casualties_stations"]) / $total_defense_strength["stations"]) * 100) / 100) * $casualties_defense;
						if ($percent > 100)
							$percent = 100;
						$casualties = floor((($army_defense[$i]["stations"] - $army_defense[$i]["casualties_stations"]) / 100) * $percent);
						$army_defense[$i]["casualties_stations"] += $casualties;
						// print "STATIONS CASUALTIES: " .$percent." % (".$casualties.")<br/>";
					}

				if ($round >= CONF_INVASION_LIGHTCRUISER_PROTECTION_ROUNDS)
					if ($total_defense_strength["lightcruisers"] != 0) {
						$percent = (((($army_defense[$i]["lightcruisers"] - $army_defense[$i]["casualties_lightcruisers"]) / $total_defense_strength["lightcruisers"]) * 100) / 100) * $casualties_defense;
						if ($percent > 100)
							$percent = 100;
						$casualties = floor((($army_defense[$i]["lightcruisers"] - $army_defense[$i]["casualties_lightcruisers"]) / 100) * $percent);
						$army_defense[$i]["casualties_lightcruisers"] += $casualties;
						// print "LIGHTCRUISERS CASUALTIES: " .$percent." %  (".$casualties.")<br/>";
					}

				if ($total_defense_strength["heavycruisers"] != 0) {
					$percent = (((($army_defense[$i]["heavycruisers"] - $army_defense[$i]["casualties_heavycruisers"]) / $total_defense_strength["heavycruisers"]) * 100) / 100) * $casualties_defense;
					if ($percent > 100)
						$percent = 100;
					$casualties = floor((($army_defense[$i]["heavycruisers"] - $army_defense[$i]["casualties_heavycruisers"]) / 100) * $percent);
					$army_defense[$i]["casualties_heavycruisers"] += $casualties;
					// print "HEAVYCRUISERS CASUALTIES: " .$percent." %  (".$casualties.")<br/>";
				}

			}

			// print "<HR>";			

		}
		// print "Space attack result: (ATTACK: ".$orbital_won_attack." / DEFENSE: ".$orbital_won_defense.")<br/>";
		if ($orbital_won_attack < 3)
			return $this->Finish(true, false, false, $army_attack, $army_defense);

		///////////////////////////////////////////////////////////////////////////////////////////////////////
		// Ground attack!
		///////////////////////////////////////////////////////////////////////////////////////////////////////
		// print "<B>GROUND</B><br/>";
		$ground_won_attack = 0;
		$ground_won_defense = 0;

		for ($round = 0; $round < 5; $round++) {

			// print "ROUND ".($round+1)."<br/>";
			$attack_strength = 1;
			$total_attack_strength = array ();
			$total_attack_strength["soldiers"] = 0;
			$total_attack_strength["fighters"] = 0;
			$total_attack_strength["lightcruisers"] = 0;
			$total_attack_strength["heavycruisers"] = 0;

			for ($i = 0; $i < count($army_attack); $i++) {

				$soldiers_strength = (($army_attack[$i]["convoy_soldiers"] - $army_attack[$i]["casualties_soldiers"]) * $units_info["soldiers_" . $army_attack[$i]["convoy_soldiers_level"]]["invasion_ground"]);
				$soldiers_strength = floor(($soldiers_strength / 100) * $army_attack[$i]["effectiveness"]);
				$attack_strength += $soldiers_strength;

				$fighters_strength = (($army_attack[$i]["convoy_fighters"] - $army_attack[$i]["casualties_fighters"]) * $units_info["fighters_" . $army_attack[$i]["convoy_fighters_level"]]["invasion_ground"]);
				$fighters_strength = floor(($fighters_strength / 100) * $army_attack[$i]["effectiveness"]);
				$attack_strength += $fighters_strength;

				$lightcruisers_strength = (($army_attack[$i]["convoy_lightcruisers"] - $army_attack[$i]["casualties_lightcruisers"]) * $units_info["lightcruisers_" . $army_attack[$i]["convoy_lightcruisers_level"]]["invasion_ground"]);
				$lightcruisers_strength = floor(($lightcruisers_strength / 100) * $army_attack[$i]["effectiveness"]);
				$attack_strength += $lightcruisers_strength;

				$heavycruisers_strength = (($army_attack[$i]["convoy_heavycruisers"] - $army_attack[$i]["casualties_heavycruisers"]) * $units_info["heavycruisers_" . $army_attack[$i]["convoy_heavycruisers_level"]]["invasion_ground"]);
				$heavycruisers_strength = floor(($heavycruisers_strength / 100) * $army_attack[$i]["effectiveness"]);
				$attack_strength += $heavycruisers_strength;

				$total_attack_strength["soldiers"] += $soldiers_strength;
				$total_attack_strength["fighters"] += $fighters_strength;
				$total_attack_strength["lightcruisers"] += $lightcruisers_strength;
				$total_attack_strength["heavycruisers"] += $heavycruisers_strength;
			}
			//				print "<HR>";
			//				print_r($total_attack_strength);
			//				print "<BR/>";

			$defense_strength = 1;
			$total_defense_strength = array ();
			$total_defense_strength["soldiers"] = 0;
			$total_defense_strength["stations"] = 0;
			$total_defense_strength["fighters"] = 0;
			$total_defense_strength["lightcruisers"] = 0;
			$total_defense_strength["heavycruisers"] = 0;
			for ($i = 0; $i < count($army_defense); $i++) {

				$soldiers_strength = (($army_defense[$i]["soldiers"] - $army_defense[$i]["casualties_soldiers"]) * $units_info["soldiers_" . $army_defense[$i]["soldiers_level"]]["invasion_ground"]);
				$soldiers_strength = floor(($soldiers_strength / 100) * $army_defense[$i]["effectiveness"]);
				$defense_strength += $soldiers_strength;

				$fighters_strength = (($army_defense[$i]["fighters"] - $army_defense[$i]["casualties_fighters"]) * $units_info["fighters_" . $army_defense[$i]["fighters_level"]]["invasion_ground"]);
				$fighters_strength = floor(($fighters_strength / 100) * $army_defense[$i]["effectiveness"]);
			//	$defense_strength += $fighters_strength;

				if (isset($army_defense[$i]["stations"])) {
				$stations_strength = (($army_defense[$i]["stations"] - $army_defense[$i]["casualties_stations"]) * $units_info["fighters_" . $army_defense[$i]["stations_level"]]["invasion_ground"]);
				$stations_strength = floor(($stations_strength / 100) * $army_defense[$i]["effectiveness"]);
				$defense_strength += $stations_strength;
			}
			

				$lightcruisers_strength = (($army_defense[$i]["lightcruisers"] - $army_defense[$i]["casualties_lightcruisers"]) * $units_info["lightcruisers_" . $army_defense[$i]["lightcruisers_level"]]["invasion_ground"]);
				$lightcruisers_strength = floor(($lightcruisers_strength / 100) * $army_defense[$i]["effectiveness"]);
				$defense_strength += $lightcruisers_strength;

				$heavycruisers_strength = (($army_defense[$i]["heavycruisers"] - $army_defense[$i]["casualties_heavycruisers"]) * $units_info["heavycruisers_" . $army_defense[$i]["heavycruisers_level"]]["invasion_ground"]);
				$heavycruisers_strength = floor(($heavycruisers_strength / 100) * $army_defense[$i]["effectiveness"]);

				$defense_strength += $heavycruisers_strength;
				$total_defense_strength["soldiers"] += $soldiers_strength;
				$total_defense_strength["fighters"] += $fighters_strength;
				$total_defense_strength["stations"] += $stations_strength;
				$total_defense_strength["lightcruisers"] += $lightcruisers_strength;
				$total_defense_strength["heavycruisers"] += $heavycruisers_strength;

			}
			//				print_r($total_defense_strength);
			$defense_strength *= CONF_INVASION_DEFENSE_BONUS;

			$this->total_strength["GROUND"][$round] = array (
				"attack" => $total_attack_strength,
				"defense" => $total_defense_strength
			);

			// add randomness
			$attack_strength += floor(rand(0, CONF_INVASION_RANDOMNESS) * ($attack_strength / 100));
			$defense_strength += floor(rand(0, CONF_INVASION_RANDOMNESS) * ($defense_strength / 100));

			//			print "<HR>";
			//			 print "ATTACK STRENGTH: ".$attack_strength."<br/>";
			//			 print "DEFENSE STRENGTH: ".$defense_strength."<br/>";
			$casualties = $attack_strength - $defense_strength;
			if ($casualties == 0)
				$casualties = 1;

			//			 print "RAW DAMAGE: ".$casualties."<br/>";
			$casualties_attack = 0;
			$casualties_defense = 0;

			if ($attack_strength == 0)
				$attack_strength = 1;
			if ($defense_strength == 0)
				$defense_strength = 1;

			if ($casualties <= 1) {
				//				print "ATTACKERS LOOSE<br/>";
				$casualties_attack = (($defense_strength / $attack_strength) * 100);
				$casualties_defense = (($attack_strength / $defense_strength) * 100);
				$casualties_attack = ($casualties_attack) / CONF_INVASION_CASUALTIES_WON;
				$casualties_defense = ($casualties_defense) / CONF_INVASION_CASUALTIES_LOOSE;
				$ground_won_defense++;

			} else {
				//				print "DEFENDERS LOOSE<br/>";
				$casualties_attack = (($defense_strength / $attack_strength) * 100);
				$casualties_defense = (($attack_strength / $defense_strength) * 100);
				$casualties_attack = ($casualties_attack) / CONF_INVASION_CASUALTIES_LOOSE;
				$casualties_defense = ($casualties_defense) / CONF_INVASION_CASUALTIES_WON;
				$ground_won_attack++;
			}

			if ($casualties_attack > 100)
				$casualties_attack = 100;
			if ($casualties_defense > 100)
				$casualties_defense = 100;
			if ($casualties_attack < 0)
				$casualties_attack = 0;
			if ($casualties_defense < 0)
				$casualties_defense = 0;

			$this->total_casualties["GROUND"][$round] = array (
				"attack" => $casualties_attack,
				"defense" => $casualties_defense
			);


			// calculating casualties	
			for ($i = 0; $i < count($army_attack); $i++) {
				//				 print "ATTACK CONVOY: $i<br/>";
				if ($total_attack_strength["soldiers"] != 0) {
					$percent = (((($army_attack[$i]["convoy_soldiers"] - $army_attack[$i]["casualties_soldiers"]) / $total_attack_strength["soldiers"]) * 100) / 100) * $casualties_attack;
					if ($percent > 100)
						$percent = 100;
					$casualties = floor((($army_attack[$i]["convoy_soldiers"] - $army_attack[$i]["casualties_soldiers"]) / 100) * $percent);
					$army_attack[$i]["casualties_soldiers"] += $casualties;
				}

				if ($total_attack_strength["fighters"] != 0) {
					$percent = (((($army_attack[$i]["convoy_fighters"] - $army_attack[$i]["casualties_fighters"]) / $total_attack_strength["fighters"]) * 100) / 100) * $casualties_attack;
					if ($percent > 100)
						$percent = 100;
					$casualties = floor((($army_attack[$i]["convoy_fighters"] - $army_attack[$i]["casualties_fighters"]) / 100) * $percent);
					$army_attack[$i]["casualties_fighters"] += $casualties;
				}

				if ($round >= CONF_INVASION_LIGHTCRUISER_PROTECTION_ROUNDS)
					if ($total_attack_strength["lightcruisers"] != 0) {
						$percent = (((($army_attack[$i]["convoy_lightcruisers"] - $army_attack[$i]["casualties_lightcruisers"]) / $total_attack_strength["lightcruisers"]) * 100) / 100) * $casualties_attack;
						if ($percent > 100)
							$percent = 100;
						$casualties = floor((($army_attack[$i]["convoy_lightcruisers"] - $army_attack[$i]["casualties_lightcruisers"]) / 100) * $percent);
						$army_attack[$i]["casualties_lightcruisers"] += $casualties;
					}

				if ($total_attack_strength["heavycruisers"] != 0) {
					$percent = (((($army_attack[$i]["convoy_heavycruisers"] - $army_attack[$i]["casualties_heavycruisers"]) / $total_attack_strength["heavycruisers"]) * 100) / 100) * $casualties_attack;
					if ($percent > 100)
						$percent = 100;
					$casualties = floor((($army_attack[$i]["convoy_heavycruisers"] - $army_attack[$i]["casualties_heavycruisers"]) / 100) * $percent);
					$army_attack[$i]["casualties_heavycruisers"] += $casualties;
				}

			}

			for ($i = 0; $i < count($army_defense); $i++) {
				if ($total_defense_strength["soldiers"] != 0) {
					$percent = (((($army_defense[$i]["soldiers"] - $army_defense[$i]["casualties_soldiers"]) / $total_defense_strength["soldiers"]) * 100) / 100) * $casualties_defense;
					if ($percent > 100)
						$percent = 100;
					$casualties = floor((($army_defense[$i]["soldiers"] - $army_defense[$i]["casualties_soldiers"]) / 100) * $percent);
					$army_defense[$i]["casualties_soldiers"] += $casualties;
					//					print "SOLDIERS CASUALTIES: " .$percent." % (".$casualties.")<br/>";
				}
				if ($total_defense_strength["fighters"] != 0) {
					$percent = (((($army_defense[$i]["fighters"] - $army_defense[$i]["casualties_fighters"]) / $total_defense_strength["fighters"]) * 100) / 100) * $casualties_defense;
					if ($percent > 100)
						$percent = 100;
					$casualties = floor((($army_defense[$i]["fighters"] - $army_defense[$i]["casualties_fighters"]) / 100) * $percent);
					$army_defense[$i]["casualties_fighters"] += $casualties;
					//					print "FIGHTERS CASUALTIES: " .$percent." % (".$casualties.")<br/>";
				}

				if ($total_defense_strength["stations"] != 0) {
				
								if (isset($army_defense[$i]["stations"])) {

					$percent = (((($army_defense[$i]["stations"] - $army_defense[$i]["casualties_stations"]) / $total_defense_strength["stations"]) * 100) / 100) * $casualties_defense;
					if ($percent > 100)
						$percent = 100;
					$casualties = floor((($army_defense[$i]["stations"] - $army_defense[$i]["casualties_stations"]) / 100) * $percent);
					$army_defense[$i]["casualties_stations"] += $casualties;
					//					print "STATIONS CASUALTIES: " .$percent." % (".$casualties.")<br/>";
					}
					
				}

				if ($round >= CONF_INVASION_LIGHTCRUISER_PROTECTION_ROUNDS)
					if ($total_defense_strength["lightcruisers"] != 0) {
						$percent = (((($army_defense[$i]["lightcruisers"] - $army_defense[$i]["casualties_lightcruisers"]) / $total_defense_strength["lightcruisers"]) * 100) / 100) * $casualties_defense;
						if ($percent > 100)
							$percent = 100;
						$casualties = floor((($army_defense[$i]["lightcruisers"] - $army_defense[$i]["casualties_lightcruisers"]) / 100) * $percent);
						$army_defense[$i]["casualties_lightcruisers"] += $casualties;
					}

				if ($total_defense_strength["heavycruisers"] != 0) {
					$percent = (((($army_defense[$i]["heavycruisers"] - $army_defense[$i]["casualties_heavycruisers"]) / $total_defense_strength["heavycruisers"]) * 100) / 100) * $casualties_defense;
					if ($percent > 100)
						$percent = 100;
					$casualties = floor((($army_defense[$i]["heavycruisers"] - $army_defense[$i]["casualties_heavycruisers"]) / 100) * $percent);
					$army_defense[$i]["casualties_heavycruisers"] += $casualties;
				}

			}


		}


		if ($ground_won_attack < 3)
			return $this->Finish(true, false, false, $army_attack, $army_defense);

		$this->Finish(true, true, true, $army_attack, $army_defense);

	}

	//////////////////////////////////////////////////////////////////////////////////////
	//
	//////////////////////////////////////////////////////////////////////////////////////
	function Finish($space, $orbital, $ground, $army_attack, $army_defense) {
		global $GAME;


		if (INVASION_DEBUG) print "<PRE>";
		if (INVASION_DEBUG) print_r($_SESSION);

		//if ($this->game_id == 4) die("This is our game!");

		$strength = $this->total_strength["SPACE"][0];
		$time_now = time(NULL);
		
		if ($ground == true) {
			// invasion worked
			for ($i=0;$i<count($army_attack);$i++) {
				$rs = $this->DB->Execute("SELECT score FROM system_tb_players WHERE id='".$army_attack[$i]["player_id"]."'");
				if (!$rs) trigger_error($this->DB->ErrorMsg());
				if (!INVASION_DEBUG) if (!$this->DB->Execute("UPDATE system_tb_players SET score='".($rs->fields["score"]+5)."' WHERE id='".$army_attack[$i]["player_id"]."'")) trigger_error($this->DB->ErrorMsg());
				
				if (isset($_SESSION["player"])) {
					if ($_SESSION["player"] == $army_attack[$i]["player_id"]) {
						$_SESSION["player"]["score"] = $rs->fields["score"]+5;
					}
				}
			}



			$target_empire = new Empire($this->DB, $GAME["template"], $GAME["gameplay_costs"]);
			$target_empire->Load($army_defense[0]["empire"]);
			if (INVASION_DEBUG)  print "Defender empire: ".$army_defense[0]["empire"]."\r\n";

			// Calculating losts for the target
			$percent = 0;
			for ($i = 0; $i < count($this->total_casualties["GROUND"]); $i++) {
				$percent = ($percent + $this->total_casualties["GROUND"][$i]["defense"]) / 2;
			}

			$percent += CONF_INVASION_PLANETS_MINIMUM;
			if ($percent > CONF_INVASION_PLANETS_MAXIMUM)
				$percent = CONF_INVASION_PLANETS_MAXIMUM;
			$percent = floor($percent);
			if (INVASION_DEBUG)  print "Defender casualties percent: " .$percent."%\r\n";
			$lost_population = floor(($target_empire->data["population"] / 100) * $percent);
			if (INVASION_DEBUG) print "Defender population lost: " .$lost_population."\r\n";
			$target_empire->data["population"] -= $lost_population;

			$lost_credits = floor(($target_empire->data["credits"] / 100) * $percent);
			if (INVASION_DEBUG) print "Defender credits lost: " .$lost_credits."\r\n";
			$target_empire->data["credits"] -= $lost_credits;

			$lost_food_planets = floor(($target_empire->planets->data["food_planets"] / 100) * $percent);
			if (INVASION_DEBUG) print "Defender food planets lost: " . $lost_food_planets."\r\n";

			$lost_ore_planets = floor(($target_empire->planets->data["ore_planets"] / 100) * $percent);
			if (INVASION_DEBUG) print "Defender ore planets lost: " . $lost_ore_planets."\r\n";

			$lost_tourism_planets = floor(($target_empire->planets->data["tourism_planets"] / 100) * $percent);
			if (INVASION_DEBUG) print "Defender tourism planets lost: " . $lost_tourism_planets."\r\n";

			$lost_supply_planets = floor(($target_empire->planets->data["supply_planets"] / 100) * $percent);
			if (INVASION_DEBUG) print "Defender supply planets lost: " . $lost_supply_planets."\r\n";

			$lost_gov_planets = floor(($target_empire->planets->data["gov_planets"] / 100) * $percent);
			if (INVASION_DEBUG) print "Defender governement planets lost: " . $lost_gov_planets."\r\n";

			$lost_edu_planets = floor(($target_empire->planets->data["edu_planets"] / 100) * $percent);
			if (INVASION_DEBUG) print "Defender education planets lost: " . $lost_edu_planets."\r\n";

			$lost_research_planets = floor(($target_empire->planets->data["research_planets"] / 100) * $percent);
			if (INVASION_DEBUG) print "Defender research planets lost: " . $lost_research_planets."\r\n";

			$lost_urban_planets = floor(($target_empire->planets->data["urban_planets"] / 100) * $percent);
			if (INVASION_DEBUG) print "Defender urban planets lost: " . $lost_urban_planets."\r\n";

			$lost_petro_planets = floor(($target_empire->planets->data["petro_planets"] / 100) * $percent);
			if (INVASION_DEBUG) print "Defender petroleum planets lost: " . $lost_petro_planets."\r\n";

			$lost_antipollu_planets = floor(($target_empire->planets->data["antipollu_planets"] / 100) * $percent);
			if (INVASION_DEBUG) print "Defender anti-pollution planets lost: " . $lost_antipollu_planets."\r\n";

			// distribute equally
			if (INVASION_DEBUG) print "Distribute equally\r\n";
			if (INVASION_DEBUG) print "<hr/>";
			for ($i = 0; $i < count($army_attack); $i++) {
				
				$temp_empire = new Empire($this->DB, $GAME["template"], $GAME["gameplay_costs"]);
				$temp_empire->Load($army_attack[$i]["empire_from"]);
				if (INVASION_DEBUG) print "Empire: ".$army_attack[$i]["empire_from"]."\r\n";

				$reclaimed_food_planets = floor($lost_food_planets / count($army_attack));
				$temp_empire->planets->data["food_planets"] += $reclaimed_food_planets;
				if (INVASION_DEBUG) print "Food planets: " . $reclaimed_food_planets ."\r\n";

				$reclaimed_ore_planets = floor($lost_ore_planets / count($army_attack));
				$temp_empire->planets->data["ore_planets"] += $reclaimed_ore_planets;
				if (INVASION_DEBUG) print "Ore planets: " . $reclaimed_ore_planets ."\r\n";

				$reclaimed_tourism_planets = floor($lost_tourism_planets / count($army_attack));
				$temp_empire->planets->data["tourism_planets"] += $reclaimed_tourism_planets;
				if (INVASION_DEBUG) print "Tourism planets: " . $reclaimed_tourism_planets ."\r\n";

				$reclaimed_supply_planets = floor($lost_supply_planets / count($army_attack));
				$temp_empire->planets->data["supply_planets"] += $reclaimed_supply_planets;
				if (INVASION_DEBUG) print "Supply planets: " . $reclaimed_supply_planets ."\r\n";

				$reclaimed_gov_planets = floor($lost_gov_planets / count($army_attack));
				$temp_empire->planets->data["gov_planets"] += $reclaimed_gov_planets;
				if (INVASION_DEBUG) print "Government planets: " . $reclaimed_gov_planets ."\r\n";

				$reclaimed_edu_planets = floor($lost_edu_planets / count($army_attack));
				$temp_empire->planets->data["edu_planets"] += $reclaimed_edu_planets;
				if (INVASION_DEBUG) print "Education planets: " . $reclaimed_edu_planets ."\r\n";

				$reclaimed_research_planets = floor($lost_research_planets / count($army_attack));
				$temp_empire->planets->data["research_planets"] += $reclaimed_research_planets;
				if (INVASION_DEBUG) print "Research planets: " . $reclaimed_research_planets ."\r\n";

				$reclaimed_urban_planets = floor($lost_urban_planets / count($army_attack));
				$temp_empire->planets->data["urban_planets"] += $reclaimed_urban_planets;
				if (INVASION_DEBUG) print "Urban planets: " . $reclaimed_urban_planets ."\r\n";

				$reclaimed_petro_planets = floor($lost_petro_planets / count($army_attack));
				$temp_empire->planets->data["petro_planets"] += $reclaimed_petro_planets;
				if (INVASION_DEBUG) print "Petroleum planets: " . $reclaimed_petro_planets ."\r\n";

				$reclaimed_antipollu_planets = floor($lost_antipollu_planets / count($army_attack));
				$temp_empire->planets->data["antipollu_planets"] += $reclaimed_antipollu_planets;
				if (INVASION_DEBUG) print "Anti-pollution planets: " . $reclaimed_antipollu_planets ."\r\n";

				$reclaimed_credits = floor($lost_credits / count($army_attack));
				if (INVASION_DEBUG) print "Credits: " . $reclaimed_credits ."\r\n";
				$temp_empire->data["credits"] += $reclaimed_credits;

				if (INVASION_DEBUG) print "Supposed to save.\r\n";
				if (!INVASION_DEBUG) $temp_empire->Save();
				unset ($temp_empire);
			}
			if (INVASION_DEBUG) print "<hr/>";

			$target_empire->planets->data["food_planets"] -= $lost_food_planets;
			$target_empire->planets->data["ore_planets"] -= $lost_ore_planets;
			$target_empire->planets->data["tourism_planets"] -= $lost_tourism_planets;
			$target_empire->planets->data["supply_planets"] -= $lost_supply_planets;
			$target_empire->planets->data["gov_planets"] -= $lost_gov_planets;
			$target_empire->planets->data["edu_planets"] -= $lost_edu_planets;
			$target_empire->planets->data["research_planets"] -= $lost_research_planets;
			$target_empire->planets->data["urban_planets"] -= $lost_urban_planets;
			$target_empire->planets->data["petro_planets"] -= $lost_petro_planets;
			$target_empire->planets->data["antipollu_planets"] -= $lost_antipollu_planets;

			$target_empire->planets->data["max_ore"] = $target_empire->planets->data["ore_planets"];
			$target_empire->planets->data["max_food"] = $target_empire->planets->data["food_planets"];
			$target_empire->planets->data["max_tourism"] = $target_empire->planets->data["tourism_planets"];
			$target_empire->planets->data["max_supply"] = $target_empire->planets->data["supply_planets"];
			$target_empire->planets->data["max_gov"] = $target_empire->planets->data["gov_planets"];
			$target_empire->planets->data["max_edu"] = $target_empire->planets->data["edu_planets"];
			$target_empire->planets->data["max_research"] = $target_empire->planets->data["research_planets"];
			$target_empire->planets->data["max_urban"] = $target_empire->planets->data["urban_planets"];
			$target_empire->planets->data["max_petro"] = $target_empire->planets->data["petro_planets"];
			$target_empire->planets->data["max_antipollu"] = $target_empire->planets->data["antipollu_planets"];

			$target_empire->data["civil_status"]++;

			if ($target_empire->data["civil_status"] >= 7) {

					$target_empire->data["civil_status"] = 7;
					$evt = new EventCreator($this->DB);
					$evt->type = CONF_EVENT_ELIMINATED;
					$evt->from = -1;


					for ($i=0;$i<count($army_attack);$i++) {
						$rs = $this->DB->Execute("SELECT score FROM system_tb_players WHERE id='".$army_attack[$i]["player_id"]."'");
						if ($rs) {
			
							if (!$this->DB->Execute("UPDATE system_tb_players SET score='".($rs->fields["score"]+10)."' WHERE id='".$army_attack[$i]["player_id"]."'")) trigger_error($this->DB->ErrorMsg());
						}

						if (isset($_SESSION["player"])) {
							if ($_SESSION["player"] == $army_attack[$i]["player_id"]) {
								$_SESSION["player"] = $rs->fields["score"]+5;
							}
						}


					}
	
					$rs_from = $this->DB->Execute("SELECT id,emperor,name,networth FROM  game".$this->game_id."_tb_empire WHERE id='" . $army_attack[0]["empire_from"]."'");
					if (!$rs_from)
						trigger_error($this->DB->ErrorMsg());
					$rs_to = $this->DB->Execute("SELECT id,emperor,name,networth FROM  game".$this->game_id."_tb_empire WHERE id='" . $army_defense[0]["empire"]."'");
					if (!$rs_to)
						trigger_error($this->DB->ErrorMsg());
					$empire_from = $GAME["template"]->DisplayEmpireHTML($rs_from->fields["id"], $rs_from->fields["emperor"], $rs_from->fields["name"], "");
					$empire_to = $GAME["template"]->DisplayEmpireHTML($rs_to->fields["id"], $rs_to->fields["emperor"], $rs_to->fields["name"], "");
					$evt->params = array (
						"empire_from" => $empire_from,
						"empire_to" => $empire_to
					);

					if (!INVASION_DEBUG) $evt->Broadcast();

					if (!INVASION_DEBUG) $target_empire->UpdateNetworth();
					if (!INVASION_DEBUG) $target_empire->Collapse();
					if (!INVASION_DEBUG) $target_empire->Save();

			} else {
				if (INVASION_DEBUG) print "Save defender empire\r\n";
				if (!INVASION_DEBUG) $target_empire->UpdateNetworth();
				if (!INVASION_DEBUG) $target_empire->Save();
			}

			// UPDATING EFFECTIVENESS
			for ($i = 0; $i < count($army_attack); $i++) {
				$army_attack[$i]["effectiveness"] += CONF_INVASION_EFFECTIVENESS_WON;
				if ($army_attack[$i]["effectiveness"] > 150)
					$army_attack[$i]["effectiveness"] = 150;
				if (!INVASION_DEBUG) {
					if (!$this->DB->Execute("UPDATE  game".$this->game_id."_tb_army SET effectiveness='" . $army_attack[$i]["effectiveness"] . "' WHERE empire='" . $army_attack[$i]["empire_from"]."'"))
						trigger_error($this->DB->ErrorMsg());
				}
			}

			$army_defense[0]["effectiveness"] -= CONF_INVASION_EFFECTIVENESS_LOST;
			if ($army_attack[0]["effectiveness"] < 10)
				$army_attack[0]["effectiveness"] = 10;
			if (!INVASION_DEBUG) {
				if (!$this->DB->Execute("UPDATE  game".$this->game_id."_tb_army SET effectiveness='" . $army_defense[0]["effectiveness"] . "' WHERE empire='" . $army_defense[0]["empire"]."'"))
					trigger_error($this->DB->ErrorMsg());
			}

			if (count($army_defense) != 1)
				for ($i = 1; $i < count($army_defense); $i++) {
					$army_defense[$i]["effectiveness"] -= CONF_INVASION_EFFECTIVENESS_LOST;
					if ($army_defense[$i]["effectiveness"] < 10)
						$army_defense[$i]["effectiveness"] = 10;
				if (!INVASION_DEBUG) {
					if (!$this->DB->Execute("UPDATE  game".$this->game_id."_tb_army SET effectiveness='" . $army_defense[$i]["effectiveness"] . "' WHERE empire='" . $army_defense[$i]["empire_from"]."'"))
						trigger_error($this->DB->ErrorMsg());
				}

				}

			$evt = new EventCreator($this->DB);
			$evt->type = CONF_EVENT_INVADED;
			$evt->from = -1;
			$rs_from = $this->DB->Execute("SELECT id,emperor,name,networth FROM  game".$this->game_id."_tb_empire WHERE id='" . $army_attack[0]["empire_from"]."'");
			if (!$rs_from)
				trigger_error($this->DB->ErrorMsg());
			$rs_to = $this->DB->Execute("SELECT id,emperor,name,networth FROM  game".$this->game_id."_tb_empire WHERE id='" . $army_defense[0]["empire"]."'");
			if (!$rs_to)
				trigger_error($this->DB->ErrorMsg());
			$empire_from = $GAME["template"]->DisplayEmpireHTML($rs_from->fields["id"], $rs_from->fields["emperor"], $rs_from->fields["name"], "");
			$empire_to = $GAME["template"]->DisplayEmpireHTML($rs_to->fields["id"], $rs_to->fields["emperor"], $rs_to->fields["name"], "");
			$evt->params = array (
				"won" => true,
				"empire_from" => $empire_from,
				"empire_to" => $empire_to
			);
			if (!INVASION_DEBUG) $evt->broadcast();

			// Sending INVASION REPORT

			$evt = new EventCreator($this->DB);
			$evt->type = CONF_EVENT_INVASION_REPORT;
			$evt->from = -1;
			$evt->params = array (
				"space_won" => $space,
				"orbital_won" => $orbital,
				"ground_won" => $ground,
				"lost_population" => $lost_population,
				"lost_credits" => $lost_credits,
				"lost_food_planets" => $lost_food_planets,
				"lost_ore_planets" => $lost_ore_planets,
				"lost_supply_planets" => $lost_supply_planets,
				"lost_tourism_planets" => $lost_tourism_planets,
				"lost_gov_planets" => $lost_gov_planets,
				"lost_edu_planets" => $lost_edu_planets,
				"lost_research_planets" => $lost_research_planets,
				"lost_urban_planets" => $lost_urban_planets,
				"lost_petro_planets" => $lost_petro_planets,
				"lost_antipollu_planets" => $lost_antipollu_planets,
				"army_attack" => $army_attack,
				"army_defense" => $army_defense,
				"strength" => $strength
			);


			$invasion_info = serialize(array("params"=>$evt->params,"total_strength"=>$this->total_strength,"total_casualties"=>$this->total_casualties));

			for ($i=0;$i<count($army_attack);$i++) {
				if (!INVASION_DEBUG) $this->DB->Execute("INSERT INTO  game".$this->game_id."_tb_invasion (empire_id,date,data) VALUES(".$army_attack[$i]["empire_from"].",".time().",'".base64_encode($invasion_info)."')");
			}

			for ($i=0;$i<count($army_defense);$i++) {
				if (!INVASION_DEBUG) {
					if ($i == 0) 
						$this->DB->Execute("INSERT INTO  game".$this->game_id."_tb_invasion (empire_id,date,data) VALUES(".$army_defense[$i]["empire"].",".time().",'".base64_encode($invasion_info)."')");
					else
						$this->DB->Execute("INSERT INTO  game".$this->game_id."_tb_invasion (empire_id,date,data) VALUES(".$army_defense[$i]["empire_from"].",".time().",'".base64_encode($invasion_info)."')");
				}

			}



			for ($i = 0; $i < count($army_attack); $i++) {
				$evt->to = $army_attack[$i]["empire_from"];
				if (!INVASION_DEBUG) $evt->Send();
			}

			$evt->to = $army_defense[0]["empire"];
			if (!INVASION_DEBUG) $evt->Send();

			if (count($army_defense) != 1)
				for ($i = 0; $i < count($army_defense); $i++) {
					if ($i == 0)
						$evt->to = $army_defense[$i]["empire"];
					else
						$evt->to = $army_defense[$i]["empire_from"];
					if (!INVASION_DEBUG) $evt->Send();
				}

		} else {
			// invasion not worked
			for ($i=0;$i<count($army_attack);$i++) {
				$rs = $this->DB->Execute("SELECT score FROM system_tb_players WHERE id='".$army_attack[$i]["player_id"]."'");
				if (!INVASION_DEBUG) if (!$this->DB->Execute("UPDATE system_tb_players SET score='".($rs->fields["score"]+5)."' WHERE id='".$army_attack[$i]["player_id"]."'")) trigger_error($this->DB->ErrorMsg());

				
				if (isset($_SESSION["player"])) {
					if ($_SESSION["player"] == $army_attack[$i]["player_id"]) {
						$_SESSION["player"]["score"] = $rs->fields["score"]+5;
					}
				}
			}



			// UPDATING EFFECTIVENESS
			for ($i = 0; $i < count($army_attack); $i++) {
				$army_attack[$i]["effectiveness"] -= CONF_INVASION_EFFECTIVENESS_LOST;
				if ($army_attack[$i]["effectiveness"] < 10)
					$army_attack[$i]["effectiveness"] = 10;
				if (!INVASION_DEBUG)  {
					if (!$this->DB->Execute("UPDATE  game".$this->game_id."_tb_army SET effectiveness='" . $army_attack[$i]["effectiveness"] . "' WHERE empire='" . $army_attack[$i]["empire_from"]."'"))
						trigger_error($this->DB->ErrorMsg());
				}

			}

			$army_defense[0]["effectiveness"] += CONF_INVASION_EFFECTIVENESS_WON;
			if ($army_defense[0]["effectiveness"] > 150)
				$army_defense[0]["effectiveness"] = 150;
			if (!INVASION_DEBUG) {
				if (!$this->DB->Execute("UPDATE  game".$this->game_id."_tb_army SET effectiveness='" . $army_defense[0]["effectiveness"] . "' WHERE empire='" . $army_defense[0]["empire"]."'"))
					trigger_error($this->DB->ErrorMsg());
			}

			if (count($army_defense) != 1)
				for ($i = 1; $i < count($army_defense); $i++) {
					$army_defense[$i]["effectiveness"] += CONF_INVASION_EFFECTIVENESS_WON;
					if ($army_defense[$i]["effectiveness"] > 150)
						$army_defense[$i]["effectiveness"] = 150;
					if (!INVASION_DEBUG) {
						if (!$this->DB->Execute("UPDATE  game".$this->game_id."_tb_army SET effectiveness='" . $army_defense[$i]["effectiveness"] . "' WHERE empire='" . $army_defense[$i]["empire_from"]."'"))
							trigger_error($this->DB->ErrorMsg());
					}
				}

			$evt = new EventCreator($this->DB);
			$evt->type = CONF_EVENT_INVADED;
			$evt->from = -1;
			$rs_from = $this->DB->Execute("SELECT id,emperor,name,networth FROM  game".$this->game_id."_tb_empire WHERE id='" . $army_attack[0]["empire_from"]."'");
			if (!$rs_from)
				trigger_error($this->DB->ErrorMsg());
			$rs_to = $this->DB->Execute("SELECT id,emperor,name,networth FROM  game".$this->game_id."_tb_empire WHERE id='" . $army_defense[0]["empire"]."'");
			if (!$rs_to)
				trigger_error($this->DB->ErrorMsg());
			$empire_from = $GAME["template"]->DisplayEmpireHTML($rs_from->fields["id"], $rs_from->fields["emperor"], $rs_from->fields["name"], "");
			$empire_to = $GAME["template"]->DisplayEmpireHTML($rs_to->fields["id"], $rs_to->fields["emperor"], $rs_to->fields["name"], "");
			$evt->params = array (
				"won" => false,
				"empire_from" => $empire_from,
				"empire_to" => $empire_to
			);
			if (!INVASION_DEBUG) $evt->broadcast();

			// Sending INVASION REPORT

			$evt = new EventCreator($this->DB);
			$evt->type = CONF_EVENT_INVASION_REPORT;
			$evt->from = -1;
			$evt->params = array (
				"space_won" => $space,
				"orbital_won" => $orbital,
				"ground_won" => $ground,
				"army_attack" => $army_attack,
				"army_defense" => $army_defense,
				"strength" => $strength
			);



			$invasion_info = serialize(array("params"=>$evt->params,"total_strength"=>$this->total_strength,"total_casualties"=>$this->total_casualties));


			for ($i=0;$i<count($army_attack);$i++) {
				if (!INVASION_DEBUG) { 
					if (!$this->DB->Execute("INSERT INTO  game".$this->game_id."_tb_invasion (empire_id,date,data) VALUES(".$army_attack[$i]["empire_from"].",".time().",'".base64_encode($invasion_info)."')")) trigger_error($this->DB->ErrorMsg());
				}
			}

			for ($i=0;$i<count($army_defense);$i++) {

				if (!INVASION_DEBUG) {
					if (isset($army_defense[$i]["empire_from"]))
						if (!$this->DB->Execute("INSERT INTO  game".$this->game_id."_tb_invasion (empire_id,date,data) VALUES(".$army_defense[$i]["empire"].",".time().",'".base64_encode($invasion_info)."')")) trigger_error($this->DB->ErrorMsg());
					else
						if (!$this->DB->Execute("INSERT INTO  game".$this->game_id."_tb_invasion (empire_id,date,data) VALUES(".$army_defense[$i]["empire_from"].",".time().",'".base64_encode($invasion_info)."')")) trigger_error($this->DB->ErrorMsg());
				}

			}



			for ($i = 0; $i < count($army_attack); $i++) {
				$evt->to = $army_attack[$i]["empire_from"];
				if (!INVASION_DEBUG) $evt->Send();
			}

			$evt->to = $army_defense[0]["empire"];
			if (!INVASION_DEBUG) $evt->Send();

			if (count($army_defense) != 1)
				for ($i = 0; $i < count($army_defense); $i++) {
			
					if (!INVASION_DEBUG) {
						if ($i == 0)
							$evt->to = $army_defense[$i]["empire"];
						else
							$evt->to = $army_defense[$i]["empire_from"];
					}

					if (!INVASION_DEBUG) $evt->Send();
				}

		}

		for ($i = 0; $i < count($army_attack); $i++) {


			$convoy_soldiers = ($army_attack[$i]["convoy_soldiers"] - $army_attack[$i]["casualties_soldiers"]);
			if ($convoy_soldiers < 0) $convoy_soldiers = 0;
		
			$convoy_fighters = ($army_attack[$i]["convoy_fighters"] - $army_attack[$i]["casualties_fighters"]);
			if ($convoy_fighters < 0) $convoy_fighters = 0;

			$convoy_lightcruisers = ($army_attack[$i]["convoy_lightcruisers"] - $army_attack[$i]["casualties_lightcruisers"]);
			if ($convoy_lightcruisers < 0) $convoy_lightcruisers = 0;
			
			$convoy_heavycruisers = ($army_attack[$i]["convoy_heavycruisers"] - $army_attack[$i]["casualties_heavycruisers"]);
			if ($convoy_heavycruisers < 0) $convoy_heavycruisers = 0;
		
			$convoy_carriers = ($army_attack[$i]["carriers"] - $army_attack[$i]["casualties_carriers"]);
			if ($convoy_carriers < 0) $convoy_carriers = 0;
		
			$time_start = $army_attack[$i]["time_start"]; 
			$time_end = $army_attack[$i]["time_end"];
			$time_elapsed = $time_end - $time_start;
			$time_start = $time_now;
			$time_end = $time_now + $time_elapsed;
		
			$query = "UPDATE  game".$this->game_id."_tb_armyconvoy SET " .
			"convoy_type='" .CONF_CONVOY_INVASION_RETREAT . "'," .
			"convoy_soldiers='" . intval($convoy_soldiers) . "'," .
			"convoy_fighters='" . intval($convoy_fighters) . "'," .
			"convoy_lightcruisers='" . intval($convoy_lightcruisers) . "'," .
			"convoy_heavycruisers='" . intval($convoy_heavycruisers) . "'," .
			"carriers='" . intval($convoy_carriers) . "'," .
			"time_start='$time_start',time_end='$time_end' WHERE id='" . $army_attack[$i]["id"]."'";

			if (INVASION_DEBUG) print "Convoy retreat script: " .$query."\r\n";
			
			if (!INVASION_DEBUG) {
				if (!$this->DB->Execute($query))
					trigger_error($this->DB->ErrorMsg());
			}
				
				
			$evt = new EventCreator($this->DB);
			$evt->from = -1;
			$evt->to =  $army_attack[$i]["empire_to"];
			$evt->type = CONF_EVENT_CONVOY_RETREAT;
			$evt->params = $army_attack[$i]["empire_from"];
			if (!INVASION_DEBUG) $evt->send();
			
		}

				
				
		$soldiers = ($army_defense[0]["soldiers"] - $army_defense[0]["casualties_soldiers"]);
		if ($soldiers < 0) $soldiers = 0;
		
		$fighters = ($army_defense[0]["fighters"] - $army_defense[0]["casualties_fighters"]);
		if ($fighters < 0) $fighters = 0;

		$stations = ($army_defense[0]["stations"] - $army_defense[0]["casualties_stations"]);
		if ($stations  < 0) $stations  = 0;

		$lightcruisers = ($army_defense[0]["lightcruisers"] - $army_defense[0]["casualties_lightcruisers"]);
		if ($lightcruisers < 0) $lightcruisers = 0;

		$heavycruisers = ($army_defense[0]["heavycruisers"] - $army_defense[0]["casualties_heavycruisers"]);
		if ($heavycruisers < 0) $heavycruisers = 0;
		
		// updating target army
		$query = "UPDATE  game".$this->game_id."_tb_army SET " .
		"soldiers='" . intval($soldiers) . "'," .
		"fighters='" . intval($fighters) . "'," .
		"stations='" . intval($stations) . "'," .
		"lightcruisers='" . intval($lightcruisers) . "'," .
		"heavycruisers='" . intval($heavycruisers) ."' ".
		" WHERE id='" . $army_defense[0]["empire"]."'";

		if (!INVASION_DEBUG) {
			if (!$this->DB->Execute($query))
				trigger_error($this->DB->ErrorMsg());
		}

		if (count($army_defense) != 1) {

			for ($i = 1; $i < count($army_defense); $i++) {


				// verify the values
				$convoy_soldiers = ($army_defense[$i]["convoy_soldiers"] - $army_defense[$i]["casualties_soldiers"]);
				if ($convoy_soldiers < 0) $convoy_soldiers = 0;
		
				$convoy_fighters = ($army_defense[$i]["convoy_fighters"] - $army_defense[$i]["casualties_fighters"]);
				if ($convoy_fighters < 0) $convoy_fighters = 0;

				$convoy_lightcruisers = ($army_defense[$i]["convoy_lightcruisers"] - $army_defense[$i]["casualties_lightcruisers"]);
				if ($convoy_lightcruisers < 0) $convoy_lightcruisers = 0;
				
				$convoy_highcruisers = ($army_defense[$i]["convoy_heavycruisers"] - $army_defense[$i]["casualties_heavycruisers"]);
				if ($convoy_heavycruisers < 0) $convoy_heavycruisers = 0;
		
				$time_start = $army_defense[$i]["time_start"]; 
				$time_end = $army_defense[$i]["time_end"];
				$time_elapsed = $time_end - $time_start;
				$time_start = $time_now;
				$time_end = $time_now + $time_elapsed;

				$query = "UPDATE  game".$this->game_id."_tb_armyconvoy SET " .
				"convoy_type='" .CONF_CONVOY_DEFENSE_RETREAT . "'," .
				"convoy_soldiers='" . intval($convoy_soldiers) . "'," .
				"convoy_fighters='" . intval($convoy_fighters) . "'," .
				"convoy_lightcruisers='" . intval($convoy_lightcruisers) . "'," .
				"convoy_heavycruisers='" . intval($convoy_heavycruisers) . "'," .
				"time_start='$time_start',time_end='$time_end' WHERE id='" . $army_defense[$i]["id"]."'";

				if (!INVASION_DEBUG) {
					if (!$this->DB->Execute($query))
						trigger_error($this->DB->ErrorMsg());
				}			
						
				$evt = new EventCreator($this->DB);
				$evt->from = -1;
				$evt->to =  $army_defense[$i]["empire_to"];
				$evt->type = CONF_EVENT_CONVOY_RETREAT;
				$evt->params = $army_defense[$i]["empire_from"];
				if (!INVASION_DEBUG) $evt->send();
						
			}

		}
		if (INVASION_DEBUG) die("Invasion done");

	}
	
}

?>

