<?php

class UtilisateursManager{
private $pdo;

public function __construct(PDO $pdo){
    $this -> pdo = $pdo;
}

public function inserer($utilisateur){
    $pdo -> prepare(insert into utilisateurs (nom, prenom, tel, email) value(:nom, :prenom, :tel, :) )
}

}