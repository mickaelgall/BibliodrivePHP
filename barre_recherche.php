

Bonjour je m'appelle Mickaël Gall, bienvenue dans ma bibliodrive !
    <br> <!--espace de ligne-->
    Le site est en maintenance jusqu'a une durée inderterminée, merci de votre visite.
    <nav class="navbar navbar-expand-sm navbar-dark bg-danger form-control me-2">
      <div class="container-fluid">
        <a class="navbar-brand" href="http://127.0.0.1/PHP/BibliodrivePHP/accueil.php">accueil<img src=".\image_site\Enchanting_Table.gif" alt="bibliothèque " width="55" height="55"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link" href="http://127.0.0.1/PHP/BibliodrivePHP/page_panier.php">panier<img src=".\image_site\Livre_minecraft.jpg" alt="bibliothèque " width="35" height="35"></a>
            </li>
          <form class="d-flex" action="page_liste_livres.php" method="post">
            <input class="form-control me-2" type="text" placeholder="chercher un auteur" name="rchAuteur" >
            <button class="btn btn-light"  type="submit">rechercher </button>
          </form>
        </div>
      </div>
    </nav>