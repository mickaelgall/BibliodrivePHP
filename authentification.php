<?php

if (!isset($_SESSION["mel"])) { //verification si la variable est définie
    if (!isset($_POST['btnconnexion'])) { 
        ?> <!--affiche la connexion -->
        <form method="post"class="couleur1"> 
            <h5>votre mail:</h5><input name="mel" class="form-control" type="text">
            <h5>votre Mot de passe:</h5><input name="motdepasse" class="form-control" type="text">
            <div class="text-center">
                <input type="submit" class="btn btn-success" name="btnconnexion" value="Connexion">
                <br>
                <br>
            </div>
        </form>
        <?php
    } else {
        require_once 'connexion.php';
        $mel = $_POST['mel']; 
        $motdepasse = $_POST['motdepasse'];

        $stmt = $connexion->prepare("SELECT * FROM utilisateur WHERE mel=:mel AND motdepasse=:motdepasse");
        $stmt->bindValue(":mel", $mel); 
        $stmt->bindValue(":motdepasse", $motdepasse); 
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $enregistrement = $stmt->fetch(); 

        if ($enregistrement) { 
            $_SESSION["mel"] = $mel;
            $_SESSION["prenom"] = $enregistrement->prenom;
            $_SESSION["nom"] = $enregistrement->nom;
            $_SESSION["adresse"] = $enregistrement->adresse;
            $_SESSION["codepostal"] = $enregistrement->codepostal;
            $_SESSION["ville"] = $enregistrement->ville;
            $_SESSION["profil"] = $enregistrement->profil;


            if ($_SESSION["profil"] === "admin") {
                header("Location: accueil_admin.php"); 
            } else {
                header("Location: accueil.php"); 
            }
            exit();
        } else { 
            echo "Echec de la connexion.";
            header("Refresh:2");
            exit();
        }
    }
} else {
    ?>
    <h3 class="text-center couleur1"><?php echo $_SESSION["prenom"] . ' ' . $_SESSION["nom"]; ?></h3>
    <h3 class="text-center couleur1"><?php echo $_SESSION["mel"]; ?></h3>
    <br>
    <h3 class="text-center couleur2"><?php echo $_SESSION["adresse"]; ?></h3>
    <h3 class="text-center couleur2"><?php echo $_SESSION["codepostal"] . ', ' . $_SESSION["ville"]; ?></h3>
    
    <?php if ($_SESSION["profil"] === "client"): ?>
        <br><h4 class="text-center couleur3">Bienvenue client </h4>
    <?php endif; ?>
    
    <?php if ($_SESSION["profil"] === "admin"): ?>
        <br><h4 class="text-center couleur3">Bienvenue administrateur </h4>
    <?php endif; ?>
    
    <?php if (!isset($_POST['deco'])) { ?>
    <form method="post">
        <div class="input-group-btn text-center">
            <button class="btn btn-danger" name="deco" type="submit">Déconnexion</button>
        </div>
    </form>
    <?php } else {
        session_unset();         
        session_destroy();
        header("Location: accueil.php"); // en client et admin re dirige a l'accueil client apres la deconnexion
        exit();
    }
}

ob_end_flush(); // mes fin a la fonction active la mise en mémoire tampon de la sortie jusqu'a la deconnexion du client
?>
