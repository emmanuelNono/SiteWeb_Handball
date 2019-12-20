<?php

require_once "../class/PhotoBase.php";
require_once "../includes/Database.php";

// récup ou initialisation de paramètres
$tailleMaxi = 3145728; // taille maxi pour un fichier, en octets.
$nom=$_POST["nom"];
$album = $_POST["album"];
$uploadOk = 1;
$dest_dossier = $_SERVER['DOCUMENT_ROOT'] . "resources/galerie/"; // dest de l'upload

// pour l'id de la photo
$o_pdo = new Database();
$o_conn = $o_pdo->makeConnect();
$pb = new PhotoBase();
$maxi = $pb->getMaxId($o_conn);
$id_photo = $maxi + 1;

$dest_fichier = $dest_dossier . $id_photo;

var_dump($_FILES);

// on vérifie si le fichier a bien été téléchargé
if ((is_uploaded_file($_FILES['photo']['tmp_name'])))
{
    echo "fichier uploadé";

    // on test le type
    if (strstr($_FILES['photo']['type'],"image") == false){
        $uploadOk = 0;
        echo "Vous avez tenté d'uploadé autre chose qu'une image";
    }

    // on test la taille : on exclu si sup à 3 mo => 3072 o
    if ($_FILES['photo']['size'] > $tailleMaxi){
        $uploadOk = 0;
        echo "L'image que vous avez tenté d'uploadé est trop grande.";
    }

    // pour l'ajout de l'extension
    if ($_FILES['photo']['type'] == "image/jpeg")
    {
        $extension = ".jpeg";
    }
    if ($_FILES['photo']['type'] =="image/png"){
        $extension = ".png";
    }
}

if ($uploadOk == 1){
    $destionation_complet = $dest_fichier.$extension;
    echo "dc : " . $destionation_complet;
    if (move_uploaded_file($_FILES['photo']['tmp_name'], $destionation_complet)) {
        //echo "fichier déplacé avec succès";
        if ($_GET['mode'] == "ajout"){
            // on fait la suite du traitement -> ajout dans la base
            // on prepare les données pour la requete
            $nom_fichier_complet = $id_photo . $extension;
            $data = array(':id'=>$id_photo, ':nom'=>$nom_fichier_complet, ':album' => $album);
            // on fait la requête
            if ($pb->addPhoto($o_conn, $data))
            {
                echo "la photo a été correctement ajouté.<br>Retour à la liste <a href='../body/photo-liste.php'>ici</a>";
            }
        }



    } else {
        echo "problème avec le déplacement";
    }
}
else{
    echo "Ce n'est pas uploadé une image avec la taille adéquate.";
}

?>
