<?php
	include("../co.php");
	if(isset($_GET["id_velo"])){
		$id=$_GET["id_velo"];
		$sql='SELECT * FROM velo WHERE velo.id_velo="'.$id.'"';
		$res=$mysqli->query($sql);
		while (NULL !== ($row = $res->fetch_array())) {
			echo'<input type="number" name="" value="" required>';
		}
	}

?>