<?php
require_once '../includes/Database.php';
require_once '../class/EquipeBase.php';

// connexion à la base
$o_pdo = new Database();
$o_conn = $o_pdo->makeConnect();

$equipes = new EquipeBase();
$tbListEquAct = $equipes->getEquipesActives($o_conn);

include('../includes/head.php');
include('../includes/header.php');
?>


<!-- start card -->
<div class="container">
    <h3>Liste des équipes</h3><br>
    <div class="row">
        <?php for ($incrCard = 1; $incrCard < count($tbListEquAct); $incrCard++) {
            include("./one_equipe.php");
        } ?>
    </div>
</div>
<!-- end card -->
<?php
include('../includes/footer.php');
?>