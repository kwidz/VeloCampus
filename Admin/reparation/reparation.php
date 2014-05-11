
  <style>
  th{
    border:solid 1px #CDCACA;
    text-align:center;
  }
</style>

<script>




function reparation(id_velo){

  
  xmlhttp=new XMLHttpRequest();
  
  xmlhttp.onreadystatechange=function(){
    if (xmlhttp.readyState==4 && xmlhttp.status==200)  //si on est bien a letape 4
      //document.getElementById("vet").style.display="block";
      document.getElementById("rep").innerHTML= xmlhttp.responseText; //balise select dans le html
      



  }
  xmlhttp.open("GET","traitement/affrep.php?id_velo="+id_velo,true);
  xmlhttp.send();
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
      echo"<center><strong>Une erreur à été détectée avez vous bien remplis tous les champs ?</center></strong><br/>";
    }

  }
  ?>

<ul class="nav nav-pills nav-stacked">
    <li class="" style="text-align: center; margin-bottom: 15px; border:solid 1px; border-radius: 5px; border-color: #CDCACA"><a href="#" data-toggle="modal" data-target="#ajrep">Ajouter des Réparations</a></li>
    <li class="" style="text-align: center; margin-bottom: 15px; border:solid 1px; border-radius: 5px; border-color: #CDCACA"><a href="#" data-toggle="modal" data-target="#suprrep">Supprimer des Réparation</a></li>
    <li class="" style="text-align: center; margin-bottom: 15px; border:solid 1px; border-radius: 5px; border-color: #CDCACA"><a href="#" data-toggle="modal" data-target="#repfvelo">Afficher réparation en fonction d'un vélo</a></li>
   
  </ul>
</div>

<!-- Premier Modal ajout reparation -->
<div class="modal fade" id="ajrep" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><strong>Ajouter une reparation</strong></h4>
      </div>
      <div class="modal-body">
        





  <form role="form" method="POST" action="traitement/ajouter.php">
    <!--<div class="form-group">
      Nom de l'Adherent :
          <select class="form-control" name="id_adherent" required>


            <?php /*
            $sql='Select * from Adherent order by nom_adherent';
            $res=$mysqli->query($sql);
            while (NULL !== ($row = $res->fetch_array())) {

              echo '<option value="'.$row['id_adherent'].'">'.$row['nom_adherent'].' '.$row['prenom_adherent'].'</option>';
            }
            */?>
          </select><br/>
        
      </div>-->
      <div class="form-group">
      Identifiant du Velo : 
          <select class="form-control" name="id_velo" id="id_velo" required>


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
   
    </div>


    <div class="form-group">
      <textarea cols="50" rows="2" class="form-control" id="descr" name="descr" placeholder="description" required></textarea>
    </div>

    <div class="form-group">
      <label>prix de la réparation</label>
        <input type="number" class="form-control" id="prix" name="prix" placeholder="prix" required>
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



<!-- deuxieme Modal supprimer des reparation -->
<div class="modal fade" id="suprrep" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><strong>Suprimer des réparation</strong></h4>
      </div>
      <div class="modal-body">
        
          <?php
            $sql ='Select * from Reparation';
            $res=$mysqli->query($sql);
            ?>
             <table class="bordered-table"style="border:solid 1px #CDCACA; border-radius:50px">
            <thead>
              <tr>
                <th>idreparation</th>
                <th>Description</th>
                <th>prix reparation</th>
                <th>idvelo</th>
                <th>Supprimer</th>
              </tr>
            </thead>
            <tbody>
            <?php 
            while (NULL !== ($row = $res->fetch_array())) {

              echo '<tr><td style="border:solid 1px #CDCACA; border-radius:50px">'.$row['id_reparation'].'</td><td style="border:solid 1px #CDCACA; border-radius:50px">'.$row['description_reparation'].'</td><td style="border:solid 1px #CDCACA; border-radius:50px">'.$row['prix_reparation'].'</td><td style="border:solid 1px #CDCACA; border-radius:50px">'.$row['id_velo'].'</td><td style="border:solid 1px #CDCACA; border-radius:50px"><a href="traitement/suppRep.php?id='.$row['id_reparation'].'"class="glyphicon glyphicon-remove"></a></td></tr>' ;
            }
            echo '</tbody></table>'
          ?>




  



        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
          <input type="submit" class="btn btn-default" name="Ajouter">
        </form>

      </div>
    </div>
  </div> 
</div>

<!-- troisieme Modal reparation en fonction de velo -->
<div class="modal fade" id="repfvelo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><strong>Afficher les réparation d'un vélo</strong></h4>
      </div>
      <div class="modal-body">
 

 <div class="form-group">
      Identifiant du Velo : 
          <select class="form-control" name="id_velo" id="id_velo" required onchange="reparation(this.value)">


            <?php

            
            $sql='Select * from Velo';
            $res=$mysqli->query($sql);
            while (NULL !== ($row = $res->fetch_array())) {

              echo '<option value="'.$row['id_velo'].'">'.$row['id_velo'].'</option>';
            }
            ?>
          </select><br/>
   
    </div>
    <div id="rep">
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