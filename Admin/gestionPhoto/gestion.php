<div class="col-md-6" >
<ul class="nav nav-pills nav-stacked">
    <li class="" style="text-align: center; margin-bottom: 15px; border:solid 1px; border-radius: 5px; border-color: #CDCACA"><a href="ajouter.php">Ajouter des photos</a></li>
    <li class="" style="text-align: center; margin-bottom: 15px; border:solid 1px; border-radius: 5px; border-color: #CDCACA"><a href="supprimer.php">Supprimer des photos</a></li>
    <br/>
    <li class="" style="text-align: center; margin-bottom: 15px; border:solid 1px; border-radius: 5px; border-color: #CDCACA"><a href="#" data-toggle="modal" data-target="#add">Ajouter une vidéo</a></li>
    <li class="" style="text-align: center; margin-bottom: 15px; border:solid 1px; border-radius: 5px; border-color: #CDCACA"><a href="#" data-toggle="modal" data-target="#del">Supprimer une vidéo</a></li>
</ul>
</div>

<?php include("../co.php") ?>

<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><strong>Ajouter une vidéo</strong></h4>
      </div>
      <form method="post" action="addVid.php">
      	<div class="modal-body">
        	Titre de la vidéo : <br/>
        	<input type="text" class="form-control" id="titre" name="titre" required><br/><br/>
        	Lien de la vidéo : <br/>
        	<input type="text" class="form-control" id="lien" name="lien" required>
      	</div>
      	<div class="modal-footer">
      	  <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
      	  <button type="submit" class="btn" >Ajouter</button>
      	</div>
      </form>
    </div>
  </div> 
</div>

<div class="modal fade" id="del" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><strong>Supprimer une vidéo</strong></h4>
      </div>
      <form method="post" action="delVid.php">
      	<div class="modal-body">
        	Selectionner une vidéo à supprimer :<br/><br/>
        	<select class="form-control" id="video" name="video" required>
        		<option></option>
        		<?php 
        			$sql = "SELECT titre_video FROM Video";
        			$res = $mysqli->query($sql);
        			while (NULL !== ($row = $res->fetch_array())) {
                echo "<option>".$row['titre_video']."</option>";
              }
        		?>
        	</select>
      	</div>
      	<div class="modal-footer">
      	  <button type="button" class="btn" data-dismiss="modal">Annuler</button>
      	  <button type="submit" class="btn btn-danger">Supprimer</button>
      	</div>
      </form>
    </div>
  </div> 
</div>