<?php

class Utilisateurs{
    private $id;
    private $nom;
    private $prenom;
    private $tel;
    private $email;

    public function __construct($nom, $prenom, $tel, $email){
        $this -> setNom($nom);
        $this -> set($prenom);
        $this -> set($tel);
        $this -> set($email);

    }

    public function setNom($nom){
        $this->nom=$nom;
        return $this;
    }

    /**
     * Get the value of prenom
     */ 
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of tel
     */ 
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set the value of tel
     *
     * @return  self
     */ 
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }
}