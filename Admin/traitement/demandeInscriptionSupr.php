<?php
if(isset($_GET['id'])){
	include("../co.php");

	$sql="SELECT prenom_adherent, adresse_mail_adherent FROM Adherent WHERE id_adherent=".$_GET['id'];
	$res=$mysqli->query($sql);
	while (NULL !== ($row = $res->fetch_array())){
		$EmailTo = $row["adresse_mail_adherent"];
	}

	$EmailFrom = "site@velocampus.fr";
	$Subject = "Inscription à Vélocampus";
	
	$Body = "Bonjour ".$row["prenom_adherent"].", votre inscription a été refusé par un administrateur du site.\n
	Pour toute réclammation, veuillez envoyer un mail à velocampusdulion@gmail.com ou rendez-vous directement à l'association.";
	$success = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");

	$sql="DELETE  from Adherent where id_adherent='".$_GET['id']."'";
	echo $sql;
	$res=$mysqli->query($sql);
}
header("Location: ".$_SERVER['HTTP_REFERER']);