<?php
	session_start();
	echo '<script type="text/javascript" src="script.js"></script>';
	include("../co.php");
	print_r($_FILES);
	if (isset($_POST['nom']) && isset($_POST['description']) && isset($_POST['id_partenaire']) && !(isset($_FILES))) {
		echo "A";
		$nom = $_POST['nom'];
		$description = $_POST['description'];
		$id_partenaire = $_POST['id_partenaire'];
		$result = $mysqli->query("UPDATE Partenaire SET nom_partenaire='".$nom."',description_partenaire='".$description."' WHERE id_partenaire='$id_partenaire'");	
		if ($result) {
			$_SESSION['modPar'] = 1;
		}
	}
	else if (isset($_POST['nom']) && isset($_POST['description']) && isset($_POST['id_partenaire']) && isset($_FILES)) {
		echo "B";
		$nom = $_POST['nom'];
		$description = $_POST['description'];
		$id_partenaire = $_POST['id_partenaire'];
		$result = $mysqli->query("UPDATE Partenaire SET nom_partenaire='".$nom."',description_partenaire='".$description."', photo_partenaire='photos/".$_FILES['photo']['name']."' WHERE id_partenaire='$id_partenaire'");	
		if ($result) {
			$types = array('image/jpg','image/jpeg','image/png','image/gif','image/bmp');
			if(!in_array($_FILES['photo']['type'], $types)){
				$erreur="erreurfich";
				$_SESSION['modPar'] = -1;
			}
			else{
				exec('chmod -R 777 photos');
				$nom='photos/'.$_FILES['photo']['name'];	
				$resultat = move_uploaded_file($_FILES['photo']['tmp_name'],$nom);
				if($resultat)
					$_SESSION['modPar'] = 1;
				else
					$_SESSION['modPar'] = -1;
			}
			$_SESSION['modPar'] = 1;
		}
	}
	else $_SESSION['modPar'] = -1;
	
	header("Location: ".$_SERVER['HTTP_REFERER']);
?>