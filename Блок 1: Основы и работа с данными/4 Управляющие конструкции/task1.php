<?php

declare(strict_types=1);

function checkNumber(int $number): string
{
    if ($number > 0) {
        return 'Положительное';
    } elseif ($number < 0) {
        return 'Отрицательное';
    } else {
        return 'Ноль';
    }
}

echo checkNumber(10) . PHP_EOL;   // ✅ "Положительное"
echo checkNumber(-5) . PHP_EOL;   // ✅ "Отрицательное"
echo checkNumber(0) . PHP_EOL;    // ✅ "Ноль"
