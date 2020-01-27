<?php
// les includes
require_once '../includes/Database.php';
require_once '../class/DDaBase.php';

// connexion à la base
$o_pdo = new Database();
$o_conn = $o_pdo->makeConnect();

if ($_GET["mode"] == "modif"){
    // on va chercher l'album
    $id = $_GET["id_dda"];
    $o_dda = new DdaBase();
    $dda = $o_dda->getDda($o_conn, $id);
    foreach ($dda as $dd) {
        $dda_id = $dd['dda_id'];
        $dda_lib = $dd['dda_lib'];
        $dda_actif = $dd['dda_actif'];
    }
}
else{
    $dda_id = "";
    $dda_lib = "";
    $dda_actif = "";
}

?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<a href="dda-liste.php">Retour à la liste</a>
<?php if ($_GET["mode"] =="ajout") {?>
    <h1>Administration : Ajout d'une demande d'accompagnant</h1>
<?php } ?>

<?php if ($_GET["mode"] == "modif") { ?>
    <H1>Administration : Modification d'une demande d'accompagnant</H1>
<?php } ?>
<form action="../traitements/dda-ajout-mod.php?mode=<?php echo $_GET['mode']?>" method="post">
    <?php if (isset($_GET["id_dda"])){
        echo "<input type='hidden' name='id' id='id' value='".$_GET['id_dda'] . "'>";
    } ?>
    <table class="table table-striped">
        <tr>
            <th><label for="libelle">Libellé</label></th>
            <td><input type="text" name="libelle" id="libelle" value="<?php echo $dda_lib ?>" class="form-control"></td>
        </tr>
        <tr>
            <th><label for="actif">Actif</label></th>
            <td><input type="checkbox" name="actif" id="actif" <?php if ($dda_actif == 1) echo " value='on' checked" ?> class="form-control"></td>
        </tr>
    </table>
    <input type="submit" value="Valider" class="btn btn-success">
</form>
