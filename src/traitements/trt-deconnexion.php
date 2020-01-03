<?php

// Initialisation de la session.
session_start();
session_regenerate_id(true);

// Détruit toutes les variables de session
$_SESSION["admin"] = 0;

echo "admin = ".$_SESSION["admin"];
echo session_id();

// header('location:../body/home.php');
?>