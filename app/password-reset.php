<pre>
<?php 
require_once './database/database.php';
require 'function.php';


const ERROR_REQUIRED= 'veuillez renseigner ce champs ';

const ERROR_PASSWORD_TOO_SHORT='';
const ERROR_PASSWORD_MISSMATCH=' mot de passe incorrect';
const ERROR_EMAIL_INVALID =' L\'email n\'est pas valide';
const ERROR_EMAIL_UNKOWN='L\'email n\'est pas enregistrée';



$erros = [

  'email' =>'',
  

]; 
if(($_SERVER['REQUEST_METHOD']=='POST') && (isset($_POST['send_link']))){

  $input = filter_input_array(INPUT_POST,[
  
    'email' =>FILTER_SANITIZE_EMAIL,
  ]); 
 
  $email=$input['email']??'';
  

if(!$email){
  $erros['email']=ERROR_REQUIRED;
} elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
  $erros['email']=ERROR_EMAIL_INVALID;
}


  if(empty(array_filter($erros, fn($e)=> $e !==''))){

    // verifier si l'utilisateur est present dans la bd 
$query = $pdo->prepare('SELECT * FROM user WHERE email =:email');
$query->bindValue(':email', $email);
$query->execute();
$row =$query->rowCount();

if($row == 1){
  // genere le code 
  $code = generateRandomString();

  // formulation du lien 
  $link = 'href="http://localhost:3000/password-reset.php?email='.$email.'&code='.$code.'"';
  $link2 = '<span style="width:100%"> <a class="btn btn-primary"'.$link.'>Modifier mon mot de passe </a> </span>';
  
  // mettre à jr la table reset
  $query_reset = $pdo->prepare('SELECT * FROM reset WHERE email =:email');
  $query_reset->bindValue(':email', $email);
  $query_reset->execute();
  $from_reset = $query_reset->fetch();

  if(empty($from_reset)){
    // enregistrer dans la table reset de la bd 
    $query_inserrt_reset = $pdo->prepare('INSERT INTO reset(email, code) VALUES (?,?)');
    $query_inserrt_reset->execute([$email,$code]);
  } else {
    $query_inserrt_reset = $pdo->prepare('UPDATE reset SET code =? WHERE email = ?');
    $query_inserrt_reset->execute([$code, $email]);
  }

  // formulation et envoie de l'email

  $from = 'martialdomgue@gmail.com';
  $to = 'martialdomgue@gmail.com';
  $subject = 'Modifier votre mot de passe';

  $message = '
  <p> Cher '.$email.', cliquez sur le lien pour modifier le mot de passe</p>

  <p> .</p>

  <p>'.$link2.'</p>
  
  ';
  
  //set content-type when sending HTML email
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
  $headers .='From: '.$from."\r\n";
 $verify = mail($to, $subject, $message, $headers);
var_dump($message);
  //notifier à l'utilisateur le succes de l'envoi
  if($verify){$msg = '<h4 class="text-primary"> bienvouloir consulter votre boite mail, le lien vous à été envoyer via votre adresse mail </h4> ';}
} else {
  $erros['email']=ERROR_EMAIL_UNKOWN;
}


  }
  
}

;
?>
</pre>
<html lang="en">

<head>
  <link rel="stylesheet" href="public/css/forgetpassword.css">
  <?php require_once 'includes/head.php' ?>
  <title>forgetpassword</title>
</head>

<body>

  <div class="container">
    <?php require_once 'includes/header.php'?>

    <div class="content">

      <div class="block p-20 form-container">

        <h1>
          Saisissez Votre adresse e-mail, Nous Vous enverrons un lien pour réinitialiser votre mot de passe.
        </h1>

        <form id="formforgetpassword" action="/password-reset.php" , method="POST">


          <div class="form-control ">
            <label for="email" class="show-label" style="font-size: 12px;">Email</label>
            <div class="container-input ">

              <input class="input-auth" placeholder="Email" type="email" name="email" id="emailforgetpassword"
                value="<?= $email??'' ?>">
              <i class="fas fa-check-circle"></i>
              <i class="fas fa-exclamation"></i>
            </div>
            <small class="text-danger"></small>
            <p class="text-danger error">
              <?php if($erros['email']): ?>
              <?= $erros['email'] ?>
              <?php endif; ?>
            </p>
          </div>


          <?php if(isset($msg)){echo $msg;} ?>



          <div class="form-actions">

            <button name="send_link" class="btn btn-primary" type="submit">Envoyer</button>

          </div>
        </form>
      </div>
    </div>

  </div>
</body>


</html>