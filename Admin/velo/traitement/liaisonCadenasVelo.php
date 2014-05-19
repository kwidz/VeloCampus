<?php
include("../../co.php");

if( (!empty($_GET["action"]) && (!empty($_GET["idVelo"]) ) && ( isset($_GET["action"]) && isset($_GET["idVelo"]))))  {

	switch ($_GET["action"]) {
		case 'infos':
			
			$idVelo=$_GET["idVelo"];
			$chaine = 'Le velo possede deja les cadenas avec l id suivant : ';

			$sql="SELECT id_cadenas from Cadenas WHERE id_velo = ".$idVelo."";

			$res=$mysqli->query($sql);

			while (NULL !==($row = $res->fetch_array())) {
              	$chaine = $chaine." ".$row[0]." " ;
            }

            echo $chaine;

			break;
		
		default:
			# code...
			break;
	}
}

?>