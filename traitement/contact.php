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

 	if(isset($_SESSION['email'])) {
 		if ($_SESSION['email'] == 1) {
	 		include("../banniereMailEnvoye.html");
	 	}
	 	else if ($_SESSION['email'] == -1) {
	 		include("../banniereMailErreur.html");
	 	}
	 	$_SESSION['email'] = 0;
 	}
?>

<center><h3>Situation de l'association</h3></center>
<div class="row" style="background-color:#F5F5F5;border-radius:10px;border:3px solid #222222" >
 	<div class="col-md-12">
		<br/>
		<center>
	  		<iframe width="1100" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.fr/maps?f=q&amp;source=s_q&amp;hl=fr&amp;geocode=&amp;q=rue+engel+gros+Belfort&amp;aq=&amp;sll=47.642514,6.838968&amp;sspn=0.003271,0.008256&amp;t=h&amp;ie=UTF8&amp;hq=&amp;hnear=Rue+Engel+Gros,+90000+Belfort&amp;ll=47.642301,6.838544&amp;spn=0.003271,0.008256&amp;z=16&amp;output=embed"></iframe>
	  		<br />
	  		<small>
	  			<a href="https://maps.google.fr/maps?f=q&amp;source=embed&amp;hl=fr&amp;geocode=&amp;q=rue+engel+gros+Belfort&amp;aq=&amp;sll=47.642481,6.839&amp;sspn=0.003271,0.008256&amp;t=h&amp;ie=UTF8&amp;hq=&amp;hnear=Rue+Engel+Gros,+90000+Belfort&amp;ll=47.642481,6.839&amp;spn=0.003271,0.008256&amp;z=14" style="color:#0000FF;text-align:left">Agrandir le plan</a>
	  		</small>
  		</center>
  	</div>
</div>
<br/>
<center><h3>Nous contacter par mail</h3></center>
<div class="row" style="background-color:#F5F5F5;border-radius:10px;border:3px solid #222222" >
 	<div class="col-md-12">
 		<br/>
	 	<center><b>Vous pouvez nous contacter à l'adresse suivante : </b><a href="#">velocampusdulion@gmail.com</a><br/>Ou directement par le formulaire ci-dessous :</center><br/>
	 	<center>
		 	<form method="post" action="envoiMail.php">
			 	Nom <br/><input class="form-control" type="text" name="name" id="name" required><br/><br/>
			 	Adresse mail pour vous contacter <br/><input class="form-control" type="email" name="email" id="email" required><br/><br/>
			 	Sujet du message <br/><input class="form-control" type="text" name="subject" id="subject" required><br/><br/>
			 	Votre message <br/><textarea class="form-control" style="height:300px" name="message" id="message" required></textarea><br/><br/>
			 	<input type="submit" value="Envoyer">
		 	</form>
	 	</center>
	 	<br/>
 	</div>
</div>

<?php
	include("../footer.html");
?>