<?php

require_once './funcoes.php';

$contasCorrentes = [
    '123.456.789-12' => [
        'titular' => 'Vinicius',
        'saldo' => 1000
    ],
    '987.654.321-09' => [
        'titular' => 'Gabriel',
        'saldo' => 5000
    ],
    '567.432.198-56' => [
        'titular' => 'Joao',
        'saldo' => 150
    ]
];

// $contasCorrentes['123.456.789-12'] = depositar($contasCorrentes['123.456.789-12'], 1500);
titularComLetrasMaiusculas($contasCorrentes['123.456.789-12']);
// unset($contasCorrentes['123.456.789-12']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Contas correntes</h1>
    
    <dl>
        <?php foreach($contasCorrentes as $cpf => $conta) {  ?>
            <dt>
                <h3><?= $conta['titular']; ?> - <?= $cpf ?></h3>
            </dt>
            <dd>Saldo: <?= $conta['saldo']; ?></dd>
        <?php } ?>
    </dl>
</body>
</html>