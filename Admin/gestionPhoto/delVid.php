<?php
	session_start();
	if (isset($_POST['video'])) {
		include("../co.php");
		$video = addslashes(htmlentities($_POST['video']));
		$sql = "DELETE FROM Video WHERE titre_video='".$video."';";
		echo $sql;
		$res = $mysqli->query($sql);
		echo $res;
		if ($res) {
			$_SESSION['Vid'] = 2;
		}
		else {
			$_SESSION['Vid'] = -2;
		}
	}

	header("Location: ".$_SERVER['HTTP_REFERER']);
?>