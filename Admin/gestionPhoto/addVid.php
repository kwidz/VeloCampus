<?php
	session_start();
	if (isset($_POST['titre']) && isset($_POST['lien'])) {
		include("../co.php");
		$titre = addslashes(htmlentities($_POST['titre']));
		$lien = $_POST['lien'];
		function multiexplode ($delimiters,$string) {
   			$ready = str_replace($delimiters, $delimiters[0], $string);
    		$launch = explode($delimiters[0], $ready);
    		return  $launch;
		}
		$link = multiexplode(array("=","&"), $lien);
		echo $link[1];
		$sql = 'INSERT INTO Video VALUES(null,"'.$titre.'","'.$link[1].'");';
		$res=$mysqli->query($sql);
		if ($res) {
			$_SESSION['Vid'] = 1;
		}
		else $_SESSION['Vid'] = -1;
	}
	header("Location: ".$_SERVER['HTTP_REFERER']);
?>