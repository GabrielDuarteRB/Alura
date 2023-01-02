<?php

$dados = [
    'nome' => 'Vinicius',
    'nota' => 10,
    'idade' => 24
];
// list($nome, $nota, $idade) = $dados;

extract($dados);
var_dump($nome, $nota, $idade);

var_dump(compact('nome', 'nota', 'idade'));