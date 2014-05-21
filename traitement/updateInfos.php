<?php
	session_start();
	include("../co.php");
	$_SESSION['update'] = 0;
	if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['date_naissance']) && isset($_POST['adresse']) && isset($_POST['code_postal']) && isset($_POST['tel'])) {
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$date_naissance = $_POST['date_naissance'];
		$tabDate = explode('-' , $date_naissance);
        $date_naissance = $tabDate[2]."-".$tabDate[1]."-".$tabDate[0];
		$adresse = $_POST['adresse'];
		$code_postal = $_POST['code_postal'];
		$tel = $_POST['tel'];
		$result = $mysqli->query("SELECT password_adherent FROM Adherent WHERE adresse_mail_adherent='".$_SESSION['mail']."'");
		$row = $result->fetch_array(MYSQLI_ASSOC);
		if ($row) {
			$result = $mysqli->query("UPDATE Adherent SET nom_adherent='".$nom."',prenom_adherent='".$prenom."',date_naissance_adherent='".$date_naissance."',adresse_adherent='".$adresse."',code_Postal_adherent='".$code_postal."',telephone_adherent='".$tel."' WHERE adresse_mail_adherent='".$_SESSION['mail']."'");
			if ($result) {
				$_SESSION['update'] = 1;
			}
		}
	}

	if (isset($_POST['pass']) && isset($_POST['newpass1']) && isset($_POST['newpass2'])) {
		$mdp = $_POST['pass'];
		$new_mdp = $_POST['newpass1'];
		$new_mdp2 = $_POST['newpass2'];
		if ($new_mdp == $new_mdp2) {
			$result = $mysqli->query("SELECT password_adherent FROM Adherent WHERE adresse_mail_adherent='".$_SESSION['mail']."'");
			$row = $result->fetch_array(MYSQLI_ASSOC);
			if ($row) {
				$result = $mysqli->query("UPDATE Adherent SET password_adherent='".md5($new_mdp)."' WHERE adresse_mail_adherent='".$_SESSION['mail']."'");
				if ($result) {
					$_SESSION['update'] = 2;
				}
			}
		}
	}
	header("Location: ".$_SERVER['HTTP_REFERER']);
?>
