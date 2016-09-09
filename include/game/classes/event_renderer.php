<?php
// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //

class EventRenderer
{
	var $DB;
	var $TEMPLATE;
	var $GAME_TPL;
	var $height;
	var $game_id;

	//////////////////////////////////////////////////////////////////////////////
	//
	//////////////////////////////////////////////////////////////////////////////
	function EventRenderer($DB,$GAME_TPL)
	{
		$this->DB = $DB;
		$this->TEMPLATE = new Smarty();
		$this->TEMPLATE->template_dir = "../templates/game/";
		$this->TEMPLATE->compile_dir = "../templates_c/game/";

		$this->GAME_TPL = $GAME_TPL;
		$this->height = 160;
		$this->game_id = round($_SESSION["game"]);
	}

	//////////////////////////////////////////////////////////////////////////////
	//
	//////////////////////////////////////////////////////////////////////////////
	function displayUnseenEvents($empire_data)
	{
		$output = array();
		
		$rs = $this->DB->Execute("SELECT * FROM game".$this->game_id."_tb_event WHERE event_to='".$empire_data["id"]."' AND seen='0' ORDER BY id DESC LIMIT 0,30");
		if (!$rs) trigger_error($this->DB->ErrorMsg());
		$total_height = 0;
		while(!$rs->EOF)
		{
			$output[] = $this->renderEvent($rs->fields,$empire_data);
			$total_height += $this->height;	
			$rs->MoveNext();
		}
		return array("total_height"=>$total_height,"events_output"=>$output);
	}

	//////////////////////////////////////////////////////////////////////////////
	//
	//////////////////////////////////////////////////////////////////////////////
	function renderEvent($event_data,$empire_data)
	{
		global $CONF_DIPLOMACY_TREATIES,$CONF_CIVIL_STATUS;
		
		if (!isset($_SESSION["game"])) die();
		$game_id = addslashes($_SESSION["game"]);
		$game_id = str_replace(".","",$game_id);
		$this->TEMPLATE->assign("game_id",$game_id);

		$tpl_filename = "";
		$output = "";
		$this->height = $event_data["height"];
				
		$filter = "SYSTEM";

		switch($event_data["event_type"])
		{

			/********************** NEW EMPIRE ! *********************************/
			case CONF_EVENT_NEWEMPIRE:
				$tpl_filename = "event/newempire.html";
				$params = unserialize($event_data["params"]);
				$this->TEMPLATE->assign("gender",$params["gender"]=="M"?T_("Emperor"):T_("Emperess"));
				$this->TEMPLATE->assign("emperor",$params["empire_emperor"]);
				$this->TEMPLATE->assign("empire",$params["empire_name"]);
				if (!file_exists("../images/game/empires/$game_id/".$event_data["event_from"].".jpg"))
					$this->TEMPLATE->assign("logo","img_logo.php?empire='".$event_data["event_from"]."'");
				else
					$this->TEMPLATE->assign("logo","../images/game/empires/$game_id/".$event_data["event_from"].".jpg");
				
			break;			

			/********************** COLLAPSED EMPIRE ! *********************************/
			case CONF_EVENT_COLLAPSEDEMPIRE:
				$tpl_filename = "event/collapsedempire.html";
				$params = unserialize($event_data["params"]);
				$this->TEMPLATE->assign("gender",$params["gender"]=="M"?T_("Emperor"):T_("Emperess"));
				$this->TEMPLATE->assign("emperor",$params["empire_emperor"]);
				$this->TEMPLATE->assign("empire",$params["empire_name"]);
				
				if (!file_exists("../images/game/empires/$game_id/".$event_data["event_from"].".jpg"))
					$this->TEMPLATE->assign("logo","img_logo.php?empire='".$event_data["event_from"]."'");
				else
					$this->TEMPLATE->assign("logo","../images/game/empires/$game_id/".$event_data["event_from"].".jpg");
					
				
			break;			


			/*********************** EMPIRE INVADED ! *********************************/
			case CONF_EVENT_INVADED:
				
				$filter = "WARFARE";

				$tpl_filename = "event/invaded.html";
				$params = unserialize($event_data["params"]);
				if ($params["won"]==false) $params["won"] = T_("Invasion failed!");
					else $params["won"] = T_("Invasion won!");

				while(list($key,$value) = each($params))
					$this->TEMPLATE->assign($key,$value);
				
			break;


			/*********************** EMPIRE ELIMINATED ! *********************************/
			case CONF_EVENT_ELIMINATED:

				$filter = "WARFARE";

				$tpl_filename = "event/eliminated.html";
				$params = unserialize($event_data["params"]);

				while(list($key,$value) = each($params))
					$this->TEMPLATE->assign($key,$value);
			break;


			/*********************** EMPIRE ATTACKED ! *********************************/
			case CONF_EVENT_EMPIREATTACKED:
				
				$filter = "WARFARE";

				$tpl_filename = "event/empire_attacked_guerilla.html";
				$params = unserialize($event_data["params"]);
				if ($params["won"]==false) $params["won"] = T_("Assault failed!");
					else $params["won"] = T_("Assault won!");
				while(list($key,$value) = each($params))
					$this->TEMPLATE->assign($key,$value);
			break;
			

			/********************** PLANETS RELEASED ! *********************************/
			case CONF_EVENT_PLANETS_RELEASED:
				$tpl_filename = "event/planets_released.html";
				$params = unserialize($event_data["params"]);
				$this->TEMPLATE->assign("emperor",$params["empire_emperor"]);
				$this->TEMPLATE->assign("empire",$params["empire_name"]);
				$this->TEMPLATE->assign("gender",$params["gender"]=="M"?T_("Emperor"):T_("Emperess"));
				
				if (!file_exists("../images/game/empires/$game_id/".$params["empire_id"].".jpg"))
					$this->TEMPLATE->assign("logo","img_logo.php?empire=".$params["empire_id"]);
				else
					$this->TEMPLATE->assign("logo","../images/game/empires/$game_id/".$params["empire_id"].".jpg");
				
				$this->TEMPLATE->assign("food_planets",$this->GAME_TPL->formatNumber($params["planets_data"]["food_planets"]));
				$this->TEMPLATE->assign("ore_planets",$this->GAME_TPL->formatNumber($params["planets_data"]["ore_planets"]));
				$this->TEMPLATE->assign("tourism_planets",$this->GAME_TPL->formatNumber($params["planets_data"]["tourism_planets"]));
				$this->TEMPLATE->assign("supply_planets",$this->GAME_TPL->formatNumber($params["planets_data"]["supply_planets"]));
				$this->TEMPLATE->assign("gov_planets",$this->GAME_TPL->formatNumber($params["planets_data"]["gov_planets"]));
				$this->TEMPLATE->assign("edu_planets",$this->GAME_TPL->formatNumber($params["planets_data"]["edu_planets"]));
				$this->TEMPLATE->assign("research_planets",$this->GAME_TPL->formatNumber($params["planets_data"]["research_planets"]));
				$this->TEMPLATE->assign("urban_planets",$this->GAME_TPL->formatNumber($params["planets_data"]["urban_planets"]));
				$this->TEMPLATE->assign("petro_planets",$this->GAME_TPL->formatNumber($params["planets_data"]["petro_planets"]));
				$this->TEMPLATE->assign("antipollu_planets",$this->GAME_TPL->formatNumber($params["planets_data"]["antipollu_planets"]));
			
			break;
			
			/********************** MESSAGE RECEIVED ! *********************************/
			case CONF_EVENT_MESSAGE:
				
				$filter = "COMMUNICATION";

				if (($event_data["sticky"]==0) && ($event_data["seen"]==0)) {
					if (!$this->DB->Execute("UPDATE game".$this->game_id."_tb_event SET seen='1' WHERE id='".$event_data["id"]."'")) trigger_error($this->DB->ErrorMsg());
				}

				return array($filter,$this->GAME_TPL->showMessage($event_data));
			break;

			/********************** COALITION CREATED ! *********************************/
			case CONF_EVENT_COALITION_CREATED:
			
				$filter = "DIPLOMACY";

				$tpl_filename = "event/coalition_created.html";
				$params = unserialize($event_data["params"]);
				$this->TEMPLATE->assign("emperor",$params["empire_emperor"]);
				$this->TEMPLATE->assign("empire",$params["empire_name"]);
				$this->TEMPLATE->assign("empire_id",$params["empire_id"]);
				$this->TEMPLATE->assign("gender",$params["gender"]=="M"?T_("Emperor"):T_("Emperess"));
				$this->TEMPLATE->assign("coalition_name",$params["coalition_name"]);
				
				
			break;
			
			/********************** COALITION KICKED ! *********************************/
			case CONF_EVENT_COALITION_KICKED:
			
				$filter = "DIPLOMACY";

				$tpl_filename = "event/coalition_kicked.html";
				$params = unserialize($event_data["params"]);
				$this->TEMPLATE->assign("emperor",$params["empire_emperor"]);
				$this->TEMPLATE->assign("empire",$params["empire_name"]);
				$this->TEMPLATE->assign("empire_id",$params["empire_id"]);
				$this->TEMPLATE->assign("gender",$params["gender"]=="M"?T_("Emperor"):T_("Emperess"));
				$this->TEMPLATE->assign("coalition_name",$params["coalition_name"]);
				
			break;
			
			/********************** COALITION JOINED ! *********************************/
			case CONF_EVENT_COALITION_JOINED:
			
				$filter = "DIPLOMACY";
				$tpl_filename = "event/coalition_joined.html";
				$params = unserialize($event_data["params"]);
				
				$this->TEMPLATE->assign("emperor",$params["empire_emperor"]);
				$this->TEMPLATE->assign("empire",$params["empire_name"]);
				$this->TEMPLATE->assign("empire_id",$params["empire_id"]);
				$this->TEMPLATE->assign("gender",$params["gender"]=="M"?T_("Emperor"):T_("Emperess"));
				
			break;
			
			/********************** COALITION REFUSED ! *********************************/
			case CONF_EVENT_COALITION_REFUSED:
			
				$filter = "DIPLOMACY";
				$tpl_filename = "event/coalition_refused.html";
				$params = unserialize($event_data["params"]);
				
				$this->TEMPLATE->assign("emperor",$params["empire_emperor"]);
				$this->TEMPLATE->assign("empire",$params["empire_name"]);
				$this->TEMPLATE->assign("empire_id",$params["empire_id"]);
				$this->TEMPLATE->assign("gender",$params["gender"]=="M"?T_("Emperor"):T_("Emperess"));
				
			break;
			

			/********************** COALITION DISBANDED ! *********************************/
			case CONF_EVENT_COALITION_DISBANDED:
			
				$filter = "DIPLOMACY";
				$tpl_filename = "event/coalition_disbanded.html";
				$params = unserialize($event_data["params"]);
				$this->TEMPLATE->assign("emperor",$params["empire_emperor"]);
				$this->TEMPLATE->assign("empire_id",$params["empire_id"]);
				$this->TEMPLATE->assign("empire",$params["empire_name"]);
				$this->TEMPLATE->assign("gender",$params["gender"]=="M"?T_("Emperor"):T_("Emperess"));
				$this->TEMPLATE->assign("coalition_name",$params["coalition_name"]);
				
			break;
			
			/********************** NEW TURN ! *********************************/
			case CONF_EVENT_NEWTURN:
			
				$tpl_filename = "event/new_turn.html";
				$params = unserialize($event_data["params"]);
				while(list($key,$value) = each($params))
					$this->TEMPLATE->assign($key,$value);
			break;
			
			/**********************  TURN COMPLETED ! *********************************/
			case CONF_EVENT_TURNCOMPLETED:
			
				$tpl_filename = "event/turn_completed.html";
				$params = unserialize($event_data["params"]);
				while(list($key,$value) = each($params))
					$this->TEMPLATE->assign($key,$value);
			break;
			
			/**********************  INCOMING_INVASION ! *********************************/
			case CONF_EVENT_INCOMING_INVASION:
			
				$filter = "WARFARE";
				$tpl_filename = "event/incoming_invasion.html";
				$params = unserialize($event_data["params"]);
				$this->TEMPLATE->assign("soldiers",$this->GAME_TPL->formatNumber($params["soldiers"]));
				$this->TEMPLATE->assign("fighters",$this->GAME_TPL->formatNumber($params["fighters"]));
				$this->TEMPLATE->assign("lightcruisers",$this->GAME_TPL->formatNumber($params["lightcruisers"]));
				$this->TEMPLATE->assign("heavycruisers",$this->GAME_TPL->formatNumber($params["heavycruisers"]));
				$rs = $this->DB->Execute("SELECT * FROM game".$this->game_id."_tb_empire WHERE id='".addslashes($event_data["event_from"])."'");
				if (!$rs) trigger_error($this->DB->ErrorMsg());
				$empire = $this->GAME_TPL->displayEmpireHTML($rs->fields["id"],$rs->fields["emperor"],$rs->fields["name"],$empire_data["networth"]);
				$this->TEMPLATE->assign("empire",$empire);

			break;

			/**********************  INCOMING_DEFENSE ! *********************************/
			case CONF_EVENT_INCOMING_DEFENSE:
			
				$filter = "WARFARE";
				$tpl_filename = "event/incoming_defense.html";
				$params = unserialize($event_data["params"]);
				$this->TEMPLATE->assign("soldiers",$this->GAME_TPL->formatNumber($params["soldiers"]));
				$this->TEMPLATE->assign("fighters",$this->GAME_TPL->formatNumber($params["fighters"]));
				$this->TEMPLATE->assign("lightcruisers",$this->GAME_TPL->formatNumber($params["lightcruisers"]));
				$this->TEMPLATE->assign("heavycruisers",$this->GAME_TPL->formatNumber($params["heavycruisers"]));
				$rs = $this->DB->Execute("SELECT * FROM game".$this->game_id."_tb_empire WHERE id='".addslashes($event_data["event_from"])."'");
				$empire = $this->GAME_TPL->displayEmpireHTML($rs->fields["id"],$rs->fields["emperor"],$rs->fields["name"],$empire_data["networth"]);
				$this->TEMPLATE->assign("empire",$empire);

			break;


			/**********************  SENDING_DEFENSE ! *********************************/
			case CONF_EVENT_SENDING_DEFENSE:
			
				$filter = "WARFARE";
				$tpl_filename = "event/sending_defense.html";
				$params = unserialize($event_data["params"]);
				$this->TEMPLATE->assign("soldiers",$this->GAME_TPL->formatNumber($params["soldiers"]));
				$this->TEMPLATE->assign("fighters",$this->GAME_TPL->formatNumber($params["fighters"]));
				$this->TEMPLATE->assign("lightcruisers",$this->GAME_TPL->formatNumber($params["lightcruisers"]));
				$this->TEMPLATE->assign("heavycruisers",$this->GAME_TPL->formatNumber($params["heavycruisers"]));
				$rs = $this->DB->Execute("SELECT * FROM game".$this->game_id."_tb_empire WHERE id='".addslashes($event_data["event_from"])."'");
				$empire = $this->GAME_TPL->displayEmpireHTML($rs->fields["id"],$rs->fields["emperor"],$rs->fields["name"],$empire_data["networth"]);
				$this->TEMPLATE->assign("empire",$empire);

			break;


			/********************** PIRATE RAID *********************************/
			case CONF_EVENT_PIRATERAID:
		
				$filter = "WARFARE";
				$tpl_filename = "event/pirateraid.html";
				$params = unserialize($event_data["params"]);
				while(list($key,$value) = each($params))
					$this->TEMPLATE->assign($key,$value);
			
			break;
			
			/********************** RESEARCH DONE *********************************/
			case CONF_EVENT_RESEARCHDONE:
				$tpl_filename = "event/researchdone.html";
				$params = unserialize($event_data["params"]);
				while(list($key,$value) = each($params))
					$this->TEMPLATE->assign($key,$value);
		
			break;

			/********************** FOOD GROWTH *********************************/
			case CONF_EVENT_FOODGROWTH:
				$tpl_filename = "event/foodgrowth.html";
				$params = unserialize($event_data["params"]);
				if ($params["growrate"] > 0) $params["grow_color"] = "lightgreen"; else $params["grow_color"] = "#FFAAAA";

				while(list($key,$value) = each($params))
					$this->TEMPLATE->assign($key,$value);
					
			break;
			
			/********************** ORE GROWTH *********************************/
			case CONF_EVENT_OREGROWTH:
				$tpl_filename = "event/oregrowth.html";
				$params = unserialize($event_data["params"]);
				if ($params["growrate"] > 0) $params["grow_color"] = "lightgreen"; else $params["grow_color"] = "#FFAAAA";

				while(list($key,$value) = each($params))
					$this->TEMPLATE->assign($key,$value);
					
			break;

			/********************** PETROLEUM GROWTH *********************************/
			case CONF_EVENT_PETROLEUMGROWTH:
				$tpl_filename = "event/petroleumgrowth.html";
				$params = unserialize($event_data["params"]);
				if ($params["growrate"] > 0) $params["grow_color"] = "lightgreen"; else $params["grow_color"] = "#FFAAAA";

				while(list($key,$value) = each($params))
					$this->TEMPLATE->assign($key,$value);
					
			break;


			/********************** MONEY GROWTH *********************************/
			case CONF_EVENT_MONEYGROWTH:
				$tpl_filename = "event/moneygrowth.html";
				$params = unserialize($event_data["params"]);
				if ($params["growrate"] > 0) $params["grow_color"] = "lightgreen"; else $params["grow_color"] = "#FFAAAA";

				while(list($key,$value) = each($params))
					$this->TEMPLATE->assign($key,$value);
		
			break;

			/********************** FUNDAMENTAL COMPLETED *********************************/
			case CONF_EVENT_FUNDAMENTAL_COMPLETED:
				$tpl_filename = "event/fundamental_research.html";
				$params = unserialize($event_data["params"]);

				while(list($key,$value) = each($params))
					$this->TEMPLATE->assign($key,$value);
		
			break;

			/********************** MILITARY PRODUCTION *********************************/
			case CONF_EVENT_MILITARYPRODUCTION:
				$tpl_filename = "event/military_production.html";
				$params = unserialize($event_data["params"]);
				while(list($key,$value) = each($params))
					$this->TEMPLATE->assign($key,$value);
					
			break;
	
			/********************** NOTICE *********************************/
			case CONF_EVENT_NOTICE:
				$tpl_filename = "event/notice.html";
				$params = unserialize($event_data["params"]);

				while(list($key,$value) = each($params))
					$this->TEMPLATE->assign($key,$value);
					
			break;
			
			
			/********************** POPULATION GROWTH *********************************/
			case CONF_EVENT_POPULATIONGROWTH:
				$tpl_filename = "event/populationgrowth.html";
				$params = unserialize($event_data["params"]);
				if ($params["growrate"] > 0) $params["grow_color"] = "lightgreen"; else $params["grow_color"] = "#FFAAAA";
				while(list($key,$value) = each($params))
					$this->TEMPLATE->assign($key,$value);
					
			break;

			/********************** BREAK TREATY *********************************/
			case CONF_EVENT_BREAKTREATY:
				$filter = "DIPLOMACY";
				$tpl_filename = "event/diplomacy_breaktreaty.html";
				$params = unserialize($event_data["params"]);
				$this->TEMPLATE->assign("empire",$this->GAME_TPL->displayEmpireHTML($params["empire_id"],$params["empire_emperor"],$params["empire_name"],$empire_data["networth"]));
				if (!$this->DB->Execute("DELETE FROM game".$this->game_id."_tb_treaty WHERE empire_from='".$event_data["event_to"]."' AND empire_to='".$event_data["event_from"]."'")) trigger_error($this->DB->ErrorMsg());
				if (!$this->DB->Execute("DELETE FROM game".$this->game_id."_tb_treaty WHERE empire_to='".$event_data["event_to"]."' AND empire_from='".$event_data["event_from"]."'")) trigger_error($this->DB->ErrorMsg());
			break;
			
			/********************** GUERILLA REVEALED *********************************/
			case CONF_EVENT_GUERILLA_REVEALED:
				$filter = "WARFARE";
				$tpl_filename = "event/guerilla_revealed.html";
				$params = unserialize($event_data["params"]);
				$this->TEMPLATE->assign("emperor",$params["empire_emperor"]);
				$this->TEMPLATE->assign("empire_id",$params["empire_id"]);
				$this->TEMPLATE->assign("empire",$params["empire_name"]);
				$this->TEMPLATE->assign("lost_soldiers",$this->GAME_TPL->formatNumber($params["lost_soldiers"]));
				$this->TEMPLATE->assign("gender",$params["gender"]=="M"?T_("Emperor"):T_("Emperess"));
			break;
			
			/********************** GUERILLA STEALTH *********************************/
			case CONF_EVENT_GUERILLA_STEALTH:
				$filter = "WARFARE";
				$tpl_filename = "event/guerilla_stealth.html";
				$params = unserialize($event_data["params"]);
				$this->TEMPLATE->assign("emperor","???");
				$this->TEMPLATE->assign("empire_id","new");
				$this->TEMPLATE->assign("empire","???");
				$this->TEMPLATE->assign("gender","???");
				$this->TEMPLATE->assign("lost_soldiers",$this->GAME_TPL->formatNumber($params["lost_soldiers"]));
			break;
			
			/********************** RANDOM EVENT *********************************/
			case CONF_EVENT_RANDOMEVENT:
				$tpl_filename = "event/randomevent.html";
				$params = unserialize($event_data["params"]);
				while(list($key,$value) = each($params))
					$this->TEMPLATE->assign($key,$value);
					
			break;
			
			/********************** CIVIL STATUS *********************************/
			case CONF_EVENT_CIVILSTATUS:
				$tpl_filename = "event/civilstatus.html";
				$params = unserialize($event_data["params"]);
				while(list($key,$value) = each($params))
					$this->TEMPLATE->assign($key,$value);
					
			break;
			
			/********************** COVERT OP RESULT *********************************/
			case CONF_EVENT_COVERTOP_RESULT:

				$filter = "WARFARE";
				$params = unserialize($event_data["params"]);
				if (($event_data["sticky"]==0) && ($event_data["seen"]==0))
					if (!$this->DB->Execute("UPDATE game".$this->game_id."_tb_event SET seen='1' WHERE id='".$event_data["id"]."'")) trigger_error($this->DB->ErrorMsg());
				return array($filter,$params["result"]);	
			break;


			/********************** PIRATE BUST **********************************/
			case CONF_EVENT_PIRATEBUST:

				$filter = "WARFARE";
				$params = unserialize($event_data["params"]);
				$tpl_filename = "event/piratebust.html";
				$this->TEMPLATE->assign("result",$params["result"]);
			break;

			/********************** TRADE CONVOY RECV  ********************************/
			case CONF_EVENT_TRADECONVOY_RECEIVED:

				$params = unserialize($event_data["params"]);
				$tpl_filename = "event/tradeconvoy_received.html";
				while(list($key,$value) = each($params)) {
					if (is_numeric($key)) continue;
					
					if (($key == "empire_to") || ($key == "empire_from")) {
						$rs = $this->DB->Execute("SELECT * FROM game".$this->game_id."_tb_empire WHERE id='".intval($value)."'");
						if (!$rs) trigger_error($this->DB->ErrorMsg());
						$value = $this->GAME_TPL->displayEmpireHTML($rs->fields["id"],$rs->fields["emperor"],$rs->fields["name"],$empire_data["networth"]);
					}
					
					if (is_numeric($value)) $value = $this->GAME_TPL->formatNumber($value);
					$this->TEMPLATE->assign($key,$value);
				}
					
				if (($event_data["sticky"]==0) && ($event_data["seen"]==0)) {
					if (!$this->DB->Execute("UPDATE game".$this->game_id."_tb_event SET seen='1' WHERE id='".$event_data["id"]."'")) trigger_error($this->DB->ErrorMsg());
				}
			break;

			/********************** CONF_EVENT_COALITION_INVITE  ********************************/
			case CONF_EVENT_COALITION_INVITE:
				$filter = "DIPLOMACY";
				$params = unserialize($event_data["params"]);
				$tpl_filename = "event/coalition_invite.html";
				$this->TEMPLATE->assign("empire",$this->GAME_TPL->displayEmpireHTML($params["empire_id"],$params["empire_emperor"],$params["empire_name"],$empire_data["networth"]));
				$this->TEMPLATE->assign("coalition_name",$params["coalition_name"]);			
				$this->TEMPLATE->assign("event_from",$event_data["event_from"]);			
			break;
			
			/********************** CONF_EVENT_CONVOY_RETREAT  ********************************/
			case CONF_EVENT_CONVOY_RETREAT:
				$filter = "WARFARE";
				$params = unserialize($event_data["params"]);
				$tpl_filename = "event/convoy_retreat.html";
				$rs = $this->DB->Execute("SELECT id,networth,emperor,name FROM game".$this->game_id."_tb_empire WHERE id='".intval($params)."'");
				$this->TEMPLATE->assign("empire",
				$this->GAME_TPL->displayEmpireHTML(
				$rs->fields["id"],
				$rs->fields["emperor"],
				$rs->fields["name"],
				$rs->fields["networth"]));
			break;
			
			/********************** CONF_EVENT_COALITION_OWNERSHIP_CHANGED *********************/
			case CONF_EVENT_COALITION_OWNERSHIP_CHANGED:
				$filter = "DIPLOMACY";
				$params = unserialize($event_data["params"]);

				$tpl_filename = "event/coalition_ownership_changed.html";
				$this->TEMPLATE->assign("coalition_name",$params["coalition_name"]);			
				if ($params["empire_id"] == "") 
					$this->TEMPLATE->assign("empire",T_("Unknown"));
				else
					$this->TEMPLATE->assign("empire",$this->GAME_TPL->displayEmpireHTML($params["empire_id"],$params["empire_emperor"],$params["empire_name"],$empire_data["networth"]));
			break;
			
			/********************** CONF_EVENT_PENDINGTREATY  ********************************/
			case CONF_EVENT_PENDINGTREATY:
				$filter = "DIPLOMACY";
				$params = unserialize($event_data["params"]);
				$tpl_filename = "event/diplomacy_pendingtreaty.html";
				$this->TEMPLATE->assign("empire",$this->GAME_TPL->displayEmpireHTML($params["empire_id"],$params["empire_emperor"],$params["empire_name"],$empire_data["networth"]));
				$this->TEMPLATE->assign("event_from",$event_data["event_from"]);			
				$this->TEMPLATE->assign("treaty",$CONF_DIPLOMACY_TREATIES[$params["treaty"]]);
			break;


			/********************** CONF_EVENT_TRADECONVOY_RAIDEDBYPIRATE  ********************************/
			case CONF_EVENT_TRADECONVOY_RAIDEDBYPIRATE:
				$filter = "WARFARE";
				$tpl_filename = "event/pirate_ambush.html";
				$params = unserialize($event_data["params"]);
				while(list($key,$value) = each($params))
					$this->TEMPLATE->assign($key,$this->GAME_TPL->formatNumber($value));
			break;


			/********************** CONF_EVENT_SPYCAUGHT  ********************************/
			case CONF_EVENT_SPYCAUGHT:
				$filter = "WARFARE";
				$tpl_filename = "event/spy_caught.html";
				$params = unserialize($event_data["params"]);
				$this->TEMPLATE->assign("empire",$this->GAME_TPL->displayEmpireHTML($params["empire_id"],$params["empire_emperor"],$params["empire_name"],$empire_data["networth"]));
				$this->TEMPLATE->assign("opname",$params["opname"]);			
			break;


			/********************** CONF_EVENT_DISSENSION  ********************************/
			case CONF_EVENT_DISSENSION:
				$filter = "WARFARE";
				$tpl_filename = "event/dissension.html";
				$params = unserialize($event_data["params"]);
				$this->TEMPLATE->assign("content",$params["content"]);			
			break;

			/********************** CONF_EVENT_FOODBOMBED  ********************************/
			case CONF_EVENT_FOODBOMBED:
				$filter = "WARFARE";
				$tpl_filename = "event/foodbombed.html";
				$params = unserialize($event_data["params"]);
				$this->TEMPLATE->assign("content",$params["content"]);			
			break;

			/********************** CONF_EVENT_CARRIERS_SABOTAGE  ********************************/
			case CONF_EVENT_CARRIERS_SABOTAGE:
				$filter = "WARFARE";
				$tpl_filename = "event/carriers_sabotage.html";
				$params = unserialize($event_data["params"]);
				$this->TEMPLATE->assign("content",$params["content"]);			
			break;

			/********************** CONF_EVENT_HOSTAGES  ********************************/
			case CONF_EVENT_HOSTAGES:
				$filter = "WARFARE";
				$tpl_filename = "event/hostages.html";
				$params = unserialize($event_data["params"]);
				$this->TEMPLATE->assign("credits",$this->GAME_TPL->formatCredits($params["credits_lost"]));			
			break;


			/********************** CONF_EVENT_ACCEPTEDTREATY  ********************************/
			case CONF_EVENT_ACCEPTEDTREATY:
				$filter = "DIPLOMACY";
				$params = unserialize($event_data["params"]);
				$tpl_filename = "event/diplomacy_acceptedtreaty.html";
				$this->TEMPLATE->assign("empire",$this->GAME_TPL->displayEmpireHTML($params["empire_id"],$params["empire_emperor"],$params["empire_name"],$empire_data["networth"]));
				$this->TEMPLATE->assign("event_from",$event_data["event_from"]);			
			break;

			/********************** CONF_EVENT_REFUSEDTREATY  ********************************/
			case 	CONF_EVENT_REFUSEDTREATY:
				$filter = "DIPLOMACY";
				$params = unserialize($event_data["params"]);
				$tpl_filename = "event/diplomacy_refusedtreaty.html";
				$this->TEMPLATE->assign("empire",$this->GAME_TPL->displayEmpireHTML($params["empire_id"],$params["empire_emperor"],$params["empire_name"],$empire_data["networth"]));
				$this->TEMPLATE->assign("event_from",$event_data["event_from"]);			
			break;


			/********************** CONF_EVENT_BOND_PAYOUT ********************************/
			case CONF_EVENT_BOND_PAYOUT:
				$params = unserialize($event_data["params"]);
				$tpl_filename = "event/bond_payout.html";
				$this->TEMPLATE->assign("current_credits",$this->GAME_TPL->formatCredits($params["current_credits"]));
			
			break;
			
			/********************** CONF_EVENT_LOTTERYWINNER ********************************/
			case CONF_EVENT_LOTTERYWINNER:
				$params = unserialize($event_data["params"]);
				$tpl_filename = "event/lottery_winner.html";
				$this->TEMPLATE->assign("lottery_cash",$this->GAME_TPL->formatCredits($params["lottery_cash"]));
				$this->TEMPLATE->assign("gender",($params["gender"]=="M"?T_("Emperor"):T_("Emperess")));
				$this->TEMPLATE->assign("emperor",stripslashes($params["empire_emperor"]));
				$this->TEMPLATE->assign("empire",stripslashes($params["empire_name"]));
				
				$logo = "../images/game/empires/$game_id/".$params["empire_id"].".jpg";
				if (!file_exists($logo)) $logo = "../images/game/empires/new.jpg";
				$this->TEMPLATE->assign("logo",$logo);
			
			break;
	

			/********************** CONF_EVENT_EMPIRE_TELEPORTED ********************************/
			case CONF_EVENT_EMPIRE_TELEPORTED:
				$params = unserialize($event_data["params"]);
				$tpl_filename = "event/empire_teleported.html";
				$this->TEMPLATE->assign("empire",$this->GAME_TPL->displayEmpireHTML($params["empire_id"],$params["empire_emperor"],$params["empire_name"],$empire_data["networth"]));
			break;


			/********************** CONF_EVENT_EMPIRE_BUY_NUKES ********************************/
			case CONF_EVENT_EMPIRE_BUY_NUKES:
				$filter = "WARFARE";
				$params = unserialize($event_data["params"]);
				$tpl_filename = "event/empire_buy_nukes.html";
			break;

			/********************** CONF_EVENT_NUCLEARWARFARE_BUSTED ********************************/
			case CONF_EVENT_NUCLEARWARFARE_BUSTED:
				$filter = "WARFARE";
				$params = unserialize($event_data["params"]);
				$this->TEMPLATE->assign("empire",$this->GAME_TPL->displayEmpireHTML($params["empire_id"],$params["empire_emperor"],$params["empire_name"],$empire_data["networth"]));
				$tpl_filename = "event/nuclearwarfare_busted.html";
			break;

			/********************** CONF_EVENT_NUCLEARWARFARE_FOILED ********************************/
			case CONF_EVENT_NUCLEARWARFARE_FOILED:
				$filter = "WARFARE";
				$params = unserialize($event_data["params"]);
				$this->TEMPLATE->assign("empire",$this->GAME_TPL->displayEmpireHTML($params["empire_id"],$params["empire_emperor"],$params["empire_name"],$empire_data["networth"]));
				$tpl_filename = "event/nuclearwarfare_foiled.html";
			break;

			/********************** CONF_EVENT_NUCLEARWARFARE_ATTACKED ********************************/
			case CONF_EVENT_NUCLEARWARFARE_ATTACKED:
				$filter = "WARFARE";
				$params = unserialize($event_data["params"]);
				$this->TEMPLATE->assign("empire",$this->GAME_TPL->displayEmpireHTML($params["empire_id"],$params["empire_emperor"],$params["empire_name"],$empire_data["networth"]));
				$this->TEMPLATE->assign("total_damage",$params["total_damage"]);
				$tpl_filename = "event/nuclearwarfare_attacked.html";
			break;


			/********************** CONF_EVENT_INVASION_REPORT ********************************/
			case CONF_EVENT_INVASION_REPORT:
				$params = unserialize($event_data["params"]);
				$filter = "WARFARE";

				$tpl_filename = "event/invasion_report.html";

				$this->TEMPLATE->assign("attack_empire_id",$params["army_attack"][0]["empire_from"]);
				$this->TEMPLATE->assign("defense_empire_id",$params["army_defense"][0]["empire"]);
				
				$attack_empires = "";
				$attack_soldiers_qty = $params["army_attack"]["0"]["convoy_soldiers"];
				$attack_fighters_qty = $params["army_attack"]["0"]["convoy_fighters"];
				$attack_lightcruisers_qty = $params["army_attack"]["0"]["convoy_lightcruisers"];
				$attack_heavycruisers_qty = $params["army_attack"]["0"]["convoy_heavycruisers"];
				$attack_soldiers_total = 0;
				$attack_fighters_total = 0;
				$attack_lightcruisers_total = 0;
				$attack_heavycruisers_total = 0;


				for ($i=0;$i<count($params["army_attack"]);$i++) {
					$rs = $this->DB->Execute("SELECT emperor,name FROM game".$this->game_id."_tb_empire WHERE id='".intval($params["army_attack"][$i]["empire_from"])."'");
					if (!$rs) trigger_error($this->DB->ErrorMsg());
					$attack_soldiers_total += $params["army_attack"][$i]["convoy_soldiers"];
					$attack_fighters_total += $params["army_attack"][$i]["convoy_fighters"];
					$attack_lightcruisers_total += $params["army_attack"][$i]["convoy_lightcruisers"];
					$attack_heavycruisers_total += $params["army_attack"][$i]["convoy_heavycruisers"];

					$attack_empires .= $rs->fields["emperor"]."@".$rs->fields["name"]." (".$params["army_attack"][$i]["effectiveness"]."%)";
				}


				$this->TEMPLATE->assign("attack_empires",$attack_empires);
				$this->TEMPLATE->assign("attack_soldiers_qty",$this->GAME_TPL->formatNumber($attack_soldiers_qty) ." / <b>".$this->GAME_TPL->formatNumber($attack_soldiers_total))."</b>";
				$this->TEMPLATE->assign("attack_fighters_qty",$this->GAME_TPL->formatNumber($attack_fighters_qty) ." / <b>".$this->GAME_TPL->formatNumber($attack_fighters_total))."</b>";
				$this->TEMPLATE->assign("attack_lightcruisers_qty",$this->GAME_TPL->formatNumber($attack_lightcruisers_qty) ." / <b>".$this->GAME_TPL->formatNumber($attack_lightcruisers_total))."</b>";
				$this->TEMPLATE->assign("attack_heavycruisers_qty",$this->GAME_TPL->formatNumber($attack_heavycruisers_qty) ." / <b>".$this->GAME_TPL->formatNumber($attack_heavycruisers_total))."</b>";
				$this->TEMPLATE->assign("attack_soldiers_level",$params["army_attack"]["0"]["convoy_soldiers_level"]);
				$this->TEMPLATE->assign("attack_fighters_level",$params["army_attack"]["0"]["convoy_fighters_level"]);
				$this->TEMPLATE->assign("attack_lightcruisers_level",$params["army_attack"]["0"]["convoy_lightcruisers_level"]);
				$this->TEMPLATE->assign("attack_heavycruisers_level",$params["army_attack"]["0"]["convoy_heavycruisers_level"]);

				$defense_empires = "";
				$defense_soldiers_qty = $params["army_defense"]["0"]["soldiers"];
				$defense_fighters_qty = $params["army_defense"]["0"]["fighters"];
				$defense_stations_qty = $params["army_defense"]["0"]["stations"];
				$defense_lightcruisers_qty = $params["army_defense"]["0"]["lightcruisers"];
				$defense_heavycruisers_qty = $params["army_defense"]["0"]["heavycruisers"];
				$defense_soldiers_total = 0;
				$defense_fighters_total = 0;
				$defense_lightcruisers_total = 0;
				$defense_heavycruisers_total = 0;

				for ($i=0;$i<count($params["army_defense"]);$i++) {
					$rs = $this->DB->Execute("SELECT emperor,name FROM game".$this->game_id."_tb_empire WHERE id='".intval($params["army_defense"][$i][($i==0?"empire":"empire_from")])."'");
					if (!$rs) trigger_error($this->DB->ErrorMsg());
					$defense_empires .= $rs->fields["emperor"]."@".$rs->fields["name"]." (".$params["army_defense"][$i]["effectiveness"]."%)";
					$defense_soldiers_total += $params["army_defense"][$i]["soldiers"];
					$defense_fighters_total += $params["army_defense"][$i]["fighters"];
					$defense_lightcruisers_total += $params["army_defense"][$i]["lightcruisers"];
					$defense_heavycruisers_total += $params["army_defense"][$i]["heavycruisers"];
				}

				$this->TEMPLATE->assign("defense_empires",$defense_empires);
				$this->TEMPLATE->assign("defense_soldiers_qty",$this->GAME_TPL->formatNumber($defense_soldiers_qty) ." / <b>".$this->GAME_TPL->formatNumber($defense_soldiers_total))."</b>";
				$this->TEMPLATE->assign("defense_fighters_qty",$this->GAME_TPL->formatNumber($defense_fighters_qty) ." / <b>".$this->GAME_TPL->formatNumber($defense_fighters_total))."</b>";
				$this->TEMPLATE->assign("defense_stations_qty",$this->GAME_TPL->formatNumber($defense_stations_qty));
				$this->TEMPLATE->assign("defense_lightcruisers_qty",$this->GAME_TPL->formatNumber($defense_lightcruisers_qty) ." / <b>".$this->GAME_TPL->formatNumber($defense_lightcruisers_total))."</b>";
				$this->TEMPLATE->assign("defense_heavycruisers_qty",$this->GAME_TPL->formatNumber($defense_heavycruisers_qty) ." / <b>".$this->GAME_TPL->formatNumber($defense_heavycruisers_total))."</b>";
				$this->TEMPLATE->assign("defense_soldiers_level",$params["army_defense"]["0"]["soldiers_level"]);
				$this->TEMPLATE->assign("defense_fighters_level",$params["army_defense"]["0"]["fighters_level"]);
				$this->TEMPLATE->assign("defense_stations_level",$params["army_defense"]["0"]["stations_level"]);
				$this->TEMPLATE->assign("defense_lightcruisers_level",$params["army_defense"]["0"]["lightcruisers_level"]);
				$this->TEMPLATE->assign("defense_heavycruisers_level",$params["army_defense"]["0"]["heavycruisers_level"]);

				if ($params["space_won"] == true) {
				
					$this->TEMPLATE->assign("background_space","../images/game/background/invasion_attack.jpg");
					$this->TEMPLATE->assign("color_space","darkred");
				
				} else {
				
					$this->TEMPLATE->assign("background_space","../images/game/background/invasion_defense.jpg");
					$this->TEMPLATE->assign("color_space","darkblue");
				
				}
				
				if ($params["orbital_won"] == true) {
					$this->TEMPLATE->assign("color_orbital","darkred");
					$this->TEMPLATE->assign("background_orbital","../images/game/background/invasion_attack.jpg");
				} else {
					$this->TEMPLATE->assign("color_orbital","darkblue");
					$this->TEMPLATE->assign("background_orbital","../images/game/background/invasion_defense.jpg");
				}
				if ($params["ground_won"] == true) {
					$this->TEMPLATE->assign("color_ground","darkred");
					$this->TEMPLATE->assign("background_ground","../images/game/background/invasion_attack.jpg");
				} else {
					$this->TEMPLATE->assign("color_ground","darkblue");
					$this->TEMPLATE->assign("background_ground","../images/game/background/invasion_defense.jpg");
				}
				



				if (($params["space_won"] == true) && ($params["orbital_won"] == true) && ($params["ground_won"] == true)) {
					// attackers won


					$this->TEMPLATE->assign("lost_population",$this->GAME_TPL->formatNumber($params["lost_population"]));
					$this->TEMPLATE->assign("lost_credits",$this->GAME_TPL->formatCredits($params["lost_credits"]));
					$this->TEMPLATE->assign("lost_food_planets",$this->GAME_TPL->formatNumber($params["lost_food_planets"]));
					$this->TEMPLATE->assign("lost_ore_planets",$this->GAME_TPL->formatNumber($params["lost_ore_planets"]));
					$this->TEMPLATE->assign("lost_supply_planets",$this->GAME_TPL->formatNumber($params["lost_supply_planets"]));
					$this->TEMPLATE->assign("lost_tourism_planets",$this->GAME_TPL->formatNumber($params["lost_tourism_planets"]));
					$this->TEMPLATE->assign("lost_gov_planets",$this->GAME_TPL->formatNumber($params["lost_gov_planets"]));
					$this->TEMPLATE->assign("lost_edu_planets",$this->GAME_TPL->formatNumber($params["lost_edu_planets"]));
					$this->TEMPLATE->assign("lost_research_planets",$this->GAME_TPL->formatNumber($params["lost_research_planets"]));
					$this->TEMPLATE->assign("lost_urban_planets",$this->GAME_TPL->formatNumber($params["lost_urban_planets"]));
					$this->TEMPLATE->assign("lost_petro_planets",$this->GAME_TPL->formatNumber($params["lost_petro_planets"]));
					$this->TEMPLATE->assign("lost_antipollu_planets",$this->GAME_TPL->formatNumber($params["lost_antipollu_planets"]));


					$rs = $this->DB->Execute("SELECT civil_status FROM game".$this->game_id."_tb_empire WHERE id='".$params["army_defense"][0]["empire"]."'");
					if (!$rs) trigger_error($this->DB->ErrorMsg());
					$civil_status =abs($rs->fields["civil_status"]);
					if ($civil_status < 0) $civil_status = 0;
					if ($civil_status > 7) $civil_status = 7;

					$this->TEMPLATE->assign("civil_status",$CONF_CIVIL_STATUS[$civil_status]);

					$rs = $this->DB->Execute("SELECT effectiveness FROM game".$this->game_id."_tb_army WHERE id='".$params["army_defense"][0]["empire"]."'");
					if (!$rs) trigger_error($this->DB->ErrorMsg());
					$this->TEMPLATE->assign("military_effectiveness",$rs->fields["effectiveness"]);


					$this->TEMPLATE->Assign("invasion_won",true);

				} else {
					// attackers lost
					$this->TEMPLATE->Assign("invasion_won",false);
				}


				$attack_casualties = array();
				for ($i=0;$i<count($params["army_attack"]);$i++) {

					$casualty = array();
					$rs = $this->DB->Execute("SELECT emperor,name FROM game".$this->game_id."_tb_empire WHERE id='".intval($params["army_attack"][$i]["empire_from"])."'");
					if (!$rs) trigger_error($this->DB->ErrorMsg());					
					$casualty["emperor"] = $rs->fields["emperor"];
					$casualty["name"] = $rs->fields["name"];
					$casualty["soldiers"] = $this->GAME_TPL->formatNumber($params["army_attack"][$i]["casualties_soldiers"]);
					$casualty["fighters"] = $this->GAME_TPL->formatNumber($params["army_attack"][$i]["casualties_fighters"]);
					$casualty["lightcruisers"] = $this->GAME_TPL->formatNumber($params["army_attack"][$i]["casualties_lightcruisers"]);
					$casualty["heavycruisers"] = $this->GAME_TPL->formatNumber($params["army_attack"][$i]["casualties_heavycruisers"]);
					$casualty["carriers"] = $this->GAME_TPL->formatNumber($params["army_attack"][$i]["casualties_carriers"]);
					$attack_casualties[] = $casualty;

				}

				$this->TEMPLATE->assign("attack_casualties",$attack_casualties);

				$defense_casualties = array();
				for ($i=0;$i<count($params["army_defense"]);$i++) {

					$casualty = array();
					$rs = $this->DB->Execute("SELECT emperor,name FROM game".$this->game_id."_tb_empire WHERE id='".intval($params["army_defense"][$i][($i==0?"empire":"empire_from")])."'");
					if (!$rs) trigger_error($this->DB->ErrorMsg());
					$casualty["emperor"] = $rs->fields["emperor"];
					$casualty["name"] = $rs->fields["name"];
					$casualty["soldiers"] = $this->GAME_TPL->formatNumber($params["army_defense"][$i]["casualties_soldiers"]);
					$casualty["fighters"] = $this->GAME_TPL->formatNumber($params["army_defense"][$i]["casualties_fighters"]);
					$casualty["lightcruisers"] = $this->GAME_TPL->formatNumber($params["army_defense"][$i]["casualties_lightcruisers"]);
					$casualty["heavycruisers"] = $this->GAME_TPL->formatNumber($params["army_defense"][$i]["casualties_heavycruisers"]);
					$casualty["stations"] = $this->GAME_TPL->formatNumber($params["army_defense"][$i]["casualties_stations"]);
					$defense_casualties[] = $casualty;

				}

				$this->TEMPLATE->assign("defense_casualties",$defense_casualties);

			break;

			/********************** EVENT_CONVOY_BACK *********************************/
			case CONF_EVENT_CONVOY_BACK:
				$filter = "WARFARE";
				$params = unserialize($event_data["params"]);
				$tpl_filename = "event/convoy_back.html";
				$this->TEMPLATE->assign("soldiers",$this->GAME_TPL->formatNumber($params["convoy_soldiers"]));
				$this->TEMPLATE->assign("fighters",$this->GAME_TPL->formatNumber($params["convoy_fighters"]));
				$this->TEMPLATE->assign("lightcruisers",$this->GAME_TPL->formatNumber($params["convoy_lightcruisers"]));
				$this->TEMPLATE->assign("heavycruisers",$this->GAME_TPL->formatNumber($params["convoy_heavycruisers"]));
				$this->TEMPLATE->assign("carriers",$this->GAME_TPL->formatNumber($params["carriers"]));

			break;


			/********************** UNKNOWN EVENT TYPE! *********************************/
			default:
				return array($filter,T_("Unknown event type!")." = ".$event_data["event_type"]);
			break;
		}
		
		$this->TEMPLATE->assign("date",$this->GAME_TPL->formatTime(time(NULL)-$event_data["date"]));
		$output = $this->TEMPLATE->fetch($tpl_filename);
		
		if (($event_data["sticky"]==0) && ($event_data["seen"]==0)) {
			if (!$this->DB->Execute("UPDATE game".$this->game_id."_tb_event SET seen='1' WHERE id='".$event_data["id"]."'")) trigger_error($this->DB->ErrorMsg());
		}

		return array($filter,$output);
	}

}


?>
