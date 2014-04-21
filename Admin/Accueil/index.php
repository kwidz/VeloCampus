
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

<div class="row">
    <div class="col-md-3" >
        <div class="list-group">
          <a href="#" class="list-group-item list-group-item-success">Importer Calendrier google</a>
          <a href="#" class="list-group-item list-group-item-info">Modifier texte de l'acceuil</a>
          <a href="#" class="list-group-item list-group-item-warning">Modifier photos du slide</a>
          <a href="#" class="list-group-item list-group-item-danger">Ajouter photos d'évenements</a>
          <a href="#" class="list-group-item list-group-item-danger">Supprimmer tous les adhérents</a>
          <a href="#" class="list-group-item list-group-item-danger">Aouter un historique de reunions</a>
          <a href="#" class="list-group-item list-group-item-danger">Voir les historiques</a>
          <a href="#" class="list-group-item list-group-item-danger">...</a>
        </div>
  </div>
  <div class="col-md-6" >
   <img src="../images/postit.png"  width="600" height="600" ><br/><br/> 
  </div>
  <div class="col-md-3" >
    <div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Demande d'inscription (A VALIDER) </div>
 <!-- <div class="panel-body"></div>-->

  <!-- Table -->
  <table class="table">
    <tr><td>nom</td><td>prenom</td><td><a href="#">Plus d'infos</a></td><td><div class="glyphicon glyphicon-ok"></div></td><td><div class="glyphicon glyphicon-remove"></div></td></tr>
  </table>
</div>

  
    
  </div>
</div>

<?php
	include("../footer.html");
?>