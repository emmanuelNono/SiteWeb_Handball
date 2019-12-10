<?php
session_start();
include_once('Controller/ClubController.php');
include_once('Controller/ArticleController.php');

use Controller\ClubController;
use Controller\ArticleController;

if (isset($_GET["rubrique"])){
    $rubrique = strtolower($_GET["rubrique"]);
    switch($rubrique)
    {
        case "photos":
            ClubController::afficherPhotos($_GET);
            break; 

        case "historique":
            ClubController::afficherHistorique($_GET);
            break;

        case "organigramme":
            ClubController::afficherOrganigramme($_GET);
            break;    
        case "news":
            ArticleController::AfficherArticlesActifs($_GET); 
            break;
        default:
            ClubController::afficherHomePage($_GET);
            break;
    }    
}
else{
    //echo "erreur pas de rubrique";
    ClubController::afficherHomePage($_GET);
}