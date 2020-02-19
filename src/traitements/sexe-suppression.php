<?php

// les includes
require_once '../includes/Database.php';
require_once '../class/SexeBase.php';

// connexion à la base
$o_pdo = new Database();
$o_conn = $o_pdo->makeConnect();

// on va chercher la personne
$id = $_GET["id_sex"];
$sb = new SexeBase();

if (!isset($_GET["mode"])) {

    $sex = $sb->getSexe($o_conn, $id);

    foreach ($sex as $s) {
        $sex_id = $s["sex_id"];
        $sex_intitule = $s["sex_intitule"];

    }
    $pb = null;
    $pho = null;?>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <?php

    echo "Voulez-vous vraiment supprimer l'album : " . $sex_intitule ."<br>";
    echo "<a href='sexe-suppression.php?mode=suppression&id_sex=". $_GET['id_sex'] ."' class='btn btn-success'>OUI</a>&nbsp;";
    echo "<a href='../body/sexe-liste.php' class='btn btn-danger'>NON</a>";
}

if (isset($_GET["mode"]) && ($_GET["mode"] == "suppression")){
    // mode de modif
    $param = array(':id' => $id);
    $m_exec = $sb->deleteSexe($o_conn, $param);

    // $ajout_prep->debugDumpParams();
    if ($m_exec == true)
    {
        echo "La sexe a bien été supprimé de la base :) <br>Retour à la liste <a href='../body/sexe-liste.php'>ici</a>";
    }
    else
    {
        echo "Désolé, il y a eu un problème durant la suppression.<br>";
    }
}