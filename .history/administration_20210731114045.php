<?php
require_once 'inclureClasses.php';

$pdo = new PDO('mysql: host=localhost; dbname=espace_membres', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // ou après 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC])

$manager = new UtilisateursManager($pdo);
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
<a href="index.php">Accueil</a>


<table class="table table-hover">
<thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Prénom</th>
      <th scope="col">Tél.</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach($manager->getListeUtilisateurs() as $key => $valeur): ?>
    <tr>
      <th scope="row">1</th>
      <td><?$key->getNom($nom)</td>
      <td>Otto</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>

  </tbody>
</table>





    <div class="container">
        <h1>Inscription utilisateur</h1>
        <div class="row">
            <div class="col-md-6">
                <form action="#" method="post" col-md-6>
                    <div class="mb-3">
                        <?php if (isset($erreurs) && in_array(Utilisateurs::NOM_INVALIDE, $erreurs)) {
                            echo 'Le nom est invalide <br>';
                        }
                        ?>
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom">
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



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>