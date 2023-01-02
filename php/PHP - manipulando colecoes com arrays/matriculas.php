<?php

$alunos2021 = [
    0 => 'Vinicius',
    1 => 'Joao',
    2 => 'Roberta',
    3 => 'Ana',
    4 => 'Gabriel'
];

$novosAlunos = [
    5 => 'Patricia',
    6 => 'Nico',
    7 => 'Kleber',
];

// $alunos2022 = array_merge($alunos2021, $novosAlunos);
// var_dump($alunos2022);

$alunos2022 = [...$alunos2021, ...$novosAlunos];

array_push($alunos2022, 'Alice', 'Bob', 'Charlie');
$alunos2022[] = 'Luiz';

//Adiciona na frente do array
// array_unshift($alunos2022, 'Stephane', 'Rafaela');

//Exclui o primeiro elemento do array
// array_shift($alunos2022);

//Exclui o ultimo elemento do array
// array_pop($alunos2022);

var_dump($alunos2022);