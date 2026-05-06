<?php

require_once __DIR__ . '/../src/Config/bootstrap.php';

header('Content-Type: application/json');

echo json_encode([
    'message' => 'API running'
]);