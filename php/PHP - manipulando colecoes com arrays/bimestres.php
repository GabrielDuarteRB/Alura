<?php

$notasDoBimestre1 = [
    'Vinicius' => 7,
    'Joao' => 8,
    'Roberta' => 9,
    'Ana' => 6,
    'Gabriel' => 10,
];

$notasDoBimestre2 = [
    'Joao' => 8,
    'Roberta' => 9,
    'Gabriel' => 10,
];

//Retorna um novo array(sem referencia), com a diferença dos valores do primeiro array pro segundo
// var_dump(array_diff($notasDoBimestre1, $notasDoBimestre2));

//Retorna um novo array, com a diferença das keys
// var_dump(array_diff_key($notasDoBimestre1, $notasDoBimestre2));

//Retorna um novo array, com a diferença dos valores com a mesma key
// var_dump(array_diff_assoc($notasDoBimestre1, $notasDoBimestre2));

$alunosFaltantes = array_diff_key($notasDoBimestre1, $notasDoBimestre2);

//Retorna apenas as keys do array
$nomesAlunos = array_keys($alunosFaltantes);

//retorn apenas os valores
$notasAlunos = array_values($alunosFaltantes);

//Define chave e valor
var_dump(array_combine($notasAlunos, $nomesAlunos));

//Muda chave por valor
var_dump(array_flip($alunosFaltantes));
