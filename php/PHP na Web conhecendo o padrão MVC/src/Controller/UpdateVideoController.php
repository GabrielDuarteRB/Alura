<?php

declare(strict_types=1);

namespace Alura\Mvc\Controller;

use Alura\Mvc\Entity\Video;
use Alura\Mvc\Repository\VideoRepository;

Class UpdateVideoController implements Controller
{
    public function __construct(private VideoRepository $videoRepository)
    {
    }

    public function processaRequisicao() : void 
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);
        $titulo = filter_input(INPUT_POST, 'titulo');

        if($id === false || $id === null || $url === false || $titulo === false) {
            header("Location: /sucesso=0");
            exit();
        }

        $video = new Video($url, $titulo);
        $video->setId($id);

        if($this->videoRepository->update($video) === false) {
            header('Location: ?sucesso=0');
        } else {
            header('Location: ?sucesso=1');
        }
    }
}