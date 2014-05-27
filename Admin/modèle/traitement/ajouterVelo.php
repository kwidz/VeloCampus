<!--cette page traite la mise en base de donnée d'un velo
-->
<?php
session_start();
include('../../co.php');
if(((!empty($_POST['etat_velo']))
	&&(!empty($_POST['taille_velo']))
	&&(!empty($_POST['type_velo'])))
	&&((isset($_POST['etat_velo']))
		&&(isset($_POST['taille_velo']))
		&&(isset($_POST['type_velo'])))){

	$etat=$_POST["etat_velo"];
	$taille=$_POST["taille_velo"];
	$type=$_POST["type_velo"];
    $sql='INSERT INTO Velo Values(null,"'.$etat.'", "'.$taille.'", "'.$type.'")';
	$res=$mysqli->query($sql);
	if ($res) {
		$_SESSION['addvelo'] = 1;
	}

    else{
    	$_SESSION['addvelo'] = -1;
    }
}
else $_SESSION['addvelo'] = -1;
header("Location: ".$_SERVER['HTTP_REFERER']);
?>

