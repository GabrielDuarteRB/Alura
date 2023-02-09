<?php

declare(strict_types=1);

use Alura\Mvc\Controller\FormularioController;
use Alura\Mvc\Controller\NovoVideoController;
use Alura\Mvc\Controller\RemoveVideoController;
use Alura\Mvc\Controller\UpdateVideoController;
use Alura\Mvc\Controller\VideoListController;

return [
    'GET|/' => VideoListController::class,
    'GET|/novo-video' => FormularioController::class,
    'POST|/novo-video' => NovoVideoController::class,
    'GET|/editar-video' => FormularioController::class,
    'GET|/editar-video' => UpdateVideoController::class,
    'GET|/remover-video' => RemoveVideoController::class,
];