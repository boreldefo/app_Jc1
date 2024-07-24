<pre>
<?php 
require_once './database/database.php';
$authDB = require_once './database/security.php';


const ERROR_REQUIRED= 'veuillez renseigner ce champs ';

const ERROR_PASSWORD_TOO_SHORT='';
const ERROR_PASSWORD_MISSMATCH=' mot de passe incorrect';
const ERROR_EMAIL_INVALID =' L\'email n\'est pas valide';
const ERROR_EMAIL_UNKOWN='L\'email n\'est pas enregistrée';



$erros = [

  'tel' =>'',

]; 
if($_SERVER['REQUEST_METHOD']=='POST'){


  $tel=$_POST['tel']??'';
  $password = $_POST['password']??'';




if(!$tel){
  $erros['tel']=ERROR_REQUIRED;
} 



  if(empty(array_filter($erros, fn($e)=> $e !==''))){

$user=$authDB->getUserFromEmail($tel);

  if(!$user){
  
    $erros['tel']=ERROR_EMAIL_UNKOWN;
  }  else {
     $authDB->login($user['id']);

   
     if($tel == "65478568"){
      header('Location: /dashboard.php');
     } else {
      header('Location: /profile.php');
     }
      
    
  }
  }
  
}

;
?>
</pre>
<html lang="en">

<head>
  <link rel="stylesheet" href="public/css/auth-login.css">
  <?php require_once 'includes/head.php' ?>
  <title>Connexion</title>
</head>

<body>

  <div class="container">
    <?php require_once 'includes/header.php'?>

    <div class="content">

      <div class="block p-20 form-container">
        <div class="loginimage">
          <img src="public/css/login-logo.png" alt="">
        </div>
        <h1 style="text-align: center;">
          Connexion
        </h1>
        <h5>Connectez Vous à votre compte pour telecharger votre fiche d'inscription.</h5>
        <form id="formlogin" action="/auth-login.php" , method="POST">


          <div class="form-control ">
            <label for="email" class="show-label" style="font-size: 12px;">Téléphone</label>
            <div class="container-input ">

              <input class="input-auth" placeholder="Téléphone" type="number" name="tel" id="emaillogin"
                value="<?= $email??'' ?>">
              <div class="iconvalidation">

                <i class="fas fa-exclamation"></i>
              </div>
            </div>
            <div class="javacripterror">
              <small class="text-danger"></small>
            </div>
            <p class="text-danger error">
              <?php if($erros['tel']): ?>
              <?= $erros['tel'] ?>
              <?php endif; ?>
            </p>
          </div>








          <div class="form-action">

            <button class="btn btn-primary" type="submit">Se Connecter</button>
            <!-- <a href="/auth-register.php" class="btn btn-secondary" type="button">S'inscrire</a> -->
          </div>
        </form>
      </div>
    </div>

  </div>
</body>


</html>