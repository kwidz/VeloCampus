<!--cette page traite la mise en base de donnée d'un velo
-->
<?php
session_start();
include('../../co.php');

if( (!empty($_POST['inputLibelle'])) && (isset($_POST['inputLibelle'])) ) {
	$libel=$_POST["inputLibelle"];
    $sql='INSERT INTO _Type Values(null,"'.$libel.'")';
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

