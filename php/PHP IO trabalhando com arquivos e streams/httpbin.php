<?php

$contexto = stream_context_create([
    'http' => [
        'method' => 'DELETE',
        'header' => "X-From: PHP\r\nContent-Type: text/plain",
        'content' => 'Teste do corpo da requisição'
    ]
]);

echo file_get_contents('http://httpbin.org/delete', false, $contexto);