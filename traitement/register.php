<?php
	session_start();
	if (isset($_POST['inputNom']) && isset($_POST['inputPrenom']) && isset($_POST['inputDateNaissance']) && isset($_POST['inputAdresse']) && isset($_POST['inputCP']) && isset($_POST['inputTelephone']) && isset($_POST['inputEmail']) && isset($_POST['inputPassword']) && isset($_POST['inputConfirmPassword'])) {
		$nom = addslashes($_POST['inputNom']);
		$prenom = addslashes($_POST['inputPrenom']);
		$dateNaissance = $_POST['inputDateNaissance'];
		$u_agent = $_SERVER['HTTP_USER_AGENT'];
        if (strstr($u_agent,"Mozilla")) {
            if (!strstr($u_agent,"Chrome")) {
                $tabDate = explode('-' , $dateNaissance);
                $dateNaissance = $tabDate[2]."-".$tabDate[1]."-".$tabDate[0];
            }
        } 
		addslashes($adresse = $_POST['inputAdresse']);
		$codepostal = $_POST['inputCP'];
		$telephone = $_POST['inputTelephone'];
		$mail = $_POST['inputEmail'];
		$passwd = $_POST['inputPassword'];
		$confPass = $_POST['inputConfirmPassword'];
		include("../co.php");
		$passwd=md5($passwd);
		$query = "INSERT INTO Adherent VALUES (null,'".$nom."','".$prenom."','".$dateNaissance."','".$adresse."','".$codepostal."','".$telephone."','".$mail."','".$passwd."');";
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
