<?php
require_once __DIR__ . '/database/database.php';

// $articleDB= require_once __DIR__.'/database/models/ArticleDB.php';
$authDB = require __DIR__ . '/database/security.php';
$currentUser = $authDB->isLoggdin();




//var_dump($currentUser);

if (!$currentUser) {
    header('Location: /');
}

$id_dashboard = $_GET['id']??'';
if($id_dashboard){
  setcookie('id_dashboard',$id_dashboard);
  $user2 =$authDB->fetchOne($id_dashboard);
}



const ERROR_REQUIRED = 'veuillez renseigner ce champs ';
const ERROR_TOO_SHORT = 'ce champs est trop petit';
const ERROR_EMAIL_INVALID = ' L\'email n\'est pas valide';
const ERROR_EMAIL_ALREADY_EXIST = 'email deja utilisée ';





$errors = [
    'firstname' => '',
    'lastname' => '',
    'email' => '',
    'tel' => '',
    'date_naissance' => '',
    'adresse' => '',
    'codepostal' => '',
    'ville' => ''
];



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    $input = filter_input_array(INPUT_POST, [
        'firstname' => FILTER_SANITIZE_SPECIAL_CHARS,
        'lastname' => FILTER_SANITIZE_SPECIAL_CHARS,
        'email' => FILTER_SANITIZE_EMAIL,
        'tel' => FILTER_SANITIZE_SPECIAL_CHARS,
        'date_naissance' => FILTER_SANITIZE_SPECIAL_CHARS,
        'adresse' => FILTER_SANITIZE_SPECIAL_CHARS,
        'code_postal' => FILTER_SANITIZE_SPECIAL_CHARS,
        'ville' => FILTER_SANITIZE_SPECIAL_CHARS
    ]);
    $firstname = $input['firstname']??'';
    $lastname = $input['lastname']??'';
    $email = $input['email']??'';

    $datenaissance = $input['date_naissance']; // Je viens de l'ajouter...

    $pays = $_POST['pays']??'';
    $tel = $input['tel']??'';
    $adresse = $input['adresse']??'';
    $codepostal = $input['code_postal']??'';
    $ville = $input['ville']??'';
    $statut=$_POST['statut']??'';

    echo $statut;
    if (!$firstname) {
        $errors['firstname'] = ERROR_REQUIRED;
    } elseif (mb_strlen($firstname) < 2) {
        $errors['firstname'] = ERROR_TOO_SHORT;
    }

    if (!$lastname) {
        $errors['lastname'] = ERROR_REQUIRED;
    } elseif (mb_strlen($lastname) < 2) {
        $errors['lastname'] = ERROR_TOO_SHORT;
    }

 
    if (empty(array_filter($errors, fn ($e) => $e !== ''))) {

        //$user = $currentUser;
        $id_dashboard=$_COOKIE['id_dashboard']??'';
        $user =$authDB->fetchOne($id_dashboard);
        
        if($_COOKIE['id_dashboard']){
          $authDB->updateInformation([
            'firstname' => $firstname,
            'lastname' => $lastname,
            'pays' => $pays,
            'tel' => $tel,
            'date_naissance' => $datenaissance,
            'adresse' => $adresse,
            'statut' => $statut,
            'codepostal' => $codepostal,
            'ville' => $ville,
            'id'=>$user['id']
        ]);
        } else {
          $authDB->updateInformation([
            'firstname' => $firstname,
            'lastname' => $lastname,
            'pays' => $pays,
            'tel' => $tel,
            'date_naissance' => $datenaissance,
            'adresse' => $adresse,
            'statut' => $statut,
            'codepostal' => (int) $codepostal,
            'ville' => $ville,
            'id'=>$currentUser['id']
        ]);
        }
       
     
       
        
          header('Location: /dashboard.php');
     
    }
}



?>

<html lang="en">

<head>
  <link rel="stylesheet" href="public/css/profile.css">
  <?php require_once 'includes/head.php' ?>
  <link href="bootstrap-5.3.2-dist/css/bootstrap.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script defer src="public/js/register.js"></script>
  <title>Informations personnelles</title>

  <style>
  /* Ajoutez du style personnalisé ici si nécessaire */
  body {
    display: flex;
    align-items: center;
    justify-content: center;

    margin: 0;
  }

  h1 {
    font-size: 40px;
    color: #30336b;
    margin-bottom: 10%;
  }

  .btn {
    font-size: 1.6rem;
    font-weight: bold;
  }

  /* Ajoutez des coins arrondis aux champs éditables */
  .form-control {
    border-radius: 15px;
    padding: 4px;
    color: #3498db;
    font-size: 1.6rem;
    font-weight: bold;
  }

  .form-control-lg {
    height: 50px;
    /* Modifiez cette valeur selon vos besoins */
  }
  </style>

</head>


<body>

  <div class="container mt-5">

    <br>

    <div class="card-header">
      <?php if ($currentUser['id']==47) : ?>
      <h1 class="text-center mb-4"> Informations personnelles
        <a href="dashboard.php" class="btn btn-danger float-end">BACK</a>
      </h1>
      <?php else: ?>
      <h1 class="text-center mb-4"> Informations personnelles
        <a href="profile.php" class="btn btn-danger float-end">BACK</a>
      </h1>
      <?php endif; ?>

    </div>
    <br>
    <!-- Formulaire -->
    <form id="updateForm" action="modif-info.php" method="POST">
      <!-- Nom -->
      <?php if ($currentUser['id']==47) : ?>
      <div class="form-group row">
        <label for="paysresidence" class="col-md-3 col-form-label">Statut</label>
        <div class="container-input col-md-6">
          <select style="width: 100%;" name="statut" id="statut">
            <option value="non"> Non Valide</option>
            <option value="oui" <?=$user2['statut']=="oui"?'selected':''; ?>>Valide</option>
          </select>
        </div>
      </div>
      <?php endif ?>




      <div class="form-group row">
        <label for="nom" class="col-md-3 col-form-label">Nom:</label>
        <div class="col-md-6">
          <input name="firstname" type="text" class="form-control form-control-lg" id="nom"
            placeholder="Entrez votre nom" value="<?= $lastname?? $user2['nom']?>">
        </div>
        <div class="javacripterror">
          <small class="text-danger"></small>
        </div>
        <p class="text-danger error">
          <?php if ($errors['lastname']) : ?>
          <?= $errors['lastname'] ?>
          <?php endif; ?>
        </p>
      </div>





      <!-- Prénom -->
      <div class="form-group row">
        <label for="prenom" class="col-md-3 col-form-label">Prénom:</label>
        <div class="col-md-6">
          <input name="lastname" type="text" class="form-control form-control-lg" id="prenom"
            placeholder="Entrez votre prénom" value="<?= $firstname ?? $user2['prenom'] ?>">
        </div>

        <div class="javacripterror">
          <small class="text-danger"></small>
        </div>
        <p class="text-danger error">
          <?php if ($errors['firstname']) : ?>
          <?= $errors['firstname'] ?>
          <?php endif; ?>
        </p>
      </div>








      <!-- Date de Naissance -->
      <div class="form-group row">
        <label for="dateNaissance" class="col-md-3 col-form-label">Date de Naissance:</label>
        <div class="col-md-6">
          <input name="date_naissance" type="date" class="form-control form-control-lg" id="dateNaissance"
            value="<?= $datenaissance ?? $user2['date_naissance'] ?>">
        </div>
      </div>

      <!-- Pays de résidence -->


      <!-- Adresse -->
      <div class="form-group row">
        <label for="adresse" class="col-md-3 col-form-label">Paroisse:</label>
        <div class="col-md-6">
          <input name="adresse" type="text" class="form-control form-control-lg" id="adresse"
            value="<?= $adresse ?? $user2['adresse']  ?>">
        </div>

        <small class="text-danger"></small>
        <p class="text-danger error">
          <?php if ($errors['adresse']) : ?>
          <?= $errors['adresse'] ?>
          <?php endif; ?>
        </p>
      </div>

      <!-- Code postal -->
      <div class="form-group row">
        <label for="codepostal" class="col-md-3 col-form-label">Groupe d'appartenance:</label>
        <div class="col-md-6">
          <input name="code_postal" type="text" class="form-control form-control-lg" id="codepostal"
            value="<?= $codepostal ?? $user2['code_postal']  ?>">
        </div>

        <small class="text-danger"></small>
        <p class="text-danger error">
          <?php if ($errors['codepostal']) : ?>
          <?= $errors['codepostal'] ?>
          <?php endif; ?>
        </p>
      </div>

      <!-- Villes -->
      <div class="form-group row">
        <label for="ville" class="col-md-3 col-form-label">Dernier Sacrement:</label>
        <div class="col-md-6">
          <input name="ville" type="text" class="form-control form-control-lg" id="ville"
            value="<?= $ville ?? $user2['ville']  ?>">
        </div>

        <small class="text-danger"></small>
        <p class="text-danger error">
          <?php if ($errors['ville']) : ?>
          <?= $errors['ville'] ?>
          <?php endif; ?>
        </p>
      </div>

      <!-- Numéro de Téléphone -->
      <div class="form-group row">
        <label for="telephone" class="col-md-3 col-form-label">Numéro de Téléphone:</label>
        <div class="col-md-6">
          <input name="tel" type="tel" class="form-control form-control-lg" id="telephone"
            placeholder="Entrez votre numéro de téléphone" value="<?= $tel ?? $user2['telephone'] ?>">
        </div>

        <small class="text-danger"></small>
        <p class="text-danger error">
          <?php if ($errors['tel']) : ?>
          <?= $errors['tel'] ?>
          <?php endif; ?>
        </p>
      </div>

      <!-- Bouton de Mise à Jour -->
      <div class="form-group row">
        <div class="col-md-6 offset-md-7">
          <button type="submit" class="btn btn-primary btn-block">Mettre à Jour</button>
        </div>
      </div>
    </form>
  </div>

</body>

</html>