<?php
  session_start();
  include("../header.html");
  if (isset($_SESSION['log']) && $_SESSION['log'] == 1) {
    include("../menulog.html");
    if (isset($_SESSION['rep']) && $_SESSION['rep'] == 1) {
      include("../banniereReparation.html");
      $_SESSION['rep'] = 0;
    }
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
  include("../co.php");
?>


  <?php
    if (isset($_SESSION['log']) && $_SESSION['log'] == 1) { 
        $result = $mysqli->query("SELECT id_velo from Location WHERE id_adherent = (SELECT id_adherent FROM Adherent WHERE adresse_mail_adherent='".$_SESSION['mail']."');");
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $id_velo = -1;
        if ($row){
          foreach ($row as $key => $value) {
           $id_velo = $value;
          }
        }
        else {
          include("../banniereReparationErreur.html");
        }
      if ($id_velo != -1) {
        $result = $mysqli->query("SELECT date_location from Location WHERE id_adherent = (SELECT id_adherent FROM Adherent WHERE adresse_mail_adherent='".$_SESSION['mail']."');");
        $row = $result->fetch_array(MYSQLI_ASSOC);
        if ($row) {
          foreach ($row as $key => $value) {
            $date_location = $value;
          }
          $tabDate = explode('-' , $date_location);
          $date_location_fr = $tabDate[2].'/'.$tabDate[1].'/'.$tabDate[0];
          echo "<center><b>La réparation demandée portera sur le vélo que vous louez depuis le ".$date_location_fr.".</b></center><br/>";
          ?>
          <div class="row" style="background-color:#F5F5F5;border-radius:10px;border:3px solid #222222" >
            <div class="col-md-12">
              <form method="post" name="reparation" action="envoyerReparations.php">
                <br/>
                <input type="hidden" name="id_velo" id="id_velo" value="<?php echo $id_velo;?>">
                <div></div>
                <div>
                  <center> Entrez une brève description de votre réparation : </center><br/>
                  <center><input type="text" class="form-control" name="description" required></center>
                </div><br/><br/>

                <div>
                  <center> Urgence de votre réparation : </center><br/>
                  <center>
                    <select class="form-control" name="urgence" required>
                      <option value="" selected></option>
                      <option value="1">Peu urgent</option>
                      <option value="2">Urgent</option>
                      <option value="3">Très urgent</option>
                    </select><br/><br/>
                  </center>
                </div><br/>
                <center><input type="submit" value="Demander réparation"/></center><br/>
              </form>
            </div>
          </div>
        <?php }
        else {
          echo "<div class='alert alert-warning'><center>Vous devez avoir loué un vélo pour pouvoir faire une demande de réparation en ligne. Pour les vélos personnels, veuillez vous rendre directement à l'association.<br/></center></div>";
        }
      }
    }
    else {
      echo "<div class='alert alert-danger'><center>Vous devez vous connecter pour accéder à cette partie du site.<br/></center></div>";
    }
  ?>


<?php
  include("../footer.html");
?>
