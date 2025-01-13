<?php
session_start();
ob_start(); // Cette fonction active la mise en mémoire tampon de la sortie jusqu'a la deconnexion du client
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<link rel="stylesheet" type="text/css" href="style.css"/> 
<title>accueil Bibliodrive admin</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">

<div class="row">
  <!-- début haut gauche-->
  <div class="col-sm-9">
  <?php 
    include 'barre_recherche_admin.php'; 
    ?>
</div>
  <!-- fin haut gauche-->
  
  <!-- début haut droit-->
  <div class="col-sm-3">
  <?php 
    include 'image_admin.php'; 
    ?>
</div>
  </div>
  <!-- fin haut droit-->

<div class="row">
  
  <!-- début bas gauche-->
  <div class="col-sm-9">
  <ul>

<h3 class="couleur2 text-center"> Bienvenue à l'espace administrateur, ici vous pouvez:</h3>

<br>

<h3 class="couleur1 text-center">ajouter un livre</h3>

<h3 class="couleur1 text-center">créer un membre</h3>

<br>

<h3 class="couleur2 text-center">Pour revenir a l'accueil client deconnecter vous !</h3>
</ul>
  </div>
  <!-- fin bas gauche-->
  
   <!-- début bas droit-->
  <div class="col-sm-3">
  <?php 
    include 'authentification.php'; 
    ?>
</div>
 </div>
  </div>
<!-- fin bas droit-->


</body>
</html>
