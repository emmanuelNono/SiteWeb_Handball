<?php

require_once '../includes/Database.php';
require_once '../class/Authentification.php';

// recupetation des variables du formulaire
$login = trim($_POST["login"]);
$mdp = trim($_POST["MdP"]);

// connexion à la base
$o_db = new Database();
$o_conn = $o_db->makeConnect();

if ($o_conn === false){
    echo "Echec de connexion";
}
else{
    // verification de l'utilisateur
    $a = new Authentification();
    $util = $a->verificationUtilisateur($o_conn, $login, $mdp);

    if (count($util) > 0){
        if ($util[0]["per_admin"] == 1){
            echo "admin";
            $_SESSION["admin"] = 1;
        }
        else
        {
            // pas de droit admin
            header("location:login.php?mes=pasDeDroit");
        }
    }
    else
    {
        // utilisateur non enregistré
        header("location:login.php?mes=pasDUtilisateur");
    }
}

