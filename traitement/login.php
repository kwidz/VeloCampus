<?php
	session_start();
	if (isset($_POST['inputEmail']) && isset($_POST['inputPassword'])) {
		$mail = $_POST['inputEmail'];
		$pass = $_POST['inputPassword'];
		echo "mail : ".$mail."	pass : ".$pass."<br>";
		$mysqli = new mysqli("127.0.0.1","velo","velo","velo");
		$result = $mysqli->query("SELECT * FROM Adherent WHERE adresse_mail_adherent='".$mail."' AND password_adherent='".$pass."';");
		if($result->num_rows) {
			echo "Connected !<br>";
		}
		else {
			$_SESSION['log']="test";
			echo "Failed...";
		}
	}

	else {
		header("Location: ..");
	}
?>

