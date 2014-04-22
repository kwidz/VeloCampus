<?php
/*
 *Ce script permet de parcourir Une arborescence de facon 
 *recursive et ainsi afficher le contenu des dossiers qu'ils contiennent 
 */
function parcourir_repertoire($repertoire)
{
    $le_repertoire = opendir($repertoire) or die("Erreur le repertoire $repertoire existe pas");
    while($fichier = @readdir($le_repertoire))
    {

        // enlever les traitements inutile
        if ($fichier == "." || $fichier == "..") continue;


        if(is_dir($repertoire.'/'.$fichier))
        {
            print '<h3><center>'.$fichier.'</center></h3>';
            print '<ul class="row" style="background-color:#F5F5F5;border-radius:10px;border:3px solid #222222";>';
            parcourir_repertoire($repertoire.'/'.$fichier);
            print '</ul>';
        }
        else
        {
            // mes modifs
            $tailleImage = getimagesize($repertoire.'/'.$fichier);
            if ($tailleImage[0] > $tailleImage[1]) {
              $coeff = $tailleImage[0] / 300;
              $tailleModif = $tailleImage[1]/$coeff;
              print '<li class="col-lg-2 col-md-2 col-sm-3 col-xs-4" style="margin:15px; width:190px; height:190px; overflow:hidden;"><img width="300px" height="'.$tailleModif.'px" style="clip: rect(0px, 50px, 50px, 0px);"src="'.$repertoire.'/'.$fichier.'"/></li>';
            }
            else if ($tailleImage[1] > $tailleImage[0]) {
              $coeff = $tailleImage[1] / 300;
              $tailleModif = $tailleImage[0]/$coeff;
              print '<li class="col-lg-2 col-md-2 col-sm-3 col-xs-4" style="margin:15px; width:190px; height:190px; overflow:hidden;"><img width="'.$tailleModif.'px" height="300px" src="'.$repertoire.'/'.$fichier.'"/></li>';
            }
            //print '<li class="col-lg-2 col-md-2 col-sm-3 col-xs-4" style="padding:15px"><img height="180px" width="180px" style="clip: rect(0px, 50px, 50px, 0px);" src="'.$repertoire.'/'.$fichier.'"/></li>';
        }
    }
    closedir($le_repertoire);
}

 ?>