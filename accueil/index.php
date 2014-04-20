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

<div class="row" style="background-color:#F5F5F5;border-radius:10px;border:3px solid #222222" >
  <div class="col-md-12">
  	<center>
      <h3>
        <?php 
          if (isset($_COOKIE['Session'])) { 
            $mysqli = new mysqli("127.0.0.1","velo","velo","velo");

            $query = "SELECT prenom_adherent FROM Adherent WHERE adresse_mail_adherent='".html_entity_decode($_COOKIE["Session"])."';";
            $result = $mysqli->query($query);
            $row = $result->fetch_array(MYSQLI_ASSOC);
            foreach ($row as $i => $value) {
              $prenom = $value;
              echo "Tu es de retour ".$value." !&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            }

            $query = "SELECT photo_adherent FROM Adherent WHERE prenom_adherent='".$prenom."';";
            $result = $mysqli->query($query);
            $row = $result->fetch_array(MYSQLI_ASSOC);
            foreach ($row as $i => $value) {
              if ($value) {
                $tailleImage = getimagesize($value);
                if ($tailleImage[0] > $tailleImage[1]) {
                  $coeff = $tailleImage[0] / 100;
                  $tailleModif = $tailleImage[1]/$coeff;
                  echo "<img src='".$value."' width='100' height='".$tailleModif."'/>";
                }
                else if ($tailleImage[1] > $tailleImage[0]) {
                  $coeff = $tailleImage[1] / 100;
                  $tailleModif = $tailleImage[0]/$coeff;
                  echo "<img src='".$value."' width='".$tailleModif."' height='100'/>";
                }
                else echo "<img src='".$value."' width='100' height='100'/>";
              }
            }
          } 
          else echo "Bonjour !";
        ?>
      </h3> 
    <br/>
    Bonjour à tous et bienvenue sur notre nouveau site Internet !<br/>
    Vous trouverez ici toutes les informations sur notre association basée à Belfort et Montbéliard.<br/>
    Vous pourez adhérer, louer des vélos, demandé à reparer des vélos, suivre notre actualités... <br/>
    <br/>
    Et surtout n'hésitez pas à vous contacter : <a>velocampusdulion@gmail.com</a>
    <br/><br/>
    <img src="../images/logo.png"  class="btn btn-default" style="border:2px solid black"><br/><br/>

</center>
  </div>
</div>


<?php
	include("../footer.html");
?>
