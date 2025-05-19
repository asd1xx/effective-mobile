<?php

declare(strict_types=1);

function getUserEmails(array $users): array
{
    return array_map(fn($user) => $user['email'], $users);
}

$users = [
    ['id' => 1, 'name' => 'Alice', 'email' => 'alice@example.com'],
    ['id' => 2, 'name' => 'Bob', 'email' => 'bob@example.com'],
];

print_r(getUserEmails($users));
// ✅ Ожидаемый результат: ["alice@example.com", "bob@example.com"]
