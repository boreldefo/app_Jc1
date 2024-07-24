<?php
require_once './database/database.php';
$authDB = require_once './database/security.php';

// Vérifier si le formulaire de connexion a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    var_dump($email);
    // Tenter de connecter l'administrateur
    if ($email == 'admin12@gmail.com' and $password == 'sessi0nAdmin!') {
        // Rediriger l'administrateur vers la page d'administration
        header('Location: dashboard.php');
        exit();
    } else {
        // Afficher un message d'erreur si l'authentification échoue
        $error = "Email ou mot de passe incorrect.";
    }
}

?>





<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connexion Espace Administrateur</title>
  <link rel="stylesheet" href="public\css\admin.css">
</head>

<body>


  <div class="login-container">
    <h3>Espace Administrateur</h3>
    <div class="admin-icon">
      <img src="public\images\admin.jpg" alt="Icone d'administrateur">
    </div>

    <?php if (isset($e)) {
            echo $e;
        } ?>

    <form action="" method="POST">
      <div class="input-group">
        <input type="email" id="email" name="email" placeholder="Username" required>
      </div>
      <div class="input-group">
        <input type="password" id="password" name="password" placeholder="Password" required>
      </div>
      <button type="submit">Se connecter</button>
    </form>
  </div>
</body>

</html>