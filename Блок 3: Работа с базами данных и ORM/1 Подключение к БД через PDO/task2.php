<?php

declare(strict_types=1);

interface DatabaseInterface
{
    public function connect(): object;
}

final class Database implements DatabaseInterface
{
    public function connect(): object
    {
        try {
            $pdo = new PDO("sqlite:my_database.sqlite");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Ошибка подключения: " . $e->getMessage());
        }
    }
}

class UserRepository
{
    private DatabaseInterface $db;

    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }

    public function getUsers(): array|false
    {
        $pdo = $this->db->connect();

        try {
            $stmt = $pdo->query("SELECT * FROM users");
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $users;
        } catch (Exception $e) {
            echo "Ошибка: " . $e->getMessage();
        }
    }
}

$db = new Database();
$repo = new UserRepository($db);
print_r($repo->getUsers());
// ✅ Выводит массив пользователей из БД
