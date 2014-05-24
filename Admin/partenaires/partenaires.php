<div class="col-md-6" >
  <ul class="nav nav-pills nav-stacked">
    <li class="" style="text-align: center; margin-bottom: 15px; border:solid 1px; border-radius: 5px; border-color: #CDCACA"><a href="#" data-toggle="modal" data-target="#Ajouter">Ajouter un partenaire</a></li>
    <li class="" style="text-align: center; margin-bottom: 15px; border:solid 1px; border-radius: 5px; border-color: #CDCACA"><a href="#" data-toggle="modal" data-target="#Modifier">Modifier un partenaire</a></li>
    <li class="" style="text-align: center; margin-bottom: 15px; border:solid 1px; border-radius: 5px; border-color: #CDCACA"><a href="#" data-toggle="modal" data-target="#Supprimer">Supprimer un partenaire</a></li>
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
        	<input type="text" class="form-control" name="nom" id="nom" required><br/><br/>
        	Entrez une brève description du partenaire : <br/>
        	<textarea class="form-control" name="description" id="description"></textarea><br/><br/>
        	Choisissez la photo du partenaire : <br/>
        	<input class="form-control" type="file" name="photo" id="photo" required>
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
      		<script type="text/javascript" src="script.js"></script>
        	Selectionnez un partenaire à modifier :<br/>
        	<?php
				$sql = "SELECT nom_partenaire FROM Partenaire";
				$result = $mysqli->query($sql);
				if ($result) {
					echo "<select onchange='afficheForm(this.value)' class='form-control' id='nom' name='nom' required>";
					echo "<option></option>";
					while (NULL !== ($row = $result->fetch_array())) {
						echo "<option>".$row['nom_partenaire']."</option>";
					}
					echo "</select>";
				}
				else {
					echo "<select onchange='afficheForm(this.value)' class='form-control' id='nom' name='nom' required><option>test</option><option>haha</option></select>";
				}
				echo "<div id='form'> </div>";
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
				$sql = "SELECT nom_partenaire FROM Partenaire";
				$result = $mysqli->query($sql);
				if ($result) {
					echo "<select class='form-control' id='nom' name='nom' required>";
					echo "<option></option>";
					while (NULL !== ($row = $result->fetch_array())) {
						echo "<option>".$row['nom_partenaire']."</option>";
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