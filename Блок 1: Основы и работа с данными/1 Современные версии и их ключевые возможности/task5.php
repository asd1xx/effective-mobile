<?php

declare(strict_types=1);

function getUserEmail(object $user): string
{
    return $user?->profile?->email ?? 'Email не найден';
}

$user = (object)[
    'profile' => (object)[
        'email' => 'test@example.com'
    ]
];
echo getUserEmail($user) . PHP_EOL; // ✅ "test@example.com"

$user = (object)[
    'profile' => null
];
echo getUserEmail($user) . PHP_EOL; // ✅ "Email не найден"
