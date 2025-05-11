<?php

use App\Model\Product;

class ProductService
{
    private string $dataFile;

    public function __construct()
    {
        // Данные лежат в public/static/products.json
        $this->dataFile = __DIR__ . '/../../public/static/products.json';
    }

    /**
     * Возвращает все продукты
     * @return Product[]
     */
    public function getAll(): array
    {
        $json = file_exists($this->dataFile)
            ? file_get_contents($this->dataFile)
            : '[]';
        $data = json_decode($json, true);
        return array_map(fn($item) => Product::fromArray($item), $data ?? []);
    }

    /**
     * Возвращает один продукт по ID
     */
    public function getById(string $id): ?Product
    {
        foreach ($this->getAll() as $product) {
            if ($product->id === $id) {
                return $product;
            }
        }
        return null;
    }

    /**
     * Сохраняет новый продукт
     * @param array $payload — $_POST
     * @param array $file — $_FILES
     */
    public function save(array $payload, array $file): void
    {
        $products = $this->getAll();
        $id = uniqid();
        $photoPath = '';

        // Обработка фото
        if (!empty($file['photo']['tmp_name'])) {
            $uploadDir = __DIR__ . '/../../public/static/photos/products/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            $photoName = basename($file['photo']['name']);
            move_uploaded_file($file['photo']['tmp_name'], $uploadDir . $photoName);
            $photoPath = '/static/photos/products/' . $photoName;
        }

        $new = [
            'id'             => $id,
            'name'           => $payload['name'],
            'description'    => $payload['description'],
            'specifications' => array_map('trim', explode(',', $payload['specs'])),
            'additional'     => $payload['additional_info'],
            'photo'          => $photoPath,
        ];

        $arrayData = array_map(fn(Product $p) => $p->toArray(), $products);
        $arrayData[] = $new;
        file_put_contents(
            $this->dataFile,
            json_encode($arrayData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
        );
    }
}
