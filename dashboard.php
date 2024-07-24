<?php


$pdo = require_once './database/database.php';
$authDB = require_once './database/security.php';

$currentUser = $authDB->isLoggdin();




if (!$currentUser) {
  header('Location: /');
}
$users = $authDB->fetchAll();


?>

<html lang="fr">

<head>
  <link rel="stylesheet" href="public/css/profile.css">
  <link href="bootstrap-5.3.2-dist/css/bootstrap.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <title>Dashboard</title>
</head>

<body>

  <div class="container mt-4">


    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4>Users Details
              <!-- <a href="index.php" class="btn btn-primary float-end">Add Users</a> -->
            </h4>
          </div>
          <ul>

            <li>
              <a href="/auth-logout.php">
                <i class="fa-solid fa-right-from-bracket"></i>

                <span>Déconnexion</span>

              </a>

            </li>

          </ul>
          <div class="card-body">

            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>User</th>

                  <th>Statut</th>
                  <th>Info</th>
                  <th>Action</th>


                </tr>
              </thead>
              <tbody>
                <?php foreach($users as $m): ?>
                <?php if($m['id']!=9 & $m['id']!=10  & $m['id']!=11 & $m['id']!=12 & $m['id']!=13 & $m['id']!=15 & $m['id']!=16 & $m['id']!=17 & $m['id']!=18 & $m['id']!=19 & $m['id']!=20 & $m['id']!=21 & $m['id']!=22 & $m['id']!=23 & $m['id']!=24 & $m['id']!=14 & $m['id']!=26 & $m['id']!=28):  ?>
                <tr>
                  <td><?= $m['id']; ?></td>
                  <td><?= $m['prenom'] . ' ' . $m['nom']; ?></td>

                  <td class="btn " style="width: 100%; background-color:#4bcffa">
                    <?=$m['statut']=="oui"?'Valide':'Non Valide'; ?></td>
                  <td>
                    <a style="width: 100%;" href=" user-view.php?id=<?= $m['id']; ?>"
                      class="btn btn-info btn-sm">View</a>
                  </td>
                  <td>

                    <a href="modif-info.php?id=<?= $m['id']; ?>" class="btn btn-success btn-sm">Update</a>

                  </td>
                </tr>
                <?php endif ?>
                <?php endforeach;?>



              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>


</html>