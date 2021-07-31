<?php
require_once 'inclureClasses.php';

$pdo = new PDO('mysql: host=localhost; dbname=espace_membres', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // ou après 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC])

$manager = new UtilisateursManager($pdo);
if(isset($_GET['modifier'])){
    $utilisateur = $manager -> getUtilisateur($_GET['modifier']);
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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="inscription.php">Inscription d'un membre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="administration.php">Administration de l'esapce membres</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>




    <div class="container">
        <h1>Modifier un utilisateur</h1>
        <div class="row">
            <div class="col-md-6">
                <form action="administration.php" method="post" col-md-6>
                    <div class="mb-3">
                        <?php if (isset($erreurs) && in_array(Utilisateurs::NOM_INVALIDE, $erreurs)) {
                            echo 'Le nom est invalide <br>';
                        }
                        ?>
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" value="<?php if(isset($utilisateur)) echo '' ?>">
                    </div>

                    <?php if (isset($erreurs) && in_array(Utilisateurs::PRENOM_INVALIDE, $erreurs)) {
                        echo 'Le prénom est invalide <br>';
                    }
                    ?>
                    <div class="mb-3">
                        <label for="prenom" class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="prenom">
                    </div>

                    <div class="mb-3">
                        <label for="tel" class="form-label">Téléphone</label>
                        <input type="tel" class="form-control" id="tel">
                    </div>

                    <?php if (isset($erreurs) && in_array(Utilisateurs::EMAIL_INVALIDE, $erreurs)) {
                        echo 'L\'email est invalide <br>';
                    }
                    ?>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email">
                    </div>

                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </form>

            </div>
        </div>
    </div>
<br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prénom</th>
                            <th scope="col">Tél.</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($manager->getListeUtilisateurs() as $key) : ?>
                            <tr>
                                <th scope="row"><?= $key->getId() ?></th>
                                <td><?= $key->getNom() ?></td>
                                <td><?= $key->getPrenom() ?></td>
                                <td><?= $key->getTel() ?></td>
                                <td><?= $key->getEmail() ?></td>
                                <td><a href="?modifier=<?= $key->getId() ?>" class='btn btn-primary m-1'>Modifier</a><a href="" class='btn btn-danger m-1'>Supprimer</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>