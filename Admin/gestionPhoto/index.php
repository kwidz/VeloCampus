<?php
  session_start();
  include("../header.html");
  if (isset($_COOKIE['Session']) && $_COOKIE['Session'] == md5(md5("carotte")) && $_SESSION['log'] && $_SESSION['log'] == 3) {
      include("../menulog.html");
      include("gestion.php");
      include("../demandeInscription.php");
      if (isset($_SESSION['modif']) && $_SESSION['modif'] == "accueil") {
        include("../banniereMenuUpdate.html");
        $_SESSION['modif'] = "";
      }
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



<?php
	include("../footer.html");
?>