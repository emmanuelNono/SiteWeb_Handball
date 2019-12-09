<?php
namespace Model;

class Article{
    private $art_id;
    private $art_titre;
    private $art_contenu;
    private $art_auteur_id;
    private $art_actif;
    private $art_created_at;
    private $art_updated_at;
    private $art_deleted_at;

    public function __construct($art_id, $art_titre, $art_contenu, $art_auteur_id, $art_actif, $art_created_at, $art_updated_at, $art_deleted_at)
                        {
                            $this->art_actif = $art_id;
                            $this->art_titre = $art_titre;
                            $this->art_contenu = $art_contenu;
                            $this->art_auteur_id = $art_auteur_id;
                            $this->art_actif = $art_actif;
                            $this->art_created_at = $art_created_at;
                            $this->art_updated_at = $art_updated_at;
                            $this->art_deleted_at = $art_deleted_at; 
                        }

    public function getArtId(){
        return $this->art_id;
    }

    public function getArtTitre(){
        return $this->art_titre;
    }

}