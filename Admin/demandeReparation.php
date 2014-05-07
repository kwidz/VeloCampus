




	<div class="panel panel-default">
		<!-- Default panel contents -->
		<div class="panel-heading">Demande Reparation (A VALIDER) </div>
		<!-- <div class="panel-body"></div>-->

		<!-- Table -->
		<table class="table">
			
			
			<?php
			include("../co.php");
			$sql='select * from Reparation';
			$res=$mysqli->query($sql);
			while (NULL !== ($row = $res->fetch_array())) {
				if($row[2] != NULL){
					switch ($row[2]) {
						case 1:
							echo '<tr style="background-color:yellow"><td >'.$row[1].'</td><td>'.$row[2].'</td><td><a>Proposer Reparation</a></td></tr>';
							break;
						case 2:
							echo '<tr style="background-color:orange"><td >'.$row[1].'</td><td>'.$row[2].'</td><td><a>Proposer Reparation</a></td></tr>';
							break;
						case 3:
							echo '<tr style="background-color:red"><td >'.$row[1].'</td><td>'.$row[2].'</td><td><a>Proposer Reparation</a></td></tr>';
							break;
						
						default:
							echo '<tr><td>'.$row[1].'</td><td>'.$row[2].'</td><td><a>Proposer Reparation</a></td></tr>';
							break;
					}
					
				}
				
			}
			?>
		</table>
	</div>
</div>
</div><!-- ce div fermé est en fait le class row de menulog ! -->


