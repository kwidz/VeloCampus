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
  <?php include("videos.txt") ?>
</center>

<?php
include("../footer.html");
?>

<!-- style="background-color:#F5F5F5;border-radius:10px;border:3px solid #222222" -->