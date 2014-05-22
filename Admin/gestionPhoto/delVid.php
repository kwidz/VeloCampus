<?php
	session_start();
	if (isset($_POST['video'])) {
		include("../co.php");
		$video = $_POST['video'];
		$sql = "DELETE FROM Video WHERE titre_video='".$video."';";
		$res = $mysqli->query($sql);
		if ($res) {
			$_SESSION['Vid'] = 2;
			header("Location: ".$_SERVER['HTTP_REFERER']);
		}
		else {
			$_SESSION['Vid'] = -1;
			header("Location: ".$_SERVER['HTTP_REFERER']);
		}
	}
?>