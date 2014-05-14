<?php
    $serveur="database";
    $user="velocampus";
    $pass="velocampus90";
    $base="velocampus";
    $mysqli = new mysqli($serveur, $user, $pass, $base);
    if ($mysqli->connect_error) {
        die('Erreur de connexion ('.$mysqli->connect_errno.')'. $mysqli->connect_error);
    }
?>
