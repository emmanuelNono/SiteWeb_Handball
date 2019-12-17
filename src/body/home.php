<?php
include('../includes/head.php');
include('../includes/header.php')
?>

<div class="row justify-content-center">
    Page d'accueil
</div>
<div>
<div id="carouselArticles" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselArticles" data-slide-to="0" class="active"></li>
        <li data-target="#carouselArticles" data-slide-to="1"></li>
        <li data-target="#carouselArticles" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="http://placehold.it/350x150" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="http://placehold.it/350x150" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="http://placehold.it/350x150" class="d-block w-100" alt="...">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselArticles" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Précédent</span>
    </a>
    <a class="carousel-control-next" href="#carouselArticles" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Suivant</span>
    </a>
</div>
</div>

<?php
include('../includes/footer.php');
?>