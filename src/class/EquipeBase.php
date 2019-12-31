<?php

class EquipeBase
{
    // return la liste des equipe actives
    public function getEquipesActives($db)
    {
        $sql_ea = "SELECT * FROM equipe where equ_deleted_at is null";
        $rs_ea = $db->query($sql_ea);
        $tbListEqu = $rs_ea->fetchAll(PDO::FETCH_ASSOC);
        return $tbListEqu;
    }

    // Return le nom de l'entraineur d'une equipe passé en param
    public function getEntraineurEquipe($db, $id)
    {
        $o_rEnt = $db->prepare("SELECT personne.per_id, personne.per_nom, personne.per_prenom 
        FROM personne INNER JOIN lien_per_fon_equ ON personne.per_id=lien_per_fon_equ.lpfe_per_id 
        INNER JOIN fonction ON fonction.fon_id=lien_per_fon_equ.lpfe_fon_id
        INNER JOIN equipe on equipe.equ_id=lien_per_fon_equ.lpfe_equ_id
        WHERE fonction.fon_libelle='entraineur' AND equipe.equ_id = :id");

        $o_rEnt->bindParam(':id', $id);
        $o_rEnt->execute();
        $rowEntr = $o_rEnt->fetchall();
        return $rowEntr;
    }

    // Récupère la photo d'une équipe grâce à son id
    public function getPhotoEquipe($db, $id)
    {
        $o_rsPhotoEqu = $db->prepare("SELECT pho_nom FROM photo
                               INNER JOIN equipe
                               ON photo.pho_id = equipe.equi_photo_id
                               WHERE equ_id = :id");
        $o_rsPhotoEqu->bindParam(':id', $id);
        $o_rsPhotoEqu->execute();
        $photo = $o_rsPhotoEqu->fetchAll(PDO::FETCH_ASSOC);
        return $photo;
    }
}