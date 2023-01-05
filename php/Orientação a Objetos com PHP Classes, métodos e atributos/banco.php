<?php

require_once('src/Conta.php');
require_once('src/Titular.php');

$primeiraConta = new Conta(new Titular('123.456.789-10', 'Gabriel'));
$primeiraConta->deposita(500);
$primeiraConta->saca(300);

echo $primeiraConta->recuperaSaldo() . PHP_EOL;
echo $primeiraConta->recuperaCpfTitular() . PHP_EOL;
echo $primeiraConta->recuperaNomeTitular() . PHP_EOL;

$segundaConta = new Conta(new Titular('987.654.321-01', 'Ana Mariana'));

$outra = new Conta(new Titular('987.654.321-02', 'Mariana'));

echo Conta::recuperaNumeroDeContas();