<?php
require_once __DIR__ . '/database/database.php';

// $articleDB= require_once __DIR__.'/database/models/ArticleDB.php';
$authDB = require __DIR__ . '/database/security.php';
$currentUser = $authDB->isLoggdin();

// header("Content-type: image/jpeg");
//var_dump($currentUser);

if (!$currentUser) {
  header('Location: /');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  

  $profil = $_FILES['profil']??'';
 


  

      //$user = $currentUser;


      $authDB->updateprofil([
          'profil' => $profil,
          'id'=>$currentUser['id']
      ]);

      header('Location: /profile.php');
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
        <div>
          <h4>A propos de vous</h4>
        </div>

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
        echo '<h2>' . $currentUser["prenom"] . ' ' . $currentUser["nom"] . '</h2>';
      if($currentUser['date_naissance']){
        echo '<p class="user-age">Age : ' . calculerAge($currentUser["date_naissance"]) . ' ans</p>';
      }
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
        <br>
        <h4 class="compte">Fiche d'inscrption</h4>

        <?php if($currentUser['statut']=='oui'):?>

        <div>


          <div class="form-action">
            <a href="fpdf186/pagepdf.php" type="button" class="btn btn-primary" type="button">Telecharger ma fiche</a>

          </div>
        </div>
        <?php else: ?>
        <div>
          <br>

          <p class="paiement"> veillez procéder au paiement des frais de concours, vous trouverez votre fiche ici après
            paiement.
          </p>
        </div>
        <?php endif ?>

      </main>


    </div>


  </div>
  <script>
  const photo_profile = document.querySelector('#photo-profile');
  const modif_profil = document.querySelector('#modif_profil');
  const profil_button = document.querySelector('#profil_button');
  photo_profile.addEventListener('click', () => {
    modif_profil.style.display = 'block';
  })
  profil_button.addEventListener('click', () => {
    modif_profil.style.display = 'none';
  })
  </script>
</body>


</html>