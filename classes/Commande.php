<?php
require_once "Connexion.php";

class Commande{

    private $id;
    private $clientId;
    private $date;
    private $montant;
    private $con;

    function __construct($clientId=null,$date=null,$montant=null,$id=null){
        $this->id=$id;
        $this->clientId=$clientId;
        $this->date=$date;
        $this->montant=$montant;

        $this->con=new Connexion();

    }

    //getters

    public function getId()
    {
        return $this->id;
    }

    
    public function getClientId()
    {
        return $this->clientId;
    }
    
    public function getDate()
    {
        return $this->date;
    }

    
    public function getMontant()
    {
        return $this->montant;
    }


    //setters

    public function setId($id)
    {
        $this->id=$id;
    }
    
    public function setClientId($clientId)
    {
        $this->clientId=$clientId;
    }
    
    public function setDate($date)
    {
        $this->date=$date;
    }

    
    public function setMontant($montant)
    {
        $this->montant=$montant;
    }



    //CRUD operations
    
    
    public function create()
    {
        $nb=$this->con->exec("INSERT INTO commandes(Com_client,Com_date,Com_montant)
        VALUES('".$this->clientId."','".$this->date."','".$this->montant."');");

        return ($nb>0)?true:false;
    }
    
    
    public function readAll(){
        $res=array();

        $query=$this->con->query("SELECT * FROM commandes");
        $data=$query->fetchAll();

        foreach ($data as $commande) {
            $com=new Commande($commande['Com_client'],
                $commande['Com_date'],$commande['Com_montant'],$commande['Com_num']);
            array_push($res,$com);
        } 
        return $res;
    }


    public function readById(){
     
        $query=$this->con->query("SELECT * FROM commandes WHERE Com_num='".$this->id."'");
        $commande=$query->fetch();

        if ($commande==null)return false;

        $this->id=$commande['Com_num'];
        $this->clientId=$commande['Com_client'];
        $this->date=$commande['Com_date'];
        $this->montant=$commande['Com_montant'];
        return true;
    }

    public function update(){

        $nb=$this->con->exec("UPDATE commandes SET Com_client='".$this->clientId."',Com_date='".$this->date."',Com_montant='".$this->montant."' WHERE Com_num='".$this->id."';");
        
        return ($nb>0)?true:false;
    }

    public function delete(){
        $nb=$this->con->exec("DELETE FROM commandes WHERE Com_num='".$this->id."';");

        return ($nb>0)?true:false;
    }


}