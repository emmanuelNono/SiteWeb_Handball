<?php
// les includes
require_once ('../includes/Database.php');
require_once ('../class/DdaBase.php');

// récup des données
$lib = $_POST["libelle"];
$actif = 0;
if (isset($_POST["actif"])) 
    $actif=1;


// connnexion à la base
$bd = new Database();
$o_conn = $bd->makeConnect();

$dda_b = new DdaBase();

if ($_GET["mode"] == "ajout"){
    // pour l'id de la demande
    $maxi = $dda_b->getMaxId($o_conn);
    $id_dda = $maxi + 1;
    // ajout d'une personne
    $param = array(':id'=>$id_dda, ':lib' => $lib, ':actif' => $actif);
    $rs_ajout = $dda_b->addDDa($o_conn, $param);

    if ($rs_ajout == true)
    {
        echo "Le demande a  bien été ajoutée.<br>Retour à la liste <a href='../body/dda-liste.php'>ici</a>";
    }
    else{
        echo "Il y a eu un problème pendant l'ajout.";
        var_dump($param);
    }
}

if ($_GET["mode"] == "modif") {
    // mode de modif
    $id = $_POST["id"];
    $param = array(':id'=>$id, ':lib' => $lib, ':actif' => $actif);
    $m_exec= $dda_b->updateDda($o_conn,$param);

    // $ajout_prep->debugDumpParams();
    if ($m_exec == true)
    {
        echo "Le demande a bien été modifiée.<br>Retour à la liste <a href='../body/dda-liste.php'>ici</a>";
    }
    else{
        echo "Il y a eu un problème durant la modification";
        var_dump($param);
    }
}

