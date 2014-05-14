<script>function modal(id){
	$('#modalAffiche').modal({
    keyboard: true
    })
    xmlhttp=new XMLHttpRequest();
	
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200)  //si on est bien a letape 4
			
			document.getElementById('div').innerHTML= xmlhttp.responseText; //balise select dans le html
			



	}
	xmlhttp.open("GET","../traitement/descr.php?id="+id,true);
	xmlhttp.send();
}</script>



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
				echo '<tr><td style="background-color:LightBlue"><b>'.$row[1].'</b></td><td>'.$row[2].'</td><td><a onclick="modal('.$row[0].')" href="#">Plus d\'infos</a></td><td><a href="../traitement/demandeInscriptionVal.php?id='.$row[0].'"class="glyphicon glyphicon-ok"></a></td><td><a href="../traitement/demandeInscriptionSupr.php?id='.$row[0].'"class="glyphicon glyphicon-remove"></a></td></tr>';
			}
			?>
		</table>
	</div>

<!--</div> ce div fermé est en fait le class row de menulog ! -->

<!-- modal affichant les details sur l'adhérent selectionné grace à la fonction modal du dessus -->
<div class="modal fade" id="modalAffiche" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><strong>Plus infos</strong></h4>
      </div>
      <form method="post" action="../#">
        <div class="modal-body" id="div">
     
         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
         
        </div>
      </form>
    </div>
  </div> 
</div>

<?php include("demandeReparation.php"); ?>