<?php
	session_start();
	include("../header.html");
	if (isset($_SESSION['log']) && $_SESSION['log'] == 1) {
    	include("../menulog.html");
  	}
  	else {
    	include("../menu.html");
    	if (isset($_SESSION['log']) && $_SESSION['log'] == 0) {
    		include("../banniereErreurConn.html");
    	}
  	}

?>
<div class="row" style="background-color:Gainsboro;border-radius:10px;border:3px solid #222222" >
  	<div class="col-md-12">
  		<?php
  			if (isset($_SESSION['log'])) {
  				echo "<center><br/>Vous êtes bien connecté ! Aucune répartions de prévu pour le moment.<br/><br/></center>";
  			}
  			else {
		        echo "<center><br/>Vous devez vous connecter pour accéder à cette partie du site.<br/><br/></center>";
		    }
		?>
  	</div>
</div>


<?php
	include("../footer.html");
?>