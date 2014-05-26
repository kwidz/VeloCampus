<?php
	session_start();
	if (isset($_POST['nom']) && isset($_POST['description'])) {
		
		$nom = $_POST['nom'];
		$description = $_POST['description'];
		$photo = "../images/membres/".$_FILES['icone']['name'];
		include("../co.php");
		
		$sql = "INSERT INTO Membres VALUES(null,'".$nom."','".$description."','".$photo."');";
		$result = $mysqli->query($sql);
		if ($result) {
			$_SESSION['ajMembre'] = 1;
		}
		else {
			$_SESSION['ajMembre'] = -1;
		}
		
		if ($_FILES['icone']['error'] > 0) $erreur = "Erreur lors du transfert";
		$resultat = move_uploaded_file($_FILES['icone']['tmp_name'],"../".$photo);

if ($resultat) echo "Transfert réussi";
	}
	header("Location: ".$_SERVER['HTTP_REFERER']);
?>