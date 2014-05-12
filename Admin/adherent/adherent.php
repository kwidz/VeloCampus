 <style>
 th, td{
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
    <li class="" style="text-align: center; margin-bottom: 15px; border:solid 1px; border-radius: 5px; border-color: #CDCACA"><a href="#" data-toggle="modal" data-target="#Ladh">Liste des adhérents</a></li>
    <li class="" style="text-align: center; margin-bottom: 15px; border:solid 1px; border-radius: 5px; border-color: #CDCACA"><a href="#" data-toggle="modal" data-target="#suprrep">Supprimer des Adhérents</a></li>
    <li class="" style="text-align: center; margin-bottom: 15px; border:solid 1px; border-radius: 5px; border-color: #CDCACA"><a href="#" data-toggle="modal" data-target="#repfvelo">Ajouter des adhérents</a></li>
    
  </ul>
</div>




<!-- Premier Modal Liste des adherents -->
<div class="modal fade" id="Ladh" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
  <div class="modal-dialog" style="width:1000px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><center><strong>Liste des adhérents</strong></center></h4>

      </div>
      <div class="modal-body">
        






  <form role="form" method="POST" action="traitement/ajouter.php">
 
      <div class="form-group">
        <center>
          <br/>
     <table>
      <tr><th>Nom</th><th>Prenom</th><th>Date Naissance</th><th>adresse</th><th>Code postal</th><th>telephone</th><th>Adresse Mail</th></tr>
      <?php
      $sql = 'Select Adherent.* from Adherent, Cotisation  where Adherent.id_adherent = Cotisation.id_adherent';
      $res=$mysqli->query($sql);
            while (NULL !== ($row = $res->fetch_array())) {
              echo '<tr><td>'.$row['nom_adherent'].'</td><td>'.$row['prenom_adherent'].'</td><td>'.$row['date_naissance_adherent'].'</td><td>'.$row['adresse_adherent'].'</td><td>'.$row['code_Postal_Adherent'].'</td><td>'.$row['telephone_adherent'].'</td><td>'.$row['adresse_mail_adherent'].'</td></tr>';
            }

      ?>

    </table>
  </center>
    </div>


      </table>
      


      
      




    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
      <input type="submit" class="btn btn-default" name="Ajouter">
    </form>

  </div>
</div>
</div> 
</div>