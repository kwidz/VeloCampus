<?php
	session_start();
	include("../header.html");
	if (isset($_SESSION['log'])) {
    	include("../menulog.html");
  	}
  	else {
    	include("../menu.html");
  	}

?>
<div class="row" style="background-color:Gainsboro;border-radius:10px;border:3px solid #222222" >
  <div class="col-md-12">
        EXEMPLE : <br/>
        il faut ecrire dedans

  </div>
</div>


<?php
	include("../footer.html");
?>