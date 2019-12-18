<?php


class ArticleBase
{
    // Récupère tous les articles qui ne sont pas supprimés (deleted_at)
    public function getArticlesActifs($db){
        $sql_aa = "SELECT * FROM article where art_deleted_at is null";
        $rs_aa = $db->query($sql_aa);
        return $rs_aa;
    }

    // Récupère toutes les infos d'un article
    public function getArticle($db,$id){
        $o_ra = $db->prepare("SELECT * FROM article where art_id = :id");
        $o_ra->bindParam(':id',$id);
        $o_ra->execute();
        $row = $o_ra->fetchall();
        return $row;
    }

    // Récupère les 3 derniers articles
    public function get3DerniersArticles($db){
        $sql_3a = "SELECT * FROM article ORDER BY art_id DESC LIMIT 3";
        $rs_3a = $db->query($sql_3a);
        $derniersArticles = $rs_3a->fetchAll(PDO::FETCH_ASSOC);
        return $derniersArticles;
    }

    // Récupère la photo d'un article grâce à son id
    public function getPhotoDeArticle($db,$id){
        $o_rpa = $db->prepare("SELECT pho_nom FROM photo
                               INNER JOIN article
                               ON photo.pho_id = article.art_photo_id
                               WHERE art_id = :id");
        $o_rpa->bindParam(':id',$id);
        $o_rpa->execute();
        $photo = $o_rpa->fetchAll(PDO::FETCH_ASSOC);
        return $photo;
    }
}