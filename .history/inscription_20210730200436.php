<?php
include 'Utilisateurs.php';
include 'UtilisateursManager.php';

$pdo = new PDO('mysql: host=localhost; dbname=espace_membres', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>

<body>

    <h1>Inscription utilisateur</h1>

    <form action="#" method="post">

        <label for="nom">Nom : </label>
        <input type="text" id="nom" name="nom" value="nom">

        <label for="prenom">Prénom : </label>
        <input type="text" id="prenom" name="prenom" value="prenom">

        <label for="tel">Nom : </label>
        <input type="tel" id="tel" name="tel" value="tel">

        <label for="mail">Nom : </label>
        <input type="email" id="email" name="email" value="email">

        <input type="submit" value="Enregistrer" name="enregistrer">
    </form>

</body>

</html>