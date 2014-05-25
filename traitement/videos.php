<?php
session_start();
include("recursive.php");
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
?>

<center>
  <?php
  	include("../co.php");
  	$sql = "SELECT titre_video, lien_video FROM Video";
  	$result = $mysqli->query($sql);
  	$i = 0;
  	while (NULL !== ($row = $result->fetch_array())) {
		echo "<h3>".$row['titre_video']."</h3><br/>";
		echo '<iframe width="800" height="450" src="//www.youtube.com/embed/'.$row['lien_video'].'" frameborder="0" allowfullscreen></iframe><br/><br/>';
  		$i++;
  	}
  	if ($i == 0) {
  		echo "<h3>Pas de vidéos !</h3>";
  	}
  ?>
</center>

<?php
include("../footer.html");
?>

<!-- style="background-color:#F5F5F5;border-radius:10px;border:3px solid #222222" -->