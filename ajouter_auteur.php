<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ajouter un auteur outil admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <h1 class="couleur1">ajouter un auteur : <img src=".\image_site\pioche_en_fer.jpg" width="55" height="55"></h1>

        <?php
        require_once 'connexion.php'; // Inclure le fichier de connexion à la base de données

        if ($_SERVER["REQUEST_METHOD"] == "POST") { // Récupére les données du formulaire
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
  

            if ($prenom& $nom && $prenom) {
                // Préparer la requête d'insertion
                $stmt = $connexion->prepare("INSERT INTO auteur (nom, prenom) VALUES (:nom, :prenom)");
                $stmt->bindValue(':nom', $nom);
                $stmt->bindValue(':prenom', $prenom);


                // Exécuter la requête et gérer les erreurs
                try {
                    if ($stmt->execute()) {
                        echo "<div class='alert alert-success' id='successMessage'>auteur ajouter avec succès !</div>";
                        header("Refresh:3");
                    } else {
                        $erreurs = $stmt->errorInfo(); 
                        echo "<div class='alert alert-danger'>Erreur lors de l'ajout de l'auteur : " . $erreurs[2] . "</div>";
                    }
                } catch (PDOException $e) { // traite les erreurs
                    echo "<div class='alert alert-danger'>Erreur : " . $e->getMessage() . "</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Tous les champs sont obligatoires.</div>";
            }
        }                                                        
        ?>
        <form action="" method="post">
            <div class="mb-3">
                <input type="text" class="form-control" id="nom" name="nom" placeholder="nom" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="prenom" name="prenom" placeholder="prenom" required>
            </div>
            <button type="submit" class="btn btn-warning">Ajouter l'auteur</button>
        </form>
    </div>
</body>
</html>


