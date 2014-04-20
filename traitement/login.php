<?php
	session_start();
	if (isset($_POST['inputEmail']) && isset($_POST['inputPassword'])) {
		$mail = $_POST['inputEmail'];
		$pass = $_POST['inputPassword'];
		$mysqli = new mysqli("127.0.0.1","velo","velo","velo");
		$result = $mysqli->query("SELECT * FROM Adherent WHERE adresse_mail_adherent='".$mail."' AND password_adherent='".$pass."';");
		if($result->num_rows) {
			$_SESSION['log']=1;
			if (isset($_POST['remindMe']) && $_POST['remindMe'] == true) {
				setcookie("Session", "connected", time()+2592000, "/", "localhost");
			}
			else {
				setcookie("Session", "connected", 0, "/", "localhost");
			}
		}
		else {
			$_SESSION['log']=0;
		}
	}
	header("Location: ".$_SERVER['HTTP_REFERER']);
?>

