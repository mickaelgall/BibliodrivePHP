
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