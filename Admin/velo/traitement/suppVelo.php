<!--cette page traite la suppression de la base de donnée d'un velo
-->
<?php
include('../../co.php');
if((!empty($_POST["supp_id_velo"])) && ((isset($_POST["supp_id_velo"])))){
	//$id = $_POST["supp_id_velo"];
	$sql='delete from Velo where id_velo = '.$_POST["supp_id_velo"];
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