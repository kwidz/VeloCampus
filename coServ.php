<?php
    $serveur="mysql5-9.perso";
    $user="velocampvelo";
    $pass="bmnrGsO1";
    $base="velocampvelo";
    $mysqli = new mysqli($serveur, $user, $pass, $base);
    if ($mysqli->connect_error) {
        die('Erreur de connexion ('.$mysqli->connect_errno.')'. $mysqli->connect_error);
    }
?>
