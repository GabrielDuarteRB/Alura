<?php

// $arquivo = fopen('temp.txt', 'w');

// try {
//     echo "Executando" . PHP_EOL;
//     // throw new Exception("Excessao aki");
// } catch (Throwable $e) {
//     echo "Caindo no catch" . PHP_EOL;
// } finally {
//     echo "Finally" . PHP_EOL;
//     fclose($arquivo);
// }

function a() {
    try{
        echo "Codigo";
        return 0;
    } catch (Throwable $e) {
        echo "Problema";
        return 1;
    } finally {
        echo "Final da funcao";
    }
}

echo a();