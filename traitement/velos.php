<?php
  session_start();
  include("../header.html");
  if (isset($_SESSION['log']) && $_SESSION['log'] == 1) {
      include("../menulog.html");
    }
    else {
      include("../menu.html");
      if (isset($_SESSION['log']) && $_SESSION['log'] == 0) {
        $_SESSION = array(); 
        include("../banniereErreurConn.html");
      }
    }
    $mysqli = new mysqli("127.0.0.1","velo","velo","velo");
?>

<center><h3>VTC original b'Twin 5 night & day</h3></center>
<div class="row" style="background-color:#F5F5F5;border-radius:10px;border:3px solid #222222" >
  <div class="col-md-4"> <br/>
    <img src="../images/velos/velo3.png" width="380px" height="350px"/>
  </div>
  <div class="col-md-8">
    <h4>Description :</h4>
    Vélo de route et chemin (pas VTT), enjambement facile, idéal pour les balades en ville et chemins. <br/> 
    
    <h4>Caractéristiques : </h4>
    21 vitesses <br/>
    Béquille <br/>
    Porte-bagages modulaire BCLIP <br/>
    Pneus mixtes <br/>
    Dynamo <br/>
    Moyeu simple et efficace <br/>
    Garde boue avant et arrière <br/>
    Fourche suspendue <br/>
    Selle en gel pour un vélo très confortable <br/>
    Cadre aluminium qui offre légèreté et dynamisme sur tous les terrains <br/>
    Potence réglable en hauteur et orientable <br/>
    <br/>
    <?php
      $result = $mysqli->query("SELECT count(*) FROM Velo WHERE id_type=1 and id_location IS NULL");
      $row = $result->fetch_array(MYSQLI_ASSOC);
      if ($row) {
        foreach ($row as $i => $value) {
          $nombre = $value;
          if ($nombre > 0) {
            echo "Vélos encore disponibles : <b>".$value."</b><br/>";
            echo "<a href='#'><input type='button' value='Réserver !' class='btn btn-primary' data-toggle='modal' data-target='#modalReservation'/></a><br/><br/>";
          }
          else {
            echo "Plus de vélos disponibles !";
          }
        }
      }
    ?>
  </div>
</div>

<br/><br/>

<center><h3>VTC b'Twin pack</h3></center>
<div class="row" style="background-color:#F5F5F5;border-radius:10px;border:3px solid #222222" >
  <div class="col-md-4"> <br/>
    <img src="../images/velos/velo2.png" width="380px" height="350px"/>
  </div>
  <div class="col-md-8">
    <h4>Description :</h4>
    Vélo de route, enjambement facile, idéal pour les balades en ville. <br/>
    <h4>Caractéristiques :</h4>
    21 vitesses à poignées tournantes <br/>
    Béquille <br/>
    Porte-bagages <br/>
    Pneus mixtes <br/>
    Dynamo <br/>
    Garde boue avant et arrière <br/>
    Fourche suspendue <br/>
    Selle en gel pour un vélo très confortable <br/>
    Potence réglable en hauteur et orientable <br/>
    <br/>
    <?php
      $result = $mysqli->query("SELECT count(*) FROM Velo WHERE id_type=2 and id_location IS NULL");
      $row = $result->fetch_array(MYSQLI_ASSOC);
      if ($row) {
        foreach ($row as $i => $value) {
          $nombre = $value;
          if ($nombre > 0) {
            echo "Vélos encore disponibles : <b>".$value."</b><br/>";
            echo "<a href='#'><input type='button' value='Réserver !' class='btn btn-primary' data-toggle='modal' data-target='#modalReservation'/></a><br/><br/>";
          }
          else {
            echo "Plus de vélos disponibles !";
          }
        }
      }
    ?>
  </div>
</div>

<br/><br/>

<center><h3>b'Twin Hoptown 5</h3></center>
<div class="row" style="background-color:#F5F5F5;border-radius:10px;border:3px solid #222222" >
  <div class="col-md-4"> <br/>
    <img src="../images/velos/velo1.png" width="380px" height="350px"/>  
  </div>
    <div class="col-md-8">
    <h4>Description :</h4>
    Vélo de ville uniquement, toutes tailles, pliable en 15 secondes, facilement stockable, idéal pour les courtes distances. <br/>
    <h4>Caractéristiques :</h4>
    7 vitesses <br/>
    Garde boue avant et arrière <br/>
    <br/>
    <?php
      $result = $mysqli->query("SELECT count(*) FROM Velo WHERE id_type=3 and id_location IS NULL");
      $row = $result->fetch_array(MYSQLI_ASSOC);
      if ($row) {
        foreach ($row as $i => $value) {
          $nombre = $value;
          if ($nombre > 0) {
            echo "Vélos encore disponibles : <b>".$value."</b><br/>";
            echo "<a href='#'><input type='button' value='Réserver !' class='btn btn-primary' data-toggle='modal' data-target='#modalReservation'/></a><br/><br/>";
          }
          else {
            echo "Plus de vélos disponibles !";
          }
        }
      }
    ?>
  </div>
</div>

<br/><br/>

<center><h3>Riverside 1</h3></center>
<div class="row" style="background-color:#F5F5F5;border-radius:10px;border:3px solid #222222" >
  <div class="col-md-4"> <br/>
  <img src="../images/velos/velo4.png" width="380px" height="350px"/>
  </div>
    <div class="col-md-8">
    <h4>Description :</h4>
    Pas de descriptif
    <h4>Caractéristiques :</h4>
    Pas de caractéristiques <br/>
    <br/> Pas de bol
    <br/>
    <?php
      $result = $mysqli->query("SELECT count(*) FROM Velo WHERE id_type=4 and id_location IS NULL");
      $row = $result->fetch_array(MYSQLI_ASSOC);
      if ($row) {
        foreach ($row as $i => $value) {
          $nombre = $value;
          if ($nombre > 0) {
            echo "Vélos encore disponibles : <b>".$value."</b><br/>";
            echo "<a href='#'><input type='button' value='Réserver !' class='btn btn-primary' data-toggle='modal' data-target='#modalReservation'/></a><br/><br/>";
          }
          else {
            echo "Plus de vélos disponibles !";
          }
        }
      }
    ?>
  </div>
</div>

<?php
	include("../footer.html");
?>


<div class="modal fade" id="modalReservation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><strong>Demande de réservation</strong></h4>
      </div>
      <div class="modal-body">
        Youhou ca marche !
        Mettre un contenu, mais je ne sais pas quoi encore
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-primary" onclick="document.location.href='../traitement/logout.php'">Réserver</button>
      </div>
    </div>
  </div> 
</div>