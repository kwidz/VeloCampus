<?php
	session_start();
	if (isset($_POST['id_velo'])&&isset($_POST['id_cadenas'])) {
		include('../../co.php');
		$id_velo = $_POST['id_velo'];
		$id_cadenas = $_POST['id_cadenas'];
		$sql = "UPDATE Cadenas SET id_cadenas = $id_cadenas , id_velo = $id_velo WHERE id_cadenas = $id_cadenas";
		$res = $mysqli->query($sql);
		if ($res) {
			$_SESSION['modcadenas'] = 1;
		}
		else $_SESSION['modcadenas'] = -1;
	}
	else $_SESSION['modcadenas'] = -1;
	header("Location: ".$_SERVER['HTTP_REFERER']);
?>