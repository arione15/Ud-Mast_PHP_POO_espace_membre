<?php

class Utilisateurs{
    private $id;
    private $nom;
    private $prenom;
    private $tel;
    private $email;
    private $erreur = [];

    public function __construct($donnees=[]){
        $this -> hydrater($donnees);
    }

    public function getNom(){
        return $this -> nom;
    }

    public function setNom($nom){
        if(!is_string($nom) || empty($nom)){
            $this->erreur[] = self::NOM_INVALIDE;

        }$this->nom=$nom;

    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        if(!is_string($prenom) || empty($prenom)){


        } $this->prenom = $prenom;

    }

    public function getTel()
    {
        return $this->tel;
    }

    public function setTel($tel)
    {
        $this->tel = $tel;

    }

    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email)
    {
        $this->email = $email;

    }
    
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

    }

    public function hydrater(array $donnees){
        foreach($donnees as $propriete => $valeur){
            $methodSet = 'set'. ucfirst($propriete);
            $this -> $methodSet($valeur);
        }
    }

    public function isUserValid(){
        if(!(empty($this->nom) || empty($this->prenom) || empty($this->email))) { // on peut l'écrire "return !empty(.....)"
            return true;
        }

    }
}