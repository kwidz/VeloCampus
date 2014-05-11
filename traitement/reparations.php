<?php
	session_start();
	include("../header.html");
	if (isset($_SESSION['log']) && $_SESSION['log'] == 1) {
    	include("../menulog.html");
      if (isset($_SESSION['res']) && $_SESSION['res'] == 1) {
        include("../banniereReparation.html");
        $_SESSION['res'] = 0;
      }
  	}
  	else {
    	include("../menu.html");
    	if (isset($_SESSION['log']) && $_SESSION['log'] == 0) {
	        $_SESSION = array(); 
    		include("../banniereErreurConn.html");
    	}
  	}

?>

<!-- <script>
  function typeReparation() {
    var m=0; 
    for (i=1;i<7;i++) { 
      if (eval("document.forms.reparation.checkbox"+i+".checked == true")){
        m=m+1;
      }
    } 
    if (m>=3) {
      alert("Vous avez fait 3 choix ou plus");
    } else {
      alert("Vous devez cocher 3 choix ou plus");
    }
  }
</script> -->


  <?php
    if (isset($_SESSION['log']) && $_SESSION['log'] == 1) { ?>
      <div class="row" style="background-color:#F5F5F5;border-radius:10px;border:3px solid #222222" >
      	<div class="col-md-12">
          <form method="post" name="reparation" action="envoyerReparations.php">
            <br/>
            <div>
              <center> Votre vélo est : </center><br/>
              <center>
                <select class="form-control" name="id_velo" required>
                  <option value="" selected></option>
                  <option value="1">Personnel</option>
                  <option value="2">Loué à vélo campus</option>
                </select><br/><br/>
              </center> 
            </div><br/>

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