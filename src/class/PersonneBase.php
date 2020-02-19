<?php


class PersonneBase
{
    public function getPersonnesActives($db){
        $sql_pa = "SELECT * FROM personne ";
        $sql_pa .= " inner join sexe on personne.per_sexe = sexe.sex_id ";
        $sql_pa .= " where per_deleted_at is null";
        $rs_pa = $db->query($sql_pa);
        return $rs_pa;
    }

    public function getPersonne($db,$id){
        $o_rp = $db->prepare("SELECT * FROM personne where per_id = :id");
        $o_rp->bindParam(':id',$id);
        $o_rp->execute();

        if ($o_rp->execute())
        {
            while ($row = $o_rp->fetchall())
            {
                return $row;
            }
        }
        else {
            // utilisateur inconnu
            header("location:login.php?mes=error");
        }
    }
}