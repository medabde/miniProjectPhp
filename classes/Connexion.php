<?php

class Connexion extends PDO{

    private $host="localhost";
    private $db="miniProjet";
    private $user="root";
    private $pass="";


    function __construct(){
        parent::__construct("mysql:host=$this->host;dbname=$this->db" ,$this->user,$this->pass);
    }

}