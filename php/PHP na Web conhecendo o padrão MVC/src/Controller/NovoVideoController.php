<?php

declare(strict_types=1);

namespace Alura\Mvc\Controller;

use Alura\Mvc\Entity\Video;
use Alura\Mvc\Repository\VideoRepository;

class NovoVideoController implements Controller
{
    public function __construct(private VideoRepository $videoRepository)
    {
    }

    public function processaRequisicao() : void
    {
        $url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);
        $titulo = filter_input(INPUT_POST, 'titulo');

        if ($url === false || $titulo === false) {
            header('Location: ?sucesso=0');
            exit();
        }

        if($this->videoRepository->add(new Video($url, $titulo)) === false) {
            header('Location: ?sucesso=0');
        } else {
            header('Location: ?sucesso=1');
        }
    }
}