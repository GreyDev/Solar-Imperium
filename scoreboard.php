<?php
// Solar Imperium is licensed under GPL2, Check LICENSE.TXT for mode details //
define("LANGUAGE_DOMAIN","system");


require_once("include/init.php");



// Display hall of fame

$fames = array();
$rs = $DB->Execute("SELECT * FROM system_tb_hall_of_fame ORDER BY id DESC LIMIT 0,10");
while(!$rs->EOF) {

	$fames[] = $rs->fields;
	$rs->MoveNext();
}
$TPL->assign("hall_of_fame",$fames);


 $scores = array();
 $rs = $DB->Execute("SELECT * FROM system_tb_players ORDER BY score DESC LIMIT 0,30");
 $count = 1;

 while(!$rs->EOF) {

	if ($rs->fields["last_login_date"] == 0) { $rs->MoveNext(); continue; }

	$rs->fields["rank"] = $count;
	$rs->fields["name"] = stripslashes($rs->fields["nickname"]);
	$lifespan = ceil((time(NULL) - $rs->fields["creation_date"])/(60*60*24));
	$rs->fields["lastvisit"] = floor((time(NULL) - $rs->fields["last_login_date"])/(60*60*24)).T_(" Day(s)");
	$rs->fields["lifespan"] = $lifespan.T_(" Day(s)");
	if ($rs->fields["premium"] == 1) $rs->fields["name"] = "<b style=\"color:blue\">".$rs->fields["name"]." *PREMIUM*</b>";
 	$scores[] = $rs->fields;

	$count++;
 	$rs->MoveNext();
 }

 $TPL->assign("scores",$scores);
 

$DB->CompleteTrans();
$TPL->display("page_scoreboard.html");

?>