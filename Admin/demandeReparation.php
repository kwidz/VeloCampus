<style>
	tr,td {
		border: solid 1px #CDCACA;
		text-align: center;
	}
</style>



<div class="panel panel-default">
	<!-- Default panel contents -->
	<div class="panel-heading">Demande Reparation (A VALIDER) </div>
	<!-- <div class="panel-body"></div>-->

	<!-- Table -->
	<table class="table">


		<?php
		include("../co.php");
		//$sql='select * from Reparation order by urgence';
		$sql ='Select Reparation.description_reparation, Reparation.id_velo, Reparation.urgence, Adherent.adresse_mail_adherent From Reparation, Location, Adherent where Reparation.id_velo = Location.id_velo and Location.id_adherent = Adherent.id_adherent GROUP BY Reparation.id_reparation';
		$res=$mysqli->query($sql);
		while (NULL !== ($row = $res->fetch_array())) {
			if($row[2] != -1){
				switch ($row[2]) {
					case 1:
					echo '<tr style="background-color:yellow"><td >'.$row[0].'</td><td><a href="#" >';
					/*$sql2='Select a.adresse_mail_adherent from Adherent a, Reparation r, Location l where r.id_velo = l.id_velo and l.id_adherent = a.id_adherent and r.id_reparation='.$row[0];

			
					$res2=$mysqli->query($sql2);
					$row = $res2->fetch_array();*/


					echo $row[3].'</a></td></tr>';
					break;
					case 2:
					echo '<tr style="background-color:orange"><td >'.$row[0].'</td><td><a href="#" >';
/*$sql2='Select a.adresse_mail_adherent from Adherent a, Reparation r, Location l where r.id_velo = l.id_velo and l.id_adherent = a.id_adherent and r.id_reparation='.$row[0];

				
					$res2=$mysqli->query($sql2);
					$row = $res2->fetch_array();*/


					echo $row[3].'</a></td></tr>';
					break;
					case 3:
					echo '<tr style="background-color:red"><td >'.$row[0].'</td><td><a href="#" >';
/*$sql2='Select a.adresse_mail_adherent from Adherent a, Reparation r, Location l where r.id_velo = l.id_velo and l.id_adherent = a.id_adherent and r.id_reparation='.$row[0];
				
					$res2=$mysqli->query($sql2);
					$row = $res2->fetch_array();*/


					echo $row[3].'</a></td></tr>';


					break;

					default:
					echo '<tr><td>'.$row[0].'</td><td><a href="#">';

/*$sql2='Select a.adresse_mail_adherent from Adherent a, Reparation r, Location l where r.id_velo = l.id_velo and l.id_adherent = a.id_adherent and r.id_reparation='.$row[0];
					
					$res2=$mysqli->query($sql2);
					$row = $res2->fetch_array();*/


					echo $row[3].'</a></td></tr>';
					break;
				}

			}

		}
		?>
	</table>
</div>
</div>
</div><!-- ce div fermé est en fait le class row de menulog ! -->


