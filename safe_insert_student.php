<?php

require_once __DIR__ . "/vendor/autoload.php";

/* use Hackbartpr\Entity\Student;
use Hackbartpr\Config\DB\ConnectionCreator;

//Conexão com o banco de dados
$pdo = ConnectionCreator::createConnection();

//Criando lista de Students a serem salvos
$newStudentList = [
    new Student(null, 'Carlos Guilherme Hackbart', new \DateTimeImmutable('1996-12-18')),
    new Student(null, 'Lais Joaquim da Silva', new \DateTimeImmutable('1998-12-15')),
    new Student(null, 'Matheus Hackbart', new \DateTimeImmutable('2003-10-03'))
];

//Query
$query = "INSERT INTO students (name, birth_date) VALUES (:name, :birth_date);";
//Tratar os dados a serem enviados ao banco
$statement = $pdo->prepare($query);

//Inserir no banco de dados
foreach ($newStudentList as $newStudent) {
    $statement->bindValue(':name', $newStudent->name());
    $statement->bindValue(':birth_date', $newStudent->birthDate()->format('Y-m-d'));
    if ($statement->execute()) {
        echo "Aluno(a) {$newStudent->name()} foi cadastrado com sucesso!" . PHP_EOL;
    }
}

echo "Cadastros finalizados!"; */



