<?php

// les includes
require_once '../includes/Database.php';
require_once '../class/PersonneBase.php';

// connexion à la base
$o_pdo = new Database();
$o_conn = $o_pdo->makeConnect();

// on va chercher la personne
$id = $_GET["id"];
$pb = new PersonneBase();

if (!isset($_GET["mode"])) {

    $pers = $pb->getPersonne($o_conn, $id);

    foreach ($pers as $p) {
        $per_id = $p["per_id"];
        $per_prenom = $p["per_prenom"];
        $per_nom = $p["per_nom"];
    }
    $pb = null;
    $pers = null;

    echo "Voulez-vous vraiment supprimer " . $per_prenom . " " . $per_nom . " ? <br>";
    echo "<a href='personne-suppression.php?mode=suppression&id=". $_GET['id'] ."'>OUI</a>&nbsp;";
    echo "<a href='../body/personne-liste.php'>NON</a>";
}

if (isset($_GET["mode"]) && ($_GET["mode"] == "suppression")){
    // mode de modif
    $sql_sp = "UPDATE personne SET ";
    $sql_sp .= "per_deleted_at = now()";
    $sql_sp .= " where per_id =:id ";
    $r_prep = $o_conn->prepare($sql_sp);
    $param = array(':id' => $id);
    $m_exec = $r_prep->execute($param);

    // $ajout_prep->debugDumpParams();
    if ($m_exec == true)
    {
        echo "La personne a bien été supprimée de la base :) <br>Retour à la liste <a href='../body/personne-liste.php'>ici</a>";
    }
    else
    {
        var_dump($param);
    }
}