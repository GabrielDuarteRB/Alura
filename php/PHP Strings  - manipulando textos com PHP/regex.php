<?php

$telefones = [
    '(24) 9999 - 9999',
    '(21) 9999 - 9999',
    '(24) 2222 - 2222',
];

foreach($telefones as $telefone) {
    $telefoneValido = preg_match(
        '/^\([0-9]{2}\) 9?[0-9]{4} - [0-9]{4}$/',
        $telefone,
        $verificacoes
    );

    var_dump($verificacoes);
    if($telefoneValido) {
        echo 'Telefone válido' . PHP_EOL;
    } else {
        echo 'Telefone inválido' . PHP_EOL;
    }

    echo preg_replace(
        '/\(([0-9]{2})\) (9?[0-9]{4} - [0-9]{4})/',
        '(xx) \2',
        $telefone
    ) . PHP_EOL;
}

?>