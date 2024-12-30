<?php

// Vérification du rôle de l'utilisateur
if (!isset($_SESSION["mel"]) || $_SESSION["role"] !== "admin") {
    // Redirection si l'utilisateur n'est pas connecté ou n'est pas un admin
    header("Location: accès_refusé.php"); // Rediriger vers une page d'accès refusé ou la page d'accueil
    exit();
}

// Si l'admin est connecté, afficher le formulaire pour ajouter un livre
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'connexion.php';

    // Récupération des données du formulaire
    $titre = $_POST['titre'];
    $auteur = $_POST['auteur'];
    $anneeparution = $_POST['anneeparution'];
    $isbn13 = $_POST['isbn13'];
    $photo = $_FILES['photo']['name'];
    $detail = $_POST['detail'];
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);

    // Déplacement de l'image téléchargée vers le dossier des images
    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
        // Préparation de la requête SQL pour insérer les données du livre
        $stmt = $connexion->prepare("INSERT INTO livre (titre, auteur, anneeparution, isbn13, photo, detail) VALUES (:titre, :auteur, :anneeparution, :isbn13, :photo, :detail)");
        $stmt->bindValue(':titre', $titre);
        $stmt->bindValue(':auteur', $auteur);
        $stmt->bindValue(':anneeparution', $anneeparution);
        $stmt->bindValue(':isbn13', $isbn13);
        $stmt->bindValue(':photo', $photo);
        $stmt->bindValue(':detail', $detail);
        $stmt->execute();

        echo "Livre ajouté avec succès.";
    } else {
        echo "Erreur lors du téléchargement de l'image.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Livre</title>
</head>
<body>
    <h1>Ajouter un Livre</h1>
    <form method="post" enctype="multipart/form-data">
        Titre: <input type="text" name="titre" required><br>
        Auteur: <input type="text" name="auteur" required><br>
        Année de parution: <input type="text" name="anneeparution" required><br>
        ISBN-13: <input type="text" name="isbn13" required><br>
        Photo: <input type="file" name="photo" required><br>
        Détail: <textarea name="detail" required></textarea><br>
        <input type="submit" value="Ajouter le Livre">
    </form>
</body>
</html>

<?php
ob_end_flush(); // Envoie la sortie tamponnée au navigateur
?>
