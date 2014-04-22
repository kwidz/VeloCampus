
<?php
session_start();
include("../header.html");
if (isset($_SESSION['log']) && $_SESSION['log'] == 2) {
  include("../menulog.html");
  if(isset($_GET['directory'])){
    supprimer($_GET['directory']);
  }
  else if(isset($_GET['supprimer']) && $_GET['supprimer']=="dossier"){
    supprimerDossier();
  }
  else if(isset($_GET['supprimer']) && $_GET['supprimer']=="photo"){
    supprimerPhoto();
  }
  else{ ?>
  <div class="col-md-6" >
    <ul class="nav nav-pills nav-stacked">
      <li class="active" style="text-align: center; margin-bottom: 15px;"><a href="supprimer.php?supprimer=dossier">Supprimer un album</a></li>
      <li class="active" style="text-align: center; margin-bottom: 15px;"><a href="supprimer.php?supprimer=photo">Supprimer une photo</a></li>
    </ul>
    </div><?php
  }
  include("../demandeInscription.php");
}
else {
  include("../menu.html");
  if (isset($_SESSION['log']) && $_SESSION['log'] == 4) {
    $_SESSION = array(); 
    ?>
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-danger">Aucune correspondance Pseudo/mot de passe trouvée. Veuillez réessayer.</div>
      </div>
      </div><?php
    }
  }
  ?>



  <?php
  include("../footer.html");

  function supprimerDossier(){?>
  <div class="col-md-6" >
    <?php
    recursDossier("../../images/photos");
    ?>
    </div><?php

  }
  function supprimerPhoto(){?>
  <div class="col-md-6" >
    <?php
    recursimg("../../images/photos");
    ?>
    </div><?php

  }

  function recursDossier($repertoire)
  {
    $le_repertoire = opendir($repertoire) or die("Erreur le repertoire $repertoire existe pas");
    while($fichier = @readdir($le_repertoire))
    {

        // enlever les traitements inutile
      if ($fichier == "." || $fichier == "..") continue;


      if(is_dir($repertoire.'/'.$fichier))
      {
        print '<h3>'.$fichier.' <a href="supprimer.php?directory='.$repertoire.'/'.$fichier.'" class="btn btn-danger" style="float: right">Supprimer</a></h3><br/>';


        recursDossier($repertoire.'/'.$fichier);

      }
      else
      {
        continue;
      }
    }
    closedir($le_repertoire);
  }

  function supprimer($directory){
    if (is_dir($directory)){

      goodby($directory) ;

    print ("<script language = \"JavaScript\">");
    print ("location.href = 'supprimer.php?supprimer=dossier';");
    print ("</script>");  

    }
    else{
      unlink( $directory);
      print ("<script language = \"JavaScript\">");
      print ("location.href = 'supprimer.php?supprimer=photo';");
      print ("</script>");
    }



  }

  function goodby( $dir )
  {

 // ajout du slash a la fin du chemin s'il n'y est pas
   if( !preg_match( "/^.*\/$/", $dir ) ) $dir .= '/';

 // Ouverture du repertoire demande
   $handle = @opendir( $dir );

 // si pas d'erreur d'ouverture du dossier on lance le scan
   if( $handle != false )
   {

  // Parcours du repertoire
    while( $item = readdir($handle) )
    {
     if($item != "." && $item != "..")
     {
      if( is_dir( $dir.$item ) )
       advRmDir( $dir.$item );
     else unlink( $dir.$item );
   }
 }
 
  // Fermeture du repertoire
 closedir($handle);
 
  // suppression du repertoire
 $res = rmdir( $dir );
 
}
else $res = false;

return $res;

}


function recursimg($repertoire)
{
  $le_repertoire = opendir($repertoire) or die("Erreur le repertoire $repertoire existe pas");
  while($fichier = @readdir($le_repertoire))
  {

        // enlever les traitements inutile
    if ($fichier == "." || $fichier == "..") continue;


    if(is_dir($repertoire.'/'.$fichier))
    {
      print '<h3>'.$fichier.' </h3><br/>';


      recursimg($repertoire.'/'.$fichier);

    }
    else
    {
      print '<img width="120px" src="'.$repertoire.'/'.$fichier.'"/>';
      print '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
      print '<a href="supprimer.php?directory='.$repertoire.'/'.$fichier.'" class="btn btn-danger" >Supprimer</a><br/><br/>';
    }
  }
  closedir($le_repertoire);
}