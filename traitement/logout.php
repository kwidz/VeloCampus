<?php
	session_start();
	$_SESSION = array(); 
	session_destroy();
	setcookie ("Session", "", time() - 3600, "/", "localhost");
	// setcookie("Session", NULL, -1); 
	header("Location: ".$_SERVER['HTTP_REFERER']);
?>