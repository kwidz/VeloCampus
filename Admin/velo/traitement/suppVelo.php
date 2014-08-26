<!--cette page traite la suppression de la base de donnée d'un velo
-->
<?php
session_start();
include('../../co.php');
if((!empty($_POST["supp_id_velo"])) && ((isset($_POST["supp_id_velo"])))){
	//$id = $_POST["supp_id_velo"];
	$sql = 'DELETE from Cadenas WHERE id_velo = '.$_POST["supp_id_velo"];
	$res=$mysqli->query($sql);
	$sql = 'DELETE from Velo where id_velo = '.$_POST["supp_id_velo"];
	$res=$mysqli->query($sql);
	$_SESSION['suppvelo'] = 1;
}

else $_SESSION['suppvelo'] = -1;
header("Location: ".$_SERVER['HTTP_REFERER']);
?>