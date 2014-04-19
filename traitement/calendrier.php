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


<div class="row" style="background-color:#F5F5F5; border-radius:10px;border:3px solid #222222">
  <div class="col-md-12">
  	<br/><br/>
		<center>
			
		<iframe src="https://www.google.com/calendar/embed?src=81oih6btp059542v3p1vap1m6k%40group.calendar.google.com&ctz=Europe/Paris" style="border: 0" width="1000" height="600" frameborder="0" scrolling="no"></iframe>
	</center>

<br/><br/>
  </div>
</div>

      


<?php
	include("../footer.html");
?>