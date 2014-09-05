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
$sql = "SELECT nom_partenaire, description_partenaire, photo_partenaire FROM Partenaire";
$result = $mysqli->query($sql);
if ($result) {
  echo "<center><table width='80%'>";
  $nom = array();
  $description = array();
  $photo = array();
  $nbPar = 0;
  while (NULL !== ($row = $result->fetch_array())) {
    array_push($nom, $row['nom_partenaire']);
    array_push($description, $row['description_partenaire']);
    array_push($photo, $row['photo_partenaire']);
    $nbPar++;
  }
  for ($i=0; $i < $nbPar; $i++) { 
    if ($i == $nbPar-1 && $nbPar%2 == 1) {
      echo "<tr><td><center><h3>".$nom[$i]."</h3></center></td></tr><tr><td><center><i>".$description[$i]."</i></center><br/></td></tr><tr><td><center><img heigth='200px' width='200px' src='../Admin/partenaires/".$photo[$i]."'></img></center></td></tr>";
    }
    else {
      echo "<tr><td><center><h3>".$nom[$i]."</h3></center></td><td><center><h3>".$nom[$i+1]."</h3></center></td></tr><tr><td><center><i>".$description[$i]."</i></center><br/></td><td><center><i>".$description[$i+1]."</i></center><br/></td></tr><tr><td><center><img heigth='200px' width='200px' src='../Admin/partenaires/".$photo[$i]."'></img><br/><br/></center></td><td><center><img heigth='200px' width='200px' src='../Admin/partenaires/".$photo[$i+1]."'></img><br/><br/></center></td></tr>";
      $i++;
    }
  }
  echo "</table></center>";
}
else {
  echo "Bad :(";
}

?>



<?php
	include("../footer.html");
?>