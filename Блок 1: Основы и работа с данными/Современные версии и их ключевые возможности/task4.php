<?php

declare(strict_types=1);

enum OrderStatus: string
{
    case Pending = 'Заказ в ожидании';
    case Shipped = 'Заказ отправлен';
    case Delivered = 'Заказ доставлен';
}

function getDeliveryMessage(OrderStatus $orderStatus): string
{
    return $orderStatus->value;
}

echo getDeliveryMessage(OrderStatus::Pending) . PHP_EOL;   // ✅ "Заказ в ожидании"
echo getDeliveryMessage(OrderStatus::Shipped) . PHP_EOL;   // ✅ "Заказ отправлен"
echo getDeliveryMessage(OrderStatus::Delivered) . PHP_EOL; // ✅ "Заказ доставлен"
