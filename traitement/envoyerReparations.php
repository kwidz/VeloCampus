<?php
	session_start();
	if (isset($_POST['urgence']) && isset($_POST['description']) && isset($_POST['id_velo'])) {
		$description = $_POST['description'];
		$urgence = $_POST['urgence'];
		$id_velo = $_POST['id_velo'];
		include("../co.php");
		$result = $mysqli->query("INSERT INTO Reparation VALUES (null,'".$description."','".$urgence."',null,'".$id_velo."')");
	}
	$_SESSION["rep"] = 1;
	header("Location: ".$_SERVER['HTTP_REFERER']);
?>
