<div class="col-md-6" >
  <ul class="nav nav-pills nav-stacked">
    <li class="" style="text-align: center; margin-bottom: 15px; border:solid 1px; border-radius: 5px; border-color: #CDCACA"><a href="#" data-toggle="modal" data-target="#Ajouter">Ajouter partenaire</a></li>
    <li class="" style="text-align: center; margin-bottom: 15px; border:solid 1px; border-radius: 5px; border-color: #CDCACA"><a href="#" data-toggle="modal" data-target="#Modifier">Modifier partenaire</a></li>
    <li class="" style="text-align: center; margin-bottom: 15px; border:solid 1px; border-radius: 5px; border-color: #CDCACA"><a href="#" data-toggle="modal" data-target="#Supprimer">Supprimer partenaire</a></li>
  </ul>
</div>


<div class="modal fade" id="Ajouter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><strong>Ajouter un partenaire</strong></h4>
      </div>
      <form method="post" action="addPartenaire.php">
      	<div class="modal-body">
      		Entrez le nom du partenaire à ajouter : <br/>
        	<input type="text" class="form-control" name="nomPartenaire" id="nomPartenaire" required><br/><br/>
        	Entrez une brève description du partenaire : <br/>
        	<textarea class="form-control" name="descriptionPartenaire" id="descriptionPartenaire"></textarea><br/><br/>
        	Choisissez la photo du partenaire : <br/>
      	</div>
      	<div class="modal-footer">
      	  <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
      	  <button type="submit" class="btn btn-default">Ajouter</button>
      	</div>
      </form>
    </div>
  </div> 
</div>

<div class="modal fade" id="Modifier" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><strong>Modifier un partenaire</strong></h4>
      </div>
      <form method="post" action="modifPartenaire.php">
      	<div class="modal-body">
        	Selectionnez un partenaire à modifier :<br/>
        	<?php
				$sql = "SELECT nom_adherent, prenom_adherent FROM Adherent";
				$result = $mysqli->query($sql);
				if ($result) {
					echo "<select class='form-control' required>";
					echo "<option></option>";
					while (NULL !== ($row = $result->fetch_array())) {
						echo "<option>".$row['nom_adherent']."</option>";
					}
					echo "</select>";
				}
			?>
      	</div>
      	<div class="modal-footer">
      	  <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
      	  <button type="submit" class="btn btn-default">Modifier</button>
      	</div>
      </form>
    </div>
  </div> 
</div>

<div class="modal fade" id="Supprimer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><strong>Supprimer un partenaire</strong></h4>
      </div>
      <form method="post" action="delPartenaire.php">
      	<div class="modal-body">
        	Selectionnez un partenaire à supprimer :<br/>
        	<?php
				$sql = "SELECT nom_adherent, prenom_adherent FROM Adherent";
				$result = $mysqli->query($sql);
				if ($result) {
					echo "<select class='form-control' required>";
					echo "<option></option>";
					while (NULL !== ($row = $result->fetch_array())) {
						echo "<option>".$row['nom_adherent']."</option>";
					}
					echo "</select>";
				}
			?>
      	</div>
      	<div class="modal-footer">
      	  <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
      	  <button type="submit" class="btn btn-danger" onclick="confirm('Oui ?')">Supprimer</button>
      	</div>
      </form>
    </div>
  </div> 
</div>