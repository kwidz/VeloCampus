<!-- page pour ajouter un velo dans la bdd -->

<?php
	include('../../co.php');
	if( ( (!empty($_POST["etat_velo"])) 
		&& (!empty($_POST["taille_velo"]))
		&& (!empty($_POST["type_velo"])))
			&&((isset($_POST["etat_velo"]))
			&&((isset($_POST["taille_velo"]))
			&&((isset($_POST["type_velo"]))) ){

		$etat_velo = $_POST["etat_velo"];
		$taille_velo = empty($_POST["taille_velo"]);
		$type_velo = empty($_POST["type_velo"]);

		$sql ='INSERT INTO velo (id_etat, id_taille, idtype) VALUES('.$etat_velo.', '.$taille_velo.', '.$type_velo.')';
		$res=$mysqli->query($sql);	
	}

?>