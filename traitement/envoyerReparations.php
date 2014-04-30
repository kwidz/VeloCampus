<?php
	session_start();
	if (isset($_POST['aqui']) && isset($_POST['urgence']) && isset($_POST['description'])) {
		$aqui = $_POST['aqui'];
		$urgence = $_POST['urgence'];
		$description = $_POST['description'];
	}
?>