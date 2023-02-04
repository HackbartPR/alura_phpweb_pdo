<?php

//Conexão com o banco de dados
$dbPath = __DIR__ . '/db.sqlite';
$pdo = new PDO("sqlite:{$dbPath}");

//Criando a tabela students
$pdo->exec('CREATE TABLE students (id INTEGER PRIMARY KEY, name TEXT, birth_date TEXT);');

