<?php

require_once '../includes/Database.php';

// recupetation des variables du formulaire
$login = $_POST["login"];
$mdp = $_POST["MdP"];

echo $login."<br>";
echo $mdp ."<br>";

// connexion à la base
$o_db = new Database();
$o_conn = $o_db->makeConnect();

// verification de l'utilisateur




