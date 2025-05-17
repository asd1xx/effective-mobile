<?php

declare(strict_types=1);

function factorial(int $n): int
{
    $count = 1;
    $result = 1;

    while ($count <= $n) {
        $result *= $count;
        $count++;
    }

    return $result;
}

echo factorial(5) . PHP_EOL;  // ✅ 120
echo factorial(3) . PHP_EOL;  // ✅ 6
echo factorial(1) . PHP_EOL;  // ✅ 1
echo factorial(0) . PHP_EOL;  // ✅ 1
