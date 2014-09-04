<!-- Page de création de locations de velo Le premier div correspond au menu 
tous les autres div sont commentés
chaque action s'effectera dans un Modal pour eviter les lourds changement de page 
pour l'utilisateur  -->
<script type="text/javascript" src="ajax.js"></script>
<style>
th{
  border:solid 1px #CDCACA;
  text-align:center;
}
</style>
<div class="col-md-6" >
  <ul class="nav nav-pills nav-stacked">
    <li class="" style="text-align: center; margin-bottom: 15px; border:solid 1px; border-radius: 5px; border-color: #CDCACA"><a href="#" data-toggle="modal" data-target="#addMod" >Ajouter un modèle de vélo</a></li>
    <li class="" style="text-align: center; margin-bottom: 15px; border:solid 1px; border-radius: 5px; border-color: #CDCACA"><a href="#" data-toggle="modal" data-target="#modMod">Modifier un modèle de vélo</a></li>
    <li class="" style="text-align: center; margin-bottom: 15px; border:solid 1px; border-radius: 5px; border-color: #CDCACA"><a href="#" data-toggle="modal" data-target="#suppMod">Supprimer un modèle de vélo</a></li>
    <br/>
    </ul>
</div>


<!-- Premier Modal ajout d'un modèle -->
<div class="modal fade" id="addMod" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="traitement/ajouterMod.php" name="formAjoutMod" enctype="multipart/form-data">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><strong>Ajout d'un modèle de vélo </strong></h4>
        </div>

        <div class="modal-body">

         Entrez le libellé du modèle : <br/>
         <input type="text" class="form-control" id="inputLibelle" placeholder="Ex : VTT" name="inputLibelle" required/><br/>

         Entrez la description du modèle : <br/>
         <input type="text" class="form-control" id="inputDesc" placeholder="Ex : Vélo de balade, léger..." name="inputDesc" required/><br/>

         Entrez les caractéristiques techniques du modèle : <br/>
         <input type="text" class="form-control" id="inputCar" placeholder="Taille, type selle, dynamo..." name="inputCar" required/><br/>

         Choisissez une photo pour illustrer le vélo : <br/>
         <input type="file" name="imageVelo" id="imageVelo"/>

        </div>


        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
          <input type="submit" class="btn btn-default" name="Ajouter">
        </div>
      </form>
    </div>
  </div> 
</div>
<!-- fin modal creer -->



<!-- Second Modal Supprimer Modèle -->
<div class="modal fade" id="suppMod" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="traitement/suppMod.php" name="formSuppVelo">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><strong>Suppression de modèle</strong></h4>
        </div>
        <div class="modal-body">

          Modèle à supprimer :
          <select class="form-control" name="supp_mod" required>
          <option></option>
            <?php
            $sql="SELECT * from _Type";
            $res=$mysqli->query($sql);
            while (NULL !==($row = $res->fetch_array())) {
              echo '<option value="'.$row["id_type"].'">'.$row["libelle_type"].'</option>';
            }
            ?>
          </select>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
          <input type="submit" class="btn btn-danger" name="Supprimer">
        </div>
      </form>
    </div>
  </div> 
</div>


<!-- Modal Modifier Modèle -->
<div class="modal fade" id="modMod" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="traitement/traitementModifier.php" name="formSuppVelo">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><strong>Modification de modèle</strong></h4>
        </div>
        <div class="modal-body">

          Modèle à modifier :
          <select class="form-control" name="idType" onChange="afficheDescModele(this.value)" required>
          <option></option>
            <?php
            $sql="SELECT * from _Type";
            $res=$mysqli->query($sql);
            while (NULL !==($row = $res->fetch_array())) {
              echo '<option value="'.$row["id_type"].'">'.$row["libelle_type"].'</option>';
            }
            ?>
          </select>
          <div id="formulaire"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
          <input type="submit" class="btn btn-default" name="Modifier">
        </div>
      </form>
    </div>
  </div> 
</div>
