<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>
<?php
require_once('connexion.php');
echo "Variable x : ".$x;

$panier[5] = "René Barjavel - Le voyageur imprudent (1944)"; // ajout avec clé : 5, valeur : "René Barjavel - Le voyageur imprudent (1944)"

echo $panier[5]; // lecture-affichage

$numero = 5;

$panier[$numero] = "René Barjavel - Le voyageur imprudent (1944)"; // ajout

echo $panier[$numero]; // lecture - affichage

echo "Entrée 'x' dans le tableau de Session : ".$_SESSION["userNom"];

<?php 
include 'detail.php'; 
?>

?>
</body>
</html>