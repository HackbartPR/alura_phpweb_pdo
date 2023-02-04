<?php

namespace Hackbartpr\Entity;

class Student
{
    private ?int $id;
    private string $name;
    private \DateTimeInterface $birthDate;

    /**
     * @param int|null $id
     * @param string $name
     * @param \DateTimeInterface $birthDate
     */
    public function __construct(?int $id, string $name, \DateTimeInterface $birthDate)
    {
        $this->id = $id;
        $this->name = $name;
        $this->birthDate = $birthDate;
    }

    /**
     * @return int|null
     */
    public function id(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @return \DateTimeInterface
     */
    public function birthDate(): \DateTimeInterface
    {
        return $this->birthDate;
    }

    /**
     * @return int
     */
    public function age(): int
    {
        return $this->birthDate()->diff(new \DateTimeImmutable())->y;
    }
}