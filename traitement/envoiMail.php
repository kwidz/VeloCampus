<?php
	session_start();
	$EmailFrom = $_POST['email']; 
	$EmailTo = "pierre.limballe@gmail.com";
	$Subject = $_POST['subject'];
	$Name = Trim(stripslashes($_POST['name'])); 
	$Message = Trim(stripslashes($_POST['message'])); 
	
	$Body = "Message de : ".$Name."\n"."Contenu : \n\n".$Message;
	$success = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");
	
	if ($success) {
		$_SESSION['mail'] = 1;
	}

	else {
		$_SESSION['mail'] = -1;
	}
	header("Location: ".$_SERVER['HTTP_REFERER']);
?>
