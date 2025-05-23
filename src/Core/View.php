<?php
namespace App\Core;

class View
{
    /**
     * Render a template within the layout
     *
     * @param string $template Example: 'static/contact' → src/View/static/contact.php
     * @param array  $data     Variables available inside the view
     */
    public static function render(string $template, array $data = []): void
    {
        extract($data, EXTR_SKIP);

        // Start output buffering to capture view content
        ob_start();
        require __DIR__ . '/../View/' . ltrim($template, '/') . '.php';
        $content = ob_get_clean();

        // Now include the layout, which uses $content
        require __DIR__ . '/../View/layout.php';
    }

}
