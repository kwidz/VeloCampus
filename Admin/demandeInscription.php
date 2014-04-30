<div class="col-md-3" >
	<div class="panel panel-default">
		<!-- Default panel contents -->
		<div class="panel-heading">Demande d'inscription (A VALIDER) </div>
		<!-- <div class="panel-body"></div>-->

		<!-- Table -->
		<table class="table">
			<!-- <tr><td>nom</td><td>prenom</td><td><a href="#">Plus d'infos</a></td><td><div class="glyphicon glyphicon-ok"></div></td><td><div class="glyphicon glyphicon-remove"></div></td></tr> -->
			<?php
			include("../co.php");
			$sql="Select a.id_adherent, a.nom_adherent, a.prenom_adherent "
				. "From Adherent a "
				. "Where a.id_adherent not in(Select id_adherent from Cotisation) ";
			$res=$mysqli->query($sql);
			while (NULL !== ($row = $res->fetch_array())) {
				echo '<tr><td>'.$row[1].'</td><td>'.$row[2].'</td><td><a href="#">Plus d\'infos</a></td><td><a href="../traitement/demandeInscriptionVal.php?id='.$row[0].'"class="glyphicon glyphicon-ok"></a></td><td><a href="../traitement/demandeInscriptionSupr.php?id='.$row[0].'"class="glyphicon glyphicon-remove"></a></td></tr>';
			}
			?>
		</table>
	</div>
</div>
</div><!-- ce div fermé est en fait le class row de menulog ! -->