<!--cette page traite la mise en base de donnée d'une location
-->

<?php
include('../../co.php');
if(((!empty($_POST['id_adherent']))
	&&(!empty($_POST['id_velo']))
	&&(!empty($_POST['prix']))
	&&(!empty($_POST['date'])))
			&&((isset($_POST['id_adherent']))
			&&(isset($_POST['id_velo']))
			&&(isset($_POST['prix']))
			&&(isset($_POST['date'])))) {
				$sql="INSERT INTO Location(prix_Location, date_location, id_velo, id_adherent)"
				. " VALUES('{$_POST['prix']}', '{$_POST['date']}', '{$_POST['id_velo']}', '{$_POST['id_adherent']}')";
				
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
