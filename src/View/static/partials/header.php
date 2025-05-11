<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title><?= $title ?? 'AEROSYSTEMS' ?></title>
  <link href="public/static/bootstrap.min.css" rel="stylesheet">
  <link href="public/static/styles.css" rel="stylesheet">
</head>
<body>
  <?php include __DIR__ . '/partials/header.php'; ?>
  <main class="container py-4">
    <?= $content ?>
  </main>
  <?php include __DIR__ . '/partials/footer.php'; ?>
  <script src="/static/bootstrap.bundle.min.js"></script>
</body>
</html>
