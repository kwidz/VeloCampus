<?php
require_once("../co.php");
	if (isset($_GET['id'])){
		$id = $_GET['id'];
		$sql = "delete from Postit where id_postit=".$id."";
		$res = $mysqli->query($sql) or die(mysql_error());
		}
	else {echo "Erreur de suppression";}
	
header("Location: ".$_SERVER['HTTP_REFERER']);
	
?>