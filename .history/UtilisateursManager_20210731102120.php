<?php
require_once 'inclureClasses.php';

class UtilisateursManager{
private $pdo;

public function __construct(PDO $pdo){
    $this -> pdo = $pdo;
}

public function inserer(Utilisateurs $utilisateur){
    $req = $this -> pdo -> prepare('INSERT INTO utilisateurs(nom, prenom, tel, email) VALUES(:nom, :prenom, :tel, :email)');
    $req -> bindValue(':nom', $utilisateur->getNom(), PDO::PARAM_STR); //$_POST['nom'] ??
    $req -> bindValue(':prenom', $utilisateur->getPrenom(), PDO::PARAM_STR);
    $req -> bindValue(':tel', $utilisateur->getTel(), PDO::PARAM_STR);
    $req -> bindValue(':email', $utilisateur->getEmail(), PDO::PARAM_STR);
    $req -> execute();
}

public function getListeUtilisateurs(){
    $req = $this -> pdo -> query('SELECT * FROM utilisateurs ORDER BY nom ASC');
    $listeUtilisateurs = $req -> fetchAll();
    $req -> closeCursor();
    return  

}

}