<?php

declare(strict_types=1);

final class Database
{
    public function connect()
    {
        $host = getenv('HOST');
        $dbname = getenv('DBNAME');
        $username = getenv('USERNAME');
        $password = getenv('PASSWORD');

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
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
