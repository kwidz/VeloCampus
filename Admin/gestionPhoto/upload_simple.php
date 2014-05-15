<?php
session_start();
$types = array('image/jpg','image/jpeg','image/png','image/gif','image/bmp');
if(!in_array($_FILES['file']['type'] , $types)){
	$erreur="erreurfich";	
}
else{
	
	$nom=$_GET['dossier'].'/'.$_FILES['file']['name'];	
	$resultat = move_uploaded_file($_FILES['file']['tmp_name'],$nom);
	exec('chmod -R 777'.$_GET['dossier'].'');
	if($resultat)
		$_SESSION['erreur'] = 1;
	else
		$_SESSION['erreur'] = 2;
}
echo "<script>document.location.href='dragdrop.php?dossier=".$_GET['dossier']."'</script>";

?>