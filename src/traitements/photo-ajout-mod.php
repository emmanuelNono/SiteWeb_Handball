<?php

require_once "../class/PhotoBase.php";
require_once "../includes/Database.php";

// récup ou initialisation de paramètres
$tailleMaxi = 3145728; // taille maxi pour un fichier, en octets.
if (isset($_POST["nom"])) $nom=$_POST["nom"];
$album = $_POST["album"];

$dest_dossier = $_SERVER['DOCUMENT_ROOT'] . "resources/galerie/"; // dest de l'upload

$o_pdo = new Database();
$o_conn = $o_pdo->makeConnect();
$pb = new PhotoBase();

if ($_GET['mode'] == "ajout"){
    // pour l'id de la photo
    $maxi = $pb->getMaxId($o_conn);
    $id_photo = $maxi + 1;
}

if ($_GET['mode'] == "modif"){
    $id_photo = $_POST['id'];
}

$dest_fichier = $dest_dossier . $id_photo;

// si upload du fichier
if (isset($_FILES['photo']))
{
    if ((is_uploaded_file($_FILES['photo']['tmp_name'])))
    {
        // le fichier a bien été uploadé
        $uploadOk = 1;

        // verification du fichier
        echo "Fichier uploadé avec succès.<br>";
        // on test le type
        if (strstr($_FILES['photo']['type'],"image") == false){
            $uploadOk = 0;
            echo "Vous avez tenté d'uploadé autre chose qu'une image.<br>";
        }
        // on test la taille :
        if ($_FILES['photo']['size'] > $tailleMaxi){
            $uploadOk = 0;
            echo "L'image que vous avez tenté d'uploadé est trop grande.<br>";
        }

        // pour l'ajout de l'extension
        if ($_FILES['photo']['type'] == "image/jpeg")        {
            $extension = ".jpeg";
        }
        if ($_FILES['photo']['type'] =="image/png"){
            $extension = ".png";
        }

        // on déplace le fichier
        $destination_complet = $dest_fichier.$extension;

        if (is_file($destination_complet)) {
            // => le fichier existe déjà => on supprime
            if (unlink($destination_complet) == true)
            {
                // le fichier a bien été supprimé => on continue
                $fichierOk = 1;
            }
            else{
                //  echo "Ce n'est pas uploadé une image avec la taille adéquate.";
                echo "L'image déjà présente n'a pas pu être supprimée.<br>";
            }
        }
        else{
            // Le fichier n'existe pas... on peut y aller
            $fichierOk = 1;
        }

        // déplacement
        if ($fichierOk == 1){
            if (move_uploaded_file($_FILES['photo']['tmp_name'], $destination_complet)) {
                echo "Le fichier a été correctement déplacé.<br>";
            }
            else
            {
                echo "Problème avec le déplacement.<br>";
            }
        }
    }
}

// mise à jour de la base
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

if ($_GET['mode'] =="modif"){
    // on prepare les données pour la requete
    if (isset($uploadOk)) {
        // avec photo
        $nom_fichier_complet = $id_photo . $extension;
        $data = array(':nom'=>$nom_fichier_complet, ':album' => $album, ':id' =>$id_photo);

        // on fait la requête
        if ($pb->updatePhoto($o_conn, $data))
        {
            echo "La base de données a été correctement mise à jour.<br>Retour à la liste <a href='../body/photo-liste.php'>ici</a><br>";
        }
    }
    else {
        // sans photo
        $data = array(':album' => $album, ':id' =>$id_photo);
        // on fait la requête
        if ($pb->updateAlbum($o_conn, $data))
        {
            echo "La base de données a été correctement mise à jour.<br>Retour à la liste <a href='../body/photo-liste.php'>ici</a><br>";
        }
    }
}