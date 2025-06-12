<?php

declare(strict_types=1);

namespace App\Classes;

use App\Interfaces\DatabaseInterface;

final class Database implements DatabaseInterface
{
    public function connect(): object
    {
        try {
            $pdo = new \PDO("sqlite:../db/my_database.sqlite");
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (\PDOException $e) {
            die("Ошибка подключения: " . $e->getMessage());
        }
    }
}
