<?php

$nome = 'Vinicius Dias';

//contem no $nome a string 'Dias'
$ehDaMinhaFamilia = str_contains($nome, 'Dias');

if($ehDaMinhaFamilia) {
    echo "$nome é da minha familia";
} else {
    echo "$nome não é da minha familia";
}