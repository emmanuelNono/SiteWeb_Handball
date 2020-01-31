<?php

// les includes
require_once '../includes/Database.php';
require_once '../class/DDABase.php';

// connexion à la base
$o_pdo = new Database();
$o_conn = $o_pdo->makeConnect();

// on va chercher la liste des personnes
$o_dda = new DdaBase();
$dda = $o_dda->getDdaActifs($o_conn);

$dd = $dda->fetchall();



?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <h2>Administration des demandes d'accompagnants : Listes des demandes</h2>
    <a href="dda-details.php?mode=ajout">
        <button type="submit">Ajout d'une demande d'accompagnant</button>
    </a>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Modifier</th>
            <th>Supprimer</th>
            <th>libelle</th>
            <th>Actif ?</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($dd as $d){ ?>
            <tr>
                <td><a href="dda-details.php?mode=modif&id_dda=<?php echo $d['dda_id']?>">M</a></td>
                <td><a href="../traitements/dda-suppression.php?&id_dda=<?php echo $d['dda_id']?>">S</td>
                <td><?php echo $d["dda_lib"] ?></td>
                <td><input type="checkbox" <?php if ($d["dda_actif"] == "1") echo "checked"?> ></td> 

            </tr>
        <?php } ?>
        </tbody>
    </table>
<?php

$o_conn = null;
$o_dda = null;
?>