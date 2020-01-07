<?php

// les includes
require_once '../includes/Database.php';
require_once '../class/PhotoBase.php';
require_once '../class/AlbumBase.php';

// connexion à la base
$o_pdo = new Database();
$o_conn = $o_pdo->makeConnect();

$alb = new AlbumBase();
$albums = $alb->getAlbumActifs($o_conn);

if ($_GET["mode"] == "modif"){
    // on va chercher la personne
    $id = $_GET["id"];
    $gb = new PhotoBase();
    $pho = $gb->getPhoto($o_conn, $id);

    foreach($pho as $p){
        $pho_id = $p["pho_id"];
        $pho_nom = $p["pho_nom"];
        $pho_album_id = $p["pho_album_id"];
    }
    $gb = null;
    $pers = null;
}

else{
    if ($_GET["mode"] == "ajout") {
        $pers = array();
        $pho_nom = "";
        $pho_album = "";
        $pho_album_id = "";
    }
}

?>
<?php if ($_GET['mode'] == "modif") {
    ?>
    <h2>Administration : Modification d'une photo</h2>
    <a href="photo-liste.php" alt="retour à la liste">Retour à la liste</a>
<?php
 } else { ?>
    <h2>Administration : Ajout d'une photo</h2>
<?php } ?>

<form action="/src/traitements/photo-ajout-mod.php?mode=<?php echo $_GET['mode']?>" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']?>">
    <!-- <label for="nom">Nom : </label><input type="text" name="nom" id="nom" value="<?php // echo $pho_nom?>"><br> -->
    <label for="album">Album : </label>
        <select name="album" id="album">
            <?php foreach ($albums as $al) { ?>
                <option value="<?php echo $al['alb_id']?>" <?php if ($al['alb_id'] == $pho_album_id) echo "selected" ?>><?php echo $al["alb_libelle"] ?></option>
           <?php } ?>
        </select>
    <br>
    <label for="photo">Fichier : </label><input type="file" name="photo" id="photo"><br>

    <input type="submit" value="Envoyer">
</form>