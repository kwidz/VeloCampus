<?php
session_start();
include('../../co.php');
?><meta http-equiv="content-type" content="text/html; charset=utf-8" /><?php

if((isset($_POST['inputLibelle'])) && (isset($_POST['inputDesc'])) && (isset($_POST['inputCar']))/* && (isset($_FILES['imageVelo']))*/) {
	$libelle = $_POST["inputLibelle"];
	$description = $_POST["inputDesc"];
	$caracteristiques = $_POST["inputCar"];
	
	$types = array('image/jpg','image/jpeg','image/png','image/gif','image/bmp');
	if(!in_array($_FILES['imageVelo']['type'], $types)){
		$erreur="erreurfich";	
	}
	else{
		$name = $_FILES['imageVelo']['name'];
		$imageVelo = '../../../images/velos/'.$name;	
		$resultat = move_uploaded_file($_FILES['imageVelo']['tmp_name'],$imageVelo);
		exec('chmod -R 777 '.'../../../images/velos/');
		if($resultat)
			$_SESSION['erreur'] = 1;
		else
			$_SESSION['erreur'] = 2;
	}

    $sql='INSERT INTO _Type Values(null,"'.$libelle.'","'.$description.'","'.$caracteristiques.'","'.$name.'")';
    echo $name;
	$res=$mysqli->query($sql);
	if ($res) {
		$_SESSION['addMod'] = 1;
	}

    else{
    	$_SESSION['addMod'] = -1;
    }
}
else $_SESSION['addMod'] = -1;
header("Location: ".$_SERVER['HTTP_REFERER']);
?>
