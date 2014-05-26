<?php
session_start();
include('../../co.php');
if((!empty($_GET['id'])) &&(isset($_GET['id']))) {
				$sql='delete from Reparation where id_reparation = '.$_GET['id'];
			
				
				$res=$mysqli->query($sql);
				$_SESSION['supreparation'] = 25;
				?><script>
					window.location='..';
				</script><?php
			}
			else{
				$_SESSION['supreparation'] = -25;
				?><script>
					window.location='..';
				</script><?php
			}
?>