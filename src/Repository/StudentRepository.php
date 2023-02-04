<?php

namespace Hackbartpr\Repository;

use Hackbartpr\Entity\Student;

interface StudentRepository
{
    /**
     * @return array
     */
    public function allStudents(): array;
    
    /**
     * @param \DateTimeImmutable $birthDate
     * 
     * @return array
     */
    public function studentsBirthAt(\DateTimeImmutable $birthDate): array;
    
    /**
     * @param Student $student
     * 
     * @return bool
     */
    public function save(Student $student): bool;
    
    /**
     * @param Student $student
     * 
     * @return bool
     */
    public function remove(Student $student): bool;
}