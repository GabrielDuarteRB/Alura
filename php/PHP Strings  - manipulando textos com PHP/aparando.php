<?php

$csv = ',Vinicius Dias,24,';

//Apaga os caracteres/strings do inicio e do fim da string
echo trim($csv, ',');
//Apaga da esquerda
echo ltrim($csv, ',');
//Apaga da direita
echo trim($csv, ',');
