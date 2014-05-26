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
  <?php
  

  ?>
  <ul class="nav nav-pills nav-stacked">
    <li class="" style="text-align: center; margin-bottom: 15px; border:solid 1px; border-radius: 5px; border-color: #CDCACA"><a href="#" data-toggle="modal" data-target="#creerVelo" >Ajouter un vélo</a></li>
    <li class="" style="text-align: center; margin-bottom: 15px; border:solid 1px; border-radius: 5px; border-color: #CDCACA"><a href="#" data-toggle="modal" data-target="#editionVelo">Modifier un vélo</a></li>
    <li class="" style="text-align: center; margin-bottom: 15px; border:solid 1px; border-radius: 5px; border-color: #CDCACA"><a href="#" data-toggle="modal" data-target="#suppVelo">Supprimer un vélo</a></li>
    <br/>
    <li class="" style="text-align: center; margin-bottom: 15px; border:solid 1px; border-radius: 5px; border-color: #CDCACA"><a href="#" data-toggle="modal" data-target="#ajoutCadenas">Ajouter un cadenas</a></li>
    <li class="" style="text-align: center; margin-bottom: 15px; border:solid 1px; border-radius: 5px; border-color: #CDCACA"><a href="#" data-toggle="modal" data-target="#modifCadenas">Modifier un cadenas</a></li>
    <li class="" style="text-align: center; margin-bottom: 15px; border:solid 1px; border-radius: 5px; border-color: #CDCACA"><a href="#" data-toggle="modal" data-target="#suppCadenas">Supprimer un cadenas</a></li>
  </ul>
</div>





<!-- Premier Modal ajout de vélo -->
<div class="modal fade" id="creerVelo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="traitement/ajouterVelo.php" name="formAjoutVelo">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><strong>Ajout de vélo</strong></h4>
        </div>

        <div class="modal-body">

          État du vélo :
          <select class="form-control" name="etat_velo" required>
          <option></option>
            <?php
            $sql="SELECT * from Etat";
            $res=$mysqli->query($sql);
            while (NULL !== ($row = $res->fetch_array())){
              echo'<option value="'.$row["id_Etat"].'">'.$row["libelle_etat"].'';
            }
            ?>
          </select></br>

          Taille du vélo :
          <select class="form-control" name="taille_velo" required>
          <option></option>
            <?php
            $sql="SELECT * from Taille";
            $res = $mysqli->query($sql);
            while (NULL !== ($row = $res->fetch_array())) {
              echo'<option value="'.$row["id_taille"].'">'.$row["libelle_taille"].'</option>';
            }
            ?>
          </select><br>

          Type de vélo :
          <select class="form-control" name="type_velo" required>
          <option></option>
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
          <input type="submit" class="btn btn-default" name="Ajouter">
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
          <h4 class="modal-title" id="myModalLabel"><strong>Suppression de vélo</strong></h4>
        </div>
        <div class="modal-body">

          Vélo à supprimer :
          <select class="form-control" name="supp_id_velo" required>
          <option></option>
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
          <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
          <input type="submit" class="btn btn-danger" name="Supprimer">
        </div>
      </form>
    </div>
  </div> 
</div>
<!-- fin modal creer -->



<!-- Modal ajout cadenas sur vélo -->
<div class="modal fade" id="ajoutCadenas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="traitement/veloAjoutCadenas.php" name="formLiaisonCadenasVelo">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><strong>Ajouter un cadenas</strong></h4>
        </div>
        <div class="modal-body">

          Sélectionner un vélo :
           <select class="form-control" name="id_velo" onchange="afficheCadenas(this.value)" required>
           <option></option>
            <?php
            $sql="SELECT id_velo FROM Velo";
            $res=$mysqli->query($sql);
            while (NULL !==($row = $res->fetch_array())) {
              echo '<option value="'.$row["id_velo"].'">'.$row["id_velo"].'</option>';
            }
            ?>
          </select>
          <div id="cadenas"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
          <input type="submit" class="btn btn-default" name="Ajouter">
        </div>
      </form>
    </div>
  </div> 
</div>


<!-- Modal modifs cadenas sur vélo -->
<div class="modal fade" id="modifCadenas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="traitement/veloModifCadenas.php" name="formLiaisonCadenasVelo">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><strong>Modifier un cadenas</strong></h4>
        </div>
        <div class="modal-body">

          Sélectionner un cadenas :
           <select class="form-control" name="id_cadenas" onchange="afficheVelo(this.value,'modcadenas')" required>
           <option></option>
            <?php
            $sql="SELECT id_cadenas FROM Cadenas";
            $res=$mysqli->query($sql);
            while (NULL !==($row = $res->fetch_array())) {
              echo '<option value="'.$row["id_cadenas"].'">'.$row["id_cadenas"].'</option>';
            }
            ?>
          </select>
          <div id="modcadenas"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
          <input type="submit" class="btn btn-default" name="Ajouter">
        </div>
      </form>
    </div>
  </div> 
</div>


<!-- Modal suppression cadenas sur vélo -->
<div class="modal fade" id="suppCadenas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="traitement/veloSuppCadenas.php" name="formLiaisonCadenasVelo">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><strong>Supprimer un cadenas</strong></h4>
        </div>
        <div class="modal-body">

          Sélectionner un cadenas :
           <select class="form-control" name="id_cadenas" onchange="afficheVelo(this.value,'suppcadenas')" required>
           <option></option>
            <?php
            $sql="SELECT id_cadenas FROM Cadenas";
            $res=$mysqli->query($sql);
            while (NULL !==($row = $res->fetch_array())) {
              echo '<option value="'.$row["id_cadenas"].'">'.$row["id_cadenas"].'</option>';
            }
            ?>
          </select>
          <div id="suppcadenas"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
          <input type="submit" class="btn btn-danger" name="Supprimer">
        </div>
      </form>
    </div>
  </div> 
</div>


<!-- Second Modal modifier Velo -->
<div class="modal fade" id="editionVelo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="traitement/modifierVelo.php" name="formSuppVelo">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><strong>Modification de vélo</strong></h4>
        </div>
        <div class="modal-body">

          Vélo à modifier :
          <select class="form-control" name="id_velo" required>
          <option></option>
            <?php
            $sql="SELECT * from Velo";
            $res=$mysqli->query($sql);
            while (NULL !==($row = $res->fetch_array())) {
              echo '<option value="'.$row["id_velo"].'">'.$row["id_velo"].'</option>';
            }
            ?>
          </select><br/>
          État du vélo :
          <select class="form-control" name="etat_velo" required>
          <option></option>
            <?php
            $sql="SELECT * from Etat";
            $res=$mysqli->query($sql);
            while (NULL !== ($row = $res->fetch_array())){
              echo'<option value="'.$row["id_Etat"].'">'.$row["libelle_etat"].'';
            }
            ?>
          </select><br/>

          Taille du vélo :
          <select class="form-control" name="taille_velo" required>
          <option></option>
            <?php
            $sql="SELECT * from Taille";
            $res = $mysqli->query($sql);
            while (NULL !== ($row = $res->fetch_array())) {
              echo'<option value="'.$row["id_taille"].'">'.$row["libelle_taille"].'</option>';
            }
            ?>
          </select><br/>

          Type de vélo :
          <select class="form-control" name="type_velo" required>
          <option></option>
            <?php
            $sql="SELECT * from _Type";
            $res = $mysqli->query($sql);
            while (NULL !== ($row = $res->fetch_array())) {
              echo '<option value="'.$row["id_type"].'">'.$row["libelle_type"].'</option>';
            }?>
          </select>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
          <input type="submit" class="btn btn-default" name="Modifier">
        </div>
      </form>
    </div>
  </div> 
</div>
<!-- fin modal modifier -->