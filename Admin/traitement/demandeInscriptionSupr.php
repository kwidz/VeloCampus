<?php
if(isset($_GET['id'])){
	include("../co.php");
	$sql="DELETE  from Adherent where id_adherent='".$_GET['id']."'";
	echo $sql;
	$res=$mysqli->query($sql);

}
header("Location: ".$_SERVER['HTTP_REFERER']);