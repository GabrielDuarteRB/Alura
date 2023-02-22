<?php

declare(strict_types=1);

namespace Alura\Mvc\Controller;

use Alura\Mvc\Entity\Video;
use Alura\Mvc\Helper\FlashMessageTrait;
use Alura\Mvc\Repository\VideoRepository;
use finfo;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class NewVideoController implements RequestHandlerInterface
{

    use FlashMessageTrait;

    public function __construct(private VideoRepository $videoRepository)
    {
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $bodyParams = $request->getParsedBody();
        $url = filter_var($bodyParams['url'], FILTER_VALIDATE_URL);
        if ($url === false) {
            $this->addErrorMessage('URL invalida');
            return new Response(302, [
                'Location' => '/novo-video'
            ]);
        }
        $titulo = filter_var($bodyParams['titulo']);
        if ($titulo === false) {
            $this->addErrorMessage('Titulo nao informado');
            return new Response(302, [
                'Location' => '/novo-video'
            ]);
        }

        $video = new Video($url, $titulo);
        if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $safeFileName = uniqid('upload_') . '_' . pathinfo($_FILES['image']['name'], PATHINFO_BASENAME);
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            $mimetype = $finfo->file($_FILES['image']['tmp_name']);

            if(str_starts_with($mimetype, 'image/')) {
                move_uploaded_file(
                    $_FILES['image']['tmp_name'],
                    __DIR__ . '/../../public/img/uploads/' . $safeFileName
                );
                $video->setFilePath($safeFileName);
            }
        }

        $success = $this->videoRepository->add($video);
        if ($success === false) {
            $this->addErrorMessage('Erro ao cadastrar');
            return new Response(302, [
                'Location' => '/novo-video'
            ]);
        } else {
            return new Response(302, [
                'Location' => '/'
            ]);
        }
    }
}
