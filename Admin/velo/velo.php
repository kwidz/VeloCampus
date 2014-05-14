<!-- Page de création de velo Le premier div correspond au menu 
tous les autres div sont commentés
chaque action s'effectera dans un Modal pour eviter les lourds changement de page 
pour l'utilisateur  -->
<script type="text/javascript" src="script.js"></script>
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
    else{
      echo"<div class='alert alert-danger'><center><strong>Une erreur inconue à été détectée ! </center></strong></div>";
    }

  }
  ?>
  <ul class="nav nav-pills nav-stacked">
    <li class="" style="text-align: center; margin-bottom: 15px; border:solid 1px; border-radius: 5px; border-color: #CDCACA"><a href="#" data-toggle="modal" data-target="#creerVelo" >Ajouter un velo</a></li>
    <li class="" style="text-align: center; margin-bottom: 15px; border:solid 1px; border-radius: 5px; border-color: #CDCACA"><a href="#" data-toggle="modal" data-target="#suppVelo">Supprimer un velo</a></li>
    <li class="" style="text-align: center; margin-bottom: 15px; border:solid 1px; border-radius: 5px; border-color: #CDCACA"><a href="#" data-toggle="modal" data-target="#editVelo">Editer un velo</a></li
  </ul>
</div>
<!-- Premier Modal Ajout d'un velo -->
<div class="modal fade" id="creerVelo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><strong>Ajout d'un Velo</strong></h4>
      </div>
      <div class="modal-body">
        <?php

        ?>
        <form method="POST" action="traitement/ajouterVelo.php" name="form3">
        
        Etat du velo :
        <select class="form-control" name="taille_velo" required>

         	<?php
         		$sql="SELECT * from etat order by id_Etat";
         		$res=$mysqli->query($res2);
         		while(NULL != ($row = $res->fetch_array())){
         			echo'<option value="'.$row["id_Etat"].'">'.$row["libelle_Etat"].'</option>';
         		}
         	?>

         </select><br>

        
         
         Taille du velo :
         <select class="form-control" name="taille_velo" required>

         	<?php
         		$sql2="SELECT * from taille order by id_taille";
         		$res2=$mysqli->query($res2);
         		while(NULL != ($row2 = $res2->fetch_array())){
         			echo'<option value="'.$row2["id_taille"].'">'.$row2["libelle_taille"].'</option>';
         		}
         	?>

         </select><br>

         Type du velo :
        <select class="form-control" name="type_velo" required>

        	<?php
        		$sql3="SELECT * from _type order by id_type";
        		$res3=$mysqli->query($sql3);
        		while (NULL !=($row3 = $res3->fetch_array())) {
        			echo '<option value="'.$row3["id_type"].'">'.$row3["libelle_type"].'</option>';
        		}
        	?>
        </select><br>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
          <input type="submit" class="btn btn-default"name="creer le velo">
        </form>


      </div>
    </div>
  </div> 
</div>
<!-- fin modal creer -->

<!-- second modale, supprimer velo -->
<div class="modal fade" id="suppVelo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><strong>Suppression d'un Velo</strong></h4>
      </div>
      <?php

      ?>
      <form method="POST" action="traitement/suppVelo.php" name="form2">

        Selection du velo à supprimer :
        <select class="form-control" name="Velo_to_supp" required>
          <?php
            $sql='SELECT * FROM velo';
            $res=$mysqli->query($sql);
            while (NULL != ($row = $res->fetch_array())) {
              $sql2='SELECT libelle_type from velo where id_type='.$row["id_type"];
                $res2=$mysqli->query($sql2);
                while (NULL != ($row2 = $res2->fetch_array())) {
                  echo'<option value="'.$row["id_velo"].'">'.$row["id_velo"].' '.$row2["libelle_type"].'</option>';
                }
            }

          ?>


        </select><br>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
          <input type="submit" class="btn btn-default"name="Supprimer le velo">
        </form>

      </form>
    </div>
  </div> 
</div>
<!-- fin modal supprimer -->

<!-- 3Eme Modale edition d'un velo -->
<div class="modal fade" id="editionVelo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><strong>Edition d'un Velo</strong></h4>
      </div>

      <form method="POST" action="traitement/editerVelo.php" name="form2">

        Selection du velo à Editer :
        <select class="form-control" name="Velo_to_Edit" required onclick="formModificatio(this.value)">
          <?php
            $sql='SELECT * FROM velo';
            $res=$mysqli->query($sql);
            while (NULL != ($row = $res->fetch_array())) {
                echo'<option value="'.$row["id_velo"].'">'.$row["id_velo"].'</option>';
            }

          ?>
        </select><br>

        <div id="afficheForm"></div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
          <input type="submit" class="btn btn-default"name="Supprimer le velo">
        </form>

      </div>
  </div> 
</div>
<!-- fin modal Editer -->