<div class="col-md-6" >
  <ul class="nav nav-pills nav-stacked">
    <li class="" style="text-align: center; margin-bottom: 15px; border:solid 1px; border-radius: 5px; border-color: #CDCACA"><a href="#" data-toggle="modal" data-target="#Ajouter">Ajouter un Membre</a></li>
    <li class="" style="text-align: center; margin-bottom: 15px; border:solid 1px; border-radius: 5px; border-color: #CDCACA"><a href="#" data-toggle="modal" data-target="#Modifier">Modifier un membre</a></li>
    <li class="" style="text-align: center; margin-bottom: 15px; border:solid 1px; border-radius: 5px; border-color: #CDCACA"><a href="#" data-toggle="modal" data-target="#Supprimer">Supprimer un membre</a></li>
  </ul>
</div>


<div class="modal fade" id="Ajouter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><strong>Ajouter un membre de l'association</strong></h4>
      </div>
      <form method="post" action="addMembre.php" enctype="multipart/form-data">
      	<div class="modal-body">
      		Entrez les noms, prénoms, et/ou pseudo du membre à ajouter : <br/>
        	<input type="text" class="form-control" name="nom" id="nom" required><br/><br/>
        	Entrez une brève biographie du membre : <br/>
        	<textarea class="form-control" name="description" id="description" required></textarea><br/><br/>
          Entrez le statut du membre à ajouter : <br/>
          <input type="text" class="form-control" name="fonction" id="fonction" required><br/><br/>
        	Choisissez la photo du membre : <br/>
        	<input type="file" name="icone" id="icone" required/>
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
        <h4 class="modal-title" id="myModalLabel"><strong>Modifier un membre</strong></h4>
      </div>
      <form method="post" action="modifMembres.php " enctype="multipart/form-data">
      	<div class="modal-body">
      		<script type="text/javascript" src="script.js"></script>
        	Selectionnez un membre à modifier :<br/>
        	<?php
				$sql = "SELECT * FROM Membres";
				$result = $mysqli->query($sql);
				if ($result) {
					echo "<select onchange='afficheForm(this.value)' class='form-control' id='id' name='id' required>";
					echo "<option> </option>";
					while (NULL !== ($row = $result->fetch_array())) {
						echo "<option value='".$row['id_Membre']."'>".$row['nom_membre']."</option>";
					}
					echo "</select>";
				}
				else {
					echo "<select onchange='afficheForm(this.value)' class='form-control' id='nom' name='nom' required><option>test</option><option>haha</option></select>";
				}
				echo "<div id='form12'> </div>";
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
        <h4 class="modal-title" id="myModalLabel"><strong>Supprimer un membre</strong></h4>
      </div>
      <form method="post" action="delMembres.php">
      	<div class="modal-body">
        	Selectionnez un membre à supprimer :<br/>
        	<?php
				$sql = "SELECT id_Membre, nom_membre FROM Membres";
				$result = $mysqli->query($sql);
				if ($result) {
					echo "<select class='form-control' id='nom' name='nom' required>";
					echo "<option></option>";
					while (NULL !== ($row = $result->fetch_array())) {
						echo "<option value='".$row['id_Membre']."'>".$row['nom_membre']."</option>";
					}
					echo "</select>";
				}
				else {
					echo "<select class='form-control' id='nom' name='nom' required><option>test</option></select>";
				}
			?>
      	</div>
      	<div class="modal-footer">
      	  <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
      	  <button type="submit" class="btn btn-danger">Supprimer</button>
      	</div>
      </form>
    </div>
  </div> 
</div>