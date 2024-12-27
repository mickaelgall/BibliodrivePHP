<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <title>accueil Bibliodrive</title>
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
require_once('connexion.php');
$stmt = $connexion->prepare("SELECT nom, prenom, dateretour, detail, isbn13, photo FROM livre INNER JOIN auteur ON (livre.noauteur = auteur.noauteur) LEFT OUTER JOIN emprunter ON (livre.nolivre = emprunter.nolivre) where livre.nolivre=:nolivre");
$nolivre = $_GET["nolivre"];
$stmt->bindValue(":nolivre", $nolivre); // pas de troisième paramètre STR par défaut
$stmt->setFetchMode(PDO::FETCH_OBJ);
// Les résultats retournés par la requête seront traités en 'mode' objet
$stmt->execute();
$enregistrement = $stmt->fetch();


echo "Auteur : ".$enregistrement->prenom." ", $enregistrement->nom;
echo "<br>";
echo "<br>";
echo "ISBN13 : ".$enregistrement->isbn13;
echo "<br>";
echo "Résumé du livre";
echo "<br>";
echo "<br>";
echo $enregistrement->detail;
echo "<br>";
if (isset($_SESSION["prenom"]))
{

  if (!isset($_POST['emprunter']))
    {
    echo '<form method="post">
    <div class="input-group-btn">
    <button class="btn btn-default" name="emprunter" type="submit"> Emprunter (ajout au panier)</button>
</div> </form>';

}else{
echo 'livre ajouter au panier';
}

}else{
  echo 'Pour pouvoir réserver vous devez posséder un compte et vous identifier.';
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
 <?php
   $_SESSION["utilisateur"] = $enregistrement->mel;
   ?>

</body>
 </html>