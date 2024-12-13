<!DOCTYPE html>
<html>
<body>
<?php

if (!isset($_POST['btnSeConnecter'])) { /* L'entrée btnSeConnecter est vide = le formulaire n'a pas été submit=posté, on affiche le formulaire */

    echo '

    <form action="" method = "post" ">

        Mail: <input name="mel" type="text" size ="30"">

        Mot de passe: <input name="motdepasse" type="text" size ="30"">

        <input type="submit" name="btnSeConnecter"  value="Se connecter">

    </form>';

} else

/* L'utilisateur a cliqué sur Se connecter, l'entrée btnSeConnecter <> vide, on traite le formulaire */

{

// On se connecte

    require_once 'connexion.php';

    $mel = $_POST['mel'];

    $mot_de_passe = $_POST['motdepasse'];

 

    $stmt = $connexion->prepare("SELECT * FROM utilisateur where mel=:mel AND motdepasse=:motdepasse");

 

    $stmt->bindValue(":mel", $mel); // pas de troisième paramètre STR par défaut

    $stmt->bindValue(":motdepasse", $mot_de_passe); // idem

    $stmt->setFetchMode(PDO::FETCH_OBJ);

// Les résultats retournés par la requête seront traités en 'mode' objet

    $stmt->execute();

    $enregistrement = $stmt->fetch(); // boucle while inutile

    if ($enregistrement) { // si $enregistrement n'est pas vide = on a trouvé quelque chose -> on est connecté

        echo '<h1>Connexion réussie, bienvenue !</h1>';
        $_SESSION["utilisateur"] = $enregistrement->mel;
        echo 'test';
    } else { // La requête n'a pas retournée de résultat, on a pas trouvé de ligne correspondant au mel et mot de passe
        echo "Echec à la connexion.";
    }
}
?>

</body>
</html>