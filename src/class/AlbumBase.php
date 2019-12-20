<?php


class AlbumBase
{
    public function getAlbumActifs($db){
        $sql_alb_ac = "SELECT * FROM `album` WHERE alb_deleted_at is null ";
        $rs_alb_ac = $db->query($sql_alb_ac);
        return $rs_alb_ac;
    }
}