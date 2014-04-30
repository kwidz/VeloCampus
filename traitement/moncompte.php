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

<?php 
if (isset($_SESSION['log']) && $_SESSION['log'] == 1) { ?>
  <div class="row" style="background-color:#F5F5F5;border-radius:10px;border:3px solid #222222" >
    <div class="col-md-12"> <?php
      echo "<center><h3>Mes infos :</h3></center>";
      $result = $mysqli->query("SELECT  nom_adherent, 
                                        prenom_adherent, 
                                        date_naissance_adherent, 
                                        adresse_adherent, 
                                        code_Postal_Adherent, 
                                        telephone_adherent, 
                                        password_adherent, 
                                        photo_adherent FROM Adherent WHERE adresse_mail_adherent='".$_SESSION['mail']."'");
      $row = $result->fetch_array(MYSQLI_ASSOC);
      if ($row) {
        foreach ($row as $i => $value) {
          switch ($i) {
            case 'nom_adherent':
              $nom = $value;
              break;
            case 'prenom_adherent':
              $prenom = $value;
              break;
            case 'date_naissance_adherent':
              $date_nassance = $value;
              break;
            case 'adresse_adherent':
              $adresse = $value;
              break;
            case 'code_Postal_Adherent':
              $code_postal = $value;
              break;
            case 'telephone_adherent':
              $telephone = $value;
              break;
            case 'password_adherent':
              $password = $value;
              break;
            case 'photo_adherent':
              $photo = $value;
              break;
          }
        }
      }

      else {
        echo "Bug ?";
      } ?>
      <br/>
      <?php
        $tailleImage = getimagesize($photo);
        if ($tailleImage[0] > $tailleImage[1]) {
          $coeff = $tailleImage[0] / 200;
          $tailleModif = $tailleImage[1]/$coeff;
          echo "<img src='".$photo."' width='200' height='".$tailleModif."'><br/><br/>";
        }
        else if ($tailleImage[1] > $tailleImage[0]) {
          $coeff = $tailleImage[1] / 200;
          $tailleModif = $tailleImage[0]/$coeff;
          echo "<img src='".$photo."' width='".$tailleModif."' height='200'><br/><br/>";
        }
        else {
          echo "<img src='".$photo."' width='200' height='200'><br/><br/>";
        }
      ?>
      Nom : <input class="form-control" type="text" value="<?php echo $nom;?>"> <br/> <br/>
      Prenom : <input class="form-control" type="text" value="<?php echo $prenom;?>"> <br/> <br/>
      Date de naissance : <input class="form-control" type="date" value="<?php echo $date_nassance;?>"> <br/> <br/>
      Adresse : <input class="form-control" type="text" value="<?php echo $adresse;?>"> <br/> <br/>
      Code postal : <input class="form-control" type="text" value="<?php echo $code_postal;?>"> <br/> <br/>
      Téléphone : <input class="form-control" type="text" value="<?php echo $telephone;?>"> <br/> <br/>
      Modifier l'image de compte : <br/><i>Ca vient, ca vient...</i> <br/> <br/>
      </div>
    </div> <br/>
    <center><h3>Modifier mon mot de passe :</h3></center>
    <div class="row" style="background-color:#F5F5F5;border-radius:10px;border:3px solid #222222" >
      <div class="col-md-12">
        <br/>
        Entrez le mot de passe actuel : <input class="form-control" type="password"> <br/> <br/>
        Entrez le nouveau mot de passe : <input class="form-control" type="password"> <br/> <br/>
        Confirmez le nouveau mot de passe : <input class="form-control" type="password"> <br/> <br/>
      </div>
    </div>
  <?php
    }
    else { 
      echo "<div class='alert alert-danger'><center>Vous devez vous connecter pour accéder à cette partie du site.<br/><center></div>";
    } 
?>


<?php
	include("../footer.html");
?>