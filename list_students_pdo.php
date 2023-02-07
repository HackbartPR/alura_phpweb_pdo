<?php

require_once __DIR__ . "/vendor/autoload.php";

use Hackbartpr\Infrastructure\Repository\PdoStudentRepository;
use Hackbartpr\Infrastructure\DB\Connection\SqliteConnectionCreator;

$connection = SqliteConnectionCreator::createConnection();
$repository = new PdoStudentRepository($connection);

print_r($repository->allStudents());






