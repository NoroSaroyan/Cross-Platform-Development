<?php

declare (strict_types = 1);

use App\Controller\ProductController;
use App\Controller\StaticController;
use App\Core\Router;

require_once __DIR__ . '/../vendor/autoload.php';

session_start();

$router = new Router();

// Статические страницы
$router->add('GET', '/', [StaticController::class, 'home']);
$router->add('GET', '/about', [StaticController::class, 'about']);
$router->add('GET', '/services', [StaticController::class, 'services']);
$router->add('GET', '/contact', [StaticController::class, 'contact']);

// Продукты
$router->add('GET', '/products', [ProductController::class, 'list']);
$router->add('GET', '/product/{id:\d+}', [ProductController::class, 'view']);
$router->add('GET', '/product/add', [ProductController::class, 'add']);

// Запуск маршрутизатора
$uri    = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
$router->dispatch($uri, $method);
