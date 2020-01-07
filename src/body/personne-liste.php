<?php

// les includes
require_once '../includes/Database.php';
require_once '../class/PersonneBase.php';

// connexion à la base
$o_pdo = new Database();
$o_conn = $o_pdo->makeConnect();

// on va chercher la liste des personnes
$o_pers = new PersonneBase();
$personnes = $o_pers->getPersonnesActives($o_conn);
$pers = $personnes->fetchall();

?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<h1>Administration : Liste des personnes</h1>
<a href="personne-details.php?mode=nouveau">
    <button type="submit">Ajout d'une personne</button>
</a>


<table class="table table-striped">
    <thead>
        <tr>
            <td>Modifier</td>
            <td>Supprimer</td>

            <th><label for="prenom">Prénom</label></th>
            <th><label for="nom">Nom</label></th>

            <th><label for="date_naiss">Date de naissance</label></th>

            <th><label for="lieu_naiss">Lieu de naissance</label></th>

            <th><label for="sexe">Sexe</label></th>

            <th><label for="mail">mail</label></th>

            <th><label for="mdp">Mot de passe</label></th>

            <th><label for="admin">Admin ?</label></th>

            <th><label for="redacteur">Rédacteur ?</label></th>
            <th><label for="con_ext">Contact extérieur ?</label></th>
        </tr>
    </thead>
    <?php foreach ($pers as $p){ ?>
    <tr>
        <td><a href="personne-details.php?mode=modif&id=<?php echo $p['per_id']?>">M</td>
        <td><a href="../traitements/personne-suppression.php?id=<?php echo $p['per_id']?>">S</td>
        <td><?php echo $p["per_prenom"]?></td>
        <td><?php echo $p["per_nom"] ?></td>
        <td><?php echo $p["per_date_nais"] ?></td>
        <td><?php echo $p["per_lieu_nais"]?></td>
        <td><?php echo $p["sex_intitule"] ?></td>
        <td><?php echo $p["per_mail"]?></td>
        <td><?php echo $p["per_mdp"] ?></td>
        <td>
            <input type="checkbox" name="admin" value="admin" <?php if ($p["per_admin"] ==1) echo "checked" ?> >
        </td>
        <td>
            <input type="checkbox" name="redac" value="redac" <?php if ($p["per_redac"] ==1) echo "checked" ?> >
        </td>
        <td>
            <input type="checkbox" name="cont_ext" value="cont_ext" <?php if ($p["per_contact_ext"] ==1) echo "checked" ?> >
        </td>
        </tr>
    <?php } ?>
</table>
