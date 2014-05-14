<!-- page pour supprimer un velo dans la bdd -->
<?php
	include('../../co.php');
	if(isset($_POST["Velo_to_supp"]) && !empty($_POST["Velo_to_supp"])){
		$idVelo = $_POST["Velo_to_supp"];

		$sql = 'DELETE * FROM velo where id_velo ="'.$idVelo.'"';
		$res=$mysqli->query($sql);	

	?><script>
			window.location='../index.php?message=ok';
		</script><?php


	}
	else{
		?><script>
			window.location='../index.php?message=notok';
		</script><?php
	}

?>