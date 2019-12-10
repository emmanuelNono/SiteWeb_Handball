<?php
session_start();
// page d'affichage des articles actifs;
//$tab_article = $_SESSION['article'];
?>
<?php include('includes/head.php'); ?>
<?php include('includes/header.php'); ?>
<div id="container">
    <div id="Article" class="col-lg-12">
        <h1>Les dernières news</h1>
        
        <?php var_dump($_COOKIE); ?>
        <?php var_dump($_POST); ?>


        
    </div>
</div>
<?php include('includes/footer.php');?>