<?php
include("../../co.php");

if( (!empty($_GET["action"]) && (!empty($_GET["idVelo"]) ) && ( isset($_GET["action"]) && isset($_GET["idVelo"]))))  {

	switch ($_GET["action"]) {
		case 'infos':
			
			$idVelo=$_GET["idVelo"];
			$sql="SELECT id_cadenas from Cadenas WHERE id_velo = ".$idVelo."";
			$res=$mysqli->query($sql);
			$chaine = "";
			while (NULL !==($row = $res->fetch_array())) {
              	$chaine = $chaine." ".$row[0]." " ;
            }
            if ($chaine) {
				$chaine = '<br/>Le vélo possède déjà les cadenas suivant : '.$chaine;
            	echo $chaine;
            }
            else echo "<br/>Le vélo ne possède encore aucun cadenas.";

			break;
	}
}

?>