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
      else if (isset($_SESSION['log']) && $_SESSION['log'] == 2) {
         $_SESSION = array(); 
        include("../banniereAttenteConf.html");
      }
      else if (isset($_SESSION['log']) && $_SESSION['log'] == 5) {
         $_SESSION = array(); 
        include("../banniereAttenteCompteAct.html");
      }
    }
    
    if (isset($_SESSION['update'])) {
      if ($_SESSION['update'] == 1) {
        include("../banniereMajOkGen.html");
      }
      if ($_SESSION['update'] == 2) {
        include("../banniereMajOkPass.html");
      }
      if ($_SESSION['update'] == 0) {
        include("../banniereErreurMaj.html");
      }
    }
    include("../co.php");
    $_SESSION['update'] = -1;
?>

<?php 
if (isset($_SESSION['log']) && $_SESSION['log'] == 1) { ?>
<form method="post" action="updateInfos.php">
  <div class="row" style="background-color:#F5F5F5;border-radius:10px;border:3px solid #222222" >
    <div class="col-md-12"> <?php
      echo "<center><h3>Mes infos :</h3></center>";
      $result = $mysqli->query("SELECT  nom_adherent, 
                                        prenom_adherent, 
                                        date_naissance_adherent, 
                                        adresse_adherent, 
                                        code_Postal_Adherent, 
                                        telephone_adherent, 
                                        password_adherent FROM Adherent WHERE adresse_mail_adherent='".$_SESSION['mail']."'");
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
              $date_naissance = $value;
              
              $u_agent = $_SERVER['HTTP_USER_AGENT'];
              if (strstr($u_agent,"Mozilla")) {
                if (!strstr($u_agent,"Chrome")) {
                  $tabDate = explode('-' , $date_naissance);
                  $date_naissance = $tabDate[2]."-".$tabDate[1]."-".$tabDate[0];
                }
              } 

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
      Nom : <input name="nom" id="nom" class="form-control" type="text" value="<?php echo $nom;?>" required> <br/> <br/>
      Prenom : <input name="prenom" id="prenom" class="form-control" type="text" value="<?php echo $prenom;?>" required> <br/> <br/>
      Date de naissance : <input name="date_naissance" id="date_naissance" class="form-control" type="date" value="<?php echo $date_naissance;?>" required> <br/> <br/>
      Adresse : <input name="adresse" id="adresse" class="form-control" type="text" value="<?php echo $adresse;?>" required> <br/> <br/>
      Code postal : <input name="code_postal" id="code_postal" class="form-control" type="text" value="<?php echo $code_postal;?>" required> <br/> <br/>
      Téléphone : <input name="tel" id="tel" class="form-control" type="text" value="<?php echo $telephone;?>" required> <br/> <br/>
      <input type="submit" class="btn" value="Modifier"><br/><br/>
      </div>
    </div>
    </form> <br/>
    <center><h3>Modifier mon mot de passe :</h3></center>
    <form method="post" action="updateInfos.php">
    <div class="row" style="background-color:#F5F5F5;border-radius:10px;border:3px solid #222222" >
      <div class="col-md-12">
        <br/>
        Entrez le mot de passe actuel : <input name="pass" id="pass" class="form-control" type="password" required> <br/> <br/>
        Entrez le nouveau mot de passe : <input name="newpass1" id="newpass1" class="form-control" type="password" required> <br/> <br/>
        Confirmez le nouveau mot de passe : <input name="newpass2" id="newpass2" class="form-control" type="password" required> <br/> <br/>
      <input type="submit" class="btn" value="Modifier"><br/><br/>
      </div>
    </div>
    </form>
  <?php
    }
    else { 
      echo "<div class='alert alert-danger'><center>Vous devez vous connecter pour accéder à cette partie du site.<br/><center></div>";
    } 
?>


<?php
	include("../footer.html");
?>