<?php
require_once '../includes/Database.php';
require_once '../class/ArticleBase.php';

// connexion à la base
$o_pdo = new Database();
$o_conn = $o_pdo->makeConnect();

$articles = new ArticleBase();
$derniersArticles = $articles->get3DerniersArticles($o_conn);

include('../includes/head.php');
include('../includes/header.php');
?>

<div class="container container-home">

    <!-- 
    <h2><?php // echo "id session = ".session_id() ?></h2>
    <h2><?php  echo "admin = ".$_SESSION["admin"] ?></h2>
    <h2><?php // echo "redac = ".$_SESSION["redac"] ?></h2>
    -->
    
    <div class="row justify-content-center">
        <div class="col-md-8 col-sm-12">
            <div id="carouselArticles" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselArticles" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselArticles" data-slide-to="1"></li>
                    <li data-target="#carouselArticles" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <?php $photo1 = $articles->getPhotoDeArticle($o_conn, $derniersArticles[0]['art_photo_id']) ?>
                        <img src="../../resources/galerie/<?php echo $photo1[0]['pho_nom'] ?>" class="img-fluid tales" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h2 class="mb-0"><?php echo $derniersArticles[0]['art_titre'] ?></h2>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <?php $photo2 = $articles->getPhotoDeArticle($o_conn, $derniersArticles[1]['art_photo_id']) ?>
                        <img src="../../resources/galerie/<?php echo $photo2[0]['pho_nom'] ?>" class="img-fluid tales" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h2><?php echo $derniersArticles[1]['art_titre'] ?></h2>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <?php $photo3 = $articles->getPhotoDeArticle($o_conn, $derniersArticles[2]['art_photo_id']) ?>
                        <img src="../../resources/galerie/<?php echo $photo3[0]['pho_nom'] ?>" class="img-fluid tales" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h2 class="mb-0"><?php echo $derniersArticles[2]['art_titre'] ?></h2>
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
        </div>
    </div>
</div>

<div class="container container-home">
    <div class="row justify-content-center">
        <div class="card text-center" style="width: 20rem;">
            <a href="club.php"><img id="iconResult" src="../../resources/img/trophy.png" class="card-img-top img-fluid" alt="Résultats"></a>
            <div class="card-body">
                <a href="club.php" class="btn btn-warning">Accèder aux résultats du club</a>
            </div>
        </div>
        <div id="cardProchainsMatchs" class="card text-center" style="width: 28rem;">
            <div class="card-body">
                <div class="card-header">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active bg-warning" id="SENIORF1-tab" data-toggle="tab" href="#SENIORF1" role="tab" aria-controls="SENIORF1" aria-selected="true">SEN.F1</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-warning" id="SENIORF2-tab" data-toggle="tab" href="#SENIORF2" role="tab" aria-controls="SENIORF2" aria-selected="false">SEN.F2</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-warning" id="SENIORF3-tab" data-toggle="tab" href="#SENIORF3" role="tab" aria-controls="SENIORF3" aria-selected="false">SEN.F3</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="tabProchainsMatchs">
                        <div class="tab-pane fade show active" id="SENIORF1" role="tabpanel" aria-labelledby="SENIORF1-tab">
                            <div class="card-body">
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/iframe-resizer/3.5.5/iframeResizer.min.js"></script>
                                <script>
                                    if (!window._rsz) {
                                        window._rsz = function() {
                                            var i = iFrameResize({
                                                checkOrigin: false,
                                                interval: 100
                                            });
                                        };
                                        if (document.readyState != "loading") {
                                            _rsz()
                                        } else {
                                            document.addEventListener("DOMContentLoaded", _rsz)
                                        }
                                    }
                                </script><iframe id="5df8c6a22d67f30a1bd35fef" src="https://scorenco.com/widget/5df8c6a22d67f30a1bd35fef/?auto_height=true" style="display: block; width: 100%; overflow: auto; margin: auto; border-width: 0px;" scrolling="no"></iframe>
                                <a href="#" class="btn btn-warning">Afficher le calendrier de l'équipe</a>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="SENIORF2" role="tabpanel" aria-labelledby="SENIORF2-tab">
                            <div class="card-body">
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/iframe-resizer/3.5.5/iframeResizer.min.js"></script>
                                <script>
                                    if (!window._rsz) {
                                        window._rsz = function() {
                                            var i = iFrameResize({
                                                checkOrigin: false,
                                                interval: 100
                                            });
                                        };
                                        if (document.readyState != "loading") {
                                            _rsz()
                                        } else {
                                            document.addEventListener("DOMContentLoaded", _rsz)
                                        }
                                    }
                                </script><iframe id="5df8d4b77de2570a17605c82" src="https://scorenco.com/widget/5df8d4b77de2570a17605c82/?auto_height=true" style="display: block; width: 100%; overflow: auto; margin: auto; border-width: 0px;" scrolling="no"></iframe>
                                <a href="#" class="btn btn-warning">Afficher le calendrier de l'équipe</a>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="SENIORF3" role="tabpanel" aria-labelledby="SENIORF3-tab">
                            <div class="card-body">
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/iframe-resizer/3.5.5/iframeResizer.min.js"></script>
                                <script>
                                    if (!window._rsz) {
                                        window._rsz = function() {
                                            var i = iFrameResize({
                                                checkOrigin: false,
                                                interval: 100
                                            });
                                        };
                                        if (document.readyState != "loading") {
                                            _rsz()
                                        } else {
                                            document.addEventListener("DOMContentLoaded", _rsz)
                                        }
                                    }
                                </script><iframe id="5df8d5fd0d02f30a1ca00d35" src="https://scorenco.com/widget/5df8d5fd0d02f30a1ca00d35/?auto_height=true" style="display: block; width: 100%; overflow: auto; margin: auto; border-width: 0px;" scrolling="no"></iframe>
                                <a href="#" class="btn btn-warning">Afficher le calendrier de l'équipe</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container container-home">
    <div class="row justify-content-center">
        <div class="col-md-6 col-sm-12">
            <div id="carouselSponsors" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselSponsors" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselSponsors" data-slide-to="1"></li>
                    <li data-target="#carouselSponsors" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../../resources/img/partLogo-CM.png" class="img-fluid d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../../resources/img/partLogo-Leclerc.png" class="img-fluid d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../../resources/img/partLogo-CM.png" class="img-fluid d-block w-100" alt="...">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselSponsors" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Précédent</span>
                </a>
                <a class="carousel-control-next" href="#carouselSponsors" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Suivant</span>
                </a>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div id="carouselGallerie" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselGallerie" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselGallerie" data-slide-to="1"></li>
                    <li data-target="#carouselGallerie" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../../resources/galerie/1.jpg" class="img-fluid d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../../resources/galerie/5.jpg" class="img-fluid d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../../resources/galerie/7.jpg" class="img-fluid d-block w-100" alt="...">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselGallerie" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Précédent</span>
                </a>
                <a class="carousel-control-next" href="#carouselGallerie" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Suivant</span>
                </a>
            </div>
        </div>
    </div>
</div>

<?php
                                                            include('../includes/footer.php');
?>