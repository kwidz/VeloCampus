<?php
session_start();
	// $referer = $_SERVER['HTTP_REFERER'];
if (isset($_POST['inputPseudo']) && isset($_POST['inputPassword'])&& !empty($_POST['inputPseudo']) && !empty($_POST['inputPassword'])) {
	if($_POST['inputPseudo']==="Admin" || $_POST['inputPseudo']==="admin"){
		$pseudo = $_POST['inputPseudo'];
		$passwd = $_POST['inputPassword'];
		$passwd=md5($passwd);
		require_once("../co.php");
		$result = $mysqli->query("SELECT * FROM Admin WHERE pseudo_admin='".$pseudo."' AND password_admin='".$passwd."';");
		if($result->num_rows) {
			$_SESSION['log']=3;
			if (isset($_POST['remindMe']) && $_POST['remindMe'] == true) {
				setcookie('Session', md5(md5("carotte")), time()+2592000, "/", null);
			}
			else {
				setcookie('Session', md5(md5("carotte")), 3600, "/", null);
			}
		}
		else {
			$_SESSION['log']=4;
		}
	}
	else {
			$_SESSION['log']=18;
		}
}
	// header("Location: ".$referer);
?>

<script type="text/javascript">
document.location.href="../";
</script>
