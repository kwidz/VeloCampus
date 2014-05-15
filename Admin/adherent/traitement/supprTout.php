<?php
header("Content-Type:text/plain");
include('../../co.php');
$bool = True;
$sql="delete from Location ";
if(!$res=$mysqli->query($sql)){ $bool = False; }

$sql="delete from Cotisation";
if(!$res=$mysqli->query($sql)){ $bool = False; }

$sql="delete from Adherent";
if(!$res=$mysqli->query($sql)){ $bool = False; }

if($bool == True){
	echo '<div class="alert alert-success">Les adhérents ont bien été TOUS supprimer</div>';
}else{ echo '<div class="alert alert-danger">erreur</div>'; }


?>