<?php

require_once __DIR__ . '/../controllers/UserController.php';

$method = $_SERVER['REQUEST_METHOD'];
$full_uri = $_SERVER['REQUEST_URI'];

// Extract the actual API path
if (preg_match('#/redlinemotors/api-project/api/index.php(/[^?]*)#', $full_uri, $matches)) {
    $path = $matches[1];
} else {
    $path = '';
}

$controller = new UserController();

// EXACT path matching
if ($method === 'POST' && $path === '/api/v1/register') {
    $controller->register();
}
elseif ($method === 'POST' && $path === '/api/v1/login') {
    $controller->login();
}
elseif ($method === 'GET' && $path === '/api/v1/users') {
    $controller->getAllUsers();
}
elseif ($method === 'GET' && preg_match('#^/api/v1/users/(\d+)$#', $path, $matches)) {
    $controller->getUser($matches[1]);
}
elseif (($method === 'PUT' || $method === 'PATCH') && preg_match('#^/api/v1/users/(\d+)$#', $path, $matches)) {
    $controller->updateUser($matches[1]);
}
elseif ($method === 'DELETE' && preg_match('#^/api/v1/users/(\d+)$#', $path, $matches)) {
    $controller->deleteUser($matches[1]);
}
else {
    echo json_encode([
        'status' => 'error', 
        'message' => 'Route not found: ' . $method . ' ' . $path
    ]);
}