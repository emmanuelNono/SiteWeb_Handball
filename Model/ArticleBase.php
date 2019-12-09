<?php 
namespace Model;

class ArticleBase{

    public function getArticlesActifs($db)
    {
        $sql_selection = "SELECT * FROM ARTICLE WHERE art_actif=1;";
        $rs_selection = $db->query($sql_selection);
        //var_dump($rs_selection);
        //exit;
        return $rs_selection;
        
    }
}