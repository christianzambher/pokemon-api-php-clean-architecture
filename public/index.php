<?php

require_once __DIR__ . '/../src/Config/bootstrap.php';

use App\Router;
use App\Controllers\PokemonController;

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$basePath = '/pokemon-api-php-clean-architecture/public';

$route = str_replace($basePath, '', $uri);

if ($uri === '/' || $uri === '/pokemon-api-php-clean-architecture/public/') {
    require __DIR__ . '/views/index.php';

    exit;
}

header('Content-Type: application/json');

try {
    $router = new Router();

    // Ruta de prueba
    $router->add('GET', '/', function () {
        echo json_encode([
            'success' => true,
            'message' => 'API running'
        ]);
    });

    $router->add('POST', '/pokemon', function () {
        $controller = new PokemonController();
        $payload = json_decode(
            file_get_contents('php://input'),
            true
        );

        $result = $controller->save($payload);

        echo json_encode([
            'success' => true,
            'data' => $result
        ]);
    });

    $router->add('GET', '/pokemon', function () {
        if (!isset($_GET['name'])) {

            http_response_code(400);

            echo json_encode([
                'success' => false,
                'message' => 'Pokemon name is required'
            ]);

            return;
        }

        $controller = new PokemonController();

        $pokemon = $controller->get($_GET['name']);

        echo json_encode([
            'success' => true,
            'data' => $pokemon
        ]);
    });

    $router->add('DELETE', '/pokemon', function () {
        parse_str(file_get_contents("php://input"), $data);

        $controller = new PokemonController();

        $result = $controller->delete($data);

        echo json_encode([
            'success' => true,
            'data' => $result
        ]);
    });
    
    $method = $_SERVER['REQUEST_METHOD'];

    // Ejecutar router
    $router->dispatch($method, $route);
} catch (\PDOException $e) {
    http_response_code(500);

    $message = $e->getMessage();

    if (str_contains($message, 'POKEMON YA EXISTENTE')) {
        http_response_code(409);

        echo json_encode([
            'success' => false,
            'message' => 'Pokemon already exists'
        ]);

        exit;
    }

    if (str_contains($message, 'POKEMON NO EXISTENTE')) {
        http_response_code(404);

        echo json_encode([
            'success' => false,
            'message' => 'Pokemon not found'
        ]);

        exit;
    }

    echo json_encode([
        'success' => false,
        'message' => 'Database error'
    ]);

} catch (\Exception $e) {
    http_response_code(500);

    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}