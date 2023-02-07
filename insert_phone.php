<?php

require_once __DIR__ . "/vendor/autoload.php";

use PDOException;
use Hackbartpr\Entity\Phone;
use Hackbartpr\Infrastructure\DB\Connection\SqliteConnectionCreator;
use Hackbartpr\Infrastructure\Repository\PdoStudentRepository;

$connection = SqliteConnectionCreator::createConnection();
$connection->exec("INSERT INTO phones (area_code, number, student_id) VALUES ('45', '991514356', 1);");
$connection->exec("INSERT INTO phones (area_code, number, student_id) VALUES ('45', '998485021', 1);");    