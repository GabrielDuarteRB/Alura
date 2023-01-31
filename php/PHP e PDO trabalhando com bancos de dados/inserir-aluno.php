<?php

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;

require_once 'vendor/autoload.php';

$pdo = ConnectionCreator::createConnection();

$student = new Student(null, 'Gabriel Duarte', new \DateTimeImmutable('2003-12-21'));
$sqlInsert = "INSERT INTO students (name, birth_date) VALUES (?, ?)";

$statement = $pdo->prepare($sqlInsert);
$statement->bindValue(1, $student->name());
$statement->bindValue(2, $student->birthDate()->format('Y-m-d'));

if($statemnet->execute()) {
    echo "Aluno incluído";
}

// var_dump($pdo->exec($sqlInsert));