<?php

namespace Hackbartpr\Entity;

class Student
{
    private ?int $_id;
    private string $_name;
    private \DateTimeInterface $_birthDate;

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
}