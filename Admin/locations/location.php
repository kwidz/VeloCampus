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
      <div class="modal-body"><?php
        $sql='Select * from Adherent orderBy nom_adherent';
        $res=$mysqli->query($sql);
        ?>
        <form method="POST" action="location.php">
        	Nom de l'Adherent :
          <select name="idEtudiant">

          
          <?php
              while (NULL !== ($row = $res->fetch_array())) {
                echo '<option value="'.$row['id_adherent'].'">'.$row['nom_adherent'].' '.$row['prenom_adherent'].'</option>';
              }
          ?>
          </select>

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