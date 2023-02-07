<?php

require_once __DIR__ . "/vendor/autoload.php";

use Hackbartpr\Entity\Phone;
use Hackbartpr\Config\DB\ConnectionCreator;

//Conexão com o banco de dados
$dbPath = __DIR__ . '/db.sqlite';
$pdo = new PDO("sqlite:{$dbPath}");

//Listando os alunos do banco de dados
$statement = $pdo->query('SELECT * FROM phones;');
$phoneDataList = $statement->fetchAll(PDO::FETCH_ASSOC); //FETCH ASSOC: retorna um array associativo com resultado da pesquisa

//Criando um array de objetos do tipo Students
$phoneList = [];
foreach ($phoneDataList as $phone) {
    $phoneList[] = new Phone($phone['id'], $phone['area_code'], $phone['number']);
}

var_dump($phoneList);



