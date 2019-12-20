<?php

// les includes
require_once '../includes/Database.php';
require_once '../class/PhotoBase.php';

// connexion à la base
$o_pdo = new Database();
$o_conn = $o_pdo->makeConnect();

// on va chercher la personne
$id = $_GET["id_photo"];
$pb = new PhotoBase();

if (!isset($_GET["mode"])) {

    $pho = $pb->getPhoto($o_conn, $id);

    foreach ($pho as $p) {
        $pho_id = $p["pho_id"];
        $pho_nom = $p["pho_nom"];

    }
    $pb = null;
    $pho = null;?>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<?php

    echo "Voulez-vous vraiment supprimer l'album : " . $pho_nom ."<br>";
    echo "<a href='photo-suppression.php?mode=suppression&id_photo=". $_GET['id_photo'] ."' class='btn btn-success'>OUI</a>&nbsp;";
    echo "<a href='../body/photo-liste.php' class='btn btn-danger'>NON</a>";
}

if (isset($_GET["mode"]) && ($_GET["mode"] == "suppression")){
    // mode de modif
    $sql_sp = "UPDATE photo SET ";
    $sql_sp .= "pho_deleted_at = now()";
    $sql_sp .= " where pho_id =:id ";
    $r_prep = $o_conn->prepare($sql_sp);
    $param = array(':id' => $id);
    $m_exec = $r_prep->execute($param);

    // $ajout_prep->debugDumpParams();
    if ($m_exec == true)
    {
        echo "L'album a bien été supprimé de la base :) <br>Retour à la liste <a href='../body/photo-liste.php'>ici</a>";
    }
    else
    {
        echo "Désolé, il y a eu un problème durant la suppression.<br>";
        var_dump($param);
    }
}