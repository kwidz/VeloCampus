<?php
session_start();
/* Lorque l'on met l'urgence à -1 cela ve dire que la réparation a été faite */

include('../../co.php');
if(((!empty($_POST['id_velo']))
	&&(!empty($_POST['descr']))
	&&(!empty($_POST['prix']))
		&&((isset($_POST['id_velo']))
		&&(isset($_POST['descr']))
		&&(isset($_POST['prix']))))) {
				$sql='INSERT INTO Reparation(description_reparation,urgence, prix_reparation, id_velo)';
			$sql = $sql.'VALUES("'.$_POST['descr'].'",-1, '.$_POST['prix'].', '.$_POST['id_velo'].')';
				
				$res=$mysqli->query($sql);
				$_SESSION['reparation'] = 30;
				?><script>
					window.location='..';
				</script><?php
			}
			else{
				$_SESSION['reparation'] = -30;
				?><script>
					window.location='..';
				</script><?php
			}
?>