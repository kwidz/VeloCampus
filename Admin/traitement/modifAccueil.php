<?php
  session_start();
  $titre = $_POST['titre'];
  $contenu = $_POST['contenu'];
  exec("echo -n '' > ../../accueil/titre.txt"); 
  exec("echo -n '' > ../../accueil/contenu.txt");  
  $openTitre = fopen("../../accueil/titre.txt","wr");
  $openContenu = fopen("../../accueil/contenu.txt", "wr");
  fputs($openTitre, $titre);
  fputs($openContenu, $contenu);
  header("Location: ".$_SERVER['HTTP_REFERER']);
?>
