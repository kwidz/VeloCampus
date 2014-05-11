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
	}
  $mysqli = new mysqli("127.0.0.1","velo","velo","velo");
?>

<script>
  function verifieID() {
    if (document.getElementById("id_velo").value == -1) {
      document.getElementById("erreurIDVelo").innerHTML='<div class="alert alert-danger">Vous n\'avez aucun vélo en location.</div>';
      document.getElementById("type_velo").value = "0";
    }
    else document.getElementById("erreurIDVelo").innerHTML='';
  }

  function trouveID() {
    if (document.getElementById("type_velo").options[document.getElementById('type_velo').selectedIndex].value == 1) {
      document.getElementById("id_velo").value = 0;
    }
    else if (document.getElementById("type_velo").options[document.getElementById('type_velo').selectedIndex].value == 2) {
      <?php 
        $result = $mysqli->query("SELECT id_velo FROM Location l, Adherent a WHERE a.adresse_mail_adherent='".$_SESSION['mail']."' AND a.id_location=l.id_location");
        $id = $result->fetch_array(MYSQLI_ASSOC);
        if ($id) {
          foreach ($id as $key => $value) {
            $id_velo = $value;
          }
        }
        else $id_velo = -1;
      ?>
      document.getElementById("id_velo").value = <?php echo $id_velo; ?>;
    }
    verifieID();
  }
</script>


  <?php
    if (isset($_SESSION['log']) && $_SESSION['log'] == 1) { ?>
      <div class="row" style="background-color:#F5F5F5;border-radius:10px;border:3px solid #222222" >
      	<div class="col-md-12">
          <form method="post" name="reparation" action="envoyerReparations.php">
            <br/>
            <div>
              <center> Votre vélo est : </center><br/>
              <center>
                <select class="form-control" name="type_velo" id="type_velo" onchange="trouveID()" required>
                  <option value="" selected></option>
                  <option value="1">Personnel</option>
                  <option value="2">Loué à vélo campus</option>
                </select><br/><br/>
              </center> 
            </div>

            <input type="hidden" name="id_velo" id="id_velo" value="0">
            <center><div id="erreurIDVelo" name="erreurIDVelo"></div></center><br/>

            <div></div>
            <div>
              <center> Entrez la description de votre réparation, avec si possible la pièce à réparer : </center><br/>
              <center><textarea class="form-control" name="description" style="height:60px" required></textarea></center>
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
            <?php 
              echo '<input type="hidden" name="mail" value="'.$_SESSION["mail"].'"/>';
              $mysqli = new mysqli("127.0.0.1","velo","velo","velo");  
              $result = $mysqli->query("SELECT l.id_velo FROM Location l, Adherent a WHERE a.adresse_mail_adherent='".$_SESSION["mail"]."' AND a.id_location = l.id_location");            
              $row = $result->fetch_array(MYSQLI_ASSOC);
              if ($row) {
                foreach ($row as $i => $value) {
                  echo "<input type='hidden' name='id_velo' value='".$value."'/>";
                }
              }
              else echo "<input type='hidden' name='id_velo' value=''>";
            ?>
          </form>
        </div>
      </div>
  <?php }
    else {
      echo "<div class='alert alert-danger'><center>Vous devez vous connecter pour accéder à cette partie du site.<br/></center></div>";
    }
  ?>


<?php
	include("../footer.html");
?>