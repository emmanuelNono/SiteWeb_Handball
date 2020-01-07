<?php
// les includes
require_once '../includes/Database.php';
require_once '../class/SexeBase.php';
require_once '../class/Sexe.php';

// connexion à la base
$o_pdo = new Database();
$o_conn = $o_pdo->makeConnect();

if ($_GET["mode"] == "modif"){
    // on va chercher l'album
    $id = $_GET["id_sex"];
    $pb = new SexeBase();
    $sexe = $pb->getSexe($o_conn, $id);
    foreach ($sexe as $sex) {
        $sexe1 = new Sexe($sex["sex_id"], $sex["sex_intitule"]);
       // $sex_id = $sex['sex_id'];
       //  $sex_intitule = $sex['sex_intitule'];
    }
}
else{
    $sex_id = "";
    $sex_intitule = "";
}

?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<a href="sexe-liste.php">Retour à la liste</a>
<H1>Administration : Ajout d'un sexe</H1>
<form action="../traitements/sexe-ajout-mod.php?mode=<?php echo $_GET['mode']?>" method="post">
    <?php if (isset($_GET["id_sex"])){
        echo "<input type='hidden' name='id' id='id' value='".$_GET['id_sex'] . "'>";
    } ?>
    <table class="table table-striped">
        <tr>
            <th><label for="libelle">Intitulé</label></th>
            <td><input type="text" name="intitule" id="intitule" value="<?php echo $sexe1->getIntitule() ?>" class="form-control"></td>
        </tr>


    </table>
    <input type="submit" value="Valider" class="btn btn-success">
</form>