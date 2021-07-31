<?php
require_once 'inclureClasses.php';

$pdo = new PDO('mysql: host=localhost; dbname=espace_membres', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // ou après 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC])

$manager = new UtilisateursManager($pdo);

if (isset($_POST['nom'])) {
    $utilisateur = new Utilisateurs([
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom'],
        'tel' => $_POST['tel'],
        'email' => $_POST['email']
    ]);
    if ($utilisateur->isUserValid()) {
        $manager->inserer($utilisateur);
        echo 'Utilisateur enregistré';
    } else {
        $erreurs = $utilisateur->getErreurs();
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Inscription</title>
</head>

<body>

    <h1>Inscription utilisateur</h1>

    <form >



        <?php if (isset($erreurs) && in_array(Utilisateurs::PRENOM_INVALIDE, $erreurs)) {
            echo 'Le prénom est invalide <br>';
        }
        ?>
        <label for="prenom">Prénom : </label>
        <input type="text" id="prenom" name="prenom">

        <label for="tel">Tél : </label>
        <input type="tel" id="tel" name="tel">

        <?php if (isset($erreurs) && in_array(Utilisateurs::EMAIL_INVALIDE, $erreurs)) {
            echo 'L\'email est invalide <br>';
        }
        ?>
        <label for="mail">Email : </label>
        <input type="email" id="email" name="email">

        <input type="submit" value="Enregistrer" name="enregistrer">
    </form>





    <form action="#" method="post">
  <div class="mb-3">
  <?php if (isset($erreurs) && in_array(Utilisateurs::NOM_INVALIDE, $erreurs)) {
            echo 'Le nom est invalide <br>';
        }
        ?>
    <label for="nom" class="form-label">Nom</label>
    <input type="text" class="form-control" id="nom">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>











    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>