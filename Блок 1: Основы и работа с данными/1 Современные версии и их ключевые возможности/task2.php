<?php

declare(strict_types=1);

function calculatePrice(int $basePrice, int $discount, int $tax): int
{
    $discountedPrice = $basePrice - $basePrice * $discount / 100;
    $taxAmount = $discountedPrice * $tax / 100;

    return $discountedPrice + $taxAmount;
}

echo calculatePrice(basePrice: 1000, discount: 10, tax: 5) . PHP_EOL; // ✅ 945
echo calculatePrice(tax: 5, discount: 10, basePrice: 2000) . PHP_EOL; // ✅ 1890
