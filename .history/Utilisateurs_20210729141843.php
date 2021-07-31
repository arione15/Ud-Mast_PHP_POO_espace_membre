<?php

class Utilisateurs{
    private $id;
    private $nom;
    private $prenom;
    private $tel;
    private $email;

    public function __construct($nom, $prenom, $tel, $email){
        $this -> setNom($nom);
        $this -> setPrenom($prenom);
        $this -> setTel($tel);
        $this -> setEmail($email);

    }

    public function getNom(){
        return $this -> nom;
    }
    public function setNom($nom){
        $this->nom=$nom;
        return $this;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getTel()
    {
        return $this->tel;
    }

    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function hydrate(array $donnees){
        foreach($donnes as $key => $value){
            methodSet() = 'set'. ucfires()

            $this -> methodSet();
        }



    }

    public function isUserValid(){

    }
}