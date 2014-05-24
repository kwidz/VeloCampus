<?php
	session_start();
	if (isset($_POST['nom']) && isset($_POST['description']) && isset($_POST['photo'])) {
		$nom = $_POST['nom'];
		$description = $_POST['description'];
		$photo = "photos/".$_POST['photo'];
		include("../co.php");
		$sql = "INSERT INTO Partenaire VALUES(null,'".$nom."','".$description."','".$photo."');";
		$result = $mysqli->query($sql);
		if ($result) {
			$_SESSION['ajPar'] = 1;
		}
		else {
			$_SESSION['ajPar'] = -1;
		}
	}
	header("Location: ".$_SERVER['HTTP_REFERER']);
?>