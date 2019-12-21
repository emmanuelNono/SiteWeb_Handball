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

// on va chercher la liste des albums avec la photo la plus récente de chaque
$o_alb = new AffichageGalerie();
$albums = $o_alb->getUnePhotoParAlbum($o_conn);

$alb = $albums->fetchall();

?>

	<div class="row justify-content-center">
    	<h1>Les photos de notre club</h1>
	</div>
	<br/><br/>

	<!-- affichage des albums actifs dans des cards -->
	<div class="container container-home">
	    <div class="row justify-content-center">
			<div class="card-columns col-md-12 justify-content-center">

			<?php foreach ($alb as $a){ ?>

				<div class="card" style="width: 18rem;">
				  <img class="card-img-top" src="../../resources/galerie/<?php echo $a["pho_nom"] ?>" alt="Card image cap">

				  <div class="card-body">
				    <h5 class="card-title"><?php echo $a["alb_libelle"] ?></h5>
				    <p class="card-text"></p>
				    <a href="galerie-album.php?idalb=<?php echo $a["pho_album_id"]?>" class="btn btn-warning">Voir les photos</a>
				  </div>
				</div>
	    	<?php } ?>

	    	</div>
		</div>
	</div>


<?php

$o_conn = null;
$albums = null;

include('../includes/footer.php');
?>