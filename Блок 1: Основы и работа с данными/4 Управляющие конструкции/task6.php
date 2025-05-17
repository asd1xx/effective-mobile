<?php

declare(strict_types=1);

function printEvenNumbers(int $n): void
{
    $count = 1;

    while ($count <= $n) {
        echo $count % 2 === 0 ? $count . PHP_EOL : null;
        $count++;
    }
}

printEvenNumbers(10);
// ✅ Ожидаемый результат:
// 2
// 4
// 6
// 8
// 10
