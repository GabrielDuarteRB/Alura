<?php

$conta1 = [
    'titular' => 'Vinicius',
    'saldo' => 1000
];
$conta2 = [
    'titular' => 'Gabriel',
    'saldo' => 5000
];
$conta3 = [
    'titular' => 'Joao',
    'saldo' => 150
];

$contasCorrentes = [ $conta1, $conta2, $conta3];

foreach($contasCorrentes as $conta) {
    echo $conta['titular'];
}