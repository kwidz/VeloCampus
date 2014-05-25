<?php
	session_start();
	echo '<script type="text/javascript" src="script.js"></script>';
	include("../co.php");
	print_r($_POST);
	if (isset($_POST['nom']) && isset($_POST['description'])) {
		echo "test";
		$nom = $_POST['nom'];
		$description = $_POST['description'];
		$result = $mysqli->query("UPDATE Partenaire SET nom_partenaire='".$nom."',description_partenaire='".$description."', photo_partenaire='".$_FILES['photo']['name']."'");	
		if ($result) {
			echo "cool";
			$_SESSION['update'] = 1;
		}
	}
	else echo "haha";
?>