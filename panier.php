<?php
   if(!isset($_SESSION['panier'])){
       // Initialisation du panier
       $_SESSION['panier'] = array();
    }
   ?>
   <h1 id='panier'class="couleur3">Votre panier <img src="./image_site/Livre_minecraft.jpg" width="50" height="50"></h1>  
   <?php 
        
        // Affichage du panier 

          $nb_livresempruntés = count($_SESSION['panier']); 
          $nb_emprunts = (5 - $nb_livresempruntés);
          echo '<h5 class="couleur1" id="reste">(Il vous reste ', $nb_emprunts ,' réservations possibles.)</h5>';
          for ($id =0 ;$id < $nb_livresempruntés; $id++){ // initialise et poursuit l'exécution pour compter le nombre de livre 
            echo '<form method="POST">'; //transmet les information
            echo '<p id="contenupanier">', $_SESSION['panier'][$id];
            echo '<input type="submit" id="contenupanier" name="annuler" class="btn btn-danger"  value="suprimer du panier">';
            echo '</form></p>';
          } 
          
          if (empty($_SESSION['panier'])){ //verifie si la session est considérée comme vide
            echo '<h5 class="couleur2" id="vide"><img src="./image_site/torche_éteint_minecraft.jpg" width="150" height="150">Votre panier est triste sans lumière <img src="./image_site/Emoji_triste.gif" width="40" height="40"> ajouter un livre !<img src="./image_site/torche_éteint_minecraft.jpg" width="150" height="150"></h5>';
        } else { //messsage quand le panier est remplie
            echo '<h5  class="couleur2" id="rempli"><img src="./image_site/Torche allumé.gif" width="100" height="110">Votre panier vous remercie <img src="./image_site/emoji_contant.gif" width="40" height="40"> <img src="./image_site/Torche allumé.gif" width="100" height="110"></h5>';
            echo '<form method="POST">';
            foreach($_SESSION['panier'] as $nolivre) {
                echo '<input type="hidden" name="nolivre[]" value="'. $nolivre .'">';
            }
            echo '<input type="submit" name="valider" class="btn btn-success btn-lg" value="Valider le panier">';
            echo '</form>';
        }
// bouton annuler
            if(isset($_POST['annuler'])){
                unset($_SESSION['panier'][array_search($_SESSION['panier'][$id], $_SESSION['panier'])]);
                sort($_SESSION['panier']);
                header("refresh: 0");
              }
// bouton valider
        if(isset($_POST['valider'])){
          require_once('connexion.php');
          $mel = $_SESSION['mel'];
          $dateemprunt = date("Y-m-d");
      
          foreach($_SESSION['panier'] as $nolivre) { // parcour tous les livres dans le tableau le panier
      

              echo "Tentative d'ajout du livre: $nolivre<br>";
      
              // Requête pour ajouter les informations du livre dans la base de données SQL
              try {
                  $stmt = $connexion->prepare("INSERT INTO emprunter(mel, nolivre, dateemprunt) VALUES (:mel, :nolivre, :dateemprunt)");
                  $stmt->bindValue(':mel', $mel, PDO::PARAM_STR); //Associe une valeur à un nom correspondant a la requête SQL qui a été utilisé pour la requête
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
          header("refresh 0"); 
          exit;
      }
       
    ?>
