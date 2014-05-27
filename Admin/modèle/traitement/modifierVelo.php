<?php
session_start();
include('../../co.php');
if(((!empty($_POST['etat_velo']))
	&&(!empty($_POST['id_velo']))
	&&(!empty($_POST['taille_velo']))
	&&(!empty($_POST['type_velo'])))
		&&((isset($_POST['etat_velo']))
		&&(isset($_POST['id_velo']))
		&&(isset($_POST['taille_velo']))
		&&(isset($_POST['type_velo'])))){

	$id=$_POST["id_velo"];
	$etat=$_POST["etat_velo"];
	$taille=$_POST["taille_velo"];
	$type=$_POST["type_velo"];

	$sql='UPDATE Velo SET id_Etat = '.$etat.', id_taille = '.$taille.', id_type = '.$type.' where id_velo='.$id.'';
	$res=$mysqli->query($sql);
	if ($res) $_SESSION['modvelo'] = 1;	
	else $_SESSION['modvelo'] = -1;	
}

header("Location: ".$_SERVER['HTTP_REFERER']);
?>