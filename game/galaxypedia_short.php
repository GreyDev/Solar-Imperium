<?php
	
	$query = "http://galaxypedia.mrgtech.ca/index.php";
	if (isset($_GET["topic"])) {
		$query .= "?topic=".$_GET["topic"];
	} else {

		if (isset($_GET["search"])) 
			$query .= "?search=".$_GET["search"];
		else
			die("Invalid query");
	}
	
	$query .= "&short";
	readfile($query);

?>
