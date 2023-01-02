<?php

$texto = 'texto com qualquer coisa poxa e caramba';

//Substitui uma string por outra
echo str_replace(
    ['poxa', 'caramba'],
    '***', 
    $texto
) . PHP_EOL;

//Substitui os caracteres e nao a string
echo strtr($texto, 'poxa', '***') . PHP_EOL;

//Substitui a chave pelo valor no texto
echo strtr($texto, [
    'poxa' => 'p', 
    'caramba' => 'c'
]) . PHP_EOL;