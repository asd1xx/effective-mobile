<?php

declare(strict_types=1);

function filterEvenNumbers(array $numbers): array
{
    return array_filter($numbers, fn($number) => $number % 2 === 0);
}

print_r(filterEvenNumbers([1, 2, 3, 4, 5, 6])) . PHP_EOL;
// ✅ Ожидаемый результат: [2, 4, 6]

print_r(filterEvenNumbers([11, 15, 21])) . PHP_EOL;
// ✅ Ожидаемый результат: []
