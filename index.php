<?php

use App\Http\Request;

require_once 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$routes = config('routes');

// Obtiene la URI solicitada
$request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Busca la ruta en el array de rutas
$route_found = false;
foreach ($routes as $route => $handler) {
    // Escapa caracteres especiales para usar en expresiones regulares
    $pattern = preg_quote($route, '/');

    // Reemplaza los segmentos dinámicos con expresiones regulares
    $pattern = preg_replace('/\\\{([^\/]+)\\\}/', '(?<$1>[^\/]+)', $pattern);

    // Agrega delimitadores de expresiones regulares y bandera de insensibilidad a mayúsculas y minúsculas
    $pattern = '/^' . $pattern . '$/i';

    // Intenta hacer coincidir la URI con el patrón de ruta
    if (preg_match($pattern, $request_uri, $matches)) {
        $controller = $handler[0];
        $method = $handler[1];
        $route_found = true;

        // Si hay parámetros dinámicos, los pasamos a la instancia del controlador
        $routeParams = array_intersect_key($matches, array_flip(array_filter(array_keys($matches), 'is_string')));
        $request = new Request($routeParams);

        break;
    }
}

// Si la ruta no se encuentra, muestra un error 404
if (!$route_found) {
    http_response_code(404);
    echo 'Página no encontrada';
    exit;
}

$controller_instance = new $controller();
$controller_instance->$method($request);
