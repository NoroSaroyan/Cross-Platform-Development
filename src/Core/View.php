<?php
namespace App\Core;

class View
{
    /**
     * @param string $template 'product/list' → src/View/product/list.php
     * @param array  $data     Передаём в шаблон переменные
     */
    public static function render(string $template, array $data = []): void
    {
        extract($data, EXTR_SKIP);
        // Буферим контент страницы
        ob_start();
        require __DIR__ . "/../View/{$template}.php";
        $content = ob_get_clean();

        // Layout
        require __DIR__ . '/../View/layout.php';
    }
}
