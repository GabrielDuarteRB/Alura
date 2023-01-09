<?php

use Alura\Banco\Modelo\CPF;
use Alura\Banco\Modelo\Funcionario\Diretor;
use Alura\Banco\Service\Autenticador;

require_once 'autoload.php';

$autenticador = new Autenticador();

$umDiretor = new Diretor(
    "Joao da Silva",
    new CPF('123.456.789-10'),
    15000
);

$autenticador->tentaLogin($umDiretor, '1234');