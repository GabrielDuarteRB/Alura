<?php

use Alura\Banco\Modelo\Endereco;

require_once 'autoload.php';

$umEndereco = new Endereco('RJ', 'Meier', 'Silva Rabelo', '154');
$outroEndereco = new Endereco('Petropolis', 'bairro', 'Silva', '1523');

echo $umEndereco->rua . PHP_EOL;

echo $umEndereco . PHP_EOL;
echo $outroEndereco . PHP_EOL;