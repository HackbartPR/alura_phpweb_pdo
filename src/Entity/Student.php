<?php

namespace Hackbartpr\Entity;

use Hackbartpr\Entity\Phone;

class Student
{
    /**
     * @var int|null
     */
    private ?int $_id;

    /**
     * @var string
     */
    private string $_name;
    
    /**
     * @var \DateTimeInterface
     */
    private \DateTimeInterface $_birthDate;
    
    /**
     * @var Phone[]
     */
    private array $_phones;

    /**
     * @param int|null $id
     * @param string $name
     * @param \DateTimeInterface $birthDate
     */
    public function __construct(?int $id, string $name, \DateTimeInterface $birthDate)
    {
        $this->_id = $id;
        $this->_name = $name;
        $this->_birthDate = $birthDate;
        $this->_phones = [];
    }

    /**
     * @return int|null
     */
    public function id(): ?int
    {
        return $this->_id;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->_name;
    }

    /**
     * @return \DateTimeInterface
     */
    public function birthDate(): \DateTimeInterface
    {
        return $this->_birthDate;
    }

    /**
     * @return int
     */
    public function age(): int
    {
        return $this->birthDate()->diff(new \DateTimeImmutable())->y;
    }

    /**
     * @param Phone $phone
     * 
     * @return void
     */
    public function addPhone(Phone $phone): void
    {
        $this->_phones[] = $phone;
    }

    /**
     * @return Phone[]
     */
    public function phones(): array
    {
        return $this->_phones;
    }

}