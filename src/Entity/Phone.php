<?php

namespace Hackbartpr\Entity;

class Phone
{
    private ?int $_id;
    private string $_areaCode;
    private string $_number;

    /**
     * @param int|null $id
     * @param string $areaCode
     * @param string $number
     */
    public function __construct(?int $id, string $areaCode, string $number)
    {
        $this->_id = $id;
        $this->_areaCode = $areaCode;
        $this->_number = $number;
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
    public function areaCode(): string
    {
        return $this->_areaCode;
    }

    /**
     * @return string
     */
    public function number(): string
    {
        return $this->_number;
    }

    /**
     * @return string
     */
    public function formattedPhone(): string
    {
        return "({$this->_areaCode}) {$this->_number}";
    }
}