<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BiblioDrive | Panier</title>
    <link rel="stylesheet">
</head>
<body>
   <?php
   if(!isset($_SESSION['panier'])){
       // Initialisation du panier
       $_SESSION['panier'] = array();
    }
   ?>
   <h1 id='panier'>Votre panier <img src="./image_site/Livre_minecraft.jpg" width="50" height="50"></h1>  
   <?php 
        
        // Affichage du panier 

          $nb_livresempruntés = count($_SESSION['panier']); 
          $nb_emprunts = (5 - $nb_livresempruntés);
          echo '<h5 id="reste">(Il vous reste ', $nb_emprunts ,' réservations possibles.)</h5>';
          for ($id =0 ;$id < $nb_livresempruntés; $id++){
            echo '<form method="POST">';
            echo '<p id="contenupanier">', $_SESSION['panier'][$id];
            echo '<input type="submit" id="contenupanier" name="annuler" class="btn btn-danger btn-sm" value="Annuler la réservation">';
            echo '</form></p>';
          } 
          
          if (empty($_SESSION['panier'])){
            echo '<h5 id="vide"><img src="./image_site/torche_éteint_minecraft.jpg" width="150" height="150">Votre panier est triste sans lumière ): ajouter un livre !<img src="./image_site/torche_éteint_minecraft.jpg" width="150" height="150"></h5>';
        } else {
            echo '<h5 id="rempli"><img src="./image_site/Torche allumé.gif" width="100" height="110">Votre panier vous remercie ;) <img src="./image_site/Torche allumé.gif" width="100" height="110"></h5>';
            echo '<form method="POST">';
            foreach($_SESSION['panier'] as $nolivre) {
                echo '<input type="hidden" name="nolivre[]" value="'. $nolivre .'">';
            }
            echo '<input type="submit" name="valider" class="btn btn-success btn-lg" value="Valider le panier">';
            echo '</form>';
        }
        if(isset($_POST['valider'])){
          require_once('connexion.php');
          $mel = $_SESSION['mel'];
          $dateemprunt = date("Y-m-d");
      
          // Boucle sur tous les livres dans le panier
          foreach($_SESSION['panier'] as $nolivre) {
              // Enlever les espaces blancs
              $nolivre = trim($nolivre);
      
              // Afficher la valeur de $nolivre pour débogage
              echo "Tentative d'ajout du livre avec nolivre: $nolivre<br>";
      
              // Requête pour ajouter les informations du livre dans la base de données SQL
              try {
                  $stmt = $connexion->prepare("INSERT INTO emprunter(mel, nolivre, dateemprunt) VALUES (:mel, :nolivre, :dateemprunt)");
                  $stmt->bindValue(':mel', $mel, PDO::PARAM_STR);
                  $stmt->bindValue(':dateemprunt', $dateemprunt, PDO::PARAM_STR);
                  $stmt->bindValue(':nolivre', $nolivre, PDO::PARAM_STR);
                  $stmt->execute();
                  echo "Le livre $nolivre a été ajouté avec succès.<br>";
              } catch (PDOException $e) {
                  echo "Erreur lors de l'ajout du livre $nolivre: " . $e->getMessage() . "<br>";
              }
          }
      
          // Vider le panier après la validation
          $_SESSION['panier'] = array();
          header("refresh 0"); // Rediriger pour éviter la resoumission du formulaire
          exit;
      }
      
          
              
              
              
              
              
          
    ?>
</body>
</html>
