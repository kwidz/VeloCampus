<!-- Page de création de locations de velo Le premier div correspond au menu 
tous les autres div sont commentés
chaque action s'effectera dans un Modal pour eviter les lourds changement de page 
pour l'utilisateur  -->

<div class="col-md-6" >
  <ul class="nav nav-pills nav-stacked">
    <li class="" style="text-align: center; margin-bottom: 15px; border:solid 1px; border-radius: 5px; border-color: #CDCACA"><a href="#" data-toggle="modal" data-target="#creerLocation">Créer une Location</a></li>
    <li class="" style="text-align: center; margin-bottom: 15px; border:solid 1px; border-radius: 5px; border-color: #CDCACA"><a href="#" data-toggle="modal" data-target="#selectDossier">Voir les vélos non-loués</a></li>
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
        <form method="POST" action="index.php">
          Nom de l'Adherent :
          <select class="form-control" name="idEtudiant">


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
            $sql='Select * from Velo order by id_velo';
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
