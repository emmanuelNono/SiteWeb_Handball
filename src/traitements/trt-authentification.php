<?php

require_once '../includes/Database.php';
require_once '../class/Authentification.php';

// recuperation des variables du formulaire
$login = trim($_POST["login"]);
$mdp = trim($_POST["MdP"]);

// connexion à la base
$o_db = new Database();
$o_conn = $o_db->makeConnect();

if ($o_conn === false){
    echo "Echec de connexion";
}
else {
    // verification de l'utilisateur
    $a = new Authentification();
    $util = $a->verificationUtilisateur($o_conn, $login, $mdp);

    if (count($util) > 0) {
        if ($util[0]["per_admin"] == 1) {
            $_SESSION["admin"] = 1;
        }

        if ($util[0]["per_admin"] == 0) {
            $_SESSION["admin"] = 0;
        }

        if ($util[0]["per_redac"] == 1) {
            $_SESSION["redac"] = 1;
        }

        if ($util[0]["per_redac"] == 0) {
            $_SESSION["redac"] = 0;
        }

        if ($util[0]["per_admin"] ==1 or $util[0]["per_redac"]==1){
            header("location:../body/home.php");
        }
        else {
            if ($util["per_admin"] == 0 and $util["per_redac"] == 0) {
                // pas de droit
                header("location:login.php?mes=pasDeDroit");
            }
        }
    }
    else{
        // utilisateur non enregistré
        header("location:login.php?mes=pasDUtilisateur");
    }
}

