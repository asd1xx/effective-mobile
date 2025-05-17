<?php

declare(strict_types=1);

function getNamesLength(array $names): array
{
    $result = [];

    foreach ($names as $name) {
        if (!is_string($name)) {
            throw new TypeError('Только строки разрешены');
        }
        $result[] = mb_strlen($name);
    }

    return $result;
}

print_r(getNamesLength(["Alice", "Bob", "Charlie"])) . PHP_EOL;
// ✅ Ожидаемый результат: [5, 3, 7]

print_r(getNamesLength([123, "Bob", "Charlie"])) . PHP_EOL;
// ❌ Должна быть ошибка TypeError (только строки разрешены)
