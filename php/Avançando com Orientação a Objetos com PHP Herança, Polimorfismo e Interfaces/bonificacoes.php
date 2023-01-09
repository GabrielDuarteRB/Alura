<?php

require_once 'autoload.php';

use Alura\Banco\Modelo\{Endereco, CPF};
use Alura\Banco\Modelo\Funcionario\{Diretor, Desenvolvedor, EditorVideo, Gerente};
use Alura\Banco\Service\ControladorDeBonificacoes;

$umDesenvolvedor = new Desenvolvedor(
    "Gabriel Duarte",
    new CPF("123.456.789-10"),
    10000
);

$umDesenvolvedor->sobeDeNivel();

$umaGerente = new Gerente(
    "Gabriela",
    new CPF("325.163.789-10"),
    15000
);

$umaDiretora = new Diretor(
    "Ana Mariana",
    new CPF("325.163.789-10"),
    20000
);

$umEditorVideo = new EditorVideo(
    "Felipe",
    new CPF("192.390.192-39"),
    5000
);

$controlador = new ControladorDeBonificacoes();
$controlador->adicionaBonificacaoDe($umaGerente);
$controlador->adicionaBonificacaoDe($umDesenvolvedor);
$controlador->adicionaBonificacaoDe($umaDiretora);
$controlador->adicionaBonificacaoDe($umEditorVideo);

echo $controlador->recuperaBonificacoes();