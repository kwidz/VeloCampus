<div class="col-md-6" >

<ul class="nav nav-pills nav-stacked">
    <li class="" style="text-align: center; margin-bottom: 15px; border:solid 1px; border-radius: 5px; border-color: #CDCACA"><a href="#" data-toggle="modal" data-target="#ajrep">Ajouter des Réparations</a></li>
    <li class="" style="text-align: center; margin-bottom: 15px; border:solid 1px; border-radius: 5px; border-color: #CDCACA"><a href="#" data-toggle="modal" data-target="#suprrep">Supprimer des Réparation</a></li>
    <li class="" style="text-align: center; margin-bottom: 15px; border:solid 1px; border-radius: 5px; border-color: #CDCACA"><a href="#" data-toggle="modal" data-target="#gererrep">Gerer les demandes de Réparatio</a></li>
   
  </ul>
</div>

<!-- Premier Modal cajout reparation -->
<div class="modal fade" id="ajrep" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><strong>Ajouter une reparation</strong></h4>
      </div>
      <div class="modal-body">
        





  <form role="form">
    <div class="form-group">
      Nom de l'Adherent :
          <select class="form-control" name="id_adherent" required>


            <?php
            $sql='Select * from Adherent order by nom_adherent';
            $res=$mysqli->query($sql);
            while (NULL !== ($row = $res->fetch_array())) {

              echo '<option value="'.$row['id_adherent'].'">'.$row['nom_adherent'].' '.$row['prenom_adherent'].'</option>';
            }
            ?>
          </select><br/>
        
      </div>
      <div class="form-group">
      Identifiant du Velo : 
          <select class="form-control" name="id_velo" required>


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
      <textarea cols="50" rows="2" class="form-control" id="descr" name="descr" placeholder="description"></textarea>
    </div>

    <div class="form-group">
      <label>prix de la réparation</label>
        <input type="number" class="form-control" id="prix" placeholder="prix" >
      </div>

     
   
  




        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
          <input type="submit" class="btn btn-default" name="creer">
        </form>



      </div>
    </div>
  </div> 
</div>