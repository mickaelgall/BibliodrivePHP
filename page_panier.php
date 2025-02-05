<?php
session_start();
ob_start(); // Cette fonction active la mise en mémoire tampon de la sortie jusqu'a la deconnexion du client
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<link rel="stylesheet" type="text/css" href="style.css"/>
<title>page panier outil client</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<div class="container">

<div class="row">
  <!-- début haut gauche-->
  <div class="col-sm-9">
  <?php 
    include 'barre_recherche.php'; 
    ?>
</div>
  <!-- fin haut gauche-->
  
  <!-- début haut droit-->
  <div class="col-sm-3">
  <?php 
    include 'image.php'; 
    ?>
</div>
  </div>
  <!-- fin haut droit-->

<div class="row">
  
  <!-- début bas gauche-->
  <div class="col-sm-9">
  <?php 
    include 'panier.php';
    ?>
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









