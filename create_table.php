<?php

require __DIR__ . '/vendor/autoload.php';

use Hackbartpr\Infrastructure\DB\Connection\SqliteConnectionCreator;

//Conexão com o banco de dados
$pdo = SqliteConnectionCreator::createConnection();

//Criando a tabela students
$pdo->exec('CREATE TABLE students (id INTEGER PRIMARY KEY, name TEXT, birth_date TEXT);');

