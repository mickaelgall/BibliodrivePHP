<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BiblioDrive | Panier</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <link rel="stylesheet">
  </head>
<body>
   <?php 

   if(!isset($_SESSION['panier'])){
       // Initialisation du panier
       $_SESSION['panier'] = array();
    }
   ?>
   <h1 id='panier'>Votre panier</h1>  
   <?php 
        
        // Affichage du panier 

          $nb_livresempruntés = count($_SESSION['panier']); 
          $nb_emprunts = (5 - $nb_livresempruntés);
          echo '<h5 id="reste">(Il vous reste ', $nb_emprunts ,' réservations possibles.)</h5>';
          for ($id =0 ;$id < $nb_livresempruntés; $id++){
            echo '<form method="POST">';
            echo '<p id="contenupanier">', $_SESSION['panier'][$id];
            echo '<input type="submit" id="contenupanier" name="annuler" class="btn btn-primary btn-sm" value="Annuler la réservation">';
            echo '</form></p>';
          } 
          
          if (empty($_SESSION['panier'])){
            echo '<h5 id="vide">C`est vide ici.. Vous pouvez réserver un livre si vous le souhaitez !</h5>';
          }elseif(in_array($id, $_SESSION['panier']))
          echo '<form method="POST">';
          echo '<input type="submit" name="valider" class="btn btn-primary btn-lg" value="Valider le panier">';
          echo '</form>';
        

         /* Requête permettant de supprimer un contenu du panier en cliquant 
            sur le bouton 'annuler' */

        if(isset($_POST['annuler'])){
          unset($_SESSION['panier'][array_search($id, $_SESSION['panier'])]);
          sort($_SESSION['panier']);
          header("refresh: 0");
        }


           /* Requête permettant d'ajouter dans la base de données le contenu du panier en cliquant 
            sur le bouton 'valider le panier' */

            if(isset($_POST['valider'])){
                require_once('connexion.php');
                $mel=$_SESSION['mel'];
                $nolivre=$_POST['nolivre'];  
                $dateemprunt = date("Y-m-d");
                              
                if ($nolivre) { // Requête pour ajouter les informations du livre dans la base de donnée SQL
                  
                  $stmt = $connexion->prepare("INSERT INTO emprunter(mel, nolivre, dateemprunt)
                    VALUES (:mel, :nolivre, :dateemprunt)");
                  $stmt->bindValue(':mel', $mel, PDO::PARAM_STR);
                  $stmt->bindValue(':dateemprunt', $dateemprunt, PDO::PARAM_STR);
                  $stmt->bindValue(':nolivre', $nolivre, PDO::PARAM_STR);
                  $stmt->execute(); 
                }

      } 
     ?>
</body>
</html>