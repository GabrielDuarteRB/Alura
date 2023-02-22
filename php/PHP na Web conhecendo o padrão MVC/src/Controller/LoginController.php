<?php

declare(strict_types=1);

namespace Alura\Mvc\Controller;

use Alura\Mvc\Helper\FlashMessageTrait;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class LoginController implements RequestHandlerInterface
{
    use FlashMessageTrait;

    private \PDO $pdo;

    public function __construct()
    {
        $dbPath = __DIR__ . '/../../banco.sqlite';
        $this->pdo = new \PDO("sqlite:$dbPath");
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $bodyParams = $request->getParsedBody();
        $email = filter_var($bodyParams['email'], FILTER_VALIDATE_EMAIL);
        $password = filter_var($bodyParams['password']);

        $sql = 'SELECT * FROM users WHERE email = ?';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $email);
        $statement->execute();

        $userData = $statement->fetch(\PDO::FETCH_ASSOC);
        $correctPassword = password_verify($password, $userData['password'] ?? '');

        if ($correctPassword) {
            $_SESSION['logado'] = true;
            return new Response(302, [
                'Location' => '/'
            ]);
        } else {
            $this->addErrorMessage('Usuario ou senha invalidos');
            return new Response(302, [
                'Location' => '/'
            ]);
        }
    }
}
