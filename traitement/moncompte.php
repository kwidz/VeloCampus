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
<div class="row" style="background-color:#F5F5F5;border-radius:10px;border:3px solid #222222" >
  <div class="col-md-12">
  	<?php if (isset($_SESSION['log']) && $_SESSION['log'] == 1) { ?>
        Mes infos ! :)
    <?php } 
    else { ?>
    	Vous devez être connecté pour accéder à cette partie du site.
    <?php } ?>
  </div>
</div>


<?php
	include("../footer.html");
?>