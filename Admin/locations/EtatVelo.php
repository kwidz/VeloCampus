<?php
include('../co.php');
header("Content-Type: text/plain"); // Utilisation d'un header pour spécifier le type de contenu de la page. Ici, il s'agit juste de texte brut (text/plain). 

$id_velo = (isset($_GET["id_velo"])) ? $_GET["id_velo"] : NULL;

if ($id_velo) {
	$sql="SELECT v.id_etat, e.libelle_etat from Velo v, Etat e where v.id_velo = $id_velo and v.id_etat = e.id_etat";
	$res=$mysqli->query($sql);
	$row=$res->fetch_array();
	$id_etat=$row[0];
	$libelle_etat=$row[1];

	switch ($id_etat) {
		case '1':
			echo "<div class='alert alert-success'><center>l'état de ce velo est : $libelle_etat </center></div>";
			break;
		case '4':
			echo "<div class='alert alert-danger'><center>l'état de ce velo est : $libelle_etat </center></div>";
			break;
		
		default:
			echo "<div class='alert alert-warning'><center>l'état de ce velo est : $libelle_etat </center></div>";
			break;
	}

	
	
} else {
	echo "<br/><div class='alert alert-danger'><center>Erreur champs.</center></div>";
}

?>