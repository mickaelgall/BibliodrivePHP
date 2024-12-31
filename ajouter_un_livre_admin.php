<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Livre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Ajouter un Livre</h1>

        <?php
        require_once 'connexion.php'; // Inclure le fichier de connexion à la base de données

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupérer les données du formulaire
            $noauteur = $_POST['noauteur'];
            $titre = $_POST['titre'];
            $isbn13 = $_POST['isbn13'];
            $anneeparution = $_POST['anneeparution'];
            $detail = $_POST['detail'];
            $photo = $_POST['photo'];
            $dateajout = date('Y-m-d H:i:s'); // Date actuelle

            // Préparer la requête d'insertion
            $stmt = $connexion->prepare("INSERT INTO livre (noauteur, titre, isbn13, anneeparution, detail, photo, dateajout) VALUES (:noauteur, :titre, :isbn13, :anneeparution, :detail, :photo, :dateajout)");
            $stmt->bindValue(':noauteur', $noauteur);
            $stmt->bindValue(':titre', $titre);
            $stmt->bindValue(':isbn13', $isbn13);
            $stmt->bindValue(':anneeparution', $anneeparution);
            $stmt->bindValue(':detail', $detail);
            $stmt->bindValue(':photo', $photo);
            $stmt->bindValue(':dateajout', $dateajout);

            // Exécuter la requête et gérer les erreurs
            try {
                if ($stmt->execute()) {
                    echo "<div class='alert alert-success'>Livre ajouté avec succès !</div>";
                    header("Refresh:3");
                } else {
                    $erreurs = $stmt->errorInfo();
                    echo "<div class='alert alert-danger'>Erreur lors de l'ajout du livre : " . $erreurs[2] . "</div>";
                }
            } catch (PDOException $e) {
                echo "<div class='alert alert-danger'>Erreur : " . $e->getMessage() . "</div>";
            }
        }

        // Récupérer les auteurs pour remplir la liste déroulante
        $stmt_auteurs = $connexion->prepare("SELECT noauteur, nom FROM auteur");
        $stmt_auteurs->execute();
        $auteurs = $stmt_auteurs->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <form action="" method="post">
            <div class="mb-3">
                <select class="form-control" id="noauteur" name="noauteur" required>
                    <?php foreach ($auteurs as $auteur): ?>
                        <option value="<?php echo $auteur['noauteur']; ?>"><?php echo $auteur['nom']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="titre" name="titre" placeholder="Titre" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="isbn13" name="isbn13" placeholder="ISBN13" required>
            </div>
            <div class="mb-3">
                <input type="number" class="form-control" id="anneeparution" name="anneeparution" placeholder="Année de Parution" required>
            </div>
            <div class="mb-3">
                <textarea class="form-control" id="detail" name="detail" rows="4" placeholder="Détails" required></textarea>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="photo" name="photo" placeholder="Nom de Fichier Photo" required>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
</body>
</html>
