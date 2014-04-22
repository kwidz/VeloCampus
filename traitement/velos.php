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
?>

<center><h3>VTC original b'Twin 5 night & day</h3></center>
<div class="row" style="background-color:#F5F5F5;border-radius:10px;border:3px solid #222222" >
  <div class="col-md-12"> <br/>
    <img src="../images/velos/velo3.png" width="380px" height="350px"/>
    <div>
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
    </div>
  </div>
</div>

<br/><br/>

<center><h3>VTC b'Twin pack</h3></center>
<div class="row" style="background-color:#F5F5F5;border-radius:10px;border:3px solid #222222" >
  <div class="col-md-12"> <br/>
    <img src="../images/velos/velo2.png" width="380px" height="350px"/>
    <div>
      <h4>Description :</h4>
      Vélo de route, enjambement facile, idéal pour les balades en ville
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
    </div>
  </div>
</div>

<br/><br/>

<center><h3>b'Twin Hoptown 5</h3></center>
<div class="row" style="background-color:#F5F5F5;border-radius:10px;border:3px solid #222222" >
  <div class="col-md-12"> <br/>
    <img src="../images/velos/velo1.png" width="380px" height="350px"/>  
    <div>
      <h4>Description :</h4>
      Vélo de ville uniquement, toutes tailles, pliable en 15 secondes, facilement stockable, idéal pour les courtes distances
      <h4>Caractéristiques :</h4>
      7 vitesses <br/>
      Garde boue avant et arrière <br/>
      <br/>
    </div>
  </div>
</div>

<br/><br/>

<center><h3>Riverside 1</h3></center>
<div class="row" style="background-color:#F5F5F5;border-radius:10px;border:3px solid #222222" >
  <div class="col-md-12">
    <img src="../images/velos/velo4.png" width="380px" height="350px"/>
    <div>
      <h4>Description :</h4>
      Pas de descriptif
      <h4>Caractéristiques :</h4>
      Pas de caractéristiques <br/>
      <br/> Pas de bol
      <br/>
    </div>
  </div>
</div>

<?php
	include("../footer.html");
?>