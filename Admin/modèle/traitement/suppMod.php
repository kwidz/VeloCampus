<!--cette page traite la suppression de la base de donnée d'un velo
-->
<?php
session_start();
include('../../co.php');
if((!empty($_POST["supp_mod"])) && ((isset($_POST["supp_mod"])))){
	//$id = $_POST["supp_id_velo"];
	$sql='delete from _Type where id_type = '.$_POST["supp_mod"];
	$res=$mysqli->query($sql);
	$_SESSION['suppMod'] = 12;
	
}
else $_SESSION['suppMod'] = -12;
header("Location: ".$_SERVER['HTTP_REFERER']);
?>