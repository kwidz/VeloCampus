<?php
if(isset($_GET['id'])){
	include("../co.php");
	$sql="INSERT INTO Cotisation (`id_cotisation`, `id_adherent`) VALUES (NULL, ".$_GET['id'].");";
	echo $sql;
	$res=$mysqli->query($sql);

}
header("Location: ".$_SERVER['HTTP_REFERER']);
