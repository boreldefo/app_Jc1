<?php

$pdo = require_once './database/database.php';
$authDB = require_once './database/security.php';

?>
<!doctype html>
<html lang="fr">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="bootstrap-5.3.2-dist/css/bootstrap.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <title>User View</title>
</head>

<body>

  <div class="container mt-5">

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4>User View Details
              <a href="dashboard.php" class="btn btn-danger float-end">BACK</a>
            </h4>
          </div>
          <div class="card-body">

            <?php

                        if (isset($_GET['id'])) {
                            $userId = $_GET['id'];

                            $membres = $pdo->prepare('SELECT * FROM user WHERE id= ?');
                            $membres->execute([$userId]);

                            $m = $membres->fetch();



                            if ($membres->rowCount() > 0) {

                        ?>

            <div class="mb-3">
              <label>Prenom</label>
              <p class="form-control">
                <?= $m['prenom']; ?>
              </p>
            </div>
            <div class="mb-3">
              <label>Nom</label>
              <p class="form-control">
                <?= $m['nom']; ?>
              </p>
            </div>
            <div class="mb-3">
              <label>E-mail</label>
              <p class="form-control">
                <?= $m['email']; ?>
              </p>
            </div>
            <div class="mb-3">
              <label>Date de Naissance</label>
              <p class="form-control">
                <?= $m['date_naissance']; ?>
              </p>
            </div>
            <div class="mb-3">
              <label>Pays de résidence</label>
              <p class="form-control">
                <?= $m['pays_residence']; ?>
              </p>
            </div>
            <div class="mb-3">
              <label>Adresse</label>
              <p class="form-control">
                <?= $m['adresse']; ?>
              </p>
            </div>
            <div class="mb-3">
              <label>Code postal</label>
              <p class="form-control">
                <?= $m['code_postal']; ?>
              </p>
            </div>
            <div class="mb-3">
              <label>Ville</label>
              <p class="form-control">
                <?= $m['ville']; ?>
              </p>
            </div>
            <div class="mb-3">
              <label>Telephone</label>
              <p class="form-control">
                <?= $m['telephone']; ?>
              </p>
            </div>

            <?php
                            } else {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>