<?php

declare(strict_types=1);

use Alura\Mvc\Controller\FormularioController;
use Alura\Mvc\Controller\NovoVideoController;
use Alura\Mvc\Controller\RemoveVideoController;
use Alura\Mvc\Controller\UpdateVideoController;
use Alura\Mvc\Controller\VideoListController;
use Alura\Mvc\Repository\VideoRepository;

require_once __DIR__ . '/../vendor/autoload.php';

$dbPath = __DIR__ . '/../banco.sqlite';
$pdo = new PDO("sqlite:$dbPath");
$videoRepository = new VideoRepository($pdo);

$routes = require_once __DIR__ . '/../config/routes.php';

$pathInfo = $_SERVER['PATH_INFO'] ?? '/';
$httpMethod = $_SERVER['REQUEST_METHOD'];

$key = "$httpMethod|$pathInfo";
if(array_key_exists($key, $routes)) {
    $controllerClass = $routes[$key];

    $controller = new $controllerClass($videoRepository);
} else {
    
}
$controller->processaRequisicao();