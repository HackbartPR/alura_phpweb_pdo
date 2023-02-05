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
        $connection = new PDO("sqlite:{$dbPath}");
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        
        return $connection;
    }
}