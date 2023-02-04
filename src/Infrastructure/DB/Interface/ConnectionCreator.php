<?php

namespace Hackbartpr\Infrastructure\DB\Interface;

use PDO;

interface ConnectionCreator
{
    /**
     * @return PDO
     */
    public static function createConnection(): PDO;
}