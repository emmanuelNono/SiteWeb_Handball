<?php


class Sexe
{
    private $id;
    private $intitule;

    function __construct($id, $intitule)
    {
        $this->id = $id;
        $this->intitule = $intitule;
    }

    public function getId(){
        return $this->id;
    }

    public function getIntitule(){
        return $this->intitule;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setIntitule($intitule){
        $this->intitule = $intitule;
    }

}