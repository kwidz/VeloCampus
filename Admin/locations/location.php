<!-- Page de création de locations de velo Le premier div correspond au menu 
tous les autres div sont commentés
chaque action s'effectera dans un Modal pour eviter les lourds changement de page 
pour l'utilisateur  -->

<div class="col-md-6" >
  <?php

  if(isset($_GET['message'])
    && (!empty($_GET['message']))){
    if ($_GET['message']=="ok"){
      echo"<center><strong>L'opération s'est déroulé avec succès !</center></strong><br/>";
    }
    else{
      echo"<center><strong>Une erreur à été détectée avez vous bien remplis tous les champs ?</center></strong><br/>";
    }

  }
  ?>
  <ul class="nav nav-pills nav-stacked">
    <li class="" style="text-align: center; margin-bottom: 15px; border:solid 1px; border-radius: 5px; border-color: #CDCACA"><a href="#" data-toggle="modal" data-target="#creerLocation">Créer une Location</a></li>
    <li class="" style="text-align: center; margin-bottom: 15px; border:solid 1px; border-radius: 5px; border-color: #CDCACA"><a href="#" data-toggle="modal" data-target="#veloNonLoués">Voir les vélos non-loués</a></li>
    <li class="" style="text-align: center; margin-bottom: 15px; border:solid 1px; border-radius: 5px; border-color: #CDCACA"><a href="#" data-toggle="modal" data-target="#selectDossier">Voir les personnes qui n'ont pas encore rendu leur vélo</a></li>
    <li class="" style="text-align: center; margin-bottom: 15px; border:solid 1px; border-radius: 5px; border-color: #CDCACA"><a href="#" data-toggle="modal" data-target="#selectDossier">Voir toutes les locations de l'année </a></li>
  </ul>
</div>
<!-- Premier Modal creation de location -->
<div class="modal fade" id="creerLocation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><strong>Création de Location</strong></h4>
      </div>
      <div class="modal-body">
        <?php

        ?>
        <form method="POST" action="traitement/ajouter.php">
          Nom de l'Adherent :
          <select class="form-control" name="id_adherent">


            <?php
            $sql='Select * from Adherent order by nom_adherent';
            $res=$mysqli->query($sql);
            while (NULL !== ($row = $res->fetch_array())) {

              echo '<option value="'.$row['id_adherent'].'">'.$row['nom_adherent'].' '.$row['prenom_adherent'].'</option>';
            }
            ?>
          </select><br/>
          Identifiant du Velo : 
          <select class="form-control" name="id_velo">


            <?php

            
            $sql='Select * '
            .'from Velo v '
            .'where v.id_velo not in(Select id_velo '
                                          .'from Location ) '
            .'order by(id_velo)';
            $res=$mysqli->query($sql);
            while (NULL !== ($row = $res->fetch_array())) {

              echo '<option value="'.$row['id_velo'].'">'.$row['id_velo'].'</option>';
            }
            ?>
          </select><br/>
          Prix : <input type="text" class="form-control" name="prix" value="250"><br/>
          Date : <input type="date" name="date" value="2014-12-12"><br/>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
          <input type="submit" class="btn btn-default"name="creer la Location">
        </form>


      </div>
    </div>
  </div> 
</div>
<!-- fin modal creer -->

<!-- Second Modal affichage des velos non loués -->
<div class="modal fade" id="veloNonLoués" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><strong>Création de Location</strong></h4>
      </div>
      <div class="modal-body">
          <table class="zebra-striped">
            <thead>
              <tr>
                <th>Numero du velo</th>
                <th>Type du velo</th>
                <th>Taille du velo</th>
                <th>Cadenas associés</th>
              </tr>
            </thead>
            <?php

              $sql="Select v.id_velo, c.id_cadenas, ty.libelle_type, t.libelle_taille "
              ."from Velo v, Cadenas c, Taille t, _Type ty "
              ."where v.id_velo not in(Select id_velo from Location ) "
              ."and c.id_velo=v.id_velo "
              ."and v.id_type=ty.id_type "
              ."and v.id_taille=t.id_taille "
              ."order by(id_velo)";
                $res=$mysqli->query($sql);
                while (NULL !== ($row = $res->fetch_array())) {
                   ?><tr><?php
                      echo "<th>".$row['id_velo']."</th>";
                      echo "<th>".$row['ty.libelle_type']."</th>";
                      echo "<th>".$row['t.libelle_taille']."</th>";
                      echo "<th>".$row['c.id_cadenas']."</th>";
                      echo "</tr>";

                }

        ?>
          </table>
       
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
        


      </div>
    </div>
  </div> 
</div>


