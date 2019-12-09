<?php
namespace Controller;

require_once('Model/Article.php');
require_once('Model/ArticleBase.php');
require_once('includes/Database.php');

use Model\Article;
use Model\ArticleBase;
use Database;

class ArticleController
{
    public static function AfficherArticlesActifs($req){
        $o_db = new Database("db_hbck", "hbck", "hbck-serfa#67", "localhost");
        // on se connecte
        $o_pdo = $o_db->makeConnect();

        // on va chercher les articles
        $a_base = new ArticleBase();
        
        $rs_article = $a_base->getArticlesActifs($o_pdo);
        //var_dump($rs_article);
        $param = "";
        foreach ($rs_article as $row)
        {
            //print $row['art_id'];
            //print $row['art_titre'];
            //print $row['art_contenu'];
            $param = $param . "id=".$row['art_id']."&titre=" . $row['art_titre'] . "&contenu=". $row['art_contenu'];

        }
        setcookie('article', $rs_article);
        setcookie('toto', "toto");
       
        //$art = new Article();
        
        // on hydrate l'objet
        //$a_base = new ArticleBase();

        header('location:View/templates/news.php?toto'.$param);
    }
}