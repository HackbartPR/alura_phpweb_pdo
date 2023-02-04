<?php

require_once __DIR__ . "/vendor/autoload.php";

use Hackbartpr\Model\Student;

//Conexão com o banco de dados
$dbPath = __DIR__ . '/db.sqlite';
$pdo = new PDO("sqlite:{$dbPath}");

//Id
$id = 3;

//Query
$query = "DELETE FROM students WHERE id = :id";

//Preparando a query
$statement = $pdo->prepare($query);
$statement->bindValue(':id', $id, PDO::PARAM_INT);
if ($statement->execute()) {
    echo 'Usuário deletado com sucesso!';
}