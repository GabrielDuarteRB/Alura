<?php

function funcao1()
{   
    echo 'Entrei na função 1' . PHP_EOL;
    try {
        funcao2();
    } catch (Throwable $erroOuExecucao) {
        echo $erroOuExecucao->getMessage() . PHP_EOL;
        echo $erroOuExecucao->getLine() . PHP_EOL;
        echo $erroOuExecucao->getTraceAsString() . PHP_EOL;
    } 
    echo 'Saindo da função 1' . PHP_EOL;
}

function funcao2()
{
    echo 'Entrei na função 2' . PHP_EOL;
    $divisao = intdiv(5, 0);
    $arrayfixo = new SplFixedArray(2);
    $arrayfixo[3] = 'Valor';
    for ($i = 1; $i <= 5; $i++) {
        echo $i . PHP_EOL;
    }
    echo 'Saindo da função 2' . PHP_EOL;
}

echo 'Iniciando o programa principal' . PHP_EOL;
funcao1();
echo 'Finalizando o programa principal' . PHP_EOL;
