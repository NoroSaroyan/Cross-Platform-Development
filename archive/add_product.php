<?php
    // add_product.php
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавить новый продукт – AEROSYSTEMS</title>
    <link rel="stylesheet" href="static/styles.css">
    <style>
        .form-container {
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
            background: #fff;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
        .form-container h1 {
            text-align: center;
            color: #002b5c;
            margin-bottom: 20px;
        }
        .form-container label {
            display: block;
            margin-top: 10px;
        }
        .form-container input[type="text"],
        .form-container textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-container input[type="file"] {
            margin-top: 5px;
        }
        .form-container input[type="submit"] {
            margin-top: 20px;
            padding: 10px 20px;
            background: #0066cc;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-container input[type="submit"]:hover {
            background: #004080;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Добавить новый продукт</h1>
        <form action="save_product.php" method="post" enctype="multipart/form-data">
            <label for="name">Название продукта:</label>
            <input type="text" name="name" id="name" required>

            <label for="description">Описание:</label>
            <textarea name="description" id="description" rows="5" required></textarea>

            <label for="specs">Характеристики (укажите через запятую):</label>
            <textarea name="specs" id="specs" rows="3" required></textarea>

            <label for="additional_info">Дополнительная информация:</label>
            <textarea name="additional_info" id="additional_info" rows="4" required></textarea>

            <label for="photo">Фотография:</label>
            <input type="file" name="photo" id="photo" accept="image/*">

            <input type="submit" value="Добавить продукт">
        </form>
    </div>
</body>
</html>
