<?php
require_once 'connexion.php';
$stmt = $connexion->prepare("SELECT * FROM livre where nolivre=:5");
?>