<?php
require_once('connexion.php');
$stmt = $connexion->prepare("SELECT * FROM livre ORDER BY dateajout DESC LIMIT 46");
$stmt->setFetchMode(PDO::FETCH_OBJ);
$stmt->execute();
$livres = $stmt->fetchAll();
?>

<div class="container">
  <h3 class="text-center couleur1">Dernières acquisitions de ma bibliodrive :</h3>
</div>

<div id="demo" class="carousel slide carousel-fade carousel carousel-dark slide" data-bs-ride="carousel">
  <div class="carousel-indicators ">
    <?php for ($i = 0; $i < count($livres); $i++): ?><!--Récupére les données du formulaire-->
      <button type="button" data-bs-target="#demo" data-bs-slide-to="<?= $i ?>" class="<?= $i == 0 ? 'active' : '' ?>"></button>
    <?php endfor; ?>
  </div>

  <div class="carousel-inner">
    <?php foreach ($livres as $id => $livre): ?>
      <div class="carousel-item <?= $id == 0 ? 'active' : '' ?>">
        <div class="d-flex justify-content-center">
          <img src="./images/<?= $livre->photo ?>" alt="<?= $livre->titre ?>" class="d-block" style="width:50%">
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <button class="carousel-control-prev custom-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next custom-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>
