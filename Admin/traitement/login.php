<?php
	session_start();
	if (isset($_POST['inputPseudo']) && isset($_POST['inputPassword'])) {
		$pseudo = $_POST['inputPseudo'];
		$pass = $_POST['inputPassword'];
		$mysqli = new mysqli("127.0.0.1","velo","velo","velo");
		$result = $mysqli->query("SELECT * FROM Admin WHERE pseudo_admin='".$pseudo."' AND password_admin='".$pass."';");
		if($result->num_rows) {
			$_SESSION['log']=2;
			if (isset($_POST['remindMe']) && $_POST['remindMe'] == true) {
				setcookie('Session', $pseudo, time()+2592000, "/", null);
			}
			else {
				setcookie('Session', $pseudo, 0, "/", null);
			}
		}
		else {
			$_SESSION['log']=4;
		}
	}
	header("Location: ".$_SERVER['HTTP_REFERER']);
?>
