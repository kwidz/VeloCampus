




<div class="panel panel-default">
	<!-- Default panel contents -->
	<div class="panel-heading">Demande Reparation (A VALIDER) </div>
	<!-- <div class="panel-body"></div>-->

	<!-- Table -->
	<table class="table">
		
		
		<?php
		include("../co.php");
		$sql='select * from Reparation order by urgence';
		
		$res=$mysqli->query($sql);
		while (NULL !== ($row = $res->fetch_array())) {
			if($row[2] != -1){
				switch ($row[2]) {
					case 1:
					echo '<tr style="background-color:yellow"><td >'.$row[1].'</td><td>'.$row[2].'</td><td><a href="#" >';

					$sql2='select adresse_mail_adherent from Adherent, Velo, Reparation  where Adherent.id_location = Velo.id_location and Velo.id_velo=Reparation.id_velo and Reparation.id_reparation='.$row[0];
					$res2=$mysqli->query($sql2);
					$row = $res2->fetch_array();


					echo $row[0].'</a></td></tr>';
					break;
					case 2:
					echo '<tr style="background-color:orange"><td >'.$row[1].'</td><td>'.$row[2].'</td><td><a href="#" >';


					$sql2='select adresse_mail_adherent from Adherent, Velo, Reparation  where Adherent.id_location = Velo.id_location and Velo.id_velo=Reparation.id_velo and Reparation.id_reparation='.$row[0];
					$res2=$mysqli->query($sql2);
					$row = $res2->fetch_array();


					echo $row[0].'</a></td></tr>';
					break;
					case 3:
					echo '<tr style="background-color:red"><td >'.$row[1].'</td><td>'.$row[2].'</td><td><a href="#" >';

					$sql2='select adresse_mail_adherent from Adherent, Velo, Reparation  where Adherent.id_location = Velo.id_location and Velo.id_velo=Reparation.id_velo and Reparation.id_reparation='.$row[0];
					$res2=$mysqli->query($sql2);
					$row = $res2->fetch_array();


					echo $row[0].'</a></td></tr>';


					break;
					
					default:
					echo '<tr><td>'.$row[1].'</td><td>'.$row[2].'</td><td><a href="#">';


					$sql2='select adresse_mail_adherent from Adherent, Velo, Reparation  where Adherent.id_location = Velo.id_location and Velo.id_velo=Reparation.id_velo and Reparation.id_reparation='.$row[0];
					$res2=$mysqli->query($sql2);
					$row = $res2->fetch_array();


					echo $row[0].'</a></td></tr>';
					break;
				}
				
			}
			
		}
		?>
	</table>
</div>
</div>
</div><!-- ce div fermé est en fait le class row de menulog ! -->


