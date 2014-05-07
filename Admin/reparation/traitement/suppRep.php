<?php
include('../../co.php');
if((!empty($_GET['id'])) &&(isset($_GET['id']))) {
				$sql='delete from Reparation where id_reparation = '.$_GET['id'];
			
				
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