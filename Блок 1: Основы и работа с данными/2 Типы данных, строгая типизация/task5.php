<?php

declare(strict_types=1);

function formatValue(int|float|string $value): string
{
    return (string) $value;
}

echo formatValue(100) . PHP_EOL;      // ✅ "100"
echo formatValue(99.99) . PHP_EOL;    // ✅ "99.99"
echo formatValue("hello") . PHP_EOL;  // ✅ "hello"
echo formatValue(true) . PHP_EOL;     // ❌ Должна быть ошибка TypeError
