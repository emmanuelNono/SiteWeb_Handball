<?php

class EquipeBase
{
    // return la liste des equipe actives
    public function getEquipesActives($db)
    {
        $sql_ea = "SELECT * FROM equipe where equ_deleted_at is null";
        $rs_ea = $db->query($sql_ea);
        $tbEquAct = $rs_ea->fetchAll(PDO::FETCH_ASSOC);
        return $tbEquAct;
    }

    // Return la ligne qui contient l'equipe passé en param
    public function getEquipe($db, $id)
    {
        $o_rEquId = $db->prepare("SELECT equipe.equ_id,equipe.equ_libelle,equipe.equ_widget_id,equipe.equ_categorie,equipe.equ_division,equipe.equ_jour_entrain,equipe.equ_heure_entrain, 
        personne.per_id, personne.per_nom, personne.per_prenom FROM equipe
                INNER JOIN lien_per_fon_equ ON equipe.equ_id=lien_per_fon_equ.lpfe_equ_id 
                INNER JOIN fonction ON fonction.fon_id=lien_per_fon_equ.lpfe_fon_id
                INNER JOIN personne on personne.per_id=lien_per_fon_equ.lpfe_per_id WHERE equipe.equ_id = :id");

        $o_rEquId->bindParam(':id', $id);
        $o_rEquId->execute();
        $rowEquId = $o_rEquId->fetchall();
        return $rowEquId;
    }

    // Return le nom de l'entraineur d'une equipe passé en param
    public function getEquipeActivesAndEntraineur($db)
    {
        $sql_equAndEntrain = "SELECT equipe.equ_id,equipe.equ_libelle,equipe.equ_widget_id,equipe.equ_categorie,equipe.equ_division,equipe.equ_jour_entrain,equipe.equ_heure_entrain, 
        personne.per_id, personne.per_nom, personne.per_prenom FROM equipe
                INNER JOIN lien_per_fon_equ ON equipe.equ_id=lien_per_fon_equ.lpfe_equ_id 
                INNER JOIN fonction ON fonction.fon_id=lien_per_fon_equ.lpfe_fon_id
                INNER JOIN personne on personne.per_id=lien_per_fon_equ.lpfe_per_id";
        $rs_equAndEntrain = $db->query($sql_equAndEntrain);
        $tbEquAndEntrain = $rs_equAndEntrain->fetchAll(PDO::FETCH_ASSOC);
        return $tbEquAndEntrain;
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

    public function setUpdateEquipe($db, $id, $form_equ_libelle, $form_equ_categorie, $form_equ_division, $form_equ_jour_entrain, $form_equ_heure_entrain)
    {
        if ($id == "new") {
            //var_dump("on est dans un insert Equipe dur " . $id);
            $o_insertEquipeAndEntrain = $db->prepare("INSERT INTO equipe 
            (equ_id, equ_libelle, equ_categorie, equ_division, equ_jour_entrain, equ_heure_entrain, equ_created_at)
            VALUES (
            null,
            :form_equ_libelle,
            :form_equ_categorie,
            :form_equ_division,
            :form_equ_jour_entrain,
            :form_equ_heure_entrain,
            NOW()
            )");
            $o_insertEquipeAndEntrain->bindParam(':form_equ_libelle', $form_equ_libelle);
            $o_insertEquipeAndEntrain->bindParam(':form_equ_categorie', $form_equ_categorie);
            $o_insertEquipeAndEntrain->bindParam(':form_equ_division', $form_equ_division);
            $o_insertEquipeAndEntrain->bindParam(':form_equ_jour_entrain', $form_equ_jour_entrain);
            $o_insertEquipeAndEntrain->bindParam(':form_equ_heure_entrain', $form_equ_heure_entrain);

            $rs_setEquipeInsert = $o_insertEquipeAndEntrain->execute();
            return $rs_setEquipeInsert;
        } else {
            $o_updateEquipeAndEntrain = $db->prepare("UPDATE equipe SET 
        equ_libelle=:form_equ_libelle,
        equ_categorie=:form_equ_categorie,
        equ_division=:form_equ_division,
        equ_jour_entrain=:form_equ_jour_entrain,
        equ_heure_entrain=:form_equ_heure_entrain,
        equ_updated_at = CURRENT_TIME WHERE equ_id=:id");
            $o_updateEquipeAndEntrain->bindParam(':id', $id);
            $o_updateEquipeAndEntrain->bindParam(':form_equ_libelle', $form_equ_libelle);
            $o_updateEquipeAndEntrain->bindParam(':form_equ_categorie', $form_equ_categorie);
            $o_updateEquipeAndEntrain->bindParam(':form_equ_division', $form_equ_division);
            $o_updateEquipeAndEntrain->bindParam(':form_equ_jour_entrain', $form_equ_jour_entrain);
            $o_updateEquipeAndEntrain->bindParam(':form_equ_heure_entrain', $form_equ_heure_entrain);

            $rs_setEquipe = $o_updateEquipeAndEntrain->execute();
            return $rs_setEquipe;
        }
    }


    public function InsertEquipe($db, $dataEqu)
    {
        echo 'console.log(' . "InsertEquipe console" . ')';
        $rqEqu = "INSERT INTO equipe 
        (equi_id, equ_libelle, equ_categorie, equ_division, equ_jour_entrain, equ_heure_entrain) VALUES (
        null, :equ_libelle, :equ_categorie, :equ_division, :equ_jour_entrain, :equ_heure_entrain);";
        //$rqEqu .= " (null, :equ_libelle, :equ_categorie, :equ_division, :equ_jour_entrain, :equ_heure_entrain);";
        $o_rqEqu_prep = $db->prepare($rqEqu);
        $o_rqEqu_prep->execute($dataEqu);
        var_dump(" et " . $db->prepare($rqEqu));
        return $o_rqEqu_prep;
    }


    public function getEntraineursActifs($db)
    {
        $sql_entrain = "SELECT personne.per_id, personne.per_nom,personne.per_prenom FROM `personne`
        INNER JOIN lien_per_fon_equ ON lien_per_fon_equ.lpfe_per_id=personne.per_id 
        INNER JOIN fonction ON lien_per_fon_equ.lpfe_fon_id=fonction.fon_id
        WHERE fonction.fon_libelle='Entraineur'";
        $rs_entrain = $db->query($sql_entrain);
        $tbNomEntrain = $rs_entrain->fetchAll(PDO::FETCH_ASSOC);
        return $tbNomEntrain;
    }

    // public function setHeure($db,  $form_equ_heure_entrain, $id)
    // {
    //     $o_updateEquipeAndEntrain = $db->prepare("UPDATE equipe SET 
    //     equ_heure_entrain=:form_equ_heure_entrain,
    //     equ_updated_at = CURRENT_TIME WHERE equ_id=:id");
    //     $o_updateEquipeAndEntrain->bindParam(':form_equ_heure_entrain', $form_equ_heure_entrain);
    //     $o_updateEquipeAndEntrain->bindParam(':id', $id);

    //     $rs_setEquipe = $o_updateEquipeAndEntrain->execute();
    // }
    //------------------------------
    // $sql_In = "INSERT INTO equipe 
    //         (equ_id, equ_libelle, equ_categorie, equ_division, equ_jour_entrain, equ_heure_entrain, equ_created_at) VALUES 
    //         (null, 'zzzz', 'Junior', 'Nationale 1', 'Lundi- Mardi', '19h - 21h', NOW() );";
    //         $rs_In = $db->query($sql_In);
    //         return $rs_In;
}