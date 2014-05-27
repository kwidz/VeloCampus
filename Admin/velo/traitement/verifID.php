<?php
	if (isset($_GET['id'])) {
		$id=$_GET['id'];
		if (is_numeric($id)) {
			include("../../co.php");
			$sql = "SELECT id_velo FROM Velo where id_velo = ".$id.";";
			$res=$mysqli->query($sql);
			$row = $res->fetch_array();
			if ($row) {
				echo "<br/><div class='alert alert-warning'><center>L'id n'est pas disponible.</center></div>";
			}
			else echo "<br/><div class='alert alert-success'><center>L'id est disponible.</center></div>";
		}
		else {
			echo "<br/><div class='alert alert-danger'><center>L'id n'est pas un numérique.</center></div>";
		}
	}
	
?>