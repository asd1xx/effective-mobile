<?php

declare(strict_types=1);

function squareNumbers(array $numbers): array
{
    return array_map(fn($number) => $number ** 2, $numbers);
}

print_r(squareNumbers([1, 2, 3, 4]));
// ✅ Ожидаемый результат: [1, 4, 9, 16]

print_r(squareNumbers([-2, 5, 10]));
// ✅ Ожидаемый результат: [4, 25, 100]
