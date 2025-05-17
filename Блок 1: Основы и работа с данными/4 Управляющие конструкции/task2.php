<?php

declare(strict_types=1);

function getAgeCategory(int $age): string
{
    return match (true) {
        $age >= 0 && $age <= 12 => 'Ребенок',
        $age >= 13 && $age <= 17 => 'Подросток',
        $age >= 18 && $age <= 64 => 'Взрослый',
        $age >= 64 => 'Пожилой',
    };
}

echo getAgeCategory(8)  . PHP_EOL;   // ✅ "Ребенок"
echo getAgeCategory(15)  . PHP_EOL;  // ✅ "Подросток"
echo getAgeCategory(30)  . PHP_EOL;  // ✅ "Взрослый"
echo getAgeCategory(70)  . PHP_EOL;  // ✅ "Пожилой"
