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
            $stmt->bindValue('email', $validEmail, PDO::PARAM_STR);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user) {
                print_r('Пользователь найден, SQL-инъекция невозможна' . PHP_EOL);
            }
            return $user;
        } catch (Exception $e) {
            echo "Ошибка: " . $e->getMessage();
        }
    }

    public function addUser(string $name, string $email, string $password): void
    {
        $validEmail = filter_var($email, FILTER_VALIDATE_EMAIL);

        if (!$validEmail) {
            die("Некорректный email!" . PHP_EOL);
        }

        $pdo = $this->db->connect();

        try {
            $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue('name', $name, PDO::PARAM_STR);
            $stmt->bindValue('email', $validEmail, PDO::PARAM_STR);
            $stmt->bindValue('password', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            echo "Ошибка: " . $e->getMessage();
        }
    }
}

$db = new Database();
$repo = new UserRepository($db);
$repo->addUser("Oleg", "oleg@example.com", "password");
print_r($repo->getUserByEmail("oleg@example.com"));
// ✅ Пользователь найден, SQL-инъекция невозможна
