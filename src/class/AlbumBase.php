<?php


class AlbumBase
{
    public function getAlbumActifs($db){
        $sql_alb_ac = "SELECT * FROM `album` WHERE alb_deleted_at is null ";
        $rs_alb_ac = $db->query($sql_alb_ac);
        return $rs_alb_ac;
    }

    public function getMaxId($db){
        $sql_maxi = "SELECT max(alb_id) as maxi FROM album";
        $rs_maxi = $db->query($sql_maxi);
        foreach ( $rs_maxi as $max)
        {
            $res = $max['maxi'];
        }
        return $res;
    }

    public function addAlbum($db, $data){
        $sql_ajout = "INSERT INTO album (alb_id, alb_libelle, alb_created_at) VALUES ";
        $sql_ajout .= " (:id, :libelle, now() );";
        $o_rq_prep = $db->prepare($sql_ajout);
        $o_rq_prep->execute($data);
        return $o_rq_prep;
    }

    public function updateAlbum($db, $data){
        $sql_modif = "UPDATE album SET alb_libelle =:libelle, alb_updated_at = now() ";
        $sql_modif .= " WHERE alb_id =:id";
        $o_rq_prep = $db->prepare($sql_modif);
        $o_rq_prep->execute($data);
        return $o_rq_prep;
    }

    public function getAlbum($db, $id){
        $o_rp = $db->prepare("SELECT * FROM album where alb_id = :id");
        $o_rp->bindParam(':id',$id);
        $o_rp->execute();

        while ($row = $o_rp->fetchall()) {
            return $row;
        }
    }

    public function deleteAlbum($db, $data){
        $sql_modif = "UPDATE album SET alb_deleted_at = now() ";
        $sql_modif .= " WHERE alb_id =:id";
        $o_rq_prep = $db->prepare($sql_modif);
        $o_rq_prep->execute($data);
        return $o_rq_prep;
    }
}