<?php
	session_start();
	if (isset($_POST['inputNom']) && isset($_POST['inputPrenom']) && isset($_POST['inputDateNaissance']) && isset($_POST['inputAdresse']) && isset($_POST['inputCP']) && isset($_POST['inputTelephone']) && isset($_POST['inputEmail']) && isset($_POST['inputPassword']) && isset($_POST['inputConfirmPassword'])) {
		$nom = $_POST['inputNom'];
		$prenom = $_POST['inputPrenom'];
		$dateNaissance = $_POST['inputDateNaissance'];
		$adresse = $_POST['inputAdresse'];
		$codepostal = $_POST['inputCP'];
		$telephone = $_POST['inputTelephone'];
		$mail = $_POST['inputEmail'];
		$pass = $_POST['inputPassword'];
		$confPass = $_POST['inputConfirmPassword'];
		$lienImage = null;
		
		if (isset($_FILES['inputPhoto'])) {
			$erreur = "";
			if ($_FILES['inputPhoto']['error'] > 0) $erreur = "Erreur lors du transfert";
			else {
				$maxsize = 5242880;
				$extensions_valides = array('jpg', 'jpeg', 'gif', 'png');

				$extension_upload = strtolower(substr(strrchr($_FILES['inputPhoto']['name'], '.'), 1));
				if (in_array($extension_upload,$extensions_valides)) {
					echo "Extension correcte.<br/>";
					if ($_FILES['inputPhoto']['size'] > $maxsize) $erreur = "Le fichier est trop gros";
					else {
						$lienImage = "../images/avatars/".$nom.$prenom."av.{$extension_upload}";
						$move = move_uploaded_file($_FILES['inputPhoto']['tmp_name'],$lienImage);
						if ($move) echo "Transfert done.<br/>";
					}
				}
				else echo "Extension incorrecte";
			}
			echo $erreur;
		}

		$mysqli = new mysqli("127.0.0.1","velo","velo","velo");
		$query = "INSERT INTO Adherent VALUES (null,'".$nom."','".$prenom."','".$dateNaissance."','".$adresse."','".$codepostal."','".$telephone."','".$mail."','".$pass."','".$lienImage."',null);";
		$result = $mysqli->query($query);
		if($result) {
			$_SESSION['log']=2;
		}
		else {
			$_SESSION['log']=0;
		}
	}
	header("Location: ".$_SERVER['HTTP_REFERER']);
?>
