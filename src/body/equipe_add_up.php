<?php
require_once '../includes/Database.php';
require_once '../class/EquipeBase.php';
include('../includes/head.php');
include('../includes/header.php');
// connexion à la base
$o_pdo = new Database();
$o_conn = $o_pdo->makeConnect();

// on charge les infos sur la page en fonction de new ou de ipdate
if ($_GET["action"] == "update" && ctype_digit($_GET["idequ"])) {
    $idequ = $_GET["idequ"];
    $equb = new EquipeBase();
    $uniqueEqu = $equb->getEquipe($o_conn, $idequ);

    foreach ($uniqueEqu as $eq) {
        $equ_id = $eq["equ_id"];
        $equ_libelle = $eq["equ_libelle"];
        $equ_categorie = $eq["equ_categorie"];
        $equ_division = $eq["equ_division"];
        $equ_jour_entrain = $eq["equ_jour_entrain"];
        $equ_heure_entrain = $eq["equ_heure_entrain"];
        $per_id = $eq["per_id"];
        $per_nom = $eq["per_nom"];
        $per_prenom = $eq["per_prenom"];
    }
    $equb = null;
    $uniqueEqu = null;
} else {
    if ($_GET["idequ"] == "new") {
        $uniqueEqu = array();
        $equ_id = "";
        $equ_libelle = "";
        $equ_categorie = "";
        $equ_division = "";
        $equ_jour_entrain = "";
        $equ_heure_entrain = "";
        $per_id = "";
        $per_nom = "";
        $per_prenom = "";
    }
}

// gestion de la validation en fonction de new ou update
if (isset($_POST['validation']) && $_POST['formequid'] == 'new' && $_GET['action'] == 'insert') {
    //echo "on enregistre les infos";
} elseif (isset($_POST['validation']) && ctype_digit($_POST['formequid']) && $_GET['action'] == 'update') {
    //recup des variables
    $form_equ_id = $_POST["formequid"];
    $form_equ_libelle = $_POST["formequlib"];
    $form_equ_categorie = $_POST["formequcat"];
    $form_equ_division = $_POST["formequdiv"];
    $form_equ_jour_entrain = $_POST["formjourentrain"];
    $form_equ_heure_entrain = $_POST["formheureentrain"];
    $form_per_id = $_POST["formperid"];
    $form_per_nom = $_POST["formpernomprenom"];

    $equUpdateBase = new EquipeBase();
    $updateuniqueEqu = $equUpdateBase->setEquipe($o_conn, $idequ, $form_equ_libelle, $form_equ_categorie, $form_equ_division, $form_equ_jour_entrain, $form_equ_heure_entrain);
    if ($updateuniqueEqu == true) {
        echo '<h3>' . "La modification a été effectuée" . '</h3><br>';
    }
}



?>
<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-type" content="text/html">
    <title>Update</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <form class="col-ms-2 col-md-6 col-lg-12" action="" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="formelabquid">ID &eacute;quipe</label>
                        <input type="text" class="form-control" id="formequid" value="<?php echo $_GET["idequ"] ?>"
                            name="formequid" placeholder="ID équipe" required />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="formequlib">Nom &eacute;quipe</label>
                        <input type="text" class="form-control" id="formequlib" value="<?php echo $equ_libelle ?>"
                            name="formequlib" placeholder="Nom équipe" required />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="formlabperid">ID Entraineur</label>
                        <input type="text" class="form-control" id="formperid" value="<?php echo $per_id ?>"
                            name="formperid" placeholder="ID coach" required />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="formlabpernom">Entra&icirc;neur</label>
                        <input type="text" class="form-control" id="formpernomprenom"
                            value="<?php echo $per_prenom . " " . $per_nom ?>" name="formpernomprenom"
                            placeholder="Entraineur" />
                    </div>
                </div>
                <div class=" form-row">
                    <div class="form-group col-md-6">
                        <label for="formlabelville">Cat&eacute;gorie</label>
                        <select class="form-control" name="formequcat" id="formequcat">
                            <option disabled selected>Choisir une Catégorie...</option>
                            <option value="Senior" <?php if ($equ_categorie == "Senior") echo " selected" ?>>
                                Sénior</option>
                            <option value="Junior" <?php if ($equ_categorie == "Junior") echo " selected" ?>>
                                Junior</option>
                            <option value="Jeune-18" <?php if ($equ_categorie == "Jeune-18") echo " selected" ?>>
                                Jeune -18 ans</option>
                            <option value="Jeune-15" <?php if ($equ_categorie == "Jeune-15") echo " selected" ?>>
                                Jeune -15 ans</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="formlabeldiv">Division</label>
                        <select class="form-control" name="formequdiv" id="formequdiv">
                            <option disabled selected>Choisir une division...</option>
                            <option value="Division 1" <?php if ($equ_division == "Division 1") echo " selected" ?>>
                                Division 1 - National</option>
                            <option value="Division 2" <?php if ($equ_division == "Division 2") echo " selected" ?>>
                                Division 2 - National</option>
                            <option value="Nationale 1" <?php if ($equ_division == "Nationale 1") echo " selected" ?>>
                                Nationale 1 - National</option>
                            <option value="Nationale 2" <?php if ($equ_division == "Nationale 2") echo " selected" ?>>
                                Nationale 2 - National</option>
                            <option value="Nationale 3" <?php if ($equ_division == "Nationale 3") echo " selected" ?>>
                                Nationale 3 - Région</option>
                            <option value="Pre-nationale"
                                <?php if ($equ_division == "Pre-nationale") echo " selected" ?>>Pré-nationale -
                                Région
                            </option>
                            <option value="Excellence Regionale"
                                <?php if ($equ_division == "Excellence Regionale") echo " selected" ?>>Excellence
                                Régionale - Région</option>
                            <option value="Honneur Regionale"
                                <?php if ($equ_division == "Honneur Regionale") echo " selected" ?>>Excellence
                                Régionale
                                - Région</option>
                            <option value="Pre-regionale"
                                <?php if ($equ_division == "Pre-regionale") echo " selected" ?>>Pré-régionale -
                                Département</option>
                            <option value="Excellence Départementale"
                                <?php if ($equ_division == "Excellence Départementale") echo " selected" ?>>
                                Excellence
                                Départementale - Département</option>
                            <option value="Honneur Départementale"
                                <?php if ($equ_division == "Honneur Départementale") echo " selected" ?>>Honneur
                                Départementale - Département</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="formlabeljourentrain">Jours d&#39;entra&icirc;nement</label>
                        <input type="text" class="form-control" id="formjourentrain"
                            value="<?php echo $equ_jour_entrain ?>" name="formjourentrain"
                            placeholder="Jour entrainement" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="formlabelheureentrain">Heures dd&#39;entra&icirc;nement</label>
                        <input type="text" id="formheureentrain" class="form-control"
                            value="<?php echo $equ_heure_entrain ?>" name="formheureentrain"
                            placeholder="Heure entrainement" />
                    </div>
                </div>
                <p></p>
                <input class="btn btn-success" type="submit" value="Enregistrer" name="validation">
            </form>
        </div>
    </div>

    <body>

</html>