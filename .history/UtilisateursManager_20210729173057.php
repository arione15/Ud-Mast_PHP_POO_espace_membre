<?php
require 'Utilisateurs.php';

class UtilisateursManager{
private $pdo;

public function __construct(PDO $pdo){
    $this -> pdo = $pdo;
}

public function inserer($utilisateur){
    $query = $this -> pdo -> prepare('insert into utilisateurs (nom, prenom, tel, email) values(:nom, :prenom, :tel, :email)');
    $query -> bindValue(':nom', $utilisateur->getNom(), PDO::PARAM_STR); //$_POST['nom'] ??
    $query -> execute();
    

}

}