<?php
// les includes
require_once ('../includes/Database.php');
require_once ('../class/AlbumBase.php');

// récup des données
$libelle = $_POST["libelle"];

// connnexion à la base
$bd = new Database();
$o_conn = $bd->makeConnect();

$ab = new AlbumBase();

if ($_GET["mode"] == "ajout"){
    // pour l'id de l'album
    $maxi = $ab->getMaxId($o_conn);
    $id_alb = $maxi + 1;
    // ajout d'une personne
    $param = array(':id'=>$id_alb, ':libelle' => $libelle);
    $rs_ajout = $ab->addAlbum($o_conn, $param);

    if ($rs_ajout == true)
    {
        echo "L'album a  bien été ajouté.<br>Retour à la liste <a href='../body/album-liste.php'>ici</a>";
    }
    else{
        echo "Il y a eu un problème pendant l'ajout.";
        var_dump($param);
    }
}

if ($_GET["mode"] == "modif") {
    // mode de modif
    $id = $_POST["id"];
    $param = array(':id'=>$id, ':libelle' => $libelle);
    $m_exec= $ab->updateAlbum($o_conn,$param);

    // $ajout_prep->debugDumpParams();
    if ($m_exec == true)
    {
        echo "Le libelle de l'album a bien été modifié.<br>Retour à la liste <a href='../body/album-liste.php'>ici</a>";
    }
    else{
        var_dump($param);
    }
}

