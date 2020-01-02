<?php


class PhotoBase
{
    public function getPhotosActives($db){
        $sql_pa = "SELECT * FROM photo where pho_deleted_at is null";
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
            echo "max : ". $max['maxi'];
            $res = $max['maxi'];
        }
        return $res;
    }

    public function addPhoto($db, $data){
        $sql_ajout = "INSERT INTO photo (pho_id, pho_nom, pho_album, pho_created_at) VALUES ";
        $sql_ajout .= " (:id, :nom, :album, now() );";
        $o_rq_prep = $db->prepare($sql_ajout);
        $o_rq_prep->execute($data);
        return $o_rq_prep;
    }
}