<pre>
<?php 
$pdo = require_once './database/database.php';
$authDB =require_once './database/security.php';



const ERROR_REQUIRED= 'veuillez renseigner ce champs ';
const ERROR_TOO_SHORT ='ce champs est trop petit';
const ERROR_PASSWORD_TOO_SHORT='Le mot de passe doit faire au moins 6 carractères';
const ERROR_PASSWORD_MISSMATCH='Le mot de passe de confirmation est différent';
const ERROR_EMAIL_INVALID =' L\'email n\'est pas valide';
const ERROR_EMAIL_ALREADY_EXIST='email deja utilisée ';



$erros = [
  'firstname'=> '',
  'lastname' =>'',
  'email' =>'',
  'password' =>'',
  'confirmpassword' =>'',
  'tel'=>'',
  'adresse'=>'',
  'codepostal'=>'',
  'ville'=>''
]; 

if($_SERVER['REQUEST_METHOD']=='POST'){

  $input = filter_input_array(INPUT_POST,[
    'firstname' =>FILTER_SANITIZE_SPECIAL_CHARS,
    'lastname' =>FILTER_SANITIZE_SPECIAL_CHARS,
    'email' =>FILTER_SANITIZE_EMAIL,
    'tel'=> FILTER_SANITIZE_SPECIAL_CHARS,
    'adresse'=>FILTER_SANITIZE_SPECIAL_CHARS,
    'codepostal'=>FILTER_SANITIZE_SPECIAL_CHARS,
    'ville'=> FILTER_SANITIZE_SPECIAL_CHARS
  ]); 
  $sexe =$_POST['sexe']??'';
  $firstname = $input['firstname']??'';
  $lastname =$input['lastname']??'';
  $email=$input['email']??'';
  $password = $_POST['password']??'';
  $confirmpassword =$_POST['confirmpassword']??'';
  $attestation1=$_POST['attestation1']??'Non';
  $attestation2 = $_POST['attestation2']??'Non';

  $pays = $_POST['pays']??'';
  $tel =$input['tel']??'';
  $adresse=$input['adresse']??'';
  $codepostal =$input['codepostal']??'';
  $ville = $input['ville']??'';




if(!$firstname){
  $erros['firstname']=ERROR_REQUIRED;
} elseif(mb_strlen($firstname)<2){
  $erros['firstname']=ERROR_TOO_SHORT;
}

if(!$lastname){
  $erros['lastname']=ERROR_REQUIRED;
} elseif(mb_strlen($lastname)<2){
  $erros['lastname']=ERROR_TOO_SHORT;
}

if(!$email){
  $erros['email']=ERROR_REQUIRED;
} elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
  $erros['email']=ERROR_EMAIL_INVALID;
}

if(!$password){
  $erros['password']=ERROR_REQUIRED;
} elseif(mb_strlen($password)<6){
  $erros['password']=ERROR_PASSWORD_TOO_SHORT;
}


if(!$adresse){
  $erros['adresse']=ERROR_REQUIRED;
} 

if(!$codepostal){
  $erros['codepostal']=ERROR_REQUIRED;
}

if(!$ville){
  $erros['ville']=ERROR_REQUIRED;
}

  if(empty(array_filter($erros, fn($e)=> $e !==''))){

    $user=$authDB->getUserFromEmail($email);
  
    if($user){
$erros['email']= ERROR_EMAIL_ALREADY_EXIST;
    } else {

      $authDB->register([
        'firstname'=>$firstname,
        'lastname'=> $lastname,
        'email'=> $email,
        'password'=>$password,
        'pays'=>$pays,
        'tel'=>$tel,
        'adresse'=>$adresse,
        'codepostal'=>$codepostal,
        'ville'=>$ville,
        'sexe'=>$sexe,
        'attestation1'=>$attestation1,
        'attestation2'=>$attestation2
      ]);
 
       header('Location: /profile.php');
    }

  }
  
}

;
?>
</pre>
<html lang="en">

<head>
  <link rel="stylesheet" href="public/css/auth-register.css">
  <script defer src="public/js/register.js"></script>

  <?php require_once 'includes/head.php' ?>
  <title>Inscription</title>
</head>

<body>

  <div class="container">

    <?php require_once 'includes/header.php'?>
    <div class="content">

      <div class="block p-20 form-container">

        <form id="formregister" action="/auth-register.php" , method="POST">
          <div class="formregister1">
            <h1>
              Je m'inscris aux jeux concours 2024
            </h1>
            <div class="form-control ">




              <select class="container-input-sexe " name="sexe" id="sexe">
                <option value="M">M.</option>
                <option value="Mme">Mme</option>
              </select>

              <div class="form-control">
                <label for="firstname" class="show-label" style="font-size: 12px;">Prenom</label>
                <div class="container-input ">

                  <input class="input-auth" placeholder="Prenom" type="text" name="firstname" id="firstname"
                    value="<?= $firstname??'' ?>">
                  <div class="iconvalidation">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation"></i>
                  </div>
                </div>

                <div class="javacripterror">
                  <small class="text-danger"></small>
                </div>
                <p class="text-danger error">
                  <?php if($erros['firstname']): ?>
                  <?= $erros['firstname'] ?>
                  <?php endif; ?>
                </p>
              </div>



            </div>
            <div class="form-control ">
              <label for="lastname" class="show-label" style="font-size: 12px;">Nom</label>
              <div class="container-input ">

                <input class="input-auth" placeholder="Nom" type="text" name="lastname" id="lastname"
                  value="<?= $lastname??'' ?>">
                <div class="iconvalidation">
                  <i class="fas fa-check-circle"></i>
                  <i class="fas fa-exclamation"></i>
                </div>
              </div>
              <div class="javacripterror">
                <small class="text-danger"></small>
              </div>
              <p class="text-danger error">
                <?php if($erros['lastname']): ?>
                <?= $erros['lastname'] ?>
                <?php endif; ?>
              </p>
            </div>

            <div class="form-control ">
              <label for="email" class="show-label" style="font-size: 12px;">Email</label>
              <div class="container-input ">

                <input class="input-auth" placeholder="Email" type="email" name="email" id="emailregister"
                  value="<?= $email??'' ?>">
                <div class="iconvalidation">
                  <i class="fas fa-check-circle"></i>
                  <i class="fas fa-exclamation"></i>
                </div>
              </div>
              <div class="javacripterror">
                <small class="text-danger"></small>
              </div>
              <p class="text-danger error">
                <?php if($erros['email']): ?>
                <?= $erros['email'] ?>
                <?php endif; ?>
              </p>
            </div>

            <div class="form-control ">
              <label for="password" class="show-label" style="font-size: 12px;">Mot de passe</label>
              <div class="container-input ">

                <input class="input-auth" placeholder="Mot de passe" type="password" name="password"
                  id="passwordregister" value="<?= $password??'' ?>">
                <div class="iconvalidation">
                  <i class="fas fa-check-circle"></i>
                  <i class="fas fa-exclamation"></i>
                </div>
              </div>
              <div class="javacripterror">
                <small class="text-danger"></small>
              </div>
              <p class="text-danger error">
                <?php if($erros['password']): ?>
                <?= $erros['password'] ?>
                <?php endif; ?>
              </p>
            </div>



          </div>
          <div>




            <div class="form-control ">
              <label for="telephone" style="font-size: 12px;">Telephone</label>
              <div class="container-input ">
                <input class="input-auth" type="tel" name="tel">

              </div>
              <small class="text-danger"></small>
              <p class="text-danger error">
                <?php if($erros['tel']): ?>
                <?= $erros['tel'] ?>
                <?php endif; ?>
              </p>
            </div>


            <div class="form-control ">
              <label for="adresse" style="font-size: 12px;">Paroisse</label>


              <select class="container-input" name="adresse" id="adresse">

                <option value="Saint EMERENT">Saint EMERENT</option>
                <option value="Saint Michel">Saint Michel</option>
                <option value="Saint Philipe">Saint Philipe</option>
                <option value="Saint Archile">Saint Archile</option>
                <option value="Saint Antoine de Padou">Saint Antoine de Padou</option>
                <option value="Saint Jean">Saint Jean</option>
                <option value="Sainte Therese de mbenda">Sainte Therese de mbenda</option>
                <option value="Bienheureuse Anuarite">Bienheureuse Anuarite</option>
                <option value="Saint Pierre et Paul de simbock">Saint Pierre et Paul de simbock</option>
                <option value="Paroisse d'Odja">Paroisse d'Odja</option>
                <option value="autre">Autre Paroisse</option>
              </select>
            </div>
            <div class="form-control ">
              <label for="codepostal" style="font-size: 12px;">Groupe d'appartenance</label>


              <select class="container-input" name="codepostal" id="codepostal">

                <option value="Enfants de Choeus">Enfants de Choeus</option>
                <option value="Les Lecteurs">Les Lecteurs</option>
                <option value="Lectors">Lectors</option>
                <option value="Garde suisse">Garde suisse</option>
                <option value="Ava">Ava</option>
                <option value="Chorale ste Rita">Chorale ste Rita</option>
                <option value="autre">Autre Groupe</option>
              </select>
            </div>

            <div class="form-control ">
              <label for="ville" style="font-size: 12px;">Dernier sacrement recu</label>


              <select class="container-input" name="ville" id="ville">

                <option value="bapteme">Baptême</option>
                <option value="eucharistie">Eucharistie</option>
                <option value="confirmation">Confirmation</option>
                <option value="ordre">Ordre</option>
                <option value="aucun">Aucun</option>
              </select>




            </div>



            <div class="form-action">

              <button class="btn btn-primary" type="submit">Valider</button>
            </div>


          </div>
        </form>
      </div>
    </div>

  </div>

</body>


</html>