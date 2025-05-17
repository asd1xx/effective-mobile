<?php

declare(strict_types=1);

function multiply(int|float $numberOne, int|float $numberTwo): int|float
{
    return $numberOne * $numberTwo;
}

echo multiply(3, 2) . PHP_EOL;     // ✅ Ожидаемый результат: 6
echo multiply(3.5, 2) . PHP_EOL;   // ✅ Ожидаемый результат: 7.0
echo multiply('3', 2) . PHP_EOL;   // ❌ Должна быть ошибка TypeError
