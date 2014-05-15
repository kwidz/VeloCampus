<?php
header("Content-Type:text/plain");
include('../../co.php');
$bool = True;
$sql="delete from Location where id_adherent =".$_GET['id_adherent'];
if(!$res=$mysqli->query($sql)){ $bool = False; }

$sql="delete from Cotisation where id_adherent =".$_GET['id_adherent'];
if(!$res=$mysqli->query($sql)){ $bool = False; }

$sql="delete from Adherent where id_adherent =".$_GET['id_adherent'];
if(!$res=$mysqli->query($sql)){ $bool = False; }

if($bool == True){
	echo '<div class="alert alert-success">L\'adhérent a bien été supprimer</div>';
}else{ echo '<div class="alert alert-danger">erreur</div>'; }

?>