<?php
    $title = 'Контакты – AEROSYSTEMS';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?php echo htmlspecialchars($title); ?></title>

  <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Пользовательские стили -->
  <link href="/static/styles.css" rel="stylesheet" />

  <style>
    body {
      background: #f8f9fa;
    }
    .contact-container {
      max-width: 600px;
      background: #fff;
      margin: 40px auto;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgb(0 0 0 / 0.1);
    }
    h1 {
      color: #0d6efd;
      text-align: center;
      margin-bottom: 30px;
    }
  </style>
</head>
<body>

  <!-- Хедер -->
  <!--       <?php include __DIR__ . '/partials/header.php'; ?> -->

  <main class="contact-container">
    <h1>Свяжитесь с нами</h1>
    <form action="/contact/submit" method="post" class="needs-validation" novalidate>
      <div class="mb-3">
        <label for="fullname" class="form-label fw-semibold">ФИО</label>
        <input
          type="text"
          id="fullname"
          name="fullname"
          class="form-control form-control-lg"
          placeholder="Иванов Иван Иванович"
          required
        />
        <div class="invalid-feedback">Пожалуйста, введите ваше полное имя.</div>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label fw-semibold">Электронная почта</label>
        <input
          type="email"
          id="email"
          name="email"
          class="form-control form-control-lg"
          placeholder="example@mail.com"
          required
        />
        <div class="invalid-feedback">Пожалуйста, введите корректный адрес электронной почты.</div>
      </div>

      <div class="mb-3">
        <label for="phone" class="form-label fw-semibold">Номер телефона</label>
        <input
          type="tel"
          id="phone"
          name="phone"
          class="form-control form-control-lg"
          placeholder="+7 123 456 7890"
          pattern="^\+?\d{7,15}$"
          required
        />
        <div class="invalid-feedback">Пожалуйста, введите корректный номер телефона.</div>
      </div>

      <div class="mb-4">
        <label for="message" class="form-label fw-semibold">Сообщение</label>
        <textarea
          id="message"
          name="message"
          class="form-control form-control-lg"
          rows="5"
          placeholder="Ваше сообщение..."
          required
        ></textarea>
        <div class="invalid-feedback">Пожалуйста, введите сообщение.</div>
      </div>

      <button type="submit" class="btn btn-primary btn-lg w-100">Отправить</button>
    </form>
  </main>

  <!-- Футер -->
  <footer class="text-center py-3 bg-light mt-5">
    &copy; 2025 AEROSYSTEMS. Все права защищены.
  </footer>

  <!-- Bootstrap JS Bundle (включает Popper) -->
  <script src="/static/bootstrap.bundle.min.js"></script>

  <script>
    (() => {
      'use strict';
      const forms = document.querySelectorAll('.needs-validation');
      Array.from(forms).forEach(form => {
        form.addEventListener(
          'submit',
          event => {
            if (!form.checkValidity()) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          },
          false
        );
      });
    })();
  </script>
</body>
</html>
