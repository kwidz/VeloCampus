<?php
header('content-type : application/json');
$o=new stdClass();
$h = getallheaders();
$source = file_get_contents('php://input');
$types = array('image/jpg','image/jpeg','image/png','image/gif','image/bmp');
if(!in_array($h['x-file-type'], $types)){
	$o->error = 'Type de fichier non supporté';	
}
else{

	file_put_contents($h['x-directory-name'].'/'.$h['x-file-name'], $source);	
	$o->name = $h['x-file-name'];
	$o->content = '<p >'.$h['x-file-name'].' terminé</p>';
	exec('chmod -R 777'.$h['x-directory-name'].'');
}
echo json_encode($o);
?>