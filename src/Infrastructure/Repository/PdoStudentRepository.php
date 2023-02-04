<?php

namespace Hackbartpr\Infrastructure\Repository;

use PDO;
use Hackbartpr\Entity\Student;
use Hackbartpr\Infrastructure\DB\Connection\SqliteConnectionCreator;
use Hackbartpr\Repository\StudentRepository;


class PdoStudentRepository implements StudentRepository
{

    /**
     * @var PDO
     */
    private PDO $connection;

    /**
     */
    public function __construct()
    {
        $this->connection = SqliteConnectionCreator::createConnection();
    }

    /**
     * @return array
     */
    public function allStudents(): array
    {
        $statement = $this->connection->query('SELECT * FROM students');
        $studentDataList = $statement->fetchAll(PDO::FETCH_ASSOC);

        $studentList = [];
        foreach ($studentDataList as $student) {
            $studentList[] = new Student($student['id'], $student['name'], new \DateTimeImmutable($student['birth_date']));
        }

        return $studentList;
    }
    
    /**
     * @param \DateTimeImmutable $birthDate
     * 
     * @return array
     */
    public function studentsBirthAt(\DateTimeImmutable $birthDate): array
    {
        return [];
    }
    
    /**
     * @param Student $student
     * 
     * @return bool
     */
    public function save(Student $student): bool
    {
        $query = 'INSERT INTO students (name, birth_date) VALUES (:name, :birthDate)';

        $statement = $this->connection->prepare($query);
        $statement->bindValue(':name', $student->name());
        $statement->bindValue(':birthDate', $student->birthDate()->format('Y-m-d'));
        
        return $statement->execute();
    }
    
    /**
     * @param Student $student
     * 
     * @return bool
     */
    public function remove(Student $student): bool
    {
        $query = 'DELETE FROM students WHERE id = :id';

        $statement = $this->connection->prepare($query);
        $statement->bindValue(':id', $student->id(), PDO::PARAM_INT);
        
        return $statement->execute();
    }
}