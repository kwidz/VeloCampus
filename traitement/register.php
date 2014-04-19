<?php
	session_start();
	if (isset($_POST['inputNom']) && isset($_POST['inputPrenom']) && $_POST['inputDateNaissance'] && $_POST['inputAdresse'] && $_POST['inputCP'] && $_POST['inputTelephone'] && isset($_POST['inputEmail']) && isset($_POST['inputPassword']) && isset($_POST['inputConfirmPassword'])) {
		$nom = $_POST['inputNom'];
		$prenom = $_POST['inputPrenom'];
		$dateNaissance = $_POST['inputDateNaissance'];
		$adresse = $_POST['inputAdresse'];
		$codepostal = $_POST['inputCP'];
		$telephone = $_POST['inputTelephone'];
		$mail = $_POST['inputEmail'];
		$pass = $_POST['inputPassword'];
		$confPass = $_POST['inputConfirmPassword'];
		if (isset($_POST['inputPhoto'])) {
			$photo = $_POST['inputPhoto'];
		}
		echo $photo;
		$mysqli = new mysqli("127.0.0.1","velo","velo","velo");
		$query = "INSERT INTO Adherent VALUES (null,'".$nom."','".$prenom."','".$dateNaissance."','".$adresse."','".$codepostal."','".$telephone."','".$mail."','".$pass."',null,null,null);";
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
