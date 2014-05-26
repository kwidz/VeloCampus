<?php
	session_start();
	if (isset($_POST['nom']) && isset($_POST['description'])) {
		
		$nom = $_POST['nom'];
		$description = $_POST['description'];
		
		include("../co.php");
		
		$sql = "UPDATE Membres SET nom_membre = '".$_POST['nom']."', biographie = '".$_POST['description']."' WHERE id_Membre='".$_POST['id']."'";
		$result = $mysqli->query($sql);
		if ($result) {
			$_SESSION['ajMembre'] = 1;
		}
		else {
			$_SESSION['ajMembre'] = -1;
		}
		
		if(isset($_FILES['icone'])){

			$photo = "../images/membres/".$_FILES['icone']['name'];
		if ($_FILES['icone']['error'] > 0) $erreur = "Erreur lors du transfert";
		$sql="UPDATE Membres SET photo = '".$photo."' WHERE id_Membre='".$_POST['id']."'";
		$result = $mysqli->query($sql);
		
		$resultat = move_uploaded_file($_FILES['icone']['tmp_name'],"../".$photo);

if ($resultat) echo "Transfert réussi";
	}

}
	header("Location: ".$_SERVER['HTTP_REFERER']);
?>