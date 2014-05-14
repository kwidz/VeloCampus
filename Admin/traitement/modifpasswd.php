<?php
  include("../co.php");
  session_start();
  $mdp0 = md5($_POST['mdp0']);
  $mdp1 = md5($_POST['mdp1']);
  $mdp2 = md5($_POST['mdp2']);
  $sql="SELECT password_admin from Admin where pseudo_admin='Admin'";
  $query=$mysqli->query($sql);
  $mdpbase=$query->fetch_array();
  $mdpbase=$mdpbase[0];

  
  if ($mdp0==$mdpbase && $mdp1 == $mdp2){
    $sql="UPDATE Admin SET `password_admin` = '".$mdp1."' WHERE `Admin`.`pseudo_admin` ='Admin'";
		    
    $query=$mysqli->query($sql);
    $_SESSION['modif']="mdptrue";
  }
  else{
    $_SESSION['modif']="mdpfalse";
  }
  
  header("Location: ".$_SERVER['HTTP_REFERER']);
?>
