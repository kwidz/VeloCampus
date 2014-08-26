<?php
session_start();
include('../../co.php');
if (isset($_POST['idType'])){
	$idType = $_POST['idType'];
	echo $idType;
}

// header("Location: ".$_SERVER['HTTP_REFERER']);
?>