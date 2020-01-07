<?php


class AffichageGalerie
{
    // pour obtenur les photos pour un album donné
    public function getPhotosDUnAblum($db,$idalb){
            $sql_alb_ac = "SELECT
                            `pho_id`,
                            `pho_nom`,
                            `pho_album_id`,
                            `alb_libelle`
                            
                        FROM
                            photo
                                INNER JOIN `album`
                                    ON photo.pho_album_id=album.alb_id
                            
                        WHERE
                            `alb_deleted_at` IS NULL
                            AND
                            `pho_deleted_at`IS NULL
                            AND
                            `pho_album_id`=$idalb
                        ";
            $rs_alb_ac = $db->query($sql_alb_ac);
            return $rs_alb_ac;
        }    
    
    // pour avoir une photo active par album actif
    public function getUnePhotoParAlbum($db){
            $sql_alb_ac = "SELECT
                            `pho_id`,
                            `pho_nom`,
                            `pho_album_id`,
                            `pho_created_at`,
                            alb_libelle
                            
                        FROM
                            `photo`
                                INNER JOIN album
                                    ON photo.pho_album_id=album.alb_id
                        WHERE
                            `pho_deleted_at` IS NULL
                            AND `alb_deleted_at` IS NULL
                            and `pho_nom`IN (select max(`pho_nom`) FROM photo WHERE `pho_deleted_at` IS NULL GROUP BY `pho_album_id`)
                        ";
            $rs_alb_ac = $db->query($sql_alb_ac);
            return $rs_alb_ac;
        }

        //pour avoir le nom d'un album en fonction de son id
        public function nomAlbumById($db,$idalb){
            $sql_alb_ac = "SELECT
                                `alb_id`,
                                `alb_libelle`
                            FROM
                                `album`
                            WHERE
                                `alb_deleted_at` IS NULL
                                AND
                                `alb_id`=$idalb
                        ";
            $rs_alb_ac = $db->query($sql_alb_ac);
            return $rs_alb_ac;
        }


  
    
}