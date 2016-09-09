<?php

// redirect
if (file_exists("install.php")) 
	die(header("Location: install.php"));
else
	die(header("Location: welcome.php"));



?>
