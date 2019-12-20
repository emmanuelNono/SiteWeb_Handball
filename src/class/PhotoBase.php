<?php


class PhotoBase
{
    public function getPhotosActives($db){
        $sql_pa = "SELECT * FROM photo ";
        $sql_pa .= " inner join album on photo.pho_album_id = album.alb_id ";
        $sql_pa .= " where pho_deleted_at is null" ;
        $rs_pa = $db->query($sql_pa);
        return $rs_pa;
    }

    public function getPhoto($db,$id){
        $o_rp = $db->prepare("SELECT * FROM photo where pho_id = :id");
        $o_rp->bindParam(':id',$id);
        $o_rp->execute();

        while ($row = $o_rp->fetchall()) {
            return $row;
        }
    }

    public function getMaxId($db){
        $sql_maxi = "SELECT max(pho_id) as maxi FROM photo";
        $rs_maxi = $db->query($sql_maxi);
        foreach ( $rs_maxi as $max)
        {
            $res = $max['maxi'];
        }
        return $res;
    }

    public function addPhoto($db, $data){
        $sql_ajout = "INSERT INTO photo (pho_id, pho_nom, pho_album_id, pho_created_at) VALUES ";
        $sql_ajout .= " (:id, :nom, :album, now() );";
        $o_rq_prep = $db->prepare($sql_ajout);
        $o_rq_prep->execute($data);
        return $o_rq_prep;
    }

    public function updatePhoto($db, $data){
        $sql_modif = "UPDATE photo SET pho_nom =:nom, pho_album_id =:album, pho_updated_at = now() ";
        $sql_modif .= " WHERE pho_id =:id";
        $o_rq_prep = $db->prepare($sql_modif);
        $o_rq_prep->execute($data);
        return $o_rq_prep;
    }

    public function updateAlbum($db, $data){
        $sql_modif = "UPDATE photo SET pho_album_id =:album, pho_updated_at = now() ";
        $sql_modif .= " WHERE pho_id =:id";
        $o_rq_prep = $db->prepare($sql_modif);
        $o_rq_prep->execute($data);
        return $o_rq_prep;
    }
}