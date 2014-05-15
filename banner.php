<?php
include("co.php");
header("Content-Type: text/plain"); // Utilisation d'un header pour spécifier le type de contenu de la page. Ici, il s'agit juste de texte brut (text/plain). 

$adresse = (isset($_GET["adresse"])) ? $_GET["adresse"] : NULL;
$atom   = '[-a-z0-9!#$%&\'*+\\/=?^_`{|}~]';   // caractères autorisés avant l'arobase
$domain = '([a-z0-9]([-a-z0-9]*[a-z0-9]+)?)'; // caractères autorisés après l'arobase (nom de domaine)
                               
$regex = '/^' . $atom . '+' .   
'(\.' . $atom . '+)*' .         
                                
'@' .                           
'(' . $domain . '{1,63}\.)+' .  
                                
$domain . '{2,63}$/i';          

if ($adresse) {
	// Faire quelque chose...
	$sql="SELECT Count(*) from Adherent Where adresse_mail_adherent='".$adresse."'";
	$res=$mysqli->query($sql);
	$row=$res->fetch_array();
	$result=$row[0];

	if((preg_match($regex, $adresse)) ){
		
		if($result==0){
			
			
			echo "<div class='alert alert-success'><center>L'adresse mail est correcte</center></div>";	
			

		}
		else{
			$sql="SELECT count(c.id_adherent) from Adherent a, Cotisation c where adresse_mail_adherent='".$adresse."'and c.id_adherent=a.id_adherent";
			
			$res=$mysqli->query($sql);
			$row=$res->fetch_row();
			$row=$row[0];
			


			if($row==0){
				echo "<div class='alert alert-warning'><center>L'adresse mail à déja utilisée pour créer un compte, et elle est en attente de validation par l'administrateur</center></div>";		
			}
			else{
				echo "<div class='alert alert-warning'><center>L'adresse mail à déja utilisée pour créer un compte, vous pouvez vous connecter en utilisant le mot de passe que vous avez définit lors de votre inscription</center></div>";
				
			}	
		}
	}		
	else{
		echo "<div class='alert alert-danger'><center>L'adresse mail n'est pas correcte</center></div>";
	}
}



?>