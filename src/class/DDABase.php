<?php
class DdaBase
{
    public function getDdaActifs($db){
        $sql_dda = "SELECT * FROM `dde_accompagnant` WHERE dda_deleted_at is null ";
        $rs_dda = $db->query($sql_dda);
        return $rs_dda;
    }

    public function getMaxId($db){
        $sql_maxi = "SELECT max(dda_id) as maxi FROM dde_accompagnant";
        $rs_maxi = $db->query($sql_maxi);
        foreach ( $rs_maxi as $max)
        {
            $res = $max['maxi'];
        }
        return $res;
    }

    public function addDda($db, $data){
        $sql_ajout = "INSERT INTO dde_accompagnant (dda_id, dda_lib, dda_actif, dda_created_at) VALUES ";
        $sql_ajout .= " (:id, :lib, :actif ,now() );";
        $o_rq_prep = $db->prepare($sql_ajout);
        $o_rq_prep->execute($data);
        return $o_rq_prep;
    }

    public function updateDda($db, $data){
        $sql_modif = "UPDATE dde_accompagnant SET dda_lib =:lib, dda_actif=:actif, dda_updated_at = now() ";
        $sql_modif .= " WHERE dda_id =:id";
        $o_rq_prep = $db->prepare($sql_modif);
        $o_rq_prep->execute($data);
        return $o_rq_prep;
    }

    public function getDda($db, $id){
        $o_rp = $db->prepare("SELECT * FROM dde_accompagnant where dda_id = :id");
        $o_rp->bindParam(':id',$id);
        $o_rp->execute();

        while ($row = $o_rp->fetchall()) {
            return $row;
        }
    }

    public function deleteDda($db, $data){
        $sql_modif = "UPDATE dde_accompagnant SET dda_deleted_at = now() ";
        $sql_modif .= " WHERE dda_id =:id";
        $o_rq_prep = $db->prepare($sql_modif);
        $o_rq_prep->execute($data);
        return $o_rq_prep;
    }
}