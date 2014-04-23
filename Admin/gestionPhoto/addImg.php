<?php
	if (isset($_POST["title"])&& $_POST["title"]!==""){
		createDirectory($_POST["title"]);
	}
?>

<div class="col-md-6" >
    <ul class="nav nav-pills nav-stacked">
      <li class="active" style="text-align: center; margin-bottom: 15px;"><a href="#" data-toggle="modal" data-target="#modalAjouter">Ajouter un album</a></li>
      <li class="active" style="text-align: center; margin-bottom: 15px;"><a >Ajouter une photo</a></li>
    </ul>
</div>

<div class="modal fade" id="modalAjouter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><strong>Création d'album</strong></h4>
      </div>
      <div class="modal-body">
        <form method="POST" action="ajouter.php">
        	Titre de l'album : <input type="text" id="title" name="title">

      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
      	<input type="submit" class="btn btn-default"name="creer l'album">
      </form>
        
       
      </div>
    </div>
  </div> 
</div>

<?php
function createDirectory($directory){
	mkdir("../../images/photos/".$directory, "0777");
}
?>