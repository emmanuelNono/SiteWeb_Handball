<?php
require_once '../includes/Database.php';
require_once '../class/ArticleBase.php';

// connexion à la base
$o_pdo = new Database();
$o_conn = $o_pdo->makeConnect();


$numpage = (!empty($_GET['page']) ? $_GET['page'] : 1);
$limite = 3;
$debut = ($numpage - 1) * $limite;
$articles = new ArticleBase();
$list5ArticlesActifs = $articles->getPage5Articles($o_conn, $debut, $limite);
$pageLimite = ((count($articles->getArticlesActifs($o_conn)) / $limite));
if (($_GET['page'] > ($pageLimite + 1)) || ($_GET['page'] < 0) || !(is_numeric($_GET['page']))) {
    header("location:?page=1");
};


include('../includes/head.php');
include('../includes/header.php');
?>


<div class="container">
    <h3> &ensp; Actualités</h3><br>
    <nav aria-label="Page navigation article">
        <ul class="pagination">
            <?php if ($numpage != 1) { ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?php echo ($numpage - 1); ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo; Précédent</span>
                    </a>
                </li>
            <?php } ?>
            <?php if ($numpage < $pageLimite) { ?>
            <li class="page-item">
                <a class="page-link" href="?page=<?php echo ($numpage + 1); ?>" aria-label="Next">
                    <span aria-hidden="true">Suivant &raquo;</span>
                </a>
            </li>
            <?php } ?>
        </ul>
    </nav>
    <div class="">
        <?php for ($incrArt = 0; $incrArt < count($list5ArticlesActifs); $incrArt++) {
            $photoArticle = $articles->getPhotoDeArticle($o_conn, $list5ArticlesActifs[$incrArt]['art_photo_id']);
            $auteurArticle = $articles->getAuteurDeArticle($o_conn, $list5ArticlesActifs[$incrArt]['art_auteur_id'])
        ?>
            <div class="article-block">
                <h3><?php echo $list5ArticlesActifs[$incrArt]['art_titre'] ?></h3>
                <img class="article-photo" src="../../resources/galerie/<?php echo $photoArticle[0]['pho_nom'] ?>" alt="">
                <p class="article-contenu"><?php echo $list5ArticlesActifs[$incrArt]['art_contenu'] ?></p>
                <blockquote class="blockquote">
                    <p class="mb-0"></p>
                    <footer class="blockquote-footer"><?php echo $auteurArticle[0]['per_prenom'] . " " . $auteurArticle[0]['per_nom'] ?>
                        <cite title="Source Title"><?php echo $list5ArticlesActifs[$incrArt]['art_created_at'] ?></cite></footer>
                </blockquote>
            </div>
        <?php } ?>
    </div>

    <?php
    include('../includes/footer.php');
    ?>