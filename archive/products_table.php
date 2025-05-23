<?php
    // Загружаем продукты из JSON
    $productsFile = 'products.json';
    $products     = [];

    if (file_exists($productsFile)) {
        $data    = file_get_contents($productsFile);
        $decoded = json_decode($data, true);
        if (is_array($decoded)) {
            $products = $decoded;
        }
    }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Список продуктов</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #0066cc;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Список продуктов</h1>
    <?php if (empty($products)): ?>
        <p>Нет доступных продуктов.</p>
    <?php else: ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Название</th>
            </tr>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?php echo htmlspecialchars($product['id']); ?></td>
                    <td><?php echo htmlspecialchars($product['name']); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>

</body>
</html>
