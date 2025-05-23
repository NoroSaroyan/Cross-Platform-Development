<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title><?php echo $title ?? 'AEROSYSTEMS' ?></title>
  <link href="public/static/bootstrap.min.css" rel="stylesheet">
  <link href="public/static/styles.css" rel="stylesheet">
</head>
<body>
  <?php // Removed self-referential include to prevent infinite loop ?>
  <header class="site-header">
    <div class="container">
      <a href="/" class="logo">
        <img src="/static/photos/logo-transparent-png.png" alt="Логотип AEROSYSTEMS">
      </a>
      <nav class="main-nav">
        <ul>
          <li><a href="/" class="active">Главная</a></li>
          <li><a href="/about">О компании</a></li>
          <li><a href="/services">Услуги</a></li>
          <li><a href="/contact">Контакты</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <script src="/static/bootstrap.bundle.min.js"></script>
</body>
</html>
