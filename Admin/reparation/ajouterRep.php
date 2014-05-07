
<?php
session_start();
include("../header.html");
if (isset($_SESSION['log']) && $_SESSION['log'] == 2) {
  include("../menulog.html");

  
}
else {
  include("../menu.html");
  if (isset($_SESSION['log']) && $_SESSION['log'] == 4) {
    $_SESSION = array(); 
    ?>
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-danger">Aucune correspondance Pseudo/mot de passe trouvée. Veuillez réessayer.</div>
      </div>
      </div><?php
    }
  }
  ?>

<div class="col-md-6" >
  <script>
  function afficheinput(){
    document.getElementById("veloloue").style.display="block";
  }
  function affichePas(){
    document.getElementById("veloloue").style.display="none";
  }
  </script>

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
      <label>Type de vélo</label>
      <select class="form-control">
        <option onclick="afficheinput();">Vélo appartenant à véloCampus</option>
        <option onclick="affichePas();">Vélo n'appartenat pas à vélocampus'</option>

      </select>
      <br/>
      <div id="veloloue" style="display:none">
        <label>Numero du vélo</label>
        <input type="int" class="form-control" id="numVelo" placeholder="Numero" >
         <label>Numero du cadenas 1</label>
        <input type="int" class="form-control" id="numca1" placeholder="Numero" >
         <label>Numero du cadenas 2</label>
        <input type="int" class="form-control" id="numca2" placeholder="Numero" >
        <label>Numero du cadenas 3</label>
        <input type="int" class="form-control" id="numca3" placeholder="Numero" >
      </div>
    </div>


    <div class="form-group">
      <textarea cols="50" rows="2" class="form-control" id="descr" name="descr">Decription de la réparation</textarea>
    </div>

    <div class="form-group">
      <label>Cout de la réparation</label>
        <input type="int" class="form-control" id="prix" placeholder="Numero" >
      </div>
   
    <button type="submit" class="btn btn-default">Creer</button>
  </form>
</div>


  <?php
  include("../demandeInscription.php");
  
  ?>
