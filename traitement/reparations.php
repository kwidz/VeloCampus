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
<script>
  function typeReparation(type) {
    switch (type) {
      case "1":
        document.getElementById('descriptionReparation').innerHTML = 
          "<center>Le temps de réparation sera de 30 minutes.</center><br/>";
        break;

      case "2":
        document.getElementById('descriptionReparation').innerHTML = 
          "<center>Le temps de réparation sera d'une heure.</center><br/>";
        break;

      case "3":
        document.getElementById('descriptionReparation').innerHTML = 
          "<center>Le temps de réparation sera de 10 minutes.</center><br/>";
        break;

      case "4":
        document.getElementById('descriptionReparation').innerHTML = 
          "<center>Ajouter une description pour préciser la réparation : <i>(50 car. max.)</i> <input type='text' class='form-control' cols='40' rows='1' placeholder='Description'/></center><br/>";
        break;

      default:
        document.getElementById('descriptionReparation').innerHTML = "";
        break;
    }
  }
</script>


<div class="row" style="background-color:#F5F5F5;border-radius:10px;border:3px solid #222222" >
  	<div class="col-md-12">
  		<?php
  			if (isset($_SESSION['log']) && $_SESSION['log'] == 1) { ?>
          <form>
            <div>
              <center> Entrez le type de votre réparation : </center>
              <center> 
                <select onchange="typeReparation(this.value)" required>
                  <option value="" selected></option>
                  <option value="1">Pneu(s) creuvé(s)</option>
                  <option value="2">Dérailleur</option>
                  <option value="3">Lampes</option>
                  <option value="4">Autres</option>
                </select><br/><br/>
              </center>
            </div>
            <div id="descriptionReparation"></div>
            <div>
              <center> Urgence de votre réparation : </center>
              <center>
                <select required>
                  <option value="" selected></option>
                  <option value="1">Peu urgent</option>
                  <option value="2">Urgent</option>
                  <option value="3">Très urgent</option>
                </select><br/><br/>
              </center>
            </div>
            <center><input type="submit" value="Demander réparation"/></center><br/>
          </form>
        <?php }
  			else {
		      echo "<center><br/>Vous devez vous connecter pour accéder à cette partie du site.<br/><br/></center>";
		    }
		?>
  	</div>
</div>


<?php
	include("../footer.html");
?>