<?php

require __DIR__ . '/data.php';

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Marmitas Dona Rita</title>
  <link rel="stylesheet" href="./css/reset.css">
  <link rel="stylesheet" href="./css/style.css">
</head>

<body>
  <!-- HEADER -->
  <?php require __DIR__ . '/partials/header.php'; ?>

  <!-- BANNER -->
  <div class="banner">
    <div class="banner-overlay"></div>
    <div class="container">
      <div class="banner-content">
        <h1>Venha para a casa da Dona Rita,<br>e escolha a sua marmita!!!</h1>
        <h3>Impossível não voltar novamente</h3>
        <a href="#">Saiba mais</a>
      </div>
    </div>
  </div>

  <!-- MARMITAS -->
  <div class="lunchboxes">
    <div class="container">
      <div class="lunchboxes-header">
        <h1>Confira nossas marmitas</h1>
        <h3>Aqui você encontra nosso cardápio de marmitas</h3>
      </div>
      <div class="lunchboxes-list">
        <?php foreach ($lunchboxes as $lunchbox) : ?>
          <div class="lunchbox-item">
            <img src="<?= $lunchbox['image'] ?>" alt="<?= $lunchbox['name'] ?>">
            <h3><?= $lunchbox['name'] ?></h3>
            <h5>R$ <?= number_format($lunchbox['price'], 2, ',', '.') ?></h5>
            <a href="<?= "{$url}/marmita.php?ref={$lunchbox['ref']}" ?>">Ver mais</a>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

  <!-- FOOTER -->
  <?php require __DIR__ . '/partials/footer.php'; ?>
</body>

</html>