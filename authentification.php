<?php
if (!isset($_SESSION["mel"])) {
    if (!isset($_POST['btnconnexion'])) { 
        ?>
        <form method="post">
            votre mail: <input name="mel" class="form-control" type="text" size="30">
            votre Mot de passe: <input name="motdepasse" class="form-control" type="text" size="30">
            <div class="text-center">
                <input type="submit" class="btn btn-default" name="btnconnexion" value="Connexion">
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
            $_SESSION["role"] = $enregistrement->role;
            header("Refresh:0");
            exit();
        } else { 
            echo "Echec à la connexion.";
            header("Refresh:1");
            exit();
        }
    }
} else {
    ?>
    <h3 class="text-center"><?php echo $_SESSION["prenom"] . ' ' . $_SESSION["nom"]; ?></h3>
    <h3 class="text-center"><?php echo $_SESSION["mel"]; ?></h3>
    <br>
    <h3 class="text-center"><?php echo $_SESSION["adresse"]; ?></h3>
    <h3 class="text-center"><?php echo $_SESSION["codepostal"] . ', ' . $_SESSION["ville"]; ?></h3>
    
    <?php if ($_SESSION["role"] === "admin"): ?>
        <p class="text-center">Bienvenue, administrateur</p>
    <?php endif; ?>
    
    <?php if (!isset($_POST['deco'])) { ?>
    <form method="post">
        <div class="input-group-btn">
            <button class="btn btn-default" name="deco" type="submit">Déconnexion</button>
        </div>
    </form>
    <?php } else {
        session_unset();         
        session_destroy();
        header("Refresh:0");
        exit();
    }
}

ob_end_flush(); // Envoie la sortie tamponnée au navigateur et arrête la temporisation de sortie
?>
