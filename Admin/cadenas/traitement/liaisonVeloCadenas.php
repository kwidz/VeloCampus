<?php
include("../../co.php");

if( (!empty($_GET["action"]) && (!empty($_GET["idCadenas"]) ) && ( isset($_GET["action"]) && isset($_GET["idCadenas"]))))  {

	switch ($_GET["action"]) {
		case 'infos':
			
			$idCadenas=$_GET["idCadenas"];
			$sql="SELECT id_velo from Cadenas WHERE id_cadenas = ".$idCadenas."";
			$res=$mysqli->query($sql);
			$chaine = "";
			while (NULL !==($row = $res->fetch_array())) {
              	$chaine = $chaine." ".$row[0]." " ;
            }
            if ($chaine) {
				$chaine = '<br/>Le cadenas est sur le vélo : '.$chaine;
            	echo $chaine;
            }
            else echo "<br/>Le cadenas n'est sur aucun vélo.";

			break;
	}
}

?>