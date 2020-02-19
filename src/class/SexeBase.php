<?php


class SexeBase
{
    public function getSexeActifs($db){
        $sql_pa = "SELECT * FROM sexe where sex_deleted_at is null";
        $rs_pa = $db->query($sql_pa);
        return $rs_pa;
    }

    public function getMaxId($db){
        $sql_maxi = "SELECT max(sex_id) as maxi FROM sexe";
        $rs_maxi = $db->query($sql_maxi);
        foreach ( $rs_maxi as $max)
        {
            $res = $max['maxi'];
        }
        return $res;
    }

    public function addSexe($db, $data){
        $sql_ajout = "INSERT INTO sexe (sex_id, sex_intitule, sex_created_at) VALUES ";
        $sql_ajout .= " (:id, :intitule, now() );";
        $o_rq_prep = $db->prepare($sql_ajout);
        $o_rq_prep->execute($data);
        return $o_rq_prep;
    }

    public function updateSexe($db, $data){
        $sql_modif = "UPDATE sexe SET sex_intitule =:intitule, sex_updated_at = now() ";
        $sql_modif .= " WHERE sex_id =:id";
        $o_rq_prep = $db->prepare($sql_modif);
        $o_rq_prep->execute($data);
        return $o_rq_prep;
    }

    public function getSexe($db, $id){
        $o_rp = $db->prepare("SELECT * FROM sexe where sex_id = :id");
        $o_rp->bindParam(':id',$id);
        $o_rp->execute();

        while ($row = $o_rp->fetchall()) {
            return $row;
        }
    }

    public function deleteSexe($db, $data){
        $sql_modif = "UPDATE sexe SET sex_deleted_at = now() ";
        $sql_modif .= " WHERE sex_id =:id";
        $o_rq_prep = $db->prepare($sql_modif);
        $o_rq_prep->execute($data);
        return $o_rq_prep;
    }
}