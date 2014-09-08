<?php
if(isset($_GET['id'])){
	include("../co.php");
	$sql="INSERT INTO Cotisation (`id_cotisation`, `id_adherent`) VALUES (NULL, ".$_GET['id'].");";
	echo $sql;
	$res=$mysqli->query($sql);

	$sql="SELECT prenom_adherent, adresse_mail_adherent FROM Adherent WHERE id_adherent=".$_GET['id'];
	$res=$mysqli->query($sql);
	while (NULL !== ($row = $res->fetch_array())) {
		$EmailTo = $row["adresse_mail_adherent"];
	}

	$EmailFrom = "velocampusdulion90@gmail.com";
	$Subject = "Validation de l'inscription Velocampus";
	$Body = "Félicitation ".$row["prenom_adherent"].", votre inscription a été validé par un administrateur du site !";
	$success = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");
}
header("Location: ".$_SERVER['HTTP_REFERER']);
