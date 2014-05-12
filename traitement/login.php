<?php
	session_start();
	if (isset($_POST['inputEmail']) && isset($_POST['inputPassword'])) {
		$mail = $_POST['inputEmail'];
		$pass = $_POST['inputPassword'];
		include("../co.php");
		$result = $mysqli->query("SELECT * FROM Adherent WHERE adresse_mail_adherent='".$mail."' AND password_adherent='".$pass."';");
		if($result->num_rows) {
			$_SESSION['log']=1;
			$_SESSION['mail']=$mail;
			if (isset($_POST['remindMe']) && $_POST['remindMe'] == true) {
				setcookie('Session', $mail, time()+2592000, "/", null);
			}
			else {
				setcookie('Session', $mail, 0, "/", null);
			}
		}
		else {
			$_SESSION['log']=0;
		}
	}
	header("Location: ".$_SERVER['HTTP_REFERER']);
?>

