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
</script>


<div class="row" style="background-color:#F5F5F5;border-radius:10px;border:3px solid #222222" >
  	<div class="col-md-12">
  		<?php
  			if (isset($_SESSION['log']) && $_SESSION['log'] == 1) { ?>
          <form name="reparation">
            <div>
              <center> Votre vélo est : </center>
              <center>
                <select required>
                  <option value="" selected></option>
                  <option value="1">Personnel</option>
                  <option value="2">Loué à vélo campus</option>
                </select><br/><br/>
              </center> 
            </div>

            <div></div>

            <div>
              <center> Quelle sera la/les pièces à réparer : </center>
              <center> 
                <input type="checkbox" name="p1" value="1"> Selle              
                <input type="checkbox" name="p2" value="2"> Guidon
                <input type="checkbox" name="p3" value="3"> Pédale
                <input type="checkbox" name="p4" value="4"> Chaine
                <input type="checkbox" name="p5" value="5"> Dérailleur avant<br/>
                <input type="checkbox" name="p6" value="6"> Béquille
                <input type="checkbox" name="p7" value="7"> Pneu
                <input type="checkbox" name="p8" value="8"> Chambre à air
                <input type="checkbox" name="p9" value="9"> Béquille
                <input type="checkbox" name="p10" value="10"> Cadre<br/>
                <input type="checkbox" name="p11" value="11"> Dérailleur arrière
                <input type="checkbox" name="p12" value="12"> Pédalier
                <input type="checkbox" name="p13" value="13"> Manette débrailleur
                <input type="checkbox" name="p14" value="14"> Éclairages
                <input type="checkbox" name="p15" value="15"> Patin de frein<br/>
                <input type="checkbox" name="p16" value="16"> Disque de frein
              </center>
            </div><br/>

            <div id="autreReparation"></div>

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