<?php
	session_start();
	include('../co.php');
	header("Content-Type: text/plain");
	$nom_partenaire = (isset($_GET["nom_partenaire"])) ? $_GET["nom_partenaire"] : NULL;
	if ($nom_partenaire) {
		$sql = "SELECT nom_partenaire, description_partenaire, photo_partenaire FROM Partenaire WHERE nom_partenaire='".$nom_partenaire."'";
		$res=$mysqli->query($sql);
		if ($res){
			while (NULL !== ($row = $res->fetch_array())) {
				echo "<br/>Nom du partenaire : <br/>";
				echo "<input class='form-control' type='text' value='".$row['nom_partenaire']."'><br/>";
				echo "<br/>Description du partenaire : <br/>";
				echo "<textarea class='form-control'>".$row['description_partenaire']."</textarea><br/>";
				echo "<br/>Photo du partenaire : <i>(Actuelle : ".$row['photo_partenaire'].")</i><br/>";
				echo "<input class='form-control' type='file'>";
			}
		}
		else {
			echo "Normal !";
		}
	}
?>