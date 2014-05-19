<!--cette page traite la suppression de la base de donnée d'un velo
-->
<?php
include('../../co.php');
if((!empty($_POST["blop"])) && ((isset($_POST["blop"])))){
	
	$sql='delete from Cadenas where id_cadenas = '.$_POST["blop"];
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