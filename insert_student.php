<?php

require_once __DIR__ . "/vendor/autoload.php";

use Hackbartpr\Model\Student;

//Conexão com o banco de dados
$dbPath = __DIR__ . '/db.sqlite';
$pdo = new PDO("sqlite:{$dbPath}");

//Criando o Aluno
$student = new Student(null, 'Carlos Guilherme', new \DateTimeImmutable('1996-12-18'));

//Inserindo Aluno
$query = "INSERT INTO students (name, birth_date) VALUES ('{$student->name()}', '{$student->birthDate()->format('Y-m-d')}');";
if ($pdo->exec($query)) {
    echo "Aluno cadastrado com sucesso!"; 
}