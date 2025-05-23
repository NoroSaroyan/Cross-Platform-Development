<?php
    header('Content-Type: text/html; charset=UTF-8');

    // Загружаем продукты из JSON
    $productsFile = 'products.json';
    $products     = [];

    if (file_exists($productsFile)) {
        $data    = file_get_contents($productsFile);
        $decoded = json_decode($data, true);

        // Проверяем, является ли JSON массивом
        if (is_array($decoded)) {
            $products = $decoded;
        }
    }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Продукция – AEROSYSTEMS</title>
    <link rel="stylesheet" href="static/styles.css">
    <style>
        .products-container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 20px;
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* Четко 3 карточки в ряд */
            gap: 20px; /* Отступ между карточками */
        }

        .product-card {
            border: 1px solid #ccc;
            border-radius: 8px;
            background: #fff;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            text-align: center;
            text-decoration: none; /* Убираем подчеркивание */
            color: inherit; /* Наследуем цвет текста */
            height: 350px; /* Одинаковая высота карточек */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .product-card img {
            width: 100%;
            height: 200px; /* Фиксированная высота для изображений */
            object-fit: cover; /* Обрезка, чтобы изображения не искажались */
        }

        .product-card h2 {
            font-size: 1.5rem;
            margin: 15px 0;
            color: #002b5c;
            flex-grow: 1;
        }

        .product-card .btn {
            padding: 8px 16px;
            background-color: #0066cc;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-bottom: 10px;
        }

        /* --- Адаптивность --- */
        @media (max-width: 1024px) {
            .products-container {
                grid-template-columns: repeat(2, 1fr); /* По 2 карточки в ряд на планшетах */
            }
        }

        @media (max-width: 600px) {
            .products-container {
                grid-template-columns: 1fr; /* 1 карточка на всю ширину на мобилках */
            }
        }
    </style>
</head>
<body>
<?php // Removed redundant include for header.php ?>

<div class="products-container">
    <h1>Продукция</h1>
    <?php if (empty($products)): ?>
        <p>Продукты отсутствуют.</p>
    <?php else: ?>
<?php foreach ($products as $product): ?>
            <a href="product.php?id=<?php echo htmlspecialchars($product['id']); ?>" class="product-card">
                <img src="<?php echo htmlspecialchars($product['photo'] ?? 'static/no-image.png'); ?>"
                     alt="<?php echo htmlspecialchars($product['name']); ?>">
                <h2><?php echo htmlspecialchars($product['name']); ?></h2>
                <button class="btn">Подробнее</button>
            </a>
        <?php endforeach; ?>
<?php endif; ?>
</div>

<?php // Removed redundant include for footer.php ?>
</body>
</html>
