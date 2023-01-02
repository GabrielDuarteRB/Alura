<?php

$nome = 'Vinicius Dias';
$email = 'vinicius@alura.com.br';
$senha = '123';

//Tamanho da string em BYTES!
echo mb_strlen($senha) . PHP_EOL;

//Pega a posicao de uma carcatere ou uma string em outra string
$posicaoDoArroba = strpos($email, '@');
echo $posicaoDoArroba;

//Pega um pedaço da string, de 0 ao 8
$usuario = substr($email, 0, $posicaoDoArroba) . PHP_EOL;

//Pega do nono caractere ate o final
echo substr($email, $posicaoDoArroba + 1) . PHP_EOL;

//Coloca todos os caracteres com letra maiuscula
echo strtoupper($usuario) . PHP_EOL;

//Coloca todos os caracters com letra minuscula
echo strtolower($usuario) . PHP_EOL;

//explode separa string no caractere/string pedida
list($nome, $sobrenome) = explode(' ', $nome);
echo "Nome: $nome | Sobrenome: $sobrenome" . PHP_EOL;

//Remove os espacos
echo trim($nome) . PHP_EOL;