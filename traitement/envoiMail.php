<?php
	session_start();
	$Email = $_POST['email']; 
	$EmailFrom = "site@velocampus.fr";
	$EmailTo = "velocampusdulion@gmail.com";
	$Subject = $_POST['subject'];
	$Name = Trim(stripslashes($_POST['name'])); 
	$Message = Trim(stripslashes($_POST['message'])); 
	
	$Body = "Message de : ".$Name."\n"."Adresse de contact : ".$Email."\n"."Contenu : \n\n".$Message;
	$success = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");
	
	if ($success) {
		$_SESSION['email'] = 1;
	}

	else {
		$_SESSION['email'] = -1;
	}
	header("Location: ".$_SERVER['HTTP_REFERER']);
?>
