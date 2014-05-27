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
    <li class="" style="text-align: center; margin-bottom: 15px; border:solid 1px; border-radius: 5px; border-color: #CDCACA"><a href="#" data-toggle="modal" data-target="#creerVelo" >Ajouter un vélo</a></li>
    <li class="" style="text-align: center; margin-bottom: 15px; border:solid 1px; border-radius: 5px; border-color: #CDCACA"><a href="#" data-toggle="modal" data-target="#editionVelo">Modifier un vélo</a></li>
    <li class="" style="text-align: center; margin-bottom: 15px; border:solid 1px; border-radius: 5px; border-color: #CDCACA"><a href="#" data-toggle="modal" data-target="#suppVelo">Supprimer un vélo</a></li>
    <li class="" style="text-align: center; margin-bottom: 15px; border:solid 1px; border-radius: 5px; border-color: #CDCACA"><a href="#" data-toggle="modal" data-target="#veloAffichage">Afficher tous les vélos</a></li>
    <br/>
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
          ID du vélo :
          <input type="text" class="form-control" name="id_velo" onkeyup="verifid(this.value)" required>
          <div id="confirmid" name="confirmid"></div><br/>

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

<div class="modal fade" id="veloAffichage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"  >
  <div class="modal-dialog" style="width:1000px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><strong> Vélos </strong></h4>
      </div>
      <div class="modal-body">
        <center>
          <table class="bordered-table"style="border:solid 1px #CDCACA; border-radius:50px">
            <thead>
              <tr>
                <th>Numéro du vélo</th>
                <th>Type du vélo</th>
                <th>Taille du vélo</th>
                <th>Cadenas associés</th>
              </tr>
            </thead>
            <tbody>
            <?php

              $sql="SELECT v.id_velo, c.id_cadenas, ty.libelle_type, t.libelle_taille "
              ."from Velo v, Cadenas c, Taille t, _Type ty "
              .""
              ."where c.id_velo=v.id_velo "
              ."and v.id_type=ty.id_type "
              ."and v.id_taille=t.id_taille "
              ."order by(id_velo) ";
                $res=$mysqli->query($sql);
                $number=0;
                while (NULL !== ($row = $res->fetch_array())) {
                  if($number==$row[0]){
                    echo ", ".$row[1];
                  }
                  else if ($number==0){
                    $number=$row[0];
                      echo "<th>".$row[0]."</th>";
                      echo "<th>".$row[2]."</th>";
                      echo "<th>".$row[3]."</th>";
                      echo "<th>".$row[1];

                  }
                  else{
                    $number=$row[0];
                    echo "</th>";
                    echo "</tr>";
                    echo "<th>".$row[0]."</th>";
                    echo "<th>".$row[2]."</th>";
                    echo "<th>".$row[3]."</th>";
                    echo "<th>".$row[1];
                  }
                  
                  

                }

        ?>
      </tbody>
          </table>
        </center>
       
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        


      </div>
    </div>
  </div> 
</div>
