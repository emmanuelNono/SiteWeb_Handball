<?php
require_once '../includes/Database.php';
require_once '../class/EquipeBase.php';
include('../includes/head.php');
include('../includes/header.php');
// connexion à la base
$o_pdo = new Database();
$o_conn = $o_pdo->makeConnect();

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
    <form action="" method="POST">
        <fieldset>
            <legend> Information &eacute;quipe </legend>

            <br> <input type="hidden" name="idequform" value="<?php echo $_GET['idequ']; ?>">
            Nom : <br> <input type="text" value="<?php echo $equ_libelle ?>" name="equlibform" placeholder="nom équipe">
            <p></p>
            Cat&eacute;gorie : <br> <input type="text" value="<?php echo $equ_categorie ?>" name="equcatform"
                placeholder="Catégorie">
            <p></p>
            Coach : <br> <input type="text" value="" name="equcoachform" placeholder="Division">
            <p></p>
            Jours d'entrainement : <br> <input type="text" value="<?php echo $equ_jour_entrain ?>"
                name="equjourentrainform" placeholder="Jour entrainement">
            <p></p>
            Heures d'entrainement : <br> <input type="text" value="<?php echo $equ_heure_entrain ?>"
                name="equheureentrainform" placeholder="Heure entrainement">
            <p></p>

            Division : <br>
            <select name="equdivform" id="">
                <option disabled selected>Choisir une division...</option>
                <option value="National" <?php if ($equ_division == "National") echo " selected" ?>>
                    National
                </option>
                <option value="Departemental" <?php if ($equ_division == "Departemental") echo " selected" ?>>
                    Departemental
                </option>
                <option value="Jeune" <?php if ($equ_division == "Jeune") echo " selected" ?>>
                    Jeune
                </option>
            </select>
            <p></p>
            <input type="submit" value="Enregistrer" name="validation">

        </fieldset>
    </form>
    <div class="container">
        <div class="row">
            <form class="col-md-12" action="">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="formequlib">Nom &eacute;quipe</label>
                        <input type="text" class="form-control" id="formequlib" value="<?php echo $equ_libelle ?>"
                            name="equlibform" placeholder="Nom équipe" required />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="formmdp">Entra&icirc;neur</label>
                        <input type="text" class="form-control" name="equcoach" placeholder="Entraineur"
                            id="formcoach" />
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="formville">Cat&eacute;gorie</label>
                        <input type="text" name="adresse" placeholder="Catégorie" class="form-control" id="formcat" />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="formdep">Division</label>
                        <select class="form-control" name="Division" id="formdiv">
                            <option value="1">
                                67
                            </option>
                        </select>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="formcdp">Jours d&#39;entra&icirc;nement</label>
                            <input type="text" class="form-control" id="formcdp" value="<?php echo $equ_jour_entrain ?>"
                                name="equjourentrainform" placeholder="Jour entrainement" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="formcdp">Heures dd&#39;entra&icirc;nement</label>
                            <input type="text" id="formcdp" class="form-control"
                                value="<?php echo $equ_heure_entrain ?>" name="equheureentrainform"
                                placeholder="Heure entrainement" />
                        </div>
                    </div>

                </div>
                <div class="form-check">
                    <input type="radio" name="choice" id="exradio1" value="oui" class="form-check-input">
                    <label for="exradio1" class="form-check-label">Oui</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="choice" id="exradio2" value="nom" class="form-check-input">
                    <label for="exradio2" class="form-check-label">Nom</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="choice" id="exradio3" value="surement" class="form-check-input" disabled>
                    <label for="exradio3" class="form-check-label">Surement</label>
                </div>
        </div>
    </div>

    <body>

</html>