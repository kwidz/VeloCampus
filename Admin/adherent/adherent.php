 <style>
 th, td{
  border:solid 1px #CDCACA;
  text-align:center;
}
</style>

<script>
function ConfirmationSuppr(id_adherent){
  if(confirm("Êtes vous sur de vouloir supprimer cet adhérent ?")){
   xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
    if (xmlhttp.readyState==4 && xmlhttp.status==200)  //si on est bien a letape 4
      //document.getElementById("vet").style.display="block";
      document.getElementById("Confirme").innerHTML=xmlhttp.responseText; //balise select dans le html
    }
    xmlhttp.open("GET","traitement/suppr.php?id_adherent="+id_adherent,true);
    xmlhttp.send();
  }
}


function ConfirmationsupprTout(){
  if(confirm("Êtes vous sur de vouloir supprimer TOUS les adhérents ?")){
    xmlhttp=new XMLHttpRequest();

    xmlhttp.onreadystatechange=function(){
    if (xmlhttp.readyState==4 && xmlhttp.status==200)  //si on est bien a letape 4
      //document.getElementById("vet").style.display="block";
      document.getElementById("Confirme").innerHTML=xmlhttp.responseText; //balise select dans le html
    }
    xmlhttp.open("GET","traitement/supprTout.php",true);
    xmlhttp.send();
  }
}


</script>

<div class="col-md-6" >
  <?php

  if(isset($_GET['message'])
    && (!empty($_GET['message']))){
    if ($_GET['message']=="ok"){
      echo"<center><strong>L'opération s'est déroulé avec succès !</center></strong><br/>";
    }
    else{
      echo"<center><strong>Une erreur à été détectée. Avez-vous bien rempli tous les champs ?</center></strong><br/>";
    }

  }
  ?>

  <ul class="nav nav-pills nav-stacked">
    <li class="" style="text-align: center; margin-bottom: 15px; border:solid 1px; border-radius: 5px; border-color: #CDCACA"><a href="#" data-toggle="modal" data-target="#Ladh">Liste des adhérents</a></li>
    <li class="" style="text-align: center; margin-bottom: 15px; border:solid 1px; border-radius: 5px; border-color: #CDCACA"><a href="#" data-toggle="modal" data-target="#Suprad">Supprimer des adhérents</a></li>
    <li class="" style="text-align: center; margin-bottom: 15px; border:solid 1px; border-radius: 5px; border-color: #CDCACA"><a href="#" data-toggle="modal" data-target="#Addadh">Ajouter un adhérent</a></li>
  </ul>
</div>

<!-- Premier Modal Liste des adherents -->
<div class="modal fade" id="Ladh" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
  <div class="modal-dialog" style="width:1000px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><strong>Liste des adhérents</strong></h4>
      </div>
      <div class="modal-body">
        <form role="form" method="POST" action="traitement/ajouter.php">

          <div class="form-group">
            <center>
              <br/>
              <table>
                <tr><th>Nom</th><th>Prénom</th><th>Date naissance</th><th>Adresse</th><th>Code postal</th><th>Téléphone</th><th>Adresse Mail</th></tr>
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


<!-- Deuxieme Modal Supprimer des adherents -->
<div class="modal fade" id="Suprad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
  <div class="modal-dialog" style="width:1000px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><strong>Liste des adhérents</strong></h4>

      </div>
      <div class="modal-body">
        <form role="form" method="POST" action="traitement/ajouter.php">

          <div class="form-group">
            <center>
              <br/>
              <table>
                <tr><th>Nom</th><th>Prénom</th><th>Date naissance</th><th>Adresse</th><th>Code postal</th><th>Téléphone</th><th>Adresse Mail</th><th>Supprimer</th></tr>
                <?php
                $sql = 'Select Adherent.* from Adherent, Cotisation  where Adherent.id_adherent = Cotisation.id_adherent';
                $res=$mysqli->query($sql);
                while (NULL !== ($row = $res->fetch_array())) {
                  echo '<tr><td>'.$row['nom_adherent'].'</td><td>'.$row['prenom_adherent'].'</td><td>'.$row['date_naissance_adherent'].'</td><td>'.$row['adresse_adherent'].'</td><td>'.$row['code_Postal_Adherent'].'</td><td>'.$row['telephone_adherent'].'</td><td>'.$row['adresse_mail_adherent'].'</td><td onclick="ConfirmationSuppr('.$row['id_adherent'].')"><a href="#" class="glyphicon glyphicon-remove"></a></td></tr>';
                }

                ?>

              </table>
              <br/>
              <div id="Confirme"></div>
              <br/>
              <button  type="button" class="btn btn-danger" onclick="ConfirmationsupprTout()">Supprimer TOUS les adhérents</button>
            </center>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
        <input type="submit" class="btn btn-default" name="Ajouter">
      </form>
    </div>
  </div>
</div> 
</div>

<!-- Troisième Modal Ajouter des adherents -->
<div class="modal fade" id="Addadh" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
  <div class="modal-dialog" style="width:1000px;">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"><strong>Ajouter un adhérent</strong></h4>
      </div>
      <div class="modal-body">
          Pour ajouter un adhérent, rendez-vous sur la partie publique du site, puis cliquez sur s'inscrire.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
        <input type="submit" class="btn btn-default" name="Aller">
    </div>
  </div>
</div> 
</div>