<?php
$currentUser=$currentUser??false;
?>
<header class="container-header">
  <a href="/">
    <div class="global-logo">
      <div class="logo">

        <img width="120px" height="120px" class="icon" src="public/images/LOGO2.PNG" alt="">

      </div>
      <div class=" titreapp">
        <div style="font-size: 35; color:#32ff7e; ">
          COMMUNAUTE SAINT EMERENT
        </div>
        <div>D'AKOK NDOE</div>
      </div>

    </div>


  </a>

  <ul class="header-menu ">
    <?php if($currentUser): ?>



    <li>
      <a href="/auth-logout.php">
        <div class="drop-element">
          <div class="list">
            <i class="fa-solid fa-right-from-bracket"></i>

          </div>


        </div>
      </a>

    </li>

    <a href="profile.php">
      <li>
        <div class="select-dropdown">
          <div class="header-profile">
            <?=strtoupper($currentUser['prenom'][0]).strtoupper($currentUser['nom'][0])  ?>

          </div>

        </div>



      </li>
    </a>




    <?php else: ?>


    <li class="<?=$_SERVER['REQUEST_URI']==='/auth-login.php'?'active': '' ?>">
      <a href="/auth-login.php">Login</a>
    </li>
    <?php endif; ?>
  </ul>
</header>