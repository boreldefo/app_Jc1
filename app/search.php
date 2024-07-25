<?php
require __DIR__.'/database/database.php';
$authDB = require __DIR__.'/database/security.php';
$currentUser =$authDB->isLoggdin();
$trajetDB = require_once __DIR__ . '/database/models/TrajetDB.php';

$trajets = [];

// if(!$currentUser){
//   header('Location: /');
// }

$searchdepart=$_COOKIE['searchdepart']??'';
$searcharrivee=$_COOKIE['searcharrivee']??'';

 $date=$_COOKIE['date']??'';

 if($searchdepart){
  $trajets =$trajetDB->search($searcharrivee); 
  setcookie('searchdepart','', time()-1); 
  setcookie('searcharrivee','', time()-1); 
  setcookie('date','', time()-1); 
 }

if($_SERVER['REQUEST_METHOD']==='POST'){

  $input = filter_input_array(INPUT_POST,[
    'searchdepart' =>FILTER_SANITIZE_SPECIAL_CHARS,
    'searcharrivee' =>FILTER_SANITIZE_SPECIAL_CHARS,
  ]); 
 
$searchdepart=$input['searchdepart']??'';
$searcharrivee=$input['searcharrivee']??'';

 $date=$_POST['date']??'';

     
  

     
if($searcharrivee){
  $trajets =$trajetDB->search($searcharrivee); 
}

 
    
};

 
?>
<html lang="en">

<head>

  <?php require_once 'includes/head.php' ?>
  <link rel="stylesheet" href="public/css/index.css">
  <link rel="stylesheet" href="public/css/trajetlist.css">
  <title>KiloAPP</title>
</head>

<body>

  <div class="container">
    <?php require_once 'includes/header.php'?>

    <div class="content">
      <form action="/search.php" method="POST" class="recherches">
        <div class="inputsearch">
          <div class="searchdepart">
            <input placeholder="Lieu Départ" id='searchdepart' name="searchdepart" type="text">

          </div> <span>|</span>
          <div class="destination">
            <input placeholder="Destination" id='searcharrivee' name="searcharrivee" type="text">
          </div><span>|</span>
          <div class="date">
            <input placeholder="Aujourd'hui" name="date" type="datetime-local">
          </div>
        </div>
        <button class="search btn btn-primary" type="submit">Rechercher</button>
      </form>

      <div class="affiche_trajet">

        <ul>

          <?php if(!$trajets):?>

          <p style="margin-top: 5rem;">Aucun Trajet trouvé</p>
          <?php else:?>

          <?php foreach($trajets as $trajet):?>

          <?php if(!$trajet['date_retour']): ?>
          <a href="send-colis.php?id=<?= $trajet['id']?>">
            <li>

              <div class="trajet_card">
                <div class="nbrekilo-prix">
                  <div class="nbrekilo"><?=$trajet['kilo_disponible'] ?> kg</div>
                  <div class="prix"><?=$trajet['prix_kilo'] ?>€/Kg</div>
                </div>
                <div class="lieu-date">
                  <div class="lieu">
                    <i class="fa-solid fa-plane"></i>
                    <div class="lieu1 ">
                      <?php if(count(explode(",",$trajet['lieu_depart']))==3){
                      echo explode(",",$trajet['lieu_depart'])[1].", ".explode(",",$trajet['lieu_depart'])[2];  
                    }else {
                      echo explode(",",$trajet['lieu_depart'])[0].", ".explode(",",$trajet['lieu_depart'])[1];
                    }  ?>

                    </div>
                    <i class="fa-solid fa-arrow-right"></i>
                    <div class="lieu2 "> <?php if(count(explode(",",$trajet['lieu_arrivee']))==3){
                      echo explode(",",$trajet['lieu_arrivee'])[1].", ".explode(",",$trajet['lieu_arrivee'])[2];  
                    }else {
                      echo explode(",",$trajet['lieu_arrivee'])[0].", ".explode(",",$trajet['lieu_arrivee'])[1];
                    }  ?></div>
                  </div>
                  <div class="date_list">
                    <div class="date1"><?=$trajet['date_depart'] ?></div>
                  </div>
                  <div class="publication">
                    <i>publié le <?=date('d/m/Y à G:i:s', $trajet['date_publication']) ?></i>
                  </div>
                </div>

              </div>



              <!-- <div class="delete-edit">
            <a href=""> <i class="fa-regular fa-pen-to-square"></i></a>
            <a href=""><i class="fa-solid fa-trash-can"></i></a>
          </div> -->
            </li>
          </a>
          <?php else : ?>
          <a href="send-colis.php?id=<?= $trajet['id']?>">
            <li>

              <div class="trajet_card">
                <div class="nbrekilo-prix">
                  <div class="nbrekilo"><?=$trajet['kilo_disponible'] ?> kg</div>
                  <div class="prix"><?=$trajet['prix_kilo'] ?>€/Kg</div>
                </div>
                <div class="lieu-date">
                  <div class="lieu">
                    <i class="fa-solid fa-plane"></i>
                    <div class="lieu1 ">
                      <?php if(count(explode(",",$trajet['lieu_depart']))==3){
                      echo explode(",",$trajet['lieu_depart'])[1].", ".explode(",",$trajet['lieu_depart'])[2];  
                    }else {
                      echo explode(",",$trajet['lieu_depart'])[0].", ".explode(",",$trajet['lieu_depart'])[1];
                    }  ?>

                    </div>
                    <i class="fa-solid fa-arrow-right-arrow-left"></i>
                    <div class="lieu2 "> <?php if(count(explode(",",$trajet['lieu_arrivee']))==3){
                      echo explode(",",$trajet['lieu_arrivee'])[1].", ".explode(",",$trajet['lieu_arrivee'])[2];  
                    }else {
                      echo explode(",",$trajet['lieu_arrivee'])[0].", ".explode(",",$trajet['lieu_arrivee'])[1];
                    }  ?></div>
                  </div>
                  <div class="date_list">
                    <div class="date1"><?=$trajet['date_depart'];  ?>
                      <span>-</span>
                      <?=$trajet['date_retour'] ?>
                    </div>
                  </div>

                  <div class="publication-retour">
                    <i>publié le <?=date('d/m/Y à G:i:s', $trajet['date_publication']) ?></i>
                  </div>
                </div>


                <div class="nbrekilo-prix-retour">
                  <div class="nbrekilo"><?=$trajet['kilo_retour'] ?> kg</div>
                  <div class="prix"><?=$trajet['prix_kilo_retour'] ?>€/Kg</div>
                </div>
              </div>

              <!-- <div class="delete-edit">
            <a href=""> <i class="fa-regular fa-pen-to-square"></i></a>
            <a href=""><i class="fa-solid fa-trash-can"></i></a>
          </div> -->
            </li>
          </a>
          <?php endif;?>

          <?php endforeach; ?>
          <?php endif;?>
        </ul>
      </div>
    </div>


  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

  <script>
  config = {

    dateFormat: "d/m/Y ",


  }
  flatpickr("input[type=datetime-local]", config);
  </script>
</body>


</html>