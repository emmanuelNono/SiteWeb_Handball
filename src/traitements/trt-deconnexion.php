<?php

// Initialisation de la session.
session_start();
session_regenerate_id();

// Détruit toutes les variables de session
$_SESSION["admin"] = 0;
$_SESSION["redac"] = 0;

// echo "admin = ".$_SESSION["admin"]."</br>";
// echo "redac = ".$_SESSION["redac"]."</br>";
// echo "id session = ".session_id()."</br>";

header('location:../body/home.php');
?>