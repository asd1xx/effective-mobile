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

    public function getUserByEmail(string $email): array|false
    {
        $validEmail = filter_var($email, FILTER_VALIDATE_EMAIL);

        if (!$validEmail) {
            die("Некорректный email!" . PHP_EOL);
        }
        
        $pdo = $this->db->connect();

        try {
            $sql = "SELECT * FROM users WHERE email = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'email' => $validEmail,
            ]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user;
        } catch (Exception $e) {
            echo "Ошибка: " . $e->getMessage();
        }
    }
}

$db = new Database();
$repo = new UserRepository($db);
print_r($repo->getUserByEmail("ivan@example.com"));
// ✅ Выводит данные пользователя

$repo->getUserByEmail("hacker@example.com' OR 1=1 --");
// ✅ Не должно возвращать всех пользователей
