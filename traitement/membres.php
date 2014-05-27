<?php
	session_start();
	include("../header.html");
	  if (isset($_COOKIE['Session']) && isset($_SESSION['mail']) && $_COOKIE['Session'] == md5(md5($_SESSION['mail'])) && isset($_SESSION['log']) && $_SESSION['log'] == 1) {
      include("../menulog.html");
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
include('../co.php');
$sql="SELECT * from Membres";
$res=$mysqli->query($sql);

while(NULL !== ($row = $res->fetch_array())) {
      $i=$row;  
      echo "<center><h3>".$i['nom_membre']."</h3></center>";
      echo '<div class="row" style="background-color:#F5F5F5;border-radius:10px;border:3px solid #222222" >
            <div class="col-md-4"> <br/>
            <img src="'.$i['photo'].'" width="380px"/>
            <br/> <br/>
            </div>';
      echo '<div class="col-md-8">
            <h4>Biographie :</h4>
            '.$i['biographie'].'
            <br/><br/>
            <h4>Statut :</h4>
            '.$i['fonction'].'
            </div>
            </div>
            ';
  }
?>

<?php
	include("../footer.html");
?>

