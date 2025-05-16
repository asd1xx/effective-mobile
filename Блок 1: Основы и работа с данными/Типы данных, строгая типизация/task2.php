<?php

declare(strict_types=1);

function isAdult(int $age): bool
{
    return $age < 18 ? false : true;
}

var_dump(isAdult(20)) . PHP_EOL;  // ✅ true
var_dump(isAdult(17)) . PHP_EOL;  // ✅ false
var_dump(isAdult('20')) . PHP_EOL; // ❌ Должна быть ошибка TypeError
