<?php
	session_start();	
	if (isset($_POST['nom'])) {
		$nom = $_POST['nom'];
		echo $nom;
		include("../co.php");
		$sql = "DELETE FROM Membres WHERE id_Membre='".$nom."'";
		echo $sql;
		$result = $mysqli->query($sql);
		echo $result;
		if ($result) {
			$_SESSION['delMembre'] = 1;
		}
		else {
			$_SESSION['delMembre'] = -1;
		}
	}
	header("Location: ".$_SERVER['HTTP_REFERER']);
?>