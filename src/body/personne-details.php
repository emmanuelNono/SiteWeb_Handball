<?php
// les includes
require_once '../includes/Database.php';
require_once '../class/PersonneBase.php';

// connexion à la base
$o_pdo = new Database();
$o_conn = $o_pdo->makeConnect();

if ($_GET["mode"] == "modif"){
    // on va chercher la personne
    $id = $_GET["id"];
    $pb = new PersonneBase();
    $pers = $pb->getPersonne($o_conn, $id);
    // $p = $pers->fetch();
    //var_dump($pers);
}

?>
<form action="" method="post">
    <table>
        <?php foreach($pers as $p){ ?>
        <tr>
           <th><label for="prenom">Prénom</label></th>
            <td><input type="text" name="prenom" id="prenom" value="<?php echo $p['per_prenom']?>"></td>
        </tr>
        <tr>
            <th><label for="nom">Nom</label></th>
            <td><input type="text" name="nom" id="nom" value="<?php echo $p['per_nom']?>"></td>
        </tr>
        <tr>
            <th><label for="date_naiss">Date de naissance</label></th>
            <td><input type="date" name="date_naiss" id="date_naiss" value="<?php echo $p['per_date_nais']?>"></td>
        </tr>
        <tr>
            <th><label for="lieu_naiss">Lieu de naissance</label></th>
            <td><input type="text" name="lieu_naiss" id="lieu_naiss" value="<?php echo $p['per_lieu_nais']?>"></td>
        </tr>
        <tr>
            <th><label for="sexe">Sexe</label></th>
            <td><select name="sexe" >
                    <option disabled>Veuillez choisir...</option>
                    <option value="Masculin" <?php if ($p['per_sexe'] == "Masculin") echo "selected"?> >Masculin</option>
                    <option value="Féminin"  <?php if ($p['per_sexe'] == "Féminin") echo "selected"?>>Féminin</option>
                    <option value="Indéterminé"  <?php if ($p['per_sexe'] == "indéterminé") echo "selected"?>>Féminin</option>
                </select>
            </td>
        </tr>
        <tr>
            <th><label for="mail">mail</label></th>
            <td><input type="mail" name="mail" id="mail" value="<?php echo $p['per_lieu_nais']?>"></td>
        </tr>
        <tr>
            <th><label for="mdp">Mot de passe</label></th>
            <td><input type="password" name="password" id="password" <?php echo $p['per_mdp']?>"></td>
        </tr>
        <tr>
            <th><label for="admin">Admin ?</label></th>
            <td><input type="checkbox" name="admin" id="admin" <?php if ($p['per_admin'] ==1) echo 'checked value="on"' ?>></td>
        </tr>
        <tr>
            <th><label for="redacteur">Rédacteur ?</label></th>
            <td><input type="checkbox" name="redacteur" id="redacteur" <?php if ($p['per_redac'] ==1) echo 'checked value="on"' ?>></td>
        </tr>
        <tr>
            <th><label for="con_ext">Contact extérieur ?</label></th>
            <td><input type="checkbox" name="con_ext" id="con_ext" <?php if ($p['per_contact_ext'] ==1) echo 'checked value="on"' ?>></td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Valider"></td>
        </tr>
        <?php } ?>
    </table>
</form>