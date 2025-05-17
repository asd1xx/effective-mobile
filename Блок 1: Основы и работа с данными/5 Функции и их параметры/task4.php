<?php

declare(strict_types=1);

function formatText(string $text, bool $uppercase = false): string
{
    if ($uppercase === true) {
        return mb_strtoupper($text);
    }

    return $text;
}

echo formatText("hello") . PHP_EOL;       // ✅ "hello"
echo formatText("hello", true) . PHP_EOL; // ✅ "HELLO"
