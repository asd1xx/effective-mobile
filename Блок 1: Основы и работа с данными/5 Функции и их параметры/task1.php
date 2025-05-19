<?php

declare(strict_types=1);

function greetUser(string $name, string $lang = 'ru'): string
{
    return match ($lang) {
        'ru' => "Привет, {$name}!",
        'en' => "Hello, {$name}!",
        default => 'Language not found',
    };
}

echo greetUser("Иван") . PHP_EOL;      // ✅ "Привет, Иван!"
echo greetUser("John", "en") . PHP_EOL; // ✅ "Hello, John!"
