<?php

declare(strict_types=1);

function orderPizza(string $size = 'medium', string $crust = 'thin', array $toppings = ['cheese']): string
{
    $orderToppings = implode(', ', $toppings);

    return match ($crust) {
        'thin' => "Заказ: {$size} пицца на тонком тесте с {$orderToppings}",
        default => "Заказ: {$size} пицца на толстом тесте с {$orderToppings}",
    };
}

echo orderPizza() . PHP_EOL;  
// ✅ "Заказ: medium пицца на тонком тесте с cheese"

echo orderPizza(size: "large", toppings: ["cheese", "pepperoni"]) . PHP_EOL;  
// ✅ "Заказ: large пицца на тонком тесте с cheese, pepperoni"
