<?php
require 'Utilisateurs.php';

class UtilisateursManager{
private $pdo;

public function __construct(PDO $pdo){
    $this -> pdo = $pdo;
}

public function inserer(Utilisateurs $utilisateur){
    $query = $this -> pdo -> prepare('INSERT INTO utilisateurs(nom, prenom, tel, email) VALUES(:nom, :prenom, :tel, :email)');
    $query -> bindValue(':nom', $utilisateur->getNom(), PDO::PARAM_STR); //$_POST['nom'] ??
    $query -> bindValue(':prenom', $utilisateur->getPrenom(), PDO::PARAM_STR);
    $query -> bindValue(':tel', $utilisateur->getTel(), PDO::PARAM_STR);
    $query -> bindValue(':email', $utilisateur->getEmail(), PDO::PARAM_STR);
    $query -> execute();
}

}