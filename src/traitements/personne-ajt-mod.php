<?php
// récup des données

$prenom = $_POST["prenom"];
$nom = $_POST["nom"];
$date_naiss = $_POST["date_naiss"];
$lieu_naiss = $_POST["lieu_naiss"];
$sexe = $_POST["sexe"];
$mail = $_POST["mail"];
$mdp = $_POST["password"];

$admin = 0;
if (isset($_POST["admin"]))
{
    $admin = 1;
}

$redacteur = 0;
if (isset($_POST["redacteur"]))
{
    $redacteur = 1;
}

$contact_ext = 0;
if (isset($_POST["contact_ext"]))
{
    $contact_ext = 1;
}

// les includes
require_once ('../includes/Database.php');

// connnexion à la base
$bd = new Database();
$o_conn = $bd->makeConnect();

if ($_GET["mode"] == "nouveau"){
    // ajout d'une personne
    $ajout_prep = $o_conn->prepare("INSERT INTO personne (per_id, per_prenom, per_nom, per_sexe, 
    per_date_nais, per_lieu_nais, per_admin, per_redac, per_contact_ext, per_mail, per_mdp, per_created_at) VALUES (
    null, :prenom, :nom, :sexe, :date_naiss, :lieu_naiss, :admin, :redac, :contact_ext, :mail, :mdp, now()); ");
    $param = array(':prenom'=>$prenom, ':nom' => $nom, ':sexe' => $sexe, ':date_naiss' => $date_naiss, ':lieu_naiss' =>$lieu_naiss,
        ':admin'=>$admin, ':redac' => $redacteur, ':contact_ext' => $contact_ext, ':mail' => $mail, ':mdp' => $mdp);
     $e_req = $ajout_prep->execute($param);

   // $ajout_prep->debugDumpParams();
     if ($e_req == true)
    {
        echo "L'ajout s'est bien effectué :)<br>Retour à la liste <a href='../body/personne-liste.php'>ici</a>";
    }
    else{
        var_dump($param);
    }
}

if ($_GET["mode"] == "modif") {
    // mode de modif
    $id = $_POST["id"];
    $sql_up = "UPDATE personne SET ";
    $sql_up .= "per_prenom = :prenom ,";
    $sql_up .= "per_nom = :nom ,";
    $sql_up .= "per_sexe = :sexe ,";
    $sql_up .= "per_date_nais = :date_naiss ,";
    $sql_up .= "per_lieu_nais = :lieu_naiss ,";
    $sql_up .= "per_mail = :mail ,";
    $sql_up .= "per_mdp = :mdp ,";
    $sql_up .= "per_admin = :admin ,";
    $sql_up .= "per_redac = :redacteur ,";
    $sql_up .= "per_contact_ext = :contact_ext ,";
    $sql_up .= "per_updated_at = now() ";
    $sql_up .= " where per_id =:id ";
    $r_prep = $o_conn->prepare($sql_up);

    $param = array(':prenom'=>$prenom, ':nom' => $nom, ':sexe' => $sexe, ':date_naiss' => $date_naiss, ':lieu_naiss' => $lieu_naiss,
        ':admin'=> $admin, ':redacteur' => $redacteur, ':contact_ext' => $contact_ext, ':mail' => $mail, ':mdp' => $mdp,
            ':id' => $id);
    $m_exec = $r_prep->execute($param);

    // $ajout_prep->debugDumpParams();
    if ($m_exec == true)
    {
        echo "La modification s'est bien effectuée ). <br>Retour à la liste <a href='../body/personne-liste.php'>ici</a>";
    }
    else{
        var_dump($param);
    }
}

