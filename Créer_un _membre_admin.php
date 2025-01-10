<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Membre outil admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <h1 class="couleur1">créer un membre : <img src=".\image_site\pioche_minecraft_diament.jpg" width="55" height="55"></h1>

        <?php
        require_once 'connexion.php'; // Inclure le fichier de connexion à la base de données

        if ($_SERVER["REQUEST_METHOD"] == "POST") { // Récupére les données du formulaire
            $mel = $_POST['mel'];
            $motdepasse = $_POST['motdepasse'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $adresse = $_POST['adresse'];
            $ville = $_POST['ville'];
            $codepostal = $_POST['codepostal'];
            $profil = $_POST['profil'];

            if ($mel && $motdepasse && $nom && $prenom && $adresse && $ville && $codepostal && $profil) {
                // Préparer la requête d'insertion
                $stmt = $connexion->prepare("INSERT INTO utilisateur (mel, motdepasse, nom, prenom, adresse, ville, codepostal, profil) VALUES (:mel, :motdepasse, :nom, :prenom, :adresse, :ville, :codepostal, :profil)");
                $stmt->bindValue(':mel', $mel);
                $stmt->bindValue(':motdepasse', $motdepasse);
                $stmt->bindValue(':nom', $nom);
                $stmt->bindValue(':prenom', $prenom);
                $stmt->bindValue(':adresse', $adresse);
                $stmt->bindValue(':ville', $ville);
                $stmt->bindValue(':codepostal', $codepostal);
                $stmt->bindValue(':profil', $profil);

                // Exécuter la requête et gérer les erreurs
                try {
                    if ($stmt->execute()) {
                        echo "<div class='alert alert-success' id='successMessage'>Membre créé avec succès !</div>";
                        header("Refresh:3");
                    } else {
                        $erreurs = $stmt->errorInfo();
                        echo "<div class='alert alert-danger'>Erreur lors de la création du membre : " . $erreurs[2] . "</div>";
                    }
                } catch (PDOException $e) {
                    echo "<div class='alert alert-danger'>Erreur : " . $e->getMessage() . "</div>";// renvoie une description de l'erreur ou du comportement qui a provoqué l'erreur
                }
            } else {
                echo "<div class='alert alert-danger'>Tous les champs sont obligatoires.</div>";
            }
        }
        ?>

        <form action="" method="post">
            <div class="mb-3">                                              
                <input type="email" class="form-control" id="mel" name="mel" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" id="motdepasse" name="motdepasse" placeholder="Mot de passe" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Adresse" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="ville" name="ville" placeholder="Ville" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="codepostal" name="codepostal" placeholder="Code Postal" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="profil" name="profil" placeholder="Profil" required>
            </div>
            <button type="submit" class="btn btn-warning">Créer le membre</button>
        </form
    </div>
</body>
</html>
