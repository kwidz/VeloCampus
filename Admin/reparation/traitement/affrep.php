<?php
include('../../co.php');
if(!empty($_GET['id_velo']) && isset($_GET['id_velo'])){
	$sql = 'select * from Reparation where id_velo = '.$_GET['id_velo'].' and urgence=-1';
	$res=$mysqli->query($sql);
	echo '<table><thead style="background-color:CadetBlue" ><tr><th colspan="2">Reparation Effectué</th></tr></thead><tbody><tr><th>Description</th><th>cout</th></tr>';
	while (NULL !== ($row = $res->fetch_array())) {

	echo '<tr><td>'.$row[1].'</td><td>'.$row[3].'</td></tr>';
}
echo '</tbody></table>';


$sql = 'select * from Reparation where id_velo = '.$_GET['id_velo'].' and urgence <> -1';
	$res=$mysqli->query($sql);
	echo '<br/><br/><table><thead style="background-color:CadetBlue"><tr><th colspan="2">Demande de réparation</th></tr></thead><tbody><tr><th>Description</th><th>Urgence</th></tr>';
	while (NULL !== ($row = $res->fetch_array())) {

	echo '<tr><td>'.$row[1].'</td><td>'.$row[2].'</tr>';
}
echo '</tbody></table>';
}
else{ echo 'id_velo est vide :( '; }

?>