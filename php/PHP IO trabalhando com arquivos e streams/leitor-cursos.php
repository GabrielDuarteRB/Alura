<?php

// $arquivo = fopen('lista-cursos.txt', 'r');

// while(!feof($arquivo)) {
//     $curso = fgets($arquivo);

//     echo $curso;
// }

// $tamanhoDoArquivo = filesize('lista-cursos.txt');
// $cursos = fread($arquivo, $tamanhoDoArquivo);

// echo $cursos;

// fclose($arquivo);

// $cursos = file_get_contents('lista-cursos.txt');

// echo $cursos; 

$cursos = file('lista-cursos.txt');

var_dump($cursos);
