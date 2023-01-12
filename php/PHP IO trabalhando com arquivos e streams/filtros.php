<?php

require_once 'MeuFiltro.php';

$arquivoCursos = fopen('lista-cursos.txt', 'r');

stream_filter_register('aluna.partes', MeuFiltro::class);
stream_filter_append($arquivoCursos, 'aluna.partes');

echo fread($arquivoCursos, filesize('lista-cursos.txt'));