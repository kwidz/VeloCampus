<?php
include('../../co.php');
if(((!empty($_POST['id_location']))
		&&(!empty($_POST['date'])))
			&&((isset($_POST['id_location']))
			&&(isset($_POST['date'])))) {
				$sql="UPDATE `velo`.`Location` "
					."SET `date_retour_location` = '".$_POST['date']
					."' WHERE `Location`.`id_location` =".$_POST['id_location']."";
				$etat=$_POST['id_etat'];
				$res=$mysqli->query($sql);
				$velo123="SELECT id_velo from Location where id_location= ".$_POST['id_location']."";
				$res=$mysqli->query($velo123);
				$row=$res->fetch_array();
				$velo123=$row[0];
				$sql2="UPDATE `velo`.`Velo` SET `id_Etat` = $etat WHERE `Velo`.`id_velo` = $velo123";
				$res=$mysqli->query($sql2);
				?><script>
					window.location='../index.php?message=ok';
				</script><?php
			}
			else{
				?><script>
					window.location='../index.php?message=notok';
				</script><?php
			}