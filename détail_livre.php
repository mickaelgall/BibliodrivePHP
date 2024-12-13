<?php
require_once('connexion.php');
$stmt = $connexion->prepare("SELECT * FROM livre");
$stmt->setFetchMode(PDO::FETCH_OBJ);
// Les résultats retournés par la requête seront traités en 'mode' objet
$stmt->execute();
// Parcours des enregistrements retournés par la requête : premier, deuxième…
while($enregistrement = $stmt->fetch())
{
// Affichage des champs nom et prenom de la table 'utilisateur'
  echo '<h1>', $enregistrement->titre, '</h1>';
}
?>