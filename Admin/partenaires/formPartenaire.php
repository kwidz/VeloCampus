<?php
	session_start();
	include('../co.php');
	header("Content-Type: text/plain");
	$nom_partenaire = (isset($_GET["nom_partenaire"])) ? $_GET["nom_partenaire"] : NULL;
	if ($nom_partenaire) {
		$sql = "SELECT nom_partenaire, description_partenaire, photo_partenaire FROM Partenaire WHERE nom_partenaire='".addslashes($nom_partenaire)."'";
		$res=$mysqli->query($sql);
		if ($res){
			while (NULL !== ($row = $res->fetch_array())) {
				echo "<br/>Nom du partenaire : <br/>";
				echo "<input name='nom' id='nom' class='form-control' type='text' value='".$row['nom_partenaire']."'><br/>";
				echo "<br/>Description du partenaire : <br/>";
				echo "<textarea name='description' id='description' class='form-control'>".$row['description_partenaire']."</textarea><br/>";
				echo "<br/>Photo du partenaire : <i>(Actuelle : ".$row['photo_partenaire'].")</i><br/>";
				echo "<input name='photo' id='photo' class='form-control' type='file'>";
			}
		}
        $sql = "SELECT id_partenaire FROM Partenaire WHERE nom_partenaire = '$nom_partenaire'";
        $result = $mysqli->query($sql);
        if ($result) {
          while (NULL !== ($rowp = $result->fetch_array())) {
           $id_partenaire = $rowp['id_partenaire'];
           echo "<input type='hidden' name='id_partenaire' id='id_partenaire' value='$id_partenaire'>";
          }
        }
	}
?>