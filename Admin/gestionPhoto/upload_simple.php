<?php
$types = array('image/jpg','image/jpeg','image/png','image/gif','image/bmp');
if(!in_array($_FILES['file']['type'] , $types)){
	$erreur="erreurfich";	
}
else{
	
	$nom=$_GET['dossier'].'/'.$_FILES['file']['name'];	
	$resultat = move_uploaded_file($_FILES['file']['tmp_name'],$nom);
	exec('chmod -R 777'.$_GET['dossier'].'');
	if($resultat)
		$erreur="noproblem";
	else
		$erreur="erreur";
}
echo "<script>document.location.href='dragdrop.php?dossier=".$_GET['dossier']."&erreur=".$erreur."'</script>";

?>