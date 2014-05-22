<?php
	session_start();
	if (isset($_POST['titre']) && isset($_POST['lien'])) {
		include("../co.php");
		$titre = $_POST['titre'];
		$lien = $_POST['lien'];
		$link = explode("=", $lien);
		echo $link[1];
		$sql = 'INSERT INTO Video VALUES(null,"'.$titre.'","'.$link.'");';
		$res=$mysqli->query($sql);
		if ($res) {
			$_SESSION['addVid'] = 1;
			echo "good";
		}
		else echo "bad :(";
	}
?>