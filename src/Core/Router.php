<?php
namespace App\Core;

class Router
{
    private array $routes = [];

    public function add(string $method, string $path, array | callable $handler): void
    {
        $this->routes[] = compact('method', 'path', 'handler');
    }

    public function dispatch(string $uri, string $method): void
    {
        $path = parse_url($uri, PHP_URL_PATH) ?: '/';

        foreach ($this->routes as $route) {
            // Match the method and path
            if ($route['method'] === $method &&
                preg_match("#^{$route['path']}$#", $path, $matches)
            ) {
                array_shift($matches); // Shift off the URI parameters

                // Call the handler (controller method)
                if (is_array($route['handler'])) {
                    $controller = $route['handler'][0];
                    $method     = $route['handler'][1];
                    call_user_func_array([new $controller(), $method], $matches);
                } else {
                    call_user_func_array($route['handler'], $matches);
                }
                return; // Successfully handled, no need to proceed further
            }
        }

        // If no match, send 404
        http_response_code(404);
        echo '404 Not Found';
    }

}
