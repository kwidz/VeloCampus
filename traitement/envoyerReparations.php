<?php
	session_start();
	if (isset($_POST['urgence']) && isset($_POST['description']) && isset($_POST['id_velo'])) {
		$description = $_POST['description'];
		$urgence = $_POST['urgence'];
		$id_velo = $_POST['id_velo'];
		$mysqli = new mysqli("127.0.0.1","velo","velo","velo");
		$result = $mysqli->query("INSERT INTO Reparation VALUES (null,'".$description."','".$urgence."',null)");
	}
	$_SESSION["res"] = 1;
	header("Location: ".$_SERVER['HTTP_REFERER']);
?>
