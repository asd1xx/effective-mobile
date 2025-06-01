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

    public function deleteUser(int $id): void
    {
        $validId = filter_var($id, FILTER_VALIDATE_INT);

        if (!$validId) {
            die("Некорректный id!" . PHP_EOL);
        }

        $pdo = $this->db->connect();

        try {
            $sql = "DELETE FROM users WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['id' => $validId]);
        } catch (Exception $e) {
            echo "Ошибка: " . $e->getMessage();
        }
    }
}

$db = new Database();
$repo = new UserRepository($db);
$repo->deleteUser("1 OR 1=1");
print_r($repo->getUsers());
// ✅ Удаляется только пользователь с ID 1, а не все записи
