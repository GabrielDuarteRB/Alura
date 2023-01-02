<?php

$idade = 17;
$numeroDePessoas = 2;

if ($idade >= 18) {
    echo "Voce pode entrar!";
} else if($idade >= 16 && $numeroDePessoas > 1) {
    echo "Voce pode entrar, pois tem mais de 16 e esta acompanhado";
} else {
    echo "Voce nao pode entrar";
}