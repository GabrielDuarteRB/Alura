<?php

use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;

require_once 'vendor/autoload.php';

$pdo = ConnectionCreator::createConnection();
$sqlDelete = 'DELETE FROM students WHERE id = ?';

$preparedStatement = $pdo->prepare($sqlDelete);
$preparedStatement->bindValue(1, 1, PDO::PARAM_INT);
var_dump($preparedStatement->execute());