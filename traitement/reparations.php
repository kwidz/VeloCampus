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
        document.getElementById('tempsReparation').innerHTML = 
          "<center>Le temps de réparation sera de 30 minutes.</center><br/>";
        break;

      case "2":
        document.getElementById('tempsReparation').innerHTML = 
          "<center>Le temps de réparation sera d'une heure.</center><br/>";
        break;

      case "3":
        document.getElementById('tempsReparation').innerHTML = 
          "<center>Le temps de réparation sera de 10 minutes.</center><br/>";
        break;

      default:
        document.getElementById('tempsReparation').innerHTML = "";
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
                  <option value="0" selected></option>
                  <option value="1">Pneu(s) creuvé(s)</option>
                  <option value="2">Dérailleur</option>
                  <option value="3">Lampes</option>
                </select> <br/><br/>
              </center>
            </div>
            <div id="tempsReparation"></div>
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