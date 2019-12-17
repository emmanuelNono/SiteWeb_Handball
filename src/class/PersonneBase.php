<?php


class PersonneBase
{
    public function getPersonnesActives($db){
        $sql_pa = "SELECT * FROM personne where per_deleted_at is null";
        $rs_pa = $db->query($sql_pa);
        return $rs_pa;
    }

    public function getPersonne($db,$id){
        //$sql_p = "SELECT * FROM personne where per_id=" . $id;
        $o_rp = $db->prepare("SELECT * FROM personne where per_id = :id");
        $o_rp->bindParam(':id',$id);
        $o_rp->execute();
        //$rs_p = $db->query($sql_p);
        //$rs_p = $o_rp->fetchall();
        //return $rs_p;

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