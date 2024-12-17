<!DOCTYPE html>
<html>
<body>
<?php
    require_once 'connexion.php';

if (!isset($_SESSION['userPrenom'])) {
    if (!isset($_POST['btnSeConnecter'])) { /* L'entrée btnSeConnecter est vide = le formulaire n'a pas été submit=posté, on affiche le formulaire */

    echo '

    <form action="" method = "post" ">

        Mail: <input name="mel" type="text" size ="30"">

        Mot de passe: <input name="motdepasse" type="text" size ="30"">

        <input type="submit" name="btnSeConnecter"  value="Se connecter">

    </form>';

    } else {
        $mel = $_POST['mel'];

        $mot_de_passe = $_POST['motdepasse'];
    
     
    
        $stmt = $connexion->prepare("SELECT * FROM utilisateur where mel=:mel AND motdepasse=:motdepasse");
    
     
    
        $stmt->bindValue(":mel", $mel); // pas de troisième paramètre STR par défaut
    
        $stmt->bindValue(":motdepasse", $mot_de_passe); // idem
    
        $stmt->setFetchMode(PDO::FETCH_OBJ);
    
    // Les résultats retournés par la requête seront traités en 'mode' objet
    
        $stmt->execute();
        $enregistrement = $stmt->fetch();
                    $_SESSION['userMel'] = $enregistrement->mel; 
            $_SESSION['userNom'] = $enregistrement->nom; 
            $_SESSION['userPrenom'] = $enregistrement->prenom; 
            $_SESSION['userAdresse'] = $enregistrement->adresse; 
            $_SESSION['userVille'] = $enregistrement->ville; 
            $_SESSION['userCodePostal'] = $enregistrement->codepostal; 
            $_SESSION['userProfil'] = $enregistrement->profil;
        }



/* L'utilisateur a cliqué sur Se connecter, l'entrée btnSeConnecter <> vide, on traite le formulaire */

    } else {

// On se connecte
        echo "je suis connecté";
}
?>

</body>
</html>