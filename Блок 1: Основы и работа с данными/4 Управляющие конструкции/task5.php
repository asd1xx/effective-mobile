<?php

declare(strict_types=1);

function printArrayItems(array $data): void
{
    foreach ($data as $value) {
        echo $value . PHP_EOL;
    }
}

printArrayItems(["apple", "banana", "cherry"]);
// ✅ Ожидаемый результат:
// apple
// banana
// cherry
