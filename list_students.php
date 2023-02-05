<?php

require_once __DIR__ . "/vendor/autoload.php";

use Hackbartpr\Entity\Student;
use Hackbartpr\Config\DB\ConnectionCreator;

//Conexão com o banco de dados
$dbPath = __DIR__ . '/db.sqlite';
$pdo = new PDO("sqlite:{$dbPath}");

//Listando os alunos do banco de dados
$statement = $pdo->query('SELECT * FROM students;');
$studentDataList = $statement->fetchAll(PDO::FETCH_ASSOC); //FETCH ASSOC: retorna um array associativo com resultado da pesquisa

//Criando um array de objetos do tipo Students
$studentList = [];
foreach ($studentDataList as $studentData) {
    $studentList[] = new Student($studentData['id'], $studentData['name'], new \DateTimeImmutable($studentData['birth_date']));
}

var_dump($studentList);



