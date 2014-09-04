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

include("../co.php");
//
// Les parties commentées sont les "vraies"
//
$sql = "SELECT nom_partenaire, description_partenaire, photo_partenaire FROM Partenaire";
$result = $mysqli->query($sql);
if ($result) {
  echo "<center>";
  while (NULL !== ($row = $result->fetch_array())) {
    echo "<h3>".$row['nom_partenaire']."</h3>";
    echo "<i>".$row['description_partenaire']."</i><br/><br/>";
    echo "<img heigth='200px' width='200px' src='../Admin/partenaires/".$row['photo_partenaire']."'></img><br/><br/><br/>";
  }
  echo "</center>";
}
else {
  echo "Bad :(";
}

?>



<?php
	include("../footer.html");
?>