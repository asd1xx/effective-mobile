<?php

declare(strict_types=1);

function getStatusMessage(string $string): string
{
    return match ($string) {
        'success' => 'Операция выполнена успешно',
        'error' => 'Произошла ошибка',
        'pending' => 'Операция в ожидании',
        'unknown' => 'Неизвестный статус',
    };
}

echo getStatusMessage('success')  . PHP_EOL; // ✅ "Операция выполнена успешно"
echo getStatusMessage('error') . PHP_EOL;   // ✅ "Произошла ошибка"
echo getStatusMessage('pending') . PHP_EOL; // ✅ "Операция в ожидании"
echo getStatusMessage('unknown') . PHP_EOL; // ❌ "Неизвестный статус"
