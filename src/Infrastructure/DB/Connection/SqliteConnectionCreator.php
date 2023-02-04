<?php

namespace Hackbartpr\Infrastructure\DB\Connection;

use PDO;
use Hackbartpr\Infrastructure\DB\Interface\ConnectionCreator;

class SqliteConnectionCreator implements ConnectionCreator
{
    /**
     * @return PDO
     */
    public static function createConnection(): PDO
    {
        $dbPath = __DIR__ . '/../../../../db.sqlite';
        return new PDO("sqlite:{$dbPath}");     
    }
}