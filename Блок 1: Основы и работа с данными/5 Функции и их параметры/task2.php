<?php

declare(strict_types=1);

function calculateDiscount(float $price, float $discount = 10): float
{
    return $price -= $price * $discount / 100;
}

echo calculateDiscount(price: 1000) . PHP_EOL;        // ✅ Ожидаемый результат: 900
echo calculateDiscount(price: 2000, discount: 20) . PHP_EOL; // ✅ Ожидаемый результат: 1600
