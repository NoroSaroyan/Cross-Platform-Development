<?php
    $productsFile = 'products.json';
    $products     = [];

    if (file_exists($productsFile)) {
        $products = json_decode(file_get_contents($productsFile), true);
    }

    $id      = $_GET['id'] ?? '';
    $product = null;

    foreach ($products as $p) {
        if ($p['id'] === $id) {
            $product = $p;
            break;
        }
    }

    if (! $product) {
        echo "<h2 style='text-align:center; color:red;'>Продукт не найден.</h2>";
        exit;
    }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($product['name']); ?> – AEROSYSTEMS</title>
    <link rel="stylesheet" href="static/styles.css">
    <style>
        body {
            background: #f4f7fc;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 20px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);
        }

        .back-button {
            display: inline-block;
            margin-bottom: 15px;
            padding: 10px 15px;
            background: #0066cc;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            transition: 0.3s;
        }

        .back-button:hover {
            background: #004080;
        }

        .product-header {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .product-header img {
            width: 350px;
            height: auto;
            border-radius: 8px;
            object-fit: cover;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .product-header h1 {
            color: #002b5c;
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .product-header p {
            font-size: 1.1rem;
            color: #333;
            line-height: 1.6;
        }

        .details-section {
            margin-top: 30px;
            padding: 20px;
            background: #eef5ff;
            border-radius: 8px;
        }

        .details-section h2 {
            color: #004080;
            margin-bottom: 10px;
            border-bottom: 2px solid #004080;
            padding-bottom: 5px;
        }

        .specs-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        .specs-table th, .specs-table td {
            padding: 10px;
            border: 1px solid #002b5c;
            text-align: left;
        }

        .specs-table th {
            background: #0066cc;
            color: #fff;
        }

        .additional-info {
            margin-top: 20px;
            font-size: 1.1rem;
            color: #444;
        }
    </style>
</head>
<body>

<div class="container">
    <a href="products.php" class="back-button">← Назад к списку</a>

    <div class="product-header">
        <img src="<?php echo htmlspecialchars($product['photo'] ?? 'static/no-image.png'); ?>"
             alt="<?php echo htmlspecialchars($product['name']); ?>">
        <div>
            <h1><?php echo htmlspecialchars($product['name']); ?></h1>
            <p><?php echo nl2br(htmlspecialchars($product['description'] ?? 'Описание отсутствует')); ?></p>
        </div>
    </div>

    <?php if (! empty($product['specifications'])): ?>
        <div class="details-section">
            <h2>Характеристики</h2>
            <table class="specs-table">
                <?php foreach ($product['specifications'] as $key => $value): ?>
                    <tr>
                        <th><?php echo htmlspecialchars($key); ?></th>
                        <td><?php echo htmlspecialchars($value); ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    <?php endif; ?>

    <?php if (! empty($product['additional'])): ?>
        <div class="details-section">
            <h2>Дополнительная информация</h2>
            <p class="additional-info"><?php echo nl2br(htmlspecialchars($product['additional'])); ?></p>
        </div>
    <?php endif; ?>
</div>

<?php include 'footer.php'; ?>
</body>
</html>
