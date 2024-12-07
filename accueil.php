<!DOCTYPE html>
<html lang="fr">
<head>
  <title>1</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<div class="container">

<div class="row">
  <!-- début haut gauche-->
  <div class="col-sm-9">
    Bonjour je m'appelle Mickaël Gall, bienvenue dans ma bibliodrive !
    <br> <!--espace de ligne-->
    Le site est en maintenance jusqu'au 6 janvier 2025, merci de votre visite.
    <h5>vous êtes à l'accueil</h5>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="http://127.0.0.1/projetPHP/BibliodrivePHP/accueil.php">   <img src="table-enchantement-minecraft.jpg" alt="bibliothèque " width="50" height="50"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link" href="http://127.0.0.1/projetPHP/BibliodrivePHP/panier.php">panier<img src="Livre.jpg" alt="bibliothèque " width="35" height="35"></a>
            </li>
          <form class="d-flex">
            <input class="form-control me-2" type="text" placeholder="chercher un livre">
            <button class="btn btn-primary" type="button">rechercher</button>
          </form>
        </div>
      </div>
    </nav>
  </div>

  <!-- fin haut gauche-->
  
  
  <!-- début haut droit-->
  <div class="col-sm-3">
    <img src="5d74466cb3d0d5ec36520414efa94fbd.jpg" alt="bibliothèque " width="342" height="200">
  
  </div>
  <!-- fin haut droit-->
</div>  

<div class="row">
  
  <!-- début bas gauche-->
  <div class="col-sm-9">
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="51NVomQxWSL._AC_UF1000,1000_QL80_.jpg" class="d-block w-90" alt="Marie Vareille">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="la-belle-famille-livre-laure-rivieres-flammarion-avis-roman.jpg" class="d-block w-90" alt="Laure de Rivières">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="9782253237648-001.jpg" class="d-block w-90" alt="Guillaume Musso">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
  </div> 
  <!-- fin bas gauche-->
  
  
  <!-- début bas droit-->
  <div class="col-sm-3">
  <?php 
    include 'Formulaire.php'; 
    ?>
</div>
   <!-- fin bas droit-->

  </body>
</html>