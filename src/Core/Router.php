<?php
namespace App\Core;

class Router
{
    private array $routes = [];

    public function add(string $method, string $path, callable $handler): void
    {
        $this->routes[] = compact('method', 'path', 'handler');
    }

    public function dispatch(string $uri, string $method): void
    {
        $path = parse_url($uri, PHP_URL_PATH) ?: '/';
        foreach ($this->routes as $route) {
            if ($route['method'] === $method &&
                preg_match("#^{$route['path']}$#", $path, $matches)
            ) {
                array_shift($matches);
                call_user_func_array($route['handler'], $matches);
            }
        }
        http_response_code(404);
        echo '404 Not Found';
    }
}
