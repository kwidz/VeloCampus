<?php
session_start();
include("recursive.php");
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
  <h3> Première vidéo ! </h3>
  <iframe width="560" height="315" src="//www.youtube.com/embed/iktNXq3K5ps" frameborder="0" allowfullscreen></iframe>
  <!-- <iframe width="711" height="400" src="//www.youtube.com/embed/iktNXq3K5ps" frameborder="0" allowfullscreen></iframe> -->
  <!-- 400 711 -->
</center>

<?php
include("../footer.html");
?>

<!-- style="background-color:#F5F5F5;border-radius:10px;border:3px solid #222222" -->