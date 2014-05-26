<?php
	session_start();
	if (isset($_POST['id_velo'])) {
		include('../../co.php');
		$id_velo = $_POST['id_velo'];
		$sql = "INSERT INTO Cadenas VALUES(null,'".$id_velo."')";
		$res = $mysqli->query($sql);
		if ($res) {
			$_SESSION['addcadenas'] = 1;
		}
		else $_SESSION['addcadenas'] = -1;
	}
	header("Location: ".$_SERVER['HTTP_REFERER']);
?>