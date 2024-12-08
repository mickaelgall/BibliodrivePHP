
      <fieldset>
  
          <legend>ce connecter</legend>
  
          Prénom :<input type="text" id="txtprenom" name="txtprenom"><br><br>
          nom: <input type="text" id="txtnom" name="txtnom"><br><br>
          J'accepte les conditions
            <input type="checkbox" id="accepte" name="accepte">
  
      </fieldset>
  
      <input type="submit" name="ok" value="validé">
  
  </form>
  
    <?php
    require_once 'connexion.php';
    $stmt = $connexion->prepare("INSERT INTO tableau (nom, prenom) VALUES (:nom, :prenom)");
    if (isset($_GET["ok"])){
        $prenom=$_GET["txtprenom"];
        $nom=$_GET["txtnom"];
        
        echo "Bonjour ".$prenom." ".$nom.".<br>";
        if (isset($_GET["accepte"])) 
            echo "vous avez accepté les conditions";
            else
            echo "vous avez décliné";
    }
    ?>