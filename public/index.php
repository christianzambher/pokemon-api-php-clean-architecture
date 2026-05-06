<?php

require_once __DIR__ . '/../src/Config/bootstrap.php';

use App\Router;
use App\Controllers\PokemonController;

header('Content-Type: application/json');

$router = new Router();

// Ruta de prueba
$router->add('GET', '/', function () {
    echo json_encode(['message' => 'API running']);
});

// Ruta real (la que reemplazará savePokemon.php)
$router->add('POST', '/pokemon', function () {
    $controller = new PokemonController();
    $result = $controller->save($_POST);

    echo json_encode([
        'success' => true,
        'data' => $result
    ]);
});

// Ejecutar router
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

$router->dispatch($method, $uri);