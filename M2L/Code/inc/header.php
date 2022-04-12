<?php
session_start();
// 25417181.1142124
?>
<!DOCTYPE html>
<html>
<head>
<title>M2L site officiel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="icon" type="image/jpg" href="img/download.jpg" />
  <link rel="stylesheet" type="text/css" href="connection.css">
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/c99d3549fc.js"></script>
</head>
<header>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php"><img src="img/download.jpg" width="60" height="60" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <!-- <li class="nav-item active">
        <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link" href="presentation.php">Présentation</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Ligues
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          
          <a class="dropdown-item" href="https://lgef.fff.fr/"><img src="img/ballon.jpg " width="20%">Football</a>
          
          <a class="dropdown-item" href="https://www.ligue-grandest-fft.fr/"><img src="img/tennis.jpg" width="20%">Tennis</a>
         
          <a class="dropdown-item" href="https://www.ffnatation.fr/"> <img src="img/natation.jpg" width="20%">Natation</a>
          
          <a class="dropdown-item" href="http://grandestbasketball.org/"><img src="img/basket.jpg" width="20%">Basketball</a>
          
          <a class="dropdown-item" href="http://www.fnfda-formation.fr/newsite/index.html"><img src="img/fitness.jpg" width="20%">Fitness</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="annonces.php">Les annonces</a>
      </li>
      
      
    <?php 
    if (!isset($_SESSION['stat'])) {
      ?>
      <li class="nav-item">
        <a class="nav-link " href="formation.php">Formation</a>
      </li>
      <?php
     } ?>
      
      <?php
      if (isset($_SESSION['client'])) {
        ?>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Mon compte
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

          <a class="dropdown-item" href="moncompte.php">Mes informations</a>
          
          <a class="dropdown-item" href="ajouertannonce.php">Ajouter une annonce</a>
          
          <a class="dropdown-item" href="myannonce.php">Mes annonces</a>

          <a class="dropdown-item" href="myresa.php">Mes réservations</a>
         </div>
      </li>

      <li class="nav-item">
        <a class="nav-link " href="reservation.php">Réserver une salle</a>
      </li>


        <?php
      }
      if (isset($_SESSION['stat'])) {
        ?>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Salles
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          
          <a class="dropdown-item" href="./ajout_salle.php">Ajouter une salle</a>
          
          <a class="dropdown-item" href="./reservation2.php">Planning des salles</a>
          </div>
      </li>
         
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Formations
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          
          <a class="dropdown-item" href="./addff.php">Ajouter une formation</a>
          
          <a class="dropdown-item" href="./usform.php">Mes formations</a>
          </div>
      </li>
          
                  <li class="nav-item">
                    <a class="nav-link" href="./lmes.php">Les messages</a>
                  </li>
        <?php
      }
      ?>
      <li class="nav-item">
        <a class="nav-link " href="contact.php">Contact</a>
      </li>
    </ul>
    <br>
   <?php if (isset($_SESSION['stat'])) { ?>
  <a class="uk-margin-small-right btn" href="./deconnexion.php">Deconnexion</a>
                <?php }
                elseif (isset($_SESSION['client'])) {
                  ?>
  <a class="uk-margin-small-right btn" href="./deconnexion.php">Deconnexion</a>
                    <?php              }
    else
      { ?>
        <a class='uk-margin-small-right btn' uk-icon='icon: sign-in; ratio: 1.5' href='connect.php'> Se Connecter </a>
     <?php } ?>
  </div>
</nav>
</header>
<body>