<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <title>liste livre</title>
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
  
<!-- fin haut gauche-->

  <!-- début haut droit-->
  <div class="col-sm-3">
  <?php 
    include 'image.php'; 
    ?>
  </div>
  <!-- fin haut droit-->
  
<div class="row">
  <!-- début bas gauche-->
  <div class="col-sm-9">
  <?php
require_once('connexion.php');
$stmt = $connexion->prepare("SELECT nolivre, titre, anneeparution FROM livre INNER JOIN auteur ON (livre.noauteur = auteur.noauteur) where auteur.nom=:nom ORDER BY anneeparution");
$nom = $_POST["rchAuteur"];
$stmt->bindValue(":nom", $nom); // pas de troisième paramètre STR par défaut
$stmt->setFetchMode(PDO::FETCH_OBJ);
// Les résultats retournés par la requête seront traités en 'mode' objet
$stmt->execute();
while($enregistrement = $stmt->fetch())
{
echo '<h1>',"<a href='detail.php?nolivre=".$enregistrement->nolivre."'>".$enregistrement->titre, ' ', ' ', '(', $enregistrement->anneeparution, ')', "</a>",'</h1>';
}
?>
  <!-- fin bas gauche-->
  
  <!-- début bas droit-->
  <div class="col-sm-3">
  <?php 
    include 'authentification.php'; 
    ?>
</div>
   <!-- fin bas droit-->
  </body>
</html>
