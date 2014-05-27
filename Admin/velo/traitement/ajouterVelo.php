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
		&&(isset($_POST['type_velo'])))
		&&(isset($_POST['id_velo']))){

	$etat=$_POST["etat_velo"];
	$taille=$_POST["taille_velo"];
	$type=$_POST["type_velo"];
	$id_velo=$_POST["id_velo"];
    $sql='INSERT INTO Velo Values("'.$id_velo.'","'.$etat.'", "'.$taille.'", "'.$type.'")';
	$res=$mysqli->query($sql);
	if ($res) {
		$_SESSION['addvelo'] = 1;
	}

    else{
    	$_SESSION['addvelo'] = -1;
    }
}
else $_SESSION['addvelo'] = -1;

if(isset($_POST['cad1'])) {
	$sql = "INSERT INTO Cadenas Values('".$_POST['cad1']."','".$_POST['id_velo']."')";
	$res=$mysqli->query($sql);
	if (!$res) $_SESSION['addcadenas'] = -1;
	if (isset($_POST['cad2'])) {
		$sql = "INSERT INTO Cadenas Values('".$_POST['cad2']."','".$_POST['id_velo']."')";
		$res=$mysqli->query($sql);
		if (!$res) $_SESSION['addcadenas'] = -1;
		if(isset($_POST['cad3'])) {
			$sql = "INSERT INTO Cadenas Values('".$_POST['cad3']."','".$_POST['id_velo']."')";
			$res=$mysqli->query($sql);
			if (!$res) $_SESSION['addcadenas'] = -1;
		}
	}
}

header("Location: ".$_SERVER['HTTP_REFERER']);
?>

