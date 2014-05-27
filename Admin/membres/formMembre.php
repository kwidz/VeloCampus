<?php
	session_start();
	include('../co.php');
	header("Content-Type: text/plain");
	$id = (isset($_GET["id"])) ? $_GET["id"] : NULL;
	if ($id) {
		$sql = "SELECT * FROM Membres WHERE id_Membre='".$id."'";
		$res=$mysqli->query($sql);
		if ($res){
			while (NULL !== ($row = $res->fetch_array())) {

				echo "<br/>Nom du membre : <br/>";
				echo "<input name='nom' id='nom' class='form-control' type='text' value='".$row[1]."'><br/>";
				echo "<br/>Biographie : <br/>";
				echo "<textarea name='description' id='description' class='form-control'>".$row[2]."</textarea><br/>";
				echo "<br/>Fonction dans l'association :<br/>";
				echo "<input name='fonction' id='fonction' class='form-control' type='text' value='".$row[3]."'>";
				echo "<br/>Photo du membre (facultative) : ";
				echo '<input type="file" name="icone" id="icone" />';
			}
		}
		else {
			echo "Normal !";
		}
	}
?>