<?php

// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //

function NewTurn_handleCivilStatus($game_id, $empire) {

	global $CONF_CIVIL_STATUS, $DB, $GAME;

	srand(time(NULL));
    
	$msg = "";

	// Civil unrest augmentation
	if ($empire->army->data["covertagents"] > ($empire->planets->data["gov_planets"] * CONF_COVERTAGENTS_PER_GOVPLANET)) {
		$r = rand(0, 100);

		if ($r <= CONF_TOO_MUCH_COVERTAGENTS_PERCENTAGE) {
			$empire->data["civil_status"]++;
			if ($empire->data["civil_status"] > 7)
				$empire->data["civil_status"] = 7;

			$msg .= T_("Internal conflicts erupt!")."\r\n<br/>";
			$covertagents_lost = floor(($empire->army->data["covertagents"] / 100) * CONF_TOO_MUCH_COVERTAGENTS_LOST_PERCENTAGE);
			$empire->army->data["covertagents"] -= $covertagents_lost;
			$msg .= $GAME["template"]->formatNumber($covertagents_lost) ." ".T_("covert agents found death in they bath")."\r\n<br/>";
		}

	}

	// Civil unrest recovery
	if (($empire->data["credits"] > 0) && ($empire->data["food"] > 0)) {

		// having covert agents will help to bring back the stability
		$covert = ($empire->army->data["covertagents"] / ($empire->planets->getCount() * CONF_PLANETS_CIVILSTATUS)) * 100;

		$r = rand(0, 100);
		if ($r <= $covert) {
			$empire->data["civil_status"]--;
			if ($empire->data["civil_status"] < 0)
				$empire->data["civil_status"] = 0;
			else
				$msg .= T_("Insurgency recovering ...")."<br>\r\n";
		}
	}

	if ($empire->data["civil_status"] != 0) {
		$msg .= "*** " . ($empire->data["civil_status"] * 8) .T_("% of you army disbanded!")." ***<br/>\r\n";

		$empire->army->data["soldiers"] -= floor($empire->army->data["soldiers"] / 100) * ($empire->data["civil_status"] * 8);
		$empire->army->data["fighters"] -= floor($empire->army->data["fighters"] / 100) * ($empire->data["civil_status"] * 8);
		$empire->army->data["lightcruisers"] -= floor($empire->army->data["lightcruisers"] / 100) * ($empire->data["civil_status"] * 8);
		$empire->army->data["heavycruisers"] -= floor($empire->army->data["heavycruisers"] / 100) * ($empire->data["civil_status"] * 8);
		$empire->army->data["carriers"] -= floor($empire->army->data["carriers"] / 100) * ($empire->data["civil_status"] * 8);

	
	}

	$evt = new EventCreator($DB);
	$evt->from = -1;
	$evt->to = $empire->data["id"];
	$evt->seen = 1;
	$evt->type = CONF_EVENT_CIVILSTATUS;
	$evt->params = array("content"=>$msg,"civil_status"=>$CONF_CIVIL_STATUS[$empire->data["civil_status"]],"civil_status_id"=>$empire->data["civil_status"]);
	$evt->send();
	
}
?>
