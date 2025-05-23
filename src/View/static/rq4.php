<?php
    $product_title       = "RQ‑4 Global Hawk – Беспилотный летательный аппарат";
    $product_description = "RQ‑4 Global Hawk – это высокотехнологичный беспилотный летательный аппарат, предназначенный для проведения разведывательных и наблюдательных миссий на больших дистанциях с высокой автономностью.";

    $product_specs = [
        "Размах крыла"   => "39 м",
        "Длина"          => "15 м",
        "Макс. скорость" => "830 км/ч",
        "Экипаж"         => "0 (беспилотный)",
    ];
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php echo $product_title; ?> – AEROSYSTEMS
    </title>
    <link rel="stylesheet" href="static/styles.css">
    <style>
        .product-details {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: var(--background-color);
            border: 1px solid var(--accent-color);
            border-radius: 8px;
        }

        .product-details h1 {
            text-align: center;
            color: var(--primary-color);
            margin-bottom: 20px;
        }

        .product-info {
            margin-bottom: 20px;
            font-size: 1.1rem;
            line-height: 1.8;
            text-align: justify;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid var(--primary-color);
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: var(--secondary-color);
            color: #fff;
        }

        .btn-download {
            display: inline-block;
            padding: 12px 30px;
            background-color: var(--secondary-color);
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-download:hover {
            background-color: var(--primary-color);
        }
    </style>
</head>

<body>
    <header class="site-header">
        <div class="container">
            <a href="index.php" class="logo">
                <img src="static/photos/logo-transparent-png.png" alt="Логотип AEROSYSTEMS">
            </a>
            <nav class="main-nav">
                <ul>
                    <li><a href="index.php">Главная</a></li>
                    <li><a href="about.php">О компании</a></li>
                    <li><a href="services.php">Услуги</a></li>
                    <li><a href="contact.php">Контакты</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="main-content">
        <div class="product-details">
            <h1>
                <?php echo $product_title; ?>
            </h1>
            <p class="product-info">
                <?php echo $product_description; ?>
            </p>
            <!-- Product specifications table -->
            <table>
                <thead>
                    <tr>
                        <th>Характеристика</th>
                        <th>Значение</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($product_specs as $spec => $value): ?>
                    <tr>
                        <td>
                            <?php echo $spec; ?>
                        </td>
                        <td>
                            <?php echo $value; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <button class="btn-download" onclick="generatePDF()">Скачать PDF‑брошюру</button>
        </div>
    </main>

    <?php // Removed hardcoded footer to avoid duplication ?>

    <!-- jsPDF and autoTable plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>
    <script>
        function generatePDF() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();

            doc.setFontSize(18);
            doc.text("<?php echo $product_title; ?>", 20, 20);
            doc.setFontSize(12);
            doc.text("<?php echo $product_description; ?>", 20, 30);

            doc.autoTable({
                head: [['Характеристика', 'Значение']],
                body: [
                    <?php foreach ($product_specs as $spec => $value): ?>
                    ['<?php echo $spec; ?>', '<?php echo $value; ?>'],
                    <?php endforeach; ?>
                ],
                startY: 40,
            });

        doc.save('<?php echo str_replace(" ", "_", $product_title); ?>_Brochure.pdf');
        }
    </script>
</body>

</html>