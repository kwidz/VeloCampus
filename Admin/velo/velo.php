<!-- Page de création de locations de velo Le premier div correspond au menu 
tous les autres div sont commentés
chaque action s'effectera dans un Modal pour eviter les lourds changement de page 
pour l'utilisateur  -->
<script type="text/javascript" src="script.js"></script>
<script type="text/javascript" src="ajax.js"></script>
<style>
th{
  border:solid 1px #CDCACA;
  text-align:center;
}
</style>
<div class="col-md-6" >
  <?php
  

  if(isset($_GET['message'])
    && (!empty($_GET['message']))){
    if ($_GET['message']=="ok"){
      echo"<div class='alert alert-success'><center><strong>L'opération s'est déroulé avec succès !</center></strong></div>";
    }
    else if ($_GET['message']=="errId") {
      echo"<div class='alert alert-danger'><center><strong>L'Identifiant souhaité est déjà utilisé veuillez en choisir un autre</center></strong></div>";
    } else {
      echo"<div class='alert alert-danger'><center><strong>Une erreur inconue à été détectée ! </center></strong></div>";
    }

  }
  ?>
  <ul class="nav nav-pills nav-stacked">
    <li class="" style="text-align: center; margin-bottom: 15px; border:solid 1px; border-radius: 5px; border-color: #CDCACA"><a href="#" data-toggle="modal" data-target="#creerVelo" >Ajouter un velo</a></li>
    <li class="" style="text-align: center; margin-bottom: 15px; border:solid 1px; border-radius: 5px; border-color: #CDCACA"><a href="#" data-toggle="modal" data-target="#suppVelo">Supprimer un Velo</a></li>
    <li class="" style="text-align: center; margin-bottom: 15px; border:solid 1px; border-radius: 5px; border-color: #CDCACA"><a href="#" data-toggle="modal" data-target="#editionVelo">Edition d'un velo</a></li>
     <li class="" style="text-align: center; margin-bottom: 15px; border:solid 1px; border-radius: 5px; border-color: #CDCACA"><a href="#" data-toggle="modal" data-target="#ajoutCadenas">ajouter un cadenas</a></li>
  </ul>
</div>





<!-- Premier Modal creation de location -->
<div class="modal fade" id="creerVelo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="traitement/ajouterVelo.php" name="formAjoutVelo">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><strong>Ajout de Velo</strong></h4>
        </div>

        <div class="modal-body">

          Identifiant du velo :
          <input type="text" name="id_velo" required><br><br>

          Etat du velo :
          <select class="form-control" name="etat_velo" required>
            <?php
            $sql="SELECT * from Etat";
            $res=$mysqli->query($sql);
            while (NULL !== ($row = $res->fetch_array())){
              echo'<option value="'.$row["id_Etat"].'">'.$row["libelle_etat"].'';
            }
            ?>
          </select></br>

          Taille du velo :
          <select class="form-control" name="taille_velo" required>
            <?php
            $sql="SELECT * from Taille";
            $res = $mysqli->query($sql);
            while (NULL !== ($row = $res->fetch_array())) {
              echo'<option value="'.$row["id_taille"].'">'.$row["libelle_taille"].'</option>';
            }
            ?>
          </select><br>

          Type de velo :
          <select class="form-control" name="type_velo" required>
            <?php
            $sql="SELECT * from _Type";
            $res = $mysqli->query($sql);
            while (NULL !== ($row = $res->fetch_array())) {
              echo '<option value="'.$row["id_type"].'">'.$row["libelle_type"].'</option>';
            }
            ?>
          </select><br> 

        </div>


        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
          <input type="submit" class="btn btn-default" name="creer la Location">
        </div>
      </form>
    </div>
  </div> 
</div>
<!-- fin modal creer -->



<!-- Second Modal Supprimer Velo -->
<div class="modal fade" id="suppVelo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="traitement/suppVelo.php" name="formSuppVelo">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><strong>Création de Location</strong></h4>
        </div>
        <div class="modal-body">

          Velo a supprimer :
          <select class="form-control" name="supp_id_velo" required>
            <?php
            $sql="SELECT * from Velo";
            $res=$mysqli->query($sql);
            while (NULL !==($row = $res->fetch_array())) {
              echo '<option value="'.$row["id_velo"].'">'.$row["id_velo"].'</option>';
            }
            ?>
          </select>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
          <input type="submit" class="btn btn-default"name="creer la Location">
        </div>
      </form>
    </div>
  </div> 
</div>
<!-- fin modal creer -->




<div class="modal fade" id="ajoutCadenas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="traitement/veloAjoutCadenas.php" name="formLiaisonCadenasVelo">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><strong>Ajouter un cadenas</strong></h4>
        </div>
        <div class="modal-body">

          selectionner un velo :
           <select class="form-control" name="supp_id_velo" onchange="testbibiphoque(this.value)" required>
            <?php
            $sql="SELECT * from Velo";
            $res=$mysqli->query($sql);
            while (NULL !==($row = $res->fetch_array())) {
              echo '<option value="'.$row["id_velo"].'">'.$row["id_velo"].'</option>';
            }
            ?>
          </select>
          
          <div id="test"></div>


        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
          <input type="submit" class="btn btn-default"name="creer la Location">
        </div>
      </form>
    </div>
  </div> 
</div>

<!-- Second Modal modifier Velo -->
<div class="modal fade" id="editionVelo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="traitement/suppVelo.php" name="formSuppVelo">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><strong>Création de Location</strong></h4>
        </div>
        <div class="modal-body">

          Velo à modifier :
          <select class="form-control" name="supp_id_velo" onchange="modifierVelo(this.value)" required>
            <?php
            $sql="SELECT * from Velo";
            $res=$mysqli->query($sql);
            while (NULL !==($row = $res->fetch_array())) {
              echo '<option value="'.$row["id_velo"].'">'.$row["id_velo"].'</option>';
            }
            ?>
          </select>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
          <input type="submit" class="btn btn-default"name="creer la Location">
        </div>
      </form>
    </div>
  </div> 
</div>
<!-- fin modal modifier -->