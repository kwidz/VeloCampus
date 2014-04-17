<?php
  session_start();
  
  include("../header.html");
  if (isset($_SESSION['log'])) {
    include("../menulog.html");
  }
  else {
    include("../menu.html");
  }
?>

<div class="row" style="background-color:Gainsboro;border-radius:10px;border:3px solid #222222" >
  <div class="col-md-12">
  	<center>
  	<h3>Bonjour</h3><br/>
    Bonjour à tous et bienvenue sur notre nouveau site Internet !<br/>
    Vous trouverez ici toutes les informations sur notre association basée à Belfort et Montbéliard.<br/>
    Vous pourez adhérer, louer des vélos, demandé à reparer des vélos, suivre notre actualités... <br/>
    <br/>
    Et surtout n'hésitez pas à vous contacter : <a>velocampusdulyon@gmail.com</a>
    <br/><br/>
    <img src="../images/logo.png"  class="btn btn-default" style="border:2px solid black"><br/><br/>

</center>
  </div>
</div>


<?php
	include("../footer.html");
?>