<?php

// les includes
require_once '../includes/Database.php';
require_once '../class/AlbumBase.php';

// connexion à la base
$o_pdo = new Database();
$o_conn = $o_pdo->makeConnect();

// on va chercher la personne
$id = $_GET["id_alb"];
$ab = new AlbumBase();

if (!isset($_GET["mode"])) {

    $alb = $ab->getAlbum($o_conn, $id);

    foreach ($alb as $p) {
        $alb_id = $p["alb_id"];
        $alb_libelle = $p["alb_libelle"];

    }
    $pb = null;
    $pho = null;?>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <?php

    echo "Voulez-vous vraiment supprimer l'album : " . $alb_libelle ."<br>";
    echo "<a href='album-suppression.php?mode=suppression&id_alb=". $_GET['id_alb'] ."' class='btn btn-success'>OUI</a>&nbsp;";
    echo "<a href='../body/album-liste.php' class='btn btn-danger'>NON</a>";
}

if (isset($_GET["mode"]) && ($_GET["mode"] == "suppression")){
    // mode de modif
    $param = array(':id' => $id);
    $m_exec = $ab->deleteAlbum($o_conn, $param);

    // $ajout_prep->debugDumpParams();
    if ($m_exec == true)
    {
        echo "L'album a bien été supprimé de la base :) <br>Retour à la liste <a href='../body/album-liste.php'>ici</a>";
    }
    else
    {
        echo "Désolé, il y a eu un problème durant la suppression.<br>";
    }
}