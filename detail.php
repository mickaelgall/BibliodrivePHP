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
$stmt = $connexion->prepare("SELECT nom, prenom, dateretour, detail, isbn13, anneeparution, photo FROM livre INNER JOIN auteur ON (livre.noauteur = auteur.noauteur) LEFT OUTER JOIN emprunter ON (livre.nolivre = emprunter.nolivre) where livre.nolivre=:nolivre");
$nolivre = $_GET["nolivre"];
$stmt->bindValue(":nolivre", $nolivre); // pas de troisième paramètre STR par défaut
$stmt->setFetchMode(PDO::FETCH_OBJ);
// Les résultats retournés par la requête seront traités en 'mode' objet
$stmt->execute();
$enregistrement = $stmt->fetch();
?>
<div class="row">
<div class="col-sm-8">
<?php
echo "ISBN13 : ".$enregistrement->isbn13; 
echo "<br>";
echo "Auteur : ".$enregistrement->prenom." ", $enregistrement->nom;
echo "<br>";
echo "Résumé du livre :";
echo "<br>";
echo "<br>";
echo $enregistrement->detail;
echo "<br>";
if (isset($_SESSION["prenom"]))
{

  if (!isset($_POST['emprunter']))
    {
    echo "<br>";
    echo '<form method="post">
    <div class="input-group-btn">
    <button class="btn btn-success" name="emprunter" type="button"> Emprunter (ajout au panier)</button>
</div> </form>';

}else{
echo 'livre ajouter au panier';
}

}else{
  echo '<p class="text-primary">Pour pouvoir réserver vous devez posséder un compte et vous identifier !</p>';

}
?>
</div>
<div class="col-sm-4">
<img src=".\images\<?php echo $enregistrement->photo?>" class="d-block w-100">
</div>
</div>
</body>
</html>