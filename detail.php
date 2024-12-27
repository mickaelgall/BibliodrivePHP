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