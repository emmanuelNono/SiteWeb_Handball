<?php
// les includes
require_once '../includes/Database.php';
require_once '../class/PersonneBase.php';
require_once '../class/SexeBase.php';

// connexion à la base
$o_pdo = new Database();
$o_conn = $o_pdo->makeConnect();

// on va chercher les sexe actifs
$o_sb = new SexeBase();
$sexes = $o_sb->getSexeActifs($o_conn);
$sex = $sexes->fetchall();

if ($_GET["mode"] == "modif"){
    // on va chercher la personne
    $id = $_GET["id"];
    $pb = new PersonneBase();
    $pers = $pb->getPersonne($o_conn, $id);

    foreach($pers as $p){
        $per_id = $p["per_id"];
        $per_prenom = $p["per_prenom"];
        $per_nom = $p["per_nom"];
        $per_sexe = $p["per_sexe"];
        $per_mdp = $p["per_mdp"];
        $per_date_nais = $p["per_date_nais"];
        $per_lieu_nais = $p["per_lieu_nais"];
        $per_admin = $p["per_admin"];
        $per_redac = $p["per_redac"];
        $per_contact_ext = $p["per_contact_ext"];

    }
    $pb = null;
    $pers = null;

}

else{
    if ($_GET["mode"] == "nouveau") {
        $pers = array();
        $per_prenom = "";
        $per_nom = "";
        $per_date_nais = "";
        $per_lieu_nais = "";
        $per_sexe = "";
        $per_mdp = "";
        $per_admin  = "";
        $per_redac = "";
        $per_contact_ext = "";
    }
}



?>
<a href="personne-liste.php">Retour à la liste</a>
<form action="../traitements/personne-ajt-mod.php?mode=<?php echo $_GET["mode"] ?>" method="POST">
    <table>
        <?php if (isset($_GET["id"])) { ?>
            <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>" class="form-control">
        <?php } ?>
        <tr>
           <th><label for="prenom">Prénom</label></th>
            <td><input type="text" name="prenom" id="prenom" value="<?php echo $per_prenom ?>" class="form-control"></td>
        </tr>
        <tr>
            <th><label for="nom">Nom</label></th>
            <td><input type="text" name="nom" id="nom" value="<?php echo $per_nom?>" class="form-control"></td>
        </tr>
        <tr>
            <th><label for="date_naiss">Date de naissance</label></th>
            <td><input type="date" name="date_naiss" id="date_naiss" value="<?php echo $per_date_nais ?>" class="form-control"></td>
        </tr>
        <tr>
            <th><label for="lieu_naiss">Lieu de naissance</label></th>
            <td><input type="text" name="lieu_naiss" id="lieu_naiss" value="<?php echo $per_lieu_nais ?>" class="form-control"></td>
        </tr>
        <tr>
            <th><label for="sexe">Sexe</label></th>
            <td><select name="sexe" >
                    <option disabled selected>Veuillez choisir...</option>
                    <?php foreach ($sex as $se) { ?>}
                    <option value="<?php echo $se["sex_id"]?>" <?php if ($per_sexe == $se["sex_id"]) echo "selected"?> ><?php echo $se["sex_intitule"]?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <th><label for="mail">mail</label></th>
            <td><input type="mail" name="mail" id="mail" value="<?php echo $per_lieu_nais ?>" class="form-control"></td>
        </tr>
        <tr>
            <th><label for="mdp">Mot de passe</label></th>
            <td><input type="password" name="password" id="password" value="<?php echo $per_mdp ?>" class="form-control"></td>
        </tr>
        <tr>
            <th><label for="admin">Admin ?</label></th>
            <td><input type="checkbox" name="admin" id="admin" <?php if ($per_admin ==1) echo 'checked value="on"'?> class="form-check-input"></td>
        </tr>
        <tr>
            <th><label for="redacteur">Rédacteur ?</label></th>
            <td><input type="checkbox" name="redacteur" id="redacteur" <?php if ($per_redac ==1) echo 'checked value="on"'?> class="form-check-input"></td>
        </tr>
        <tr>
            <th><label for="con_ext">Contact extérieur ?</label></th>
            <td><input type="checkbox" name="contact_ext" id="contact_ext" <?php if ($per_contact_ext ==1) echo 'checked value="on"' ?> class="form-check-input"></td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Valider" class="button"></td>
        </tr>
    </table>
</form>