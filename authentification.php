<?php
if (!isset ($_SESSION["mel"]))
{


if (!isset($_POST['btnconnexion'])) { 
    echo '<form method="post" >
        votre mail: <input name="mel" class="form-control" type="text" size ="30">
        votre Mot de passe: <input name="motdepasse" class="form-control type="text" size ="30">
        <div class="text-center">
        <input type="submit" class="btn btn-default" name="btnconnexion"  value="Connexion">
        <br>
        <br>
        </div>
    </form>';
} else
{
    require_once 'connexion.php';
    $mel = $_POST['mel'];
    $motdepasse = $_POST['motdepasse'];
 
    $stmt = $connexion->prepare("SELECT * FROM utilisateur where mel=:mel AND motdepasse=:motdepasse");
 
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
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    } else { 
        echo "Echec à la connexion.";
        header("Refresh:1");
    }
}
} else {

    echo '<h3 class="text-center"> '.$_SESSION["prenom"]. ' ' .$_SESSION["nom"].' </h3>';
    echo '<h3 class="text-center"> '.$_SESSION["mel"]. '</h3>';
    echo '<br>';
    echo '<h3 class="text-center">' .$_SESSION["adresse"]. '</h3>';
    echo '<h3 class="text-center">' .$_SESSION["codepostal"]. ',' .$_SESSION["ville"]. '</h3>';

    if (!isset($_POST['deco']))
    {




    echo '<form action="accueil.php" method="post">
    <div class="input-group-btn">
    <button class="btn btn-default" name="deco" type="submit">Déconnexion</button>
</div> </form>';

}else
{
    session_unset();         
    session_destroy();
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}
    
}

?>
