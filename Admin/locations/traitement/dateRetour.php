<?php
include('../../co.php');
if(((!empty($_POST['id_location']))
		&&(!empty($_POST['date'])))
			&&((isset($_POST['id_location']))
			&&(isset($_POST['date'])))) {
				$sql="UPDATE `velo`.`Location` "
					."SET `date_retour_location` = '".$_POST['date']
					."' WHERE `Location`.`id_location` =".$_POST['id_location']."";
				
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