<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Interfaces\DatabaseInterface;
use App\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
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
            $users = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $users;
        } catch (\Exception $e) {
            echo "Ошибка: " . $e->getMessage();
        }
    }
}
