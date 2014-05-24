<?php
	session_start();	
	if (isset($_POST['nom'])) {
		$nom = $_POST['nom'];
		echo $nom;
		include("../co.php");
		$sql = "DELETE FROM Partenaire WHERE nom_partenaire='".$nom."'";
		$result = $mysqli->query($sql);
		echo $result;
		if ($result) {
			$_SESSION['delPar'] = 1;
		}
		else {
			$_SESSION['delPar'] = -1;
		}
	}
	//header("Location: ".$_SERVER['HTTP_REFERER']);
?>