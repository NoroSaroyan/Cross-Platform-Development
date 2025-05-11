<?php

$productsFile = 'products.json';

if (! file_exists($productsFile)) {
    file_put_contents($productsFile, json_encode([]));
}

$products = json_decode(file_get_contents($productsFile), true);

$id = uniqid();

$name            = $_POST['name'];
$description     = $_POST['description'];
$specs           = $_POST['specs'];
$additional_info = $_POST['additional_info'];

$uploadDir = 'static/photos/products/';
if (! is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}
$photoName  = basename($_FILES['photo']['name']);
$targetFile = $uploadDir . $photoName;
move_uploaded_file($_FILES['photo']['tmp_name'], $targetFile);

$newProduct = [
    'id'              => $id,
    'name'            => $name,
    'description'     => $description,
    'specs'           => $specs,
    'additional_info' => $additional_info,
];

if ($photoPath) {
    $newProduct['photo'] = $photoPath;
}

$products[] = $newProduct;

file_put_contents($productsFile, json_encode($products, JSON_PRETTY_PRINT));

header("Location: products.php");
exit;
