<?php
// class_database.php
class Database{
    var $basName = "";
    var $baseUser = "";
    var $userPassW = "";
    var $hostName = "";
    var $connection = "";

    // paramètres passée : valeur par défaut
    function __construct($base="bd_hbck", $user="root", $password = "", $host="localhost"){
        $this->baseName = $base;
        $this->baseUser = $user;
        $this->userPassW = $password;
        $this->hostName = $host;

        $this->makeConnect();
    }

    // stockae de la connexion
    function makeConnect(){
        $this->connection = new mysqli($this->hostName, $this->baseUser, $this->userPassW, $this->baseName);
        $this->connection->set_charset("utf-8");
    }
}
//$objDatabase = new Database();
