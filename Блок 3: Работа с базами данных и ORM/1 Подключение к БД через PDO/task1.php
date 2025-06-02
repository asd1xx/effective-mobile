<?php

declare(strict_types=1);

final class Database
{
    public function connect(): void
    {
        // Параметры для подключения к БД
        // $host = getenv('HOST');
        // $dbname = getenv('DBNAME');
        // $username = getenv('USERNAME');
        // $password = getenv('PASSWORD');

        try {
            // Строка подключения к БД MySql
            // $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
            // Строка подключения к БД PostgreSQL
            // $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);
            // Строка подключения к БД SQLite
            $pdo = new PDO("sqlite:my_database.sqlite");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Подключение успешно!";
        } catch (PDOException $e) {
            die("Ошибка подключения: " . $e->getMessage());
        }
    }
}

$db = new Database();
echo $db->connect() . PHP_EOL;
// ✅ "Подключение успешно"
