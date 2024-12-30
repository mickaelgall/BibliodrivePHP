<?php
  require_once('connexion.php');
  $stmt = $connexion -> prepare("SELECT * FROM livre order by dateajout desc limit 46");
  $stmt->setFetchMode(PDO::FETCH_OBJ);
  $stmt->execute();
  $livres = $stmt->fetchAll();
?>


<div class="container">
  <h3 class="text-center">Dernières acquisitions de ma bibliodrive :</h3>
</div>

<div id="demo" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
  <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
<button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
<button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
<button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
<button type="button" data-bs-target="#demo" data-bs-slide-to="4"></button>
<button type="button" data-bs-target="#demo" data-bs-slide-to="5"></button>
<button type="button" data-bs-target="#demo" data-bs-slide-to="6"></button>
<button type="button" data-bs-target="#demo" data-bs-slide-to="7"></button>
<button type="button" data-bs-target="#demo" data-bs-slide-to="8"></button>
<button type="button" data-bs-target="#demo" data-bs-slide-to="9"></button>
<button type="button" data-bs-target="#demo" data-bs-slide-to="10"></button>
<button type="button" data-bs-target="#demo" data-bs-slide-to="11"></button>
<button type="button" data-bs-target="#demo" data-bs-slide-to="12"></button>
<button type="button" data-bs-target="#demo" data-bs-slide-to="13"></button>
<button type="button" data-bs-target="#demo" data-bs-slide-to="14"></button>
<button type="button" data-bs-target="#demo" data-bs-slide-to="15"></button>
<button type="button" data-bs-target="#demo" data-bs-slide-to="16"></button>
<button type="button" data-bs-target="#demo" data-bs-slide-to="17"></button>
<button type="button" data-bs-target="#demo" data-bs-slide-to="18"></button>
<button type="button" data-bs-target="#demo" data-bs-slide-to="19"></button>
<button type="button" data-bs-target="#demo" data-bs-slide-to="20"></button>
<button type="button" data-bs-target="#demo" data-bs-slide-to="21"></button>
<button type="button" data-bs-target="#demo" data-bs-slide-to="22"></button>
<button type="button" data-bs-target="#demo" data-bs-slide-to="23"></button>
<button type="button" data-bs-target="#demo" data-bs-slide-to="24"></button>
<button type="button" data-bs-target="#demo" data-bs-slide-to="25"></button>
<button type="button" data-bs-target="#demo" data-bs-slide-to="26"></button>
<button type="button" data-bs-target="#demo" data-bs-slide-to="27"></button>
<button type="button" data-bs-target="#demo" data-bs-slide-to="28"></button>
<button type="button" data-bs-target="#demo" data-bs-slide-to="29"></button>
<button type="button" data-bs-target="#demo" data-bs-slide-to="30"></button>
<button type="button" data-bs-target="#demo" data-bs-slide-to="31"></button>
<button type="button" data-bs-target="#demo" data-bs-slide-to="32"></button>
<button type="button" data-bs-target="#demo" data-bs-slide-to="33"></button>
<button type="button" data-bs-target="#demo" data-bs-slide-to="34"></button>
<button type="button" data-bs-target="#demo" data-bs-slide-to="35"></button>
<button type="button" data-bs-target="#demo" data-bs-slide-to="36"></button>
<button type="button" data-bs-target="#demo" data-bs-slide-to="37"></button>
<button type="button" data-bs-target="#demo" data-bs-slide-to="38"></button>
<button type="button" data-bs-target="#demo" data-bs-slide-to="39"></button>
<button type="button" data-bs-target="#demo" data-bs-slide-to="40"></button>
<button type="button" data-bs-target="#demo" data-bs-slide-to="41"></button>
<button type="button" data-bs-target="#demo" data-bs-slide-to="42"></button>
<button type="button" data-bs-target="#demo" data-bs-slide-to="43"></button>
<button type="button" data-bs-target="#demo" data-bs-slide-to="44"></button>
<button type="button" data-bs-target="#demo" data-bs-slide-to="45"></button>
<button type="button" data-bs-target="#demo" data-bs-slide-to="46"></button>

  </div>

  <div class='carousel-inner'>
    <?php foreach($livres as $id => $livre) : ?>
      <div class='carousel-item <?=$id == 0 ? "active" : ""?>'>
        <div class='d-flex justify-content-center'>
          <img src=".\images\<?=$livre->photo?>" alt="<?=$livre->titre?>" class="d-block" style="width:70%">
        </div>
      </div>
    <?php endforeach ?>
  </div>

  <button class="carousel-control-prev custom-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
</button>
<button class="carousel-control-next custom-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
</button>

</div>