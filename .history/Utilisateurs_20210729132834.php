<?php

class Utilisateurs{
    private $id;
    private $nom;
    private $prenom;
    private $tel;
    private $email;

    public function __construct($nom, $prenom, $tel, $email){
        $this -> setNom($nom);
        $this -> set($prenom)

    }

    public function setNom($nom){
        $this->nom=$nom;
        return $this;
    }
}