<?php

$idadeList = [21, 23, 19, 25, 30, 41, 18];
$idadeList[] = 234;
$tamanhoList = count($idadeList);

for ($i = 0; $i < $tamanhoList; $i++) {
    echo "$idadeList[$i] \n";
}