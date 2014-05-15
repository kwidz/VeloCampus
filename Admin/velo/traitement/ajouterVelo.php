<!--cette page traite la mise en base de donnée d'un velo
-->
<?php
include('../../co.php');
//header("Content-Type: text/plain"); // Utilisation d'un header pour spécifier le type de contenu de la page. Ici, il s'agit juste de texte brut (text/plain). 
if(((!empty($_POST['etat_velo']))
	&&(!empty($_POST['taille_velo']))
	&&(!empty($_POST['type_velo'])))
	&&((isset($_POST['etat_velo']))
		&&(isset($_POST['taille_velo']))
		&&(isset($_POST['type_velo'])))){
	
	$etat=$_POST["etat_velo"];
$taille=$_POST["taille_velo"];
$type=$_POST["type_velo"];

$sql='INSERT INTO velo(id_Etat, id_taille, id_type) Values("'.$etat.'", "'.$taille.'", "'.$type.'")';
$res=$mysqli->query($sql);
?><script>
window.location='../index.php?message=ok';
</script><?php


}else{
	?>
	<script>
	window.location='../index.php?message=notok';
	</script><?php
}
?>

