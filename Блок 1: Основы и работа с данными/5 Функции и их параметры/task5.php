<?php

declare(strict_types=1);

function generatePassword(int $length = 8, bool $includeNumbers = true, bool $includeSpecialChars = false): string
{
    $numbers = '0123456789';
    $specialChars = '$^.*+?\/{}[]()|';

    if ($includeNumbers === true) {
        $charsForPassword = $numbers;
    }

    if ($includeSpecialChars === true) {
        $charsForPassword = $numbers . $specialChars;
    }

    $charsLength = mb_strlen($charsForPassword);
    $password = '';

    for ($i = 0; $i < $length; $i++) {
        $password .= $charsForPassword[mt_rand(0, $charsLength - 1)];
    }

    return $password;
}

echo generatePassword() . PHP_EOL;  
// ✅ Должен быть 8-значный пароль с цифрами.

echo generatePassword(length: 12, includeSpecialChars: true) . PHP_EOL;  
// ✅ Должен быть 12-значный пароль с цифрами и спецсимволами.
