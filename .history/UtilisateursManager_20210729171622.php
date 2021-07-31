<?php

class UtilisateursManager{
private $pdo;

public function __construct(PDO $pdo){
    $this -> pdo = $pdo;
}

public function inserer($utilisateur){
    $pdo -> prepare
}

}