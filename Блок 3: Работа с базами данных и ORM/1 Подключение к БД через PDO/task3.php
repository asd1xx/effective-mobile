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

    public function addUser(string $name, string $email): void
    {
        $pdo = $this->db->connect();

        try {
            $sql = "INSERT INTO users (name, email) VALUES (:name, :email)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'name' => $name,
                'email' => $email,
            ]);
        } catch (Exception $e) {
            echo "Ошибка: " . $e->getMessage();
        }
    }
}

$db = new Database();
$repo = new UserRepository($db);
$repo->addUser("Иван", "ivan@example.com");
print_r($repo->getUsers());
// ✅ Выводит массив пользователей из БД
