<?php

namespace Hackbartpr\Infrastructure\Repository;

use PDO;
use PDOStatement;
use Hackbartpr\Entity\Phone;
use Hackbartpr\Entity\Student;
use Hackbartpr\Repository\StudentRepository;

class PdoStudentRepository implements StudentRepository
{

    /**
     * @var PDO
     */
    private PDO $connection;

    /**
     * @param PDO $connection
     */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @return array
     */
    public function allStudents (): array
    {
        
        $statement = $this->connection->query('SELECT * FROM students');
        
        return $this->hydrateStudentList($statement);
    }
    
    /**
     * @param \DateTimeImmutable $birthDate
     * 
     * @return array
     */
    public function studentsBirthAt (\DateTimeImmutable $birthDate): array
    {
        $statement = $this->connection->prepare("SELECT * FROM students WHERE birth_date = :birth_date");
        $statement->bindValue(":birth_date", $birthDate->format('Y-m-d'));
        $statement->execute();

        return $this->hydrateStudentList($statement);
    }
    
    /**
     * @param Student $student
     * 
     * @return bool
     */
    public function save (Student $student): bool
    {
        if (!empty($student->id())) {
            return $this->update($student);
        }

        return $this->insert($student);
    }

    /**
     * @param Student $student
     * 
     * @return bool
     */
    public function insert (Student $student): bool
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
    public function update (Student $student): bool
    {
        $query = "UPDATE students SET name = :name, birth_date = :birth_date WHERE id = :id";
        $statement = $this->connection->prepare($query);
        $statement->bindValue(':id', $student->id(), PDO::PARAM_INT);
        $statement->bindValue(':name', $student->name());
        $statement->bindValue(':birth_date', $student->birthDate()->format('Y-m-d'));
        return $statement->execute();
    }
    
    /**
     * @param Student $student
     * 
     * @return bool
     */
    public function remove (Student $student): bool
    {
        $query = 'DELETE FROM students WHERE id = :id';

        $statement = $this->connection->prepare($query);
        $statement->bindValue(':id', $student->id(), PDO::PARAM_INT);
        
        return $statement->execute();
    }

    /**
     * @param PDOStatement $statement
     * 
     * @return array
     */
    public function hydrateStudentList (PDOStatement $statement): array
    {
        $studentList = [];
        $studentDataList = $statement->fetchAll();

        $studentsId = array_column($studentDataList, 'id');
        $sqlIds = implode(',', $studentsId);
        $phoneList = $this->phonesOf($sqlIds);
        unset($studentsId);

        foreach ($studentDataList as $student) {
            $studentList[] = $student = new Student($student['id'], $student['name'], new \DateTimeImmutable($student['birth_date']));
            $this->matchStudentsWithPhones($student, $phoneList);
        }

        return $studentList;
    }

    /**
     * @param array $studentsIs
     * 
     * @return array $phones
     */
    private function phonesOf (string $studentsId): array
    {
        $query = "SELECT * FROM phones WHERE student_id IN ({$studentsId});";
        $statement = $this->connection->query($query);

        return $statement->fetchAll();
    }

    /**
     * @param Student $students
     * @param array $phones
     * 
     * @return void
     */
    private function matchStudentsWithPhones (Student $student, array $phones): void
    {
        foreach ($phones as $phone) {
            if ($phone['student_id'] === $student->id()) {
                $student->addPhone(new Phone($phone['id'], $phone['area_code'], $phone['number']));
            }
        }
    }
}