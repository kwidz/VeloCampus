<!-- Page de création de locations de velo Le premier div correspond au menu 
tous les autres div sont commentés
chaque action s'effectera dans un Modal pour eviter les lourds changement de page 
pour l'utilisateur  -->
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
    <li class="" style="text-align: center; margin-bottom: 15px; border:solid 1px; border-radius: 5px; border-color: #CDCACA"><a href="#" data-toggle="modal" data-target="#veloNonRendus">Voir les personnes qui n'ont pas encore rendu leur vélo</a></li>
    <li class="" style="text-align: center; margin-bottom: 15px; border:solid 1px; border-radius: 5px; border-color: #CDCACA"><a href="#" data-toggle="modal" data-target="#allLocations">Voir toutes les locations de l'année </a></li>
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
        <h4 class="modal-title" id="myModalLabel"><strong> Vélos nons loués </strong></h4>
      </div>
      <div class="modal-body">
          <table class="bordered-table"style="border:solid 1px #CDCACA; border-radius:50px">
            <thead>
              <tr>
                <th>Numero du velo</th>
                <th>Type du velo</th>
                <th>Taille du velo</th>
                <th>Cadenas associés</th>
              </tr>
            </thead>
            <tbody>
            <?php

              $sql="Select v.id_velo, c.id_cadenas, ty.libelle_type, t.libelle_taille "
              ."from Velo v, Cadenas c, Taille t, _Type ty "
              ."where v.id_velo not in(Select id_velo from Location ) "
              ."and c.id_velo=v.id_velo "
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
       
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
        


      </div>
    </div>
  </div> 
</div>

<!-- 3eme Modal affichage des personnes n'ayant pas encore rendu leur velo -->
<div class="modal fade" id="veloNonRendus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><strong> Vélos nons loués </strong></h4>
      </div>
      <div class="modal-body">
          <table class="bordered-table"style="border:solid 1px #CDCACA; border-radius:50px">
            <thead>
              <tr>
                <th>Numero du velo</th>
                <th>Nom de l'adherent</th>
                <th>Prenom de l'adherent</th>
                <th>Telephone de l'adherent</th>
                <th>Mail de l'adherent</th>
              </tr>
            </thead>
            <tbody>
            <?php

              $sql="Select v.id_velo, a.nom_adherent, a.prenom_adherent, a.telephone_adherent, a.adresse_mail_adherent "
              ."from Velo v, Adherent a, Location l "
              ."where l.date_retour_location is NULL "
              ."and l.id_adherent = a.id_adherent "
              ."and l.id_velo = v.id_velo "
              .""
              ."order by(id_velo)";
                $res=$mysqli->query($sql);
                while (NULL !== ($row = $res->fetch_array())) {
                  
                    echo "<th>".$row[0]."</th>";
                    echo "<th>".$row[1]."</th>";
                    echo "<th>".$row[2]."</th>";
                    echo "<th>".$row[3]."</th>";
                    echo "<th>".$row[4];
                    echo "</th>";
                    echo "</tr>";
                  }

        ?>
      </tbody>
          </table>
       
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
        


      </div>
    </div>
  </div> 
</div>


<!-- 4eme Modal affichage de toutes les reservations -->
<div class="modal fade" id="allLocations" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><strong> Vélos nons loués </strong></h4>
      </div>
      <div class="modal-body">
          <table class="bordered-table"style="border:solid 1px #CDCACA; border-radius:50px">
            <thead>
              <tr>
                <th>Numero du velo</th>
                <th>Nom de l'adherent</th>
                <th>Prenom de l'adherent</th>
                <th>Telephone de l'adherent</th>
                <th>Mail de l'adherent</th>
                <th>Date de la location</th>
                <th>Date de retour de la location</th>

              </tr>
            </thead>
            <tbody>
            <?php

              $sql="Select v.id_velo, a.nom_adherent, a.prenom_adherent, a.telephone_adherent, a.adresse_mail_adherent, l.date_location, l.date_retour_location "
              ."from Velo v, Adherent a, Location l "
              ."where l.id_adherent = a.id_adherent "
              ."and l.id_velo = v.id_velo "
              .""
              ."order by(id_velo)";
                $res=$mysqli->query($sql);
                while (NULL !== ($row = $res->fetch_array())) {
                  
                    echo "<th>".$row[0]."</th>";
                    echo "<th>".$row[1]."</th>";
                    echo "<th>".$row[2]."</th>";
                    echo "<th>".$row[3]."</th>";
                    echo "<th>".$row[4]."</th>";
                    echo "<th>".$row[5]."</th>";
                    echo "<th>".$row[6];
                    echo "</th>";
                    echo "</tr>";
                  }

        ?>
      </tbody>
          </table>
       
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
        


      </div>
    </div>
  </div> 
</div>