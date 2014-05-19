<!--cette page traite la mise en base de donnée d'un velo
-->
<?php
include('../../co.php');
//header("Content-Type: text/plain"); // Utilisation d'un header pour spécifier le type de contenu de la page. Ici, il s'agit juste de texte brut (text/plain). 
if((!empty($_POST['id_cadenas']))&&(isset($_POST['id_cadenas'])) ){

	$id=$_POST["id_cadenas"];
	
	$sql="SELECT id_cadenas from Cadenas";
	$res = $mysqli->query($sql);

	$ok = true;
	 while (NULL !== ($row = $res->fetch_array())){
              if($row["id_cadenas"] == $id) $ok=false;
            }

    if($ok){
    	$sql='INSERT INTO Cadenas (id_cadenas) VALUES("'.$id.'")';
		$res=$mysqli->query($sql);
		?><script>
		window.location='../index.php?message=ok';
		</script><?php
    }
    else{
    	?>
	<script>
	window.location='../index.php?message=errId';
	</script><?php
    }



}else{
	?>
	<script>
	window.location='../index.php?message=notok';
	</script><?php
}
?>

