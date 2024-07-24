<?php
require_once __DIR__ . '/database/database.php';

// $articleDB= require_once __DIR__.'/database/models/ArticleDB.php';
$authDB = require __DIR__ . '/database/security.php';
$currentUser = $authDB->isLoggdin();

$user = $authDB->fetchOne($_GET['id']);
// header("Content-type: image/jpeg");


if (!$currentUser) {
  header('Location: /');
}


?>
<html lang="en">

<head>
  <link rel="stylesheet" href="public/css/profile.css">
  <?php require_once 'includes/head.php' ?>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <title>Mon Profile</title>
</head>

<body>

  <div class="container">
    <?php require_once 'includes/header.php' ?>

    <div class="content">

      <main class="main">


        <div class="containers">
          <div class="trait"></div>
        </div>
        <?php
        function calculerAge($dateNaissance)
        {
          $aujourdhui = new DateTime();
          $naissance = new DateTime($dateNaissance);
          $difference = $aujourdhui->diff($naissance);
          return $difference->y;
        }

        echo '<div class="user-profile">';
        echo '<div class="user-details">';
        echo '<h2>' . $user["prenom"] . ' ' . $user["nom"] . '</h2>';
        echo '<p class="user-age">Age : ' . calculerAge($user["date_naissance"]) . ' ans</p>';
        echo '</div>';
        echo '<div class="user-icon">&#128100;</div>';
        echo '</div>';

        ?>







        <!-- <div class="user-profile">
          <div class="user-details">
            <h2>Prenom Nom</h2>
            <p class="user-age">Age : 25 ans</p>
          </div>
          <div class="user-icon">&#128100;</div>
        </div>

        -->




        <div id="modif_profil">
          <form id="image-profil" action="/profile.php" method="POST" enctype="multipart/form-data">

            <input name="profil" id="image" type="file" accept="image/*">
            <button id="profil_button" type="submit" class="btn btn-primary">Modifier</button>
          </form>
        </div>








        <div>
          <div class="line"></div>
        </div>





        <!--  <div class="password-box">
          <div class="password">
            <h3 id="passwordField">Mot de passe:  //str_repeat('*', strlen($currentUser['password']) / 4)  </h3>
          </div>
          <div class="eye" onclick="togglePasswordVisibility()">&#128065;</div>
        </div> 


        <script>
          var passwordVisible = false;
          var passwordField = document.getElementById('passwordField');
          var originalPassword = json_encode($currentUser['password']) ;

          function togglePasswordVisibility() {
            if (passwordVisible) {
              passwordField.innerText = '*'.repeat(originalPassword.length);
            } else {
              passwordField.innerText = originalPassword;
            }

            passwordVisible = !passwordVisible;
          }
        </script> -->




        <!-- <a href="#" class="password-box-link">
          <div class="password-box">
            <div class="password">
              <h3>Mot de passe</h3>
            </div>
            <div class="eye">******** &#128065;</div>
          </div>
        </a> -->
        <br>
        <a href="#" class="info-perso-link">
          <div class="info-perso">
            <label for="">Telephone : </label>
            <span class="update-info"> <?=$user['telephone'] ?></span>
          </div>
        </a>
        <a href="#" class="info-perso-link">
          <div class="info-perso">
            <label for="">Adresse mail : </label>
            <span class="update-info"> <?=$user['email'] ?></span>
          </div>
        </a>

        <a href="#" class="info-perso-link">
          <div class="info-perso">
            <i class="fa-solid fa-check" style="color:#26de81 ; font-size:2rem; margin-right: 1rem;"></i>
            <span class="update-info">Profil verifié</span>
          </div>
        </a>


        <a href="#" class="info-perso-link">
          <div class="info-perso">
            <i class="fa-solid fa-check" style="color:#26de81 ; font-size:2rem; margin-right: 1rem;"></i>
            <span class="update-info">Utilisateur fiable</span>
          </div>
        </a>



        <a href="#" class="info-perso-link">
          <div class="info-perso">
            <i class="fa-solid fa-check" style="color:#26de81 ; font-size:2rem; margin-right: 1rem;"></i>
            <span class="update-info">Bonne Expérience sur le transport des colis</span>
          </div>
        </a>


        <div>
          <div class="line"></div>
        </div>






      </main>


    </div>


  </div>

</body>


</html>