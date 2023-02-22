<?php

declare(strict_types=1);

use Alura\Mvc\Controller\{
    Error404Controller,
};
use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Http\Server\RequestHandlerInterface;
use Nyholm\Psr7Server\ServerRequestCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$routes = require_once __DIR__ . '/../config/routes.php';
$diContainer = require_once __DIR__ . '/../config/dependencies.php';

$pathInfo = $_SERVER['PATH_INFO'] ?? '/';
$httpMethod = $_SERVER['REQUEST_METHOD'];

session_start();
session_regenerate_id();

$isLoginRoute = $pathInfo === '/login';
if (!array_key_exists('logado', $_SESSION) && !$isLoginRoute) {
    header('Location: /login');
    return;
}

$key = "$httpMethod|$pathInfo";
if (array_key_exists($key, $routes)) {
    $controllerClass = $routes["$httpMethod|$pathInfo"];

    $controller = $diContainer->get($controllerClass);
} else {
    $controller = new Error404Controller();
}

$psr17Factory = new Psr17Factory();

$creator = new ServerRequestCreator(
    $psr17Factory,
    $psr17Factory,
    $psr17Factory,
    $psr17Factory
);

$request = $creator->fromGlobals();

/** @var RequestHandlerInterface $controller */
$response = $controller->handle($request);

http_response_code($response->getStatusCode());
foreach ($response->getHeaders() as $name => $values) {
    foreach ($values as $value) {
        header(sprintf('%s: %s', $name, $value), false);
    }
}

echo $response->getBody();
