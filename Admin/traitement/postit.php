<?php 
require_once("../co.php");
	if (isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['mess']) && !empty($_POST['mess'])){
		$nom = addslashes($_POST['nom']);
		$mess = str_replace("\n","<br/>",addslashes($_POST['mess']));
		$sql = "INSERT INTO Postit VALUES (null,'".$nom."','".$mess."')";
		$res = $mysqli->query($sql) or die(mysql_error());
	}
	else {echo "erreur d'envoi";}
header("Location: ".$_SERVER['HTTP_REFERER']);
?>