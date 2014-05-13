<?php
  session_start();
  include("../header.html");
  $titre = str_replace("\\","",str_replace("\n","<br/>",fread(fopen("titre.txt","r"), filesize("titre.txt"))));
  $contenu = str_replace("\\","",str_replace("\n","<br/>",fread(fopen("contenu.txt", "r"), filesize("contenu.txt"))));
  
  if (isset($_COOKIE['Session']) && isset($_SESSION['mail']) && $_COOKIE['Session'] == md5(md5($_SESSION['mail'])) && isset($_SESSION['log']) && $_SESSION['log'] == 1) {
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
      <?php 
        if (isset($_COOKIE['Session']) && isset($_SESSION['log']) && $_SESSION['log'] == 1) { 
          include("../co.php");
          $query = "SELECT prenom_adherent, nom_adherent FROM Adherent WHERE adresse_mail_adherent='".html_entity_decode($_SESSION['mail'])."';";
          $result = $mysqli->query($query);
          $row = $result->fetch_array(MYSQLI_ASSOC);
          if ($row) {
            $prenom = "";
            foreach ($row as $i => $value) {
              $prenom = $prenom.$value." ";
            }
            echo "Vous êtes connecté en tant que ".$prenom." !";

            // $query = "SELECT photo_adherent FROM Adherent WHERE prenom_adherent='".$prenom."';";
            // $result = $mysqli->query($query);
            // $row = $result->fetch_array(MYSQLI_ASSOC);
            // foreach ($row as $i => $value) {
            //   if ($value) {
            //     $tailleImage = getimagesize($value);
            //     if ($tailleImage[0] > $tailleImage[1]) {
            //       $coeff = $tailleImage[0] / 100;
            //       $tailleModif = $tailleImage[1]/$coeff;
            //       echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src='".$value."' width='100' height='".$tailleModif."'/>";
            //     }
            //     else if ($tailleImage[1] > $tailleImage[0]) {
            //       $coeff = $tailleImage[1] / 100;
            //       $tailleModif = $tailleImage[0]/$coeff;
            //       echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src='".$value."' width='".$tailleModif."' height='100'/>";
            //     }
            //     else echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src='".$value."' width='100' height='100'/>";
            //   }
            // }
            echo "<br/>"."<h3>".$titre."</h3>";
          }
          else echo "<h3>".$titre."</h3>";
        } 
        else echo "<h3>".$titre."</h3>";
      ?>
  <?php 
    echo '<br/>'.$contenu.'<br/><img src="../images/logo.png"  class="btn btn-default img-responsive" style="border:2px solid black"><br/><br/>';
  ?>
</center>
  </div>
</div>
<?php
	include("../footer.html");
?>
