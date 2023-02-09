<?php

declare(strict_types=1);

namespace Alura\Mvc\Controller;

use Alura\Mvc\Repository\VideoRepository;

class FormularioController implements Controller
{
    public function __construct(private VideoRepository $videoRepository)
    {
    }

    public function processaRequisicao() : void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        $video = [
            'url' => '',
            'title' => ''
        ];
        
        if ($id !== false && $id !== null) {
            $video = $this->videoRepository->specificId($id);
        }
        
       require_once __DIR__ . '/../../views/video-form.php';
    }
}