<?php

$arquivoCursos = new SplFileObject('cursos.csv');

while(!$arquivoCursos->eof()) {
    $linha = $arquivoCursos->fgetcsv(';');

    echo $linha[0] . PHP_EOL;
}

$date = new DateTime();

$date->setTimestamp($arquivoCursos->getSize());

echo $date->format(('d/m/Y'));