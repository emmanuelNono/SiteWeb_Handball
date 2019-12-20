<?php

// les includes
require_once '../includes/Database.php';
require_once '../class/PhotoBase.php';

// connexion à la base
$o_pdo = new Database();
$o_conn = $o_pdo->makeConnect();

if ($_GET["mode"] == "modif"){
    // on va chercher la personne
    $id = $_GET["id"];
    $gb = new PhotoBase();
    $pho = $gb->getPhoto($o_conn, $id);

    foreach($pho as $p){
        $pho_id = $p["pho_id"];
        $pho_nom = $p["pho_nom"];
        $pho_album = $p["pho_album"];
    }
    $gb = null;
    $pers = null;
}

else{
    if ($_GET["mode"] == "nouveau") {
        $pers = array();
        $pho_nom = "";
        $pho_album = "";
    }
}


?>
<form action="/src/traitements/galerie-ajout.php" method="POST" enctype="multipart/form-data">
    <label for="nom">Nom : </label><input type="text" name="nom" id="nom" value="<?php echo $pho_nom?>"><br>
    <label for="album">Album : </label><input type="text" name="album" id="album" value="<?php echo $pho_album?>"><br>
    <label for="photo">Fichier : </label><input type="file" name="photo" id="photo"><br>

    <input type="submit" value="Envoyer">
</form>
