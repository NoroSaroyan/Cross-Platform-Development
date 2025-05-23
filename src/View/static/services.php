<?php
    // services.php
    $services = [
        [
            'title'       => 'Дизайн и разработка',
            'description' => 'Инновационный подход к проектированию аэрокосмических систем с использованием передовых технологий.',
            'images'      => ['blp_main.jpeg', 'blp_1.jpg', 'blp_2.jpg'],
        ],
        [
            'title'       => 'Производство',
            'description' => 'Высокоточные технологии и строгий контроль качества на всех этапах производства.',
            'images'      => ['fact_main.webp', 'fact_1.jpg', 'fact_2.jpg'],
        ],
        [
            'title'       => 'Обслуживание и поддержка',
            'description' => 'Комплексное послепродажное обслуживание для обеспечения надежной работы вашей техники.',
            'images'      => ['maint_1.png', 'maint_2.png', 'maint_3.jpeg'],
        ],
    ];
?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Услуги – AEROSYSTEMS</title>
  <link rel="stylesheet" href="static/styles.css">
  <style>
    /* Additional styles for service card photo carousel */
    .card-photos {
      display: flex;
      overflow-x: auto;
      gap: 10px;
      margin-top: 10px;
      padding-bottom: 10px;
    }

    .card-photos img {
      height: 150px;
      width: auto;
      border-radius: 4px;
      flex-shrink: 0;
    }

    /* Service Card Layout */
    .service-card {
      background-color: var(--background-color);
      border: 1px solid var(--accent-color);
      border-radius: 8px;
      padding: 20px;
      margin-bottom: 20px;
    }

    .service-card h2 {
      color: var(--primary-color);
      margin-bottom: 10px;
    }

    .service-card p {
      color: var(--text-color);
      font-size: 1.1rem;
      line-height: 1.6;
    }

    .services-list {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: space-between;
    }

    /* Responsive design for smaller screens */
    @media (max-width: 768px) {
      .services-list {
        flex-direction: column;
      }
    }
  </style>
</head>

<body>
  <main class="main-content">
    <section class="services-intro">
      <h1>Наши услуги</h1>
      <p>Мы предлагаем комплексные решения в области аэрокосмических технологий – от разработки и производства до
        обслуживания и поддержки.</p>
    </section>
    <section class="services-list">
      <?php foreach ($services as $service): ?>
      <div class="service-card">
        <h2>
          <?php echo htmlspecialchars($service['title']) ?>
        </h2>
        <p>
          <?php echo htmlspecialchars($service['description']) ?>
        </p>
        <div class="card-photos">
          <?php foreach ($service['images'] as $image): ?>
          <img src="static/photos/<?php echo htmlspecialchars($image) ?>" alt="<?php echo htmlspecialchars($service['title']) ?>">
          <?php endforeach; ?>
        </div>
      </div>
      <?php endforeach; ?>
    </section>
  </main>
</body>

</html>