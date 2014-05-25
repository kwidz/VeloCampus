<?php
	session_start();
	if (isset($_POST['nom']) && isset($_POST['description'])) {
		$nom = $_POST['nom'];
		$description = $_POST['description'];
		$photo = "photos/".$_FILES['photo']['name'];
		include("../co.php");
		$sql = "INSERT INTO Partenaire VALUES(null,'".$nom."','".$description."','".$photo."');";
		$result = $mysqli->query($sql);
		if ($result) {
			$_SESSION['ajPar'] = 1;
			$types = array('image/jpg','image/jpeg','image/png','image/gif','image/bmp');
			print_r($_FILES);
			echo $_FILES['photo']['type'];
			if(!in_array($_FILES['photo']['type'], $types)){
				$erreur="erreurfich";
				$_SESSION['ajPar'] = -1;
			}
			else{
				exec('chmod -R 777 photos');
				$nom='photos/'.$_FILES['photo']['name'];	
				$resultat = move_uploaded_file($_FILES['photo']['tmp_name'],$nom);
				if($resultat)
					$_SESSION['ajPar'] = 1;
				else
					$_SESSION['ajPar'] = -1;
			}
		}
		else {
			$_SESSION['ajPar'] = -1;
		}
	}
	else echo "haha";
	echo $_SESSION['ajPar'];
	header("Location: ".$_SERVER['HTTP_REFERER']);
?>