<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php
require_once('connexion.php'); 
$stmt = $connexion->prepare("SELECT nom, prenom, dateretour, detail, isbn13, anneeparution, photo, titre FROM livre INNER JOIN auteur ON (livre.noauteur = auteur.noauteur) LEFT OUTER JOIN emprunter ON (livre.nolivre = emprunter.nolivre) where livre.nolivre=:nolivre");
$nolivre = $_GET["nolivre"];
$stmt->bindValue(":nolivre", $nolivre); // préparer l'instruction
$stmt->setFetchMode(PDO::FETCH_OBJ); //manipule la donnée

$stmt->execute();
$enregistrement = $stmt->fetch();
?>
<div class="row">
<div class="col-sm-8">
<?php
echo "ISBN13 : ".$enregistrement->isbn13; 
echo "<br>";
echo "Auteur : ".$enregistrement->prenom." ", $enregistrement->nom;
echo "Titre : ".$enregistrement->titre." ", $enregistrement->anneeparution;
echo "<br>";
echo "<br>";
echo "Résumé du livre :";
echo "<br>";
echo "<br>";
echo "<br>";
echo $enregistrement->detail;

?>
</div>
<div class="col-sm-4">
<img src="./images/<?php echo $enregistrement->photo; ?>" class="d-block w-100" alt="Image de couverture"> <!-- la photo de la base de données selon l'auteur-->
</div>
<?php // si on est connecter on verifie la session prenom pour ajouter au panier 
if (isset($_SESSION["prenom"]))
{
  echo '<form method="POST">';
  echo '<input type="submit" name="btn-ajoutpanier" class="btn btn-success btn-lg" value="Ajouter au panier"></input>';
  echo '</form>';
}else{
  echo '<p class="text-primary">Pour pouvoir réserver ce livre vous devez posséder un compte et vous identifier !</p>';
}

if(!isset($_SESSION['panier'])){
// Initialisation du panier
$_SESSION['panier'] = array();
}

// On ajoute les entrées dans le tableau
if(isset($_POST['btn-ajoutpanier'])){
array_push($_SESSION['panier'], $enregistrement->titre);  
echo "Livre ajouté à votre panier :)";
}
?>
</div>
</body>
</html>


