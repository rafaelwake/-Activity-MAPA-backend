<?php

require __DIR__ . '/data.php';

$error = false;

if (!isset($_GET['ref'])) {
  $error = true;
} else {
  $ref = intval($_GET['ref']);
  $lunchbox = array_filter($lunchboxes, fn ($lunchbox) => $lunchbox['ref'] === $ref);

  if (count($lunchbox) === 0) {
    $error = true;
  } else {
    $lunchbox = array_pop($lunchbox);
  }
}


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

  <?php if ($error) : ?>
    <div class="container">
      <div class="error">
        <h1>Oops! Algo deu errado.</h1>
        <p>Não foi possível encontrar a marmita.</p>
        <a href="<?= $url ?>">Voltar à página inicial</a>
      </div>
    </div>
  <?php else : ?>
    <div class="container">
      <div class="lunchbox">
        <div class="lunchbox-image">
          <img src="<?= $lunchbox['image'] ?>" alt="<?= $lunchbox['name'] ?>">
        </div>
        <div class="lunchbox-infos">
          <div class="lunchbox-infos-header">
            <h1><?= $lunchbox['name'] ?></h1>
            <h3>R$ <?= number_format($lunchbox['price'], 2, ',', '.') ?></h3>
          </div>
          <div class="line"></div>
          <h4>Ingredientes</h4>
          <ul class="lunchbox-ingredients">
            <?php foreach ($lunchbox['ingredients'] as $ingredient) : ?>
              <li><?= $ingredient ?></li>
            <?php endforeach; ?>
          </ul>
          <a href="#">Comprar agora</a>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <!-- FOOTER -->
  <?php require __DIR__ . '/partials/footer.php'; ?>
</body>

</html>