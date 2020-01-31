<?php

// les includes
require_once '../includes/Database.php';
require_once '../class/ArticleBase.php';

// connexion à la base
$o_pdo = new Database();
$o_conn = $o_pdo->makeConnect();

// on va chercher la liste des personnes
$b_art = new ArticleBase();
$articles = $b_art->getArticlesActifs($o_conn);
$art = $articles->fetchall();

include('../includes/head.php');
include('../includes/header.php');
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<h1>Administration : Liste des articles</h1>
<a href="personne-details.php?mode=nouveau">
    <button class="btn btn-warning" type="submit">Ajout d'un article</button>
</a>
<div class="table-responsive">
    <table id="listePersonne" class="table table-striped table-bordered table-sm">
        <thead>
            <tr>
                <td>Modifier</td>
                <td>Supprimer</td>

                <th scope="col"><label for="prenom">Prénom</label></th>
                <th scope="col"><label for="nom">Nom</label></th>

<table class="table table-striped">
    <thead>
        <tr>
            <td>Modifier</td>
            <td>Supprimer</td>
            <th><label for="titre">Titre</label></th>
            <th><label for="contenu">Contenu</label></th>

            <th><label for="auteur">Auteur : </label></th>

            <th><label for="photo">Photo</label></th>

            <th><label for="actif">Actif</label></th>

        </tr>
    </thead>
    <?php foreach ($art as $a){ ?>
    <tr>
        <td><a href="article-details.php?mode=modif&id=<?php echo $p['art_id']?>">Modifier</td>
        <td><a href="../traitements/article-suppression.php?id=<?php echo $p['per_id']?>">Supprimer</td>
        <td><?php echo $a["art_titre"]?></td>
        <td><?php echo $a["art_contenu"] ?></td>
        <td><?php echo $a["per_prenom"] . " " . $a["per_nom"] ?></td>
        <td><?php echo $a["art_photo_id"]?></td>
        <td>
            <input type="checkbox" name="actif" value="actif" <?php if ($a["art_actif"] ==1) echo "checked" ?> >
        </td>        
        </tr>
    <?php } ?>
</table>
