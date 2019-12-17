<?php


class ArticleBase
{
    public function getArticlesActifs($db){
        $sql_aa = "SELECT * FROM article where art_deleted_at is null";
        $rs_aa = $db->query($sql_aa);
        return $rs_aa;
    }

    public function getArticle($db,$id){
        $o_ra = $db->prepare("SELECT * FROM article where art_id = :id");
        $o_ra->bindParam(':id',$id);
        $o_ra->execute();
        $row = $o_ra->fetchall();
        return $row;

        /*
        if ($o_ra->execute())
        {
            while ($row = $o_ra->fetchall())
            {
                return $row;
            }
        }
        else {
            // utilisateur inconnu
            header("location:login.php?mes=error");
        }
        */
    }

    public function get3DerniersArticles($db){
        $sql_3a = "SELECT * FROM article ORDER BY art_id DESC LIMIT 3";
        $rs_3a = $db->query($sql_3a);
        $derniersArticles = $rs_3a->fetchAll(PDO::FETCH_ASSOC);
        return $derniersArticles;
    }

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