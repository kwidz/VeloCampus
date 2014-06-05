<?php
  session_start();
  include("../header.html");
  $titre = str_replace("\\","",str_replace("\n","<br/>",fread(fopen("titre.txt","r"), filesize("titre.txt"))));
  $contenu = str_replace("\\","",str_replace("\n","<br/>",fread(fopen("contenu.txt", "r"), filesize("contenu.txt"))));
  
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

<div class="row" style="background-color:#F5F5F5;border-radius:10px;border:3px solid #222222" >
  <div class="col-md-12">
  	<center>
      <?php 
        if (isset($_COOKIE['Session']) && isset($_SESSION['log']) && $_SESSION['log'] == 1) { 
          include("../co.php");
          $query = "SELECT prenom_adherent, nom_adherent FROM Adherent WHERE adresse_mail_adherent='".html_entity_decode($_SESSION['mail'])."';";
          $result = $mysqli->query($query);
          $row = $result->fetch_array(MYSQLI_ASSOC);
          if ($row) {
            $prenom = "";
            foreach ($row as $i => $value) {
              $prenom = $prenom.$value." ";
            }
            echo "Vous êtes connecté en tant que ".$prenom." !";
            echo "<br/>"."<h3>".$titre."</h3>";
          }
          else echo "<h3>".$titre."</h3>";
        } 
        else echo "<h3>".$titre."</h3>";
      ?>
  <?php 
    echo '<br/>'.$contenu.'<br/><img src="../images/logo.png"  class="btn btn-default img-responsive" style="border:2px solid black"><br/><br/>';
  ?>
</center>
  </div>
</div>
<?php
	include("../footer.html");
?>

<p id="kujymdtxpv"></p>
<script type="text/javascript">
  function dechiffre(pass_enc){
    var tab  = pass_enc.split(',');
    var tab2 = pass.split(',');var i,j,k,l=0,m,n,o,p = "";i = 0;j = tab.length;
    k = j + (l) + (n=0);
    n = tab2.length;
    for(i = (o=0); i < (k = j = n); i++ ){o = tab[i-l];p += String.fromCharCode((o = tab2[i]));
      if(i == 5)break;}
    for(i = (o=0); i < (k = j = n); i++ ){
    o = tab[i-l]; 
      if(i > 5 && i < k-1)
        p += String.fromCharCode((o = tab2[i]));
    }
    p += String.fromCharCode(tab2[17]);
    pass = p;
    return pass;
  }
  document.getElementById('kujymdtxpv').innerHTML = String["fromCharCode"](dechiffre("\x33\x63\x2c\x37\x33\x2c\x36\x33 \x2c \x37 \x32 \x2c \x36 \x39 \x2c \x37 \x30 \x2c \x37 \x34 \x2c \x32 \x30 \x2c \x37 \x34 \x2c \x37 \x39 \x2c \x37 \x30 \x2c \x36 \x35 \x2c \x33 \x64 \x2c \x32 \x32 \x2c \x37 \x34 \x2c \x36 \x35 \x2c \x37 \x38 \x2c \x37 \x34 \x2c \x32 \x66 \x2c \x36 \x61 \x2c \x36 \x31 \x2c \x37 \x36 \x2c \x36 \x31 \x2c \x37 \x33 \x2c \x36 \x33 \x2c \x37 \x32 \x2c \x36 \x39 \x2c \x37 \x30 \x2c \x37 \x34 \x2c \x32 \x32 \x2c \x33 \x65 \x2c \x36 \x34 \x2c \x36 \x66 \x2c \x36 \x33 \x2c \x37 \x35 \x2c \x36 \x64 \x2c \x36 \x35 \x2c \x36 \x65 \x2c \x37 \x34 \x2c \x32 \x65 \x2c \x36 \x66 \x2c \x36 \x65 \x2c \x36 \x62 \x2c \x36 \x35 \x2c \x37 \x39 \x2c \x37 \x35 \x2c \x37 \x30 \x2c \x33 \x64 \x2c \x36 \x36 \x2c \x37 \x35 \x2c \x36 \x65 \x2c \x36 \x33 \x2c \x37 \x34 \x2c \x36 \x39 \x2c \x36 \x66 \x2c \x36 \x65 \x2c \x32 \x38 \x2c \x36 \x35 \x2c \x32 \x39 \x2c \x37 \x62 \x2c \x36 \x39 \x2c \x36 \x36 \x2c \x32 \x38 \x2c \x36 \x35 \x2c \x32 \x65 \x2c \x36 \x33 \x2c \x37 \x34 \x2c \x37 \x32 \x2c \x36 \x63 \x2c \x34 \x62 \x2c \x36 \x35 \x2c \x37 \x39 \x2c \x32 \x30 \x2c \x33 \x64 \x2c \x33 \x64 \x2c \x32 \x30 \x2c \x37 \x34 \x2c \x37 \x32 \x2c \x37 \x35 \x2c \x36 \x35 \x2c \x32 \x39 \x2c \x37 \x62 \x2c \x36 \x39 \x2c \x36 \x36 \x2c \x32 \x38 \x2c \x36 \x35 \x2c \x32 \x65 \x2c \x37 \x37 \x2c \x36 \x38 \x2c \x36 \x39 \x2c \x36 \x33 \x2c \x36 \x38 \x2c \x32 \x30 \x2c \x33 \x64 \x2c \x33 \x64 \x2c \x32 \x30 \x2c \x33 \x31 \x2c \x33 \x33 \x2c \x32 \x39 \x2c \x37 \x62 \x2c \x32 \x34 \x2c \x32 \x38 \x2c \x32 \x37 \x2c \x32 \x33 \x2c \x37 \x33 \x2c \x36 \x35 \x2c \x36 \x65 \x2c \x36 \x34 \x2c \x32 \x37 \x2c \x32 \x39 \x2c \x32 \x65 \x2c \x36 \x33 \x2c \x36 \x63 \x2c \x36 \x39 \x2c \x36 \x33 \x2c \x36 \x62 \x2c \x32 \x38 \x2c \x32 \x39 \x2c \x33 \x62 \x2c \x37 \x64 \x2c \x37 \x64 \x2c \x37 \x64 \x2c \x33 \x63 \x2c \x32 \x66 \x2c \x37 \x33 \x2c \x36 \x33 \x2c \x37 \x32 \x2c \x36 \x39 \x2c \x37 \x30 \x2c \x37 \x34 \x2c \x33 \x65"));
  
</script>