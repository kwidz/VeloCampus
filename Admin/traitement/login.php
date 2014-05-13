<?php
	session_start();
	if (isset($_POST['inputPseudo']) && isset($_POST['inputPassword'])) {
		$pseudo = $_POST['inputPseudo'];
		$passwd = $_POST['inputPassword'];
		require_once("../co.php");
		$result = $mysqli->query("SELECT * FROM Admin WHERE pseudo_admin='".$pseudo."' AND password_admin='".$passwd."';");
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
