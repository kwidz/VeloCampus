<?php
    $serveur="localhost";
    $user="velo";
    $pass="velo";
    $base="velo"; 
    $mysqli = new mysqli($serveur, $user, $pass, $base);
    if ($mysqli->connect_error) {
        die('Erreur de connexion ('.$mysqli->connect_errno.')'. $mysqli->connect_error);
    }

    ?>