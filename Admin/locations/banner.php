<?php
include('../co.php');
header("Content-Type: text/plain"); // Utilisation d'un header pour spécifier le type de contenu de la page. Ici, il s'agit juste de texte brut (text/plain). 

$variable1 = (isset($_GET["variable1"])) ? $_GET["variable1"] : NULL;
$variable2 = (isset($_GET["variable2"])) ? $_GET["variable2"] : NULL;

$id_etat=$variable1;


if ($variable1 && $variable2) {
	// Faire quelque chose...
	$etat_new="SELECT libelle_etat from Etat Where id_etat=$variable1";
	$res=$mysqli->query($etat_new);
	$row=$res->fetch_array();
	$etat_new=$row[0];
	

	$etat_base="SELECT e.libelle_etat, e.id_etat "
				."from Etat e, Location l, Velo v "
				."where l.id_location=$variable2 "
				."and l.id_velo=v.id_velo "
				."and v.id_etat=e.id_etat ";
	$res=$mysqli->query($etat_base);
	$row=$res->fetch_array();
	$etat_base=$row[1];
	$libelle_etat_base=$row[0];			
	if($variable1 == $etat_base){
		echo "<br/><div class='alert alert-success'><center>L'état du velo est identique à celui du début de la location !</center></div>";
	}
	else{
		echo "<br/><div class='alert alert-danger'><center>L'état du velo n'est pas identique à celui du début ! <br/>état au debut de location : $libelle_etat_base<br/>état aujourd'hui : $etat_new </center></div>";	
	}
} else {
	echo "<br/><div class='alert alert-danger'><center>Erreur champs.</center></div>";
}

?>