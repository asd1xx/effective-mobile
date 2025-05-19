<?php

declare(strict_types=1);

function calculateTax(float $price, float $tax): string
{
    $amountWithTax = $price + $price * $tax;

    return number_format($amountWithTax, 2);
}

echo calculateTax(100, 0.2) . PHP_EOL;  // ✅ Ожидаемый результат: 120.00
echo calculateTax(50, 0.15) . PHP_EOL;  // ✅ Ожидаемый результат: 57.50
echo calculateTax(99.99, 0.05) . PHP_EOL; // ✅ Ожидаемый результат: 104.99
