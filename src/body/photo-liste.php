<?php

// les includes
require_once '../includes/Database.php';
require_once '../class/PhotoBase.php';

// connexion à la base
$o_pdo = new Database();
$o_conn = $o_pdo->makeConnect();

// on va chercher la liste des personnes
$o_pho = new PhotoBase();
$photos = $o_pho->getPhotosActives($o_conn);

$pho = $photos->fetchall();



?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<h2>Administration des photos : Listes des photos</h2>
<a href="photo-details.php?mode=ajout">
    <button type="submit">Ajout d'une photo</button>
</a>

<table class="table table-striped">
    <thead>
    <tr>
        <td>Modifier</td>
        <td>Supprimer</td>

        <th><label for="prenom">nom</label></th>
        <th><label for="nom">album</label></th>
        <th>aperçu</th>

    </tr>
    </thead>
    <tbody>
    <?php foreach ($pho as $p){ ?>
        <tr>
            <td><a href="photo-details.php?mode=modif&id=<?php echo $p['pho_id']?>">M</a></td>
            <td><a href="../traitements/photo-suppression.php?&id_photo=<?php echo $p['pho_id']?>">S</td>
            <td><?php echo $p["pho_nom"]?></td>
            <td><?php echo $p["alb_libelle"] ?></td>
            <td><img src="../../resources/galerie/<?php echo $p["pho_nom"] ?>" alt="<?php echo $p["pho_nom"] ?>" width="50px"></td>

        </tr>
    <?php } ?>
    </tbody>
</table>
<?php

$o_conn = null;
$photos = null;
?>