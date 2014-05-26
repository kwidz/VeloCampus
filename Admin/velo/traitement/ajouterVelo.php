<!--cette page traite la mise en base de donnée d'un velo
-->
<?php
session_start();
include('../../co.php');
//header("Content-Type: text/plain"); // Utilisation d'un header pour spécifier le type de contenu de la page. Ici, il s'agit juste de texte brut (text/plain). 
if(((!empty($_POST['etat_velo']))
	&&(!empty($_POST['id_velo']))
	&&(!empty($_POST['taille_velo']))
	&&(!empty($_POST['type_velo'])))
	&&((isset($_POST['etat_velo']))
		&&(isset($_POST['id_velo']))
		&&(isset($_POST['taille_velo']))
		&&(isset($_POST['type_velo'])))){

	$id=$_POST["id_velo"];
	$etat=$_POST["etat_velo"];
	$taille=$_POST["taille_velo"];
	$type=$_POST["type_velo"];

	$sql="SELECT id_velo from Velo";
	$res = $mysqli->query($sql);

	$ok = true;
	 while (NULL !== ($row = $res->fetch_array())){
              if($row["id_velo"] == $id) $ok=false;
            }

    if($ok){
    	$sql='INSERT INTO Velo(id_velo,id_Etat, id_taille, id_type) Values("'.$id.'","'.$etat.'", "'.$taille.'", "'.$type.'")';
		$res=$mysqli->query($sql);
		$_SESSION['addvelo'] = 1;
    echo "test";
    }

    else{
    	$_SESSION['addvelo'] = -1;
    }
}
else $_SESSION['addvelo'] = -1;
//header("Location: ".$_SERVER['HTTP_REFERER']);
?>

