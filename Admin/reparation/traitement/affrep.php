<?php
include('../../co.php');
if(!empty($_GET['id_velo']) && isset($_GET['id_velo'])){
	$sql = 'select * from Reparation where id_velo = '.$_GET['id_velo'].' and urgence=-1';
	$res=$mysqli->query($sql);
	echo '<table><tr><td>Reparation Effectué</td><tr>';
	while (NULL !== ($row = $res->fetch_array())) {

	echo '<tr><td>'.$row[1].'</td></tr>';
}
echo '</table>';


$sql = 'select * from Reparation where id_velo = '.$_GET['id_velo'].' and urgence <> -1';
	$res=$mysqli->query($sql);
	echo '<table><tr><td>Demande de réparation</td></tr>';
	while (NULL !== ($row = $res->fetch_array())) {

	echo '<tr><td>'.$row[1].'</td></tr>';
}
echo '</table>';
}
else{ echo 'id_velo est vide :( '; }

?>