<?php
// les includes
require_once ('../includes/Database.php');
require_once ('../class/SexeBase.php');

// récup des données
$intitule = $_POST["intitule"];

// connnexion à la base
$bd = new Database();
$o_conn = $bd->makeConnect();

$sb = new SexeBase();

if ($_GET["mode"] == "ajout"){
    // pour l'id de l'album
    $maxi = $sb->getMaxId($o_conn);
    $id_sex = $maxi + 1;
    // ajout d'une personne
    $param = array(':id'=>$id_sex, ':intitule' => $intitule);
    $rs_ajout = $sb->addSexe($o_conn, $param);

    if ($rs_ajout == true)
    {
        echo "Le sexe a bien été ajouté.<br>Retour à la liste <a href='../body/sexe-liste.php'>ici</a>";
    }
    else{
        echo "Il y a eu un problème pendant l'ajout.";
        var_dump($param);
    }
}

if ($_GET["mode"] == "modif") {
    // mode de modif
    $id = $_POST["id"];
    $param = array(':id'=>$id, ':intitule' => $intitule);
    $m_exec= $sb->updateSexe($o_conn,$param);

    // $ajout_prep->debugDumpParams();
    if ($m_exec == true)
    {
        echo "L'intitulé du sexe a bien été modifié.<br>Retour à la liste <a href='../body/sexe-liste.php'>ici</a>";
    }
    else{
        var_dump($param);
    }
}

