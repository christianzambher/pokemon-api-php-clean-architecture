<?php

namespace App;

class Router
{
    private array $routes = [];

    public function add(string $method, string $path, callable $handler)
    {
        $this->routes[] = compact('method', 'path', 'handler');
    }

    public function dispatch(string $method, string $uri)
    {
        foreach ($this->routes as $route) {
            if ($route['method'] === $method && $route['path'] === $uri) {
                return call_user_func($route['handler']);
            }
        }

        http_response_code(404);
        echo json_encode(['error' => 'Route not found']);
    }
}