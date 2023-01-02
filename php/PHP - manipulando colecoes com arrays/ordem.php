<?php

$notas = [
    [
        'aluno' => 'Maria',
        'nota' => 10,
    ],
    [
        'aluno' => 'Vinicius',
        'nota' => 6,
    ],
    [
        'aluno' => 'Gabriel',
        'nota' => 15,
    ],
];

function ordenaNotas(array $nota1, array $nota2) : int 
{
    return $nota2['nota'] <=> $nota1['nota'];
}

$notasOrdenadas = $notas;
usort($notasOrdenadas, 'ordenaNotas');

var_dump($notasOrdenadas);