<?php
class Database{
    var $basName = "";
    var $baseUser = "";
    var $userPassW = "";
    var $hostName = "";
    var $connection = "";

    // paramètres passée : valeur par défaut
    function __construct($base="db_hbck", $user="hbck", $password = "hbck-serfa#67", $host="localhost"){
        $this->baseName = $base;
        $this->baseUser = $user;
        $this->userPassW = $password;
        $this->hostName = $host;

        //$this->makeConnect();
    }

    // stockae de la connexion
    function makeConnect(){
        $this->connection = new PDO('mysql:host=localhost;dbname=db_hbck',"hbck" , "hbck-serfa#67");    
        //$this->connection = new mysqli($this->hostName, $this->baseUser, $this->userPassW, $this->baseName);
        //$this->connection->set_charset("utf-8");
        return $this->connection;
    }

}