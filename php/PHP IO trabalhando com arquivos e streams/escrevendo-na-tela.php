<?php

// fwrite(STDERR, 'Ola Mundo!');
// fwrite(STDOUT, 'Ola Mundo!');

$cursos = fopen('zip://arquivos.zip#cursos-php.txt', 'r');
stream_copy_to_stream($cursos, STDOUT);