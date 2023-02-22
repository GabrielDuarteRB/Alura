<?php

declare(strict_types=1);

namespace Alura\Mvc\Helper;

trait FlashMessageTrait
{
    public function addErrorMessage(string $erroMessage) : void
    {
        $_SESSION['erro_message'] = $erroMessage;
    }
}