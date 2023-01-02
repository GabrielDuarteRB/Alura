<?php

$url = 'https://alura.com.br'; 

//Verifica se possui https no inicio da frase
if(str_starts_with($url, 'https')) {
    echo 'E uma url segura!';
} else {
    echo 'Nao e uma url segura!';
}

echo PHP_EOL;

//Verifica se possui .br no final da frase
if(str_ends_with($url, '.br')) {
    echo 'E um dominio do Brasil';
} else {
    echo 'E um dominio do Brasil';
}