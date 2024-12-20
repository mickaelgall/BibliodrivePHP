<?php

// Connexion au serveur

try {

$dns = 'mysql:host=localhost;dbname=bibliodrivemickaV1'; // dbname : nom de la base
$utilisateur = 'root'; // root sur vos postes
$motDePasse = ''; // pas de mot de passe sur vos postes
$connexion = new PDO( $dns, $utilisateur, $motDePasse );

} catch (Exception $e) {

  echo "Connexion à MySQL impossible : ", $e->getMessage();

  die();

}

?>