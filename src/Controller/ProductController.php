// src/Controller/ProductController.php
<?php

use App\Core\View;
use App\Service\ProductService;

class ProductController
{
    private ProductService $service;

    public function __construct()
    {
        $this->service = new ProductService();
    }

    /**
     * Отдает форму добавления продукта
     */
    public function addForm(): void
    {
        View::render('product/add');
    }

    /**
     * Обработка POST-запроса на сохранение
     */
    public function save(): void
    {
        $this->service->save($_POST, $_FILES);
        header('Location: /products');
        exit;
    }

    /**
     * Список продуктов (карточки)
     */
    public function list(): void
    {
        $products = $this->service->getAll();
        View::render('product/list', ['products' => $products]);
    }

    /**
     * Детали одного продукта
     * @param string $id
     */
    public function detail(string $id): void
    {
        $product = $this->service->getById($id);
        if (!$product) {
            http_response_code(404);
            echo 'Product not found';
            return;
        }
        View::render('product/detail', ['product' => $product]);
    }

    /**
     * Табличный вывод продуктов
     */
    public function table(): void
    {
        $products = $this->service->getAll();
        View::render('product/table', ['products' => $products]);
    }
}
