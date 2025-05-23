<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title><?php echo $title ?? 'AEROSYSTEMS' ?></title>
  <link href="/static/bootstrap.min.css" rel="stylesheet">
  <link href="/static/styles.css" rel="stylesheet">
</head>
<body>
  <?php include __DIR__ . '/static/partials/header.php'; ?>
  <main class="container py-4">
    <?php echo $content ?>
  </main>
  <?php include __DIR__ . '/static/partials/footer.php'; ?>
  <script src="/static/bootstrap.bundle.min.js"></script>
</body>
</html>
