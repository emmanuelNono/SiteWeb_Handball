<?php

// les includes
require_once '../includes/Database.php';
require_once '../class/AlbumBase.php';

// connexion à la base
$o_pdo = new Database();
$o_conn = $o_pdo->makeConnect();

// on va chercher la liste des personnes
$o_alb = new AlbumBase();
$albums = $o_alb->getAlbumActifs($o_conn);

$alb = $albums->fetchall();

include('../includes/head.php');
include('../includes/header.php');

?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <h2>Administration des albums : Listes des albums</h2>
    <a href="album-details.php?mode=ajout">
        <button type="submit">Ajout d'un album</button>
    </a>

    <table class="table table-striped">
        <thead>
        <tr>
            <td>Modifier</td>
            <td>Supprimer</td>

            <th><label for="prenom">libelle</label></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($alb as $a){ ?>
            <tr>
                <td><a href="album-details.php?mode=modif&id_alb=<?php echo $a['alb_id']?>">M</a></td>
                <td><a href="../traitements/album-suppression.php?&id_alb=<?php echo $a['alb_id']?>">S</td>
                <td><?php echo $a["alb_libelle"] ?></td>

            </tr>
        <?php } ?>
        </tbody>
    </table>
<?php

$o_conn = null;
$albums = null;
?>