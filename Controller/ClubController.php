<?php
namespace controller;

class ClubController
{
    public static function afficherHomePage($req){
        //View::show('View/templates/historique.php');
        header("location:View/templates/homepage.php");
    }

    public static function afficherHistorique($req){
        //View::show('View/templates/historique.php');
        header("location:View/templates/historique.php");
    } 

    public static function afficherOrganigramme($req){
        header("location:View/templates/organigramme.php");
    }
}