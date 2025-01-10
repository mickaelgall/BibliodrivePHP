<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Livre outil admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <h1 class="couleur1">ajouter un livre :<img src=".\image_site\pioche_minecraft_or.jpg" width="55" height="55"></h1>

        <?php
        require_once 'connexion.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST") { // Récupére les données du formulaire du tableau associatif
            $noauteur = $_POST['noauteur'];
            $titre = $_POST['titre'];
            $isbn13 = $_POST['isbn13'];
            $anneeparution = $_POST['anneeparution'];
            $detail = $_POST['detail'];
            $photo = $_POST['photo'];
            $dateajout = date('Y-m-d H:i:s');

            $stmt = $connexion->prepare("INSERT INTO livre (noauteur, titre, isbn13, anneeparution, detail, photo, dateajout) 
            VALUES (:noauteur, :titre, :isbn13, :anneeparution, :detail, :photo, :dateajout)");
// Préparer la requête d'insertion
            $stmt->bindParam(':noauteur', $noauteur);
            $stmt->bindParam(':titre', $titre);
            $stmt->bindParam(':isbn13', $isbn13);
            $stmt->bindParam(':anneeparution', $anneeparution);
            $stmt->bindParam(':detail', $detail);
            $stmt->bindParam(':photo', $photo);
            $stmt->bindParam(':dateajout', $dateajout);

            if ($stmt->execute()) {
                echo "<div class='alert alert-success'>Livre ajouté avec succès !</div>";
                header("Refresh:3");
            } else {
                echo "<div class='alert alert-danger'>Erreur lors de l'ajout du livre.</div>";
            }
        }

        $stmt_auteurs = $connexion->prepare("SELECT noauteur, nom FROM auteur");
        $stmt_auteurs->execute();
        $auteurs = $stmt_auteurs->fetchAll(PDO::FETCH_ASSOC); // verifie si il en manque
        ?>
<!-- prend les livre un par un-->
        <form action="" method="post">
            <div class="mb-3">
                <select class="form-control" id="noauteur" name="noauteur" required>
                    <?php foreach ($auteurs as $auteur): ?>
                        <option value="<?= $auteur['noauteur']; ?>"><?= $auteur['nom']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div> <!-- affiche le formulaire-->
            <div class="mb-3">
                <input type="text" class="form-control" id="titre" name="titre" placeholder="Titre" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="isbn13" name="isbn13" placeholder="ISBN13" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="anneeparution" name="anneeparution" placeholder="Année de Parution" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control form-control-lg" id="detail" name="detail" placeholder="Détails" required style="height: 100px;">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="photo" name="photo" placeholder="Nom de Fichier Photo" required>
            </div>
            <button type="submit" class="btn btn-warning">Ajouter le livre</button>
        </form>
    </div>
</body>
</html>
