<?php
	session_start();
	if (isset($_POST['velo']) && isset($_POST['urgence']) && isset($_POST['description']) && isset($_POST['id_velo']) && isset($_POST['mail'])) {
		$velo = $_POST['velo'];
		$id_velo = $_POST['id_velo'];
		$mail = $_POST['mail'];
		$urgence = $_POST['urgence'];
		$description = $_POST['description'];
		$mysqli = new mysqli("127.0.0.1","velo","velo","velo");
		$result = $mysqli->query("INSERT INTO Reparation VALUES (null,'".$mail."','".$id_velo."','".$velo."','".$description."','".$urgence."',null)");
	}
	header("Location: ".$_SERVER['HTTP_REFERER']);
?>