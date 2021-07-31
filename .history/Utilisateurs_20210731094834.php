<?php

class Utilisateurs
{
    private $id;
    private $nom;
    private $prenom;
    private $tel;
    private $email;

    private $erreurs = [];
    
    const NOM_INVALIDE = 1;
    const PRENOM_INVALIDE = 2;
    const EMAIL_INVALIDE = 3;


    public function __construct($donnees = [])
    {
        $this->hydrater($donnees);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        if (!empty($id)) {
            $this->id = $id;
        }
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        if (!is_string($nom) || empty($nom)) {
            $this->erreurs[] = self::NOM_INVALIDE;
        }
        $this->nom = $nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        if (!is_string($prenom) || empty($prenom)) {
            $this->erreurs[] = self::PRENOM_INVALIDE;
        }
        $this->prenom = $prenom;
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
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $this->email = $email;
        }$this->erreurs[]=self::EMAIL_INVALIDE;
    }


    public function hydrater(array $donnees)
    {
        foreach ($donnees as $propriete => $valeur) {
            $methodSet = 'set' . ucfirst($propriete);
            $this->$methodSet($valeur);
        }
    }

    public function isUserValid()
    {
        if (!(empty($this->nom) || empty($this->prenom) || empty($this->email))) { // on peut l'écrire "return !empty(.....)"
            return true;
        }
    }

    public function getErreurs()
    {
        return $this->erreurs;
    }

    public function setErreurs($erreurs)
    {
        $this->erreurs = $erreurs;

        return $this;
    }
}
