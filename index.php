<?php
if (isset($_GET["rubrique"])){
    $rubrique = $_GET["rubrique"];
    switch($rubrique)
    {
        case "historique":
            //echo "historique";
            header("location:View/templates/historique.php");
            //echo "<meta http-equiv='refresh' content='0; url=View/historique.php'>";
        break;

        default:
        echo "<meta http-equiv='refresh' content='0; url=View/templates/homepage.php'>";
            //require('templates/homepage.php');
    }
    
}
else{
    echo "erreur pas de rubrique";
    //header("location:erreur.php");
}



?>