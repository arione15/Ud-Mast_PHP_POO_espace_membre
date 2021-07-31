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

// Si vous voulez récupérer votre résultat dans une classe (en utilisant PDO :: FETCH_CLASS)
// et que le constructeur soit exécuté avant que PDO assigne les propriétés de l'objet(pour que
// le constructeur n'ecrase pas les valeurs assignées aux attributs par PDO), vous devez utiliser 
// la constante PDO :: FETCH_PROPS_LATE:

public function getListeUtilisateurs(){
    $req = $this -> pdo -> query('SELECT * FROM espace_membres.utilisateurs ORDER BY nom ASC');
    $req -> setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Utilisateurs');
    $listeUtilisateurs = $req -> fetchAll();
    $req -> closeCursor();
    return $listeUtilisateurs;
}

public function getUtilisateur($id){
    $req = $this -> pdo -> prepare('SELECT * FROM espace_membres.utilisateurs WHERE id=:id');
    $req -> bindValue(':id', $id, PDO::PARAM_INT);
    $req -> execute();
    $req -> setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Utilisateurs');
    $utilisateur = $req -> fetch();
    //$req -> closeCursor();
    return $utilisateur;
}

public function mettreAJourUtilisateur(Utilisateurs $utilisateur){
    $req = $this -> pdo -> prepare('UPDATE espace_membres.utilisateurs SET nom=:nom, prenom=:prenom, tel=:tel, email=:email WHERE id=:id');
    
    $req -> bindValue(':id', $utilisateur->getId());
    $req -> bindValue(':nom', $utilisateur->getNom());
    $req -> bindValue(':prenom', $utilisateur->getPrenom());
    $req -> bindValue(':tel', $utilisateur->getTel());
    $req -> bindValue(':email', $utilisateur->getEmail());
    
    $req -> execute();
}

public function supprimerUtilisateur($id){
    $this -> pdo -> exec('DELETE FROM espace_membres.utilisateurs WHERE id='.$id);
}

public function save(Utilisateurs $utilisateur)
	{
		if ($utilisateur->isUserValide()){
			$utilisateur->isNouveauUser()? $this->inserer($utilisateur) : $this->mettreAJourUtilisateur($utilisateur);
		}
		else
		{
			throw new RuntimeException('L\'utilisateur doit étre valide pour l\'enregistrer');
		}
	}

public function count(){
	 $nombreMembres = $this->bddPDO->query('SELECT COUNT(*) FROM utilisateurs')->fetchcolumn();
	 return $nombreMembres;
}

}