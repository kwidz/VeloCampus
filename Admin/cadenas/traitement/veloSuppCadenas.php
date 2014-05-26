<?php
session_start();
include('../../co.php');
if((!empty($_POST["id_cadenas"])) && (isset($_POST["id_cadenas"]))){
	$sql='DELETE FROM Cadenas WHERE id_cadenas = '.$_POST["id_cadenas"];
	$res=$mysqli->query($sql);
	if ($res) {
		$_SESSION['suppcadenas'] = 1;
	}
	else $_SESSION['suppcadenas'] = -1;
}
else $_SESSION['suppcadenas'] = -1;

header("Location: ".$_SERVER['HTTP_REFERER']);
?>