<?php
// les includes pour la création de la page
include('../includes/head.php');
include('../includes/header.php');

// les includes techniques
require_once '../includes/Database.php';
require_once '../class/AffichageGalerie.php';

// connexion à la base
$o_pdo = new Database();
$o_conn = $o_pdo->makeConnect();

// on va chercher la liste des photos de cet album
$o_alb = new AffichageGalerie();
$photos = $o_alb->getPhotosDUnAblum($o_conn,$_GET['idalb']);
$pho = $photos->fetchall();

// on va chercher le libellé de cet album
$a_alb = new AffichageGalerie();
$album = $a_alb->nomAlbumById($o_conn,$_GET['idalb']);
$cetAlbum = $album->fetchall();

?>

	<div class="row justify-content-center">
    	<h1>Album <?php echo $cetAlbum[0]["alb_libelle"]?></h1>
	</div>
	<br/><br/>

	<!-- affichage des photos d'un album donné en paramètre de la page -->
	<div class="container container-home">
	    <div class="row justify-content-center">
			<div class="card-columns col-md-12">

				<?php foreach ($pho as $p){ ?>
		
			  	<img class="img-thumbnail" src="../../resources/galerie/<?php echo $p["pho_nom"] ?>" alt="Card image cap">
			  			
    			<?php } ?>
    		</div>
		</div>
	</div>


<?php

$o_conn = null;
$albums = null;

include('../includes/footer.php');
?>