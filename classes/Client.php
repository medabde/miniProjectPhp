<?php
require_once "Connexion.php";

class Client{


    private $id;
    private $civilite;
    private $nom;
    private $prenom;
    private $con;
    
    function __construct($nom=null,$prenom=null,$civilite=null,$id=null){
        $this->id=$id;
        $this->civilite=$civilite;
        $this->nom=$nom;
        $this->prenom=$prenom;

        $this->con=new Connexion();

    }

    //getters

    public function getId()
    {
        return $this->id;
    }

    
    public function getCivilite()
    {
        return $this->civilite;
    }
    
    public function getNom()
    {
        return $this->nom;
    }

    
    public function getPrenom()
    {
        return $this->prenom;
    }


    //setters

    public function setId($id){
        $this->id=$id;
    }
    
    public function setCivilite($civilite)
    {
        $this->civilite=$civilite;
    }
    
    public function setNom($nom)
    {
        $this->nom=$nom;
    }

    
    public function setPrenom($prenom)
    {
        $this->prenom=$prenom;
    }



    //CRUD operations
    
    
    public function create()
    {
        $nb=$this->con->exec("INSERT INTO clients(Client_nom,Client_prenom,Client_civilite)
        VALUES('".$this->nom."','".$this->prenom."','".$this->civilite."');");

        return ($nb>0)?true:false;
    }
    
    
    public function readAll(){
        $res=array();

        $query=$this->con->query("SELECT * FROM clients");
        $data=$query->fetchAll();

        foreach ($data as $client) {
            $cl=new Client($client['Client_nom'],$client['Client_prenom'],$client['Client_civilite'],$client['Client_num']);
            array_push($res,$cl);
        } 
        return $res;
    }


    public function readById(){
     
        $query=$this->con->query("SELECT * FROM clients WHERE Client_num='".$this->id."'");
        $client=$query->fetch();

        if ($client==null)return false;

        $this->id=$client['Client_num'];
        $this->nom=$client['Client_nom'];
        $this->prenom=$client['Client_prenom'];
        $this->civilite=$client['Client_civilite'];
        return true;
    }

    public function update(){

        $nb=$this->con->exec("UPDATE clients SET Client_nom='".$this->nom."',Client_prenom='".$this->prenom."',Client_civilite='".$this->civilite."' WHERE Client_num='".$this->id."';");
        
        return ($nb>0)?true:false;
    }

    public function delete(){
        $nb=$this->con->exec("DELETE FROM clients WHERE Client_num='".$this->id."';");

        return ($nb>0)?true:false;
    }


}