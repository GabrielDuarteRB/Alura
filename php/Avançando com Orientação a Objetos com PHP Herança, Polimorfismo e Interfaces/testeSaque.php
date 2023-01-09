<?php

use Alura\Banco\Modelo\Conta\{ContaPoupanca, ContaCorrente, Titular};
use Alura\Banco\Modelo\{Endereco, CPF};

require_once 'autoload.php';

$conta = new ContaCorrente(
    new Titular(
        new CPF('123.456.789-10'),
        "Gabriel Duarte",
        new Endereco('Meier', 'Um bairro qualquer', 'minha rua', '23')
    )
);

$conta->deposita(500);
$conta->saca(100);

echo $conta->recuperaSaldo();