<?php

require_once __DIR__ . "/vendor/autoload.php";

use Hackbartpr\Entity\Student;
use Hackbartpr\Infrastructure\Repository\PdoStudentRepository;

//Criando lista de Students a serem salvos
/* $newStudentList = [
    new Student(null, 'Carlos Guilherme Hackbart', new \DateTimeImmutable('1996-12-18')),
    new Student(null, 'Lais Joaquim da Silva', new \DateTimeImmutable('1998-12-15')),
    new Student(null, 'Matheus Hackbart', new \DateTimeImmutable('2003-10-03'))
]; */

$repository = new PdoStudentRepository;
$isSaved = $repository->save(new Student(null, 'Carlos Guilherme Hackbart', new \DateTimeImmutable('1996-12-18')));

var_dump($isSaved);